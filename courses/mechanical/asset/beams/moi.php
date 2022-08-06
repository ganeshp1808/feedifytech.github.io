<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $rl=($form_data->kmzIs4i); $rb=($form_data->pLmz3yh);    $vrl=($form_data->jKmxo6i);  $vrb=($form_data->imx9Jsp);   $moidata=[];
        $cr=($form_data->kNxm3wi); $vcr=($form_data->oLxm9id);   $cmoidata=[];
        $hcor=($form_data->xKls4ri);    $hcir=($form_data->yXm2lq);  $hvcr=($form_data->q5snXo);   $hmoidata=[];
        $scr=($form_data->hJma4ro);    $sclr=($form_data->isMx3o);  $scbr=($form_data->pLa2qiy);   $smoidata=[];
        $el=($form_data->jmxLo7s); $eb=($form_data->kMxi3ed);    $vel=($form_data->oSdj5rt);  $veb=($form_data->gVzn2ue);   $emoidata=[];
        $tb=($form_data->wOmz1sp); $th=($form_data->lmz2dGy);    $vtl=($form_data->uMnc3qi);  $vtb=($form_data->p8isZbr);   $tmoidata=[];

        if(($rl>0) && ($rb>0) && ($rl>=$rb)){ 
            $moidata[]="NOTE: When you vary distance in X and Y direction, the Y-Y and X-X axis also shift according to that respectively.\r\nArea = ".round(($rl*$rb),2)." mm²";
            $moidata[]="Iₓ₋ₓ (in mm⁴) = ".round((($rl*pow($rb,3))/12)+($rl*$rb*$vrb*$vrb),2); 
            $moidata[]="Iᵧ₋ᵧ (in mm⁴) = ".round((($rb*pow($rl,3))/12)+($rl*$rb*$vrl*$vrl),2); 
            if(($vrb==0) || is_null($vrb)){ $moidata[]="You are on horizontal nuetral axis."; }else{ $moidata[]="You are at distance of ".$vrb." mm from horizontal nuetral axis."; }
            if(($vrl==0) || is_null($vrl)){ $moidata[]="You are on vertical nuetral axis."; }else{ $moidata[]="You are at distance of ".$vrl." mm from vertical nuetral axis."; }
        }
        if($cr>0){
            $cmoidata[]="NOTE: When you vary distance in X and Y direction, the Y-Y and X-X axis also shift according to that respectively.\r\nArea = ".round((pi()*$cr*$cr),2)." mm²";
            $cmoidata[]="MoI along radius (i.e Iₓ₋ₓ (in mm⁴)) = ".round((pi()*pow($cr,4))/4,2); 
            $cmoidata[]="MoI perpendicular to radius (i.e Iᵧ₋ᵧ (in mm⁴)) = ".round(((pi()*pow($cr,4))/4)+(pi()*$cr*$cr*$vcr*$vcr),2);
            if(($vcr==0) || is_null($vcr)){ $cmoidata[]="You are on vertical nuetral axis."; }else{ $cmoidata[]="You are at distance of ".$vcr." mm from vertical nuetral axis."; }
        }	
        if(($hcor>0) && ($hcir>0) && ($hcor>$hcir)){
            $hmoidata[]="NOTE: When you vary distance in X and Y direction, the Y-Y and X-X axis also shift according to that respectively.\r\nArea = ".round((pi()*(pow($hcor,2)-pow($hcir,2))),2)." mm²";
            $hmoidata[]="MoI along radius (i.e Iₓ₋ₓ (in mm⁴)) = ".round(((pi()/4)*(pow($hcor,4)-pow($hcir,4))),2); 
            $hmoidata[]="MoI perpendicular to radius (i.e Iᵧ₋ᵧ (in mm⁴)) = ".round(((pi()/4)*(pow($hcor,4)-pow($hcir,4)))+((pi()*(pow($hcor,2)-pow($hcir,2)))*$hvcr*$hvcr),2);
            if(($hvcr==0) || is_null($hvcr)){ $hmoidata[]="You are on vertical nuetral axis."; }else{ $hmoidata[]="You are at distance of ".$hvcr." mm from vertical nuetral axis."; }
        }
        if($scr>0){
            $smoidata[]="NOTE: When you vary distance in X and Y direction, the Y-Y and X-X axis also shift according to that respectively.\r\nArea = ".round((pi()*pow($scr,2))/2,2)." mm²";
            $smoidata[]="MoI along radius (i.e Iₓ₋ₓ (in mm⁴)) = ".round((0.11*pow($scr,4))+(((pi()*pow($scr,2))/2)*pow($scbr,2)),2); 
            $smoidata[]="MoI perpendicular to radius (i.e Iᵧ₋ᵧ (in mm⁴)) = ".round(((pi()/8)*pow($scr,4))+(((pi()*pow($scr,2))/2)*$sclr*$sclr),2);
            if(($scbr==0) || is_null($scbr)){ $smoidata[]="You are on horizontal nuetral axis."; }
            else if($scbr==(round(((4*$scr)/(3*pi())),2))){ $smoidata[]="If you go below horizontal nuetral axis then you are on base else if you go up you are between top arc and nuetral axis."; }
                else{ $smoidata[]="You are at distance of ".$scbr." mm from horizontal nuetral axis."; }
            if(($sclr==0) || is_null($sclr)){ $smoidata[]="You are on vertical nuetral axis."; }else{ $smoidata[]="You are at distance of ".$sclr." mm from vertical nuetral axis."; }
        }
        if(($tb>0) && ($th>0)){
            $tmoidata[]="NOTE: When you vary distance in X and Y direction, the Y-Y and X-X axis also shift according to that respectively.\r\nArea = ".round((0.5*$tb*$th),2)." mm²";
            $tmoidata[]="MoI along radius (i.e Iₓ₋ₓ (in mm⁴)) = ".round((($tb*pow($th,3))/36)+(0.5*$th*$tb*$vtb*$vtb),2); 
            $tmoidata[]="MoI perpendicular to radius (i.e Iᵧ₋ᵧ (in mm⁴)) = ".round((($tb*pow($th,3))/48)+(0.5*$th*$tb*$vtl*$vtl),2);
            if(($vtb==0) || is_null($vtb)){ $tmoidata[]="You are on horizontal nuetral axis."; }
            else if($vtb==(round(($th/3),2))){ $tmoidata[]="If you go below horizontal nuetral axis then you are on base else if you go up you are between top vertex and nuetral axis."; }
                else{ $tmoidata[]="You are at distance of ".$vtb." mm from horizontal nuetral axis."; }
            if(($vtl==0) || is_null($vtl)){ $tmoidata[]="You are on vertical nuetral axis."; }else{ $tmoidata[]="You are at distance of ".$vtl." mm from vertical nuetral axis."; }
        }
        if(($el>0) && ($eb>0)){ 
            $emoidata[]="NOTE: When you vary distance in X and Y direction, the Y-Y and X-X axis also shift according to that respectively.\r\nArea = ".round(($el*$eb*pi()),2)." mm²";
            $emoidata[]="Iₓ₋ₓ (in mm⁴) = ".round(((pi()*$el*pow($eb,3))/4)+(pi()*$el*$eb*$veb*$veb),2); 
            $emoidata[]="Iᵧ₋ᵧ (in mm⁴) = ".round(((pi()*$eb*pow($el,3))/4)+(pi()*$el*$eb*$vel*$vel),2); 
            if(($veb==0) || is_null($veb)){ $emoidata[]="You are on horizontal nuetral axis."; }else{ $emoidata[]="You are at distance of ".$veb." mm from horizontal nuetral axis."; }
            if(($vel==0) || is_null($vel)){ $emoidata[]="You are on vertical nuetral axis."; }else{ $emoidata[]="You are at distance of ".$vel." mm from vertical nuetral axis."; }
        }
        $para["ijMzn5e"]=$moidata;  $para["cNxio9s"]=$cmoidata;  $para["jnZui3t"]=$hmoidata; $para["Hjan4ri"]=$smoidata; $para["oKmx5lr"]=$tmoidata; 
        $para["kMzne3w"]=$emoidata; $data["para"]=$para;
        echo json_encode($data);
}   ?>