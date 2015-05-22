<?php
/* «vente.php»
 * page affichant les details d'une vente
 *
 * vars
 * $titreVente
 * $tempsVente
 * $prixVente
 * $nbEnchereVente
 * $photoVente
 * $descriptionVente
 *
 * $encherisseursVente (tab des encherisseurs)
 *
 * //@TODO commentaires ?
 *
 */
?>
            <div class="jumbotron">
                <h1 style="text-align: center;">
                    <?php print $titreVente; ?>
                </h1>
            </div>

            <div class="well">
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-4 text-center">
                        <h3>
                            <span class="label label-warning">
                                <?php print $tempsVente; ?>
                            </span>

                            &nbsp;
                            <span class="label label-info">
                                <?php print $prixVente; ?>
                                €
                                <span class="badge">
                                    <?php print $nbEnchereVente; ?>
                                </span>
                            </span>
                        </h3>
                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="<?php print $photoVente; ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
                    </div>
							<div class="col-sm-7 col-md-8 col-lg-8">
						<div style="padding-top: 10px;">
							<div class="well">
								<p>
									<?php print $descriptionVente; ?>
								</p>
							</div>
						</div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="col-md-5 col-lg-5">
                    <h2>
                        Derniers encherisseurs :
                    </h2>
                </div>
                <div class="col-md-7 col-lg-7">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Enchere
                                </th>
                                <th>
                                    Depuis
                                </th>
                            </tr>
                        </thead>
                        <tbody>
<?php
//foreach(encherisseursVente)
/*
?>
                            <tr>
                                <td>
                                    <?php print $nom; ?>
                                </td>
                                <td>
                                    <span class="label label-info">
                                        <?php print $prix; ?>
                                        €
                                    </span>
                                </td>
                                <td>
                                    <span class="label label-warning">
                                        <?php print $temps; ?>
                                    </span>
                                </td>
                            </tr>
<?php
*/
//
?>
                        </tbody>
                    </table>
                </div>
            </div>
