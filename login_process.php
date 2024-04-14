<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include "db.php";
    $user_name = $_POST["login_user"];
    $password = $_POST["login_password"];
    
    $qry = "select * from cno_users where usr_name='$user_name'";
    $result = $conn->query($qry);
    while($row = $result->fetch_assoc()){
        $user_id = $row['id'];
        $password_db = $row['pass_word'];
    }
    
    
    if ($result->num_rows < 1) {
        header("Location: index.php?err=1");
        exit();
    }
    else {
        // $verify = password_verify($password, $hashed_password); 
        
        if ($password_db == $password) {
            session_start();
            $_SESSION["frontuserid"] = $user_id;
            $_SESSION["username"] = $user_name;
            setcookie('user', $user_name, time()+3600,"/");
            header("Location: home_page.php");
        }
        
        else {
        // echo "Invalid username or password."; //<a href='index.php'>Try again</a>.";
        header("Location: index.php?err=2");
        exit();
    }
}

    // Close the database connection
    mysqli_close($conn);
}
?>
