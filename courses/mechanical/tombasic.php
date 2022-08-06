<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myTomB">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container" ng-show="enterData">
			<h2 class="mt-5 mb-5">Hello User, this section discusses about the basics of Theory of Machines, like before going for understanding whole machine lets get glimpse of some basics first.</h2>
			<h1 class="mt-2 mb-4 contentheader text-center p-2"><b>Linkages</b></h1>
			<div class="table-responsive-sm text-center">
				<table class="table shadow mb-5 bg-body">
				    <thead>
				    <form align="center" method="POST">
				        <input type="hidden" ng-model="linData.token" ng-init="linData.token='<?php echo $_SESSION['_token']; ?>'">
				        <input type="hidden" ng-model="linData.type" ng-init="linData.type='LIN'">
				        <tr><th colspan="4">Number of Links ({{ linData.haNze2q }})<br><br><input class="form-control head slider" type="range" min="3" max="20" ng-model="linData.haNze2q" ng-change="submitLin()"></th></tr>
				    </form>
				    </thead>
					<tbody><tr><th colspan="2">Number of Instantaneous Center</th><td colspan="2">{{ hanVz7y[0] }}</td></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Number of Joints</th><th colspan="2">Comment</th></tr><tr><th colspan="2">if Joints > {{ hanVz7y[1] }}</th><th colspan="2">Locked Chain</th></tr><tr><th colspan="2">if Joints = {{ hanVz7y[1] }}</th><th colspan="2">Kinematic Chain</th></tr><tr><th colspan="2">if Joints < {{ hanVz7y[1] }}</th><th colspan="2">Unconstrained Chain</th></tr></tbody>
				</table><br><br>
			</div>
			<div class="table-responsive-sm text-center">
				<table class="table shadow mb-5 bg-body">
				    <thead>
				    <form align="center" method="POST">
				        <input type="hidden" ng-model="freeData.token" ng-init="freeData.token='<?php echo $_SESSION['_token']; ?>'">
				        <input type="hidden" ng-model="freeData.type" ng-init="freeData.type='free'">
				        <tr><th colspan="4">Number of Links ({{ freeData.kaMze4t }})<br><br><input class="form-control head slider" type="range" min="3" max="15" ng-model="freeData.kaMze4t" ng-change="submitFree()"></th></tr>
				        <tr><th colspan="4">Number of Joints ({{ freeData.mzIsw1u }})<br><br><input class="form-control head slider" type="range" min="3" max="15" ng-model="freeData.mzIsw1u" ng-change="submitFree()"></th></tr>
				        <tr><th colspan="4">Number of Higher pair ({{ freeData.pLmx8eh }})<br><br><input class="form-control head slider" type="range" min="0" max="15" ng-model="freeData.pLmx8eh" ng-change="submitFree()"></th></tr>
				    </form></thead>
				    <tbody><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Degress of Freedom</th><th colspan="2">Comment</th></tr><tr><td colspan="2">{{ hNazi5t[0] }}</td><td colspan="2">{{ hNazi5t[1] }}</td></tr></tbody>
				</table><br><br>
			</div>
			<h1 class="mt-2 mb-4 contentheader text-center p-2"><b>Cam and Follower</b></h1>
			<div class="table-responsive-sm text-center">
				<table class="table shadow mb-5 bg-body">
				    <thead>
				    <form align="center" method="POST">
				        <input type="hidden" ng-model="camData.token" ng-init="camData.token='<?php echo $_SESSION['_token']; ?>'">
				        <input type="hidden" ng-model="camData.type" ng-init="camData.type='CAM'">
				        <tr><th colspan="2">Rise of follower ({{ camData.fNxu4ir }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="camData.fNxu4ir" placeholder="Enter rise in mm" ng-change="submitCam()"></th></tr>
				        <tr><th>RPM ({{ camData.omzWi4r }})</th><th colspan="3"><input class="form-control" type="number" ng-model="camData.omzWi4r" placeholder="Enter RPM" ng-change="submitCam()"></th></tr>
				        <tr><th colspan="4">Angle of Rise ({{ camData.kamxI3w }}°)<br><br><input class="form-control head slider" type="range" min="1" max="360" ng-model="camData.kamxI3w" ng-change="submitCam()"></th></tr>
				        <tr><th colspan="4">Angle of Return ({{ camData.jNaz2wi }}°)<br><br><input class="form-control head slider" type="range" min="1" max="360" ng-model="camData.jNaz2wi" ng-change="submitCam()"></th></tr>
				    </form></thead>
					<tbody ng-if="((camData.fNxu4ir>0) && (camData.omzWi4r>0))">
					    <tr><th colspan="2">Angular Velocity (in rad/s)</th><td colspan="2">{{ iNxj4eu[0] }}</td></tr><tr class="text-light" bgcolor="#0a0a0a"><th>Motion of Follower</th><th>Velocity(in m/s)<br>(Outward Stroke / Return Stroke)</th><th>Accleration(in m<sup>2</sup>/s)<br>(Outward Stroke / Return Stroke</th><th>Jerk(in m<sup>3</sup>/s)<br>(Outward Stroke / Return Stroke</th></tr>
					    <tr><th>SHM</th><td>({{ iNxj4eu[1] }} / {{ iNxj4eu[2] }})</td><td>({{ iNxj4eu[3] }} / {{ iNxj4eu[4] }})</td><td>({{ iNxj4eu[5] }} / {{ iNxj4eu[6] }})</td></tr>
					    <tr><th>Uniform Accleration and retardation</th><td>({{ iNxj4eu[7] }} / {{ iNxj4eu[8] }})</td><td>({{ iNxj4eu[9] }} / {{ iNxj4eu[10] }})</td><td>(0/0)</td></tr>
					    <tr><th>Cycloidal Motion</th><td>({{ iNxj4eu[11] }} / {{ iNxj4eu[12] }})</td><td>({{ iNxj4eu[13] }} / {{ iNxj4eu[14] }})</td><td>({{ iNxj4eu[15] }} / {{ iNxj4eu[16] }})</td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
var myApp=angular.module("machinedesign",[]);
myApp.controller("myTomB",function ($scope,$http,$window) { $scope.enterData=true;
$scope.submitLin=function(){ $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.linData }).then(function (response){ var data = response.data;  if(data.error){ } else{ $scope.hanVz7y=data.para.hanVz7y; } }); };
$scope.submitFree=function(){ $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.freeData }).then(function (response){ var data = response.data;  if(data.error){ } else{ $scope.hNazi5t=data.para.hNazi5t; } }); };
$scope.submitCam=function(){ $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.camData }).then(function (response){ var data = response.data;  if(data.error){ } else{ $scope.iNxj4eu=data.para.iNxj4eu; } }); }; });
</script>