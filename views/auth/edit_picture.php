<?php include "templates/header.php" ?> 


<form id="register" method="POST" enctype="multipart/form-data">
   
    <div class="form-row flex column gap-5">
        <label for="email">Changer votre photo de profile :</label>
        <input type="file" name="picture" accept="image/*">
    </div>
    <div class="form-btn">
        <button class="btn-submit" type="submit">Modifier</button>
    </div>

</form>









<?php include "templates/footer.php" ?> 