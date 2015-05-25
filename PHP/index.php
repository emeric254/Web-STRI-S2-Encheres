<?php
    session_start();
    include("core/model.php");


    if ( isset($_GET['page']) and !empty($_GET['page']) )
    {
        $page=htmlspecialchars($_GET['page']);
    }
    else
    {
        $page="accueil"; //page par default
    }

    // vues

    include("vue/entete.php");
    include("core/navbar.php");

    if(file_exists("core/$page.php"))
    {
        include_once("core/$page.php");
    }
    else
    {
        $errMsg = "page introuvable";

        if (isset($_GET['errMsg']) and !empty($_GET['errMsg']))
        {
            $errMsg = htmlspecialchars($_GET['errMsg']);
        }

        include_once("vue/erreur.php"); //page d'erreur'
    }

    include("vue/footer.php");
?>
