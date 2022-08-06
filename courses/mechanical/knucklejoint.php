<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myKnuckleDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-1 text-center mt-5"><b>Knuckle Joint</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Instead of using one long rod to sustain force, a seperable joint known as knuckle joint is used to connect two co-axial rods, which are subjected to either axial tensile force or axial compressive force. It can sustain small angular displacement. Material used for this component is ductile in nature so low,medium carbon steel are preferred for low force application else high carbon and alloy steel can be used for high force application giving higher strength.</h4><br><h4>As a engineer you can put knuckle joint where you have to connect two rods to sustain force. All the Best to create your own application.</h4><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design knuckle joint for <b>force of {{ knuckleData.skw3mSQ }} N</b>, with  considering <b>factor of safety(FoS) as {{ knuckleData.zmalYa3 }}</b>.</h1></div>
				<div  class="container text-center designdone p-3 shadow mb-5 bg-body">
				    <h1>Enter the parameters</h1><br>
				    <form align="center" method="POST">
				        <input type="hidden" name="token" ng-model="knuckleData.token" ng-init="knuckleData.token='<?php echo $_SESSION['_token']; ?>'">
				        <div class="row">
				            <div class="col-sm-6 mb-3"><input type="number" ng-model="knuckleData.skw3mSQ" placeholder="Enter Force in N" class="form-control"  ng-change="submitKnuckle()"></div>
				            <div class="col-sm-6"><select class="form-control" ng-model="knuckleData.jsLams2" ng-change="submitKnuckle()"><option value="">Select Material</option><option value="1">30C8</option><option value="2">40C8</option><option value="3">50C4</option><option value="4">40Cr4</option><option value="5">40Ni14</option><option value="6">40Ni10Cr3Mo6</option><option value="7">40Cr13Mo10V2</option><option value="8">30Ni16Cr5</option><option value="9">Aluminium</option><option value="10">Copper</option><option value="11">Brass</option><option value="12">Gold</option></select></div>
				        </div><br>
				</div>  
				<div class="text-center mt-5 mb-5" ng-if="((knuckleData.skw3mSQ>0) && (knuckleData.jsLams2>0))">
				    <h1 class="mt-2 mb-5 contentheader"><b>Analysis Done for {{ pamzEg4[1] }}</b></h1>
				    <table class="table table-responsive-sm shadow mb-5 bg-body">
				        <thead>
				        	<tr><td colspan="2"><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/knuckledia.PNG" alt='...'></td></tr><tr bgcolor="#4287f5"><th colspan="2">Factor of Safety ({{ knuckleData.zmalYa3 }})<br><br><input class="form-control head slider" type="range" min="1" max="10" ng-model="knuckleData.zmalYa3" ng-change="submitKnuckle()"></th></tr>
				    </form>
						</thead>
				        <tbody><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameters (in mm)</th></tr><tr><th colspan="2">Diameter of rod(D) = {{ ajNzm5r[0] }}</th></tr><tr><th colspan="2">Enlarged Diameter of rod(D<sub>1</sub>) = {{ ajNzm5r[1] }}</th></tr><tr><th colspan="2">Thickness of each eye on fork(a) = {{ ajNzm5r[2] }}</th></tr><tr><th colspan="2">Thickness of eye end(b) = {{ ajNzm5r[3] }}</th></tr><tr><th colspan="2">Diameter of Knuckle Pin(d) = {{ ajNzm5r[4] }}<br><br>(NOTE: Safe Value obtained with crushing, shear and bending  consideration.)</th></tr><tr><th colspan="2">Diameter of Pin head(d<sub>1</sub>) = {{ ajNzm5r[5] }}</th></tr><tr><th colspan="2">Outside diameter of eye or fork(d<sub>0</sub>) = {{ ajNzm5r[6] }}</th></tr><tr><th>Pin Design<br><br>X = {{ ajNzm5r[7] }}<br>Y = {{ ajNzm5r[8] }}</th><td><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/kpind.PNG" alt='...'></td></tr><tr><th>Eye Design</th><td><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/keyed.PNG" alt='...'></td></tr><tr><th>Fork Design<br><br>Radius p = {{ ajNzm5r[9] }}<br>q = {{ ajNzm5r[10] }}</th><td><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/kforkdia.PNG" alt='...'></td></tr></tbody>
				    </table>
				    <h1 class="mt-5 mb-4 contentheader"><b>Graphical Analysis</b></h1><div class="chart p-2"><h1 class="text-light mt-5">Force : {{ pamzEg4[0] }}</h1><h1 class="text-light mb-3">Factor of Safety : {{ pamzEg4[2] }}</h1><canvas id="mychart" height="350px">{{ Jakm2li | knucklegraph:kmZw7er }}</canvas></div><br><br><br>
				</div>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
 var myApp=angular.module("machinedesign",[]);
 	myApp.filter('knucklegraph',function ($filter) { return function (input,input1) {
 		let myChart=document.getElementById('mychart').getContext('2d'); Chart.defaults.global.defaultFontFamily = 'Poppins'; 
 		Chart.defaults.global.defaultFontColor = '#f2f2f2'; let massPopChart=new Chart(myChart,{ type:'line', 
 			data:{ labels:input,datasets:[{ type: 'line', label: 'Diameter of Rod(d) vs Material', data: input1, borderColor:'#fff700', pointHoverBackgroundColor:"#fff700", pointBackgroundColor:'#fff700' }] },
                    options:{ responsive: true, title:{ display:true, text:'Diameter of Rod(d) vs Material', fontSize:'18' },
                    scales: { yAxes: [{ scaleLabel: { display: true, labelString: 'Diameter of Rod(d)(in mm)' } }] } } });  }; });
    myApp.controller("myKnuckleDesign",function ($scope,$http,$window) {	$scope.enterData=true;
    	$scope.submitKnuckle=function(){ $http({ method:"POST", url:"asset/simplejoint/knucklejoint?token=<?php echo $_SESSION['_token'] ?>", data:$scope.knuckleData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.ajNzm5r=data.para.ajNzm5r; $scope.pamzEg4=data.para.pamzEg4; $scope.Jakm2li=data.para.Jakm2li;	$scope.kmZw7er=data.para.kmZw7er; } }); }; });
</script>