<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="sommech" ng-controller="mySom">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container" ng-show="enterData">
			<h3 class="animated fadeIn display-2 text-center mt-5"><b>Strength of Materials</b></h3><br><br>
			<h4>Hello, User this section looks into various formulations in strength of materials and its parameters by varying other constraints getting to know the variation.</h4><br><h4>As a engineer you can put use of this for various structural application. All the Best to create your own application.</h4><br>
			<table class="table table-responsive-sm table-light shadow mb-5 bg-body text-center">
				<thead><tr><th colspan="4">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#ts">Thermal Stress</a></th><th><a class="btn place_content p-2" href="#torsion">Torsion</a></th></tr></thead>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2"><b>Elastic Modulii</b></h1><br>
			<table class="table table-responsive-sm shadow mb-5 bg-body text-center">
				<thead><form align="center" method="POST">
				    <input type="hidden" ng-model="esmData.token" ng-init="esmData.token='<?php echo $_SESSION['_token']; ?>'">
				    <input type="hidden" ng-model="esmData.type" ng-init="esmData.type='ESM'">
					<tr><th>Enter Modulus of Elasticity<br>(E = {{ esmData.yMzn2ok }} GPa)</th><th colspan="3"><input type="number" ng-model="esmData.yMzn2ok" placeholder="Enter Modulus of Elasticity" class="form-control" ng-change="submitSom()"></th></tr>
					<tr><th colspan="4">Poisson Ratio (v = {{ esmData.wnVxb7g }})<br><br><input class="form-control head slider" type="range" min="0" max="1" step="0.01" ng-model="esmData.wnVxb7g" ng-change="submitSom()"></th></tr>
					<tr ng-if="((esmData.yMzn2ok>0) && (esmData.wnVxb7g==0.5))"><th colspan="4">Bulk Modulus is infinity at v=0.5</th></tr>
				</form></thead>
				<tbody ng-if="((esmData.yMzn2ok>0) && (esmData.wnVxb7g!=0.5))">
					<tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Custom Material</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Shear Modulus (in GPa)<br>E/(2*(1+v))</th><th colspan="2">Bulk Modulus (in GPa)<br>E/(3*(1-2v))</th></tr><tr><td colspan="2">{{ ijMzn5e[0] }}</td><td colspan="2">{{ ijMzn5e[1] }}</td></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Other Material</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Material</th><th>Shear Modulus (in GPa)</th><th>Bulk Modulus (in GPa)</th></tr><tr><th colspan="2">Structural Steel</th><td>{{ ijMzn5e[2] }}</td><td>{{ ijMzn5e[3] }}</td></tr><tr><th colspan="2">Cast Iron</th><td>{{ ijMzn5e[4] }}</td><td>{{ ijMzn5e[5] }}</td></tr><tr><th colspan="2">Brass</th><td>{{ ijMzn5e[6] }}</td><td>{{ ijMzn5e[7] }}</td></tr><tr><th colspan="2">Aluminium</th><td>{{ ijMzn5e[8] }}</td><td>{{ ijMzn5e[9] }}</td></tr><tr><th colspan="2">Gold</th><td>{{ ijMzn5e[10] }}</td><td>{{ ijMzn5e[11] }}</td></tr><tr><th colspan="2">Silver</th><td>{{ ijMzn5e[12] }}</td><td>{{ ijMzn5e[13] }}</td></tr><tr><th colspan="2">Bone</th><td>{{ ijMzn5e[14] }}</td><td>{{ ijMzn5e[15] }}</td></tr><tr><th colspan="2">PVC</th><td>{{ ijMzn5e[16] }}</td><td>{{ ijMzn5e[17] }}</td></tr><tr><th colspan="2">Copper</th><td>{{ ijMzn5e[18] }}</td><td>{{ ijMzn5e[19] }}</td></tr><tr><th colspan="2">Chromium</th><td>{{ ijMzn5e[20] }}</td><td>{{ ijMzn5e[21] }}</td></tr><tr><th colspan="2">Concrete</th><td>{{ ijMzn5e[22] }}</td><td>{{ ijMzn5e[23] }}</td></tr><tr><th colspan="2">Diamond</th><td>{{ ijMzn5e[24] }}</td><td>{{ ijMzn5e[25] }}</td></tr><tr><th colspan="2">Zinc</th><td>{{ ijMzn5e[26] }}</td><td>{{ ijMzn5e[27] }}</td></tr>
				</tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="ts"><b>Thermal Stress</b></h1><br>
			<table class="table table-responsive-sm shadow mb-5 bg-body text-center">
				<thead><form align="center" method="POST">
				    <input type="hidden" ng-model="thermData.token" ng-init="thermData.token='<?php echo $_SESSION['_token']; ?>'"><input type="hidden" ng-model="thermData.type" ng-init="thermData.type='TS'">
					<tr><th>Enter Initial Temperature<br>({{ thermData.u9skMwi }} °C)</th><th colspan="3"><input type="number" ng-model="thermData.u9skMwi" placeholder="Enter Initial Temp" class="form-control" ng-change="submitTherm()"></th></tr>
					<tr><th>Enter Final Temperature<br>({{ thermData.kkMM3md }} °C)</th><th colspan="3"><input type="number" ng-model="thermData.kkMM3md" placeholder="Enter Final Temp" class="form-control" ng-change="submitTherm()"></th></tr>
					<tr><th>Enter length of material<br>({{ thermData.aKKmz2h }} mm)</th><th colspan="3"><input type="number" ng-model="thermData.aKKmz2h" placeholder="Enter length" class="form-control" ng-change="submitTherm()"></th></tr>
					<tr><th colspan="4">Coefficient of Linear expansion({{ thermData.uSnz1yf }} X 10<sup>-6</sup> / °C)<br><br><input type="number" ng-model="thermData.uSnz1yf" placeholder="Enter coefficient" class="form-control" ng-change="submitTherm()"></th></tr>
				</thead>
				<tbody ng-if="(tkAmz2l[0]==1)">
					<tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameter</th><th colspan="2">Value</th></tr><tr><th colspan="2">Extension (in mm)</th><td colspan="2">{{ tkAmz2l[1] }}</td></tr><tr><th colspan="2">Strain</th><td colspan="2">{{ tkAmz2l[2] }}</td></tr>
					<tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Other Materials</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th>Material</th><th>Elongation(in mm)</th><th>Strain</th><th>Stress(in MPa)</th></tr>
					<tr><th>Structural Steel</th><td>{{ tkAmz2l[3] }}</td><td>{{ tkAmz2l[4] }}</td><td>{{ tkAmz2l[5] }}</td></tr>
					<tr><th>Cast Iron</th><td>{{ tkAmz2l[6] }}</td><td>{{ tkAmz2l[7] }}</td><td>{{ tkAmz2l[8] }}</td></tr>
					<tr><th>Brass</th><td>{{ tkAmz2l[9] }}</td><td>{{ tkAmz2l[10] }}</td><td>{{ tkAmz2l[11] }}</td></tr>
					<tr><th>Aluminium</th><td>{{ tkAmz2l[12] }}</td><td>{{ tkAmz2l[13] }}</td><td>{{ tkAmz2l[14] }}</td></tr>
					<tr><th>Gold</th><td>{{ tkAmz2l[15] }}</td><td>{{ tkAmz2l[16] }}</td><td>{{ tkAmz2l[17] }}</td></tr>
					<tr><th>Silver</th><td>{{ tkAmz2l[18] }}</td><td>{{ tkAmz2l[19] }}</td><td>{{ tkAmz2l[20] }}</td></tr>
					<tr><th>PVC</th><td>{{ tkAmz2l[21] }}</td><td>{{ tkAmz2l[22] }}</td><td>{{ tkAmz2l[23] }}</td></tr>
					<tr><th>Copper</th><td>{{ tkAmz2l[24] }}</td><td>{{ tkAmz2l[25] }}</td><td>{{ tkAmz2l[26] }}</td></tr>
					<tr><th>Chromium</th><td>{{ tkAmz2l[27] }}</td><td>{{ tkAmz2l[28] }}</td><td>{{ tkAmz2l[29] }}</td></tr>
					<tr><th>Concrete</th><td>{{ tkAmz2l[30] }}</td><td>{{ tkAmz2l[31] }}</td><td>{{ tkAmz2l[32] }}</td></tr>
					<tr><th>Diamond</th><td>{{ tkAmz2l[33] }}</td><td>{{ tkAmz2l[34] }}</td><td>{{ tkAmz2l[35] }}</td></tr>
					<tr><th>Zinc</th><td>{{ tkAmz2l[36] }}</td><td>{{ tkAmz2l[37] }}</td><td>{{ tkAmz2l[38] }}</td></tr>
				</tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="torsion"><b>Torsion</b></h1><br>
			<table class="table table-responsive-sm shadow mb-5 bg-body text-center">
				<thead><form align="center" method="POST">
				    <input type="hidden" ng-model="torData.token" ng-init="torData.token='<?php echo $_SESSION['_token']; ?>'">
				    <input type="hidden" ng-model="torData.type" ng-init="torData.type='TOR'">
					<tr><th colspan="2">Enter Torque<br>({{ torData.sMz8lah }} N/m)</th><th colspan="2"><input type="number" ng-model="torData.sMz8lah" placeholder="Enter Torque Value" class="form-control" ng-change="submitTor()"></th></tr>
					<tr><th colspan="2" colspan="2">Modulus of Rigidity<br>({{ torData.uSmz2lf }} GPa)</th><th colspan="3"><input type="number" ng-model="torData.uSmz2lf" placeholder="Enter G Value" class="form-control" ng-change="submitTor()"></th></tr>
					<tr><th colspan="2">Enter length of material<br>({{ torData.wmzVs3a }} mm)</th><th colspan="2"><input type="number" ng-model="torData.wmzVs3a" placeholder="Enter length" class="form-control" ng-change="submitTor()"></th></tr>
					<tr><th colspan="2">Dimension <br>({{ torData.xNzm3kd }} mm)</th><th colspan="2"><input type="number" ng-model="torData.xNzm3kd" placeholder="Enter dimension in mm" class="form-control" ng-change="submitTor()"></th></tr>
				</form></thead>
				<tbody ng-if="(ekMz1oo[0]==1)"><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Cross Section</th><td>Angle of Twist (in radian)</th><th>Angle of Twist (in °)</th></tr><tr><th colspan="2">Circular</th><td>{{ ekMz1oo[1] }}</td><td>{{ ekMz1oo[2] }}</td></tr><tr><th colspan="2">Square</th><td>{{ ekMz1oo[3] }}</td><td>{{ ekMz1oo[4] }}</td></tr><tr><th colspan="2">Equilateral Traingle</th><td>{{ ekMz1oo[5] }}</td><td>{{ ekMz1oo[6] }}</td></tr></tbody>
			</table>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
	var myApp=angular.module("sommech",[]);
	myApp.controller("mySom",function ($scope,$http,$window){ $scope.enterData=true;
        $scope.submitSom=function(){ $http({  method:"POST", url:"asset/beams/som?token=<?php echo $_SESSION['_token'] ?>", data:$scope.esmData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.ijMzn5e=data.para.ijMzn5e; } }); };
        $scope.submitTor=function(){ $http({  method:"POST", url:"asset/beams/som?token=<?php echo $_SESSION['_token'] ?>", data:$scope.torData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.ekMz1oo=data.para.ekMz1oo; } }); };
        $scope.submitTherm=function(){ $http({  method:"POST", url:"asset/beams/som?token=<?php echo $_SESSION['_token'] ?>", data:$scope.thermData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.tkAmz2l=data.para.tkAmz2l; } }); }; });
</script>