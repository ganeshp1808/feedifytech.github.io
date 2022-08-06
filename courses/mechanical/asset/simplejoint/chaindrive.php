<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token; $error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $pow=($form_data->sk3m); $chain=($form_data->jsams); $irpm=($form_data->aNxc); $orpm=($form_data->aNzv); $desfac=($form_data->sMxn); $chinp=[];
        if(($pow>0) && ($chain>0) && ($irpm>0) && ($orpm>0) && ($irpm>$orpm) && is_numeric($desfac)){
            $stressvalues=array(array('Material', 'Syt'),array('30C8', 400),array('40C8',380),array('50C4',460),array('40Cr4',490),array('40Ni14' ,550),array('40Ni10Cr3Mo6',750),array('40Cr13Mo10V2',1050),array('30Ni16Cr5',1240),array('Aluminium',280),array('Copper',276),array('Brass',195),array('Gold',120),array('Improved Paw Steel',1800));
            if($chain==1){ $m=1; }else if ($chain==2){ $m=2; }else if ($chain==3){ $m=3; }
            $chinp[]=$despow=round(($pow*$desfac),2);   $chinp[]=$i=round(($irpm/$orpm),2);
            if($i<2 && $i>=1){ $z1=27; }else if($i<3 && $i>=2){ $z1=25; }else if($i<4 && $i>=3){ $z1=23; }else if($i<5 && $i>=4){ $z1=21; }else{ $z1=17; }
            $chinp[]=$z1;  $chinp[]=$z2=round(($z1*$i),0); 
            $mt=(($despow*60*1000)/(2*pi()*$irpm)); 
            if($irpm<50){ $sigma=35; }else if($irpm>=50 && $irpm<200){ $sigma=31.5; }else if($irpm>=200 && $irpm<400){ $sigma=28.7; }else if($irpm>=400 && $irpm<600){ $sigma=26.2; }else if($irpm>=600 && $irpm<800){ $sigma=24.2; }else if($irpm>=800 && $irpm<1000){ $sigma=22.4; }else if($irpm>=1000 && $irpm<1200){ $sigma=21; }else if($irpm>=1200 && $irpm<1600){ $sigma=18.5; }else if($irpm>=1600 && $irpm<2000){ $sigma=16.5; }else if($irpm>=2000 && $irpm<2400){ $sigma=15; }else if($irpm>=2400 && $irpm<2800){ $sigma=13.7; }else if($irpm>=2800){ $sigma=12; }
            $chinp[]=$pitch=round((2.8*pow(($mt/($z1*$sigma*$m)),(1/3))),2);
            $chinp[]=$d10=round(($pitch/(sin(pi()/$z1))),2); $chinp[]=$v=round(((pi()*$d10*$irpm*0.001)/60),2); $chinp[]=$ft=round(($despow/$v),2);  
            $chinp[]=round(($ft/$sigma),2);  $ba=round((($ft*0.01)/$sigma),2);
            if($m==1){ 
                if($ba<0.7){ $chainno="R50"; $w=1.01; $q=22.2; $p1=15.875; $a0=0.7*0.01; }
                else if($ba>=0.7 && $ba<1.05){ $chainno="R60"; $w=1.47; $q=32; $p1=19.05; $a0=1.05*0.01; }
                else if($ba>=1.05 && $ba<1.79){ $chainno="R80"; $w=2.57; $q=57; $p1=25.4; $a0=1.79*0.01; }
                else if($ba>=1.79 && $ba<2.62){ $chainno="R100"; $w=3.8; $q=88.5; $p1=31.75; $a0=2.62*0.01; }
                else if($ba>=2.62 && $ba<3.93){ $chainno="R120"; $w=5.4; $q=127; $p1=38.1; $a0=3.93*0.01; }
                else if($ba>=3.93 && $ba<4.7){ $chainno="R140"; $w=7.3; $q=172.4; $p1=44.45; $a0=4.7*0.01; }
                else if($ba>=4.7 && $ba<6.42){ $chainno="R160"; $w=9.9; $q=226.8; $p1=50.8; $a0=6.42*0.01; }
            }
            if($m==2){
                if($ba<1.4){ $chainno="DR50"; $w=1.78; $q=44.4; $p1=15.87; $a0=1.4*0.01; } 
                else if($ba>=1.4 && $ba<2.1){ $chainno="DR60"; $w=2.9; $q=63.6; $p1=19.05; $a0=2.1*0.01; } 
                else if($ba>=2.1 && $ba<3.58){ $chainno="DR80"; $w=5.01; $q=114; $p1=25.4; $a0=3.58*0.01; } 
                else if($ba>=3.58 && $ba<5.24){ $chainno="DR100"; $w=7.6; $q=177; $p1=31.75; $a0=5.24*0.01; } 
                else if($ba>=5.24 && $ba<7.86){   $chainno="DR120";    $w=10.8;     $q=254;  $p1=38.1; $a0=7.86*0.01; }
                else if($ba>=7.86 && $ba<9.4){ $chainno="DR140"; $w=14.3; $q=344.8; $p1=44.45; $a0=9.4*0.01; }
                else if($ba>=9.4 && $ba<12.84){ $chainno="DR160"; $w=19.4; $q=453.6; $p1=50.8; $a0=12.84*0.01; }
            }
            if($m==3){
                if($ba<2.1){ $chainno="TR50"; $w=3.02; $q=66.6; $p1=15.875; $a0=2.1*0.01; }
                else if($ba>=2.1 && $ba<3.15){ $chainno="TR60"; $w=4.28; $q=95.4; $p1=19.05; $a0=3.15*0.01; }
                else if($ba>=3.15 && $ba<5.37){ $chainno="TR80"; $w=7.47; $q=171; $p1=25.4; $a0=5.37*0.01; }
                else if($ba>=5.37 && $ba<7.86){ $chainno="TR100"; $w=11.2; $q=265.5; $p1=31.75; $a0=7.86*0.01; }
                else if($ba>=7.86 && $ba<11.79){ $chainno="TR120"; $w=16.1; $q=381; $p1=38.1; $a0=11.79*0.01; }
                else if($ba>=11.79 && $ba<14.1){ $chainno="TR140"; $w=21.4; $q=517.2; $p1=44.45; $a0=14.1*0.01; }
                else if($ba>=14.1 && $ba<19.26){ $chainno="TR160"; $w=29.1; $q=680.4; $p1=50.8; $a0=19.26*0.01;     }              
            }       
            $pc=(($w*$v*$v)/9.81); $ps=(6*$w*9.81*40*$p1*0.001); $pres=($ft+$pc+$ps); $fosa=round((($q*1000)/$pres),2);
            if($fosa>7){ $chinp[]="Design is safe as actual factor of safety is ".$fosa." which is greater minimum value 7."; }
            else if($fosa<7){ $chinp[]="Design is not safe as actual factor of safety is ".$fosa." which is less minimum value 7."; }
            $chinp[]=$np=round((80+(($z1+$z2)/2)+(($z2-$z1)*($z2-$z1)/(160*pi()*pi()))),0); $chinp[]=$l=round(($np*$p1),2);  $e=($np-(($z1+$z2)/2));
            $chinp[]=$cd=round(((($e+(pow((($e*$e)-(8*$m)),0.5)))*$p1)/4),2); $chinp[]=$p1; $chinp[]=$d1=round(($p1/sin(pi()/$z1)),2);  
            $chinp[]=$d2=round(($p1/sin(pi()/$z2)),2); $shearstress=35;  $ds1=pow((16*$mt/(pi()*$shearstress)),(1/3)); 
            $ds2=pow((16*$despow*1000*60)/(2*pi()*$orpm*pi()*$shearstress),(1/3));
        }
        $para['Xnzm4h']=$chinp; $data["para"]=$para; echo json_encode($data);
} ?>