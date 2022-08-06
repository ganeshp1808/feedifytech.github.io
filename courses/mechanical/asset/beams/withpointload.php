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
	        $error["force"]="Enter Force";
	    }
	    else{
        	if(($form_data->skw3mSQ)<=1){
          		$error["forceval"]="Enter force value greater than 1";
        	}
        else{
             	$user_data['force']=$form_data->skw3mSQ;
              	$force=htmlspecialchars($user_data['force'], ENT_QUOTES);
            }
        }
        //Material
        if(empty($form_data->jsLams2)){
            $error["material"]="Select one material";
        }
        else{
	        $user_data['material']=$form_data->jsLams2;
	        $material=htmlspecialchars($user_data['material'], ENT_QUOTES);
	    }
	    //FOS
	    if(empty($form_data->ahsjWl2)){
	        $error["fos"]="Select factor of safety";
        }
	    else{
	        $user_data['fos']=$form_data->ahsjWl2;
		    $fos=htmlspecialchars($user_data['fos'], ENT_QUOTES);
	    }
        //length
        if(empty($form_data->jshjd9C)){
            $error["length"]="Enter Length";
        }
        else{
            $user_data['length']=$form_data->jshjd9C;
            $length=htmlspecialchars($user_data['length'], ENT_QUOTES);
        }
    
    

    if(empty($error)){
    	$para["sval"]=$stressvalues= array(array('Material', 'Syt','Sct','Ssy','density','E','poison','Type'),
                            array('FG150','150','600','173','7.05','100000','0.26','B'),
                            array('FG220','220','768','253','7.15','120000','0.26','B'),
                            array('FG350','350','1080','403','7.3','145000','0.26','B'),
                            array('WM400','400','410','360','7.4','175800','0.26','B'),
                            array('BM320','320','350','288','7.35','168900','0.26','B'),
                            array('PM500','500','510','450','7.35','172400','0.26','B'),
                            array('SG500/7','344','379','200','7.13','171000','0.275','D'),
                            array('30C8','400','400','231','7.2','200000','0.29','D'),
                            array('Stainless Steel(Alloy Steel)','207','207','116','7.75','193000','0.31','D'),
                            array('Alluminium Alloy','280','280','162','2.7','71000','0.33','D'),
                            array('Polyamide Nylon Plastic','124','90','72','1.35','5960','0.35','F'),
                            array('Low Density Polyethene','11.4','11.4','5','0.924','221','0.448','F'),
                            array('Brass Cast','195','165','51','8.15','117000','0.345','D'),
                            array('Brass Wrought','125','125','73','8.46','103000','0.345','D'),
                            array('Bronze Cast','144','144','51','8.81','80000','0.345','D'),
                            array('Copper','280','280','162','8.3','110000','0.34','D'),
                            array('Gold','120','120','70','19.32','77200','0.42','D'),
                            array('Human Bone','104','209','52','1.9','21000','0.42','B'),
                            array('Bamboo','39','36.6','10','0.693','17300','0.384','B'),
                            array('Concrete','5','41','3','2.3','30000','0.18','B'),
                            array('Wood(Pine)','41','33','7','0.487','9300','0.374','B'));

    	$materailname=$stressvalues[$material][0];$tensile=$stressvalues[$material][1];$crush=$stressvalues[$material][2];
        $para["matro"]=$matdens=$stressvalues[$material][4];
        $para["mate"]=$mate=$stressvalues[$material][5];$matpois=$stressvalues[$material][6];


        $para["bendlimit"]=$tenslimit=(($stressvalues[$material][1])/$fos);

        $para["momcantvalue"]=$momcantvalue=($force*$length);    

        $para["force"]=$force;  $para["fos"]=$fos;  $para["length"]=$length;    $para["mats"]=$mats;

        $para['matname']=($stressvalues[$material][0]);   $para['bends']=($stressvalues[$material][1]);

        $data["para"]=$para;	

    }
    else{
      	$data["error"]=$error;
    }

    echo json_encode($data);
}
?>