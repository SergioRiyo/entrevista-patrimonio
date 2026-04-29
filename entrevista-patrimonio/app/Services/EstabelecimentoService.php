<?php

namespace App\Services;

use App\Contracts\Repositories\EstabelecimentoRepositoryInterface;

class EstabelecimentoService
{
    public function __construct(
        private readonly EstabelecimentoRepositoryInterface $estabelecimentoRepository
    ) {}

    public function listarTodos()
    {
        return $this->estabelecimentoRepository->all();
    }

    public function listar(int $page = 15)
    {
        return $this->estabelecimentoRepository->paginate($page);
    }

    public function buscarPorId(int $id)
    {
        return $this->estabelecimentoRepository->findOrFail($id);
    }

    public function criar(array $data)
    {
        return $this->estabelecimentoRepository->create($data);
    }

    public function atualizar(int $id, array $data)
    {
        return $this->estabelecimentoRepository->update($id, $data);
    }

    public function excluir(int $id): bool
    {
        return $this->estabelecimentoRepository->delete($id);
    }
}
