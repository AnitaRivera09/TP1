<?php
require_once("functions.php");

//Attribuer des valeurs aux variables
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$utilisateur = $_POST['utilisateur'];
$motdepasse = $_POST['motdepasse'];
$confirmation = $_POST['confirmation'];
$validaok=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

   //Validation du champ Nom
    if (empty($nom)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Nom";
    }

    //Validation du champ Prénom
    if (empty($prenom)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Prenom";
    }

    //Validation du champ Utilisateur
    if (empty($utilisateur)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Utilisateur";
    }

    //Validation du champ Mot de Passe
    if (empty($motdepasse)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Mot de Passé";
    }

    //Validation du champ Confirmation Mot de Passe
    if (empty($confirmation)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Confirmation Mot de Passé";
    }

    //S'il y a des champs vides, affichez un message d'erreur...
    foreach ($errors as $error) {
        echo $error . "<br>";
    }

 }    
    //Validation pour savoir si la clé est égale à la confirmation

    if ($motdepasse == $confirmation){
       $validaok=1;
    }else{
        echo ("Attention! le mot de passe saisi n'est pas le même que la confirmation, veuillez vérifier !");
    }    
     
     //Validation du nombre de caractères dans le mot de passe
      $length = strlen($motdepasse);
      if (($length < 6) || ($length > 10)){
        echo "! Votre mot de passe doit contenir entre 6 et 10 caractères, veuillez vérifier !";
      }else{
        if($validaok==1){
        echo "</br>";
        $saltedName = addSalt($_POST['motdepasse']);
        //var_dump($saltedName);
        
        //Impression de données
        $encodeName = encodeName($saltedName);
        echo "</br>";
        echo "Les données saisies sont :";
        echo "</br>";
        echo "</br>";
        echo "</br> Votre Nom est : " . $nom;
        echo "</br>";
        echo "</br> Votre Prenom est : " . $prenom;
        echo "</br>";
        echo "</br> Votre Utilisateur est : " . $utilisateur;
        echo "</br>";
        echo "</br> Votre Mot de Passe est : " . $encodeName;
        echo "</br>";
        echo "</br>";
      }
    }


$nomLengthIsValid = nomLengthIsValid($_POST['nom']);
echo "</br>";
//var_dump($nomLengthIsValid);
if (!$nomLengthIsValid['isValid']){

}

$prenomLengthIsValid = prenomLengthIsValid($_POST['prenom']);
echo "</br>";
//var_dump($prenomLengthIsValid);
if (!$prenomLengthIsValid['isValid']){

}

$motLengthIsValid = motLengthIsValid($_POST['motdepasse']);
echo "</br>";
//var_dump($motLengthIsValid);
if (!$motLengthIsValid['isValid']){

}

?>
<a href="./formulaire.php">Retour au formulaire principal</a>