<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];
	$submit_token=$form_data->token; $error=[]; $data=[]; $para=[];
	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){

        if(($form_data->type)=="VEN"){
            $vph=($form_data->eJJs4kx); $vid=($form_data->eLmz3jc); $vtd=($form_data->hSn2Uz); $va=($form_data->qYan8df);  $vcd=($form_data->j1Anzye);  
            $occ=($form_data->eNZZm4k); $ventdata=[];
            if(($vph>0) && ($vid>0) && ($vtd>0) && ($vid>$vtd)){ 
                $ventdata[]=round((pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round((pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round((pi()*250*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round((pi()*250*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round((pi()*0.25*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round((pi()*0.25*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round((pi()*0.00025*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round((pi()*0.00025*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($vcd*pi()*250*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($vcd*pi()*250*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($vcd*pi()*0.25*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($vcd*pi()*0.25*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($vcd*pi()*0.00025*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($vcd*pi()*0.00025*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=$va;     $ventdata[]=$vcd;   
                $ventdata[]=round((sqrt($occ)*$vtd),3);  
                $ventdata[]=$ocd=round(($occ*sqrt((1-pow(($vtd/$vid),2))/(1-pow((($vtd*$occ)/$vid),2)))),3);
                if($ocd>0){ $ventdata[]=$ocv=round(($ocd/$occ),3); }
                $ventdata[]=round(sqrt((2*9.81*$vph*0.001)/(1-(pow(((pow($vtd,2)/pow($vid,2))*$occ),2)))),3);
                $ventdata[]=round(sqrt((2*$va*$vph*0.001)/(1-(pow(((pow($vtd,2)/pow($vid,2))*$occ),2)))),3);
                $ventdata[]=round($ocv*sqrt((2*9.81*$vph*0.001)/(1-(pow(((pow($vtd,2)/pow($vid,2))*$occ),2)))),3);
                $ventdata[]=round($ocv*sqrt((2*$va*$vph*0.001)/(1-(pow(((pow($vtd,2)/pow($vid,2))*$occ),2)))),3);
                $ventdata[]=round(($ocd*pi()*250*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($ocd*pi()*250*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($ocd*pi()*0.25*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($ocd*pi()*0.25*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($ocd*pi()*0.00025*pow($vtd,2)*pow($vid,2)*sqrt((2*9.81*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
                $ventdata[]=round(($ocd*pi()*0.00025*pow($vtd,2)*pow($vid,2)*sqrt((2*$va*$vph*0.001)/(pow($vid,4)-pow($vtd,4)))),3);
            }
            $para["eMzNNa"]=$ventdata;  $data["para"]=$para;
        }

        if(($form_data->type)=="ORI"){
            $hoa=($form_data->wKmz1km); $oh=($form_data->qKKmZ2s); $ow=($form_data->tYUnz2h); $oa=($form_data->fNz5dHs);  $ocdd=($form_data->gS5Isbg);  
            $hda=($form_data->hKK2nze);     $oridata=[];
            if(($hoa>0) && ($oh>0) && ($ow>0)){ 
                $oridata[]=round(((2*$ocdd*$ow*0.01*sqrt(2*9.81)*(pow((($hoa*0.001)+($oh*0.01)),1.5)-pow(($hoa*0.001),1.5)))/3),5);
                $oridata[]=round(((2*$ocdd*$ow*0.01*sqrt(2*$oa)*(pow((($hoa*0.001)+($oh*0.01)),1.5)-pow(($hoa*0.001),1.5)))/3),5);
                $oridata[]=round(((2000000*$ocdd*$ow*0.01*sqrt(2*9.81)*(pow((($hoa*0.001)+($oh*0.01)),1.5)-pow(($hoa*0.001),1.5)))/3),5);
                $oridata[]=round(((2000000*$ocdd*$ow*0.01*sqrt(2*$oa)*(pow((($hoa*0.001)+($oh*0.01)),1.5)-pow(($hoa*0.001),1.5)))/3),5);
                $oridata[]=round(((2000*$ocdd*$ow*0.01*sqrt(2*9.81)*(pow((($hoa*0.001)+($oh*0.01)),1.5)-pow(($hoa*0.001),1.5)))/3),5);
                $oridata[]=round(((2000*$ocdd*$ow*0.01*sqrt(2*$oa)*(pow((($hoa*0.001)+($oh*0.01)),1.5)-pow(($hoa*0.001),1.5)))/3),5);
                $oridata[]=$ocdd;
                if($hda>0){
                    if($hda<$hoa){
                        $oridata[]="Orifice is fully submerged";    $oridata[]="Actual Flow Rate";
                        $oridata[]=round(($ocdd*$ow*0.01*$oh*0.01*sqrt(2*9.81*$hda*0.001)),5);  
                        $oridata[]=round(($ocdd*$ow*0.01*$oh*0.01*sqrt(2*$oa*$hda*0.001)),5);
                        $oridata[]=round(($ocdd*1000000*$ow*0.01*$oh*0.01*sqrt(2*9.81*$hda*0.001)),5);  
                        $oridata[]=round(($ocdd*1000000*$ow*0.01*$oh*0.01*sqrt(2*$oa*$hda*0.001)),5);
                        $oridata[]=round(($ocdd*1000*$ow*0.01*$oh*0.01*sqrt(2*9.81*$hda*0.001)),5);  
                        $oridata[]=round(($ocdd*1000*$ow*0.01*$oh*0.01*sqrt(2*$oa*$hda*0.001)),5);
                    }
                    else if(($hda>$hoa) && (($hda*0.001)<=(($hoa*0.001)+($oh*0.01)))){
                        $oridata[]="Orifice is partially submerged. So to get total flow rate, flow rate of partially open part and partially submerged part is added.";    $oridata[]="Actual Total Flow Rate (Partially open + partially closed)";
                        $oridata[]=round(($ocdd*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*9.81*$hda*0.001)),5)." + ".round((($ocdd*2*$ow*0.01*sqrt(2*9.81)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3),5)." = ".round((($ocdd*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*9.81*$hda*0.001))+(($ocdd*2*$ow*0.01*sqrt(2*9.81)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3)),5);  
                        $oridata[]=round(($ocdd*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*$oa*$hda*0.001)),5)." + ".round((($ocdd*2*$ow*0.01*sqrt(2*$oa)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3),5)." = ".round((($ocdd*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*$oa*$hda*0.001))+(($ocdd*2*$ow*0.01*sqrt(2*$oa)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3)),5);
                        $oridata[]=round(($ocdd*1000000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*9.81*$hda*0.001)),5)." + ".round((($ocdd*1000000*2*$ow*0.01*sqrt(2*9.81)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3),5)." = ".round((($ocdd*1000000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*9.81*$hda*0.001))+(($ocdd*1000000*2*$ow*0.01*sqrt(2*9.81)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3)),5);  
                        $oridata[]=round(($ocdd*1000000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*$oa*$hda*0.001)),5)." + ".round((($ocdd*1000000*2*$ow*0.01*sqrt(2*$oa)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3),5)." = ".round((($ocdd*1000000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*$oa*$hda*0.001))+(($ocdd*1000000*2*$ow*0.01*sqrt(2*$oa)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3)),5);
                        $oridata[]=round(($ocdd*1000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*9.81*$hda*0.001)),5)." + ".round((($ocdd*1000*2*$ow*0.01*sqrt(2*9.81)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3),5)." = ".round((($ocdd*1000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*9.81*$hda*0.001))+(($ocdd*1000*2*$ow*0.01*sqrt(2*9.81)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3)),5);  
                        $oridata[]=round(($ocdd*1000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*$oa*$hda*0.001)),5)." + ".round((($ocdd*1000*2*$ow*0.01*sqrt(2*$oa)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3),5)." = ".round((($ocdd*1000*$ow*0.01*((($oh*0.01)+($hoa*0.001))-($hda*0.001))*sqrt(2*$oa*$hda*0.001))+(($ocdd*1000*2*$ow*0.01*sqrt(2*$oa)*(pow(($hda*0.001),1.5)-pow(($hoa*0.001),1.5)))/3)),5);

                    }
                    else if(($hda>$hoa) && (($hda*0.001)>(($hoa*0.001)+($oh*0.01)))){
                        $oridata[]="Orifice is normally open like in above case.";    $oridata[]="";
                        $oridata[]="To make it";  
                        $oridata[]="partially submerged";
                        $oridata[]="Enter value between". $hoa ." mm and ".($hoa+($oh*10)) ." mm";  
                        $oridata[]='and';
                        $oridata[]="For fully submerged make it less than ".$hoa." mm";  
                        $oridata[]="Try it";
                    }
                }
            }
            $para["tKMz8gh"]=$oridata;  $data["para"]=$para;
        }

        if(($form_data->type)=="MP"){  $mcc=($form_data->wNZ7kfg);  $mouthdata=[];
            $mouthdata[]=round((1/sqrt(1+(pow(((1-$mcc)/$mcc),2)))),3); $mouthdata[]=round((0.97*$mcc),3); $para["Omz33hs"]=$mouthdata;  $data["para"]=$para; }

        if(($form_data->type)=="TAT"){  
            $aoo=($form_data->qJJs2iu); $hil=($form_data->YsJ7gx); $hfl=($form_data->a9oSmzr); $cdt=($form_data->skI8sKK); $agt=($form_data->pL4jxns);  
            $aot=($form_data->wPP3kxt); $tr=($form_data->qik7Zne); $tl=($form_data->qUUs4kn); $tatdata=[];
            if(($aoo>0) && ($hil>0) && ($hfl>=0) && ($aot>0)){   $tatdata[]=1;
                if($aoo<$aot){ $tatdata[]="Time(in s) taken for liquid to come from ".$hil." cm to ".$hfl." cm ";
                    $tatdata[]=round((($aot*2.00*(sqrt($hil*0.01)-sqrt($hfl*0.01)))/($cdt*$aoo*sqrt(2*9.81))),3);
                    $tatdata[]=round((($aot*2.00*(sqrt($hil*0.01)-sqrt($hfl*0.01)))/($cdt*$aoo*sqrt(2*$agt))),3);
                }
                else if($aoo>=$aot){ $tatdata[]="Tank area"; $tatdata[]="should be greater than"; $tatdata[]="orifice area"; }
                if($tr>0){
                    if((0.25*pi()*pow($tr,2))>($aoo*0.000001)){
                        $tatdata[]="Time(in s) taken for liquid to come from ".$hil." cm to ".$hfl." cm in spherical tank.";
                        $tatdata[]=round(((pi()*((($tr*1.33*(pow(($hil*0.01),1.5)-pow(($hfl*0.01),1.5))))-(0.4*(pow(($hil*0.01),2.5)-pow(($hfl*0.01),2.5)))))/($cdt*$aoo*0.000001*sqrt(2*9.81))),3);
                        $tatdata[]=round(((pi()*((($tr*1.33*(pow(($hil*0.01),1.5)-pow(($hfl*0.01),1.5))))-(0.4*(pow(($hil*0.01),2.5)-pow(($hfl*0.01),2.5)))))/($cdt*$aoo*0.000001*sqrt(2*$agt))),3);
                    }
                    else if((0.25*pi()*pow($tr,2))<=($aoo*0.000001)){ $tatdata[]="Tank area"; $tatdata[]="should be greater than"; $tatdata[]="orifice area"; }
                }
                if(($tl>0) && ($tr>0)){
                    if((0.25*pi()*pow($tr,2))>($aoo*0.000001)){
                        $tatdata[]="Time(in s) taken for liquid to come from ".$hil." cm to ".$hfl." cm in cylindrical tank.";
                        $tatdata[]=round(((($tl*4.00)*(pow((($tr*2)-($hfl*0.01)),1.5)-pow((($tr*2.00)-($hil*0.01)),1.5)))/($cdt*3.00*$aoo*0.000001*sqrt(2*9.81))),3);
                        $tatdata[]=round(((($tl*4.00)*(pow((($tr*2)-($hfl*0.01)),1.5)-pow((($tr*2.00)-($hil*0.01)),1.5)))/($cdt*3.00*$aoo*0.000001*sqrt(2*$agt))),3);
                    }
                    else if((0.25*pi()*pow($tr,2))<=($aoo*0.000001)){ $tatdata[]="Tank area"; $tatdata[]="should be greater than"; $tatdata[]="orifice area"; }
                }
            }
            $para["wIIk9jh"]=$tatdata;  $data["para"]=$para; 
        }

        if(($form_data->type)=="NAW"){  
            $hon=($form_data->aMz);  $lnotch=($form_data->VVd); $cdnw=($form_data->aNz3d); $acnw=($form_data->qBz7g); $tdna=($form_data->zN1h); 
            $nawdata=[];
            if(($hon>0) && ($lnotch>0)){  
                
                $nawdata[]=$l1=round(((($cdnw*2.00*$lnotch*0.01)*sqrt(2*9.81)*pow(($hon*0.01),1.5))/3),3);
                $nawdata[]=$l2=round(((($cdnw*2.00*$lnotch*0.01)*sqrt(2*$acnw)*pow(($hon*0.01),1.5))/3),3);
                $nawdata[]=$l3=round(((($cdnw*2000000*$lnotch*0.01)*sqrt(2*9.81)*pow(($hon*0.01),1.5))/3),3);
                $nawdata[]=$l4=round(((($cdnw*2000000*$lnotch*0.01)*sqrt(2*$acnw)*pow(($hon*0.01),1.5))/3),3);
                $nawdata[]=$l5=round(((($cdnw*2000*$lnotch*0.01)*sqrt(2*9.81)*pow(($hon*0.01),1.5))/3),3);
                $nawdata[]=$l6=round(((($cdnw*2000*$lnotch*0.01)*sqrt(2*$acnw)*pow(($hon*0.01),1.5))/3),3);
                $nawdata[]=$t1=round((($cdnw*8.00*tan((pi()*$tdna)/360)*sqrt(2*9.81)*pow(($hon*0.01),2.5))/15),3);
                $nawdata[]=$t2=round((($cdnw*8.00*tan((pi()*$tdna)/360)*sqrt(2*$acnw)*pow(($hon*0.01),2.5))/15),3);
                $nawdata[]=$t3=round((($cdnw*8000000*tan((pi()*$tdna)/360)*sqrt(2*9.81)*pow(($hon*0.01),2.5))/15),3);
                $nawdata[]=$t4=round((($cdnw*8000000*tan((pi()*$tdna)/360)*sqrt(2*$acnw)*pow(($hon*0.01),2.5))/15),3);
                $nawdata[]=$t5=round((($cdnw*8000*tan((pi()*$tdna)/360)*sqrt(2*9.81)*pow(($hon*0.01),2.5))/15),3);
                $nawdata[]=$t6=round((($cdnw*8000*tan((pi()*$tdna)/360)*sqrt(2*$acnw)*pow(($hon*0.01),2.5))/15),3);
                $nawdata[]=round($l1+$t1,3);    $nawdata[]=round($l2+$t2,3);    $nawdata[]=round($l3+$t3,3);    $nawdata[]=round($l4+$t4,3);
                $nawdata[]=round($l5+$t5,3);    $nawdata[]=round($l6+$t6,3);    $nawdata[]=$cdnw;
            } 
            $para["uA0k"]=$nawdata;  $data["para"]=$para; 
        }

        if(($form_data->type)=="NAT"){  
            $aor=($form_data->Wk);  $hi=($form_data->w4l); $hf=($form_data->aM7h); $cdr=($form_data->l2u); $agr=($form_data->qY6n);  $lon=($form_data->gSa6b);
            $taon=($form_data->jN3s);   $natdata=[];
            if(($aor>0) && ($hi>0) && ($hf>0) && ($lon>0)){   $natdata[]=1;
                $natdata[]="Time(in s) taken for liquid to come from ".$hi." cm to ".$hf." cm.";
                $natdata[]=round((($aor*0.000003*(sqrt($hi*0.01)-sqrt($hf*0.01)))/($cdr*$lon*0.01*sqrt(2*9.81*$hi*0.01*$hf*0.01))),3);
                $natdata[]=round((($aor*0.000003*(sqrt($hi*0.01)-sqrt($hf*0.01)))/($cdr*$lon*0.01*sqrt(2*$agr*$hi*0.01*$hf*0.01))),3);
                $natdata[]="Time(in s) taken for liquid to come from ".$hi." cm to ".$hf." cm.";
                if($taon>0){
                    $natdata[]=round((($aor*0.000005*(pow(($hi*0.01),1.5)-pow(($hf*0.01),1.5)))/($cdr*4.00*tan((pi()*$taon)/360)*sqrt(2*9.81)*pow(($hf*0.01*$hi*0.01),1.5))),3);
                    $natdata[]=round((($aor*0.000005*(pow(($hi*0.01),1.5)-pow(($hf*0.01),1.5)))/($cdr*4.00*tan((pi()*$taon)/360)*sqrt(2*$agr)*pow(($hf*0.01*$hi*0.01),1.5))),3);    }
            } 
            $para["tYsj3kn"]=$natdata;  $data["para"]=$para; 
        }

        echo json_encode($data);
}   ?>

