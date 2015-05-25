<?php
/* «resume-article.php»
 * bout de page d'affichage du résumé des infos d'un article
 *
 *
 * vars
 *  > $vente    (objet "vente")
 *  > $isadmin      (booleen pour la gestion pour les admin, (user courant == admin) ? )
 *
 */
?>
            <!-- Article -->
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <a class="btn btn-default" href="/?page=vente&id=<?php print $vente->id; ?>">
                                <i class="fa fa-code-fork"></i>
                                Voir
                            </a>
                        </div>
<?php
    if($admin)
    {
?>
                        <div class="btn-group pull-right">
                            <a class="btn btn-default" href="http://google.fr">
                                <i class="fa fa-trash-o"></i>
                                Supprimer
                            </a>
                        </div>
<?php
    }
?>
                        <h4>
                            <?php print $vente->nom; ?>

                            &nbsp;
                            <span class="label label-warning" id="tempsRestant<?php print $vente->id; ?>">
<!--
                                @ TODO temps restant
-->
                            </span>

                            &nbsp;
                            <span class="label label-info">
                                <?php print $vente->prix; ?>
                                <span class="badge">
                                    <?php print $vente->nbEncherisseur; ?>
                                </span>
                            </span>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <p class="pull-left">
                                <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="<?php print $vente->photo; ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right">
                                <?php print $vente->description; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">

    function decompte<?= $vente->id ?>()
    {
        var dateActuelle = new Date();

        // @ TODO a verif que ca marche de creer la date de debut comme ca !
        var dateDebut = new Date("<?= $vente->date ?>");

        // @ TODO a verif que ce soit des secondes !
        var duree = <?= $vente->tempsRestant ?>;

        var total = duree - (dateActuelle - dateDebut)/1000 ;

        var compteRebour = document.getElementById("tempsRestant<?= $vente->id ?>");

        if (total <= 0)
        {
            compteRebour.innerHTML = 'Finie !';
        }
        else
        {
            var jours = Math.floor(total / (60 * 60 * 24));
            var heures = Math.floor((total - (jours * 60 * 60 * 24)) / (60 * 60));
            var minutes = Math.floor((total - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
            var secondes = Math.floor(total - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));

            compteRebour.innerHTML = ((jours>0)?jours + 'j ':'') + ((heures>0)?heures + 'h ':'') + ((minutes>0)?minutes + 'm ':'') + secondes + 's';
        }
            setTimeout("decompte<?= $vente->id ?>();", 1000);
    }

    decompte<?= $vente->id ?>();

</script>
