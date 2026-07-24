<?php
// public/index.php
session_start();

$controllerName =$_GET['controller'] ?? 'category';
$actionName =$_GET['action'] ?? 'index';

// Whitelist Controller
$controllers = [
    'category' => 'CategoryController'
];

// Whitelist Action
$actions = ['index', 'create', 'edit', 'delete'];

if (!array_key_exists($controllerName,$controllers) || !in_array($actionName,$actions)) {
    die("404 Not Found - Controller hoặc Action không hợp lệ.");
}

$controllerClass = $controllers[$controllerName];
require_once __DIR__ . "/../controllers/{$controllerClass}.php";

$controller = new$controllerClass();
$controller->$actionName();