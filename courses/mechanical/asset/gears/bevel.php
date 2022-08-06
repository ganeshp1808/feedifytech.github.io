<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];
	$submit_token=$form_data->token; $error=[];$data=[];$para=[];
	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $power=($form_data->skw3mSQ); $material=($form_data->jsLams2); $rpm=($form_data->jshjd9C); $sf=($form_data->sMn2B); $vr=($form_data->j9Kax); 
        $fos=($form_data->xMe6y); $sa=(pi()*($form_data->aKj))/180;  $stantype=($form_data->aMb4g);   $bbm=($form_data->gF2b);   $beveldata=[]; 
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

        	    $beveldata[]=$dpval=round(($sf*$power),3); $beveldata[]=round(($rpm/$vr),3); 
                $beveldata[]=$tval=round((($dpval*60000)/(2.00*$rpm*pi())),3); $beveldata[]=$bval=round(($const1/$fos),3); $beveldata[]=$cval=round($const2,3);
                $beveldata[]=$spcap=round((180*(atan((sin($sa)/($vr+cos($sa))))))/pi(),2);  $beveldata[]=$spcag=round((((180*$sa)/pi())-$spcap),2);
                if($stantype==1){
                    $beveldata[]="14.5° Full Depth Involute is quite in operation";$beveldata[]="14.5°";
                    $beveldata[]=$apt=32;  $beveldata[]=$agt=round((32*$vr)+1,0);
                    $beveldata[]=$vpt=round((32/cos((pi()*$spcap)/180)),0);     $beveldata[]=$vgt=round((((32*$vr)+1)/cos((pi()*$spcag)/180)),0); }
                else if($stantype==2){
                    $beveldata[]="20° Full Depth Involute is widely used system and is optimised result of pressure angle and contact duration";
                    $beveldata[]="20°";  $beveldata[]=$apt=18;    $beveldata[]=$agt=round((18*$vr)+1,0);
                    $beveldata[]=$vpt=round((18/cos((pi()*$spcap)/180)),0);     $beveldata[]=$vgt=round((((18*$vr)+1)/cos((pi()*$spcag)/180)),0);
                }
                else if($stantype==3){
                    $beveldata[]="20° Stub Involute have teeth stronger than 20° Full Depth Involute System but due to contact duration reduced vibration can occur lot in this system"; $beveldata[]="20°";   $beveldata[]=$apt=14;   $beveldata[]=$agt=round((14*$vr)+1,0);
                    $beveldata[]=$vpt=round((14/cos((pi()*$spcap)/180)),0);     $beveldata[]=$vgt=round((((14*$vr)+1)/cos((pi()*$spcag)/180)),0);
                }
                $beveldata[]=$lewp=round((pi()*(0.154-(0.912/$vpt))),5);   $beveldata[]=$lewg=round((pi()*(0.154-(0.912/$vgt))),5);   
                $beveldata[]="Lewis form factor for pinion is less. So, pinion is weaker so design on pinion to make it stronger and suitable for gear";
                $fmod=round(1.28*pow(($tval/($bval*$lewp*$bbm*$apt)),(1/3)),5); 
                if(((1.25*$fmod)-floor(1.25*$fmod))<0.5){ $module=round((floor(1.25*$fmod)+1),0); }
                else if(((1.25*$fmod)-floor(1.25*$fmod))>=0.5){ $module=round(1.25*$fmod,0); }
                $beveldata[]="Module calculated is ".$fmod." mm. Increasing module by 25% to increase safety and strength also taking care of pitting failure mdoule becomes ".round(1.25*$fmod,5).". Finally taking module to next value and normal module (mₙ) is ".$module." mm";
                $beveldata[]=$tmodule=round($module+(($bbm*$module*sin((pi()*$spcap)/180))/$apt),3);
                $beveldata[]=$fwval=round(($bbm*$module),0);
                $beveldata[]=$velo=round(((pi()*$module*$apt*$rpm)/60000),3);
                $beveldata[]=$ctc=round((($tmodule*0.5)*($apt/sin((pi()*$spcap)/180))),2); 
                if(($velo<5) && ((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))) > ((($tval*2)/($module*$apt))*((3.5+sqrt($velo))/3.5)))){ $beveldata[]= round((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))),3)." N > ".round(((($tval*2)/($module*$apt))*((3.5+sqrt($velo))/3.5)),3)."  N. (Gears are safe under lewis dynamic load as Static Strength > Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, bevel angle to get more possibilities)"; }
                else if(($velo<5) && ((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))) < ((($tval*2)/($module*$apt))*((3.5+sqrt($velo))/3.5)))){ $beveldata[]= round((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))),3)." N < ".round(((($tval*2)/($module*$apt))*((3.5+sqrt($velo))/3.5)),3)."  N. (Gears are not safe under lewis dynamic load as Static Strength < Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, bevel angle to get more possibilities)"; }
                else if(($velo>5) && ((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))) > ((($tval*2)/($module*$apt))*sqrt((5.5+sqrt($velo))/5.5)))){ $beveldata[]= round((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))),3)." N > ".round(((($tval*2)/($module*$apt))*sqrt((5.5+sqrt($velo))/5.5)),3)."  N. (Gears are safe under lewis dynamic load as Static Strength > Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, bevel angle to get more possibilities)"; }
                else if(($velo>5) && ((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))) < ((($tval*2)/($module*$apt))*sqrt((5.5+sqrt($velo))/5.5)))){ $beveldata[]= round((($bval*$fwval*$lewp*$module)*(1-($fwval/$ctc))),3)." N < ".round(((($tval*2)/($module*$apt))*sqrt((5.5+sqrt($velo))/5.5)),3)."  N. (Gears are not safe under lewis dynamic load as Static Strength < Dynamic Load) (NOTE : Vary factor of safety, (b/m) ratio, bevel angle to get more possibilities)"; }

                if(((0.72/($ctc-($fwval*0.5)))*sqrt((sqrt(pow((pow($vr,2)+1),3))*$mate*$tval)/($fwval*$vr))) < $const2){ 
                    $beveldata[]= round(((0.72/($ctc-($fwval*0.5)))*sqrt((sqrt(pow((pow($vr,2)+1),3))*$mate*$tval)/($fwval*$vr))),2)." N/mm²  < ". round($const2,2)." N/mm². So design of gear is safe under contact stress."; }
                else if(((0.72/($ctc-($fwval*0.5)))*sqrt((sqrt(pow((pow($vr,2)+1),3))*$mate*$tval)/($fwval*$vr))) > $const2){ 
                    $beveldata[]= round(((0.72/($ctc-($fwval*0.5)))*sqrt((sqrt(pow((pow($vr,2)+1),3))*$mate*$tval)/($fwval*$vr))),2)." N/mm²  > ". round($const2,2)." N/mm². So design of gear is not safe under contact stress. You have to increase internal property of gear for example BHN value to increase hardness."; }
                if($tmodule>0){
                    $beveldata[]=round($tmodule,2);$beveldata[]=round(1.1236*$tmodule,2);$beveldata[]=round(0.2*$tmodule,2); $beveldata[]=round(2*$tmodule,2);
                    $beveldata[]=round((atan($tmodule/$ctc)*180)/pi(),2); $beveldata[]=round((atan(($tmodule*1.2)/$ctc)*180)/pi(),2);
                    $beveldata[]=round(($spcap+((atan($tmodule/$ctc)*180)/pi())),2);  $beveldata[]=round(($spcag-((atan(($tmodule*1.2)/$ctc)*180)/pi())),2);
                    $beveldata[]=round(($tmodule*$apt),2);  $beveldata[]=round(($tmodule*$agt),2);  
                    $beveldata[]=round((($apt*$tmodule)-($tmodule*2.4*cos(($spcap*pi())/180))),2);
                    $beveldata[]=round((($agt*$tmodule)-($tmodule*2.4*cos(($spcag*pi())/180))),2);
                    $beveldata[]=round((($apt*$tmodule)+($tmodule*2.4*cos(($spcap*pi())/180))),2);
                    $beveldata[]=round((($agt*$tmodule)+($tmodule*2.4*cos(($spcag*pi())/180))),2);

                    if((0.55*pow((pi()*$apt*$tmodule*$apt),0.25))<=3){ $beveldata[]="Intergral Shaft Construction"; }
                    else if(((0.55*pow((pi()*$apt*$tmodule*$apt),0.25))>3) && ((0.55*pow((pi()*$apt*$tmodule*$apt),0.25))<=7)){ $beveldata[]="Web Type Construction"; } else if((0.55*pow((pi()*$apt*$tmodule*$apt),0.25))>7){ $beveldata[]="Arm Type Construction"; }
                    if((0.55*pow((pi()*$agt*$tmodule*$agt),0.25))<=3){ $beveldata[]="Intergral Shaft Construction"; }
                    else if(((0.55*pow((pi()*$agt*$tmodule*$agt),0.25))>3) && ((0.55*pow((pi()*$agt*$tmodule*$agt),0.25))<=7)){ $beveldata[]="Web Type Construction"; } else if((0.55*pow((pi()*$agt*$tmodule*$agt),0.25))>7){ $beveldata[]="Arm Type Construction"; }

                    if($stantype==1){
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc)),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc))*tan(0.253)*cos(($spcap*pi())/180),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc))*tan(0.253)*sin(($spcap*pi())/180),2);
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc)),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc))*tan(0.253)*cos(($spcag*pi())/180),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc))*tan(0.253)*sin(($spcag*pi())/180),2); }
                    else if($stantype==2){
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc)),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc))*tan(0.349)*cos(($spcap*pi())/180),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc))*tan(0.349)*sin(($spcap*pi())/180),2);
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc)),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc))*tan(0.349)*cos(($spcag*pi())/180),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc))*tan(0.349)*sin(($spcag*pi())/180),2);
                    }
                    else if($stantype==3){
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc)),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc))*tan(0.349)*cos(($spcap*pi())/180),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$apt))*(1-((6*$module)/$ctc))*tan(0.349)*sin(($spcap*pi())/180),2);
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc)),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc))*tan(0.349)*cos(($spcag*pi())/180),2); 
                        $beveldata[]=round((($tval*2)/($tmodule*$agt))*(1-((6*$module)/$ctc))*tan(0.349)*sin(($spcag*pi())/180),2);
                    }    }
        }   $para["Jxzgg3X"]=$beveldata;  $data["para"]=$para;
    echo json_encode($data); } ?>