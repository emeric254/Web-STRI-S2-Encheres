<?php
/* «recherche.php»
 * page de recherche d'un utilisateur ou d'une vente
 *
 * se decompose en plusieurs parties
 *
 * >    choix du type de recherche
 * >>   rechercher un utilisteur
 * >>   rechercher une vente
 *
 * vars
 * $choix (defaut=menu, 1=utilisateur, 2=vente)
 *
 */
?>
        <!-- Titre -->
        <div class="well">
            <div class="container theme-showcase" role="main" >
                <h1>
                    <i class="fa fa-search"></i>
                    Recherche
                </h1>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">
<?php

if(!isset($choix))
    $choix = 0;

switch($choix)
{
    case 1: // utilisateur
?>
            <!-- Formulaire utilisateur-->
            <form class="form" method="post" action="/?page=recherche&c=1">
                <div class="well">
                    <div class="row" style="margin-top:10px; margin-bottom:20px;">
                        <!-- Mot Clef -->
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                                <label for="inputUser" class="sr-only">
                                    Utilisateur
                                </label>
                                <input <?php if(isset($recherche) and !empty($recherche)){ echo "value=$recherche ";}?>type="search" id="inputUser" name="inputUser" class="form-control" placeholder="mail ou nom de l'utilisateur" required autofocus>
                            </div>
                        </div>
                        <!-- Submit -->
                        <div class="col-sm-3">
                            <button class="btn btn-md btn-primary btn-block" type="submit">Rechercher</button>
                        </div>
                    </div>
                </div>
            </form>
<?php
        break;
    case 2: // vente
?>
            <!-- Formulaire vente-->
            <form class="form" method="post" action="/?page=recherche&c=2">
                <div class="jumbotron">
                    <div class="row" style="margin-top:10px; margin-bottom:20px;">
                        <!-- Mot Clef -->
                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                                <label for="inputMotClef" class="sr-only">
                                    Mot clef
                                </label>
                                <input <?php if(isset($recherche) and !empty($recherche)){ echo "value=$recherche ";}?>type="search" id="inputMotClef" name="inputMotClef" class="form-control" placeholder="Mot clef" required autofocus>
                            </div>
                        </div>
                        <!-- Categorie -->
                        <div class="col-sm-3">
                            <div class="input-group">
                                <label for="inputCategorie" class="sr-only">
                                    Categorie
                                </label>
                                <!-- <select multiple="multiple" id="inputCategorie"> -->
                                <select class="form-control"  id="inputCategorie" name="inputCategorie">
                                    <option value='null'>Toute les categories</option>
<?php
        foreach ($listCat as $idCat => $nomCat)
        {
            if(isset($cat) and !empty($cat))
            {
                if($cat==$idCat)
                {
            ?>
                                    <option selected='selected' value='<?= $idCat ?>'><?= $nomCat ?></option>
            <?php
                }
                else
                {
            ?>
                                    <option value='<?= $idCat ?>'><?= $nomCat ?></option>
            <?php
                }
            }
            else
            {
        ?>
                                    <option value='<?= $idCat ?>'><?= $nomCat ?></option>
        <?php
            }
        }
?>
                                </select>
                            </div>
                        </div>
                        <!-- Submit -->
                        <div class="col-sm-2">
                            <button class="btn btn-md btn-primary btn-block" type="submit">Chercher</button>
                        </div>
                    </div>
                </div>
            </form>
<?php
        break;
    default:    // menu
?>
            <!-- Choix «quoi» rechercher -->
            <div class="text-center" style="margin-top:4em;">
                <div class="col-sm-5">
                    <h1>
                        <span class="label label-info">
                            <a href="/?page=recherche&c=2">
                                <i class="fa fa-search"></i>
                                &nbsp;
                                Vente
                            </a>
                        </span>
                    </h1>
                </div>

                <div class="col-sm-2">
                    &nbsp;
                </div>

                <div class="col-sm-5">
                    <h1>
                        <span class="label label-info">
                            <a href="/?page=recherche&c=1">
                                <i class="fa fa-search"></i>
                                &nbsp;
                                Utilisateur
                            </a>
                        </span>
                    </h1>
                </div>
            </div>
<?php
} // fin switch
?>
