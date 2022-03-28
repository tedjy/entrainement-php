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
