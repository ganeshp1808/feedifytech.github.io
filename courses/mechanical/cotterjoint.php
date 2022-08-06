<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myCotterDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Cotter Joint</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Instead of using one long rod to sustain force, a seperable joint known as cotter joint is used to connect two co-axial rods, which are subjected to either axial tensile force or axial compressive force. It is not used for transmiting torque and sustaining angular displacement. Material used for this component is ductile in nature so low, medium carbon steel are preferred for low force application else high carbon and alloy steel can be used for high force application giving higher strength.</h4><br>
				<h4>As a engineer you can put cotter joint where you have to connect two rods to sustain force. All the best to create your own application.</h4><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design cotter joint for <b>force of {{ cotterData.skw3mSQ }} N</b>, with considering <b>factor of safety(FoS) as {{ cotterData.zmalYa3 }}</b>.</h1></div>
				<div class="container text-center designdone p-4 shadow mb-5 bg-body">
					<h1 class="text-center">Enter the parameters</h1><br>
					<form align="center" method="POST">
				    	<input type="hidden" name="token" ng-model="cotterData.token" ng-init="cotterData.token='<?php echo $_SESSION['_token']; ?>'">
				    	<div class="row">
				        	<div class="col-sm-6 mb-3"><input type="number" ng-model="cotterData.skw3mSQ" placeholder="Enter Force in N" class="form-control" ng-change="submitCotter()"></div>
				        	<div class="col-sm-6">
				            	<select class="form-control" ng-model="cotterData.jsLams2" ng-change="submitCotter()"><option value="">Select Material</option><option value="1">30C8</option><option value="2">40C8</option><option value="3">50C4</option><option value="4">40Cr4</option><option value="5">40Ni14</option><option value="6">40Ni10Cr3Mo6</option><option value="7">40Cr13Mo10V2</option><option value="8">30Ni16Cr5</option><option value="9">Aluminium</option><option value="10">Copper</option><option value="11">Brass</option><option value="12">Gold</option></select>
				        	</div>
				    	</div>
				</div>
				<div class="text-center mb-5" ng-if="((cotterData.skw3mSQ>0) && (cotterData.jsLams2>0))">
				    <h1 class="mt-2 mb-2 contentheader"><b>Analysis Done for {{ pamzEg4[1] }}</b></h1>
				    <table class="table table-responsive-sm shadow mb-5 bg-body">
				        <thead><tr><td colspan="2"><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/cjointdia.PNG" alt='...'></td></tr><tr><th colspan="2">FoS ({{ cotterData.zmalYa3 }})<br><br><input class="form-control head slider" type="range" min="1" max="10" name="zmalYa3" ng-model="cotterData.zmalYa3" ng-change="submitCotter()"><br><br>(NOTE: Recommended factor of safety is 6.)</th></tr>
					</form>
				        </thead>
				        <tbody>
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameters (in mm)</th></tr><tr><th colspan="2">Diameter of rod(d) = {{ ajNzm5r[0] }}</th></tr><tr><th>Clearance = 1.5 to 3</th><th>Taper = 1:24 or 1:32</th></tr><tr><th colspan="2">Distance from end of slot to end of rod(a) = {{ ajNzm5r[1] }}</th></tr><tr><th colspan="2">Socket Collar Thickness(c) = {{ ajNzm5r[1] }}</th></tr><tr><th colspan="2">Spigot Collar Thickness(t1) = {{ ajNzm5r[2] }}</th></tr><tr><th colspan="2">Cotter Thickness(t) = {{ ajNzm5r[3] }}</th></tr><tr><th colspan="2">Cotter Length(l) = {{ ajNzm5r[4] }}</th></tr><tr><th colspan="2">Mean Cotter Width(b) = {{ ajNzm5r[5] }}</th></tr><tr><th colspan="2">Outside diameter of socket(d1) = {{ ajNzm5r[6] }}</th></tr><tr><th colspan="2">Diameter of spigot or inner diameter of socket(d2) = {{ ajNzm5r[7] }}<br>(NOTE: 1. Safe Value to avoid crushing of spigot = {{ ajNzm5r[7] }}<br>2. Safe Value to avoid shear of spigot = {{ ajNzm5r[8] }} <br>3.So maximum value considered.)</th></tr><tr><th colspan="2">Outside diameter of spigot collar(d3) = {{ ajNzm5r[9] }}</th></tr><tr><th colspan="2">Diameter of socket collar(d4) = {{ ajNzm5r[10] }}<br>(NOTE: 1. Safe Value to avoid crushing of socket collar = {{ ajNzm5r[10] }} <br>2. Safe Value to avoid shear of socket collar = {{ ajNzm5r[11] }} <br>3.So maximum value considered.)</th></tr><tr><th>Cotter Design<br><br>X = {{ ajNzm5r[12] }}</th><td><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/cotterd.PNG" alt='...'></td></tr><tr><th>Socket Design<br><br>p = {{ ajNzm5r[13] }}<br>q = {{ ajNzm5r[14] }}<br>r = {{ ajNzm5r[15] }}</th><td><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/socketd.PNG" alt='...'></td></tr><tr><th>Spigot Design<br><br>r = {{ ajNzm5r[15] }}</th><td><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/spigotd.PNG" alt='...'></td></tr>
				        </tbody>
				    </table>
				    <h1 class="mt-5 mb-4 contentheader"><b>Graphical Analysis</b></h1><div class="chart p-2"><h1 class="text-light mt-5">Force : {{ pamzEg4[0] }}</h1><h1 class="text-light mb-3">Factor of Safety : {{ pamzEg4[2] }}</h1><canvas id="mychart" height="350px">{{ Jakm2li | cottergraph:kmZw7er }}</canvas></div><br><br><br>
				</div>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
 var myApp=angular.module("machinedesign",[]);
 	myApp.filter('cottergraph',function ($filter) { return function (input,input1) {
 		let myChart=document.getElementById('mychart').getContext('2d'); Chart.defaults.global.defaultFontFamily = 'Poppins'; 
 		Chart.defaults.global.defaultFontColor = '#f2f2f2'; let massPopChart=new Chart(myChart,{ type:'line', 
 			data:{ labels:input,datasets:[{ type: 'line', label: 'Diameter of Rod(d) vs Material', data: input1, borderColor:'#fff700', pointHoverBackgroundColor:"#fff700", pointBackgroundColor:'#fff700' }] },
                    options:{ responsive: true, title:{ display:true, text:'Diameter of Rod(d) vs Material', fontSize:'18' },
                    scales: { yAxes: [{ scaleLabel: { display: true, labelString: 'Diameter of Rod(d)(in mm)' } }] } } });  }; });
    myApp.controller("myCotterDesign",function ($scope,$http,$window) { $scope.enterData=true;
        $scope.submitCotter=function(){
            $http({  method:"POST", url:"asset/simplejoint/cotterjoint?token=<?php echo $_SESSION['_token'] ?>", data:$scope.cotterData
                }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.ajNzm5r=data.para.ajNzm5r; 
                	$scope.pamzEg4=data.para.pamzEg4; $scope.Jakm2li=data.para.Jakm2li; $scope.kmZw7er=data.para.kmZw7er;  } }); };
    });
</script>