<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myBearings">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Bearings</b></h1><br><br>
			<h4>Bearing is a mechanical element that permits relative motion between two parts, with minimum friction, for example the shaft and the housing. Bearing are important part of any mechanical system so knowing about it and selecting proper bearing is discussed in this section.</h4><br>
			<div class="text-center mb-5 p-3">
				<h1 class="mt-2 mb-4 contentheader p-2"><b>Designation</b></h1>
				<div class="table-responsive-sm">
					<table class="table shadow mb-5 bg-body">
						<thead><tr><th colspan="3"><b>NOTE</b><ol><li>First number is bearing type.</li><li>Second number is type of load.</li><li>Last two digit represent diameter.</li></ol></th></tr></thead>
						<tbody><tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">Bearing Number</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">1<sup>st</sup> getting bearing number</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th>Type</th><th colspan="2">Name</th></tr><tr><th>2</th><th colspan="2">Self-Aligning Ball Bearing</th></tr><tr><th>3</th><th colspan="2">Double Row Anglular Contact Bearing</th></tr><tr><th>6</th><th colspan="2">Deep Groove Ball Bearing</th></tr><tr><th>7</th><th colspan="2">Single Row Anglular Contact Bearing</th></tr><tr><th>NU22</th><th colspan="2">Cylindrical Roller Bearing</th></tr><tr><th>22</th><th colspan="2">Spherical Roller Bearing</th></tr><tr><th>31</th><th colspan="2">Taper Roller Bearing</th></tr><tr><th>32</th><th colspan="2">Taper Roller Bearing</th></tr><tr><th>51</th><th colspan="2">Single Thrust Ball Bearing</th></tr><tr><th>52</th><th colspan="2">Double Thrust Ball Bearing</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">2<sup>nd</sup> getting load type</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th>Type</th><th colspan="2">Name</th></tr><tr><th>0</th><th colspan="2">extra light duty load application</th></tr><tr><th>2</th><th colspan="2">light duty load application</th></tr><tr><th>3</th><th colspan="2">medium duty load application</th></tr><tr><th>4</th><th colspan="2">heavy duty load application</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">3<sup>rd</sup> getting bearing diameter</th></tr><tr bgcolor="#07eda0"><th colspan="4">Select inner diameter<br><br>
						<form align="center" method="POST">
					        <input type="hidden" name="token" ng-model="bnData.token" ng-init="bnData.token='<?php echo $_SESSION['_token']; ?>'">
					        <input type="hidden" ng-model="bnData.type" ng-init="bnData.type='BN'">
							<input class="form-control head slider" type="range" min="0" max="50" ng-model="bnData.kaMzu8s" ng-change="submitBn()">
						</form></th></tr>
						<tr class="text-light" bgcolor="#0a0a0a"><th>Designation</th><th colspan="2">Value (in mm)</th></tr><tr><th>{{ jaNzme3[0] }}</th><th colspan="2">{{ jaNzme3[1] }}</th></tr></tbody>
					</table>
				</div><br><br>
				<h1 class="mt-2 mb-4 contentheader p-2"><b>Selection of bearing</b></h1>
				<div class="table-responsive-sm">
					<table class="table table-responsive-sm shadow mb-5 bg-body">
						<thead>
							<form align="center" method="POST">
					    		<input type="hidden" name="token" ng-model="bearingData.token" ng-init="bearingData.token='<?php echo $_SESSION['_token']; ?>'">
					    		<input type="hidden" ng-model="bearingData.type" ng-init="bearingData.type='bear'">
							    <tr bgcolor="#4287f5"><th colspan="2">Axial Load ({{ bearingData.sjkaM2k }} N)</th><th colspan="2"><input type="number" ng-model="bearingData.sjkaM2k" placeholder="Enter Force in N" class="form-control"  ng-change="submitBearing()"></th></tr>
								<tr bgcolor="#4287f5"><th colspan="2">Radial Load({{ bearingData.isDml7a }} N)</th><th colspan="2"><input type="number" ng-model="bearingData.isDml7a" placeholder="Enter Force in N" class="form-control"  ng-change="submitBearing()"></th></tr>
								<tr bgcolor="#4287f5"><th colspan="2">RPM({{ bearingData.oalPt3y }})</th><th colspan="2"><input type="number" ng-model="bearingData.oalPt3y" placeholder="Enter RPM" class="form-control"  ng-change="submitBearing()"></th></tr>
								<tr bgcolor="#4287f5"><th colspan="4">No. of working years ({{ bearingData.jakQlo0 }})<br><br><input class="form-control head slider" type="range" min="1" max="12" ng-model="bearingData.jakQlo0"  ng-change="submitBearing()"></th></tr>
								<tr bgcolor="#4287f5"><th colspan="4">No. of working days in year({{ bearingData.lYix3ra }} days)<br><br><input class="form-control head slider" type="range" min="100" max="365" ng-model="bearingData.lYix3ra"  ng-change="submitBearing()"></th></tr>
								<tr bgcolor="#4287f5"><th colspan="4">No. of hrs working / day ({{ bearingData.jakBnd2 }} hr/s)<br><br><input class="form-control head slider" type="range" min="1" max="24" ng-model="bearingData.jakBnd2"  ng-change="submitBearing()"></th></tr>
								<tr bgcolor="#4287f5"><th colspan="4">Service factor ({{ bearingData.wknbx6S }})<br><br><input class="form-control head slider" type="range" min="1" max="2" step="0.1" ng-model="bearingData.wknbx6S"  ng-change="submitBearing()"></th></tr>
								<tr bgcolor="#4287f5"><th colspan="4">Reliability ({{ bearingData.gdFks8a }} %)<br><br><input class="form-control head slider" type="range" min="90" max="100" ng-model="bearingData.gdFks8a"  ng-change="submitBearing()"></th></tr>
							</form>
						</thead>
						<tbody><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameters</th><th colspan="2">Values</th></tr><tr><th colspan="2">Life in hrs</th><th colspan="2">{{ ahJs2w1[0] }}</th></tr><tr><th colspan="2">Life in million revolution(mr)</th><th colspan="2">{{ ahJs2w1[1] }}</th></tr><tr><th colspan="2">Life for {{ bearingData.gdFks8a }} % reliability in mr</th><th colspan="2">{{ ahJs2w1[2] }}</th></tr><tr ng-if="(((bearingData.sjkaM2k)!=null) && ((bearingData.isDml7a)!=null) && ((bearingData.oalPt3y)!=null))"><th>Allowable inner diameter Bearings</th><th colspan="3"><span ng-repeat="l in gsdh4Ks">[{{ l }}] </span></th></tr><tr ng-if="(((bearingData.sjkaM2k)!=null) && ((bearingData.isDml7a)!=null) && ((bearingData.oalPt3y)!=null))"><th>Allowable outer diameter Bearings</th><th colspan="3"><span ng-repeat="p in Skco3kh">[{{ p }}]</span></th></tr></tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
 	var myApp=angular.module("machinedesign",[]); 
    myApp.controller("myBearings",function ($scope,$http,$window) {
        $scope.submitBearing=function(){ $http({  method:"POST", url:"asset/simplejoint/bearings?token=<?php echo $_SESSION['_token'] ?>", data:$scope.bearingData }).then(function (response){ var data = response.data; if(data.error){ }else{ $scope.ahJs2w1=data.para.ahJs2w1; $scope.gsdh4Ks=data.para.gsdh4Ks;  $scope.Skco3kh=data.para.Skco3kh; }  }); };
        $scope.submitBn=function(){ $http({  method:"POST", url:"asset/simplejoint/bearings?token=<?php echo $_SESSION['_token'] ?>", data:$scope.bnData }).then(function (response){ var data = response.data; if(data.error){ }else{ $scope.jaNzme3=data.para.jaNzme3; }  }); }; });
</script>