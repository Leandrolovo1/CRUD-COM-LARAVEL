

<?php $__env->startSection('conteudo'); ?>

    <form action="<?php echo e(route('ordemServicos.update', $ordem->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row">

            <!-- Cliente -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Cliente:</label>
                <select class="form-control" name="user_id" required>
                    <option value="">-- Selecione o cliente --</option>
                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($u->id); ?>" 
                            <?php echo e($ordem->user_id == $u->id ? 'selected' : ''); ?>>
                            <?php echo e($u->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Status -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Status:</label>
                <select class="form-control" name="status_id" required>
                    <option value="">-- Selecione o status --</option>
                    <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($s->id); ?>" 
                            <?php echo e($ordem->status_id == $s->id ? 'selected' : ''); ?>>
                            <?php echo e($s->nome_status); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Tipo da máquina -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Tipo da Máquina:</label>
                <select class="form-control" name="tipo_maquinas_id" required>
                    <option value="">-- Selecione o tipo da máquina --</option>
                    <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t->id); ?>" 
                            <?php echo e($ordem->tipo_maquinas_id == $t->id ? 'selected' : ''); ?>>
                            <?php echo e($t->tipo_maquina); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Defeito -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Defeito informado:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="defeito_pedido" 
                    value="<?php echo e($ordem->defeito_pedido); ?>">
            </div>

            <!-- Laudo -->
            <div class="col-12 mb-3">
                <label class="form-label">Laudo Técnico:</label>
                <textarea class="form-control" name="laudo" rows="4" required><?php echo e($ordem->laudo); ?></textarea>
            </div>

            <!-- Foto atual -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Foto Atual:</label><br>

                <?php if($ordem->foto): ?>
                    <img src="<?php echo e(asset('storage/' . $ordem->foto)); ?>" 
                         width="120" height="120" class="rounded mb-2">
                <?php else: ?>
                    <p class="text-muted">Nenhuma foto enviada</p>
                <?php endif; ?>
            </div>

            <!-- Enviar nova foto -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Alterar Foto:</label>
                <input type="file" class="form-control" name="foto">
            </div>

        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="<?php echo e(route('ordemServicos.index')); ?>" class="btn btn-secondary">Voltar</a>

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/main', [
    'titulo' => 'Editar Ordem de Serviço',
    'cabecalho' => 'Editar OS #' . $ordem->id,
    'rota' => '',
    'relatorio' => '',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Programacao\trabalho_gil_tca\TCA-GIL\CRUD-COM-LARAVEL\resources\views/ordemServicos/edit.blade.php ENDPATH**/ ?>