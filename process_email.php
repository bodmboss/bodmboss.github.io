<?php
// Подключаемся к базе данных
$servername = "localhost";
$username = "bodmbo5e_users";
$password = "Super_min1";
$dbname = "bodmbo5e_users";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем соединение с базой данных
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Получаем данные формы и сохраняем email в базу данных
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sql = "INSERT INTO emails (email) VALUES ('$email')";
if (mysqli_query($conn, $sql)) {
  // Отправляем ответ клиенту
  header('Content-Type: application/json');
  echo json_encode(['success' => true]);
} else {
  // Отправляем ответ клиенту
  header('Content-Type: application/json');
  echo json_encode(['success' => false]);
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>
