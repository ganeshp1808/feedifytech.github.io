<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        if(($form_data->type)=="UM"){
            $uv=($form_data->uvValue); $mass=($form_data->mValue);  $tpval=($form_data->aJn3f); $tp=[]; $vimo=[];
            $tp[]=round(($uv/10),2); $tp[]=round(($uv/9.81),2);  $tp[]=round(($uv/5),2); $tp[]=round(($uv/4.905),2);
            $tp[]=round((($uv*$uv)/20),2); $tp[]=round((($uv*$uv)/(2*9.81)),2); $tp[]=round(((0.5*$mass*$uv*$uv)),2);
            if(is_numeric($tpval)){   $vimo[]=round($tpval,2); 
                if($tpval<=$tp[1]){ 
                    $vimo[]=round(($uv-($tpval*10)),2); $vimo[]=round(($uv-($tpval*9.81)),2); 
                    $vimo[]=round(((($uv*$uv)-(pow(($uv-($tpval*10)),2)))/20),2); $vimo[]=round(((($uv*$uv)-(pow(($uv-($tpval*9.81)),2)))/19.62),2);
                    $vimo[]=round(($mass*0.5*$vimo[1]*$vimo[1]),2); $vimo[]=round(($mass*0.5*$vimo[2]*$vimo[2]),2);
                    $vimo[]=round(($mass*10*$vimo[3]),2); $vimo[]=round(($mass*9.81*$vimo[4]),2);
                }
                else if($tpval>$tp[1]){ 
                    $vimo[]=round((($tpval*10)-$uv),2); $vimo[]=round((($tpval*9.81)-$uv),2); 
                    $vimo[]=round(((($uv*$uv)-(pow(($uv-($tpval*10)),2)))/20),2); $vimo[]=round(((($uv*$uv)-(pow(($uv-($tpval*9.81)),2)))/19.62),2);
                    $vimo[]=round(($mass*0.5*$vimo[1]*$vimo[1]),2); $vimo[]=round(($mass*0.5*$vimo[2]*$vimo[2]),2);
                    $vimo[]=round(($mass*10*$vimo[3]),2); $vimo[]=round(($mass*9.81*$vimo[4]),2);
                }
            }
            $para["ahJs2w1"]=$tp;   $para["dNx2uh"]=$vimo;  $data["para"]=$para;
        }
        
        if(($form_data->type)=="PM"){
            $u=($form_data->uvValue); $h=($form_data->hValue); $m=($form_data->mValue); $a=($form_data->aValue); $tval=($form_data->wKm3f);
            $air=(($a*pi())/180); $tu=[]; $tp=[]; $ha=[]; $rv=[]; $pd=[];   $proj=[];
            $tu[]=round((($u*sin($air))/10),2); $tu[]=round((($u*sin($air))/9.81),2); $tu[]=round(2*(($u*sin($air))/10),2); $tu[]=round(2*(($u*sin($air))/9.81),2); 
            $tp[]=round((((sqrt(pow(($u*sin($air)),2)+(2*10*$h)))-($u*sin($air)))/10),2);
            $tp[]=round((((sqrt(pow(($u*sin($air)),2)+(2*9.81*$h)))-($u*sin($air)))/9.81),2);
            $pd[]=round(($tu[2]+$tp[0]),2);   $pd[]=round(($tu[3]+$tp[1]),2);
            $ha[]=round(((pow(($u*sin($air)),2))/20),2);    $ha[]=round((((pow(($u*sin($air)),2))/20)+$h),2);
            $ha[]=round(((pow(($u*sin($air)),2))/19.62),2);    $ha[]=round((((pow(($u*sin($air)),2))/19.62)+$h),2);
            $rv[]=round((($u*$u*sin(2*$air))/10),2);    $rv[]=round(((($u*$u*sin(2*$air))/10)+($u*cos($air)*tp[0])),2);
            $rv[]=round((($u*$u*sin(2*$air))/9.81),2);     $rv[]=round(((($u*$u*sin(2*$air))/9.81)+($u*cos($air)*tp[1])),2);
            $ke=round(((0.5*$m*$u*$u)),2); 
            if(is_numeric($tval)){
                $proj[]=round($tval,2); $proj[]=round(($u*cos($air)),2);    
                if($tval<$tu[0]){ $proj[]=round((($u*cos($air))-($tval*10)),2); }else if($tval>=$tu[0]){ $proj[]=round(($tval-$tu[0])*10,2); }
                if($tval<$tu[0]){ $proj[]=round((($u*cos($air))-($tval*10)),2); }else if($tval>=$tu[0]){ $proj[]=round(($tval-$tu[0])*10,2); }
                $proj[]=$rang=round(($u*cos($air)*$tval),2);
                if($tval<$tu[0]){ $proj[]=round(((($u*sin($air))*$tval)-($tval*5*$tval)+$h),2); }else if($tval>=$tu[0]){ $proj[]=round((((pow(($u*sin($air)),2)/20)+$h)-(pow(($tval-$tu[0]),2)*5)),2); }
                if($tval<$tu[0]){ $proj[]=round(((($u*sin($air))*$tval)-($tval*4.905*$tval)+$h),2); }else if($tval>=$tu[0]){ $proj[]=round((((pow(($u*sin($air)),2)/19.62)+$h)-(pow(($tval-$tu[0]),2)*5)),2); }
                $proj[]=round(atan($proj[2]/$proj[1])*(180/pi()),2);    $proj[]=round(atan($proj[3]/$proj[1])*(180/pi()),2);
            }
            $para["smbal3i"]=$tu;   $para["msJy2oa"]=$tp;   $para["kSmal02"]=$ha;   $para["ksmTw8a"]=$rv;$para["nsmJa9e"]=$ke;$para["gXmsi3a"]=$pd;
            $para["kjsUj"]=$proj;  $data["para"]=$para;
        }
    echo json_encode($data);
} ?>