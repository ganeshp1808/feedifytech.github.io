<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];
	$submit_token=$form_data->token; $error=[]; $data=[]; $para=[];
	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){

        if(($form_data->type)=="ESM"){
            $em=($form_data->yMzn2ok); $poiss=($form_data->wnVxb7g);     $esmdata=[];
            if(($em>0) && ($poiss!=0.5)){ $esmdata[]=round(($em/(2+(2*$poiss))),3);   $esmdata[]=round(($em/(3-(6*$poiss))),3);
                        $esmdata[]=round((200/(2+(2*$poiss))),3);   $esmdata[]=round((200/(3-(6*$poiss))),3);
                        $esmdata[]=round((130/(2+(2*$poiss))),3);   $esmdata[]=round((130/(3-(6*$poiss))),3);
                        $esmdata[]=round((125/(2+(2*$poiss))),3);   $esmdata[]=round((125/(3-(6*$poiss))),3); 
                        $esmdata[]=round((69/(2+(2*$poiss))),3);   $esmdata[]=round((69/(3-(6*$poiss))),3);
                        $esmdata[]=round((74/(2+(2*$poiss))),3);   $esmdata[]=round((74/(3-(6*$poiss))),3); 
                        $esmdata[]=round((72/(2+(2*$poiss))),3);   $esmdata[]=round((72/(3-(6*$poiss))),3); 
                        $esmdata[]=round((18/(2+(2*$poiss))),3);   $esmdata[]=round((18/(3-(6*$poiss))),3);
                        $esmdata[]=round((2.9/(2+(2*$poiss))),3);   $esmdata[]=round((2.9/(3-(6*$poiss))),3);
                        $esmdata[]=round((117/(2+(2*$poiss))),3);   $esmdata[]=round((117/(3-(6*$poiss))),3);
                        $esmdata[]=round((248/(2+(2*$poiss))),3);   $esmdata[]=round((248/(3-(6*$poiss))),3); 
                        $esmdata[]=round((17/(2+(2*$poiss))),3);   $esmdata[]=round((17/(3-(6*$poiss))),3);
                        $esmdata[]=round((1220/(2+(2*$poiss))),3);   $esmdata[]=round((1220/(3-(6*$poiss))),3);
                        $esmdata[]=round((83/(2+(2*$poiss))),3);   $esmdata[]=round((83/(3-(6*$poiss))),3);    }
            $para["ijMzn5e"]=$esmdata;  $data["para"]=$para;
        }
        if(($form_data->type)=="TS"){
            $it=($form_data->u9skMwi); $ht=($form_data->kkMM3md); $lom=($form_data->aKKmz2h); $coeff=($form_data->uSnz1yf);     $thermdata=[];
            if(($it>0) && ($ht>0) && ($lom>0) && ($coeff>0)){ $thermdata[]=1;
                $thermdata[]=round(($coeff*0.000001*($ht-$it)*$lom),5); $thermdata[]=round(($coeff*0.000001*($ht-$it)),5);
                $thermdata[]=round((12*0.000001*($ht-$it)*$lom),5);     $thermdata[]=round((12*0.000001*($ht-$it)),5);
                $thermdata[]=round((12*0.000001*($ht-$it)*200000),5);  $thermdata[]=round((10.8*0.000001*($ht-$it)*$lom),5);
                $thermdata[]=round((10.8*0.000001*($ht-$it)),5);    $thermdata[]=round((10.8*0.000001*($ht-$it)*130000),5);
                $thermdata[]=round((19*0.000001*($ht-$it)*$lom),5);     $thermdata[]=round((19*0.000001*($ht-$it)),5);  
                $thermdata[]=round((19*0.000001*($ht-$it)*125000),5); $thermdata[]=round((21*0.000001*($ht-$it)*$lom),5);
                $thermdata[]=round((21*0.000001*($ht-$it)),5);      $thermdata[]=round((21*0.000001*($ht-$it)*69000),5);
                $thermdata[]=round((14.2*0.000001*($ht-$it)*$lom),5);       $thermdata[]=round((14.2*0.000001*($ht-$it)),5);
                $thermdata[]=round((14.2*0.000001*($ht-$it)*74000),5);     $thermdata[]=round((19.7*0.000001*($ht-$it)*$lom),5);
                $thermdata[]=round((19.7*0.000001*($ht-$it)),5);        $thermdata[]=round((19.7*0.000001*($ht-$it)*72000),5);
                $thermdata[]=round((82*0.000001*($ht-$it)*$lom),5);     $thermdata[]=round((82*0.000001*($ht-$it)),5);
                $thermdata[]=round((82*0.000001*($ht-$it)*2900),5);    $thermdata[]=round((18.5*0.000001*($ht-$it)*$lom),5);
                $thermdata[]=round((18.5*0.000001*($ht-$it)),5);    $thermdata[]=round((18.5*0.000001*($ht-$it)*117000),5); 
                $thermdata[]=round((7*0.000001*($ht-$it)*$lom),5);      $thermdata[]=round((7*0.000001*($ht-$it)),5);
                $thermdata[]=round((7*0.000001*($ht-$it)*248000),5);  $thermdata[]=round((14*0.000001*($ht-$it)*$lom),5);      
                $thermdata[]=round((14*0.000001*($ht-$it)),5);  $thermdata[]=round((14*0.000001*($ht-$it)*17000),5); 
                $thermdata[]=round((1.8*0.000001*($ht-$it)*$lom),5);  $thermdata[]=round((1.8*0.000001*($ht-$it)),5);     
                $thermdata[]=round((1.8*0.000001*($ht-$it)*1220000),5);     $thermdata[]=round((35*0.000001*($ht-$it)*$lom),5);     
                $thermdata[]=round((35*0.000001*($ht-$it)),5);      $thermdata[]=round((35*0.000001*($ht-$it)*83000),5); }
            $para["tkAmz2l"]=$thermdata;  $data["para"]=$para;
        }
        if(($form_data->type)=="TOR"){
            $tor=($form_data->sMz8lah); $mor=($form_data->uSmz2lf); $l=($form_data->wmzVs3a); $dim=($form_data->xNzm3kd);     $tordata=[];
            if(($tor>0) && ($mor>0) && ($l>0) && ($dim>0)){ $tordata[]=1;
                $tordata[]=round(((32*$tor*$l)/(pi()*pow($dim,4)*$mor)),5); $tordata[]=round((180/pi())*((32*$tor*$l)/(pi()*pow($dim,4)*$mor)),5); 
                $tordata[]=round(((6*$tor*$l)/(pow($dim,4)*$mor)),5); $tordata[]=round((180/pi())*((6*$tor*$l)/(pow($dim,4)*$mor)),5);
                $tordata[]=round(((32*$tor*$l)/(1.732*pow($dim,4)*$mor)),5); $tordata[]=round((180/pi())*((32*$tor*$l)/(1.732*pow($dim,4)*$mor)),5);  }
            $para["ekMz1oo"]=$tordata;  $data["para"]=$para;
        }
        echo json_encode($data);
}   ?>

