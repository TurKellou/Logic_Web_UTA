<?php 
// Incluir la conexión y la cabecera
require_once 'includes/conexion.php'; 
require_once 'includes/header.php'; 
?>

<div class="row align-items-center mb-5">
    <div class="col-lg-6">
        <h1 class="display-4 fw-bold text-primary">Aprende lógica programando soluciones reales</h1>
        <p class="lead text-muted mt-3">Plataforma didáctica para la retroalimentación del aprendizaje de Algoritmos de Programación mediante ejercicios aplicados a problemas cotidianos.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <a href="modulos/ejercicios/index.php" class="btn btn-primary btn-lg px-4 me-md-2">Empezar a practicar</a>
            <a href="modulos/teoria/index.php" class="btn btn-outline-secondary btn-lg px-4">Revisar teoría</a>
        </div>
    </div>
    <div class="col-lg-6 mt-4 mt-lg-0 text-center">
        <div class="p-5 bg-secondary text-white rounded-3 shadow">
            <h2>&lt;/&gt;</h2>
            <p>Visualiza el análisis, desarrolla el pseudocódigo y codifica la solución.</p>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['user_id'])): ?>
<div class="row mb-5">
    <div class="col-12 d-flex justify-content-between align-items-center bg-white p-4 shadow-sm rounded border-start border-success border-4">
        <div>
            <h4 class="mb-0 text-dark fw-bold">Mi Progreso de Estudio</h4>
            <small class="text-muted">Revisa y exporta tu historial de ejercicios de C++ y Java</small>
        </div>
        <a href="descargar_progreso.php" class="btn btn-success shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel me-2" viewBox="0 0 16 16">
                <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
            </svg>
            Exportar Historial (Excel)
        </a>
    </div>
</div>
<?php endif; ?>
<div class="row g-4 mt-2">
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <h4 class="card-title text-primary">Contenidos Claros</h4>
                <p class="card-text">Revisa teoría resumida sobre arreglos, POO, manejo de archivos y listas enlazadas.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <h4 class="card-title text-primary">Casos Reales</h4>
                <p class="card-text">Ejercicios interactivos paso a paso basados en C++ y Java.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <h4 class="card-title text-primary">Feedback Inmediato</h4>
                <p class="card-text">Ingresa tus respuestas y obtén retroalimentación automática sobre tu lógica.</p>
            </div>
        </div>
    </div>
</div>

<?php 
// Incluir el pie de página
require_once 'includes/footer.php'; 
?>