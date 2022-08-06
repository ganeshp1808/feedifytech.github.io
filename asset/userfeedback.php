<?php

include("../includes/database.php");

if(($_SERVER['REQUEST_METHOD'] === 'POST')){

date_default_timezone_set("Asia/Kolkata");
$date=date("d-m-Y")." ".date("h:i:sa");

$form_data=json_decode(file_get_contents("php://input"));
$confirm_token=$_GET['token'];

$submit_token=$form_data->token;
$error=[];$data=[];

if(($submit_token===$confirm_token)){

      $d=($form_data->zmalYa2); $e=($form_data->hjsba1G); $u=($form_data->sdjBza1); $o=($form_data->paKxl4a); $s=$date." ".($form_data->isKama9);
      $ip=getRealIpAddr();
      $insert_feedback=mysqli_query($con,"insert into feedback (user_id,design,easiness,usefull,overall,suggestion)  
          values ('$ip','$d','$e','$u','$o','$s')");
    }

    echo json_encode($data);
}
?>