<?php
    session_start();

    include("core/model.php");

    $path = "vue/erreur.php";

    if ( isset($_GET['page']) and !empty($_GET['page']) )
    {
        $page=htmlspecialchars($_GET['page']);
    }
    else
    {
        $page="accueil"; //page par default, l'accueil
    }

    if (isset($_GET['errMsg']) and !empty($_GET['errMsg']))
    {
        $errMsg = htmlspecialchars($_GET['errMsg']);
    }
    else
    {
        if(file_exists("core/$page.php"))
        {
            $path = "core/$page.php";
        }
        else
        {
            $errMsg = "page introuvable";
        }
    }

    include("vue/entete.php");
    include("core/navbar.php");
    include($path);
    include("vue/footer.php");
?>
