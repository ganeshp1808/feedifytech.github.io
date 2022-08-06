<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="physics" ng-controller="myMotion">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container text-center mt-2 mb-2" ng-show="enterData">
			<h1 class="animated fadeIn display-2 text-center mt-5 mb-3"><b>Vertical Motion</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
				    <form align="center" method="POST">
				    <input type="hidden" name="token" ng-model="verMotionData.token" ng-init="verMotionData.token='<?php echo $_SESSION['_token']; ?>'"><input type="hidden" ng-model="verMotionData.type" ng-init="verMotionData.type='UM'">
					<thead>
					    <tr><th colspan="3">NOTE: Conditions are ideal with no air drag and smooth surface for bounce.<br><br>If object was thrown upwards with velocity of {{ verMotionData.uvValue }}  m/s.</th></tr>
					    <tr><th>Velocity ({{ verMotionData.uvValue }} m/s)</th><th colspan="2"><input class="form-control" type="number" ng-model="verMotionData.uvValue" placeholder="Enter Initial Velocity" ng-change="submitVel()"></th></tr>
					    <tr><th>Mass ({{ verMotionData.mValue }} kg)</th><th colspan="2"><input class="form-control" type="number" ng-model="verMotionData.mValue" placeholder="Enter Mass" ng-change="submitVel()"></th></tr>
					</thead>
					<tbody ng-if="((verMotionData.uvValue>0) && (verMotionData.mValue>0))">
					    <tr class="text-light" bgcolor="#0a0a0a"><th>Parameters</th><th>with (g = 10 m/s<sup>2</sup>)</th><th>with (g = 9.81 m/s<sup>2</sup>)</th></tr><tr><th>Time to go up(in s)</th><td>{{ ahJs2w1[0] }}</td><td>{{ ahJs2w1[1] }}</td></tr><tr><th>Time to come down back from top(in s)</th><td>{{ ahJs2w1[0] }}</td><td>{{ ahJs2w1[1] }}</td></tr><tr><th>Total Time of flight(in s)</th><td>{{ ahJs2w1[2] }}</td><td>{{ ahJs2w1[3] }}</td></tr><tr><th>Maximum height reached(in m)</th><td>{{ ahJs2w1[4] }}</td><td>{{ ahJs2w1[5] }}</td></tr><tr><th>Maximum Kinetic Energy(in J)</th><td>{{ ahJs2w1[6] }}</td><td>{{ ahJs2w1[6] }}</td></tr><tr><th>Maximum Potential Energy(in J)</th><td>{{ ahJs2w1[6] }}</td><td>{{ ahJs2w1[6] }}</td></tr>
					</tbody>
				</table>
			</div>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body" ng-if="((verMotionData.uvValue>0) && (verMotionData.mValue>0))">
					<thead>
						<tr><th colspan="3">Analyzing motion on above entered parameters</th></tr><tr><th colspan="3">Vary time <br><br><input class="form-control head slider" type="range" min="0" max="{{ ahJs2w1[3] }}" step="{{ (ahJs2w1[3]/98.1) }}" ng-model="verMotionData.aJn3f" ng-change="submitVel()"></th></tr>
					</form></thead>
					<tbody><tr class="text-light" bgcolor="#0a0a0a"><th>Parameters (at {{ dNx2uh[0] }} s)</th><th>with (g = 10 m/s<sup>2</sup>)</th><th>with (g = 9.81 m/s<sup>2</sup>)</th></tr><tr><th>Velocity (in m/s)</th><td>{{ dNx2uh[1] }}</td><td>{{ dNx2uh[2] }}</td></tr><tr><th>Height from ground(in m)</th><td>{{ dNx2uh[3] }}</td><td>{{ dNx2uh[4] }}</td></tr><tr><th>Kinetic Energy (in J)</th><td>{{ dNx2uh[5] }}</td><td>{{ dNx2uh[6] }}</td></tr><tr><th>Potential Energy (in J)</th><td>{{ dNx2uh[7] }}</td><td>{{ dNx2uh[8] }}</td></tr></tbody>
				</table>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
var myApp=angular.module("physics",[]);
    myApp.controller("myMotion",function ($scope,$http,$window) {  $scope.enterData=true; $scope.submitVel=function(){ $http({  method:"POST", url:"asset/motion/vertical?token=<?php echo $_SESSION['_token'] ?>", data:$scope.verMotionData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.ahJs2w1=data.para.ahJs2w1; $scope.dNx2uh=data.para.dNx2uh; } }); }; });
</script>