<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myUnits">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container text-center mt-2 mb-2">
			<h1 class="animated fadeIn display-2 mt-5 mb-5"><b>Units</b></h1>
			<div class="table-responsive-sm">
				<table class="table table-light shadow mb-5 bg-body">
					<thead><tr><th colspan="4">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#getforce">Force or Weight</a></th><th><a class="btn place_content p-2" href="#getstress">Stress or Pressure</a></th><th><a class="btn place_content p-2" href="#getmass">Mass</a></th></tr><tr><th><a class="btn place_content p-2" href="#gettemp">Temperature</a></th><th><a class="btn place_content p-2" href="#getenergy">Energy</a></th></tr></thead>
				</table>
			</div>
			<h1 class="mt-2 mb-4 contentheader p-2"><b>Mass(in kg)</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
				   <form align="center" method="POST">
					<input type="hidden" name="token" ng-model="unitData.token" ng-init="unitData.token='<?php echo $_SESSION['_token']; ?>'">
				   <thead><tr><th colspan="2">Volume ({{ unitData.gajNwe7 }} mm<sup>3</sup>)</th><td colspan="4"><input class="form-control" type="number" ng-model="unitData.gajNwe7" placeholder="Enter Volume in mm3"  ng-change="submitUnit()"></td></tr></thead>
					<tbody ng-if="(unitData.gajNwe7>0)"><tr class="text-light" bgcolor="#0a0a0a"><th>Gold</th><th>Silver</th><th>Bronze</th><th>Brass</th><th>Steel</th></tr><tr><td>{{ kqWgvx6[1] }}</td><td>{{ kqWgvx6[2] }}</td><td>{{ kqWgvx6[3] }}</td><td>{{ kqWgvx6[4] }}</td><td>{{ kqWgvx6[5] }}</td></tr>
					<tr class="text-light" bgcolor="#0a0a0a"><th>Cast Iron</th><th>Aluminium</th><th>Wood</th><th>Concrete</th><th>Plastic</th></tr><tr><td>{{ kqWgvx6[6] }}</td><td>{{ kqWgvx6[7] }}</td><td>{{ kqWgvx6[8]}}</td><td>{{ kqWgvx6[9] }}</td><td>{{ kqWgvx6[10] }}</td></tr></tbody>
				</table>
			</div>
			<h1 class="mt-2 mb-4 contentheader p-2" id="getforce"><b>Force/Weight</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
				   <thead><tr><th colspan="2">Force ({{ unitData.hjnEix8 }} N)</th><td colspan="3"><input class="form-control" type="number" ng-model="unitData.hjnEix8" placeholder="Enter Force in N" ng-change="submitUnit()"></td></tr></thead>
					<tbody ng-if="(unitData.hjnEix8>0)"><tr class="text-light" bgcolor="#0a0a0a"><th>Dyne</th><th>Pound Force</th><th>kgf</th><th>MegaNewton</th><th>KiloNewton</th></tr><tr><td>{{ han4nxU[1] }}</td><td>{{ han4nxU[2] }}</td><td>{{ han4nxU[3] }}</td><td>{{ han4nxU[4] }}</td><td>{{ han4nxU[5] }}</td></tr></tbody>
				</table>
			</div>                
			<h1 class="mt-2 mb-4 contentheader p-2" id="getstress"><b>Stress/Pressure</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
				   <thead><tr><th colspan="2">Stress ({{ unitData.gahNu2w }} N/mm<sup>2</sup> or Mega Pascal)</th><td colspan="3"><input class="form-control" type="number" ng-model="unitData.gahNu2w" placeholder="Enter Stress" ng-change="submitUnit()"></td></tr></thead>
					<tbody ng-if="(unitData.gahNu2w>0)"><tr class="text-light" bgcolor="#0a0a0a"><th>Torr</th><th>Pascal</th><th>mm of Hg</th><th>psi</th><th>bar</th></tr><tr><td>{{ jnaNzy3[1] }}</td><td>{{ jnaNzy3[2] }}</td><td>{{ jnaNzy3[3] }}</td><td>{{ jnaNzy3[4] }}</td><td>{{ jnaNzy3[5] }}</td></tr></tbody>
				</table>
			</div>               
			<h1 class="mt-2 mb-4 contentheader p-2" id="getmass"><b>Mass</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
				   <thead><tr><th colspan="2">Mass ({{ unitData.hajB2wy }} kg)</th><td colspan="3"><input class="form-control" type="number" ng-model="unitData.hajB2wy" placeholder="Enter Mass in kg" ng-change="submitUnit()"></td></tr></thead>
					 <tbody ng-if="(unitData.hajB2wy>0)"><tr class="text-light" bgcolor="#0a0a0a"><th>Ton</th><th>Quintal</th><th>Pound</th><th>Stone</th><th>Ounce</th></tr><tr><td>{{ Hanxi3r[1] }}</td><td>{{ Hanxi3r[2] }}</td><td>{{ Hanxi3r[3] }}</td><td>{{ Hanxi3r[4] }}</td><td>{{ Hanxi3r[5] }}</td></tr></tbody>
				</table>
			</div>
			<h1 class="mt-2 mb-4 contentheader p-2" id="gettemp"><b>Temperature</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
				   <thead><tr><th colspan="2">Temperature ({{ unitData.uVsb2wt }} °C)</th><td colspan="2"><input class="form-control" type="number" ng-model="unitData.uVsb2wt" placeholder="Enter Temperature in °C" ng-change="submitUnit()"></td></tr></thead>
					<tbody ng-if="(unitData.uVsb2wt!=' ')"><tr class="text-light" bgcolor="#0a0a0a"><th>Kelvin</th><th>Fahrenheit</th><th>Newton</th><th>Rankine</th></tr><tr><td>{{ ajNvx3y[1] }}</td><td>{{ ajNvx3y[2] }}</td><td>{{ ajNvx3y[3] }}</td><td>{{ ajNvx3y[4] }}</td></tr></tbody>
				</table>
			</div>               
			<h1 class="mt-2 mb-4 contentheader p-2" id="getenergy"><b>Energy</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
				   <thead><tr><th colspan="2">Energy ({{ unitData.nabSwy7 }} J)</th><td colspan="2"><input class="form-control" type="number" ng-model="unitData.nabSwy7" placeholder="Enter Energy in J" ng-change="submitUnit()"></td></tr></thead>
				</form>
					<tbody ng-if="(unitData.nabSwy7>0)"> <tr class="text-light" bgcolor="#0a0a0a"><th>ergs</th><th>Watt-hour</th><th>electron Volt(eV)</th><th>Foot Pound</th></tr><tr><td>{{ kaNwx4u[1] }} x 10 <sup>7</sup></td><td>{{ kaNwx4u[2] }}</td><td>{{ kaNwx4u[3] }} x 10 <sup>18</sup></td><td>{{ kaNwx4u[4] }}</td></tr></tbody>
				</table>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
 var myApp=angular.module("machinedesign",[]);
    myApp.controller("myUnits",function ($scope,$http,$window) {
        $scope.submitUnit=function(){ $http({  method:"POST", url:"asset/units?token=<?php echo $_SESSION['_token'] ?>", data:$scope.unitData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.kqWgvx6=data.para.kqWgvx6;	$scope.han4nxU=data.para.han4nxU;	
        	$scope.jnaNzy3=data.para.jnaNzy3; $scope.Hanxi3r=data.para.Hanxi3r;	$scope.ajNvx3y=data.para.ajNvx3y;	$scope.kaNwx4u=data.para.kaNwx4u; } }); }; });
</script>