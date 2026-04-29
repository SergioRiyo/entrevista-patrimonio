<?php

namespace App\Services;

use App\Contracts\Repositories\PatrimonioRepositoryInterface;
use App\Models\Patrimonio;
use Illuminate\Validation\ValidationException;

class PatrimonioService {
    public function __construct(private readonly PatrimonioRepositoryInterface $patrimonioRepository){}

    public function criar(array $data) {
        return $this->patrimonioRepository->create($data);
    }

    public function listar(int $page =10){
        return $this->patrimonioRepository->paginate($page);
    }

    public function listarTodos(){
        return $this->patrimonioRepository->all();
    }

    public function atualizar(int $id, array $data) {
        return $this->patrimonioRepository->update($id, $data);
    }

    public function buscarPorId(int $id){
        return $this->patrimonioRepository->findOrFail($id);
    }

    public function baixar(int $id, array $dados): bool
    {
            /** @var Patrimonio $patrimonio */
        $patrimonio = $this->patrimonioRepository->findOrFail($id);

        if ($patrimonio->estaBaixado()) {
            throw ValidationException::withMessages([
                'data_baixa' => 'Este patrimônio já está baixado.',
            ]);
        }
        return $this->patrimonioRepository->baixar($id, $dados);
    }
    public function excluir(int $id){
        return $this->patrimonioRepository->delete($id);
    }
}