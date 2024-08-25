<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "time_records";

// สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฝั่งไคลเอ็นต์
$time = intval($_POST['time']);

// แปลงเวลาเป็นรูปแบบ HH:MM:SS
$hours = floor($time / 3600);
$minutes = floor(($time % 3600) / 60);
$seconds = $time % 60;
$formatted_time = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

// SQL สำหรับการบันทึกข้อมูล
$sql = "INSERT INTO time_records (elapsed_time) VALUES ('$formatted_time')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
