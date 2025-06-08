<?php
// Alıcı e-posta adresi (burayı kendi e-posta adresinle değiştir)
$to = "vahitemrebakioglu@gmail.com"; // örnek: info@agminsaat.com

// Formdan gelen verileri al
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$subject = $_POST['subject'] ?? 'Konu belirtilmemiş';
$message = $_POST['message'] ?? '';

// E-posta başlığı
$headers = "From: $name <$email>" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8";

// E-posta içeriği
$body = "İsim Soyisim: $name\n";
$body .= "E-Posta: $email\n";
$body .= "Telefon: $phone\n";
$body .= "Konu: $subject\n\n";
$body .= "Mesaj:\n$message";

// E-postayı gönder
$success = mail($to, "İletişim Formu: $subject", $body, $headers);

// Duruma göre yönlendirme veya mesaj
if ($success) {
    echo "<script>alert('Mesajınız başarıyla gönderildi.'); window.history.back();</script>";
} else {
    echo "<script>alert('Mesaj gönderilemedi. Lütfen daha sonra tekrar deneyin.'); window.history.back();</script>";
}
?>
