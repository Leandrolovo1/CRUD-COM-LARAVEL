<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\OrdemDeServico;
use App\Models\User;

class OrdemDeServicoPolicy
{
    /**
     * Listar todas as OS
     */
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('ordemServicos.index');
    }

    /**
     * Ver uma OS específica
     */
    public function view(User $user, OrdemDeServico $ordemDeServico): bool
    {
        return PermissionController::isAuthorized('ordemServicos.show');
    }

    /**
     * Criar OS
     */
    public function create(User $user): bool
    {
        return PermissionController::isAuthorized('ordemServicos.create');
    }

    /**
     * Editar OS
     */
    public function update(User $user, OrdemDeServico $ordemDeServico): bool
    {
        return PermissionController::isAuthorized('ordemServicos.edit');
    }

    /**
     * Excluir OS
     */
    public function delete(User $user, OrdemDeServico $ordemDeServico): bool
    {
        return PermissionController::isAuthorized('ordemServicos.delete');
    }

    /**
     * Restaurar OS (soft delete)
     */
    public function restore(User $user, OrdemDeServico $ordemDeServico): bool
    {
        return PermissionController::isAuthorized('ordemServicos.delete');
    }

    /**
     * Excluir permanente
     */
    public function forceDelete(User $user, OrdemDeServico $ordemDeServico): bool
    {
        return PermissionController::isAuthorized('ordemServicos.delete');
    }
}

