<?php include "templates/header.php" ?> 



<div class="container-edit-profile">
<form id="register" method="POST">
    <div class="form-title">
        <h2>Modifier vos informations personnelles</h2>
    </div>
    <div class="form-message fail"><?php echo isset($fail)? $fail : "" ?></div>
    <div class="form-row flex column gap-5">
        <label for="full_name">Saisissez votre prenom et nom :</label>
        <input type="text" name="full_name" 
        value="<?php echo isset($_SESSION["user"]["full_name"])? $_SESSION["user"]["full_name"] : "" ?>" required>
    </div>
    <div class="form-error error-username">
      <?php echo isset($error_fullName)? $error_fullName : "" ?>
    </div>
    <div class="form-row flex column gap-5">
        <label for="username">Saisissez un nom d'utilisateur :</label>
        <input type="text" name="username"
        value="<?php echo isset($_SESSION["user"]["username"])? $_SESSION["user"]["username"] : "" ?>" required>
    </div>
    <div class="form-error error-username">
      <?php echo isset($error_username)? $error_username : "" ?>
    </div>
    <div class="form-row flex column gap-5">
        <label for="email">Saisissez votre Email :</label>
        <input type="email" name="email"
        value="<?php echo isset($_SESSION["user"]["email"])? $_SESSION["user"]["email"] : "" ?>">
    </div>
    <div class="form-error error-email">
      <?php echo isset($error_email)? $error_email : "" ?>
    </div>
    <div class="form-btn">
        <button class="btn-submit" type="submit">Confirmer</button>
    </div>

</form>
</div>













<?php include "templates/footer.php" ?> 