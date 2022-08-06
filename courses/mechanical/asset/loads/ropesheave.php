<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token; $error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $load=($form_data->skw3m); $duty=($form_data->jsLams); $material=($form_data->bNx2g);   $bend=($form_data->zmalY); $rtype=($form_data->aMb4); 
        $df=($form_data->Akm3f); $fos=($form_data->wLm3g); $pe=($form_data->sNx2g); $hoivel=($form_data->aBc); $ropep=[];  $entp=[];
        if(($load>0) && ($duty>0) && ($material>0) && ($rtype>0)){
            $stressvalues= array(array('Material', 'Syt'),array('30C8', 400),array('40C8',380),array('50C4',460),array('40Cr4',490),array('40Ni14' ,550),array('40Ni10Cr3Mo6',750),array('40Cr13Mo10V2',1050),array('30Ni16Cr5',1240),array('Aluminium',280),array('Copper',276),array('Brass',195),array('Gold',120),array('Improved Paw Steel',1800));

            if($bend==1){ $dr=16; } else if($bend==2){ $dr=20; } else if($bend==3){ $dr=23; } else if($bend==4){ $dr=25; } else if($bend==5){ $dr=26.5; } else if($bend==6){ $dr=28; } else if($bend==7){ $dr=30; } else if($bend==8){ $dr=31; } else if($bend==9){ $dr=32; } else if($bend==10){ $dr=33; } else if($bend==11){ $dr=34; } else if($bend==12){ $dr=350; } else if($bend==13){ $dr=36; } else if($bend==14){ $dr=37; } else if($bend==15){ $dr=37.5; } else if($bend==16){ $dr=38; }
            if($rtype==1){ $c=0.95; }else if($rtype==2){ $c=1.02; }
            $ropep[]=$sf=round(($df*$fos),2);   $falls=($bend+1); $tmax=($load/($falls*$pe*0.01));
            if($rtype==1){ $area=($tmax/((($stressvalues[$material][1])/$sf)-(5000/$dr))); }else if($rtype==2){ $area=($tmax/((($stressvalues[$material][1])/$sf)-(3600/$dr))); }   
            if($area>0){ $dia=round((sqrt($area/(pi()*0.1))),3);    $ropep[]="Diameter of rope is ".$dia." mm";  
                if($dia<10){ $dia1=10; }else if($dia>=10 && $dia<12){ $dia1=12; }else if($dia>=12 && $dia<14){ $dia1=14; }else if($dia>=14 && $dia<16){ $dia1=16; }else if($dia>=16 && $dia<18){ $dia1=18; }else if($dia>=18 && $dia<20){ $dia1=20; }else if($dia>=20 && $dia<22){ $dia1=22; }else if($dia>=22 && $dia<24){ $dia1=24; }else if($dia>=24 && $dia<25){ $dia1=25; }else if($dia>=25 && $dia<29){ $dia1=29; }else if($dia>=29 && $dia<32){ $dia1=32; }else if($dia>=32 && $dia<35){ $dia1=35; }else if($dia>=35 && $dia<38){ $dia1=38; }else if($dia>=38 && $dia<41){ $dia1=41; }else if($dia>=41 && $dia<44){ $dia1=44; }else if($dia>=44 && $dia<48){ $dia1=48; }else if($dia>=48 && $dia<51){ $dia1=51; }else if($dia>=51 && $dia<54){ $dia1=54; }else if($dia>=54 && $dia<57){ $dia1=57; }else if($dia>=57 && $dia<64){ $dia1=64; }else if($dia>=64 && $dia<70){ $dia1=70; }else { $dia1=ceil($dia); }
                $ropep[]="Standard Diameter is ".$dia1." mm";
                if($dia<5){ $c1=0.83; }else if($dia>=5 && $dia<8){ $c1=0.85; }else if($dia>=8 && $dia<10){  $c1=0.89; }else if($dia>=10 && $dia<14){ $c1=0.93; }else if($dia>=14 && $dia<18){ $c1=0.97; }else if($dia>=18 && $dia<20){ $c1=1; }else if($dia>=20 && $dia<24){ $c1=1.04; }else if($dia>=24 && $dia<28){ $c1=1.09; }else if($dia>=28 && $dia<35){ $c1=1.16; }else if($dia>=35 && $dia<43.5){ $c1=1.34; }else if($dia>=43.5){ $c1=1.5; }

                $dmin=$dr*$dia1; $sigma1=($tmax/(pi()*$dia1*$dia1)); $c2=1; $D=(25*$dia1);  $m=(((($D/$dia1)-8)*100)/($sigma1*$c*$c1*$c2));
                if($m<26){ $z=30; }   else if($m>=26 && $m<41){ $z=((30*((41-$m)/($m-26))+50)/(((41-$m)/($m-26))+1))*1000; }
                else if($m>=41 && $m<56){ $z=((50*((56-$m)/($m-41))+70)/(((56-$m)/($m-41))+1))*1000; } 
                else if($m>=56 && $m<70){ $z=((70*((70-$m)/($m-56))+90)/(((70-$m)/($m-56))+1))*1000; } 
                else if($m>=70 && $m<83){ $z=((90*((83-$m)/($m-70))+110)/(((83-$m)/($m-70))+1))*1000; } 
                else if($m>=83 && $m<95){ $z=((110*((95-$m)/($m-83))+130)/(((95-$m)/($m-83))+1))*1000; } 
                else if($m>=95 && $m<107){ $z=((130*((107-$m)/($m-95))+150)/(((107-$m)/($m-95))+1))*1000; } 
                else if($m>=107 && $m<118){ $z=((150*((118-$m)/($m-107))+170)/(((118-$m)/($m-107))+1))*1000; } 
                else if($m>=118 && $m<129){ $z=((170*((129-$m)/($m-118))+190)/(((129-$m)/($m-118))+1))*1000; } 
                else if($m>=129 && $m<140){ $z=((190*((140-$m)/($m-129))+210)/(((140-$m)/($m-129))+1))*1000; }
                else if($m>=140 && $m<150){ $z=((210*((150-$m)/($m-140))+230)/(((150-$m)/($m-140))+1))*1000; } 
                else if($m>=150 && $m<162){ $z=((230*((162-$m)/($m-150))+255)/(((162-$m)/($m-150))+1))*1000; }
                else if($m>=162 && $m<174){ $z=((255*((174-$m)/($m-162))+280)/(((174-$m)/($m-162))+1))*1000; }
                else if($m>=174 && $m<187){ $z=((280*((187-$m)/($m-174))+310)/(((187-$m)/($m-174))+1))*1000; }
                else if($m>=187 && $m<200){ $z=((310*((200-$m)/($m-187))+340)/(((200-$m)/($m-187))+1))*1000; }
                else if($m>=200 && $m<212){ $z=((340*((212-$m)/($m-200))+370)/(((212-$m)/($m-200))+1))*1000; }
                else if($m>=212 && $m<227){ $z=((370*((227-$m)/($m-212))+410)/(((227-$m)/($m-212))+1))*1000; }
                else if($m>=227 && $m<242){ $z=((410*((242-$m)/($m-227))+450)/(((242-$m)/($m-227))+1))*1000; }
                else if($m>=242 && $m<260){ $z=((450*((260-$m)/($m-242))+500)/(((260-$m)/($m-242))+1))*1000; }
                else if($m>=260 && $m<277){ $z=((500*((277-$m)/($m-260))+550)/(((277-$m)/($m-260))+1))*1000; }
                else if($m>=277 && $m<294){ $z=((550*((294-$m)/($m-277))+600)/(((294-$m)/($m-277))+1))*1000; }
                else if($m>=294 && $m<310){ $z=((600*((310-$m)/($m-294))+650)/(((310-$m)/($m-294))+1))*1000; }
                else if($m>=310 && $m<317){ $z=((650*((317-$m)/($m-310))+700)/(((317-$m)/($m-310))+1))*1000; }
                else if($m>317){ $z=700000; }
                if($duty==1){ $alpha=400; $beta=0.7; $z2=2; }else if($duty==2){ $alpha=1000; $beta=0.5; $z2=4; }else if($duty==3){ $alpha=3400; $beta=0.4; $z2=3; }
                else if($duty==4){ $alpha=9600; $beta=0.3; $z2=5; }
                $ropep[]=$life=round(((0.4*$z)/($alpha*$beta*$z2)),2);  $ropep[]=$stressvalues[$material][0];    $ropep[]=round(($life*30),2); $ropep[]=9;
                $ropep[]=round(($hoivel*($falls/2))/(pi()*$D*0.001),2);  }
            else{ $ropep[]="Adjust factor of safety or change material or vary bends.";  
                if($rtype==1){ $ropefac="(5000/".$dr.") = ".round((5000/$sf),2); } else if($rtype==2){ $ropefac="(3600/".$dr.") = ".round((3600/$sf),2); }   
                $ropep[]="Design stress (".$stressvalues[$material][1]."/".$sf.") = ".round((($stressvalues[$material][1])/$sf),2)." is less than rope factor ".$ropefac;    $ropep[]="NaN"; $ropep[]="NaN";  } 
        }
        $para['sNx2kf']=$ropep; $data["para"]=$para; echo json_encode($data);
} ?>