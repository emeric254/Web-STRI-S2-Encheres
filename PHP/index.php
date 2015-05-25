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


    if(file_exists("core/$page.php"))
    {
        $path = "core/$page.php";
    }
    else
    {
        $errMsg = "page introuvable";

        if (isset($_GET['errMsg']) and !empty($_GET['errMsg']))
        {
            $errMsg = htmlspecialchars($_GET['errMsg']);
        }

        $path = "vue/erreur.php";

    }

    include("vue/entete.php");
    include("core/navbar.php");

    include_once($path);

    include("vue/footer.php");
?>
