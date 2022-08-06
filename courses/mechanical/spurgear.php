<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="machinedesign" ng-controller="mySpurDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Spur Gear</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Gears are used to transmit large power with help of gear teeth engagement. Gears are widely used in short distance and smooth transmission. So, spur gears are type of gears where teeth are parallel to shaft axis.</h4><br>
				<h4>As a engineer you can put spur gear where you have to transmit large power through short distance with high efficiency. All the Best to create your own application.</h4><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design spur gear to transmit <b>power of {{ spurData.skw3mSQ }} W</b>, with considering <b> {{ spurData.jshjd9C }} RPM</b> drive.</h1></div>
				<div class="container text-center designdone p-3 shadow mb-5 bg-body">
				    <h1>Enter the parameters</h1><br>
				    <form align="center" method="POST">
				        <input type="hidden" name="token" ng-model="spurData.token" ng-init="spurData.token='<?php echo $_SESSION['_token']; ?>'">
				        <div class="row">
				            <div class="col-sm-4"><input type="number" ng-model="spurData.skw3mSQ" placeholder="Enter Power to be transmitted in W" class="form-control" ng-change="submitSpur()"><br></div>
				            <div class="col-sm-4"><select class="form-control" ng-model="spurData.jsLams2" ng-change="submitSpur()"><option value="">Select Material</option><option value="1">FG150</option><option value="2">FG220</option><option value="3">FG350</option><option value="4">WM400</option><option value="5">BM320</option><option value="6">PM500</option><option value="7">SG500/7</option><option value="8">30C8</option><option value="9">C45</option><option value="10">40Ni10Cr3Mo6</option><option value="11">40Ni10Cr3Mo28</option><option value="12">30Ni4Cr1</option><option value="13">35Ni1Cr60</option><option value="14">Alluminium Alloy</option><option value="15">Polyamide Nylon Plastic</option><option value="16">Wood</option><option value="17">Brass</option><option value="18">Copper</option></select><br></div>
				            <div class="col-sm-4"><input type="number" ng-model="spurData.jshjd9C" placeholder="Enter RPM" class="form-control" ng-change="submitSpur()"><br></div>
				        </div>
				</div>
				<div class="text-center mb-5" ng-if="((spurData.skw3mSQ>0) && (spurData.jsLams2>0) && (spurData.jshjd9C>0))">
				    <h1 class="mb-4 contentheader p-2"><b>Analysis Done</b></h1><br>
				    <div class="table-responsive-sm ">
				    	<table class="table shadow mb-5 bg-body">
					        <thead>
					            <tr><th colspan="3">Service Factor {{ spurData.sMn2B }}<br><br><input class="form-control head slider" type="range" min="1" max="4" step="0.1" ng-model="spurData.sMn2B" ng-change="submitSpur()"></th></tr>
					            <tr><th colspan="3">Velocity Ratio ({{ spurData.j9Kax }}) (NOTE: Spur Gear has velocity ratio limit to 5.)<br><br><input class="form-control head slider" type="range" min="1" max="5" ng-model="spurData.j9Kax" ng-change="submitSpur()"></th></tr>
					            <tr><th colspan="3">FoS ({{ spurData.xMe6y }}) <br><br><input class="form-control head slider" type="range" min="1" max="5" step="0.1" ng-model="spurData.xMe6y" ng-change="submitSpur()"></th></tr>
					            <tr><th colspan="3">Select Standard System</th></tr>
					            <tr bgcolor="#4287f5"><th><input class="form-check-input" type="radio" ng-model="spurData.aMb4g" value="1" ng-change="submitSpur()"><br><br>14.5° Full Depth Involute</th><th><input class="form-check-input" type="radio" ng-model="spurData.aMb4g" value="2" ng-change="submitSpur()"><br><br>20° Full Depth Involute</th><th><input class="form-check-input" type="radio" ng-model="spurData.aMb4g" value="3" ng-change="submitSpur()"><br><br>20° Stub Involute</th></tr>
					        </thead>
					        <tbody ng-if="((spurData.skw3mSQ>0) && (spurData.jsLams2>0) && (spurData.jshjd9C>0) && (spurData.aMb4g>0))">
					            <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th colspan="2">Values</th></tr><tr><th>Design Power</th><td colspan="2">{{ F3jc[0] }}</td></tr><tr><th>Output RPM</th><td colspan="2">{{ F3jc[1] }}</td></tr><tr><th>Torque trasmitted (N-mm)</th><td colspan="2">{{ F3jc[2] }}</td></tr><tr><th>Design bending stress (N/mm<sup>2</sup>)</th><td colspan="2">{{ F3jc[3] }}</td></tr><tr><th>Design Contact stress (N/mm<sup>2</sup>)</th><td colspan="2">{{ F3jc[4] }}</td></tr><tr><th colspan="3">NOTE<br><br>{{ F3jc[5] }}</th></tr>
					            <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th>Pinion</th><th>Gear</th></tr><tr><th>Pressure Angle</th><td colspan="2">{{ F3jc[6] }}</td></tr><tr><th>Number of teeth<br>(Note: 1 hunting tooth added for gear)</th><td>{{ F3jc[7] }}</td><td>{{ F3jc[8] }}</td></tr><tr><th>Lewis form factor</th><td>{{ F3jc[9] }}</td><td>{{ F3jc[10] }}</td></tr><tr><th colspan="3">{{ F3jc[11] }}</th></tr>
						        <tr bgcolor="#07eda0"><th colspan="3">(b/m) = {{ spurData.gF2b }}<br><br><input class="form-control head slider" type="range" min="7" max="12" ng-model="spurData.gF2b" ng-change="submitSpur()"></th></tr>
					    </form>
					            <tr><th colspan="3">{{ F3jc[12] }}</th></tr><tr><th>Face Width(b) (in mm)</th><td colspan="2">{{ F3jc[13] }}</td></tr><tr><th>Velocity (in m/s)</th><td colspan="2">{{ F3jc[14] }}</td></tr><tr><th colspan="3">{{ F3jc[15] }}</th></tr><tr><th colspan="3">{{ F3jc[16] }}</th></tr><tr><th>Center Distance between gear(a)(in mm)</th><td colspan="2">{{ F3jc[17] }}</td></tr><tr><th>Addendum(h<sub>a</sub>) / Dedendum(h<sub>f</sub>)</th><td colspan="2">{{ F3jc[18] }} mm / {{ F3jc[19] }} mm</td></tr><tr><th>Clearance(c)</th><td colspan="2">{{ F3jc[20] }} mm</td></tr><tr><th>Working Depth(h<sub>k</sub>) / Whole Depth(h)</th><td colspan="2">{{ F3jc[21] }} mm / {{ F3jc[22] }} mm</td></tr><tr><th>Tooth Thickness(s)</th><td colspan="2">{{ F3jc[23] }} mm</td></tr>
					            <tr><th>Pitch Circle Diameter</th><td>{{ F3jc[24] }} mm</td><td> {{ F3jc[25] }} mm</td></tr>
					            <tr><th>Tip(or Outer) Diameter</th><td>{{ F3jc[26] }} mm</td><td> {{ F3jc[27] }} mm</td></tr>
					            <tr><th>Root(or Base) Diameter </th><td>{{ F3jc[28] }} mm </td><td> {{ F3jc[29] }} mm</td></tr>
					            <tr><th>Construction</th> <td>{{ F3jc[30] }}</td><td>{{ F3jc[31] }}</td></tr>
					            <tr bgcolor="#07eda0"><th>Force Analysis</th><th>When pinion is driver</th><th>When gear is driver</th></tr>
					            <tr><th>Tangential Force(F<sub>t</sub>)</th><td>{{ F3jc[32] }}</td><td>{{ F3jc[35] }}</td></tr>
					            <tr><th>Radial Force(F<sub>r</sub>)</th><td>{{ F3jc[33] }}</td><td>{{ F3jc[36] }}</td></tr>
					            <tr><th>Resultant(F<sub>n</sub>)</th><td>{{ F3jc[34] }}</td><td>{{ F3jc[37] }}</td></tr>
					        </tbody>
					    </table><br><br>
				    </div>
				    <div class="table-responsive-sm">
				    	<table class="table shadow mb-5 bg-body">
							<thead><tr><th colspan="4">Some service factors example</th></tr><tr><th rowspan="2">Driving Machine</th><th colspan="4">Driven Machine</th></tr><tr><th>Mixer, Ventilator, Final Drive</th><th>Pump, Machine tool drive, Crane Gears</th><th>Heavy feed pump, Drilling, Milling, Press</th></tr></thead><tbody><tr><th>Electric Motor or Gas Turbine</th><th>1</th><th>1.25</th><th>1.75</th></tr><tr><th>Multi Cylinder ICE</th><th>1.25</th><th>1.5</th><th>2.00</th></tr><tr><th>Single Cylinder ICE</th><th>1.5</th><th>1.75</th><th>2.25</th></tr></tbody>
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
 myApp.controller("mySpurDesign",function ($scope,$http,$window) { $scope.enterData=true;
	$scope.submitSpur=function(){
       $http({ method:"POST", url:"asset/gears/spur?token=<?php echo $_SESSION['_token'] ?>", data:$scope.spurData }).then(function (response){  var data = response.data; if(data.error){ }else{  $scope.enterData==true; $scope.F3jc=data.para.F3jc; } }); }; });
</script>