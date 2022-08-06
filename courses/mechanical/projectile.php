<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="physics" ng-controller="myMotion">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container text-center mt-2 mb-2" ng-show="enterData">
			<h1 class="animated fadeIn display-2 mt-5"><b>Projectile Motion</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
					<form align="center" method="POST">
				    <input type="hidden" name="token" ng-model="projMotionData.token" ng-init="projMotionData.token='<?php echo $_SESSION['_token']; ?>'">	
				    <input type="hidden" ng-model="projMotionData.type" ng-init="projMotionData.type='PM'">
					<thead>
						<tr><th colspan="3">​<img src="images/projectile.PNG" class="img-fluid img-thumbnail" alt="..."><br><br><p>NOTE: For horizontal projectile enter angle zero and for normal projectile enter height zero. Conditions are ideal with no air drag and smooth surface for bounce.</p><br><h1 class="mt-2 mb-4"><b>If object was thrown with velocity of {{ projMotionData.uvValue }} m/s at an angle of {{ projMotionData.aValue }}° from height of {{ projMotionData.hValue }}m.</b></h1><br></th></tr>
					    <tr><th>Velocity ({{ projMotionData.uvValue }} m/s)</th><th colspan="2"><input class="form-control" type="number" ng-model="projMotionData.uvValue" placeholder="Enter Initial Velocity" ng-change="submitProj()"></th></tr>
					    <tr><th>Throwing Height ({{ projMotionData.hValue }} m)</th><th colspan="2"><input class="form-control" type="number" ng-model="projMotionData.hValue" placeholder="Enter Height in m" ng-change="submitProj()"></th></tr>
					    <tr><th>Mass ({{ projMotionData.mValue }} kg)</th><th colspan="2"><input class="form-control" type="number" ng-model="projMotionData.mValue" placeholder="Enter mass in kg" ng-change="submitProj()"></th></tr>
					    <tr><th colspan="3">Angle ({{ projMotionData.aValue }}°)<br><br><input class="form-control head slider" type="range" min="0" max="90" ng-model="projMotionData.aValue" ng-change="submitProj()"></th></tr>
					</thead>
					<tbody ng-if="((projMotionData.uvValue>0) && (projMotionData.mValue>0) && (projMotionData.hValue>=0))">
						<tr class="text-light" bgcolor="#0a0a0a"><th>Parameters</th><th>with (g= 10 m/s<sup>2</sup>)</th><th>with (g= 9.81 m/s<sup>2</sup>)</th></tr>
						<tr><th>Time to go upto maximum height(in s)<br><span ng-if="projMotionData.aValue==0">(Note : Horizontal projectile , as ball never goes up to maximum height.)</span></th><td>{{ smbal3i[0] }}</td><td>{{ smbal3i[1] }}</td></tr>
						<tr><th>Time to come down back to line of throw(in s)<br><span ng-if="aValue==0">(Note : Horizontal projectile)</span></th><td>{{ smbal3i[2] }}</td><td>{{ smbal3i[3] }}</td></tr>
						<tr ng-if="msJy2oa[0]>0"><th>Time to come from line of throw to ground(in s)</th><td>{{ msJy2oa[0] }}</td><td>{{ msJy2oa[1] }}</td></tr><tr><th>Total Time of flight till below ground(in s)</th><td>{{ gXmsi3a[0] }}</td><td>{{ gXmsi3a[1] }}</td></tr>
						<tr><th>Maximum Height above line of throw/Maximum height above ground(H)(in m)</th><td>{{ kSmal02[0]  }} / {{ kSmal02[1] }}</td><td>{{ kSmal02[2] }} / {{ kSmal02[3] }}</td></tr>
						<tr><th>Maximum Range on line of throw(R)/Maximum Range on ground(Ro)(in m)</th><td>{{ ksmTw8a[0] }} / {{ ksmTw8a[1] }}</td><td>{{ ksmTw8a[2] }} / {{ ksmTw8a[3] }}</td></tr>
						<tr><th>Maximum Kinetic Energy(in J)</th><td>{{ nsmJa9e }}</td><td>{{ nsmJa9e }}</td></tr>
						<tr><th>Maximum Potential Energy(in J)</th><td>{{ nsmJa9e }}</td><td>{{ nsmJa9e }}</td></tr> 
					</tbody>
				</table><br>
			</div>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body" ng-if="((projMotionData.uvValue>0) && (projMotionData.mValue>0) && (projMotionData.hValue>=0))">
					<thead><tr><th colspan="3">Analyzing motion on above entered parameters</th></tr><tr><th colspan="3">Vary time <br><br><input class="form-control head slider" type="range" min="0" max="{{ gXmsi3a[1] }}" step="{{ gXmsi3a[1]/98.1 }}" ng-model="projMotionData.wKm3f" ng-change="submitProj()"></th></tr>
					</form></thead>
					<tbody><tr class="text-light" bgcolor="#0a0a0a"><th>Parameters(at {{ kjsUj[0] }} s)</th><th>with (g = 10 m/s<sup>2</sup>)</th><th>with (g = 9.81 m/s<sup>2</sup>)</th></tr><tr><th>Horizontal Component of Velocity(in m/s)</th><td>{{ kjsUj[1] }}</td><td>{{ kjsUj[1] }}</td></tr><tr><th>Vertical Component of Velocity(in m/s)</th><td>{{ kjsUj[2] }}</td><td>{{ kjsUj[3] }}</td></tr><tr><th>Horizontal Distance travelled(x)(in m)</th><td>{{ kjsUj[4] }}</td><td>{{ kjsUj[4] }}</td></tr><tr><th>Height from ground(in m)</th><td>{{ kjsUj[5] }}</td><td>{{ kjsUj[6] }}</td></tr><tr><th>Angle of velocity with horizontal(in °)</th><td>{{ kjsUj[7] }}</td><td>{{ kjsUj[8] }}</td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
var myApp=angular.module("physics",[]);
    myApp.controller("myMotion",function ($scope,$http,$window){ $scope.enterData=true; $scope.submitProj=function(){ $http({  method:"POST", url:"asset/motion/vertical?token=<?php echo $_SESSION['_token'] ?>", data:$scope.projMotionData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.smbal3i=data.para.smbal3i; $scope.msJy2oa=data.para.msJy2oa; $scope.kSmal02=data.para.kSmal02; $scope.ksmTw8a=data.para.ksmTw8a; $scope.nsmJa9e=data.para.nsmJa9e; $scope.gXmsi3a=data.para.gXmsi3a; $scope.kjsUj=data.para.kjsUj; } }); }; });
</script>