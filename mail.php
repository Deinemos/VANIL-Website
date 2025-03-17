<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $mail_to = "beauty.salon.vanil@gmail.com";
       $subject = "Заявка з сайту";
       $name = str_replace(array("\r", "\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
       $surname = str_replace(array("\r", "\n"),array(" "," ") , strip_tags(trim($_POST["surname"])));
       $phone = $_POST["phone"];
       $service = $_POST["service"];
       $message = $_POST["message"];

        $content = "Ім'я: $name\n";
        $content .= "Прізвище: $surname\n";
        $content .= "Телефон:  $phone\n";
        $content .= "Послуга:  $service\n";
        $content .= "Повідомлення:  $message\n";

        $headers = "Форма: $name <$service>";

        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            http_response_code(200);
            echo "Дякуємо, вашу заявку прийнято.";
        } else {
            http_response_code(500);
            echo "Щось пішло не так, заявку не відправлено.";
        }

} else {
    http_response_code(403);
    echo "Виникла проблема з відправкою. Повторіть спробу пізніше.";
}
