<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myBearings">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Materials</b></h1><br><br>
			<h4>Materials are backbone of any structure as making of any mechanical element requires material. Exploring different materials, it's types and properties is discussed in this section.<br><br>(NOTE: This content is for education and understanding purpose.)</h4><br>
			<div class="text-center">
				<h1 class="mt-2 mb-4 contentheader p-2"><b>Cast Iron</b></h1>
				<div class="table-responsive-sm">
					<table class="table table-responsive-sm shadow mb-5 bg-body">
						<thead>
							<form align="center" method="POST">
								<input type="hidden" name="token" ng-model="matData.token" ng-init="matData.token='<?php echo $_SESSION['_token']; ?>'">	
								<input type="hidden" ng-model="matData.type" ng-init="matData.type='MAT'">
								<tr><th colspan="4">Cast Iron is an alloy of iron and carbon with carbon content more than 2%.</th></tr>
								<tr><th colspan="4">Strength ({{ matData.kamZ1ql }} N/mm<sup>2</sup>)<br><br><input class="form-control head slider" type="range" min="100" max="1000" step="50" ng-model="matData.kamZ1ql" ng-change="submitMat()"></th></tr>
								<tr><th colspan="3">Material Name</th><th>Designation</th></tr>
							</form>
							</thead>
							<tbody><tr><th>{{ Palmz1k[0] }} Cast Iron</th><th colspan="2">{{ Palmz1k[5] }}(Ultimate Tensile Strength)</th><th>{{ Palmz1k[5] }}{{ Palmz1k[10] }}</th></tr><tr><th>{{ Palmz1k[1] }} Cast Iron</th><th colspan="2">{{ Palmz1k[6] }}(Minimum Tensile Strength)</th><th>{{ Palmz1k[6] }}{{ Palmz1k[10] }}</th></tr><tr><th>{{ Palmz1k[2] }} Cast Iron</th><th colspan="2">{{ Palmz1k[7] }}(Minimum Tensile Strength)</th><th>{{ Palmz1k[7] }}{{ Palmz1k[10] }}</th></tr><tr><th>{{ Palmz1k[3] }} Cast Iron</th><th colspan="2">{{ Palmz1k[8] }}(Minimum Tensile Strength)</th><th>{{ Palmz1k[8] }}{{ Palmz1k[10] }}</th></tr><tr><th>{{ Palmz1k[4] }} Cast Iron</th><th colspan="2">{{ Palmz1k[9] }}(Minimum Tensile Strength/Minimum Elongation in %)</th><th>{{ Palmz1k[9] }}({{ Palmz1k[10] }}/2)</th></tr></tbody>
					</table>
				</div><br><br>
				<div class="row">
					<div class="col-sm-6 mt-5">
					    <h1 class="mt-2 mb-2"><b>Advantage</b></h1>
						<table class="table table-responsive-sm shadow mb-5 bg-body">
							<thead><tr><th>Cast Iron is available easily in large scale.</th></tr><tr><th>It can be casted easily and hence complex shape can be made out of it.</th></tr><tr><th>It has higher compressive strength compared to mild steel.</th></tr><tr><th>It has higher ability to damp vibration making it suitable for frame,housing.</th></tr><tr><th>It has resistance to wear making it lasting longer.</th></tr></thead>
						</table>
					</div>
					<div class="col-sm-6 mt-5">
					    <h1 class="mt-2 mb-2"><b>Disadvantage</b></h1>
						<table class="table table-responsive-sm shadow mb-5 bg-body">
							<thead><tr><th>Cast Iron has very poor tensile strength.</th></tr><tr><th>It is brittle in nature so slight impact can break it.</th></tr><tr><th>It has poor machinability.</th></tr></thead>
						</table>
					</div>
				</div><br><br>
				<h1 class="mt-2 mb-4 contentheader p-2"><b>Steel</b></h1>
				<div class="table-responsive-sm">
					<table class="table shadow mb-5 bg-body">
						<thead><tr><th colspan="4">Steel is an alloy of iron and carbon with carbon content less than 2%.</th></tr>
						<tr><th colspan="4">Plain steel without chemical compositon</th></tr>
					    <tr><th colspan="3">Material Name</th><th>Designation</th></tr></thead>
						<tbody><tr><th>On basis of minimum tensile strength</th><th colspan="2">Fe(Minimum Tensile Strength)</th><th>Fe{{ Palmz1k[10] }}</th></tr><tr><th>On basis of minimum yield strength</th><th colspan="2">FeE(Minimum Tensile Strength)</th><th>FeE{{ Palmz1k[10] }}</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Plain carbon steel</th></tr><tr bgcolor="#07eda0"><th colspan="4">Carbon ({{ ccValue }} %)<br><br><input class="form-control head slider" type="range" min="0.05" max="0.9" step="0.05" ng-model="ccValue"></th></tr><tr bgcolor="#07eda0"><th colspan="4">Manganese ({{ mcValue }} %)<br><br><input class="form-control head slider" type="range" min="0.1" max="0.9" step="0.1" ng-model="mcValue"></th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Method</th><th>Type</th><th>Designation</th></tr><tr><th colspan="2">(Carbon Content*100)C(Manganese Content*10)</th><th><span ng-if="ccValue<=0.3">Low Carbon Steel</span><span ng-if="((ccValue>0.3) && (ccValue<=0.55))">Medium Carbon Steel</span><span ng-if="ccValue>0.55">High Carbon Steel</span></th><th>{{ ccValue*100 }}C{{ mcValue*10 }}</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Free cutting steel<br>(NOTE: Sulphur added in this steel which makes it machinable.)</th></tr><tr bgcolor="#07eda0"><th colspan="4">Sulphur ({{ scValue }} %)<br><br><input class="form-control head slider" type="range" min="0.01" max="0.9" step="0.01" ng-model="scValue"></th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Method</th><th>Type</th><th>Designation</th></tr><tr><th colspan="2">(Carbon Content*100)C(Manganese Content*10)S(Sulphur Content*100)</th><th><span ng-if="ccValue<=0.3">Low Carbon Steel</span><span ng-if="((ccValue>0.3) && (ccValue<=0.55))">Medium Carbon Steel</span><span ng-if="ccValue>0.55">High Carbon Steel</span></th><th>{{ ccValue*100 }}C{{ mcValue*10 }}S{{ scValue*100 }}</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Alloy steel<br>(NOTE: There are lots of alloy steel combination possible so below are two examples.)</th></tr><tr class="text-light" bgcolor="#0a0a0a"><th>Method</th><th colspan="3">Explanation</th></tr><tr><th>40Cr13Mo10V2</th><th colspan="3">First part is carbon content which is 0.4 %, second is (13/4)= 3% approx. chromium, then (10/10)=1% molybdenum and last (2/10)=0.2% vanadium.</th></tr><tr><th>30Ni16Cr4</th><th colspan="3">First part is carbon content which is 0.3 %, second is (16/4)= 4% nickel, then (4/4)=1% chromium and last (2/10)=0.2% vanadium.</th></tr><tr><th>Cr, Si, Ni, Mn,Co</th><th colspan="3">This alloying elements have factor of 4 i.e to get percentage of this elements you have to divide by 4.</th></tr><tr><th>V, Cu, Ti, Mo,Al</th><th colspan="3">This alloying elements have factor of 10 i.e to get percentage of this elements you have to divide by 10.</th></tr></tbody>
					</table>
				</div><br><br>
				<h1 class="mt-2 mb-2"><b>Facts</b></h1>
				<table class="table table-responsive-sm shadow mb-5 bg-body">
					<thead><tr><th>Low carbon steel are more ductile compared to medium and high carbon steel.</th></tr><tr><th>Increase in carbon content reduces ductility but increases toughness.</th></tr><tr><th>Higher carbon content makes it difficult for welding.</th></tr><tr><th>For forging have low carbon content as it is soft and ductile.</th></tr><tr><th>As carbon content increase the tensile strength of steel increases due to tight structure but low ductility.</th></tr></thead>
				</table>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
var myApp=angular.module("machinedesign",[]);
myApp.controller("myBearings",function ($scope,$http,$window) { $scope.Math=Math;
    $scope.submitMat=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/inventory?token=<?php echo $_SESSION['_token'] ?>", data:$scope.matData }).then(function (response){ var data = response.data; if(data.error){ } else{  $scope.Palmz1k=data.para.Palmz1k; } }); }; });
</script>