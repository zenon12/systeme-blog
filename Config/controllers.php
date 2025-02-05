<?php
 
 require "app/Controllers/utilities.php" ;
 require "app/Controllers/authController.php" ;
 require "app/Controllers/articleController.php" ;
//  require "app/Controllers/userController.php" ;
 
 //Initialisation des controllers

 $authController= new AuthController($userModel) ;
 $articleController=new articleController($articleModel) ;

?>