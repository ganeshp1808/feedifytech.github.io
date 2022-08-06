<?php
error_reporting(0);
ini_set('display_errors', 'Off');

	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
	    
	    if(empty($form_data->skw3mSQ)){
	        $error["force"]="Enter Forecasted Value";
	    }
        
        if(empty($form_data->jsLams2)){
            $error["material"]="Enter Actual Demand";
        }

        if(empty($form_data->ahsjWl2)){
            $error["fos"]="Select Smooting Constant";
        }
      		

    if(empty($error)){
        $forecast=($form_data->skw3mSQ);    $demand=($form_data->jsLams2);  $smoothc=($form_data->ahsjWl2); $smooths=[];    $anadata=[];

        for ($i=0; $i <1.1 ; $i=$i+0.1) { 
            $smooths[]=round($i,1);
            $anadata[]=round((($demand*$i)+(($forecast*(1-$i)))),0);
        }
        $fval=(($demand*$smoothc)+(($forecast*(1-$smoothc))));

        $para["aval"]=round($forecast,2); $para["bval"]=round($demand,2); 
        $para["setup"]=$smooths; $para['anadata']=$anadata; $para["fval"]=$fval;    $para["smoo"]=$smoothc;
        $data["para"]=$para;
    }
    else{
      	$data["error"]=$error;
    }

    echo json_encode($data);
}
?>