<?php
error_reporting(0);
ini_set('display_errors', 'Off');

	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
	    //Force
	    if(empty($form_data->skw3mSQ)){
	        $error["jamNx2e"]="Enter Number of Units";
	    }
	    else{
        	if(($form_data->skw3mSQ)<1){
          		$error["jaMnx2e"]="Enter Number of Units  value greater than 1";
        	}
            else{
             	$user_data['nums']=$form_data->skw3mSQ;
              	$nums=htmlspecialchars($user_data['nums'], ENT_QUOTES);
            }
        }
        //Material
        if(empty($form_data->jsLams2)){
            $error["jaMnx2E"]="Enter Starting Month/Year";
        }
        else{
                $user_data['start']=$form_data->jsLams2;
                $start=htmlspecialchars($user_data['start'], ENT_QUOTES);
        }
	    //FOS
	    if(empty($form_data->ahsjWl2)){
	        $error["zNai2wl"]="Enter Data";
        }
	    else{
            $anadata=(explode(" ",($form_data->ahsjWl2)));      
            $count_data=count($anadata);
            if(($count_data>$nums) or ($count_data<$nums)){
                $error["zNai2wlcount"]="Entered ".$count_data." instead of ".$nums;
            }
            else{
                $numpo=0;
                for ($i=0; $i <$count_data ; $i++) { 
                    if(!is_numeric($anadata[$i])){ $numpo++; }
                }
                if($numpo>0){ $error["zNai2wltype"]="Data entered does not have complete integers";  }
            }
	    }
    
      		

    if(empty($error)){
        $depdata=[]; $depdata[]=$a=round((array_sum($anadata)/$nums),2);
        $setup=[];$dev=[];$dev_square=[]; $prod_dev=[]; $errorcast=[]; $forecast_bias=[]; $forecast_error=[];
        if($nums%2==0){
            for ($j=(1-$nums); $j<$nums; $j=$j+2) { 
                $dev[]=$j;
            }
        }
        else if($nums%2!=0){
             for ($j=((1-$nums)/2); $j<($nums/2); $j++) { 
                $dev[]=$j;
            }
        }
        for ($k=0; $k <$nums ; $k++) { 
            $setup[]=$start+$k; 
            $dev_square[]=($dev[$k]*$dev[$k]);
            $prod_dev[]=($anadata[$k]*$dev[$k]);
        }
        $depdata[]=$b=round((array_sum($prod_dev)/array_sum($dev_square)),2);
        if($nums%2==0){
            for ($j=($dev[count($dev)-1]+2); $j<($dev[count($dev)-1]+12); $j=$j+2) { 
                $setup[]=$setup[count($setup)-1]+1;
                $anadata[]=round((($b*$j)+$a),2);
            }
        }
        if($nums%2!=0){
            for ($j=($dev[count($dev)-1]+1); $j<($dev[count($dev)-1]+6); $j=$j+1) { 
                $setup[]=$setup[count($setup)-1]+1;
                $anadata[]=round((($b*$j)+$a),2);
            }
        }
        for ($s=0; $s <count($dev); $s++) { 
            $pipot=round((($b*$dev[$s])+$a),2);
            $errorcast[]=$pipot;
            $forecast_error[]=round(abs($pipot-$anadata[$s]),2);
            $forecast_bias[]=round(($pipot-$anadata[$s]),2);
        } 
        $depdata[]=round(((array_sum($forecast_bias)/array_sum($errorcast))),2);  $depdata[]=round(((array_sum($forecast_error)/array_sum($errorcast))),2);
        $para["setup"]=$setup;      $para['anadata']=$anadata;  $para["devlist"]=$dev;
        $para["devslist"]=$dev_square;      $para["devp"]=$prod_dev;    $para["actual"]=$errorcast; $para["fea"]=$forecast_error;  
        $para["fba"]=$forecast_bias; 
        $para["paNz3we"]=$depdata;
        $data["para"]=$para;
    }
    else{
      	$data["error"]=$error;
    }

    echo json_encode($data);
}
?>