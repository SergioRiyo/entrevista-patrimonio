<?php

namespace App\Services;

use App\Contracts\Repositories\EstabelecimentoRepositoryInterface;
use App\Contracts\Repositories\PatrimonioRepositoryInterface;
use App\Models\Emprestimo;
use App\Repositories\EmprestimoRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class EmprestimoService
{
    public function __construct(
        private readonly EmprestimoRepository $emprestimoRepository,
        private readonly EstabelecimentoRepositoryInterface $estabelecimentoRepository,
        private readonly PatrimonioRepositoryInterface $patrimonioRepository,
    ) {}

    public function listar(int $porPagina = 10)
    {
        return $this->emprestimoRepository->paginate($porPagina);
    }

    public function buscarPorId(int $id): Emprestimo
    {
        return $this->emprestimoRepository->buscarComRelacionamentos($id);
    }

    public function criar(array $dados): Emprestimo
    {
        return DB::transaction(function () use ($dados) {
            $requerente = $this->estabelecimentoRepository
                ->findOrFail($dados['estabelecimento_requerente_id']);

            $atendente = $this->estabelecimentoRepository
                ->findOrFail($dados['estabelecimento_atendente_id']);

            if ($requerente->id === $atendente->id) {
                throw ValidationException::withMessages([
                    'estabelecimento_atendente_id' => 'O estabelecimento requerente e o atendente não podem ser o mesmo.',
                ]);
            }

            if ($requerente->tipo_estabelecimento_id !== $atendente->tipo_estabelecimento_id) {
                throw ValidationException::withMessages([
                    'estabelecimento_atendente_id' => 'O empréstimo só pode ser feito entre estabelecimentos do mesmo tipo.',
                ]);
            }

            $emprestimo = $this->emprestimoRepository->create([
                'estabelecimento_requerente_id' => $requerente->id,
                'estabelecimento_atendente_id' => $atendente->id,
                'status' => 'ativo',
            ]);

            foreach ($dados['itens'] as $item) {
                $patrimonio = $this->patrimonioRepository
                    ->findOrFail($item['patrimonio_id']);

                if ($patrimonio->estabelecimento_pai_id !== $atendente->id) {
                    throw ValidationException::withMessages([
                        'itens' => 'O patrimônio precisa pertencer ao estabelecimento atendente.',
                    ]);
                }

                if ($patrimonio->estaBaixado()) {
                    throw ValidationException::withMessages([
                        'itens' => 'Não é permitido emprestar patrimônio baixado.',
                    ]);
                }

                if ($this->emprestimoRepository->existeEmprestimoAtivoParaPatrimonio($patrimonio->id)) {
                    throw ValidationException::withMessages([
                        'itens' => 'Este patrimônio já está em um empréstimo ativo.',
                    ]);
                }

                $this->emprestimoRepository->adicionarItem($emprestimo, [
                    'patrimonio_id' => $patrimonio->id,
                    'data_emprestimo' => $item['data_emprestimo'],
                    'data_devolucao' => $item['data_devolucao'],
                ]);
            }

            return $this->emprestimoRepository->buscarComRelacionamentos($emprestimo->id);
        });
    }
}