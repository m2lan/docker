<?php
$conn = new mysqli('compose-mysql', 'root', '123456');

if ($conn->connect_error) {
    die('链接失败: ' . $conn->connect_error);
}

echo '链接成功';