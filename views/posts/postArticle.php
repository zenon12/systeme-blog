<?php include "templates/header.php" ?> 




     <form  id="post" method="POST" enctype="multipart/form-data">
     <div class="form-message fail"><?php echo isset($fail)? $fail : "" ?></div>
        <div class="form-row flex column gap-5">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" required>
        </div>
        <div class="form-error error-title"></div>
        <div class="form-row flex column gap-5">
            <!-- <select name="media" id="media" class="none" required>
                <option value="">Choisir un media</option>
                <option value="Image">Image</option>
                <option value="Video">Video</option>
            </select> -->
            <label for="media">Une image ou une video pour votre article</label>
            <input type="file" id="file" name="media" accept="video/*,image/*" required>
        </div>
        <div class="form-row flex column gap-5">
            <label for="content">Ecrivez votre article:</label>
            <textarea name="content" id="content" cols="40" rows="15"></textarea>
        </div>
        <div class="form-error error-content"></div>

        <div class="form-row">
            <button type="submit" class="btn-submit">Publier</button>
        </div>
        
     </form>



<?php include "templates/footer.php" ?> 