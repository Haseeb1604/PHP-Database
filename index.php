<?php 
    include_once './OOP/db.php'; // MySQLi OOP
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 34%;
            margin: 100px auto 0;
            padding: 20px 0px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px;
            background-color: rgba(10,10,10,0.01);
            box-shadow: 0px 0px 10px rgba(1, 1, 1,0.2),1px 1px 5px rgba(1, 1, 1,0.3);
        }
        .form_data{
            width: 80%;
            margin: 10px auto;
            border: none;
            background-color: rgba(1, 1, 1, 0.1);
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 2px;

        }

        .form_data::placeholder{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 500;
        }

        .form_data:focus {
            outline: none;
            border: none;
            background-color: rgba(1, 1, 1, 0.2);
        }

        #submit{
            width: 30%;
            margin: 10px auto;
            border: none;
            padding: 12px;
            border-radius: 8px;
            background-color: lightblue;
            color: black;
            text-shadow: 0px 0px 10px rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
        }
        .message {
            position: absolute;
            top: 6%;
            left: 33.3%;
            width: 32%;
            border-radius: 3px;
            margin-top: 20px;
            margin: 0 auto;
            text-align: center;
            padding: 10px;
            transition: all 0.6s ease;
            transform: translateZ(-20px);
            animation: animate 0.6s linear;
        }
        .success{
            background: lightgreen;
        }
        .error{
            background: orangered;
            color: white;
        }
    </style>
</head>
<body>
    <form method="post" action="./OOP/response.php" id="form_data" class='form'>
        <input type="text" name="firstName" id="firstName" class="form_data" placeholder="First Name">
        <input type="text" name="lastName" id="lastName" class="form_data" placeholder="Last Name">
        <input type="email" name="email" id="email" class="form_data" placeholder="Email Address">
        <input type="date" name="date"  id="date" class="form_data" >
        <input type="submit" value="Submit" id="submit">
    </form>

    <div class="message-box">
    <?php
        if(isset($_GET['success'])){
            ?>
            <div class="message success"><?=$_GET['success']?></div>
    <?php
        }
        if(isset($_GET['error'])){
            ?>
            <div class="message error"><?=$_GET['error']?></div>
    <?php
        }
        // MySQLi OOP
        $conn->close();
    ?>
    </div>
    <script>
        let message = document.querySelector('.message');
        if(message){
            setTimeout(function(){
                message.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>