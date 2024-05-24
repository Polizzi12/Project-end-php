<?php


session_start();


require_once __DIR__ . '/config/config.php';


$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';


switch ($path) {
    case '/':
      
        require_once __DIR__ . '/public/login.php';
        break;
    case '/dashboard':
        
        require_once __DIR__ . '/public/admin/dashboard.php';
        break;
    case '/manage_data':
    
        require_once __DIR__ . '/public/admin/manage_data.php';
        break;
    case '/logout':
        
        session_unset();
        session_destroy();
        header('Location: /');
        exit;
    default:

        header('Location: /');
        exit;
}