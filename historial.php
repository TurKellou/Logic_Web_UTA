<?php
require_once 'includes/conexion.php';
require_once 'includes/header.php';

// Validar que nadie entre sin iniciar sesión
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='".BASE_URL."modulos/usuarios/login.php';</script>";
    exit();
}

$usuario_id = $_SESSION['user_id'];

// Consultar la base de datos
$sql = "SELECT i.IdIntento, t.NombreTema, e.Titulo, i.Resultado, i.Fecha 
        FROM intento i
        JOIN ejercicio e ON i.IdEjercicio = e.IdEjercicio
        JOIN tema t ON e.IdTema = t.IdTema
        WHERE i.IdUsuario = ?
        ORDER BY i.Fecha DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id]);
$intentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5 mb-5" style="min-height: 60vh;">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h2 class="text-primary fw-bold">Mi Historial de Prácticas</h2>
        <a href="<?php echo BASE_URL; ?>descargar_progreso.php" class="btn btn-success shadow-sm">
            Descargar Excel
        </a>
    </div>

    <div class="card shadow-sm border-0 border-top border-primary border-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Fecha y Hora</th>
                            <th class="py-3">Unidad / Tema</th>
                            <th class="py-3">Ejercicio</th>
                            <th class="py-3 text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($intentos) > 0): ?>
                            <?php foreach ($intentos as $intento): ?>
                                <tr>
                                    <td class="px-4 text-muted small"><?php echo htmlspecialchars($intento['Fecha']); ?></td>
                                    <td class="fw-semibold text-dark"><?php echo htmlspecialchars($intento['NombreTema']); ?></td>
                                    <td class="text-secondary"><?php echo htmlspecialchars($intento['Titulo']); ?></td>
                                    <td class="text-center">
                                        <?php if ($intento['Resultado'] == 1): ?>
                                            <span class="badge bg-success px-3 py-2 rounded-pill">Correcto</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger px-3 py-2 rounded-pill">Incorrecto</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    Aún no has realizado ninguna práctica. ¡Ve al módulo de ejercicios para empezar!
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>