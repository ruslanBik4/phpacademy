<form action="registration.php" method="post">
    <input name="name" />
    <input name="email"  />
    <input name="phone" placeholder="Ваш телефон"/>
</form>

<?php

    $connection = mysqli_connect( 'host'], ['login'], ['password'], ['databaseName'] );
    
    if ( !isset($_POST['name'], $_POST['email'], $_POST['phone']) || !$_POST['name'] || !$_POST['email'] || !$_POST['phone'] ) {
        die('Недостаточно данных для регистрации!');
    }
    
    $name = mysqli_real_escape_string($connection, stripslashes($_POST['name']) );
    $email = mysqli_real_escape_string($connection, stripslashes($_POST['email']) );
    $phone = mysqli_real_escape_string($connection, stripslashes($_POST['phone']) );
    
    
    $date_reg = date('Y-m-d');
    
    $sql = "INSERT INTO CUSTOMERS (name, email, phone, date_reg) VALUES ( '$name', '$email', '$phone', '$date_reg' ) ";
    
    if ( !mysqli_real_query($connection, $sql) )
        die( 'Неудачный запрос, сервер вернул -' . mysqli_error($connection) );   
    else
       echo 'Успешно зарегистрировали ' . $_POST['name']; 