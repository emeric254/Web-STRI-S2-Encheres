<?php
/* «profil.php»
 * page affichant le profil d'un utilisateur
 *
 * vars
 *  > $profil  (le profil de l'utilisateur)
 *  > $identify     (booleen pour savoir si oui ou non ce profil est celui de l'utilisateur connecté)
 *  > $isadmin      (booleen pour la gestion pour les admin, (user courant == admin) ? )
 *
 */
?>
        <div class="container">

            <div class="well">

                <div class="page-header">
                    <div class="row">

                        <div class="col-sm-6 col-md-6 col-lg-7">
                            <h1>
                                <?php print "$profil->prenom $profil->nom"; ?>
                            </h1>
                        </div>

                        <div class="col-sm-1 col-md-2 col-lg-2">
                        </div>

                        <div class="col-sm-5 col-md-4 col-lg-3" style="height: 200px;">
                            <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="<?= $profil->photo ?>" data-holder-rendered="true" style="max-width: 200px; max-height: 200px;">
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
<?php
    if($id)
    {
?>
            <div class="container text-center">
                <h4 class="col-sm-6">
                    <span class="label label-danger">
                        <a href="/?page=gestionBd&action=supprimerProfil&idAction=<?php print $profil->id; ?>" onclick="if(confirm('Etes vous sur de vouloir supprimer votre compte ?')) document.location.href = this.href ; return false;">
                            <i class="fa fa-trash-o"></i>
                            Supprimer votre compte
                        </a>
                    </span>
                </h4>

                <h4 class="col-sm-6">
                    <span class="label label-warning">
                        <a href="/?page=modificationProfil&id=<?php echo $_SESSION['id'];?>">
<!--
                            @ TODO renvoi vers la page inscription avec infos pré-completées
-->
                            <i class="fa fa-cogs"></i>
                            Modifier votre compte
                        </a>
                    </span>
                </h4>
            </div>
<?php
    }
    else
        if($isadmin)
        {
?>
            <div class="container">
                <h4 class="col-sm-6">
                    <span class="label label-danger">
                        <a href="/?page=gestionBd&action=supprimerProfil&idAction=<?php print $profil->id; ?>" onclick="if(confirm('Etes vous sur de vouloir supprimer ce compte ?')) document.location.href = this.href ; return false;">
                            <i class="fa fa-trash-o"></i>
                            Supprimer ce compte
                        </a>
                    </span>
                </h4>
            </div>
<?php
        }
?>
        </div>
