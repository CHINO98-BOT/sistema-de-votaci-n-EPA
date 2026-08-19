<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votación EPA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-vote-yea"></i> Sistema de Votación EPA
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-home"></i> Panel de Control - Sistema de Votación</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h5><i class="fas fa-info-circle"></i> Bienvenido al Sistema</h5>
                            <p class="mb-0">Selecciona un módulo para comenzar a gestionar el evento de votación.</p>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col-md-6 mb-4">
                                <div class="p-3 border rounded h-100">
                                    <i class="fas fa-user-tie fa-3x text-primary mb-3"></i>
                                    <h5>Gestión de Jurados</h5>
                                    <p class="text-muted">Administrar jurados asignados a eventos</p>
                                    <a href="<?php echo e(route('jurados.index')); ?>" class="btn btn-primary">
                                        <i class="fas fa-users"></i> Acceder a Jurados
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="p-3 border rounded h-100">
                                    <i class="fas fa-user-friends fa-3x text-success mb-3"></i>
                                    <h5>Participantes</h5>
                                    <p class="text-muted">Gestionar candidatas participantes</p>
                                    <a href="<?php echo e(route('participants.index')); ?>" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Próximamente
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="p-3 border rounded h-100">
                                    <i class="fas fa-calendar-alt fa-3x text-warning mb-3"></i>
                                    <h5>Eventos</h5>
                                    <p class="text-muted">Crear y gestionar eventos</p>
                                    <a href="#" class="btn btn-warning disabled">
                                        <i class="fas fa-calendar"></i> Próximamente
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="p-3 border rounded h-100">
                                    <i class="fas fa-chart-bar fa-3x text-info mb-3"></i>
                                    <h5>Resultados</h5>
                                    <p class="text-muted">Ver resultados de votaciones</p>
                                    <a href="#" class="btn btn-info disabled">
                                        <i class="fas fa-chart-pie"></i> Próximamente
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2025 Sistema de Votación EPA. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\votacion-EPA\resources\views/welcome.blade.php ENDPATH**/ ?>