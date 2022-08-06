<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        if(($form_data->type)=="SHM"){  $shmpara=[];
            $a=($form_data->dhJak7i); $k=($form_data->fzopla3); $m=($form_data->mla9woP); $tpval=($form_data->nMz3j); $p=($form_data->kAlem4r); $o=[]; $h=[];
            if(($a!=null) && ($k!=null) && ($m!=null)){
                $o[]=$w=round(sqrt($k/$m),2);  $o[]=($a."* cos(".$w."t - ".$p.")");
                $o[]=(round(($a*$w),2)."* sin(".$w."t - ".$p.")");  $o[]=(round(($a*$w*$w),2)."* sin(".$w."t - ".$p.")");
                $o[]=round(($a*$w),2);  $o[]=round(($a*$w*$w),2);   $o[]=round(($w/(2*pi())),2);    $o[]=round(((2*pi())/$w),2);
                if(($p==0) || ($p==360)){ $o[]="Object is on right extreme point  at a distance of ".$a." cm from center point moving towards left extreme point."; }
                else if(($p>0) && ($p<90)){ $o[]="Object is on right side of center point at a distance of ".round(($a* cos(($p*pi())/180)),2)." cm from center point moving towards left extreme point."; }
                else if($p==90){ $o[]="Object is on center point moving towards left extreme point."; }
                else if(($p>90) && ($p<180)){ $o[]="Object is on left side of center point at a distance of ".round(($a* cos(((180-$p)*pi())/180)),2)." cm from center point moving towards left extreme point."; }
                else if($p==180){ $o[]="Object is on left extreme point  at a distance of ".$a." cm from center point changing moving from left to right."; }
                else if(($p>180) && ($p<270)){ $o[]="Object is on left side of center point at a distance of ".round(($a* cos((($p-180)*pi())/180)),2)." cm from center point moving towards right extreme point."; }
                else if($p==270){ $o[]="Object is on center point moving towards right extreme point."; }
                else if(($p>270) && ($p<360)){ $o[]="Object is on right side of center point at a distance of ".round(($a* cos((($p-270)*pi())/180)),2)." cm from center point moving towards right extreme point."; }
                if(is_numeric($tpval)){
                    $shmpara[]=round($tpval,2);  $shmpara[]=$xval=round(($a*(cos((((($w*$tpval)*(180/pi()))-$p)*pi())/180))),2);
                    $shmpara[]=$vval=round((-1*$a*$w*(sin((((($w*$tpval)*(180/pi()))-$p)*pi())/180))),2);
                    $shmpara[]=$aval=round((-1*$a*$w*$w*(cos((((($w*$tpval)*(180/pi()))-$p)*pi())/180))),2);
                    $shmpara[]=round(($k*0.01*$xval),2);  $shmpara[]=round(($m*0.00005*$vval*$vval),2);  $shmpara[]=round(($k*0.5*$xval*$xval),2);
                }
                $para["ahJs2w1"]=$o;   $para["aMzk"]=$shmpara;
            }           
            $data["para"]=$para;
        }
        if(($form_data->type)=="fm"){
            $w=($form_data->ksIak3l); $f=($form_data->Rkaml9i); $ms=($form_data->mSowl3r); $mk=($form_data->jkdsJn3);  $p=($form_data->Fhan8it); 
            $o=[];
            if(($w!=null) && ($f!=null)){
                $angle=(($p*pi())/180);
                $n1=round(($w-($f*sin($angle))),2); $n2=round(($w+($f*sin($angle))),2);
                if($n1<0){ $o[]="Body is lifted from ground as (vertical component of force ". round(($f*sin($angle)),2)." N ) > ( ". $w." N weight of the body). Decrease force value or angle to make object stay on ground."; }
                else if(($n1>0) && (($ms*$n1)>($f*cos($angle)))){
                    $o[]="Static friction is acting on body which is making body to be at rest. (Static friction ".round(($ms*$n1),2)." N ) > ( ".round(($f*cos($angle)),2)." N horizontal component of force). Force should be greater than ".round(($ms*$n1),2)." N to make object move.";
                }
                else if(($n1>0) && (($ms*$n1)<($f*cos($angle)))){
                    $o[]="Kinetic friction is acting on body as body is moving with accleration of ".round(((($f*cos($angle))-($mk*$n1))*(9.81/$w)),2)." m/s² which is making body move. ( Kinetic friction ".round(($mk*$n1),2)." N ) < ( ".round(($f*cos($angle)),2)." N horizontal component of force). Static friction is ".round(($ms*$n1),2)." N.";
                }
                else if(($n1>0) && (($ms*$n1)==($f*cos($angle)))){
                    $o[]="Equillibrium Stage";
                }
                if($n2<0){ $o[]="Body is lifted from ground as (vertical component of force ". round(($f*sin($angle)),2)." N )> ( ". $w." N weight of the body). Decrease force value or angle to make object stay on ground."; }
                else if(($n2>0) && (($ms*$n2)>($f*cos($angle)))){
                    $o[]="Static friction is acting on body which is making body to be at rest. (Static friction ".round(($ms*$n2),2)." N )> ( ".round(($f*cos($angle)),2)." N horizontal component of force). Force should be greater than ".round(($ms*$n2),2)." N to make object move.";
                }
                else if(($n2>0) && (($ms*$n2)<($f*cos($angle)))){
                    $o[]="Kinetic friction is acting on body as body is moving with accleration of ".round(((($f*cos($angle))-($mk*$n2))*(9.81/$w)),2)." m/s² which is making body move. ( Kinetic friction ".round(($mk*$n2),2)." N ) < ( ".round(($f*cos($angle)),2)." N horizontal component of force). Static friction is ".round(($ms*$n2),2)." N.";
                }
                else if(($n2>0) && (($ms*$n2)==($f*cos($angle)))){
                    $o[]="Equillibrium Stage";
                }
                $para["kjakGh2"]=$o; 
            }           
            $data["para"]=$para;
        }
        if(($form_data->type)=="UCM"){
            $rpm=($form_data->Hajmn2i); $r=($form_data->kMal9is); $m=($form_data->gwTya8u);  $va=($form_data->iAdnk8e); $ms=($form_data->jkA4irT);
            $ba=($form_data->hsUim3e);
            $p=[];  $fc=[];
            if(($rpm!=null) && ($r!=null) && ($m!=null)){
                $p[]=$wval=round(((2*pi()*$rpm)/60),2);   $p[]=round(($rpm/60),2);    $p[]=round(($wval*$r),2);
                $p[]=round(($r*$wval*$wval),2); $p[]=$cf=round(($r*$wval*$wval*$m),2);
                $fc[]=round(($m*10*cos(($va*pi())/180)),2); $fc[]=round((($m*10*cos(($va*pi())/180))+$cf),2);
                $fc[]=round(($m*9.81*cos(($va*pi())/180)),2); $fc[]=round((($m*9.81*cos(($va*pi())/180))+$cf),2);
                $p[]=round(sqrt(10*$ms*$r),2);    $p[]=round(sqrt(9.81*$ms*$r),2);
                if(($ms*tan(($ba*pi())/180))<1){ $p[]=round((sqrt((($ms+tan(($ba*pi())/180))/(1-($ms*tan(($ba*pi())/180))))*$r*10)),2);
                $p[]=round((sqrt((($ms+tan(($ba*pi())/180))/(1-($ms*tan(($ba*pi())/180))))*$r*9.81)),2); }
                if(($ms*tan(($ba*pi())/180))>1){ $p[]=round((sqrt((($ms+tan(($ba*pi())/180))/(($ms*tan(($ba*pi())/180))-1))*$r*10)),2);
                $p[]=round((sqrt((($ms+tan(($ba*pi())/180))/(($ms*tan(($ba*pi())/180))-1))*$r*9.81)),2); }
                $para["ksJe3li"]=$p;   $para["uNaki8l"]=$fc;
            }           
            $data["para"]=$para;
        }
    echo json_encode($data);
}
?>