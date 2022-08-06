<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){

        if(($form_data->type)=="FIM"){
            $d=($form_data->janc3Es); $co=($form_data->s8mNxiw); $icc=($form_data->Hnxu7tr); $pr=($form_data->Hanx2wi);    $cr=($form_data->nxLa5ty); 
            $sc=($form_data->bxnM0ei); $qty=($form_data->oMaz5er); $disc=($form_data->Lamx2wt);

            $invdata=[]; $aoc=[]; $aicc=[]; $tc=[]; $ql=[]; $m2data=[]; $m3data=[]; $m4data=[];
            if(($d>0) && ($co>0) && ($icc>0)){
                $invdata[]=$eoq=round(sqrt((2*$d*$co)/$icc),0);  $invdata[]=round(sqrt(2*$d*$co*$icc),2);  $invdata[]=round(sqrt(($d*$icc)/(2*$co)),2);
                for ($i=($eoq/5); $i <= (2*$eoq); ($i=$i+($eoq/10))) { 
                    $aoc[]=round((($d*$co)/$i),2);
                    $aicc[]=round(($icc*0.5*$i),2);
                    $tc[]=round(((($d*$co)/$i)+($icc*0.5*$i)),2);
                    $ql[]=round($i,2);
                }
                $invdata[]=$d;  $invdata[]=$co; $invdata[]=$icc; $invdata[]=$aoc;   $invdata[]=$aicc;   $invdata[]=$tc;   $invdata[]=$ql;
            }
            if(($d>0) && ($co>0) && ($icc>0) && ($pr>0) && ($cr>0)){
                $m2data[]=1;
                if($pr>$cr){
                    $m2data[]=round(sqrt((2*$d*$co)/($icc*(1-($cr/$pr)))),0);  
                    $m2data[]=round(sqrt(2*$d*$co*$icc*(1-($cr/$pr))),2);  $m2data[]=round(sqrt(($d*$icc*(1-($cr/$pr)))/(2*$co)),2);
                }
            }
            if(($d>0) && ($co>0) && ($icc>0) && ($sc>0)){
                $m3data[]=1;
                    $m3data[]=round(sqrt((2*$d*$co*($sc+$icc))/($icc*$sc)),0);  
                    $m3data[]=round(sqrt((2*$d*$co*$sc)/($icc*($sc+$icc))),0);
                    $m3data[]=round(sqrt((2*$d*$co*$sc*$icc)/($sc+$icc)),2);  
                    $m3data[]=round(sqrt(($d*$icc*$sc)/($co*($sc+$icc))),2);
            }
            if(($d>0) && ($co>0) && ($icc>0) && ($qty>0) && ($disc>0) && ($disc<100)){
                $m4data[]=1; $m4data[]=$eoq1=round(sqrt((2*$d*$co)/$icc),0); $m4data[]=$eoq2=round(sqrt((2*$d*$co)/($icc*(1-($disc*0.01)))),0);
                $tc1=round(((($d*$co)/$eoq1)+($icc*0.5*$eoq1)),2); $tc2=round(((($d*$co)/$qty)+($icc*0.5*$qty*(1-($disc*0.01)))),2);
                if($eoq2>$qty){ $m4data[]="Purchase ".$eoq2." quantities instead of availing discount."; }
                else if(($eoq2<$qty) && ($tc2<$tc1)){ $m4data[]="Purchase ".$qty." quantities by availing discount."; }
                else if(($eoq2<$qty) && ($tc2>$tc1)){ $m4data[]="Purchase ".$eoq1." quantities by availing discount."; }
            }
            $para["kqWgvx6"]=$invdata;  $para["yEnx8wq"]=$m2data;  $para["pSkxm2q"]=$m3data;  $para["haNxmw2"]=$m4data; $data["para"]=$para;
        }

        if(($form_data->type)=="ES"){
            $f=($form_data->zMzn3wq); $d=($form_data->pamZw1i); $sc=($form_data->kAhzn2q); $exsdata=[];
            if(($f>0) && ($d>0)){
                $exsdata[]="((".$sc."*".$d." )+((1-". $sc .")*".$f."))";
                $exsdata[]=round((($sc*$d)+((1-$sc)*$f)),2);
            }
            $para["hanVz7y"]=$exsdata;
            $data["para"]=$para;
        }

        if(($form_data->type)=="MAT"){
            $cts=($form_data->kamZ1ql); $ctsdata=[];
            $ctsdata[]="Grey"; $ctsdata[]="Blackheart Malleable";   $ctsdata[]="Pearlitic Malleable";  $ctsdata[]="Whiteheart Malleable"; $ctsdata[]="Ductile";
            $ctsdata[]="FG";   $ctsdata[]="BM"; $ctsdata[]="PM";    $ctsdata[]="WM";    $ctsdata[]="SG";
            $ctsdata[]=$cts;
            $para["Palmz1k"]=$ctsdata;
            $data["para"]=$para;
        }

    echo json_encode($data);
}
?>