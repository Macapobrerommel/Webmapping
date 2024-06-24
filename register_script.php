<?php
include "db_conn.php";

if (isset($_POST['email_add']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['role'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email_add']);
    $pass = validate($_POST['password']);
    $username = validate($_POST['username']);
    $role = validate($_POST['role']);

    if (empty($email) || empty($pass) || empty($username) || empty($role)) {
        header("Location: login.php?error=All fields are required");
        exit();
    } else {
        // Check if an admin account already exists
        if ($role === 'admin') {
            $check_admin_sql = "SELECT * FROM tb_register WHERE role='admin'";
            $check_admin_result = mysqli_query($conn, $check_admin_sql);

            if (mysqli_num_rows($check_admin_result) > 0) {
                header("Location: register.php?error=Admin account already exists");
                exit();
            }
        }

        // Hash the password before storing it in the database
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare SQL statement to prevent SQL injection
        $sql = "INSERT INTO tb_register (email, password, username, role) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Check if the statement was prepared successfully
        if ($stmt === false) {
            die('Error: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssss", $email, $hashed_password, $username, $role);
        mysqli_stmt_execute($stmt);

        header("Location: login.php?success=Account created successfully");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>





