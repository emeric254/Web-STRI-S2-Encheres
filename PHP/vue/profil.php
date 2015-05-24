<?php
/* «profil.php»
 * page affichant le profil d'un utilisateur
 *
 * vars
 * $profil  (le profil de l'utilisateur)
 *
 */
?>
        <div class="container">

            <div class="jumbotron">

                <div class="page-header">
                    <div class="row">

                        <div class="col-sm-6 col-md-6 col-lg-7">
                            <h1>
                                <?php print "$profil->prenom $profil->nom"; ?>
                            </h1>
                        </div>

                        <div class="col-sm-1 col-md-2 col-lg-2">
                        </div>

                        <div class="col-sm-5 col-md-4 col-lg-3">
                            <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="<?php print "profil/$profil->photo"; ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="well">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <b>
                                            Informations personnelles
                                        </b>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        Email
                                    </td>
                                    <td class="text-center">
                                        <a href="mailto:<?php print $profil->email; ?>"><?php print $profil->email; ?> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        T&eacute;l&eacute;phone
                                    </td>
                                    <td class="text-center">
                                        <?php print $profil->telephone; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        Adresse
                                    </td>
                                    <td class="text-center">
                                        <?php print $profil->adresse; ?>,
                                        <?php print $profil->ville; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
