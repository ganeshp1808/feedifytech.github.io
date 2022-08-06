<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=($form_data->noten);
    $data_take=($form_data->calc);
	$error=[];$data=[];$para=[];
    date_default_timezone_set("Asia/Kolkata");
    $date=date("d-m-Y")." ".date("h:i:sa");

	// if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $myfile = fopen("../cotterjoint.txt", "w") or die("Unable to open file!");
        $txt = "<h1><b>".$date."</b></h1><hr />\n<h1><b>Cotter Joint Analysis</b></h1>\n<h3>Instead of using one long rod to sustain force, a seperable joint known as cotter joint is used to connect two co-axial rods, which are subjected to either axial tensile force or axial compressive force. It is not used for transmiting torque and sustaining angular displacement. Material used for this component is ductile in nature so low, medium carbon steel are preferred for low force application else high carbon and alloy steel can be used for high force application giving higher strength.</h3>\n<h4><b>Parameters to be listed</b></h4>\n\n<p>Diameter of Rod = ".$data_take." mm</p>";
        fwrite($myfile, $txt);
        fclose($myfile);
        $data[]=$confirm_token;
        $data[]=$submit_token;
        echo json_encode($data);
    // }
?>