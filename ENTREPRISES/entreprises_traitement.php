<html>

    <head>
	    <meta charset="utf-8">
        <title>Ajout dans la BDD</title>
    </head>

    <body>

<?php

// Connexion à la base de données 'geo_depoffre'
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=geo_depoffre;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

// Requête préparée
$req = $bdd->prepare('INSERT INTO entreprise_offre(
                Société,
                Nom,
                Prénom,
                Téléphone,
                Fax,
                Email,
                Fonction,
                Adresse,
                Code_postal,
                Ville,
                Formation,
                Nombre_apprentis,
                Durée_formation,
                Descriptif_formation,
                Contact_candidats,
                Recrutement_autonome)

                          VALUES (
                :societe,
                :nom,
                :prenom,
                :telephone,
                :fax,
                :email,
                :fonction,
                :adresse,
                :code_postal,
                :ville,
                :formation,
                :nombre_apprentis,
                :duree_formation,
                :descriptif_formation,
                :contact_candidats,
                :recrutement_autonome)');

// Remplissage de la BDD
if (isset($_POST['nombre_apprentis']))
{
    $req->execute(array(
        'societe' => strip_tags($_POST['societe']),
        'nom' => strip_tags($_POST['nom']),
        'prenom' => strip_tags($_POST['prenom']),
        'telephone' => strip_tags($_POST['telephone']),
        'fax' => strip_tags($_POST['fax']),
        'email' => strip_tags($_POST['email']),
        'fonction' => strip_tags($_POST['fonction']),
        'adresse' => strip_tags($_POST['adresse']),
        'code_postal' => $_POST['code_postal'],
        'ville' => strip_tags($_POST['ville']),
        'formation' => strip_tags($_POST['formation']),
        'nombre_apprentis' => $_POST['nombre_apprentis'],
        'duree_formation' => strip_tags($_POST['duree_formation']),
        'descriptif_formation' => strip_tags($_POST['descriptif_formation']),
        'contact_candidats' => $_POST['contact_candidats'],
        'recrutement_autonome' => strip_tags($_POST['recrutement_autonome']),

    ));
}
// Message de chargement réussi
echo 'Vôtre nouvelle entrée a bien été ajoutée à la base de données';
?>
    </body>

</html>

