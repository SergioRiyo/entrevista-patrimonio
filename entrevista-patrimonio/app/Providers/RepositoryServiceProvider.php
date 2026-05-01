<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BaseRepository;
use App\Repositories\EmprestimoRepository;
use App\Repositories\EstabelecimentoRepository;
use App\Repositories\PatrimonioRepository;
use App\Repositories\ItemEmprestimoRepository;
use App\Repositories\TipoEstabelecimentoRepository;
use App\Contracts\Repositories\EmprestimoRepositoryInterface;
use App\Contracts\Repositories\EstabelecimentoRepositoryInterface;
use App\Contracts\Repositories\PatrimonioRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    public array $bindings =
    [
        EstabelecimentoRepositoryInterface::class => EstabelecimentoRepository::class,
        PatrimonioRepositoryInterface::class => PatrimonioRepository::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
