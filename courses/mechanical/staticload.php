<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myLoadDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Static Load</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Static load is applied on the bar of various cross section, how will it effect with different material. Both tension force and compressive force are considered.</h4><br><h4>As a engineer you can put static load where you have to apply to sustain force. All the Best to create your own application.</h4><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design rod for <b>force of {{ forceData.skw3mSQ }} N</b>, with considering <b>factor of safety(FoS) as {{ forceData.zmalYa3 }}</b> and <b>for length {{ forceData.jshjd9C }}</b> mm.</h1></div>
				<div class="container text-center designdone p-3 shadow mb-5 bg-body">
				    <h1>Enter the parameters</h1><br>
				    <form align="center" method="POST">
				        <input type="hidden" name="token" ng-model="forceData.token" ng-init="forceData.token='<?php echo $_SESSION['_token']; ?>'">
				        <div class="row">
				            <div class="col-sm-6"><input type="number" ng-model="forceData.skw3mSQ" placeholder="Enter Force in N" class="form-control"  ng-change="submitForce()"></div><br><br><br>
				            <div class="col-sm-6"><select name="jsLams2" class="form-control" ng-model="forceData.jsLams2" ng-change="submitForce()"><option value="">Select Material</option><option value="1">FG150</option><option value="2">FG220</option><option value="3">FG350</option><option value="4">WM400</option><option value="5">BM320</option><option value="6">PM500</option><option value="7">SG500/7</option><option value="8">30C8</option><option value="9">Stainless Steel(Alloy Steel)</option><option value="10">Alluminium Alloy</option><option value="11">Polyamide Nylon</option><option value="12">Low Density Polyethene</option><option value="13">Brass Cast</option><option value="14">Brass Wrought</option><option value="15">Bronze Cast</option><option value="16">Copper</option><option value="17">Gold</option><option value="18">Human Bone</option><option value="19">Bamboo</option><option value="20">Concrete</option><option value="21">Wood</option></select></div>
				        </div><br>
				        <div class="row justify-content-center">
				        	<div class="col-sm-8"><input type="number" ng-model="forceData.jshjd9C" placeholder="Enter Length more than 10 mm" class="form-control" ng-change="submitForce()"></div>
				        </div>				                	
				</div>
				<div class="text-center mb-5" ng-if="((forceData.skw3mSQ>0) && (forceData.jsLams2>0) && (forceData.jshjd9C>1))">
				    <h1 class="mt-2 mb-4 contentheader p-2"><b>Analysis Done for {{ gsNzm4k[1] }}</b></h1>
					<table class="table table-responsive-sm shadow mb-5 bg-body">
						<thead><tr><th colspan="2">Based on above entered parameter, load applied to the rod may lead to column and strut condition which is discussed below.</th></tr></thead>
				        <tbody><tr class="text-light" bgcolor="#0a0a0a"><th>End Condition for rod</th><th>Maximum Force(in MN)</th></tr><tr><th>Both ends hinged</th><td>{{ eXm8jjj[0] }}</td></tr><tr><th>One end free, One end fixed</th><td>{{ eXm8jjj[1] }}</td></tr><tr><th>One end hinged, One end fixed</th><td>{{ eXm8jjj[2] }}</td></tr><tr><th>Both ends fixed</th><td>{{ eXm8jjj[3] }}</td></tr></tbody>
				    </table><br><br>
				    <div class="table-responsive-sm">
				    	<table class="table shadow mb-5 bg-body">
					    	<thead><tr><th colspan="3">FoS = {{ forceData.zmalYa3 }}<br><br><input class="form-control head slider" type="range" min="1" max="10" ng-model="forceData.zmalYa3" ng-change="submitForce()"></th></tr>
					    </form>
					        	<tr><th>Column / Strut Type</th><td colspan="2">{{ eXm8jjj[4] }}</td></tr><tr><th>Cross Section (in mm)</th><th>for Tension Force</th><th>for Compression Force</th></tr>
					    	</thead>
					        <tbody><tr><th>Extension under own weight</th><td colspan="2">{{ ykMx1oa[0] }}</td></tr><tr><th>Extension under force</th><td>{{ ykMx1oa[1] }}</td><td>{{ ykMx1oa[2] }}</td></tr><tr><th>Strain <br> (Extension/Length)<br>(Unitless quantity)</th><td>{{ ykMx1oa[3] }}</td><td>{{ ykMx1oa[4] }}</td></tr></tr><tr><th>Circular Rod Diameter</th><td>{{ ykMx1oa[5] }}</td><td>{{ ykMx1oa[6] }}</td></tr></tr><tr><th>Hollow Circular Rod (Outer / Inner)</th><td>{{ ykMx1oa[7] }} / {{ ykMx1oa[8] }}</td><td>{{ ykMx1oa[9] }} / {{ ykMx1oa[10] }}</td></tr><tr><th>Square side</th><td>{{ ykMx1oa[11] }}</td><td>{{ ykMx1oa[12] }}</td></tr></tr><tr><th>Rectangle(Length/Breadth)</th><td>{{ ykMx1oa[13] }} / {{ ykMx1oa[14] }}</td><td>{{ ykMx1oa[15] }} / {{ ykMx1oa[16] }}</td></tr><tr><th>Equilateral Triangle side</th><td>{{ ykMx1oa[17] }}</td><td>{{ ykMx1oa[18] }}</td></tr></tr><tr><th>Pentagon Side</th><td>{{ ykMx1oa[19] }}</td><td>{{ ykMx1oa[20] }}</td></tr></tr><tr><th>Hexagon Side</th><td>{{ ykMx1oa[21] }}</td><td>{{ ykMx1oa[22] }}</td></tr></tr><tr><th colspan="3"><img src="images/sload.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>NOTE : In theoretical consideration load is applied at the centroid of shape but in real life case is not like that, load application point may shift from centroid inducing bending stress in bar. But this bending stress can be neglected upto certain limit of eccentricity where direct stress dominates. So combination of all eccentric points where direct stress dominates is known as <b>kernel of section</b>.Below given are the values for eccentricity for every shape <b>below this direct stress dominate</b> and <b>above this both direct and bending stress come into picture</b>.</th></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th>Cross Section (in mm)</th><th>Eccentricity for Tension Force</th><th>Eccentricity for Compression Force</th></tr><tr><th>Circular Rod Eccentricity limit</th><td>{{ klZm4sa[0] }}</td><td>{{ klZm4sa[1] }}</td></tr><tr><th>Square Eccentricity limit</th><td>{{ klZm4sa[2] }}</td><td>{{ klZm4sa[3] }}</td></tr><tr><th>Rectangle Eccentricity(Length/Breadth)</th><td>{{ klZm4sa[4] }} / {{ klZm4sa[5] }}</td><td>{{ klZm4sa[6] }} / {{ klZm4sa[7] }}</td></tr><tr><th>Equilateral Triangle Eccentricity</th><td>{{ klZm4sa[8] }}</td><td>{{ klZm4sa[9] }}</td></tr><tr><th>Pentagon Eccentricity</th><td>{{ klZm4sa[10] }}</td><td>{{ klZm4sa[11] }}</td></tr><tr><th>Hexagon Eccentricity</th><td>{{ klZm4sa[12] }}</td><td>{{ klZm4sa[13] }}</td></tr>
					        </tbody>
					    </table>
				    </div>
				    <div class="row">
				        <div class="col-sm-6 mt-5">
				            <h1 class="mt-2 mb-4 p-2"><b>Material Type</b></h1>
						    <table class="table table-responsive-sm shadow mb-5 bg-body">
						        <thead><tr><th>Material</th><th>Type</th></tr></thead>
						        <tbody><tr ng-repeat="i in wnxZn4r"><th>{{ wnxZn4r[$index][0] }}</th><td ng-if="wnxZn4r[$index][7]=='B'">Brittle/Compressive</td><td ng-if="wnxZn4r[$index][7]=='D'">Ductile/Tensile</td><td ng-if="wnxZn4r[$index][7]=='F'">Flexible</td></tr></tbody>
						    </table>
				        </div><br><br>
				        <div class="col-sm-6 mt-5">
				            <h1 class="mt-2 mb-4 p-2"><b>NOTES</b></h1>
						    <table class="table table-responsive-sm shadow mb-5 bg-body">
						        <thead><tr><th>Sr No.</th><th>Note</th></tr></thead>
						        <tbody><tr><th>1</th><td>Brittle/Compressive should not be used for tension they might break without crack propogation.</td></tr><tr><th>2</th><td>All tensile materials are not having good ductility but their ability to withstand(i.e strength) are good under tension force. No compressible material to be used for greater forces.</td></tr><tr><th>3</th><td>Flexible materials can be used for both tension and compression but their strength gets compromised and can deform in any shape but till some limit.</td></tr><tr><th>4</th><td>Cost should also be considered as important factor.</td></tr><tr><th>5</th><td>Selecting material should be done with analysis before and environmental consideration should alsp be brought in order.</td></tr></tbody>
						    </table>
						</div>
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
myApp.controller("myLoadDesign",function ($scope,$http,$window) { $scope.enterData=true; $scope.submitForce=function(){ $http({ method:"POST", url:"asset/loads/staticload?token=<?php echo $_SESSION['_token'] ?>", data:$scope.forceData }).then(function (response){ var data = response.data; if(data.error){ }  else{ $scope.enterData=true; $scope.gsNzm4k=data.para.gsNzm4k; $scope.ykMx1oa=data.para.ykMx1oa; $scope.klZm4sa=data.para.klZm4sa;  $scope.wnxZn4r=data.para.wnxZn4r;	$scope.eXm8jjj=data.para.eXm8jjj; } }); }; });
</script>