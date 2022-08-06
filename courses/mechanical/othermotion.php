<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="physics" ng-controller="myMotion">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container text-center mt-2 mb-2">
			<div class="table-responsive-sm mt-5">
				<table class="table table-light shadow mb-5 bg-body">
					<thead><tr><th colspan="4">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#frmo">Frictional Motion</a><th><a class="btn place_content p-2" href="#ucm">Uniform Circular Motion</a></th></tr></thead>
				</table>
			</div>
			<h1 class="animated fadeIn display-2 contentheader mt-5"><b>Simple Harmonic Motion</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
					<thead>
					<form align="center" method="POST">
						<input type="hidden" name="token" ng-model="shmData.token" ng-init="shmData.token='<?php echo $_SESSION['_token']; ?>'">
						<input type="hidden" ng-model="shmData.type" ng-init="shmData.type='SHM'">
						<tr><th colspan="4">(NOTE: The SHM starts from right side. Conditions are ideal with no air drag, smooth surface.)</th></tr>
						<tr><th colspan="4">If object has an amplitude  of {{ palMn2k[1] }} cm, angular frequency of  {{ ahJs2w1[0] }} rad/s and phase angle of {{ palMn2k[0] }}°.</th></tr>
						<tr><th>Amplitude ({{ shmData.dhJak7i }} cm)</th><th colspan="2"><input class="form-control" type="number" ng-model="shmData.dhJak7i" placeholder="Enter Amplitude in cm" ng-change="submitSHM()"></th></tr>
						<tr><th>Constant (k)({{ shmData.fzopla3 }} N/m)</th><th colspan="2"><input class="form-control" type="number" ng-model="shmData.fzopla3" placeholder="Enter Stiffness in N/m" ng-change="submitSHM()"></th></tr>
						<tr><th>Mass ({{ shmData.mla9woP }} kg)</th><th colspan="2"><input class="form-control" type="number" ng-model="shmData.mla9woP" placeholder="Enter Mass in kg" ng-change="submitSHM()"></th></tr>
						<tr><th colspan="3">Phase Angle ({{ shmData.kAlem4r }}°)<br><br><input class="form-control head slider" type="range" min="0" max="360" ng-model="shmData.kAlem4r" ng-change="submitSHM()"><br>(INFO: Initial starting point angle.)<br></th></tr>
					</thead>
					<tbody ng-if="((shmData.dhJak7i>0) && (shmData.fzopla3>0) && (shmData.mla9woP>0))">
						<tr class="text-light" bgcolor="#0a0a0a"><th>Parameters</th><th colspan="2">Value</th></tr>
						<tr><th>Starting Point</th><td colspan="2">{{ ahJs2w1[8] }}</td></tr>
						<tr><th>Displacement Equation(x)(in cm)</th><td colspan="2">{{ ahJs2w1[1] }}</td></tr>
						<tr><th>Velocity Equation(v)(in cm/s)</th><td colspan="2">{{ ahJs2w1[2] }}</td></tr>
						<tr><th>Accleration Equation(a)(in cm<sup>2</sup>/s)</th><td colspan="2">{{ ahJs2w1[3] }}</td></tr>
						<tr><th>Maximum Velocity(in cm/s)</th><td colspan="2">{{ ahJs2w1[4] }}</td></tr>
						<tr><th>Maximum Accleration(in cm<sup>2</sup>/s)</th><td colspan="2">{{ ahJs2w1[5] }}</td></tr>
						<tr><th>Angular Frequency (w)(in rad/s)</th><td colspan="2">{{ ahJs2w1[0] }}</td></tr>
						<tr><th>Frequency (f)(in Hz)</th><td colspan="2">{{ ahJs2w1[6] }}</td></tr>
						<tr><th>Time Period (T)(in s)</th><td colspan="2">{{ ahJs2w1[7] }}</td></tr>
					</tbody>
				</table>
			</div>
			<div class="table-responsive-sm">	            
				<table class="table shadow bg-body" ng-if="((shmData.dhJak7i>0) && (shmData.fzopla3>0) && (shmData.mla9woP>0))">
					<thead><tr><th colspan="3">Analyzing motion on above entered parameters</th></tr><tr><th colspan="3">Vary time<br><br><input class="form-control head slider" type="range" min="0" max="{{ ahJs2w1[7] }}" step="{{ ahJs2w1[7]/100 }}" ng-model="shmData.nMz3j" ng-change="submitSHM()"></th></tr>
					</form></thead>
					<tbody><tr class="text-light" bgcolor="#0a0a0a"><th>Parameters(at {{ aMzk[0] }} s)</th><th colspan="2">Values<br>(Total Time:{{ ahJs2w1[7] }} s)</th></tr><tr><th>Displacement (in cm)<br>(NOTE: -ve sign indicate object is on left side of center point and +ve sign indicate object is on right side.)</th><td>{{ aMzk[1] }}</td></tr><tr><th>Velocity (in cm/s)<br>(NOTE: -ve sign indicate velocity is opposite side of motion and vice-versa.)</th><td>{{ aMzk[2] }}</td></tr><tr><th>Accleration(in cm<sup>2</sup>/s)<br>(NOTE: -ve sign indicate accleration is opposite side of motion and vice-versa.)</th><td>{{ aMzk[3] }}</td></tr><tr><th>Force Value(in N)<br>(NOTE: -ve sign indicate force is opposite side of motion and vice-versa.)</th><td>{{ aMzk[4] }}</td></tr><tr><th>Kinetic Energy(in J)<br>(NOTE: -ve sign indicate force is opposite side of motion and vice-versa.)</th><td>{{ aMzk[5] }}</td></tr><tr><th>Potential Energy(in J)<br>(NOTE: -ve sign indicate force is opposite side of motion and vice-versa.)</th><td>{{ aMzk[6] }}</td></tr></tbody>
				</table>
			</div>
			<h1 class="animated fadeIn display-2 contentheader mt-5" id="frmo"><b>Frictional Motion</b></h1><br>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
					<thead>
					<form align="center" method="POST">
					    <input type="hidden" name="token" ng-model="fmData.token" ng-init="fmData.token='<?php echo $_SESSION['_token']; ?>'">	
					    <input type="hidden" ng-model="fmData.type" ng-init="fmData.type='fm'">
					    <tr><th>Weight of body ({{ fmData.ksIak3l }} N)</th><th colspan="2"><input class="form-control" type="number" ng-model="fmData.ksIak3l" placeholder="Enter Weight in N"  ng-change="submitFM()"></th></tr>
					    <tr><th>Force applied on body ({{ fmData.Rkaml9i }} N)</th><th colspan="2"><input class="form-control" type="number" ng-model="fmData.Rkaml9i" placeholder="Enter Force in N"  ng-change="submitFM()"></th></tr>
					    <tr><th colspan="3">Coefficient of static friction ({{ fmData.mSowl3r }})<br><br><input class="form-control head slider" type="range" min="0.02" max="1" step="0.01" ng-model="fmData.mSowl3r" ng-change="submitFM()"></th></tr>
					    <tr><th colspan="3">Coefficient of kinetic friction ({{ fmData.jkdsJn3 }})<br><br><input class="form-control head slider" type="range" min="0.01" max="{{ (fmData.mSowl3r*1.00)-0.01 }}" step="0.01" ng-model="fmData.jkdsJn3" ng-change="submitFM()"></th></tr>
					    <tr><th colspan="3">Angle ({{ fmData.Fhan8it }}°)<br><br><input class="form-control head slider" type="range" min="0" max="90" ng-model="fmData.Fhan8it" ng-change="submitFM()"></th></tr>
					</form>
					</thead>
					<tbody ng-if="((fmData.ksIak3l>0) && (fmData.Rkaml9i>0))">
					    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="3"><img src="images/fr1.PNG" class="img-fluid img-thumbnail" alt="..."><br>Scenario <br>(NOTE: Static friction is greater than kinetic friction.)</th></tr><tr><th colspan="3">{{ kjakGh2[0] }}</th></tr>
					    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="3"><img src="images/fr2.PNG" class="img-fluid img-thumbnail" alt="..."><br>Scenario</th></tr><tr><th colspan="3">{{ kjakGh2[1] }}</th></tr>
					</tbody>
				</table><br>
			</div>
			<h1 class="animated fadeIn display-2 contentheader mb-5" id="ucm"><b>Uniform Circular Motion</b></h1>
			<div class="table-responsive-sm">
				<table class="table shadow mb-5 bg-body">
					<thead>
					<form align="center" method="POST">
					    <input type="hidden" name="token" ng-model="ucmData.token" ng-init="ucmData.token='<?php echo $_SESSION['_token']; ?>'">
					    <input type="hidden" ng-model="ucmData.type" ng-init="ucmData.type='UCM'">
					    <tr><th>RPM ({{ ucmData.Hajmn2i }})</th><th colspan="2"><input class="form-control" type="number" ng-model="ucmData.Hajmn2i" placeholder="Enter RPM" ng-change="submitUCM()"></th></tr><tr bgcolor="#4287f5"><th>Radius ({{ ucmData.kMal9is }} m)</th><th colspan="2"><input class="form-control" type="number" ng-model="ucmData.kMal9is" placeholder="Enter Radius in m" ng-change="submitUCM()"></th></tr><tr bgcolor="#4287f5"><th>Mass ({{ ucmData.gwTya8u }} kg)</th><th colspan="2"><input class="form-control" type="number" ng-model="ucmData.gwTya8u" placeholder="Enter Mass in kg" ng-change="submitUCM()"></th></tr>
					</thead>
					<tbody ng-if="((ucmData.Hajmn2i>0) && (ucmData.kMal9is>0) && (ucmData.gwTya8u>0))">
						<tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">Horizontal Motion</th></tr>
					    <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th colspan="2">Value</th></tr>
						<tr><th>Angular frequency(in rad/s)</th><td colspan="2">{{ ksJe3li[0] }}</td></tr><tr><th>Frequency(in Hz)</th><td colspan="2">{{ ksJe3li[1] }}</td></tr><tr><th>Velocity(in m/s)</th><td colspan="2">{{ ksJe3li[2] }}</td></tr><tr><th>Centripetal accleration(in m/s<sup>2</sup>)</th><td colspan="2">{{ ksJe3li[3] }}</td></tr><tr><th>Tangential accleration(in m/s<sup>2</sup>)</th><td colspan="2">0</td></tr><tr><th>Centripetal/Centrifugal force(in N</th><td colspan="2">{{ ksJe3li[4] }}</td></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">Vertical Circular Motion</th></tr>
						<tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">Angle ({{ ucmData.iAdnk8e }}°)<br><br><input class="form-control head slider" type="range" min="0" max="180" ng-model="ucmData.iAdnk8e" ng-change="submitUCM()"><br><br>(NOTE: Angle starts from down with vertical, object moving anticlockwise.)</th></tr>
					    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">Tension/Reaction (in N)</th></tr>
					    <tr><th rowspan="3">with (g= 10 m/s<sup>2</sup>)</th><td colspan="2">Weight Component= {{ uNaki8l[0] }}</td></tr>
					    <tr><td colspan="2">Centrifugal Component= {{ ksJe3li[4] }}</td></tr><tr><td colspan="2">Tension/Reaction = {{ uNaki8l[1] }}</td></tr><tr><th rowspan="3">with (g= 9.81 m/s<sup>2</sup>)</th><td colspan="2">Weight Component= {{ uNaki8l[2] }}</td></tr><tr><td colspan="2">Centrifugal Component = {{ ksJe3li[4] }}</td></tr><tr><td colspan="2">Tension/Reaction = {{ uNaki8l[3] }}</td></tr>
						<tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">If car moving on circular road <br>Coefficient of static friction = ({{ ucmData.jkA4irT }})<br><br><input class="form-control head slider" type="range" min="0" max="1" step="0.01" ng-model="ucmData.jkA4irT" ng-change="submitUCM()"></th></tr>
					    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">Turning Veloctiy (Radius = {{ ucmData.kMal9is }} m)</th></tr>
					    <tr><th>with (g= 10 m/s<sup>2</sup>)</th><td colspan="2">{{ ksJe3li[5] }} m/s</td></tr>
					    <tr><th>with (g= 9.81 m/s<sup>2</sup>)</th><td colspan="2">{{ ksJe3li[6] }} m/s</td></tr>
					    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">If car moving on banked circular road <br>Banking angle ({{ ucmData.hsUim3e }}°)<br><br><input class="form-control head slider" type="range" min="0" max="90" ng-model="ucmData.hsUim3e" ng-change="submitUCM()"></th></tr><tr><th>with (g= 10 m/s<sup>2</sup>)</th><td colspan="2">{{ ksJe3li[7] }}</td></tr><tr><th>with (g= 9.81 m/s<sup>2</sup>)</th><td colspan="2">{{ ksJe3li[8] }}</td></tr>
					</tbody>
					</form>
				</table><br>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
var myApp=angular.module("physics",[]);
    myApp.controller("myMotion",function ($scope,$http,$window) {
        $scope.submitSHM=function(){  $http({  method:"POST", url:"asset/motion/other?token=<?php echo $_SESSION['_token'] ?>", data:$scope.shmData }).then(function (response){ var data = response.data; if(data.error){ }  else{ $scope.ahJs2w1=data.para.ahJs2w1;  $scope.aMzk=data.para.aMzk; } }); };
	    $scope.submitFM=function(){ $http({  method:"POST", url:"asset/motion/other?token=<?php echo $_SESSION['_token'] ?>", data:$scope.fmData }).then(function (response){ var data = response.data; if(data.error){ }  else{ $scope.kjakGh2=data.para.kjakGh2; } }); };
	    $scope.submitUCM=function(){ $http({  method:"POST", url:"asset/motion/other?token=<?php echo $_SESSION['_token'] ?>", data:$scope.ucmData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.ksJe3li=data.para.ksJe3li;	$scope.uNaki8l=data.para.uNaki8l; }
	            }); }; });
</script>