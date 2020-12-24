<?php
    include "connection.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $cek = mysqli_num_rows($result);
    if($cek > 0){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        $_SESSION['loggedIn'] = true;
        if($row['role_id']  == 1){
            echo "Login success!. Go ahead to "; ?>
            <a href="homeVendor.php">Home Page</a>
            <?php
        } else if($row['role_id'] == 2){
            echo "Login success!. Go ahead to "; ?>
            <a href="homeUser.php">Home Page</a>
            <?php
        } else {
            echo "Login failed, please ";?>
            <a href="index.html">login again</a>
            <?php
            echo mysqli_error($connect);
        }
    } else {
        echo "Login failed, please ";?>
        <a href="index.html">login again</a>
        <?php
        echo mysqli_error($connect);
    }
?>