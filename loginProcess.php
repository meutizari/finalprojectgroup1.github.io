<?php
    include "connection.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);
    if ($check > 0){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $row['role_id'];
        $_SESSION['status'] = 'login';
        $_SESSION['loggedIn'] = true;
        
        if ($row['role_id']  == 1){            
            header('Location:homeVendor.php');
        } else if ($row['role_id'] == 2){            
            header('Location:homeUser.php');        
        }
    } else {
        echo "<script>alert('The username or password you entered is incorrect. Please try again.'); window.location.href='landingPage.html'</script>";    
    }
?>