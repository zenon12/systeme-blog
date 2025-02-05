<?php


function generate_name()
{
    $generate_string="azertyuiop1234567890qsdfghjklm0987654321wxcvbn456DFREGTYHU5dg" ;
    $result="" ;
    while (strlen($result)<15) {
        $result.=$generate_string[rand(0,60)] ;
    }
    return $result ;
}



// Cette fonction permet de filtrer un tableau donner en parametre

function trimData($tab)
{   
        
        foreach ($tab as $key => $value) {
            $value=htmlspecialchars(trim($value)) ;
            $value=strip_tags($value) ;
            $tab[$key]=$value ;
        }

        return $tab ;
}


function handleMeadia($article)
{   $media='' ;
    if ($article["urlImage"] !=="") {
        $media='<img src="'.$article["urlImage"].'" alt="ulistration de l\'article">' ;
    }
    if ($article["urlVideo"] !=="") {
        $media='<video controls>
                    <source src="'.$article["urlVideo"].'" type="">
                </video>' ;
    }
    return $media ;
}







?>