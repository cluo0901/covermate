<?php

require_once "config.php";

$email_data = $_POST['email'];

$response = array();


if ($email_data != "") {  
    $email = filter_var($email_data , FILTER_SANITIZE_EMAIL); 
        
    if(!filter_var($email_data, FILTER_VALIDATE_EMAIL)) {  
        $msg = "The mail you entered is not a valid email address.";        
        $response["success"] = false;
    } 
    else {               
        $sql1 = "SELECT * FROM newsletter WHERE email = '". $email."'";
        $result_sql1 = mysqli_query($link, $sql1);
        $sql = "INSERT INTO newsletter (email) VALUES ('" . $email . "')";
        if (mysqli_num_rows($result_sql1) > 0) {
            $msg = "Your email is alredy registered.";
            $response["success"] = false;
        } else {  
            if (mysqli_query($link, $sql)) {
                $msg = "Your email has been successfully registered!";
                $response["success"] = true;
            }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }
    } 
} else {  
    $msg = 'Please enter your email address.'; 
    $response["success"] = false;
}
// echo '<script language="javascript">';
// echo 'alert("'.$msg.'")';
// echo '</script>';
mysqli_close($link);

$response["message"] = $msg;

echo json_encode($response);
    
?>