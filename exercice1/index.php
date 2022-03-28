<?php
// TABLEAU (id, prenom, nom , age)
//  AFFICHER l'age de la personne dans 50 ans
//  Bonjour PRENOM , NOM! dans 50 ans vous aurez x ans

$information = array(
"id" => 5,
"prenom" => "Teddy",
"nom" => "Williot",
"age" => 21,
);

echo "Bonjour"." ".$information["prenom"]." ".$information["nom"]." "."dans 50 ans vous aurez"." ".($information["age"] + 50)." "."mais la vous avez"." ".$information["age"]." "."ans";

echo "<br/>";

?>

<!-- test function mail() -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form  method="POST">
    <label>nom</label>
    <input type="text" name="name">
    <label>mail</label>
    <input type="mail" name="mail">
    <label>message</label>
    <textarea name="" id="" cols="30" rows="10"></textarea>
    <button type="submit">Valider</button>
  </form>
</body>
<?php



//! je cree un tableau message erreur
$errors = [];



//!       si cette clé n'existe pas ou quel est vide afficher erreur
if (!array_key_exists("name", $_POST) || $_POST['name'] == "") {
    $errors['name'] = "Vous n'avait pas renseigner votre nom";
}
//!       si cette clé n'existe pas ou quel est vide afficher erreur
if (!array_key_exists("mail", $_POST) || $_POST['mail'] == "" || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $errors['mail'] = "Vous n'avait pas renseigné un email valide";
}
//!     si cette clé n'existe pas ou quel est vide afficher erreur
if (!array_key_exists("message", $_POST) || $_POST['message'] == "") {
    $errors['message'] = "Vous n'avait pas renseigné votre message";
}
//! Si c'est different de erreur renvoyer sur la page
session_start();
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;

    // header('location:index.php');
    //! sinon
} else {
    // passer session a true pour echo message envoyer
    $_SESSION['success'] = 1;
    // je recupere les valeurs de mon form
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];
    // j' attribue mes valeur a une variable message
    $msg = "Nom:\t$name\n";
    $msg .= "Email:\t$mail\n";
    $msg .= "Message:\t$message\n";

    $headers = 'From: webmaster@example.com' . "\r\n" .
        "Reply-To: \t$mail" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // mail = envoyer mail à ...gmail.co, Objet du mail, message, de qui
    mail("williotteddy.php@gmail.com", "Formulaire de contact", $msg, $headers);
    header('location:index.php');
}
?>



</html>
