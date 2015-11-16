<!DOCTYPE html>

<html lang="fr">

    <head> <!-- EN TETE -->

        <meta charset="UTF-8">
        <link rel="stylesheet" href="style1.css" />
        <title>INSCRIPTION JEUNE</title>
		<script src="jquery-2.1.4.min.js"></script>
   
	<script>
		function valider(){
		var a =$("#dateNaissance").val();	
		console.log(getAge(a));
			}
		function getAge(dateString) 
		{
    	var today = new Date();
    	var birthDate = new Date(dateString);
    	var age = today.getFullYear() - birthDate.getFullYear();
    	var m = today.getMonth() - birthDate.getMonth();
    	if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    		{
        		age--;
    		}

		if (age>18){
			console.log("plus de 18");
			$("#bloc").show();
		}else{
			console.log("moins de 18");
			$("#bloc").hide();   
		}
    return age;
   
}

	</script>
	
	
	
    </head>

    <body> <!-- CORPS -->

	 <!-- CODE POUR VERIFICATION DE DATE DE NAISSANCE -->



		<?php
			$today = getdate();
			$age="";
		
 
			if(isset($_POST['dateNaissance'])){
				$age=$_POST['dateNaissance'];
				$date = new DateTime($_POST['dateNaissance']);
				$now = new DateTime();
				$interval = $now->diff($date);
				if (($interval->y)>18){
				
				}
					else{
						
		
						}
 
 }
  
			/*print_r($today);*/
			?>
			
<!--   ---------------------------------------------------- -->
	
	
	
        <section class="section-jeune">

            <h1 class="jeune-header">INSCRIPTION JEUNE</h1>  <!-- TITRE DYNAMIQUE-->

            <form action="inscription.php" method="post"> <!-- FORMULAIRE -->

            <div class="block_haut"> <!-- ZONES DE SAISIE-->

            <div class="block_gauche"> <!-- PARTIE GAUCHE -->

            <p><label>Nom* :</label></p>
			<p><input type="text" name="nom" id="nom" placeholder="Nom" /></p>
			
			<p><label>Prénom* :</label></p>
			<p><input type="text" name="prenom" id="prenom" placeholder="Prénom"/></p>
			
			<p><label>Téléphone* :</label></p>
			<p><input type="tel" name="tel" id="tel" placeholder="Téléphone"/></p>	
			
			<p><label>Email* :</label></p>
			<p><input type="email" name="mail" id="mail" placeholder="E-mail"/></p>
			
			<p><label>Date de naissance*: </label></p>
			<form action="inscription.php"  method="post"></p>
			<p><input type="date" id="dateNaissance" value="<?php echo $age ?>" name="dateNaissance" align="center"><p>
			<input type="button" value="Valider" onclick="valider()" align="center"></p>
			</form>
			
			<div id="bloc" style="display:none">
				<input type="checkbox" name="1" value="PermisB">Permis B
				<input type="checkbox" name="2" value="Vehicule"> Vehiculé
			</div>

			
				 <p><label for="pays">Formation à réaliser* :</label><br /></p>
					<p><select name="Formation" id="Formation" placeholder="Selectionné">
						<option value="tisec">BAC PRO TISEC</option>
						<option value="bpmacon">BP Macon</option>
						<option value="bpmenui">BP Menuisier</option>
						<option value="ferronier">CAP Ferronier d'art</option>
						<option value="sanitaire">CAP Installateur Sanitaire</option>
						<option value="thermique">CAP Installateur Thermique</option>
						<option value="capmacon">CAP Macon</option>
						<option value="menuiF">CAP Menuisier Fabricant</option>
						<option value="menuiIns">CAP Menuisier Installateur</option>
						<option value="peintreRevet">CAP Peintre Appli de Revetement</option>
						<option value="proelec">CAP Pro Elec</option>
						<option value="serrurier">CAP Serrurier Metallier</option>
						<option value="staffeur">CAP Staffeur Ornemaniste</option>
						<option value="dima">DIMA</option>
						<option value="plaquiste">MC plaquiste</option>
					</select></p>
			
			
           </div>

                    <div class="block_droit"> <!-- PARTIE DROITE -->

                     	<p><label>Adresse* :</label></p>
						<p><input type="text" name="adresse" id="adresse" placeholder="Adresse" /></p>
						<p><label>Code Postal*:</label></p>
						<p><input type="num" name="cp" id="cp" placeholder="Zip Code"/></p>  
						<p><label for="pseudo">Ville *:</label></p>
						<p><input type="text" name="Ville" id="Ville" placeholder="Ville"/></p>
						<p><label>Deposez votre CV* :</label> </p>
						<p><input type="" name="" id="mail" placeholder="Deposer votre CV"/></p>
						<p><input type="file" name="avatar" placeholder="..."/></p>

						<p><form method="POST" action="upload.php" enctype="multipart/form-data">
						<!-- On limite le fichier à 100Ko -->
						<p><input type="hidden" name="MAX_FILE_SIZE" value="100000"/></p>
						</form></p>
						<!-- On limite le fichier à 100Ko -->
						<p><input type="hidden" name="MAX_FILE_SIZE" value="100000"/></p>
						<p><label>Deposez votre Lettre de Motivation *:</label></p>
						<p><input type="file" name="lm"/></p>
						</form>

                </div>

                </div>

                

                <div class="block_bas-inferieur"> <!-- QUESTIONS -->
				
				<p><label for="coor" align="center">Souhaitez vous que vos données soient transmise à une entreprise?</label></p>
				<p align="center">
		
				<INPUT type= "radio" name="bouton" value="oui">Oui
				<INPUT type= "radio" name="bouton" value="non">Non
				
				</p>


                <br/>

                
                </div>

				<fieldset>
					<legend align="center">VOS IDENTIFIANTS</legend>
						<form method="post" action="#.php">
						<div class="block_gauche">
						<p><label for="pseudo">Login* :</label></p>
						<p><input type="text" name="pseudo" id="pseudo" /></p>
						</div>
						<div class="block_droit">
						<p><label for="pass">Mot de passe* :</label></p>
						<p><input type="password" name="pass" id="pass" required  value=""/></p>
						</div>
						</form>
				</fieldset>
				
				
                <div class="bouton_envoi"> <!-- BOUTON D'ENVOI -->
                    <input type="image" src="img/boutonSend.png">
                </div>

            </form>

        </section> <!-- Cadre de la page-->

    </body>

</html>
