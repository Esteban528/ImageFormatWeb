
<?php
// Importacion de archivos globales
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

// Importacion de clases a usar
use MVC\Router;
use Controller\PageController;
use Controller\TestController;

$router = new Router();

// Configuracion del router
$router->addGet("/", [PageController::class, 'index']);
$router->addPost("/", [PageController::class, 'index']);
$router->addGet("/file", [PageController::class, 'files']);
$router->addGet("/image", [PageController::class, 'image']);
$router->addGet("/error", [PageController::class, 'error']);
$router->addGet("/test", [TestController::class, 'list']);

$router->checkRoutes();
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
	initApp();
});

function initApp() {
	document.body.setAttribute('data-bs-theme', 'dark');
}
</script>