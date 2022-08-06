<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?></head>
<body ng-app="fluidmechanics" ng-controller="myFluidB">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<div ng-show="enterData">
				<h2 class="mt-5 mb-5">Hello User, this section discusses about the basics of Fluid Mechanics, before getting into flow of fluids lets get glimpse of some basics first.</h2>
				<div class="table-responsive-sm text-center">
					<table class="table table-light shadow mb-5 bg-body">
						<thead><tr><th colspan="5">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#getvisc">Viscosity</a></th><th><a class="btn place_content p-2" href="#st">Surface Tension</a></th><th><a class="btn place_content p-2" href="#hp">Hydostatic Pressure</a></th><th><a class="btn place_content p-2" href="#pv">Pressure Variation</a></th></tr><tr><th><a class="btn place_content p-2" href="#equi">Equillibrium</a></th><th><a class="btn place_content p-2" href="#bouyancy">Bouyancy</a></th><th><a class="btn place_content p-2" href="#fo">Floating Oscillation</a></th></tr></thead>
					</table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2"><b>Terms</b></h1>
				<div class="table-responsive-sm text-center">
					<table class="table table-responsive-sm shadow mb-5 bg-body">
					    <thead>
					    <form align="center" method="POST">
					    <input type="hidden" ng-model="termData.token" ng-init="termData.token='<?php echo $_SESSION['_token']; ?>'">
						<input type="hidden" ng-model="termData.type" ng-init="termData.type='TERM'">
					    <tr><th colspan="2">Mass ({{ termData.uMne3aq }} g)</th><th colspan="2"><input type="number" ng-model="termData.uMne3aq" placeholder="Enter mass in g" class="form-control" ng-change="submitTerm()"></th></tr>
						<tr><th colspan="2">Volume ({{ termData.kmZn3oq }}) cm<sup>3</sup></th><th colspan="2"><input type="number" ng-model="termData.kmZn3oq" placeholder="Enter Volume" class="form-control" ng-change="submitTerm()"></th></tr>
					    </thead>
						<tbody ng-if="((termData.uMne3aq>0) && (termData.kmZn3oq>0))">
					        <tr class="text-light" bgcolor="#0a0a0a"><th>Term</th><th colspan="3">Formula and Value</th></tr>
						    <tr><th>{{ ijMzn5e[0] }}</th><td colspan="3">({{ ijMzn5e[1] }})<br><br>{{ ijMzn5e[2] }}<br>{{ ijMzn5e[3] }}</td></tr>
						    <tr><th>{{ ijMzn5e[4] }}</th><td colspan="3">({{ ijMzn5e[5] }})<br><br>{{ ijMzn5e[6] }}<br>{{ ijMzn5e[7] }}</td></tr>
						    <tr><th>{{ ijMzn5e[8] }}</th><td colspan="3">({{ ijMzn5e[9] }})<br><br>{{ ijMzn5e[10] }}<br>{{ ijMzn5e[11] }}</td></tr><tr><th>{{ ijMzn5e[12] }}</th><td colspan="3">({{ ijMzn5e[13] }})<br><br>{{ ijMzn5e[14] }}</td></tr>
						</tbody>
					</table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="getvisc"><b>Viscosity</b></h1>
				<div class="table-responsive-sm text-center">
				    <table class="table shadow mb-5 bg-body">
				        <thead><tr><th colspan="4">Temperature ({{ termData.iKlam7s }} °C)<br><br><input class="form-control head slider" type="range" min="0" max="273" ng-model="termData.iKlam7s" ng-change="submitTerm()"></th></tr></form></thead>
					    <tbody><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Fluid</th><th colspan="2">Viscosity( in Ns/m<sup>2</sup>) / Viscosity( in Poise)</th></tr><tr><th colspan="2">Water</th><td colspan="2">{{ uSmxo5p[0] }} <br>/<br> {{ uSmxo5p[1] }}</td></tr><tr><th colspan="2">Air</th><td colspan="2">{{ uSmxo5p[2] }} <br>/<br> {{ uSmxo5p[3] }}</td></tr></tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="st"><b>Surface Tension</b></h1>
				<div class="table-responsive-sm text-center">
				    <table class="table shadow mb-5 bg-body">
				        <thead>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="stData.token" ng-init="stData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="stData.type" ng-init="stData.type='ST'">
				            <tr><th colspan="2">Surface Tension ({{ stData.uNzm2is }} N/m)</th><td colspan="2"><input class="form-control" type="number" ng-model="stData.uNzm2is" placeholder="Enter Surface Tension" ng-change="submitSt()"></td></tr>
				            <tr><th colspan="2">Diameter ({{ stData.alzP2ry }} mm)</th><td colspan="2"><input class="form-control" type="number" ng-model="stData.alzP2ry" placeholder="Enter diameter in mm" ng-change="submitSt()"></td></tr>
				       </thead>
					    <tbody ng-if="((stData.uNzm2is>0) && (stData.alzP2ry>0))">
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Shape</th><th colspan="2">Pressure Intensity(N/m² or Pascal(Pa))</th></tr><tr><th colspan="2">Liquid Droplet</th><td colspan="2">{{ eKmx6sy[0] }}</td></tr><tr><th colspan="2">Hollow Bubble</th><td colspan="2">{{ eKmx6sy[1] }}</td></tr><tr><th colspan="2">Liquid Jet(Cylindrical)</th><td colspan="2">{{ eKmx6sy[2] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4"><p>Capillary Rise/Depression<br>(NOTE : This phenomenon occurs due to surface tension of fluid and angle of contact which decides wether liquid should rise or fall, also desnity of fluid also plays important role here.)<br><br>Facts : 1. Mercury with density 13.6X10<sup>3</sup> has angle of contact 140° with glass.<br>2. Water with density 10<sup>3</sup> has angle of contact 90° with silver.<br>3. Milk with density 1027 has angle of contact almost 20° with glass.</p></th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Surface Tension of liquid = {{ eKmx6sy[3] }} N/m</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Diameter of Tube = {{ eKmx6sy[4] }} mm</th></tr>
				            <tr bgcolor="#07eda0"><th colspan="4">Angle of Contact ({{ stData.isNzm2e }} °)<br><br><input class="form-control head slider" type="range" min="0" max="180" ng-model="stData.isNzm2e" ng-change="submitSt()"></th></tr>
				            <tr bgcolor="#07eda0"><th colspan="2">Density ({{ stData.kmZn3wi }} kg/m<sup>3</sup>)</th><td colspan="2"><input class="form-control" type="number" ng-model="stData.kmZn3wi" placeholder="Enter density" ng-change="submitSt()"></td></tr>
				            <tr bgcolor="#07eda0"><th colspan="4">Acceleration due to gravity ({{ stData.enXm2sk }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="stData.enXm2sk" ng-change="submitSt()"></th></tr>
				        </form>
				            <tr ng-if="(stData.kmZn3wi>0)"><th colspan="2">Rise or Fall(in mm)<br>( with g = 9.81 m/s²)</th><td colspan="2">{{ rtHn2os[0] }}</td></tr><tr ng-if="(stData.kmZn3wi>0)"><th colspan="2">Rise or Fall(in mm)<br>( with g = {{ (stData.enXm2sk) }} m/s²)</th><td colspan="2">{{ rtHn2os[1] }}</td></tr>
					    </tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="hp"><b>Hydrostatic Pressure</b></h1>
				<div class="table-responsive-sm text-center">
				    <table class="table shadow mb-5 bg-body">
				        <thead><tr><th colspan="4">NOTE: Hydrostatic pressure is product of accleration due to gravity, density and depth inside liquid so as the depth increases hydrostatic pressure increases.)</th></tr>
				            <form align="center" method="POST">
				            <input type="hidden" ng-model="hpData.token" ng-init="hpData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="hpData.type" ng-init="hpData.type='HP'">
				            <tr><th colspan="2">Depth ({{ hpData.rMz5osx }} mm)</th><td colspan="2"><input class="form-control" type="number" ng-model="hpData.rMz5osx" placeholder="Enter depth in mm" ng-change="submitHp()"></td></tr><tr><th colspan="4">Acceleration due to gravity ({{ hpData.osKmz2f }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="hpData.osKmz2f" ng-change="submitHp()"></th></tr>
				        </thead>
					    <tbody ng-if="(hpData.rMz5osx>0)">
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Fluid</th><th>Pressure Intensity(N/m² or Pascal(Pa))<br>(with g = 9.81 m/s²)</th><th>Pressure Intensity(N/m² or Pascal(Pa))<br>(with g = {{ hpData.osKmz2f }} m/s²)</th></tr>
					        <tr><th colspan="2">Water(Fresh)</th><td>{{ uSkm7yi[0] }}</td><td>{{ uSkm7yi[1] }}</td></tr>
					        <tr><th colspan="2">Water(Salt)</th><td>{{ uSkm7yi[2] }}</td><td>{{ uSkm7yi[3] }}</td></tr>
					        <tr><th colspan="2">Air</th><td>{{ uSkm7yi[4] }}</td><td>{{ uSkm7yi[5] }}</td></tr>
					        <tr><th colspan="2">Helium</th><td>{{ uSkm7yi[6] }}</td><td>{{ uSkm7yi[7] }}</td></tr>
					        <tr><th colspan="2">Ice</th><td>{{ uSkm7yi[8] }}</td><td>{{ uSkm7yi[9] }}</td></tr>
					        <tr><th colspan="2">Cooking Oil</th><td>{{ uSkm7yi[10] }}</td><td>{{ uSkm7yi[11] }}</td></tr>
					        <tr><th colspan="2">Wood</th><td>{{ uSkm7yi[12] }}</td><td>{{ uSkm7yi[13] }}</td></tr>
				            <tr><th colspan="2">Glycerol</th><td>{{ uSkm7yi[14] }}</td><td>{{ uSkm7yi[15] }}</td></tr>
				            <tr><th colspan="2">Concrete</th><td>{{ uSkm7yi[16] }}</td><td>{{ uSkm7yi[17] }}</td></tr>
				            <tr><th colspan="2">Mercury</th><td>{{ uSkm7yi[18] }}</td><td>{{ uSkm7yi[19] }}</td></tr>
				            <tr><th colspan="2">Silver</th><td>{{ uSkm7yi[20] }}</td><td>{{ uSkm7yi[21] }}</td></tr>
				            <tr><th colspan="2">Gold</th><td>{{ uSkm7yi[22] }}</td><td>{{ uSkm7yi[23] }}</td></tr>
				            <tr><th colspan="2">Uranium</th><td>{{ uSkm7yi[24] }}</td><td>{{ uSkm7yi[25] }}</td></tr>
				            <tr bgcolor="#07eda0"><th colspan="2">Density ({{ hpData.gDjs4ol }} kg/m<sup>3</sup>)</th><td colspan="2"><input class="form-control" type="number" ng-model="hpData.gDjs4ol" placeholder="Enter Density" ng-change="submitHp()"></td></tr>
				            </form>
				            <tr ng-if="(hpData.gDjs4ol>0)"><th colspan="2">Pressure Intensity(N/m² or Pascal(Pa))<br>(with g = 9.81 m/s²)</th><td colspan="2">{{ ilaMn3t[0] }}</td></tr><tr ng-if="(hpData.gDjs4ol>0)"><th colspan="2">Pressure Intensity(N/m² or Pascal(Pa))<br>(with g = {{ hpData.gDjs4ol }} m/s²)</th><td colspan="2">{{ ilaMn3t[1] }}</td></tr>
					    </tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="pv"><b>Pressure Variation</b></h1>
				<div class="table-responsive-sm text-center">
				    <table class="table shadow mb-5 bg-body">
				        <thead><tr><td colspan="4">NOTE: In compressible fluids pressure and temperature change which changes density further used for calculation in various sectors.</tr>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="pvData.token" ng-init="pvData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="pvData.type" ng-init="pvData.type='PV'">
				            <tr><th>Reference Pressure ({{ pvData.iqMzn4o }}) (in N/m² or Pascal(Pa))</th><td colspan="3"><input class="form-control" type="number" ng-model="pvData.iqMzn4o" placeholder="Enter Pressure" ng-change="submitPv()"></td></tr>
				            <tr><th>Temperature ({{ pvData.wMzn3pa }} °C)</th><td colspan="3"><input class="form-control" type="number" ng-model="pvData.wMzn3pa" placeholder="Enter Temperature" ng-change="submitPv()"></td></tr>
				            <tr><th>Height ({{ pvData.Palm7dj }} m)</th><td colspan="3"><input class="form-control" type="number" min="0" ng-model="pvData.Palm7dj" placeholder="Enter height in m" ng-change="submitPv()"></td></tr>
				            <tr><th colspan="4">Acceleration due to gravity ({{ pvData.uwLmx5f }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="pvData.uwLmx5f" ng-change="submitPv()"></th></tr>
				        </thead>
				        <tbody ng-if="((pvData.iqMzn4o>0) && (pvData.Palm7dj>0) && (pvData.Palm7dj<29400) && (eImx8so[0]>0))">
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Condition</th><th>g = 9.81 m/s²</th><th>g = {{ pvData.uwLmx5f }} m/s²</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Isothermal Process</th></tr>
					        <tr><th colspan="2">Pressure (in N/m² or Pascal(Pa))<br>If Height taken above ground</th><td>{{ eImx8so[1] }}</td><td>{{ eImx8so[2] }}</td></tr><tr><th colspan="2">Pressure (in N/m² or Pascal(Pa))<br>If depth taken below ground</th><td>{{ eImx8so[3] }}</td><td>{{ eImx8so[4] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Adiabatic Process</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Adiabatic Constant = {{ pvData.djMx1ks }}<br><br><input class="form-control head slider" type="range" min="1" max="2" step="0.01" ng-model="pvData.djMx1ks" ng-change="submitPv()"></th></tr>
				        </form>
					    	<tr><th colspan="2">Pressure (in N/m² or Pascal(Pa))<br>If Height taken above ground</th><td>{{ eImx8so[5] }}</td><td>{{ eImx8so[6] }}</td></tr><tr><th colspan="2">Pressure (in N/m² or Pascal(Pa))<br>If depth taken below ground</th><td>{{ eImx8so[7] }}</td><td>{{ eImx8so[8] }}</td></tr><tr><th colspan="2">Temperature Lapse Rate (in °C/m)<br>(Lapse rate is the rate at which temperature decreases with increase in height)</th><td>-(0.035791163*(({{ eImx8so[9] }}-1)/{{ eImx8so[9] }}))</td><td>-(({{ eImx8so[0] }}/274.09)*(({{ eImx8so[9] }}-1)/{{ eImx8so[9] }}))</td></tr>
					    </tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="equi"><b>Equillibirum</b></h1>
				<div class="table-responsive-sm text-center">
				    <table class="table shadow mb-5 bg-body">
					    <tbody><tr class="text-light" bgcolor="#0a0a0a"><th>Equillibrium</th><th>Floating Body</th><th>Sub-merged Body</th></tr><tr><th>For Stability</th><th>Metacentre should be above Center of Gravity</th><th>Center of Gravity should be below Center of Bouyancy</th></tr><tr><th>For Unstability</th><th>Metacentre should be below Center of Gravity</th><th>Center of Gravity should be above Center of Bouyancy</th></tr><tr><th>Nuetral Case</th><th>Metacentre should be at same position of Center of Gravity</th><th>Center of Gravity should be at same position of Center of Bouyancy</th></tr></tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="bouyancy"><b>Bouyancy</b></h1>
				<div class="table-responsive-sm text-center">
				    <table class="table shadow mb-5 bg-body">
				        <thead>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="bouData.token" ng-init="bouData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="bouData.type" ng-init="bouData.type='BOU'">
				            <tr><th colspan="4">Density of Body ({{ bouData.eKmz8el }} g/cm<sup>3</sup>)<br><br><input class="form-control head slider" type="range" min="1" max="20" step="0.2" ng-model="bouData.eKmz8el" ng-change="submitBou()"></th></tr>
				            <tr><th colspan="4">Density of Liquid ({{ bouData.mnzL2ws }} g/cm<sup>3</sup>)<br><br><input class="form-control head slider" type="range" min="1" max="20" step="0.1" ng-model="bouData.mnzL2ws" ng-change="submitBou()"></th></tr>
				            <tr><th>Volume ({{ bouData.qPlm4nx }})</th><td colspan="3"><input class="form-control" type="number" min="0" ng-model="bouData.qPlm4nx" placeholder="Enter Volume" ng-change="submitBou()"></td></tr>
				        </thead>
				        <tbody ng-if="(bouData.qPlm4nx>0)"><tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Result</th></tr><tr><td colspan="4">{{ hnzJk3o[0] }}</td></tr></tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="fo"><b>Floating Oscillation</b></h1>
				<div class="table-responsive-sm text-center">
				    <table class="table shadow mb-5 bg-body">
				        <thead>
				            <tr><th colspan="4">NOTE: For getting time period of oscillation first the floating body should be stable and for that Metacentre should be above Center of Gravity (e.g. Boat floating on water.)</th></tr>
				            <tr bgcolor="#4287f5"><th>Metacentric Height ({{ bouData.kMal2xi }} cm)</th><td colspan="3"><input class="form-control" type="number" ng-model="bouData.kMal2xi" placeholder="Enter height in cm" ng-change="submitBou()"></td></tr>
				            <tr bgcolor="#4287f5"><th>Radius of gyration ({{ bouData.l9zmWqo }} mm)</th><td colspan="3"><input class="form-control" type="number" ng-model="bouData.l9zmWqo" placeholder="Enter radius in mm" ng-change="submitBou()"></td></tr>
				            <tr bgcolor="#4287f5"><th colspan="4">Acceleration due to gravity ({{ bouData.eolNx4b }} m/s<sup>2</sup>)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="bouData.eolNx4b" ng-change="submitBou()"></th></tr>
				        </form>
				        </thead>
				        <tbody ng-if="((bouData.kMal2xi>0) && (bouData.l9zmWqo>0))"><tr><th colspan="2">Time Period(in s)<br>(with g = 9.81 m/s²</th><td colspan="2">{{ jnZm3eo[0] }}</td></tr><tr><th colspan="2">Time Period(in s)<br>(with g = {{ bouData.eolNx4b }} m/s²</th><td colspan="2">{{ jnZm3eo[1] }}</td></tr></tbody>
				    </table>
				</div>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
 var myApp=angular.module("fluidmechanics",[]);
        myApp.controller("myFluidB",function ($scope,$http,$window) { $scope.enterData=true;
            $scope.submitTerm=function(){
            $http({  method:"POST", url:"asset/exponentialsmoothing/fluid?token=<?php echo $_SESSION['_token'] ?>", data:$scope.termData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.ijMzn5e=data.para.ijMzn5e;	$scope.uSmxo5p=data.para.uSmxo5p; } }); };
            $scope.submitBou=function(){
            $http({  method:"POST", url:"asset/exponentialsmoothing/fluid?token=<?php echo $_SESSION['_token'] ?>", data:$scope.bouData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.hnzJk3o=data.para.hnzJk3o; $scope.jnZm3eo=data.para.jnZm3eo; } }); };
            $scope.submitHp=function(){
            $http({  method:"POST", url:"asset/exponentialsmoothing/fluid?token=<?php echo $_SESSION['_token'] ?>", data:$scope.hpData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.uSkm7yi=data.para.uSkm7yi; $scope.ilaMn3t=data.para.ilaMn3t; } }); };
            $scope.submitSt=function(){
            $http({  method:"POST", url:"asset/exponentialsmoothing/fluid?token=<?php echo $_SESSION['_token'] ?>", data:$scope.stData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.eKmx6sy=data.para.eKmx6sy;  $scope.rtHn2os=data.para.rtHn2os; } }); };
            $scope.submitPv=function(){
            $http({  method:"POST", url:"asset/exponentialsmoothing/fluid?token=<?php echo $_SESSION['_token'] ?>",data:$scope.pvData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.eImx8so=data.para.eImx8so; } }); };
    	});
</script>