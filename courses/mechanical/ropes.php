<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?> </head>
<body ng-app="machinedesign" ng-controller="myRopeDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-1 text-center mt-5"><b>Rope Design</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Ropes are used for hoisting mechanism, carrying and lifting loads by using small efforts. Hoisting mechanisms are widely used in cranes, construction site, pulley blocks etc. Development of this mechanism has revolutionized lifting mechanism. Design of rope is discussed in this section.</h4><br><h4>As a engineer you can put rope where you have to shift loads. All the Best to create your own application.</h4><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design rope for <b>load of {{ ropeData.skw3m }} N</b>, with  considering <b>{{ ropeData.zmalY }} bends</b>.</h1></div>
				<div class="container text-center designdone p-3 shadow mb-5 bg-body">
				   <h1>Enter the parameters</h1><br>
				   <form align="center" method="POST">
				      <input type="hidden" name="token" ng-model="ropeData.token" ng-init="ropeData.token='<?php echo $_SESSION['_token']; ?>'">
				      <div class="row">
				         <div class="col-sm-6 mb-3"><input type="number" ng-model="ropeData.skw3m" placeholder="Enter load to be lifted in N" class="form-control"  ng-change="submitRope()"></div>
				         <div class="col-sm-6"><select class="form-control" ng-model="ropeData.jsLams" ng-change="submitRope()"><option value="">Select Duty Type</option><option value="1">Extreme Light Duty</option><option value="2">Light Duty</option><option value="3">Medium Duty</option><option value="4">Heavy Duty</option></select></div>
				      </div><br>
				      <div class="row justify-content-center">
				         <div class="col-sm-6 mb-3"><select class="form-control" ng-model="ropeData.bNx2g" ng-change="submitRope()"><option value="">Select Material</option><option value="1">30C8</option><option value="2">40C8</option><option value="3">50C4</option><option value="4">40Cr4</option><option value="5">40Ni14</option><option value="6">40Ni10Cr3Mo6</option><option value="7">40Cr13Mo10V2</option><option value="8">30Ni16Cr5</option><option value="9">Aluminium</option><option value="10">Copper</option><option value="11">Brass</option><option value="12">Gold</option><option value="13">Improved Paw Steel</option></select></div>
				      </div><br>
				</div>  
				<div class="text-center mt-5 mb-5" ng-if="((ropeData.skw3m>0) && (ropeData.jsLams>0) && (ropeData.bNx2g>0))">
				   <h1 class="mt-2 mb-5 contentheader p-2"><b>Analysis Done</b></h1>
				   <div class="table-responsive-sm">
					   <table class="table shadow mb-5 bg-body">
					      <thead><tr bgcolor="#4287f5"><th colspan="2">No. of Bends ({{ ropeData.zmalY }})<br><br><input class="form-control head slider" type="range" min="1" max="16" ng-model="ropeData.zmalY" ng-change="submitRope()"></th></tr>
					      	<tr bgcolor="#4287f5"><th colspan="2">Pulley efficiency ({{ ropeData.sNx2g }} %)<br><br><input class="form-control head slider" type="range" min="90" max="100" ng-model="ropeData.sNx2g" ng-change="submitRope()"></th></tr>
					      	<tr bgcolor="#4287f5"><th colspan="2">Duty Factor ({{ ropeData.Akm3f }})<br><br><input class="form-control head slider" type="range" min="0.1" max="2" step="0.1" ng-model="ropeData.Akm3f" ng-change="submitRope()"></th></tr>
					      	<tr bgcolor="#4287f5"><th colspan="2">Factor of Safety ({{ ropeData.wLm3g }})<br><br><input class="form-control head slider" type="range" min="1" max="10" step="0.1" ng-model="ropeData.wLm3g" ng-change="submitRope()"></th></tr>
					      	<tr bgcolor="#4287f5"><th><input class="form-check-input" type="radio" ng-model="ropeData.aMb4" value="1" ng-change="submitRope()"><br><br>6x19</th><th><input class="form-check-input" type="radio" ng-model="ropeData.aMb4" value="2" ng-change="submitRope()"><br><br>6x37</th></tr></thead>
					      <tbody ng-if="(ropeData.aMb4>0)"><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameters</th></tr><tr><th colspan="2">Design factor = Duty factor * Factor of safety = {{ sNx2kf[0] }}</th></tr><tr><th colspan="2">{{ sNx2kf[1] }}</th></tr><tr><th colspan="2">{{ sNx2kf[2] }}</th></tr><tr><th colspan="2">Life of rope is {{ sNx2kf[3] }} months and around {{ sNx2kf[5] }} days.</th></tr><tr bgcolor="#07eda0" ng-if="sNx2kf[6]==9"><th colspan="2">Hoisting Velocity ({{ ropeData.aBc }} m/min)<br><br><input class="form-control" type="number" ng-model="ropeData.aBc" placeholder="Enter hoisting velocity" ng-change="submitRope()"></th></tr><tr ng-if="sNx2kf[6]==9"><th colspan="2">Sheave rotates with {{ sNx2kf[7] }} RPM.</th></tr></form></tbody>
					   </table><br><br>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
 var myApp=angular.module("machinedesign",[]);
    myApp.controller("myRopeDesign",function ($scope,$http,$window){	$scope.enterData=true;
    $scope.submitRope=function(){ $http({ method:"POST", url:"asset/loads/ropesheave?token=<?php echo $_SESSION['_token'] ?>", data:$scope.ropeData }).then(function (response){  data = response.data; if(data.error){ } else{ $scope.sNx2kf=data.para.sNx2kf; } }); }; });
</script>