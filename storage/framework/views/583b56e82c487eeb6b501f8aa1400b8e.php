

<?php $__env->startSection('conteudo'); ?>

    <a href="<?php echo e(route('ordemServicos.create')); ?>" class="btn btn-info mb-3">
        Criar Nova Ordem de Serviço
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-secondary">CLIENTE</th>
                <th class="text-secondary d-none d-md-table-cell">STATUS</th>
                <th class="text-secondary d-none d-md-table-cell">TIPO DE MÁQUINA</th>
                <th class="text-secondary d-none d-md-table-cell">DEFEITO</th>
                <th class="text-secondary d-none d-md-table-cell">LAUDO TÉCNICO</th>
                <th class="text-secondary d-none d-md-table-cell">FOTO</th>
                <th class="text-secondary">AÇÕES</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $ordens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $os): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <!-- Cliente -->
                    <td><?php echo e($os->user->name ?? 'Não informado'); ?></td>

                    <!-- Status -->
                    <td class="d-none d-md-table-cell">
                        <?php echo e($os->status->nome_status ?? 'Sem status'); ?>

                    </td>

                    <!-- Tipo de Máquina -->
                    <td class="d-none d-md-table-cell">
                        <?php echo e($os->tipoMaquina->tipo_maquina ?? 'Sem tipo'); ?>

                    </td>

                    <!-- Defeito -->
                    <td class="d-none d-md-table-cell"><?php echo e($os->defeito_pedido); ?></td>

                    <!-- Laudo -->
                    <td class="d-none d-md-table-cell"><?php echo e(Str::limit($os->laudo, 30)); ?></td>

                    <!-- Foto -->
                    <td class="d-none d-md-table-cell">
                        <?php if($os->foto): ?>
                            <img src="<?php echo e(Storage::url($os->foto)); ?>" width="80" height="80" class="rounded">
                        <?php else: ?>
                            <span class="text-muted">Sem foto</span>
                        <?php endif; ?>
                    </td>

                    <!-- Ações -->
                    <td>
                        <!-- Botão Editar -->
                        <form action="<?php echo e(route('ordemServicos.edit', $os->id)); ?>" method="GET" class="d-inline">
                            <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                        </form>

                        <!-- Botão Excluir -->
                        <form action="<?php echo e(route('ordemServicos.destroy', $os->id)); ?>" 
                              method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir essa OS?')">
                                Excluir
                            </button>
                        </form>

                        <!-- Botão Visualizar (Opcional) -->
                        <form action="<?php echo e(route('ordemServicos.show', $os->id)); ?>" 
                              method="GET" class="d-inline">
                            <button class="btn btn-secondary btn-sm">Ver</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/main', [
    'titulo' => 'Sistema OS',
    'cabecalho' => 'Ordens de Serviço',
    'rota' => '',
    'relatorio' => '',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Programacao\trabalho_gil_tca\TCA-GIL\CRUD-COM-LARAVEL\resources\views/ordemServicos/index.blade.php ENDPATH**/ ?>