<?php include "templates/header.php" ?>





     <div class="articles">
        <?php
              if ($articles) {
                 $result='' ;
                 $media='' ;
                 foreach ($articles as  $article) {
                     $media=handleMeadia($article) ;
                     $result.='
                     <div class="article relative">
                     <div class="article-ulistration flex">
                       <div class="article-media">'.$media.'</div>
                     </div>
                     <div class="article-title">
                       <h3>'.$article["title"].'</h3>
                     </div>
                     <div class="article-content">
                        '.$article["content"].'
                     </div>
                     <div class="overlay absolute">
                        <h2><a href="/?route=display_details&&id='.$article["id"].'">Lire l\'article</a></h2>
                     </div>
                 </div>
                     ' ;
                 }
                 echo $result ;
              }else{
                 echo '<h2>La page d\'article est vide !!</h2>' ;
              }
        ?>
     </div>






  
<?php include "templates/footer.php" ?>