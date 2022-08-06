<?php
include("../includes/database.php");

	$form_data=json_decode(file_get_contents("php://input")); $confirm_token=$_GET['token'];

    date_default_timezone_set("Asia/Kolkata"); $date=date("d-m-Y")." ".date("h:i:sa");

	$submit_token=$form_data->token; $error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        
        if(empty($form_data->isKama9)){ $error["message"]="Enter Message"; }
        else{ $user_data['message']=($form_data->isKama9); $message=htmlspecialchars($user_data['message'], ENT_QUOTES); }

    if(empty($error)){ $insert_user=mysqli_query($con,"insert into contacts (name,email,message,date) values ('User','Nun','$message','$date')"); }
    else{ $data["error"]=$error; }
    echo json_encode($data);
} ?>