

<?php $__env->startSection('title', 'Detalles del Jurado'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detalles de la Asignación</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('jurados.index')); ?>" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Información del Evento</h4>
                <p><strong>ID:</strong> <?php echo e($jurado->id); ?></p>
                <p><strong>Evento:</strong> <?php echo e($jurado->event->name ?? 'N/A'); ?></p>
                <p><strong>Creado:</strong> <?php echo e($jurado->created_at->format('d/m/Y H:i')); ?></p>
            </div>
            <div class="col-md-6">
                <h4>Información del Jurado</h4>
                <p><strong>Nombre:</strong> <?php echo e($jurado->juror->name ?? 'N/A'); ?></p>
                <p><strong>Email:</strong> <?php echo e($jurado->juror->email ?? 'N/A'); ?></p>
                <p><strong>Actualizado:</strong> <?php echo e($jurado->updated_at->format('d/m/Y H:i')); ?></p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('jurados.edit', $jurado->id)); ?>" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <form action="<?php echo e(route('jurados.destroy', $jurado->id)); ?>" method="POST" style="display: inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este jurado?')">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('jurados.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\votacion-EPA\resources\views/jurados/show.blade.php ENDPATH**/ ?>