<?php
/* «resume-article.php»
 * bout de page d'affichage du résumé des infos d'un article
 *
 *
 * vars
 *  > $vente    (objet "vente")
 *
 *
 * // @ TODO decompte auto, je sait comment faire, no stress je le ferai
 *
 */
?>
            <!-- Article -->
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <a class="btn btn-default" href="http://google.fr">
                                <i class="fa fa-code-fork"></i>
                                Voir
                            </a>
                        </div>
                        <h4>
                            <?php print $vente->nom; ?>

                            &nbsp;
                            <span class="label label-warning">
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
