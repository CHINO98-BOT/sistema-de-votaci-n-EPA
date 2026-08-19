

<?php $__env->startSection('title', 'Gestión de Jurados'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Jurados Asignados</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('jurados.create')); ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Asignar Nuevo Jurado
            </a>
        </div>
    </div>
    <div class="card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> ¡Error!</h5>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Evento</th>
                    <th>Jurado</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $jurados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($jurado->id); ?></td>
                    <td><?php echo e($jurado->event->name ?? 'N/A'); ?></td>
                    <td><?php echo e($jurado->juror->name ?? 'N/A'); ?></td>
                    <td><?php echo e($jurado->juror->email ?? 'N/A'); ?></td>
                    <td>
                        <a href="<?php echo e(route('jurados.show', $jurado->id)); ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="<?php echo e(route('jurados.edit', $jurado->id)); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="<?php echo e(route('jurados.destroy', $jurado->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este jurado?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">No hay jurados asignados</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('jurados.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\votacion-EPA\resources\views/jurados/index.blade.php ENDPATH**/ ?>