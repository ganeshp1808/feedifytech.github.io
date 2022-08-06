<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];
	$submit_token=$form_data->token; $error=[]; $data=[]; $para=[];
	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){

        if(($form_data->type)=="HT"){
            $ht=($form_data->yUnz2j); $lt=($form_data->iNzm2j); $ck=($form_data->qhCz7fg); $area=($form_data->ySNz7sd); $wid=($form_data->zJmA7gk);   
            $coa=($form_data->xMzzn2h);     $htdata=[];
            if(is_numeric($ht) && is_numeric($lt) && ($ck>0) && ($area>0) && ($wid>0)){ $htdata[]=1;
                $htdata[]=round(($ck*$area*0.001*(($ht-$lt)/$wid)),4);  $htdata[]=round(($wid*1000)/($ck*$area),4); 
                $htdata[]=round(($ck*0.001*(($ht-$lt)/$wid)),4);    $htdata[]=round(($ck*$area*0.000001*($ht-$lt)),4);  
                $htdata[]=round(1000000/($ck*$area),4);   $htdata[]=round(($ck*0.000001*($ht-$lt)),4);
                $htdata[]=round(($coa*0.0000000567*$area*0.000001*(pow(($ht+273.16),4)-pow(($lt+273.16),4))),4);
                $htdata[]=round(($coa*0.0000000567*$area*(pow(($ht+273.16),2)-pow(($lt+273.16),2))*($ht+$lt+546.26)),4); 
                $htdata[]=round(($coa*0.0000000567*0.000001*(pow(($ht+273.16),4)-pow(($lt+273.16),4))),4); 
            }
            $para["thNnz2j"]=$htdata;  $data["para"]=$para;
        }
        echo json_encode($data);
}   ?>

