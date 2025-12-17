<?php
session_start();
date_default_timezone_set('Asia/Dhaka');

// Always reset cookie to fixed time (17 Dec 2025, 12:15 a.m.)
$fixed_time = strtotime("2025-12-17 00:15:00");
setcookie("last_modified", $fixed_time, time() + 3600, "/");

// Simple validation example
if ($_POST['password'] !== $_POST['confirm']) {
    $_SESSION['error_message'] = "Passwords do not match!";
} else {
    if ($_POST['submit'] === "Register") {
        $_SESSION['success_message'] = "Registration successful!";
    } elseif ($_POST['submit'] === "Save as Draft") {
        $_SESSION['success_message'] = "Draft saved successfully!";
    }
}

// Redirect back to form
header("Location: form.php");
exit;
?>
