<?php
error_reporting(0);
ini_set('display_errors', 'Off');

	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
	    //Force
	    if(empty($form_data->ahsjWl2)){
	        $error["xdata"]="Enter X-Coordinates with space in between";
	    }
	    else{
        	$xdata=(explode(" ",($form_data->ahsjWl2)));      
            $count_xdata=count($xdata);
            $numx=0;
            for ($i=0; $i <$count_xdata ; $i++) { 
                if(!is_numeric($xdata[$i])){ $numx++; }
            }
                if($numx>0){ $error["xdatatype"]="Data entered does not have complete integers";  }
        }
        //Material
        if(empty($form_data->jsLams2)){
            $error["ydata"]="Enter Y-Coordinates with space in between";
        }
        else{
                $ydata=(explode(" ",($form_data->jsLams2))); $count_ydata=count($ydata);
                if(($count_xdata>$count_ydata) or ($count_xdata<$count_ydata)){ $error["ydatacount"]=$count_xdata." entries on left and ".$count_ydata." entries on right"; }     
                
                $numy=0;
                for ($i=0; $i <$count_ydata ; $i++) { 
                    if(!is_numeric($ydata[$i])){ $numy++; }
                }
                if($numy>0){ $error["ydatatype"]="Data entered does not have complete integers";  }
            }

        if(empty($form_data->sjhdj5T)){
            $error["xdatalabel"]="Enter X-Axis label";
        }
        if(empty($form_data->jshdVz0)){
            $error["ydatalabel"]="Enter Y-Axis label";
        }
      		

    if(empty($error)){
        $xsq=[]; $avgs=[]; $prod_xy=[]; $x_div=[]; $y_div=[]; $x_divsq=[]; $y_divsq=[]; $proddivxy=[]; $errorcast=[];     $forecast_error=[];$equation=[];
        $avgs[]=round((array_sum($xdata)/$count_xdata),2);        $regs=[];
        $avgs[]=round((array_sum($ydata)/$count_ydata),2);
        $para["Apqis8m"]=$avgs;
        for ($i=0; $i <$count_xdata ; $i++) { 
            $xsq[]=round(($xdata[$i]*$xdata[$i]),2);
            $prod_xy[]=round(($xdata[$i]*$ydata[$i]),2);
            $x_div[]=round(($xdata[$i]-($avg_x)),2);
            $x_divsq[]=round((($xdata[$i]-($avg_x))*($xdata[$i]-($avg_x))),2);
            $y_div[]=round(($ydata[$i]-($avg_y)),2);
            $y_divsq[]=round((($ydata[$i]-($avg_y))*($ydata[$i]-($avg_y))),2);
            $proddivxy[]=round((($xdata[$i]-($avg_x))*($ydata[$i]-($avg_y))),2);
        }
        $b=((array_sum($xdata)*array_sum($ydata))-($count_xdata*(array_sum($prod_xy))))/((pow(array_sum($xdata),2))-($count_xdata*(array_sum($xsq))));
        $a=((array_sum($ydata))-($b*array_sum($xdata)))/$count_xdata;

        for ($j=0; $j <$count_xdata ; $j++) { 
            $vals=round(($a+($b*$xdata[$j])),2);
            $errorcast[]=$vals;
            $forecast_error[]=round(($ydata[$j]-$vals),2);
        }

        $reg=(array_sum($proddivxy)/sqrt((array_sum($x_divsq))*(array_sum($y_divsq))));

        $para["skalo5D"]=round($a,5); $para["akLqio3"]=round($b,5);   $para["kam2Wio"]=round($reg,2);

        $para["hQia0ed"]=$xdata;  $para["Almsop9"]=$ydata;    $para["actual"]=$errorcast; $para["stddiv"]=$forecast_error; $para["equa"]=$equation;

        $para["xlabel"]=($form_data->sjhdj5T);  $para["ylabel"]=($form_data->jshdVz0);
        $data["para"]=$para;
    }
    else{
      	$data["error"]=$error;
    }

    echo json_encode($data);
}
?>