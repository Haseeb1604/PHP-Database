<?php
    include_once './db.php';

    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $date = trim($_POST['date']);

    $sql = "INSERT INTO myguest(firstName, lastName, email, reg_date) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $firstName, $lastName, $email, $date);

    if($stmt->execute()){
        header("Location: ../index.php?success=Data Inserted at ID: ".$conn ->insert_id);
    }else{
        header("Location: ../index.php?error=".$conn->error);
    }

    $stmt->close();
?>