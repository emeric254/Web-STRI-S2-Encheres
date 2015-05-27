<?php
/* «resume-profil.php»
 * bout de page d'affichage du profil en résumé
 *
 *
 * vars
 *  > $profil    (objet "profil")
 *  > $isadmin      (booleen pour la gestion pour les admin, (user courant == admin) ? )
 *
 */
?>
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <a class="btn btn-default" href="http://google.fr">
                                <i class="fa fa-code-fork"></i>
                                Voir
                            </a>
                        </div>
<?php
    if($isadmin)
    {
?>
                        <div class="btn-group pull-right">
                            <a class="btn btn-default" href="/?page=gestionBd&action=supprimerProfil&idAction=<?php print $profil->id; ?>">
                                <i class="fa fa-trash-o"></i>
                                Supprimer
                            </a>
                        </div>
<?php
    }
?>
                        <h4>
                            <?php print $profil->nom; ?>
                            &nbsp;
                            <?php print $profil->prenom; ?>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <p class="pull-left">
                                <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="/profil/<?php print $profil->photo; ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <?php print $profil->telephone; ?>
                            </p>
                            <p>
                                <?php print $profil->email; ?>
                            </p>
                            <p>
                                <?php print $profil->ville; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
