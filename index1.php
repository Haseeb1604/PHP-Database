<?php 
    include_once './PDO/db.php';  // PDO
    include_once './PDO/Table.class.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    <script>
        window.addEventListener('load', function() {
            let saveData = e =>{
                let form_elements = document.querySelectorAll('.form_data');
                let form_data = new FormData();
                let submitBtn = document.getElementById('submit');
                e.preventDefault();

                form_elements.forEach(element => {
                    form_data.append(element.name, element.value);                    
                });
                
                submitBtn.disabled = true;

                let xmlhttp = new XMLHttpRequest();
                xmlhttp.open('POST', './PDO/response.php');
                xmlhttp.send(form_data);
                xmlhttp.onreadystatechange = function() {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){
                        submitBtn.disabled = false;
                        e.target.reset();
                        let messageBox = document.getElementById('message-box');
                        messageBox.innerHTML = xmlhttp.responseText;
                        $timeout = messageBox.children[0].classList.contains('error') ? 9000 : 2000;
                        setTimeout(()=>messageBox.innerHTML = '', $timeout);
                    }
                }

            }

            document.getElementById('form').addEventListener('submit', saveData);
        })
    </script>
</head>
<body>
    <div class="container">
        <form id="form">
            <input type="text" name="firstName" class="form_data" placeholder="First Name">
            <input type="text"  name="lastName" class="form_data" placeholder="Last Name">
            <input type="email" name="email" class="form_data" placeholder="Email Address">
            <input type="date"  name="date"  class="form_data" >
            <input type="submit" value="Submit" id="submit">
        </form>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Date</th>
            </tr>
            <?php
                $sql = "SELECT firstName, lastName, email, reg_date From myguests";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            ?>
        </table>
    </div>
 
    <div class="message-box" id="message-box">

    </div>
    <?php
        // PDO Database closing
        $conn = null;
    ?>
</body>
</html>