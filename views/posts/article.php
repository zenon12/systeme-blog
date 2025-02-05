<?php include "templates/header.php" ?>



        <div class="read_article">
            <?php
                 if (isset($fail)) {
                     echo $fail ; exit ;
                 }
            ?>
            <div class="article-ulistration flex">
              <div class="article-media">
              <?php
                 echo handleMeadia($article) ;
              ?>
              </div>
            </div>
            <div class="article-title">
              <h3><?php echo $article["title"] ?></h3>
            </div>
            <div class="article-content">
              <?php echo $article["content"] ?>
            </div>
            <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["id"]===$article["user_id"] ) :?>
            <div class="article-actions flex gap-5 ">
               <div class="btn-edit btn-action"><a href="/?route=editArticle&&id=<?php echo $article["id"]?>">Modifier</a></div>
               <div class="btn-delete btn-action"><a href="/?route=deleteArticle&&id=<?php echo $article["id"]?>">Supprimer</a></div>
            </div>
            <?php endif ;?>
        </div>













<?php include "templates/footer.php" ?> 