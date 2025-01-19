<?php

$page = basename($_SERVER['REQUEST_URI'] ?? '');

$routes = [
    'home'          => 'view/home_view.php',
    'login'         => 'view/login_view.php',
    'solver'        => 'view/solver_view.php',
    'generate'      => 'view/generate_view.php',
    'register'      => 'view/register_view.php',
    'logout'        => 'view/logout_view.php',
    ''              => 'view/home_view.php',
];
//require $routes[$page];

if ($page == 'solver' && isset($_SESSION["log_in_user"])) {
    require $routes[$page];

} elseif ($page == 'solver') {
    require 'view/login_view.php';

} else {
    if (array_key_exists($page, $routes)) {
        require $routes[$page];
    } else {
        require 'view/404_view.php';
        http_response_code(404);
    }
}
