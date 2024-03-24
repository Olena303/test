<?php
// Подключаем файлы PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
// Настройки SMTP сервера
$host = 'smtp.ukr.net'; // Адрес вашего SMTP сервера
$userName = 'infix2022@ukr.net'; // Ваше имя пользователя SMTP
$passwordServer = 'Nv5ZeVlG2Ja1CvVV'; // Ваш пароль SMTP
$secure = 'ssl'; // Установите 'tls' или 'ssl' в зависимости от вашего SMTP сервера
$port = 465; // Порт SMTP сервера


// Проверяем, был ли отправлен POST запрос
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Собираем данные из формы
    $name = isset($_POST["name"]) ? strip_tags(trim($_POST["name"])) : "";
    $email = isset($_POST["email"]) ? strip_tags(trim($_POST["email"])) : "";
    $phone = isset($_POST["phone"]) ? strip_tags(trim($_POST["phone"])) : "";
    $password = isset($_POST["password"]) ? strip_tags(trim($_POST["password"])) : "";
    $city = isset($_POST["city"]) ? strip_tags(trim($_POST["city"])) : "";

    // Проверяем валидность данных
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match("/^\+?\d{10,15}$/", $phone)) {
        $errors[] = "Invalid phone number format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if (empty($city)) {
        $errors[] = "City is required.";
    }

    // Если есть ошибки, возвращаем их
    if (count($errors) > 0) {
        echo json_encode(['errors' => $errors]);
        exit;
    }

    // Отправка email
    $mail = new PHPMailer(true);
    try {
        
        $mail->isSMTP();
        $mail->Host = $host; 
        $mail->SMTPAuth = true;
        $mail->Username = $userName; 
        $mail->Password = $passwordServer;
        $mail->SMTPSecure = $secure; 
        $mail->Port = $port; 

  
        $mail->setFrom($userName, 'Webmaster');

        // Кому
        $mail->addAddress($email);

        // Тема
        $mail->Subject = 'Form Submission: ' . $name;

        // Тело сообщения
        $mail->Body = "Name: {$name}\nEmail: {$email}\nPassword: {$password}\nPhone: {$phone}\nCity: {$city}";

        // Отправляем сообщение
        $mail->send();
        echo json_encode(['success' => 'Thank you for contacting us, we will get back to you shortly.']);
    } catch (Exception $e) {
        echo json_encode(['errors' => 'Error sending email. Please try again later.']);
    }
} else {
    // Если не POST запрос, выводим ошибку
    header('HTTP/1.1 403 Forbidden');
    echo "You do not have permission to access this page directly.";
}
?>
