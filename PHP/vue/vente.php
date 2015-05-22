<?php
/* «vente.php»
 * page affichant les details d'une vente
 *
 * vars
 * 
 * $vente
 * 
 * $encherisseursVente (tableau de "profil")
 * 
 * 
 * un objet "vente" :
 * 	> id
 * 	> nom
 * 	> date
 * 	> tempsRestant
 * 	> nomAcheteur
 * 	> nbEncherisseur
 * 	> prix
 * 	> photo
 * 	> description
 * 
 * un objet "profil" :
 * 	> nom
 * 	> enchere
 * 	> date
 * 	> ... @ TODO
 *
 */
?>
            <div class="jumbotron">
                <h1 style="text-align: center;">
                    <?php print $vente.nom; ?>
                </h1>
            </div>

            <div class="well">
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-4 text-center">
                        <h3>
                            <span class="label label-warning">
                                <?php print $vente.tempsRestant; ?>
                            </span>

                            &nbsp;
                            <span class="label label-info">
                                <?php print $vente.prix; ?>
                                €
                                <span class="badge">
                                    <?php print $vente.nbEncherisseur; ?>
                                </span>
                            </span>
                        </h3>
                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="<?php print $vente.photo; ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
                    </div>
							<div class="col-sm-7 col-md-8 col-lg-8">
						<div style="padding-top: 10px;">
							<div class="well">
								<p>
									<?php print $vente.description; ?>
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
foreach($encherisseursVente as $profil)
{
?>
                            <tr>
                                <td>
                                    <?php print $profil.nom; ?>
                                </td>
                                <td>
                                    <span class="label label-info">
                                        <?php print $profil.enchere; ?>
                                        €
                                    </span>
                                </td>
                                <td>
                                    <span class="label label-warning">
                                        <?php print $profil.date; ?>
                                    </span>
                                </td>
                            </tr>
<?php
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
