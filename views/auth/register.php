<?php include "templates/header.php" ?> 


<form id="register" method="POST" enctype="multipart/form-data">
    <div class="form-title">
        <h2>Inscription</h2>
    </div>
    <div class="form-message fail"><?php echo isset($fail)? $fail : "" ?></div>
    <div class="form-row flex column gap-5">
        <label for="full_name">Saisissez votre prenom et nom :</label>
        <input type="text" name="full_name" 
        value="<?php echo isset($_POST["full_name"])? $_POST["full_name"] : "" ?>" required>
    </div>
    <div class="form-error error-full_name">
      <?php echo isset($error_fullName)? $error_fullName : "" ?>
    </div>
    <div class="form-row flex column gap-5">
        <label for="username">Saisissez un nom d'utilisateur :</label>
        <input type="text" name="username"
        value="<?php echo isset($_POST["username"])? $_POST["username"] : "" ?>" required>
    </div>
    <div class="form-error error-username">
      <?php echo isset($error_username)? $error_username : "" ?>
    </div>
    <div class="form-row flex column gap-5">
        <label for="email">Saisissez votre Email :</label>
        <input type="email" name="email"
        value="<?php echo isset($_POST["email"])? $_POST["email"] : "" ?>">
    </div>
    <div class="form-error error-email">
      <?php echo isset($error_email)? $error_email : "" ?>
    </div>
    <div class="form-row flex column gap-5">
        <label for="email">Votre image de profile :</label>
        <input type="file" name="picture" accept="image/*">
    </div>
    <div class="form-row flex column gap-5 relative">
        <label for="password">Saisissez un mot de passe :</label>
        <input type="password" name="password" autocomplete="on" id="password">
        <i class="fa-regular absolute icon-password fa-eye-slash"></i>
    </div>
    <div class="form-error error-password">
    </div>
    <div class="form-row flex column gap-5 relative">
        <label for="confirmPassword">Confirmer votre mot de passe :</label>
        <input type="password" name="confirm_password" autocomplete="on" id="confirm-password">
        <i class="fa-regular absolute icon-password fa-eye-slash"></i>
    </div>
    <div class="form-error error-confirmPassword">
    </div>
    <div class="form-btn">
        <button class="btn-submit" type="submit" 
        id="btn-submit" style="cursor: not-allowed ;" disabled>S'inscrire</button>
    </div>
    <div class="message">
        Vous avez un compte? cliquez <a href="/?route=login">ici</a> pour 
        vous connecter.
    </div>

</form>









<?php include "templates/footer.php" ?> 