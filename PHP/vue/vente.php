<?php
/* «vente.php»
 * page affichant les details d'une vente
 *
 *
 * vars :
 *  > $vente    (objet "vente")
 *  > $appartenue   (booleen si cette enchere et la notre)
 *  > $encherissable    (booleen si onpeut enchrir)
 *
 * // @ TODO pour une evolve future :
 *  > $encherisseursVente (tableau de "profil")
 *
 */
?>
            <div class="well">
                <div class="container theme-showcase" role="main" >
                    <h1>
                        <i class="fa fa-cart-plus"></i>
                        <?php print $vente->nom; ?>
                    </h1>
                </div>
            </div>

            <div class="well">
                <div class="row text-center">
                    <div class="col-md-6 col-lg-6 text-center">
                        <h4>
                            <span class="label label-danger" id="tempsRestant">
                                <!-- temps restant -->
                                0
                            </span>
                            &nbsp;
                        </h4>
                        <h4>
                            <span class="label label-info">
                                Enchère crée par
                                <a href="/?page=profil&id=<?php print $vente->Vendeur->id; ?>">
                                    <?php print $vente->Vendeur->nom; ?>
                                </a>
                            </span>
                            &nbsp;
                        </h4>
                    </div>
                    <div class="col-md-6 col-lg-6 text-center">
                        <h4>
                            <span class="label label-warning">
                                <?php print $vente->prix; ?>
                                €
                                <span class="badge">
                                    <?php print $vente->nbEncherisseur; ?>
                                </span>
                            </span>
                        </h4>
                        <h4>
                            <span class="label label-info">
                                Dernière enchère par
                                <a href="?page=profil&id=<?php print $vente->Acheteur->id; ?>">
                                    <?php print $vente->Acheteur->nom; ?>
                                </a>
                            </span>
                            &nbsp;
                        </h4>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-5 col-md-4 col-lg-4 text-center">
                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="vente/<?php print $vente->photo; ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-8">
                        <div style="padding-top: 10px;">
                            <div class="well">
                                <p>
                                    <?php print $vente->description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    if($encherissable)
    {
?>
            <!-- Enchérir -->
            <div class="container">
                <div class="well">
                    <div class="row text-center">
                        <form action="xxxxxxx.php">
                            <div class="input-group">
                                <input type="number" min="<?php print ($vente->prix + $vente->pas); ?>" value="<?php print ($vente->prix + $vente->pas); ?>" class="form-control" placeholder="Ench&eacute;re">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" type="button">
                                        <i class="fa fa-cart-arrow-down"></i>
                                        Ench&eacute;rir!
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
    }
    else
        if($appartenue)
        {
?>
            <div class="container">
                <h4>
                    <span class="label label-danger">
                        <a href="xxx.php" onclick="if(confirm('Etes vous sur de vouloir retirer votre vente ?')) document.location.href = this.href + '?verified' ; return false;">
                            <i class="fa fa-trash-o"></i>
                            Retirer votre vente
                        </a>
                    </span>
                </h4>
            </div>
<?php
        }
?>


<?php
// @ TODO pour une evolve future !
/*
<!--
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
                                    <?php print $profil->nom; ?>
                                </td>
                                <td>
                                    <span class="label label-info">
                                        <?php print $profil->enchere; ?>
                                        €
                                    </span>
                                </td>
                                <td>
                                    <span class="label label-warning">
                                        <?php print $profil->date; ?>
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
-->
*/
?>



<!--
Script de decompte pour le temps restant !
-->

<script type="text/javascript">

    function decompte()
    {
        var dateActuelle = new Date();

        // @ TODO a verif que ca marche de creer la date de debut comme ca !
        var dateDebut = new Date("<?php print $vente->date; ?>");

        // @ TODO a verif que ce soit des secondes !
        var duree = <?php print $vente->tempsRestant; ?>;

        var total = duree - (dateActuelle - dateDebut)/1000 ;

        var compteRebour = document.getElementById("tempsRestant");

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

            compteRebour.innerHTML = jours + 'j ' + heures + 'h ' + minutes + 'm ' + secondes + 's';
        }
            setTimeout("decompte();", 1000);
    }

    decompte();

</script>
