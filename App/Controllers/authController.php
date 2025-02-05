<?php


class authController
{

     private $userModel ;

     function __construct($userModel)
     {
         $this->userModel=$userModel ;
     }


     function register()
     {
        if (empty($_POST)) {
            require "views/auth/register.php" ; exit ;
        }else {
            $data=trimData($_POST) ;
        }
        if ($_POST["password"]!==$_POST["confirm_password"]) {
            $fail="Les deux mots de passe ne correspondent pas " ;
            require "views/auth/register.php" ; exit ;
        }else {
            unset($data["confirm_password"]) ;
        }
        if ($this->userModel->getUserByUsername($_POST["username"])) {
            $error_username="L'utilisateur saisi existe dejà" ;
            require "views/auth/register.php" ; exit ;
        }
        if ($this->userModel->getUserByEmail($_POST["email"])) {
            $error_email="L'email saisi existe dejà" ;
            require "views/auth/register.php" ; exit ;
        }

        $picture="" ;
        if (!empty($_FILES) && $_FILES["picture"]) {
            $name=$_FILES["picture"]["name"] ;
            $ext=explode(".",$name)[1] ;
            $picture="src/media/profile/".generate_name().".".$ext ;
        }

        $data["picture"]=$picture;
        $data["role"]="lecteur";
        if ($this->userModel->register($data)) {
            if ($picture !=="") {
                $tmp_dir=$_FILES["picture"]["tmp_name"] ;
                copy($tmp_dir,$picture) ;
            }
            header("Location: /?route=login")  ;
        }else {
            $fail="Inscription echouée" ;
        }
     }

     function login()
     {
        if (empty($_POST)) {
           require "views/auth/login.php" ; exit ;
        }
        $username=$_POST["username"] ;
        $password=$_POST["password"] ;
        $user=$this->userModel->login($username,$password) ;
        if ($user) {
            $_SESSION["user"]=$user ;
            // print_r($_SESSION["user"]) ; exit ; 
            header("Location: /") ;
        }else {
            $fail="Connexion echouée" ;
            require "views/auth/login.php" ; exit ;
        }
     }
     function logout()
     {
         session_destroy() ;
         header("Location: /?route=login") ;
     }

     function profile()
     {
        require "views/auth/profile.php" ;
     }

     function edit_profile()
     {
        if (empty($_POST)) {
            require "views/auth/edit_profile.php" ; exit ;
        }
        $data=trimData($_POST) ;
        $userId=$_SESSION["user"]["id"] ;
        if ($this->userModel->updateProfile($userId, $data)) {
            $_SESSION["user"]=$this->userModel->getUserById($userId) ;
            header("Location: /?route=profile") ;
        }else {
            $fail="Mise à jour echouée" ;
            require "views/auth/edit_profile.php" ;
        }
     }

     /**
      * Cette fonction permet de changer la photo de profile
      */

     function changePicture()
     {
        if (!empty($_FILES) && $_FILES["picture"]) {
            $name=$_FILES["picture"]["name"] ;
            $tmp_dir=$_FILES["picture"]["tmp_name"] ;
            $ext=explode(".",$name)[1] ;
            $newPicture="src/media/profile/".generate_name().".".$ext ;
            $oldPicture=$_SESSION["user"]["picture"];
            $id=$_SESSION["user"]["id"] ;
            if ($this->userModel->updatePicture($id,$newPicture)) {
                if (file_exists($oldPicture)) {
                    unlink($oldPicture) ;
                }
                copy($tmp_dir,$newPicture) ;
                $_SESSION["user"]["picture"]=$newPicture ;
                header("Location:/?route=profile") ; exit ;
            }
        }
        require "views/auth/edit_picture.php" ;
     }


     
}

















?>
