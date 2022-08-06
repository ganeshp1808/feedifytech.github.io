<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $force=($form_data->skw3mSQ);   $material=($form_data->jsLams2);   $length=($form_data->jshjd9C);   $fos=($form_data->zmalYa3);
        $entdata=[];    $calcdata=[];   $eccdata=[];    $csdata=[];
            if(($force>0) && ($material>0) && ($length>10)){
    	        $stressvalues= array(array('Material', 'Syt','Sct','Ssy','density','E','poison','Type'),
                        array('FG150','150','600','173','7.05','100000','0.26','B'), array('FG220','220','768','253','7.15','120000','0.26','B'),
                        array('FG350','350','1080','403','7.3','145000','0.26','B'),array('WM400','400','410','360','7.4','175800','0.26','B'), 
                        array('BM320','320','350','288','7.35','168900','0.26','B'),array('PM500','500','510','450','7.35','172400','0.26','B'),
                        array('SG500/7','344','379','200','7.13','171000','0.275','D'),array('30C8','400','400','231','7.2','200000','0.29','D'),
                        array('Stainless Steel(Alloy Steel)','207','207','116','7.75','193000','0.31','D'),
                        array('Alluminium Alloy','280','280','162','2.7','71000','0.33','D'),
                        array('Polyamide Nylon Plastic','124','90','72','1.35','5960','0.35','F'),
                        array('Low Density Polyethene','11.4','11.4','5','0.924','221','0.448','F'),
                        array('Brass Cast','195','165','51','8.15','117000','0.345','D'),array('Brass Wrought','125','125','73','8.46','103000','0.345','D'),array('Bronze Cast','144','144','51','8.81','80000','0.345','D'),array('Copper','280','280','162','8.3','110000','0.34','D'),
                        array('Gold','120','120','70','19.32','77200','0.42','D'),array('Human Bone','104','209','52','1.9','21000','0.42','B'),
                        array('Bamboo','39','36.6','10','0.693','17300','0.384','B'),array('Concrete','5','41','3','2.3','30000','0.18','B'),
                        array('Wood(Pine)','41','33','7','0.487','9300','0.374','B'));

    	        $entdata[]=$force;    $entdata[]=$stressvalues[$material][0]; $entdata[]=$length;    $entdata[]=$fos;
                $tensile=$stressvalues[$material][1];   $crush=$stressvalues[$material][2];
                $matdens=$stressvalues[$material][4]; $mate=$stressvalues[$material][5]; 

                $calcdata[]=round(((9.81*$matdens*pow($length,2))/(2*$mate*1000)),8);
                $calcdata[]=round((($tensile*$length)/($mate*$fos)),6); $calcdata[]=round(($tensile/($mate*$fos)),6);
                $calcdata[]=round((($crush*$length)/($mate*$fos)),6); $calcdata[]=round(($crush/($mate*$fos)),6);
                $calcdata[]=round(sqrt((4*$force*$fos)/($tensile*pi())),3); $calcdata[]=$circcomp=round(sqrt((4*$force*$fos)/($crush*pi())),3);
                $calcdata[]=round(sqrt((1.33*$force*$fos)/($tensile*pi()))*2,3); $calcdata[]=round(sqrt((1.33*$force*$fos)/($tensile*pi())),3);
                $calcdata[]=round(sqrt((1.33*$force*$fos)/($crush*pi()))*2,3);    $calcdata[]=round(sqrt((1.33*$force*$fos)/($crush*pi())),3);
                $calcdata[]=round(sqrt(($force*$fos)/$tensile),3); $calcdata[]=round(sqrt(($force*$fos)/$crush),3);
                $calcdata[]=round(sqrt((0.5*$force*$fos)/$tensile)*2,3); $calcdata[]=round(sqrt((0.5*$force*$fos)/$tensile),3);
                $calcdata[]=round(sqrt((0.5*$force*$fos)/$crush)*2,3);    $calcdata[]=round(sqrt((0.5*$force*$fos)/$crush),3);
                $calcdata[]=round(sqrt((2.31*$force*$fos)/$tensile),3); $calcdata[]=round(sqrt((2.31*$force*$fos)/$crush),3);
                $calcdata[]=round(sqrt((0.581*$force*$fos)/$tensile),3); $calcdata[]=round(sqrt((0.581*$force*$fos)/$crush),3);
                $calcdata[]=round(sqrt((0.385*$force*$fos)/$tensile),3); $calcdata[]=round(sqrt((0.385*$force*$fos)/$crush),3);
                $eccdata[]=round((sqrt((4*$force*$fos)/($tensile*pi())))/8,3); $eccdata[]=round((sqrt((4*$force*$fos)/($crush*pi())))/8,3);
                $eccdata[]=round((sqrt(($force*$fos)/$tensile))/6,3); $eccdata[]=round((sqrt(($force*$fos)/$crush))/6,3);
                $eccdata[]=round(sqrt((0.5*$force*$fos)/$tensile)/3,3); $eccdata[]=round(sqrt((0.5*$force*$fos)/$tensile)/6,3);
                $eccdata[]=round(sqrt((0.5*$force*$fos)/$crush)/3,3);    $eccdata[]=round(sqrt((0.5*$force*$fos)/$crush)/6,3);
                $eccdata[]=round(sqrt((2.31*$force*$fos)/$tensile)/6.63,3); $eccdata[]=round(sqrt((2.31*$force*$fos)/$crush)/6.63,3);
                $eccdata[]=round(sqrt((0.581*$force*$fos)/$tensile)/4.16,3); $eccdata[]=round(sqrt((0.581*$force*$fos)/$crush)/4.16,3);
                $eccdata[]=round(sqrt((0.385*$force*$fos)/$tensile)/3,3); $eccdata[]=round(sqrt((0.385*$force*$fos)/$crush)/3,3);
                $const1=(($crush/$fos)*(pi()/4)*pow($circcomp,4));
                $const2=(($crush*8)/(pi()*pi()*$mate*$fos));
                $csdata[]=($const1/(pow($circcomp,2)+($const2*pow($length,2))));  
                $csdata[]=($const1/(pow($circcomp,2)+(4*$const2*pow($length,2))));
                $csdata[]=($const1/(pow($circcomp,2)+(0.5*$const2*pow($length,2))));  
                $csdata[]=($const1/(pow($circcomp,2)+(0.25*$const2*pow($length,2))));
                if($length<=(8*$circcomp)){ $csdata[]="Short"; }
                else if (($length>(8*$circcomp)) && ($length<=(30*$circcomp))){ $csdata[]="Medium"; } 
                else if($length>(30*$circcomp)){ $csdata[]="Long"; }
        }
        $para["gsNzm4k"]=$entdata;  $para["ykMx1oa"]=$calcdata; $para["klZm4sa"]=$eccdata;  $para["eXm8jjj"]=$csdata; $para["wnxZn4r"]=$stressvalues; 
        $data["para"]=$para;  echo json_encode($data);
} ?>