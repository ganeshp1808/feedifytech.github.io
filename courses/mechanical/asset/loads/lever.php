<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];
    $submit_token=$form_data->token; $error=[];$data=[];$para=[];
	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $force=($form_data->skw3mSQ);   $material=($form_data->jsLams2);   $length=($form_data->jshjd9C);   $fos=($form_data->zmalYa);
        $lv=($form_data->wJn);  $fv=($form_data->BB3k);  $ev=($form_data->s9hr);    $levdata=[];  

            if(($force>0) && ($material>0) && ($length>0) && is_numeric($lv) && ($lv>=0) && is_numeric($fv) && ($fv>=0) && is_numeric($ev) && ($ev>=0)){
                $para["sval"]=$stressvalues= array(array('Material', 'Syt','Sct','Ssy','density','E','poison','Type'),
                            array('FG150','150','600','173','7.05','100000','0.26','B'), array('FG220','220','768','253','7.15','120000','0.26','B'),
                            array('FG350','350','1080','403','7.3','145000','0.26','B'), array('WM400','400','410','360','7.4','175800','0.26','B'),
                            array('BM320','320','350','288','7.35','168900','0.26','B'), array('PM500','500','510','450','7.35','172400','0.26','B'),
                            array('SG500/7','344','379','200','7.13','171000','0.275','D'), array('30C8','400','400','231','7.2','200000','0.29','D'),
                            array('Stainless Steel(Alloy Steel)','207','207','116','7.75','193000','0.31','D'),
                            array('Alluminium Alloy','280','280','162','2.7','71000','0.33','D'), 
                            array('Polyamide Nylon Plastic','124','90','72','1.35','5960','0.35','F'),
                            array('Low Density Polyethene','11.4','11.4','5','0.924','221','0.448','F'),
                            array('Brass Cast','195','165','51','8.15','117000','0.345','D'), 
                            array('Brass Wrought','125','125','73','8.46','103000','0.345','D'),
                            array('Bronze Cast','144','144','51','8.81','80000','0.345','D'),
                            array('Copper','280','280','162','8.3','110000','0.34','D'), array('Gold','120','120','70','19.32','77200','0.42','D'),
                            array('Human Bone','104','209','52','1.9','21000','0.42','B'), array('Bamboo','39','36.6','10','0.693','17300','0.384','B'),
                            array('Concrete','5','41','3','2.3','30000','0.18','B'), array('Wood(Pine)','41','33','7','0.487','9300','0.374','B'));
                    $entdata[]=0; $entdata[]=$force; $entdata[]=$stressvalues[$material][0]; $entdata[]=$length;  $entdata[]=$fos; 
                    $tensile=$stressvalues[$material][1];  
                    if(($lv<=$length) && ($ev<=$length) && ($fv<=$length) && (($fv!=$lv) || ($fv!=$ev) || ($lv!=$ev))){ $entdata[0]=1;
                        if((($lv<$fv) && ($fv<$ev)) || (($lv>$fv) && ($fv>$ev))){ $levdata[]="Type 1 Lever (i.e Fulcrum between effort and load)"; }
                        else if((($ev<$lv) && ($lv<$fv)) || (($ev>$lv) && ($lv>$fv))){ $levdata[]="Type 2 Lever (i.e Load between effort and fulcrum)"; }
                        else if((($lv<$ev) && ($ev<$fv)) || (($lv>$ev) && ($ev>$fv))){ $levdata[]="Type 3 Lever (i.e Effort between fulcrum and load)"; }
                        else{ $levdata[]="Invalid Type (may be loads coincide)"; $entdata[0]=0; }

                        if((($lv<$fv) && ($fv<$ev)) || (($lv>$fv) && ($fv>$ev)))
                            { $levdata[]=round((($fv-$lv)/($ev-$fv)),3);    $levdata[]=round($force/(($fv-$lv)/($ev-$fv)),3); }
                        else if(((($ev<$lv) && ($lv<$fv)) || (($ev>$lv) && ($lv>$fv))) || ((($lv<$ev) && ($ev<$fv)) || (($lv>$ev) && ($ev>$fv))))
                            { $levdata[]=round((($ev-$fv)/($lv-$fv)),3);    $levdata[]=round($force/(($ev-$fv)/($lv-$fv)),3); }

                        if((($lv<$fv) && ($fv<$ev)) || (($lv>$fv) && ($fv>$ev))){ $levdata[]=round(((($force*($fv-$lv))/(($ev-$fv)))+$force),3); }
                        else if((($ev<$lv) && ($lv<$fv)) || (($ev>$lv) && ($lv>$fv))){ $levdata[]=round(($force-((($force*($lv-$fv))/($ev-$fv)))),3); }
                        else if((($lv<$ev) && ($ev<$fv)) || (($lv>$ev) && ($ev>$fv))){ $levdata[]=round((((($force*($lv-$fv))/($ev-$fv)))-$force),3); }

                        if($fv>$lv){ $levdata[]=round(pow((($force*($fv-$lv)*20.37*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($fv-$lv)*6*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($fv-$lv)*24*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($fv-$lv)*3*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($fv-$lv)*20.4*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($fv-$lv)*2.55*$fos)/$tensile),(1/3)),3); }
                        else if($fv<$lv){ $levdata[]=round(pow((($force*($lv-$fv)*20.37*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($lv-$fv)*6*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($lv-$fv)*24*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($lv-$fv)*3*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($lv-$fv)*20.4*$fos)/$tensile),(1/3)),3);
                            $levdata[]=round(pow((($force*($lv-$fv)*2.55*$fos)/$tensile),(1/3)),3); }
                    } 
                    else if(($lv>$length) || ($ev>$length) || ($fv>$length)){ $levdata[]="Load going out of lever reduce the value"; $entdata[0]=0; }
                    $mats=[]; $circdia=[];  $squareside=[]; $rectb=[];  $ellipse=[];
                    for ($x=1; $x<count($stressvalues) ; $x++){
                        $mats[]=($stressvalues[$x][0]);
                        $cirdia[]=round(pow(((32/pi())*($force*$length*$fos)/$stressvalues[$x][1]),(1/3)),2);
                        $squareside[]=round(pow((6*($force*$length*$fos)/$stressvalues[$x][1]),(1/3)),2);
                        $rectb[]=round(pow((3*($force*$length*$fos)/$stressvalues[$x][1]),(1/3)),2);
                        $ellipse[]=round(pow(((8/pi())*($force*$length*$fos)/$stressvalues[$x][1]),(1/3)),2);
                    }	
            }
        $para['aA']=$mats; $para['bB']=$cirdia; $para['cC']=$squareside;   $para['dD']=$rectb; $para['eE']=$ellipse; $para['g1Hj']=$entdata; 
        $para['abcD']=$levdata; $data["para"]=$para;
    echo json_encode($data);
} ?>