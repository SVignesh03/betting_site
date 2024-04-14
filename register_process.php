<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    if ($conn->connect_error) {
        header("Location: index.php?err=3");
        exit();
    }

    // Prepare and execute the query to insert the new user into the database 
    $qry = "INSERT INTO cno_users(usr_name, pass_word, mail, pno) VALUES('$username','$password','$email', '$mobile' )";
    
    if (!($conn->query($qry))){
        header("Location: registeration.php?msg=2");
        exit();
    }
    $select = "SELECT id FROM cno_users WHERE usr_name = '$username'";
    
    $result = $conn->query($select);
    
    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        $row = $result->fetch_assoc();
        $frontuserid = $row['id'];
    
        $qry = "INSERT INTO tbl_wallet(user_id) VALUES('$frontuserid')";
        
        if ($conn->query($qry)) {
            header("Location: registeration.php?msg=1");
            exit();
        } else {
            header("Location: registeration.php?msg=2");
            exit();
        }
    }
}
mysqli_close($conn);
?>
