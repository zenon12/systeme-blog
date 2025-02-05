<?php


class articleController
{
    private $articleModel ;

    function __construct($articleModel)
    {
        $this->articleModel=$articleModel ;
    }
    /**
     * Cette fonction permet de publier un article
     */
    function postArticle()
    {   
        if (!isset($_SESSION["user"])) {
            $fail="Connectez-vous pour publier un article" ;
            require "views/posts/postArticle.php" ; exit ;
        }
        if (empty($_POST)) {
            require "views/posts/postArticle.php" ; exit ;
        }
        $data=trimData($_POST) ;
        $data["user_id"]=$_SESSION["user"]["id"] ;
        //gestion de la partie ulistration de l'article
        $source="" ;
        if (!empty($_FILES) && $_FILES["media"]) {
            $type=explode("/",$_FILES["media"]["type"])[0] ;
            $name=$_FILES["media"]["name"] ;
            $ext=explode(".",$name)[1] ;
            $file=generate_name().".".$ext ;
            if ($type==="image") {
                $source="src/media/post/image/".$file ;
                $data["urlImage"]=$source ;
                $data["urlVideo"]="" ;
            }
            if ($type==="video") {
                $source="src/media/post/video/".$file ;
                $data["urlVideo"]=$source ;
                $data["urlImage"]="";
            }
        }
        //sauvegarde de l'article dans la base de donnée
        if ($this->articleModel->create($data)) {
            $tmp_dir=$_FILES["media"]["tmp_name"] ;
            copy($tmp_dir,$source) ;
            header("Location: /") ;
        }
    }
    /**
     * Cette fonction permet d'afficher les articles 
     */
    function articles()
    {   
        $articles=$this->articleModel->getAll() ;
        require "views/posts/articles.php" ;
    }
    /**
     * Cette fonction permet d'afficher un article
     */
    function display_article()
    {   
        $id=$_GET["id"] ;
        $article=$this->articleModel->getArticleById($id) ;
        if (!$article) {
            $fail="Probleme d'affichage de la page article" ;
        }
        require "views/posts/article.php";
    }

    /**
     * Cette fonction permet de modifier un article
     */

    function editArticle()
    {
        $id=$_GET["id"] ;
        $article=$this->articleModel->getArticleById($id) ;
        if (!empty($_POST)) {
            $data=trimData($_POST) ;
            if ($this->articleModel->update($id, $data)) {
                header("Location: /?route=display_details&&id=".$id."")  ; exit ;
            }else {
                //mise à jour echouée
                $fail="Erreur de modification de l'article" ;
            }
        }
        require "views/posts/edit_article.php" ;
    }

    /**
     * Cette fonction permet de supprimer un article 
     */

    function deleteArticle()
    {
        $id=$_GET["id"] ;
        $article=$this->articleModel->getArticleById($id) ;
        $media="" ;
        if ($article["urlImage"] !=="") {
            $media=$article["urlImage"] ;
        }elseif ($article["urlVideo"] !=="") {
            $media=$article["urlVideo"] ;
        }
        if (unlink($media)) {
            $this->articleModel->delete($id) ;
            header("Location: /") ;
        }
    }
}














?>