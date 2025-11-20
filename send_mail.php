<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dobivanje podataka iz forme
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email na koji se šalje
    $to = "luka.buga@gmail.com"; // zamijeni s tvojom adresom
    $subject = "Nova poruka sa kontakt forme";

    // Sadržaj emaila
    $body = "Ime i prezime: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Poruka:\n$message";

    // Zaglavlja emaila
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Slanje emaila
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Hvala! Vaša poruka je poslana.'); window.location.href='kontakt.html';</script>";
    } else {
        echo "<script>alert('Došlo je do greške. Pokušajte ponovno.'); window.location.href='kontakt.html';</script>";
    }
} else {
    // Ako netko pokuša direktno otvoriti PHP
    header("Location: kontakt.html");
    exit();
}
?>
