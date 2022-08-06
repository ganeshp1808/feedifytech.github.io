<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $force=($form_data->skw3mSQ); $material=($form_data->jsLams2);   $fos=($form_data->zmalYa3); $cotterp=[];  $entp=[];
        if(($force>0) && ($material>0) && ($fos>0)){
    	    $stressvalues= array(array('Material', 'Syt'),array('30C8', 400),array('40C8',380),array('50C4',460),array('40Cr4',490),array('40Ni14' ,550),array('40Ni10Cr3Mo6',750),array('40Cr13Mo10V2',1050),array('30Ni16Cr5',1240),array('Aluminium',280),array('Copper',276),array('Brass',195),array('Gold',120));

            $diameterlist=[0];$matlist=[0]; $tensile=($stressvalues[$material][1])/$fos;   
    	
        	for ($i=1; $i<count($stressvalues); $i++) {
                $matlist[]=$stressvalues[$i][0];
                $diameterlist[]=round(sqrt((4*$force*$fos)/(pi()*$stressvalues[$i][1])),2); 
            }
            $entp[]=$force; $entp[]=$stressvalues[$material][0]; $entp[]=$fos;

            $cotterp[]=$d=round(sqrt((4*$force)/($tensile*pi())),2); $cotterp[]=round((0.75*$d),2); $cotterp[]=round((0.45*$d),2); 
            $cotterp[]=round((0.31*$d),2); $cotterp[]=round((4*$d),2); $cotterp[]=round((2*$d),2); $cotterp[]=round((1.66*$d),2); 
            $cotterp[]=round((1.266*$d),2);  $cotterp[]=round((0.9075*$d),2); $cotterp[]=round((1.5*$d),2); $cotterp[]=round((2.533*$d),2); 
            $cotterp[]=round((1.815*$d),2); $cotterp[]=round((0.958*2*$d),2); $cotterp[]=round((1.75*$d),2);  $cotterp[]=round((2.5*$d),2); 
            $cotterp[]=round((3.5*$d),2);
        }
            $para["Jakm2li"]=$matlist; $para["kmZw7er"]=$diameterlist; $para["ajNzm5r"]=$cotterp; $para["pamzEg4"]=$entp; $data["para"]=$para;	
        echo json_encode($data);
}
?>