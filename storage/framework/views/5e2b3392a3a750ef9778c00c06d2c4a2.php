

<?php $__env->startSection('title', 'Gestión de Participantes'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Participantes</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('participants.create')); ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Nuevo Participante
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

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Evento</th>
                    <th>Curso</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($participant->id); ?></td>
                    <td>
                        <?php if($participant->mainPhoto): ?>
                            <img src="<?php echo e(asset('storage/' . $participant->mainPhoto->file_path)); ?>" 
                                 alt="<?php echo e($participant->full_name); ?>" 
                                 style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                        <?php else: ?>
                            <div style="width: 50px; height: 50px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                                <i class="fas fa-user text-muted"></i>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($participant->full_name); ?></td>
                    <td><?php echo e($participant->event->name ?? 'N/A'); ?></td>
                    <td><?php echo e($participant->course ?? 'N/A'); ?></td>
                    <td>
                        <span class="badge badge-<?php echo e($participant->status == 'activo' ? 'success' : 'secondary'); ?>">
                            <?php echo e(ucfirst($participant->status)); ?>

                        </span>
                    </td>
                    <td>
                        <a href="<?php echo e(route('participants.show', $participant->id)); ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="<?php echo e(route('participants.edit', $participant->id)); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="<?php echo e(route('participants.destroy', $participant->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este participante?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center">No hay participantes registrados</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('participants.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\votacion-EPA\resources\views/participants/index.blade.php ENDPATH**/ ?>