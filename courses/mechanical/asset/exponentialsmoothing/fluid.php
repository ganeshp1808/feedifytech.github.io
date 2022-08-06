<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];
	$submit_token=$form_data->token; $error=[]; $data=[]; $para=[];
	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        if(($form_data->type)=="TERM"){
            $mass=($form_data->uMne3aq); $vol=($form_data->kmZn3oq);    $temp=($form_data->iKlam7s); $termdata=[];  $tempdata=[];
            if(($mass>0) && ($vol>0)){
                $termdata[]="Density";  $termdata[]="Mass/Volume";  $termdata[]=$d1=round(($mass/$vol),2)." g/cm³";  
                $termdata[]=$d2=round((($mass*1000)/$vol),2)." kg/m³";   $termdata[]="Specific Weight or Weight Density";  $termdata[]="(Mass*9.81)/Volume";
                $termdata[]=round(($d1*9.81),2)." N/cm³"; $termdata[]=round(($d2*9.81),2)." N/m³"; $termdata[]="Specific Volume"; $termdata[]="Volume/Mass";
                $termdata[]=round((1/$d1),4)." cm³/g";  $termdata[]=round((1/$d2),4)." m³/kg";  $termdata[]="Specific Gravity"; 
                $termdata[]="Density of Substance/ Density of Standard Material";  $termdata[]=$d1;
            }
            if($temp>0){
                $tempdata[]=round((0.00179/(1+(0.03368*$temp)+(0.000221*pow($temp,2)))),7);
                $tempdata[]=round((0.0179/(1+(0.03368*$temp)+(0.000221*pow($temp,2)))),7);
                $tempdata[]=round((0.0000017+(0.0000000056*$temp)-(0.0000000001189*pow($temp,2))),7);
                $tempdata[]=round((0.000017+(0.000000056*$temp)-(0.000000001189*pow($temp,2))),7);
            }
            $para["ijMzn5e"]=$termdata; $para["uSmxo5p"]=$tempdata;  $data["para"]=$para;
        }

        if(($form_data->type)=="ST"){
            $st=($form_data->uNzm2is); $dd=($form_data->alzP2ry); $aoc=($form_data->isNzm2e); $den=($form_data->kmZn3wi);  $a=($form_data->enXm2sk);  
            $stdata=[]; $st1data=[];
            if(($st>0) && ($dd>0)){ 
                $stdata[]=round(((4*$st)/($dd*0.001)),2);   $stdata[]=round(((8*$st)/($dd*0.001)),2);   $stdata[]=round(((2*$st)/($dd*0.001)),2);
                $stdata[]=$st;  $stdata[]=$dd;
            }
            if(($st>0) && ($dd>0) && ($den>0)){ 
                $st1data[]=round(($st*4*cos((pi()/180)*$aoc))/($dd*0.001*$den*9.81),2); $st1data[]=round(($st*4*cos((pi()/180)*$aoc))/($dd*0.001*$den*$a),2); }
            $para["eKmx6sy"]=$stdata;   $para["rtHn2os"]=$st1data;  $data["para"]=$para;
        }

        if(($form_data->type)=="PV"){
            $rp=($form_data->iqMzn4o); $rt=($form_data->wMzn3pa); $rh=($form_data->Palm7dj); $ra=($form_data->uwLmx5f);  $adc=($form_data->djMx1ks);  
            $pvdata=[];  
            if(($rp>0) && is_numeric($rt) && ($rh>0) && ($rh<29400)){     $pvdata[]=$ra;   
                $pvdata[]=round(($rp*exp((-9.81*$rh)/(($rt+273.16)*274.09))),3);    $pvdata[]=round(($rp*exp((-1*$ra*$rh)/(($rt+273.16)*274.09))),3); 
                $pvdata[]=round(($rp*exp((9.81*$rh)/(($rt+273.16)*274.09))),3); $pvdata[]=round(($rp*exp(($ra*$rh)/(($rt+273.16)*274.09))),3);
                $pvdata[]=round(($rp*pow((1-(((9.81*$rh)/(($rt+273.16)*274.09))*(($adc-1)/$adc))),($adc/($adc-1)))),4);
                $pvdata[]=round(($rp*pow((1-((($ra*$rh)/(($rt+273.16)*274.09))*(($adc-1)/$adc))),($adc/($adc-1)))),4);
                $pvdata[]=round(($rp*pow((1+(((9.81*$rh)/(($rt+273.16)*274.09))*(($adc-1)/$adc))),($adc/($adc-1)))),4);
                $pvdata[]=round(($rp*pow((1+((($ra*$rh)/(($rt+273.16)*274.09))*(($adc-1)/$adc))),($adc/($adc-1)))),4);  $pvdata[]=$adc;
            }
            $para["eImx8so"]=$pvdata;   $data["para"]=$para;
        }

        if(($form_data->type)=="HP"){
            $dp=($form_data->rMz5osx); $ac=($form_data->osKmz2f); $dens=($form_data->gDjs4ol);  $hpdata=[]; $dhpdata=[];
            if($dp>0){
                $hpdata[]=round((9.81*1000*$dp*0.001),2);   $hpdata[]=round(($ac*1000*$dp*0.001),2);
                $hpdata[]=round((9.81*1030*$dp*0.001),2);   $hpdata[]=round(($ac*1030*$dp*0.001),2);
                $hpdata[]=round((9.81*1.2*$dp*0.001),2);   $hpdata[]=round(($ac*1.2*$dp*0.001),2);
                $hpdata[]=round((9.81*0.179*$dp*0.001),2);   $hpdata[]=round(($ac*0.179*$dp*0.001),2);
                $hpdata[]=round((9.81*916.7*$dp*0.001),2);   $hpdata[]=round(($ac*916.7*$dp*0.001),2);
                $hpdata[]=round((9.81*920*$dp*0.001),2);   $hpdata[]=round(($ac*920*$dp*0.001),2);
                $hpdata[]=round((9.81*700*$dp*0.001),2);   $hpdata[]=round(($ac*700*$dp*0.001),2);
                $hpdata[]=round((9.81*1261*$dp*0.001),2);   $hpdata[]=round(($ac*1261*$dp*0.001),2);
                $hpdata[]=round((9.81*2400*$dp*0.001),2);   $hpdata[]=round(($ac*2400*$dp*0.001),2);
                $hpdata[]=round((9.81*13546*$dp*0.001),2);   $hpdata[]=round(($ac*13546*$dp*0.001),2);
                $hpdata[]=round((9.81*10500*$dp*0.001),2);   $hpdata[]=round(($ac*10500*$dp*0.001),2);
                $hpdata[]=round((9.81*19320*$dp*0.001),2);   $hpdata[]=round(($ac*19320*$dp*0.001),2);
                $hpdata[]=round((9.81*18800*$dp*0.001),2);   $hpdata[]=round(($ac*18800*$dp*0.001),2);
            }
            if($dens>0){ $dhpdata[]=round((9.81*$dens*$dp*0.001),2);  $dhpdata[]=round(($ac*$dens*$dp*0.001),2); }
            $para["uSkm7yi"]=$hpdata; $para["ilaMn3t"]=$dhpdata; $data["para"]=$para;
        }

        if(($form_data->type)=="BOU"){
            $db=($form_data->eKmz8el); $dl=($form_data->mnzL2ws);    $volb=($form_data->qPlm4nx); $floata=[]; 
            $mh=($form_data->kMal2xi);  $rog=($form_data->l9zmWqo);  $accg=($form_data->eolNx4b);   $modata=[];
            if($volb>0){
                if($db>$dl){ $floata[]="Body is submerged in the liquid completely as density of body is greater than density of liquid."; }
                else if($db==$dl){ $floata[]="Body is just submerged in the liquid completely as density of body is equal to density of liquid."; }
                else if($db<$dl){ $floata[]="Body is ".round((($db*100)/$dl),2)." % in the liquid and ".round(100-(($db*100)/$dl),2)." % outside liquid. More the density of body is going to increase more it is going to sink."; }
            }
            if(($mh>0) && ($rog>0)){ $modata[]=round(((2*pi()*$rog*0.001)/sqrt($mh*0.0981)),5);
                $modata[]=round(((2*pi()*$rog*0.001)/sqrt($mh*0.01*$accg)),5); }

            $para["hnzJk3o"]=$floata;   $para["jnZm3eo"]=$modata; $data["para"]=$para;
        }
        echo json_encode($data);
}   ?>

