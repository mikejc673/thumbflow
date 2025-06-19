<?php
// Fichier index.php - Point d'entrée principal de l'application

// Démarrer la session
session_start();

// Inclure les fichiers de configuration et les classes
require_once 'config/Database.php';
require_once 'classes/User.php';
require_once 'classes/Post.php';
require_once 'classes/Comment.php';
require_once 'classes/View.php';
require_once 'classes/UserView.php';
require_once 'classes/Controller.php';
require_once 'classes/PostController.php';
require_once 'classes/UserController.php';
require_once 'classes/CommentController.php';
require_once 'classes/AdminController.php';

// Déterminer le contrôleur à utiliser
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'post';

// Instancier le contrôleur approprié
switch ($controller) {
    case 'user':
        $controller = new UserController();
        break;
    case 'post':
        $controller = new PostController();
        break;
    case 'comment':
        $controller = new CommentController();
        break;
    case 'admin':
        $controller = new AdminController();
        break;
    default:
        $controller = new PostController();
        break;
}

// Traiter la requête
$controller->processRequest();
?>
