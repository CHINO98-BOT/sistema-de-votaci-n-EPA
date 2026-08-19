

<?php $__env->startSection('title', 'Asignar Nuevo Jurado'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Asignar Jurado a Evento</h3>
    </div>
    <form action="<?php echo e(route('jurados.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="event_id">Evento *</label>
                <select name="event_id" id="event_id" class="form-control <?php $__errorArgs = ['event_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="">Seleccionar Evento</option>
                    <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($evento->id); ?>" <?php echo e(old('event_id') == $evento->id ? 'selected' : ''); ?>>
                            <?php echo e($evento->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['event_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="juror_user_id">Jurado *</label>
                <select name="juror_user_id" id="juror_user_id" class="form-control <?php $__errorArgs = ['juror_user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="">Seleccionar Jurado</option>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($usuario->id); ?>" <?php echo e(old('juror_user_id') == $usuario->id ? 'selected' : ''); ?>>
                            <?php echo e($usuario->name); ?> (<?php echo e($usuario->email); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['juror_user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
            <a href="<?php echo e(route('jurados.index')); ?>" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('jurados.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\votacion-EPA\resources\views/jurados/create.blade.php ENDPATH**/ ?>