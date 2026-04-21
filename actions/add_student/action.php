<?php
ob_start();

$host = "localhost";
$user = "root";
$pass = $user;
$db = "ports";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("[Error] add_student/action: " . $conn->connect_error);
} else {
    echo "<script>console.log('add_student/action: Action reached.')</script>";
}

if (isset($_POST['action_add_student'])) {

    $s_num = htmlspecialchars($_POST['student_number']);
    $lname = htmlspecialchars($_POST['lname']);
    $fname = htmlspecialchars($_POST['fname']);
    $mname = htmlspecialchars($_POST['mname']);
    $email_add = htmlspecialchars($_POST['email_add']);
    $course = htmlspecialchars($_POST['course']);
    $yr_lvl = htmlspecialchars($_POST['yr_lvl']);
    $section = htmlspecialchars($_POST['section']);

    setcookie("langcookie", "cookiedata");

    $query = "INSERT INTO Students (student_number, last_name, first_name, mid_name, course, yr_lvl, section, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssiis", $s_num, $lname, $fname, $mname, $course, $yr_lvl, $section, $email_add);
    $result = $stmt->execute();
    if ($result) {
        header("Location: ../../");
    } else {
        echo "<script>console.log('[Error] add_student/action: " . $conn->error . "')</script>";
    }

    echo "<script>alert('Student Added.')</script>";
    
    ob_end_flush();
    
}

