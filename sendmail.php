<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);
    
    // Votre adresse email où recevoir les messages
    $to = "amehouenouparfait@gmail.com";
    
    // Construction de l'email
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    
    $headers = "From: $name <$email>";
    
    // Envoi de l'email
    if (mail($to, $subject, $email_content, $headers)) {
        http_response_code(200);
        echo "Merci ! Votre message a été envoyé.";
    } else {
        http_response_code(500);
        echo "Oops ! Quelque chose s'est mal passé.";
    }
} else {
    http_response_code(403);
    echo "Il y a eu un problème avec votre soumission, veuillez réessayer.";
}
?>