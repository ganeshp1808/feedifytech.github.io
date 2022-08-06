<?php
error_reporting(0);
ini_set('display_errors', 'Off');
	$form_data=json_decode(file_get_contents("php://input"));
	$confirm_token=$_GET['token'];

	$submit_token=$form_data->token;
	$error=[];$data=[];$para=[];

	if(($submit_token===$confirm_token) and ($_SERVER['REQUEST_METHOD'] === 'POST')){
        $force=($form_data->skw3mSQ); $material=($form_data->jsLams2);   $fos=($form_data->zmalYa3); $knucklep=[];  $entp=[];
        if(($force>0) && ($material>0) && ($fos>0)){
            $stressvalues= array(array('Material', 'Syt'),array('30C8', 400),array('40C8',380),array('50C4',460),array('40Cr4',490),array('40Ni14' ,550),array('40Ni10Cr3Mo6',750),array('40Cr13Mo10V2',1050),array('30Ni16Cr5',1240),array('Aluminium',280),array('Copper',276),array('Brass',195),array('Gold',120));

            $diameterlist=[0];$matlist=[0]; $tensile=($stressvalues[$material][1])/$fos;   
        	for ($i=1; $i<count($stressvalues); $i++) {
                $matlist[]=$stressvalues[$i][0];
                $diameterlist[]=round(sqrt((4*$force*$fos)/(pi()*$stressvalues[$i][1])),2); 
            }
        	$entp[]=$force; $entp[]=$stressvalues[$material][0]; $entp[]=$fos;
            
            $knucklep[]=$D=round(sqrt((4*$force)/($tensile*pi())),2); $knucklep[]=round((1.1*$D),2); $knucklep[]=round((0.75*$D),2); 
            $knucklep[]=round((1.25*$D),2); $knucklep[]=round((1.31*$D),2);     $knucklep[]=round((1.965*$D),2); $knucklep[]=round((2.62*$D),2);
            $knucklep[]=round((0.1875*$D),2);	$knucklep[]=round((3.5*$D),2);		
            if($D<10){ $knucklep[]=round((1.375*$D),2); $knucklep[]=round((1.375*$D),2); }else if($D>=10){ $knucklep[]=round(((1.375*$D)-10),2); 
                $knucklep[]=round(((1.375*$D)+10),2); }
        }
        $para["Jakm2li"]=$matlist; $para["kmZw7er"]=$diameterlist; $para['ajNzm5r']=$knucklep; $para['pamzEg4']=$entp; $data["para"]=$para; 
        echo json_encode($data);
}
?>