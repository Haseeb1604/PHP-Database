<?php
    include_once './db.php';

    $data = array(
        ':firstName' => trim($_POST['firstName']),
        ':lastName' => trim($_POST['lastName']),
        ':email' => trim($_POST['email']),
        ':reg_date' => trim($_POST['date']),
    );

    $sql = "INSERT INTO myguests(firstName, lastName, email, reg_date) VALUES (:firstName, :lastName, :email, :reg_date)";

    $stmt = $conn->prepare($sql);

    if($stmt->execute($data)) {
        if($error !== ''){
            echo "<div class='message error'>".$error."</div>";
        }else{
            echo "<div class='message success'>Success Inserted Data at ID: ". $conn->lastInsertId()."</div>";
        }
    }
?>