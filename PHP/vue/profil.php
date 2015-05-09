<?php
/* «profil.php»
 * page affichant le profil d'un utilisateur
 * 
 * vars
 * $prenomClient
 * $nomClient
 * $mail
 * $numeroTelephone
 * $adresse
 *
 */
 include_once('core/profil.php'); 
?>

        <div class="container">
			
			<div class="jumbotron">
				<div class="page-header">
					<div class="row">
						
						<div class="col-sm-6 col-md-6 col-lg-7">
							<h1>
								<?php print "$prenomClient $nomClient"; ?>
							</h1>
						</div>
						
						<div class="col-sm-1 col-md-2 col-lg-2">
						</div>
						
						<div class="col-sm-5 col-md-4 col-lg-3">
							<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9Ijc1IiB5PSIxMDAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4yMDB4MjAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 200px; height: 200px;">
						</div>
						
					</div>
				</div>
				
				<div class="row">
					<div class="well">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="2">
										<b>
											Informations personelles
										</b>
									</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Email
									</td>
									<td>
										<?php print $mail; ?>
									</td>
								</tr>
								<tr>
									<td>
										Telephone
									</td>
									<td>
										<?php print $numeroTelephone; ?>
									</td>
								</tr>
								<tr>
									<td>
										Adresse
									</td>
									<td>
										<?php print $adresse; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        
        </div>

