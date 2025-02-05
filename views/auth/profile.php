<?php include "templates/header.php" ?>


<div class="container-profile">
    <div class="profile-picture relative">
        <img src="
        <?php echo isset($_SESSION["user"]["picture"])? $_SESSION["user"]["picture"]: "" ?>" 
        alt="Le profile">
        <div class="edit-profile camera absolute">
         <a href="/?route=edit_picture"><i class="fa fa-camera" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="profile-row">
        Prenom et nom :
        <span><?php echo isset($_SESSION["user"]["full_name"])? $_SESSION["user"]["full_name"]: "" ?></span>
    </div>
    <div class="profile-row">
        Nom d'utilisateur :
        <span><?php echo isset($_SESSION["user"]["username"])? $_SESSION["user"]["username"]: "" ?></span>
    </div>
    <div class="profile-row">
        Email :
        <span><?php echo isset($_SESSION["user"]["email"])? $_SESSION["user"]["email"]: "" ?></span>
    </div>
    <div class="profile-row">
        Role :
        <span><?php echo isset($_SESSION["user"]["role"])? $_SESSION["user"]["role"]: "" ?></span>
    </div>
    <div class="profile-row">
        <a class="btn" href="/?route=edit_profile">Modifier</a>
    </div>
</div>








<?php include "templates/footer.php" ?> 