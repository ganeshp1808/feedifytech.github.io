<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="machinedesign" ng-controller="myBevelDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Bevel Gear</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Gears are used to transmit large power with help of gear teeth engagement. Gears are widely used in short distance and smooth transmission. So, bevel gears are type of gears where shaft intersect at angle known as shaft angle. Power is transmitted at angle of intersected shafts.</h4><br>
				<h4>As a engineer you can put bevel gear where you have to transmit large power through short distance with high efficiency. All the Best to create your own application.</h4><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design bevel gear to transmit <b>power of {{ bevelData.skw3mSQ }} W</b>, with considering <b> {{ bevelData.jshjd9C }} RPM</b> drive.</h1></div>
				<div class="container text-center designdone p-3 shadow mb-5 bg-body">
				    <h1>Enter the parameters</h1><br>
				    <form align="center" method="POST">
				        <input type="hidden" name="token" ng-model="bevelData.token" ng-init="bevelData.token='<?php echo $_SESSION['_token']; ?>'">
				        <div class="row">
				            <div class="col-sm-4"><input type="number" ng-model="bevelData.skw3mSQ" placeholder="Enter Power to be transmitted in W" class="form-control" ng-change="submitBevel()"><br></div>
				            <div class="col-sm-4"><select class="form-control" ng-model="bevelData.jsLams2" ng-change="submitBevel()"><option value="">Select Material</option><option value="1">FG150</option><option value="2">FG220</option><option value="3">FG350</option><option value="4">WM400</option><option value="5">BM320</option><option value="6">PM500</option><option value="7">SG500/7</option><option value="8">30C8</option><option value="9">C45</option><option value="10">40Ni10Cr3Mo6</option><option value="11">40Ni10Cr3Mo28</option><option value="12">30Ni4Cr1</option><option value="13">35Ni1Cr60</option><option value="14">Alluminium Alloy</option><option value="15">Polyamide Nylon Plastic</option><option value="16">Wood</option><option value="17">Brass</option><option value="18">Copper</option></select><br></div>
				            <div class="col-sm-4"><input type="number" ng-model="bevelData.jshjd9C" placeholder="Enter RPM" class="form-control" ng-change="submitBevel()"><br></div>
				        </div>
				</div>
				<div class="text-center mb-5" ng-if="((bevelData.skw3mSQ>0) && (bevelData.jsLams2>0) && (bevelData.jshjd9C>0))">
				    <h1 class="mb-4 contentheader p-2"><b>Analysis Done</b></h1><br>
				    <table class="table table-responsive-sm shadow mb-5 bg-body">
				        <thead>
				            <tr><th colspan="3">Service Factor {{ bevelData.sMn2B }}<br><br><input class="form-control head slider" type="range" min="1" max="4" step="0.1" ng-model="bevelData.sMn2B" ng-change="submitBevel()"></th></tr>
				            <tr><th colspan="3">Velocity Ratio ({{ bevelData.j9Kax }}) (NOTE: Straight Bevel Gear has velocity ratio limit to 5.)<br><br><input class="form-control head slider" type="range" min="1" max="5" ng-model="bevelData.j9Kax" ng-change="submitBevel()"></th></tr>
				            <tr><th colspan="3">FoS ({{ bevelData.xMe6y }}) <br><br><input class="form-control head slider" type="range" min="1" max="5" step="0.1" ng-model="bevelData.xMe6y" ng-change="submitBevel()"></th></tr>
				            <tr><th colspan="3">Shaft Angle ({{ bevelData.aKj }} °) <br><br><input class="form-control head slider" type="range" min="15" max="165" ng-model="bevelData.aKj" ng-change="submitBevel()"></th></tr>
				            <tr><th colspan="3">Select Standard System</th></tr>
				            <tr><th><input class="form-check-input" type="radio" ng-model="bevelData.aMb4g" value="1" ng-change="submitBevel()"><br><br>14.5° Full Depth Involute</th><th><input class="form-check-input" type="radio" ng-model="bevelData.aMb4g" value="2" ng-change="submitBevel()"><br><br>20° Full Depth Involute</th><th><input class="form-check-input" type="radio" ng-model="bevelData.aMb4g" value="3" ng-change="submitBevel()"><br><br>20° Stub Involute</th></tr>
				        </thead>
				        <tbody ng-if="((bevelData.skw3mSQ>0) && (bevelData.jsLams2>0) && (bevelData.jshjd9C>0) && (bevelData.aMb4g>0))">
				            <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th colspan="2">Values</th></tr>
				            <tr><th>Design Power</th><td colspan="2">{{ Jxzgg3X[0] }}</td></tr><tr><th>Output RPM</th><td colspan="2">{{ Jxzgg3X[1] }}</td></tr><tr><th>Torque trasmitted (N-mm)</th><td colspan="2">{{ Jxzgg3X[2] }}</td></tr><tr><th>Design bending stress (N/mm<sup>2</sup>)</th><td colspan="2">{{ Jxzgg3X[3] }}</td></tr><tr><th>Design Contact stress (N/mm<sup>2</sup>)</th><td colspan="2">{{ Jxzgg3X[4] }} </td></tr><tr><th>Semi Pitch Cone angle of pinion</th><td colspan="2">{{ Jxzgg3X[5] }} °</td></tr><tr><th>Semi Pitch Cone angle of gear</th><td colspan="2">{{ Jxzgg3X[6] }} °</td></tr><tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th>Pinion</th><th>Gear</th></tr><tr><th colspan="3">NOTE<br><br>{{ Jxzgg3X[7] }}</th></tr><tr><th>Pressure Angle</th><td colspan="2">{{ Jxzgg3X[8] }}</td></tr><tr><th>Number of teeth<br>(Note: 1 hunting tooth added for gear)</th><td>{{ Jxzgg3X[9] }}</td><td>{{ Jxzgg3X[10] }}</td></tr><tr><th>Virtual Number of teeth</th><td>{{ Jxzgg3X[11] }}</td><td>{{ Jxzgg3X[12] }}</td></tr><tr><th>Lewis form factor</th><td>{{ Jxzgg3X[13] }}</td><td>{{ Jxzgg3X[14] }}</td></tr><tr><th colspan="3">{{ Jxzgg3X[15] }}</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="3">(b/m) = {{ bevelData.gF2b }}<br><br><input class="form-control head slider" type="range" min="7" max="12" ng-model="bevelData.gF2b" ng-change="submitBevel()"></th></tr>
				    </form>
				            <tr><th colspan="3">{{ Jxzgg3X[16] }}</th></tr>
					        <tr><th>Transverse Module (m<sub>t</sub>)(in mm)</th><td colspan="2">{{ Jxzgg3X[17] }}</td></tr>
					        <tr><th>Face Width(b) (in mm)</th><td colspan="2">{{ Jxzgg3X[18] }}</td></tr><tr><th>Velocity (in m/s)</th><td colspan="2">{{ Jxzgg3X[19] }}</td></tr><tr><th>Cone Distance (in mm)</th><td colspan="2">{{ Jxzgg3X[20] }}</td></tr><tr><th colspan="3">{{ Jxzgg3X[21] }}</th></tr><tr><th colspan="3">{{ Jxzgg3X[22] }}</th></tr><tr><th>Addendum(h<sub>a</sub>) / Dedendum(h<sub>f</sub>)</th><td colspan="2">{{ Jxzgg3X[23] }} mm / {{ Jxzgg3X[24] }} mm</td></tr><tr><th>Clearance(c)</th><td colspan="2">{{ Jxzgg3X[25] }} mm</td></tr><tr><th>Working Depth(h<sub>k</sub>)</th><td colspan="2">{{ Jxzgg3X[26] }} mm</td></tr><tr><th>Addendum Angle</th><td colspan="2">{{ Jxzgg3X[27] }} °</td></tr><tr><th>Dedendum Angle</th><td colspan="2">{{ Jxzgg3X[28] }} °</td></tr><tr><th>Tip Angle</th><td colspan="2">{{ Jxzgg3X[29] }} °</td></tr><tr><th>Root Angle</th><td colspan="2">{{ Jxzgg3X[30] }} °</td></tr><tr><th>Pitch Circle Diameter(in mm)</th><td>{{ Jxzgg3X[31] }}</td><td> {{ Jxzgg3X[32] }}</td></tr><tr><th>Root(or Base) Diameter(in mm)</th><td>{{ Jxzgg3X[33] }}</td><td>{{ Jxzgg3X[34]  }}</td></tr><tr><th>Tip(or Outer) Diameter (in mm)</th><td>{{ Jxzgg3X[35] }}</td><td>{{ Jxzgg3X[36] }}</td></tr><tr><th>Construction</th><td>{{ Jxzgg3X[37] }}</td><td>{{ Jxzgg3X[38] }}</td></tr><tr bgcolor="#07eda0"><th>Force Analysis</th><th>When pinion is driver</th><th>When gear is driver</th></tr><tr><th>Tangential Force(F<sub>t</sub>)</th><td>{{ Jxzgg3X[39] }}</td><td>{{ Jxzgg3X[40] }}</td></tr><tr><th>Radial Force(F<sub>r</sub>)</th><td>{{ Jxzgg3X[41] }}</td><td>{{ Jxzgg3X[42] }}</td></tr><tr><th>Resultant(F<sub>n</sub>)</th><td>{{ Jxzgg3X[43] }}</td><td>{{ Jxzgg3X[44] }}</td></tr>
				        </tbody>
				    </table><br><br><br>
				</div>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
var myApp=angular.module("machinedesign",[]);
myApp.controller("myBevelDesign",function ($scope,$http,$window) { $scope.enterData=true;
 	$scope.submitBevel=function(){ $http({ method:"POST",  url:"asset/gears/bevel?token=<?php echo $_SESSION['_token'] ?>", data:$scope.bevelData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.enterData=true; $scope.Jxzgg3X=data.para.Jxzgg3X; } }); }; });
</script>