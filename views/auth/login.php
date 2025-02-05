<?php include "templates/header.php" ?> 


<form id="login" method="POST">
    <div class="form-title">
        <h2>Connexion</h2>
    </div>
    <div class="form-message fail"><?php echo isset($fail)? $fail : "" ?></div>
    <div class="form-row flex column gap-5">
        <label for="username">Votre nom d'utilisateur :</label>
        <input type="text" name="username" required>
    </div>
    <div class="form-error error-username">
    </div>
    <div class="form-row flex column gap-5 relative">
        <label for="password">Votre mot de passe :</label>
        <input type="password" name="password">
        <i class="fa-regular absolute icon-password fa-eye-slash"></i>
    </div>
    <div class="form-error error-password">
    </div>
    <div class="form-btn">
        <button class="btn-submit" type="submit" 
        id="btn-submit" style="cursor: not-allowed ;" disabled>Se conneter</button>
    </div>
    <div class="message">
        Vous n'avez pas de compte? cliquez <a href="/?route=register">ici</a> pour 
        vous inscrire.
    </div>

</form>













<?php include "templates/footer.php" ?> 