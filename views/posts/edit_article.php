<?php include "templates/header.php" ?> 

     <form  id="post" method="POST">
     <div class="form-message fail"><?php echo isset($fail)? $fail : "" ?></div>
        <div class="form-row flex column gap-5">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" 
            value="<?php echo isset($article["title"])? $article["title"] : "" ?>" required>
        </div>
        <div class="form-error error-title"></div>
        <div class="form-row flex column gap-5">
            <label for="content">Ecrivez votre article:</label>
            <textarea name="content" id="content" cols="40" rows="15">
               <?php echo isset($article["content"])? $article["content"] : "" ?>
            </textarea>
        </div>
        <div class="form-error error-content"></div>

        <div class="form-row">
            <button type="submit" class="btn-submit">Modifier</button>
        </div>
        
     </form>



<?php include "templates/footer.php" ?> 