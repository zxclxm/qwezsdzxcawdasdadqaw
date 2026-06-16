<?php

error_log("=== SEND.PHP STARTED WITH RESEND ===");

$resendApiKey = getenv("RESEND_API_KEY");

if (!$resendApiKey) {
    die("Brak RESEND_API_KEY w Railway Variables.");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php?error=method#kontakt");
    exit;
}

$fullname = trim($_POST["fullname"] ?? "");
$email = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

if (empty($fullname) || empty($email) || empty($message)) {
    die("Błąd: wszystkie pola formularza muszą być wypełnione.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Błąd: nieprawidłowy adres e-mail.");
}

$safeName = htmlspecialchars($fullname, ENT_QUOTES, "UTF-8");
$safeEmail = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
$safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, "UTF-8"));

$emailBody = "
<div style='font-family: Arial, sans-serif; padding: 25px; background: #f8fafc;'>
    <div style='max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);'>
        <h2 style='color: #0d6efd;'>Witaj, {$safeName}!</h2>

        <p>Dziękujemy za skorzystanie z formularza kontaktowego na stronie <b>NovaWeb Studio</b>.</p>

        <p><b>Adres e-mail podany w formularzu:</b></p>
        <p>{$safeEmail}</p>

        <p><b>Twoja wiadomość:</b></p>

        <div style='padding: 15px; background: #f1f5f9; border-radius: 10px;'>
            {$safeMessage}
        </div>

        <p style='margin-top: 25px; color: #64748b;'>
            To jest automatyczna wiadomość wysłana przez formularz PHP przez Resend API.
        </p>
    </div>
</div>
";

$data = [
    "from" => "NovaWeb Studio <onboarding@resend.dev>",
    "to" => [$email],
    "subject" => "Potwierdzenie wysłania formularza",
    "html" => $emailBody
];

$ch = curl_init("https://api.resend.com/emails");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $resendApiKey,
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);

curl_close($ch);

error_log("Resend HTTP code: " . $httpCode);
error_log("Resend response: " . $response);

if ($curlError) {
    die("Błąd CURL: " . htmlspecialchars($curlError));
}

if ($httpCode >= 200 && $httpCode < 300) {
    header("Location: index.php?sent=1#kontakt");
    exit;
}

echo "<h2>Błąd wysyłania przez Resend</h2>";
echo "<p>Kod HTTP: {$httpCode}</p>";
echo "<pre>" . htmlspecialchars($response) . "</pre>";