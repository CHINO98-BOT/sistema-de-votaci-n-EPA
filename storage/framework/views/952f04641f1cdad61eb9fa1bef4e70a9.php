

<?php $__env->startSection('title', 'Detalles del Participante'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detalles del Participante</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('participants.index')); ?>" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <?php if($participant->mainPhoto): ?>
                    <img src="<?php echo e(asset('storage/' . $participant->mainPhoto->file_path)); ?>" 
                         alt="<?php echo e($participant->full_name); ?>" 
                         class="img-fluid rounded" style="max-height: 300px;">
                <?php else: ?>
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                        <i class="fas fa-user fa-5x text-muted"></i>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <h4>Información Personal</h4>
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nombre Completo:</th>
                        <td><?php echo e($participant->full_name); ?></td>
                    </tr>
                    <tr>
                        <th>DNI:</th>
                        <td><?php echo e($participant->dni ?? 'No especificado'); ?></td>
                    </tr>
                    <tr>
                        <th>Curso/División:</th>
                        <td><?php echo e($participant->course ?? 'No especificado'); ?></td>
                    </tr>
                    <tr>
                        <th>Evento:</th>
                        <td><?php echo e($participant->event->name ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td>
                            <span class="badge badge-<?php echo e($participant->status == 'activo' ? 'success' : 'secondary'); ?>">
                                <?php echo e(ucfirst($participant->status)); ?>

                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Orden:</th>
                        <td><?php echo e($participant->order); ?></td>
                    </tr>
                    <?php if($participant->description): ?>
                    <tr>
                        <th>Descripción:</th>
                        <td><?php echo e($participant->description); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th>Fecha de Registro:</th>
                        <td><?php echo e($participant->created_at->format('d/m/Y H:i')); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('participants.edit', $participant->id)); ?>" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <form action="<?php echo e(route('participants.destroy', $participant->id)); ?>" method="POST" style="display: inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este participante?')">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('participants.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\votacion-EPA\resources\views/participants/show.blade.php ENDPATH**/ ?>