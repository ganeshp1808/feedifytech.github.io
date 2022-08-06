<?php
error_reporting(0);
ini_set('display_errors', 'Off');
    $form_data=json_decode(file_get_contents("php://input"));
    $confirm_token=$_GET['token'];

    $submit_token=$form_data->token;
    $error=[];$data=[];$para=[];

    if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
            $v=($form_data->gajNwe7); $f=($form_data->hjnEix8); $s=($form_data->gahNu2w);   $m=($form_data->hajB2wy); $t=($form_data->uVsb2wt);  
            $e=($form_data->nabSwy7);  
            $x=[0];  $y=[0];  $z=[0];   $p=[0]; $q=[0]; $r=[0];
            if($v>0){
                $y[]=round((($v*19.32)/1000),2);    $y[]=round((($v*10.49)/1000),2);    $y[]=round((($v*8.81)/1000),2);    $y[]=round((($v*8.15)/1000),2);
                $y[]=round((($v*7.75)/1000),2);    $y[]=round((($v*7.3)/1000),2);    $y[]=round((($v*2.7)/1000),2);    $y[]=round((($v*0.487)/1000),2);
                $y[]=round((($v*2.3)/1000),2);    $y[]=round((($v*0.924)/1000),2);
            }
            
            if($f>0){
                $z[]=round(($f*100000),2);    $z[]=round(($f*0.224809),2);  $z[]=round(($f/9.81),2);    $z[]=round(($f/1000000),2); $z[]=round(($f/1000),2);
            }

            if($s>0){
                $x[]=round(($s*7500.617),2);    $x[]=round(($s*1000000),2);  $x[]=round(($s*7.5),2);    $x[]=round(($s*145.038),2); $x[]=round(($s*9.86),2);
            }

            if($m>0){
                $p[]=round(($m*0.001),2);    $p[]=round(($m*0.01),2);  $p[]=round(($m*2.204),2);    $p[]=round(($m*0.157),2); $p[]=round(($m*35.274),2);
            }

            if(is_numeric($t)){
                $q[]=round(($t+273.15),2);    $q[]=round((($t*1.8)+32),2);  $q[]=round(($t*0.33),2);  $q[]=round((($t+273.15)*1.8),2);
            }

            if($e>0){
                $r[]=round($e,2);    $r[]=round(($e*0.00027778),2);  $r[]=round(($e*6.242),2);  $r[]=round(($e*0.737562),2);
            }

            $para["kqWgvx6"]=$y;    $para["han4nxU"]=$z; $para["jnaNzy3"]=$x;   $para["Hanxi3r"]=$p;    $para["ajNvx3y"]=$q;   $para["kaNwx4u"]=$r;
            $data["para"]=$para;
    echo json_encode($data);
}
?>