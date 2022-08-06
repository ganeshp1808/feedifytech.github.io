<?php
error_reporting(0);
ini_set('display_errors', 'Off');

	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
	    //Force
	    if(empty($form_data->skw3mSD)){
	        $error["force"]="Enter Data with space in between";
	    }
	    else{
        	$xdata=(explode(" ",($form_data->skw3mSD)));      
            $count_xdata=count($xdata);
            $numx=0;
            for ($i=0; $i <$count_xdata ; $i++) { 
                if(!is_numeric($xdata[$i])){ $numx++; }
            }
                if($numx>0){ $error["forceval"]="Data entered does not have complete integers";  }
        }
        //Material
        if(empty($form_data->jsDams2)){
            $error["material"]="Enter Data with space in between";
        }
        else{
                $ydata=(explode(" ",($form_data->jsDams2))); $count_ydata=count($ydata);
                if(($count_xdata>$count_ydata) or ($count_xdata<$count_ydata)){ $error["numcount"]=$count_xdata." entries on left and ".$count_ydata." entries on right"; }     
                
                $numy=0;
                for ($i=0; $i <$count_ydata ; $i++) { 
                    if(!is_numeric($ydata[$i])){ $numy++; }
                }
                if($numy>0){ $error["materialval"]="Data entered does not have complete integers";  }
            }
      		

    if(empty($error)){
        $xsq=[]; $prod_xy=[]; $x_div=[]; $y_div=[]; $x_divsq=[]; $y_divsq=[]; $proddivxy=[]; $errorcast=[];  $forecast_bias=[];   $forecast_error=[];
        $avg_x=(array_sum($xdata)/$count_xdata);        $regs=[];   $depdata=[];
        $avg_y=(array_sum($ydata)/$count_ydata);

        for ($i=0; $i <$count_xdata ; $i++) { 
            $xsq[]=round(($xdata[$i]*$xdata[$i]),2);
            $prod_xy[]=round(($xdata[$i]*$ydata[$i]),2);
            $x_div[]=round(($xdata[$i]-($avg_x)),2);
            $x_divsq[]=round((($xdata[$i]-($avg_x))*($xdata[$i]-($avg_x))),2);
            $y_div[]=round(($ydata[$i]-($avg_y)),2);
            $y_divsq[]=round((($ydata[$i]-($avg_y))*($ydata[$i]-($avg_y))),2);
            $proddivxy[]=round((($xdata[$i]-($avg_x))*($ydata[$i]-($avg_y))),2);
        }
        $depdata[]=$b=round((((array_sum($xdata)*array_sum($ydata))-($count_xdata*(array_sum($prod_xy))))/((pow(array_sum($xdata),2))-($count_xdata*(array_sum($xsq))))),2);
        $depdata[]=$a=round((((array_sum($ydata))-($b*array_sum($xdata)))/$count_xdata),2);

        for ($j=0; $j <$count_xdata ; $j++) { 
            $vals=round(($a+($b*$xdata[$j])),2);
            $errorcast[]=$vals;
            $forecast_error[]=round(abs($vals-$ydata[$j]),2);
            $forecast_bias[]=round(($vals-$ydata[$j]),2);
        }

        $depdata[]=$reg=round((array_sum($proddivxy)/sqrt((array_sum($x_divsq))*(array_sum($y_divsq)))),2);
        $para["setup"]=$xdata; $para['anadata']=$ydata; $para["xsq"]=$xsq;
        $para["prod_xy"]=$prod_xy; $para["x_div"]=$x_divsq; $para["y_div"]=$y_divsq;    $para["devlist"]=$x_div;  $para["devslist"]=$y_div;      
        $para["devp"]=$proddivxy;    $para["actual"]=$errorcast;
        $depdata[]=round(((array_sum($forecast_bias)/array_sum($errorcast))),2);   $para["fea"]=$forecast_error;
        $depdata[]=round(((array_sum($forecast_error)/array_sum($errorcast))),2);  $para["fba"]=$forecast_bias; $para["paNz3we"]=$depdata;
        $data["para"]=$para;
    }
    else{
      	$data["error"]=$error;
    }

    echo json_encode($data);
}
?>