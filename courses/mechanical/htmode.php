<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="heattransfer" ng-controller="myHtMode">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container" ng-show="enterData">
			<h2 class="mt-5 mb-5">Hello User, this section discusses about basic modes of heat transfer and computation of various parameters on varying other parameters.</h2>
			<h1 class="mt-2 mb-4 contentheader text-center p-2"><b>Heat Transfer</b></h1>
			<div class="table-responsive-sm text-center">
				<table class="table shadow mb-5 bg-body">
					<thead>
					    <tr><th colspan="4">NOTE: Steady state one dimensional conduction. Also, this section only gives you idea about comparison among other materials.</th></tr>
					<form align="center" method="POST">
					    <input type="hidden" ng-model="htData.token" ng-init="htData.token='<?php echo $_SESSION['_token']; ?>'">
					    <input type="hidden" ng-model="htData.type" ng-init="htData.type='HT'">
					    <tr><th colspan="2">Temperature on hot side (T = {{ htData.yUnz2j }} °C)</th><th colspan="2"><input type="number" ng-model="htData.yUnz2j" placeholder="Enter Temperature" class="form-control" ng-change="submitHt()"></th></tr>
					    <tr><th colspan="2">Temperature on cold side (t = {{ htData.iNzm2j }} °C)</th><th colspan="2"><input type="number" ng-model="htData.iNzm2j" placeholder="Enter Temperature" class="form-control" ng-change="submitHt()"></th></tr>
					    <tr><th colspan="4">Constant(Conductive(k) / Convective Coefficient(h)) = ({{ htData.qhCz7fg }} (W/mK or W/m²K)<br><br><input type="number" ng-model="htData.qhCz7fg" placeholder="Enter coefficient" class="form-control" ng-change="submitHt()"></th></tr>
					    <tr><th colspan="2">Area (a = {{ htData.ySNz7sd }} mm²)</th><th colspan="2"><input type="number" ng-model="htData.ySNz7sd" placeholder="Enter Area" class="form-control" ng-change="submitHt()"></th></tr>
					    <tr><th colspan="2">Width (w = {{ htData.zJmA7gk }} mm)</th><th colspan="2"><input type="number" ng-model="htData.zJmA7gk" placeholder="Enter Width" class="form-control" ng-change="submitHt()"></th></tr>
					</thead>
					<tbody ng-if="(thNnz2j[0]==1)">
					    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Conduction<br>(where k = {{ htData.qhCz7fg }} W/mK)<br><br> Conduction is transfer of heat from one part to another part within same substance or between two substance in contact with each other. Basically, heat transfer in solid.</th></tr><tr><th colspan="2">Q = k*a*((T-t)/w)</th><th>R = w/(k*a)</th><th>q = k*((T-t)/w)</th></tr>
					    <tr bgcolor="#07eda0"><th colspan="2">Heat Transfer(Q)(in W)</th><th>Thermal Resistance (in K/W)</th><th>Heat Flux(Q/A)(in W/m<sup>2</sup>)</th></tr><tr><th colspan="2">{{ thNnz2j[1] }}</th><th>{{ thNnz2j[2] }}</th><th>{{ thNnz2j[3] }}</th></tr>
						<tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Convection<br>(where h = {{ htData.qhCz7fg }} W/m²K)<br><br> Convection is transfer of heat from one fluid to another fluid when both come in contact for heat transfer to happen. Basically, heat transfer in fluids.</th></tr>
						<tr><th colspan="2">Q = h*a*(T-t)</th><th>R = 1/(h*a)</th><th>q = h*(T-t)</th></tr>
					    <tr bgcolor="#07eda0"><th colspan="2">Heat Transfer(Q)(in W)</th><th>Thermal Resistance (in K/W)</th><th>Heat Flux(Q/A)(in W/m<sup>2</sup>)</th></tr><tr><th colspan="2">{{ thNnz2j[4] }}</th><th>{{ thNnz2j[5] }}</th><th>{{ thNnz2j[6] }}</th></tr>
						<tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Radiation<br><br>Radiation is transfer of heat from one part to another part placed far away with help of gasesous medium in between which can't be possible through conduction and convection.</th></tr>
					    <tr bgcolor="#07eda0"><th colspan="4">Constant (Emissivity / Absorptivity) (e = {{ htData.xMzzn2h }})<br><br><input class="form-control head slider" type="range" min="0" max="1" step="0.01" ng-model="htData.xMzzn2h" ng-change="submitHt()"></th></tr>
					</form>
						<tr><th colspan="2">Q = e*5.678*10⁻⁸*a*(T⁴-t⁴)</th><th>R = 1/(e*5.678*10⁻⁸*a*(T²-t²)*(T+t))</th><th>q = e*5.678*10⁻⁸*(T⁴-t⁴)</th></tr>
						<tr bgcolor="#07eda0"><th colspan="2">Heat Transfer(Q)(in W)</th><th>Thermal Resistance (in K/W)</th><th>Heat Flux(Q/A)(in W/m<sup>2</sup>)</th></tr>
						<tr><th colspan="2">{{ thNnz2j[7] }}</th><th>{{ 1000000/thNnz2j[8] }}</th><th>{{ thNnz2j[9] }}</th></tr>
					</tbody>
				</table><br><br>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
 var myApp=angular.module("heattransfer",[]);
    myApp.controller("myHtMode",function ($scope,$http,$window) { $scope.enterData=true; $scope.submitHt=function(){
            $http({  method:"POST", url:"asset/loads/ht?token=<?php echo $_SESSION['_token'] ?>", data:$scope.htData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.thNnz2j=data.para.thNnz2j; } }); }; });
</script>