<?php
try {
    spl_autoload_register();
    $route = $_GET['route'] ??'';
    session_start();
    $routes = require __DIR__ . '/src/Config/routes.php'; //dir константа показывае текущую директорию
    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new Src\Exceptions\NotFoundException();
    }
    unset($matches[0]);
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];
    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (Src\Exceptions\DbException $e) {
    $view = new Src\Views\View('default');
    $view->renderHtml('errors/500.php', ['error' => $e->getMessage()], 500);

} catch (Src\Exceptions\NotFoundException $e) {
    $view = new Src\Views\View('default');
    $view->renderHtml('errors/404.php', ['error' => $e->getMessage()], 404);

} catch (Src\Exceptions\UnauthorizedException $e) {
    $view  = new Src\Views\View('default');
    $view->renderHtml('errors/401.php', ['error' => $e->getMessage()], 401);
} catch (Src\Exceptions\ForbiddenException $e) {
    $view  = new Src\Views\View('default');
    $view->renderHtml('errors/403.php', ['error' => $e->getMessage()], 403);
}
?>