<?php

namespace App\Services;

use App\Repositories\TipoEstabelecimentoRepository;

class TipoEstabelecimentoService
{
    public function __construct(
        private readonly TipoEstabelecimentoRepository $tipoEstabelecimentoRepository
    ) {}

    public function listar(int $page = 15)
    {
        return $this->tipoEstabelecimentoRepository->paginate($page);
    }

    public function listarTodos()
    {
        return $this->tipoEstabelecimentoRepository->all();
    }

    public function buscarPorId(int $id)
    {
        return $this->tipoEstabelecimentoRepository->findOrFail($id);
    }

    public function criar(array $data)
    {
        return $this->tipoEstabelecimentoRepository->create($data);
    }

    public function atualizar(int $id, array $data)
    {
        return $this->tipoEstabelecimentoRepository->update($id, $data);
    }

    public function excluir(int $id): bool
    {
        return $this->tipoEstabelecimentoRepository->delete($id);
    }
}