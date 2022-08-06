<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        if(($form_data->type)=="LIN"){
            $lin=($form_data->haNze2q);  $exsdata=[];
            $exsdata[]=round(($lin*($lin-1))/2,0);  $exsdata[]=round((1.5*$lin)-2,2);
            $para["hanVz7y"]=$exsdata; $data["para"]=$para;
        }	
        if(($form_data->type)=="free"){
            $l=($form_data->kaMze4t);   $j=($form_data->mzIsw1u);   $h=($form_data->pLmx8eh);  $hdata=[];
            if(((3*($l-1))-(2*$j)-$h)<0){ $hdata[]="Invalid Contraints"; }
            else if(((3*($l-1))-(2*$j)-$h)==0){ $hdata[]="Locked Chain"; }
            else if((((3*($l-1))-(2*$j)-$h)>0) && (((3*($l-1))-(2*$j)-$h)<=6)){ $hdata[]=round(((3*($l-1))-(2*$j)-$h),2); }
            else if(((3*($l-1))-(2*$j)-$h)>6){ $hdata[]="Too much freedom, invalid constraints"; }
            if(((1.5*$l)-2)>$j){ $hdata[]="Chain is locked"; }
            else if(((1.5*$l)-2)==$j){ $hdata[]="Perfect selection, Chain is kinematic"; }
            else if(((1.5*$l)-2)==$j){ $hdata[]="Chain is Unconstrained"; }
            $para["hNazi5t"]=$hdata; $data["para"]=$para;
        }
        if(($form_data->type)=="CAM"){
            $h=($form_data->fNxu4ir); $rpm=($form_data->omzWi4r); $ar=($form_data->kamxI3w); $ad=($form_data->jNaz2wi);  $camdata=[];
            if(($h>0) && ($rpm>0)){
                $camdata[]=$wval=round(($rpm*2*pi())/60,2); $camdata[]=round(((90*$h*0.001*$wval)/$ar),2);  $camdata[]=round(((90*$h*0.001*$wval)/$ad),2);
                $camdata[]=round(((16200*$h*0.001*$wval*$wval)/($ar*$ar)),2);   $camdata[]=round(((16200*$h*0.001*$wval*$wval)/($ad*$ad)),2);
                $camdata[]=round(((2916000*$h*0.001*pow($wval,3))/pow($ar,3)),2);   $camdata[]=round(((2916000*$h*0.001*pow($wval,3))/pow($ad,3)),2);

                $camdata[]=round(((12*$h*0.001*$rpm)/$ar),2);  $camdata[]=round(((12*$h*0.001*$rpm)/$ad),2);
                $camdata[]=round(((144*$h*0.001*$rpm*$rpm)/($ar*$ar)),2);   $camdata[]=round(((144*$h*0.001*$rpm*$rpm)/($ad*$ad)),2);
                $camdata[]=round(((90*$h*0.001*$rpm)/$ar),2);  $camdata[]=round(((90*$h*0.001*$rpm)/$ad),2);
                $camdata[]=round(((226.1946711*$h*0.001*$rpm*$rpm)/($ar*$ar)),2);   $camdata[]=round(((226.1946711*$h*0.001*$rpm*$rpm)/($ad*$ad)),2);
                $camdata[]=round(((264401.0077*$h*0.001*pow($rpm,3))/pow($ar,3)),2);   $camdata[]=round(((264401.0077*$h*0.001*pow($rpm,3))/pow($ad,3)),2);
            }
            $para["iNxj4eu"]=$camdata; $data["para"]=$para;
        }
        if(($form_data->type)=="DEF"){
            $deflec=($form_data->kmZli3w);  $deflecdata=[];
            if($deflec>0){
                $deflecdata[]=round((0.4985/sqrt($deflec*0.001)),2); 
                $deflecdata[]="If any frequency source( eg. sound ) matches this value, then it will produce deflection of ".$deflec." mm without application fo any external force.";   
                $deflecdata[]="Critical or Whirling Speed of shaft is ".round(sqrt(9.81/($deflec*0.001)),2)." RPM";
                $deflecdata[]="If shaft is carrying load on it and a transverse deflection occurs then the maximum speed it can achieve till the resonant frequency without any failure.";
            }
            $para["ijMzn5e"]=$deflecdata; $data["para"]=$para;
        }
        if(($form_data->type)=="freed"){
            $m=($form_data->jmaxe4R);   $c=($form_data->kMax3eo);  $k=($form_data->fOpla5t);   $freedata=[];
            if(($m>0) && ($c>=0) && ($k>0)){
                $freedata[]=$m."x''+".$c."x'+".round(($k*1000),2)."x=0";    $freedata[]=$aval=round(($c/(2*$m)),2); $fval=round(sqrt(($k*1000)/$m),8);
                $freedata[]="Natural Circular Frequency(wₙ) of the system or the resonant angular velocity of the system is ".$fval." rad/s. Resonant condition can be very serious as various parameters go high as discussed below.";
                if($fval>$aval){
                    $freedata[]="Due to effect of damper the frequency gets reduced and factor (a=(c/(2m)) plays crucial role. Finally, damped circular frequency is √(wₙ²-a²) = ".round(sqrt(pow($fval,2)-pow($aval,2)),8)." rad/s.";
                } else{ $freedata[]="Damped circular frequency can't be computed as wₙ<a which becomes overdamped condition."; }
                $freedata[]="Frequency is (Circular frequency or angular velocity/(2*pi)). Natural frequency is (wₙ/(2*pi)) = ".round(($fval/(2*pi())),8)."  Hz";  
                if($fval>$aval){ 
                    $freedata[]="As natural circular frequency is damped so will natural frequency also and it is (Damped circular frequency/(2*pi()) = ".round((1/(2*pi()))*sqrt(pow($fval,2)-pow($aval,2)),8)." Hz"; 
                } else{ $freedata[]="Damped frequency can't be computed as wₙ<a which becomes overdamped condition."; }
                $freedata[]="Time period is (2*pi)/wₙ which is ".round((2*pi())/$fval,8)." s"; 
                if($fval>$aval){ $freedata[]="Damping effect changes the time period where a=(c/2m) plays crucial role and damped time period is ".round((2*pi())/sqrt(pow($fval,2)-pow($aval,2)),8). "s"; }
                else{ $freedata[]="Damped time period can't be computed as wₙ<a which becomes overdamped condition."; }
                $ccval=round((2*$fval*$m),2);   $df=round(($c/$ccval),5);
                $freedata[]="If this system was critically damped system then its damping coefficient would be c꜀ also known as critical damping coefficient. So, c꜀ = (2*wₙ*mass) = ".$ccval." N/m/s";
                $freedata[]="Damping factor is ratio of actual damping coefficient(c) to critical damping coefficient(c꜀). Damping factor has no unit and it is equal to ".$df;    
                if($df<1){ $freedata[]="Damping factor is ".$df." which is less than 1. So this is underdamped system"; } 
                else if($df==1){ $freedata[]="Damping factor is ".$df.". So this is critically damped system"; } 
                else if($df>1){ $freedata[]="Damping factor is ".$df." which is more than 1. So this is overdamped system"; } 
                if($ccval>$c){ $freedata[]="ln(xₙ/xₙ₊₁) = ".round((2*pi()*$c)/sqrt(pow($ccval,2)-pow($c,2)),5); }else { $freedata[]="Critically damping coefficient is less than actual entered damping coefficient which is result of overdamped system ans it is not possible for logarithmic decrement"; }
            }
            $para["uhNx7ro"]=$freedata; $data["para"]=$para;
        }

        if(($form_data->type)=="forced"){
            $mass=($form_data->iKmx3ry); $cc=($form_data->Piem5tu); $stiff=($form_data->i4ropSr); $force=($form_data->yoSj4kl); $wval=($form_data->fKsm9rj);  
            $forcedata=[];
            if(($mass>0) && ($cc>=0) && ($stiff>0) && ($force>0) && ($wval>=0)){
                $forcedata[]=$mass."x''+".$cc."x'+".round(($stiff*1000),2)."x=".$force."*cos(".round($wval,2)."t)"; 
                $forcedata[]=$a1val=round(($cc/(2*$mass)),2); $f1val=round(sqrt(($stiff*1000)/$mass),8);  
                $forcedata[]="Natural Circular Frequency(wₙ) of the system or the resonant angular velocity of the system is ".$f1val." rad/s. Resonant condition can be very serious as various parameters go high as discussed below.";
                if($f1val>$a1val){
                    $forcedata[]="Due to effect of damper the frequency gets reduced and factor (a=(c/(2m)) plays crucial role. Finally, damped circular frequency is √(wₙ²-a²) = ".round(sqrt(pow($f1val,2)-pow($a1val,2)),8)." rad/s.";
                } else{ $forcedata[]="Damped circular frequency can't be computed as wₙ<a which becomes overdamped condition."; }
                $forcedata[]="Frequency is (Circular frequency or angular velocity/(2*pi)). Natural frequency is (wₙ/(2*pi)) = ".round(($f1val/(2*pi())),8)."  Hz";
                if($f1val>$a1val){ 
                    $forcedata[]="As natural circular frequency is damped so will natural frequency also and it is (Damped circular frequency/(2*pi()) = ".round((1/(2*pi()))*sqrt(pow($f1val,2)-pow($a1val,2)),8)." Hz"; 
                } else{ $forcedata[]="Damped frequency can't be computed as wₙ<a which becomes overdamped condition."; }
                $forcedata[]="Time period is (2*pi)/wₙ which is ".round((2*pi())/$f1val,8)." s"; 
                if($f1val>$a1val){ $forcedata[]="Damping effect changes the time period where a=(c/2m) plays crucial role and damped time period is ".round((2*pi())/sqrt(pow($f1val,2)-pow($a1val,2)),8). "s"; }
                else{ $forcedata[]="Damped time period can't be computed as wₙ<a which becomes overdamped condition."; }
                $cc1val=round((2*$f1val*$mass),2);  $forcedata[]="If this system was critically damped system then its damping coefficient would be c꜀ also known as critical damping coefficient. So, c꜀ = (2*wₙ*mass) = ".$cc1val." N/m/s";  $df1=round(($cc/$cc1val),5);
                $forcedata[]="Damping factor is ratio of actual damping coefficient(c) to critical damping coefficient(c꜀). Damping factor has no unit and it is equal to ".$df1;    
                if($df1<1){ $forcedata[]="Damping factor is ".$df1." which is less than 1. So this is underdamped system"; } 
                else if($df1==1){ $forcedata[]="Damping factor is ".$df1.". So this is critically damped system"; } 
                else if($df1>1){ $forcedata[]="Damping factor is ".$df1." which is more than 1. So this is overdamped system"; } 
                $rval=round(($wval/$f1val),2);  $forcedata[]="r is ratio of entered angular velocity to natural circular frequency. r=(w/wₙ)=".$rval." for this system. It is unitless quantity and at resonance r = 1.";
                if($cc1val>$cc){ $forcedata[]="ln(xₙ/xₙ₊₁) = ".round((2*pi()*$cc)/sqrt(pow($cc1val,2)-pow($cc,2)),5); }else { $forcedata[]="Critically damping coefficient is less than actual entered damping coefficient which is result of overdamped system ans it is not possible for logarithmic decrement"; }
                $lam=round(($force/$stiff),2); 
                if($rval<=1){
                    $forcedata[]="Phase angle is ".round((180/pi())*atan((2*$df1*$rval)/(1-pow($rval,2))),3)."°. It is the angle introduced by damper between applied force and spring force. When no damper is used phase angle is zero i.e applied force is in direction of spring force. At resonance phase angle is 90°"; 
                    $forcedata[]="Magnification factor is ratio of deflection due to forced vibration (i.e considering effect of vibration) to deflection under static load (i.e F/k no damping). Magnification factor = ".round((1/sqrt(pow((2*$df1*$rval),2)+pow((1-pow($rval,2)),2))),3)." This values may go high at resonance condition.";
                    $forcedata[]="Deflection under static load is ".$lam."mm. Deflection due to forced vibration is ".round(($lam/sqrt(pow((2*$df1*$rval),2)+pow((1-pow($rval,2)),2))),2)." mm";
                    $forcedata[]="Transmissiblity is ratio of force transmitted to force applied. Transmissibility = ".round(sqrt((1+pow((2*$df1*$rval),2))/(pow((2*$df1*$rval),2)+pow((1-pow($rval,2)),2))),3);
                    $forcedata[]="Force transmitted is ".round(($force*sqrt((1+pow((2*$df1*$rval),2))/(pow((2*$df1*$rval),2)+pow((1-pow($rval,2)),2)))),2)."N";
                }
                else if($rval>1){
                    $forcedata[]="Phase angle is ".round((180/pi())*atan((2*$df1*$rval)/(pow($rval,2)-1)),3)."°. It is the angle introduced by damper between applied force and spring force. When no damper is used phase angle is zero i.e applied force is in direction of spring force. At resonance phase angle is 90°"; 
                    $forcedata[]="Magnification factor is ratio of deflection due to forced vibration (i.e considering effect of vibration) to deflection under static load (i.e F/k no damping). Magnification factor = ".round((1/sqrt(pow((2*$df1*$rval),2)+pow((pow($rval,2)-1),2))),3)." This values may go high at resonance condition.";
                    $forcedata[]="Deflection under static load is ".$lam." mm. Deflection due to forced vibration is ".round(($lam/sqrt(pow((2*$df1*$rval),2)+pow((pow($rval,2)-1),2))),2)." mm";
                    $forcedata[]="Transmissiblity is ratio of force transmitted to force applied. Transmissibility = ".round(sqrt((1+pow((2*$df1*$rval),2))/(pow((2*$df1*$rval),2)+pow((pow($rval,2)-1),2))),3);
                    $forcedata[]="Force transmitted is ".round(($force*sqrt((1+pow((2*$df1*$rval),2))/(pow((2*$df1*$rval),2)+pow((pow($rval,2)-1),2)))),2)."N";
                }
                if($cc>0){ $forcedata[]="When entered angular velocity becomes equal to natural circular frequency then that condition is known as resonance. (i.e r = w/wₙ = 1). Deflection at resonance is ".round(($lam*(1/(2*$df1))),2)." mm. Compare it with static deflection and forced vibration deflection. This deflection can sometimes be dangerous."; }else { $forcedata[]="Damper is not there so no condition for resonance."; }
            }
            $para["pLamx3t"]=$forcedata; $data["para"]=$para;
        }

        if(($form_data->type)=="magn"){
            $r1=($form_data->iLman8f); $xline1=[]; $g1=[]; $g2=[]; $g3=[]; $magndata=[];
            for ($i = 0; $i <= 3; $i=($i+0.1)) {
                $xline1[]=round($i,2);
                    if($i<=1){  $g1[]=round((1/pow((pow((2*$i*$r1),2)+pow((1-($i*$i)),2)),0.5)),2);
                        $g2[]=round((1/pow((pow((2*$i*($r1+0.1)),2)+pow((1-($i*$i)),2)),0.5)),2);
                        $g3[]=round((1/pow((pow((2*$i*($r1+0.2)),2)+pow((1-($i*$i)),2)),0.5)),2);
                    }
                    else{ $g1[]=round((1/pow((pow((2*$i*$r1),2)+pow((($i*$i)-1),2)),0.5)),2);
                        $g2[]=round((1/pow((pow((2*$i*($r1+0.1)),2)+pow((($i*$i)-1),2)),0.5)),2);
                        $g3[]=round((1/pow((pow((2*$i*($r1+0.2)),2)+pow((($i*$i)-1),2)),0.5)),2);
                    }
                }
            $magndata[]=$xline1;    $magndata[]=$g1;    $magndata[]=$g2;    $magndata[]=$g3;  $magndata[]=$r1;
            $para["k2olAi"]=$magndata; $data["para"]=$para;
        }

        if(($form_data->type)=="trans"){
            $r2=($form_data->haImx8p); $xline2=[]; $j1=[]; $j2=[]; $j3=[]; $transdata=[];
            for ($i = 0; $i <= 3; $i=($i+0.1)) {
                $xline2[]=round($i,2);
                    if($i<=1){  $j1[]=round(sqrt((1+(2*$i*$r2))/(pow((2*$i*$r2),2)+pow((1-($i*$i)),2))),2);
                        $j2[]=round((sqrt(1+(2*$i*($r2+0.1)))/pow((pow((2*$i*($r2+0.1)),2)+pow((1-($i*$i)),2)),0.5)),2);
                        $j3[]=round((sqrt(1+(2*$i*($r2+0.2)))/pow((pow((2*$i*($r2+0.2)),2)+pow((1-($i*$i)),2)),0.5)),2);
                    }
                    else{ $j1[]=round((sqrt(1+(2*$i*$r2))/pow((pow((2*$i*$r2),2)+pow((($i*$i)-1),2)),0.5)),2);
                        $j2[]=round((sqrt(1+(2*$i*($r2+0.1)))/pow((pow((2*$i*($r2+0.1)),2)+pow((($i*$i)-1),2)),0.5)),2);
                        $j3[]=round((sqrt(1+(2*$i*($r2+0.2)))/pow((pow((2*$i*($r2+0.2)),2)+pow((($i*$i)-1),2)),0.5)),2);
                    }
                }
            $transdata[]=$xline2;    $transdata[]=$j1;    $transdata[]=$j2;    $transdata[]=$j3;  $transdata[]=$r2;
            $para["gKmsx4i"]=$transdata; $data["para"]=$para;
        }

        echo json_encode($data);
}   ?>