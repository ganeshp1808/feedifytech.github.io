<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="machinedesign" ng-controller="myHelicalDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Helical Gear</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Gears are used to transmit large power with help of gear teeth engagement. Gears are widely used in short distance and smooth transmission. So, helical gears are type of gears where teeth are inclined to shaft axis.</h4><br>
				<h4>As a engineer you can put helical gear where you have to transmit large power through short distance with high efficiency. All the Best to create your own application.</h4> <br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design helical gear to transmit <b>power of {{ helixData.skw3mSQ }} W</b>, with considering <b> {{ helixData.jshjd9C }} RPM</b> drive.</h1></div>
				<div class="container text-center designdone p-3 shadow mb-5 bg-body">
				    <h1>Enter the parameters</h1><br>
				    <form align="center" method="POST">
				        <input type="hidden" name="token" ng-model="helixData.token" ng-init="helixData.token='<?php echo $_SESSION['_token']; ?>'"> 
				        <div class="row">
				            <div class="col-sm-4"><input type="number" ng-model="helixData.skw3mSQ" placeholder="Enter Power to be transmitted in W" class="form-control" ng-change="submitHelix()"><br></div>
				        	<div class="col-sm-4"><select class="form-control" ng-model="helixData.jsLams2" ng-change="submitHelix()"><option value="">Select Material</option><option value="1">FG150</option><option value="2">FG220</option><option value="3">FG350</option><option value="4">WM400</option><option value="5">BM320</option><option value="6">PM500</option><option value="7">SG500/7</option><option value="8">30C8</option><option value="9">C45</option><option value="10">40Ni10Cr3Mo6</option><option value="11">40Ni10Cr3Mo28</option><option value="12">30Ni4Cr1</option><option value="13">35Ni1Cr60</option><option value="14">Alluminium Alloy</option><option value="15">Polyamide Nylon Plastic</option><option value="16">Wood</option><option value="17">Brass</option><option value="18">Copper</option></select><br></div>
				            <div class="col-sm-4"><input type="number" ng-model="helixData.jshjd9C" placeholder="Enter RPM" class="form-control" ng-change="submitHelix()"><br></div>
				        </div>
				</div>
				<div class="text-center mb-5" ng-if="((helixData.skw3mSQ>0) && (helixData.jsLams2>0) && (helixData.jshjd9C>0))">
				    <h1 class="mb-4 contentheader p-2"><b>Analysis Done</b></h1><br>
				    <div class="table-responsive-sm">
				    	<table class="table shadow mb-5 bg-body">
					        <thead>
					            <tr><th colspan="3">Service Factor {{ helixData.sMn2B }}<br><br><input class="form-control head slider" type="range" min="1" max="4" step="0.1" ng-model="helixData.sMn2B" ng-change="submitHelix()"></th></tr>
					            <tr><th colspan="3">Velocity Ratio ({{ helixData.j9Kax }}) (NOTE: Helical Gear has velocity ratio limit to 8.)<br><br><input class="form-control head slider" type="range" min="1" max="8" ng-model="helixData.j9Kax" ng-change="submitHelix()"></th></tr>
					            <tr><th colspan="3">Helix Angle ({{ helixData.qHz }}°) <br><br><input class="form-control head slider" type="range" min="15" max="45" ng-model="helixData.qHz" ng-change="submitHelix()"></th></tr>
					            <tr><th colspan="3">FoS ({{ helixData.xMe6y }}) <br><br><input class="form-control head slider" type="range" min="1" max="5" step="0.1" ng-model="helixData.xMe6y" ng-change="submitHelix()"></th></tr>
					            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="3">Select Standard System</th></tr>
					            <tr><th><input class="form-check-input" type="radio" ng-model="helixData.aMb4g" value="1" ng-change="submitHelix()"><br><br>14.5° Full Depth Involute</th><th><input class="form-check-input" type="radio" ng-model="helixData.aMb4g" value="2" ng-change="submitHelix()"><br><br>20° Full Depth Involute</th><th><input class="form-check-input" type="radio" ng-model="helixData.aMb4g" value="3" ng-change="submitHelix()"><br><br>20° Stub Involute</th></tr>
					        </thead>	
					        <tbody ng-if="((helixData.skw3mSQ>0) && (helixData.jsLams2>0) && (helixData.jshjd9C>0) && (helixData.aMb4g>0))">
					            <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th colspan="2">Values</th></tr><tr><th>Design Power</th><td colspan="2">{{ aJb2dd[0] }}</td></tr><tr><th>Output RPM</th><td colspan="2">{{ aJb2dd[1] }}</td></tr><tr><th>Torque trasmitted (N-mm)</th><td colspan="2">{{ aJb2dd[2] }}</td></tr><tr><th>Design bending stress (N/mm<sup>2</sup>)</th><td colspan="2">{{ aJb2dd[3] }}</td></tr><tr><th>Design Contact stress (N/mm<sup>2</sup>)</th><td colspan="2">{{ aJb2dd[4] }}</td></tr><tr><th colspan="3">NOTE<br><br>{{ aJb2dd[5] }}</th></tr>
					            <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th>Pinion</th><th>Gear</th></tr>
					            <tr><th>Pressure Angle</th><td colspan="2">{{ aJb2dd[6] }}</td></tr>
					            <tr><th>Number of teeth<br>(Note: 1 hunting tooth added for gear)</th><td>{{ aJb2dd[7] }}</td><td>{{ aJb2dd[8] }}</td></tr><tr><th>Virtual Number of teeth</th><td>{{ aJb2dd[9] }}</td><td>{{ aJb2dd[10] }}</td></tr>
					            <tr><th>Lewis form factor</th><td>{{ aJb2dd[11] }}</td><td>{{ aJb2dd[12] }}</td></tr>
					            <tr><th colspan="3">{{ aJb2dd[13] }}</th></tr><tr bgcolor="#07eda0"><th colspan="3">(b/m) = {{ helixData.gF2b }}<br><br><input class="form-control head slider" type="range" min="7" max="12" ng-model="helixData.gF2b" ng-change="submitHelix()"></th></tr>
					    </form>
					            <tr><th colspan="3">{{ aJb2dd[14] }}</th></tr><tr><th>Transverse Module(m<sub>t</sub>)(in mm)</th><td colspan="2">{{ aJb2dd[15] }}</td></tr><tr><th>Face Width(b)(in mm)</th><td colspan="2">{{ aJb2dd[16] }}</td></tr>
					            <tr><th>Velocity (in m/s)</th><td colspan="2">{{ aJb2dd[17] }}</td></tr>
					            <tr><th colspan="3">{{ aJb2dd[18] }}</th></tr><tr><th colspan="3">{{ aJb2dd[19] }}</th></tr>
					            <tr><th>Center Distance between gear(a)(in mm)</th><td colspan="2">{{ aJb2dd[20] }}</td></tr>
					            <tr><th>Addendum(h<sub>a</sub>) / Dedendum(h<sub>f</sub>)</th><td colspan="2">{{ aJb2dd[21] }} mm / {{ aJb2dd[22] }} mm</td></tr><tr><th>Clearance(c)</th><td colspan="2">{{ aJb2dd[23] }} mm</td></tr>
					            <tr><th>Working Depth(h<sub>k</sub>) / Whole Depth(h)</th><td colspan="2">{{ aJb2dd[24] }} mm / {{ aJb2dd[25] }} mm</td></tr><tr><th>Tooth Thickness(s)</th><td colspan="2">{{ aJb2dd[26] }} mm</td></tr><tr><th>Pitch Circle Diameter</th><td>{{ aJb2dd[27] }} mm</td><td> {{ aJb2dd[28] }} mm</td></tr><tr><th>Tip(or Outer) Diameter</th><td>{{ aJb2dd[29] }} mm</td><td> {{ aJb2dd[30] }} mm</td></tr><tr><th>Root(or Base) Diameter </th><td>{{ aJb2dd[31] }} mm </td><td> {{ aJb2dd[32] }} mm</td></tr><tr><th>Construction</th> <td>{{ aJb2dd[33] }}</td><td>{{ aJb2dd[34] }}</td></tr><tr bgcolor="#07eda0"><th>Force Analysis</th><th>When pinion is driver</th><th>When gear is driver</th></tr><tr><th>Tangential Force(F<sub>t</sub>)</th><td>{{ aJb2dd[35] }}</td><td>{{ aJb2dd[38] }}</td></tr><tr><th>Radial Force(F<sub>r</sub>)</th><td>{{ aJb2dd[36] }}</td><td>{{ aJb2dd[39] }}</td></tr><tr><th>Resultant(F<sub>n</sub>)</th><td>{{ aJb2dd[37] }}</td><td>{{ aJb2dd[40] }}</td></tr>
						    </tbody>
						</table><br><br><br>
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
myApp.controller("myHelicalDesign",function ($scope,$http,$window) { $scope.enterData=true;
	$scope.submitHelix=function(){  $http({ method:"POST", url:"asset/gears/helix?token=<?php echo $_SESSION['_token'] ?>", data:$scope.helixData }).then(function (response){ var data = response.data; if(data.error){ } else{   $scope.enterData=true; $scope.aJb2dd=data.para.aJb2dd; } }); }; });
</script>