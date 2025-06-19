<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Server-Einstellungen
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lukasyt887@gmail.com'; // Deine Gmail-Adresse
        $mail->Password = 'kcrt garg vhdx dkzj'; // App-Passwort (nicht normales Passwort!)
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Absender / Empfänger
        $mail->setFrom('lukasyt887@gmail.com', 'MysteryMC Bewerbung');
        $mail->addAddress('mysterymcservices@gmx.de');

        // Inhalt der Mail
        $bewerbung = $_POST["bewerbung"];
        $mail->Subject = 'MysteryMC Team Bewerbung';
        $mail->Body = 
            "Neue Bewerbung:\n\n" .
            "E-Mail: " . $_POST["email"] . "\n" .
            "Rolle: " . $bewerbung . "\n" .
            "Ingame Name: " . $_POST["ingame"] . "\n" .
            "Discord Name: " . $_POST["discord"] . "\n" .
            "Alter: " . $_POST["alter"] . "\n" .
            "Seit wann auf dem Server: " . $_POST["seitwann"] . "\n" .
            "Warum [{$bewerbung}]: " . $_POST["warum"] . "\n" .
            "Erfahrung: " . $_POST["erfahrung"] . "\n" .
            "Stärken: " . $_POST["staerken"] . "\n" .
            "Schwächen: " . $_POST["schwaechen"] . "\n" .
            "Unterscheidung: " . $_POST["unterscheidung"] . "\n";

        $mail->send();
        echo "Danke für deine Bewerbung!";
    } catch (Exception $e) {
        echo "Fehler: {$mail->ErrorInfo}";
    }
} else {
    echo "Ungültige Anfrage.";
}
?>
