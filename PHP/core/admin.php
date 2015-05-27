<?php
/* «admin.php»
 *
 *
 * vars
 *
 */

include_once('core/model.php');
include_once('core/class.php');

if(isset($_SESSION['id']) and !empty($_SESSION['id']) && $isadmin)
{
    include_once("/vue/admin/menugestion.php");
}
else
{
    ?>
        <script>window.location="/?page=connexion";</script>
    <?php
}
?>
