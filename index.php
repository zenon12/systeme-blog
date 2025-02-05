<?php
session_start() ;

require "config/database.php" ;
require "config/controllers.php" ;


$route=$_GET["route"] ?? "home" ;

switch ($route) {
    case 'register':
        $authController->register() ;
        break;
        
    case 'login':
        $authController->login() ;
    break;
    case 'logout':
        $authController->logout() ;
    break;
    
    case 'post':
        $articleController->postArticle() ;
        break;
    case 'profile':
        $authController->profile() ;
        break;
    case 'edit_profile':
        $authController->edit_profile() ;
        break;
    case 'edit_picture':
        $authController->changePicture() ;
        break;
    case 'display_details':
        $articleController->display_article() ;
        break;
    case 'editArticle':
        $articleController->editArticle() ;
        break;
    case 'deleteArticle':
        $articleController->deleteArticle() ;
        break;
    case 'articles':
        $articleController->articles() ;
        break;
        
    default: 
        $articleController->articles() ;
        break;
}











?>