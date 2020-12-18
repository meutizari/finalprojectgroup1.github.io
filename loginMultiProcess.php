<?php
    include "connection.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    
    if($row['level']  == 1){
        echo "Login success!. Go ahead to "; ?>
        <a href="homeAdmin.html">Home Page</a>
        <?php
    } else if($row['level'] == 2){
        echo "Login success!. Go ahead to "; ?>
        <a href="homeGuest.html">Home Page</a>
        <?php
    } else {
        echo "Login failed, please ";?>
        <a href="loginForm.html">login again</a>
        <?php
        echo mysqli_error($connect);
    }
?>