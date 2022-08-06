<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];
	$submit_token=$form_data->token; $error=[];$data=[];$para=[];
	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $power=($form_data->skw3mSQ); $material=($form_data->jsLams2); $rpm=($form_data->jshjd9C); $sf=($form_data->sMn2B); $vr=($form_data->j9Kax); 
        $fos=($form_data->xMe6y); $ha=(pi()*($form_data->qHz))/180;  $stantype=($form_data->aMb4g);   $bbm=($form_data->gF2b);   $helixdata=[]; 
        if(($power>0) && ($material>0) && ($rpm>0) && ($stantype>0)){
    	    $stressvalues= array(array('Material', 'Sut','Syt','Hardness','Cycle','Type'),
                array('FG150','150','150','130','10000000','1','100000'), array('FG220','220','220','180','10000000','1','120000'),
                array('FG350','350','350','207','10000000','1','145000'), array('WM400','400','400','220','10000000','1','175800'),
                array('BM320','320','320','150','10000000','1','168900'), array('PM500','500','500','160','10000000','1','172400'),
                array('SG500/7','500','500','200','10000000','1','171000'), array('30C8','500','400','179','10000000','2','200000'),
                array('C45','720','380','241','10000000','2','206000'), array('40Ni10Cr3Mo6','1550','750','313','250000000','3','193000'),
                array('40Ni10Cr3Mo28','1000','750','444','250000000','3','193000'), array('30Ni4Cr1','1100','750','410','250000000','3','193000'),
                array('35Ni1Cr60','1150','750','450','250000000','3','193000'), array('Alluminium Alloy','375','225','150','10000000','2','71000'),
                array('Polyamide Nylon Plastic','124','124','90','10000000','4','5960'), array('Wood(Pine)','41','41','7','10000000','4','9300'),
                array('Bronze','240','144','195','10000000','2','80000'), array('Copper','320','247','160','10000000','2','125000'));
                $tensile=$stressvalues[$material][1];   $mate=$stressvalues[$material][6];
                if(($stressvalues[$material][5])==1){ $const1=((14*0.45*$stressvalues[$material][1])/15); $const2=((2.8*$stressvalues[$material][3])-70); }
                else if(($stressvalues[$material][5])==2){ $const1=((1.4*((2.2*($stressvalues[$material][1]+$stressvalues[$material][2]))+500))/13);
                    $const2=((2.8*$stressvalues[$material][3])-70); }
                else if(($stressvalues[$material][5])==3){ $const1=((1.4*1.1266*((3.5*$stressvalues[$material][1])+1200))/16); 
                    $const2=((2.8*$stressvalues[$material][3])-70); }
                else if(($stressvalues[$material][5])==4){ $const1=$stressvalues[$material][1]; $const2=((2.8*$stressvalues[$material][3]));  }

        	    $helixdata[]=$dpval=round(($sf*$power),3); $helixdata[]=round(($rpm/$vr),3); 
                $helixdata[]=$tval=round((($dpval*60000)/(2.00*$rpm*pi())),3); $helixdata[]=$bval=round(($const1/$fos),3); $helixdata[]=$cval=round($const2,3);
                if($stantype==1){
                    $helixdata[]="14.5° Full Depth Involute is quite in operation";$helixdata[]="14.5°";
                    $helixdata[]=$apt=32;  $helixdata[]=$agt=round((32*$vr)+1,0);
                    $helixdata[]=$vpt=round((32/pow(cos($ha),3)),0);     $helixdata[]=$vgt=round((((32*$vr)+1)/pow(cos($ha),3)),0); }
                else if($stantype==2){
                    $helixdata[]="20° Full Depth Involute is widely used system and is optimised result of pressure angle and contact duration";
                    $helixdata[]="20°";  $helixdata[]=$apt=18;    $helixdata[]=$agt=round((18*$vr)+1,0);
                    $helixdata[]=$vpt=round((18/pow(cos($ha),3)),0);     $helixdata[]=$vgt=round((((18*$vr)+1)/pow(cos($ha),3)),0);
                }
                else if($stantype==3){
                    $helixdata[]="20° Stub Involute have teeth stronger than 20° Full Depth Involute System but due to contact duration reduced vibration can occur lot in this system"; $helixdata[]="20°";   $helixdata[]=$apt=14;   $helixdata[]=$agt=round((14*$vr)+1,0);
                    $helixdata[]=$vpt=round((14/pow(cos($ha),3)),0);     $helixdata[]=$vgt=round((((14*$vr)+1)/pow(cos($ha),3)),0);
                }
                $helixdata[]=$lewp=round((pi()*(0.154-(0.912/$vpt))),5);   $helixdata[]=$lewg=round((pi()*(0.154-(0.912/$vgt))),5);   
                $helixdata[]="Lewis form factor for pinion is less. So, pinion is weaker so design on pinion to make it stronger and suitable for gear";
                $fmod=round(1.15*cos($ha)*pow(($tval/($bval*$lewp*$bbm*$apt)),(1/3)),5); 
                if(((1.25*$fmod)-floor(1.25*$fmod))<0.5){ $module=round((floor(1.25*$fmod)+1),0); }
                else if(((1.25*$fmod)-floor(1.25*$fmod))>=0.5){ $module=round(1.25*$fmod,0); }
                $helixdata[]="Module calculated is ".$fmod." mm. Increasing module by 25% to increase safety and strength also taking care of pitting failure mdoule becomes ".round(1.25*$fmod,5).". Finally taking module to next value and normal module (mₙ) is ".$module." mm";
                $helixdata[]=$tmodule=round(($module/cos($ha)),3);
                $helixdata[]=$fwval=round(($bbm*$module),0);
                $helixdata[]=$velo=round(((pi()*$module*$apt*$rpm)/60000),3);
                if(($velo<20) && (($bval*$fwval*$lewp*$module) > ((($tval*2)/($module*$apt))*((6+$velo)/6)))){ $helixdata[]= round(($bval*$fwval*$lewp*$module),3)." N > ".round(((($tval*2)/($module*$apt))*((6+$velo)/6)),3)."  N. (Gears are safe under lewis dynamic load as Static Strength > Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, helix angle to get more possibilities)"; }
                else if(($velo<20) && (($bval*$fwval*$lewp*$module) < ((($tval*2)/($module*$apt))*((6+$velo)/6)))){ $helixdata[]= round(($bval*$fwval*$lewp*$module),3)." N < ".round(((($tval*2)/($module*$apt))*((6+$velo)/6)),3)."  N. (Gears are not safe under lewis dynamic load as Static Strength < Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, helix angle to get more possibilities)"; }
                else if(($velo>20) && (($bval*$fwval*$lewp*$module) > ((($tval*2)/($module*$apt))*((5.6+sqrt($velo))/5.6)))){ $helixdata[]= round(($bval*$fwval*$lewp*$module),3)." N > ".round(((($tval*2)/($module*$apt))*((5.6+sqrt($velo))/5.6)),3)."  N. (Gears are safe under lewis dynamic load as Static Strength > Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, helix angle to get more possibilities)"; }
                else if(($velo>20) && (($bval*$fwval*$lewp*$module) < ((($tval*2)/($module*$apt))*((5.6+sqrt($velo))/5.6)))){ $helixdata[]= round(($bval*$fwval*$lewp*$module),3)." N < ".round(((($tval*2)/($module*$apt))*((5.6+sqrt($velo))/5.6)),3)."  N. (Gears are not safe under lewis dynamic load as Static Strength < Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, helix angle to get more possibilities)"; }

                if((1.4*(($vr+1)/($module*($apt+(($apt*$vr)+1))))*sqrt((($vr+1)/($module*10.00))*$mate*$bval)) < $const2){ 
                    $helixdata[]= round((1.4*(($vr+1)/($module*($apt+(($apt*$vr)+1))))*sqrt((($vr+1)/($module*10.00))*$mate*$bval)),2)." N/mm²  < ". round($const2,2)." N/mm². So design of gear is safe under contact stress."; }
                else if((1.4*(($vr+1)/($module*($apt+(($apt*$vr)+1))))*sqrt((($vr+1)/($module*10.00))*$mate*$bval)) > $const2){ 
                    $helixdata[]= round((1.4*(($vr+1)/($module*($apt+(($apt*$vr)+1))))*sqrt((($vr+1)/($module*10.00))*$mate*$bval)),2)." N/mm²  > ". round($const2,2)." N/mm². So design of gear is not safe under contact stress. You have to increase internal property of gear for example BHN value to increase hardness."; }
                $helixdata[]=round((($module*0.5)*($apt+(($apt*$vr)+1)))/(cos($ha)),2); 
                if($stantype==1){
                    $helixdata[]=round($module,0); $helixdata[]=round(1.57*$module,2); $helixdata[]=round(0.157*$module,2); $helixdata[]=round(2*$module,2); 
                    $helixdata[]=round(2.157*$module,2); $helixdata[]=round(1.5708*$module,2);
                    $helixdata[]=round(($apt*$module)/cos($ha),2);  $helixdata[]=round((($module*(($apt*$vr)+1))/cos($ha)),2); 
                    $helixdata[]=round((($apt/cos($ha))+2)*$module,2);  $helixdata[]=round($module*(($agt/cos($ha))+2),2);
                    $helixdata[]=round(($module*(($apt/cos($ha))-2))-(0.314*$module),2); $helixdata[]=round(($module*(($agt/cos($ha))-2))-(0.314*$module),2); }
                else if($stantype==2){
                    $helixdata[]=round($module,0);  $helixdata[]=round(1.25*$module,2); $helixdata[]=round(0.25*$module,2); $helixdata[]=round(2*$module,2); 
                    $helixdata[]=round(2.25*$module,2); $helixdata[]=round(1.5708*$module,2);
                    $helixdata[]=round(($apt*$module)/cos($ha),2);  $helixdata[]=round((($module*(($apt*$vr)+1))/cos($ha)),2); 
                    $helixdata[]=round((($apt/cos($ha))+2)*$module,2);  $helixdata[]=round($module*(($agt/cos($ha))+2),2);
                    $helixdata[]=round(($module*(($apt/cos($ha))-2))-(0.5*$module),2); $helixdata[]=round(($module*(($agt/cos($ha))-2))-(0.5*$module),2); }
                else if($stantype==3){
                    $helixdata[]=round(0.8*$module,2); $helixdata[]=round($module,2); $helixdata[]=round(0.2*$module,2); $helixdata[]=round(1.6*$module,2); 
                    $helixdata[]=round(1.8*$module,2); $helixdata[]=round(1.5708*$module,2);
                    $helixdata[]=round(($apt*$module)/cos($ha),2);  $helixdata[]=round((($module*(($apt*$vr)+1))/cos($ha)),2); 
                    $helixdata[]=round((($apt/cos($ha))+1.6)*$module,2);  $helixdata[]=round($module*(($agt/cos($ha))+1.6),2);
                    $helixdata[]=round(($module*(($apt/cos($ha))-1.6))-(0.4*$module),2); $helixdata[]=round(($module*(($agt/cos($ha))-1.6))-(0.4*$module),2);
                }

                if((0.55*pow(((pi()*$apt*$tmodule*$apt)/10),0.25))<=3){ $helixdata[]="Intergral Shaft Construction"; }
                else if(((0.55*pow(((pi()*$apt*$tmodule*$apt)/10),0.25))>3) && ((0.55*pow(((pi()*$apt*$tmodule*$apt)/10),0.25))<=7)){ $helixdata[]="Web Type Construction"; } else if((0.55*pow(((pi()*$apt*$tmodule*$apt)/10),0.25))>7){ $helixdata[]="Arm Type Construction"; }
                if((0.55*pow(((pi()*$agt*$tmodule*$agt)/10),0.25))<=3){ $helixdata[]="Intergral Shaft Construction"; }
                else if(((0.55*pow(((pi()*$agt*$tmodule*$agt)/10),0.25))>3) && ((0.55*pow(((pi()*$agt*$tmodule*$agt)/10),0.25))<=7)){ $helixdata[]="Web Type Construction"; } else if((0.55*pow(((pi()*$agt*$tmodule*$agt)/10),0.25))>7){ $helixdata[]="Arm Type Construction"; }
                if(($module*$apt)>0){
                    $helixdata[]=round((($tval*2)/($module*$apt)),2); 
                    $helixdata[]=round((($tval*0.517235168)/($tmodule*$apt)),2); 
                    $helixdata[]=round((($tval*tan($ha))/($module*$apt)),2);
                    $helixdata[]=round((($tval*2)/($module*$agt)),2); 
                    $helixdata[]=round((($tval*0.517235168)/($tmodule*$agt)),2); 
                    $helixdata[]=round((($tval*tan($ha))/($module*$agt)),2);  }
        }   $para["aJb2dd"]=$helixdata;  $data["para"]=$para;
    echo json_encode($data); } ?>