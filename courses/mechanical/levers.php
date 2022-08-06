<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="machinedesign" ng-controller="myLeverDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-2 text-center mt-5"><b>Levers</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Levers are used to balance force about fulcrum pin which helps lever to rotate. Levers are widely used to transmit large force by application of small force over varying distance balancing moments about fulcrum pin.</h4><br>
				<h4>As a engineer you can put lever where you have to balance force about fulcrum point. All the Best to create your own application.</h4><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design lever to lift <b>force of {{ leverData.skw3mSQ }} N</b>, with considering <b>factor of safety(FoS) as {{ leverData.zmalYa }}</b> and <b>for length {{ leverData.jshjd9C }}</b> mm.</h1></div>
				<div class="container text-center designdone p-3 shadow mb-5 bg-body">
				    <h1>Enter the parameters</h1><br>
				    <form align="center" method="POST">
				        <input type="hidden" name="token" ng-model="leverData.token" ng-init="leverData.token='<?php echo $_SESSION['_token']; ?>'">
				        <div class="row">
				            <div class="col-sm-6"><input type="number" ng-model="leverData.skw3mSQ" placeholder="Enter Force to be lifted in N" class="form-control" ng-change="submitLever()"></div><br><br><br>
				            <div class="col-sm-6">
				                <select class="form-control" ng-model="leverData.jsLams2" ng-change="submitLever()">
				                <option value="">Select Material</option><option value="1">FG150</option><option value="2">FG220</option><option value="3">FG350</option><option value="4">WM400</option><option value="5">BM320</option><option value="6">PM500</option><option value="7">SG500/7</option><option value="8">30C8</option><option value="9">Stainless Steel(Alloy Steel)</option><option value="10">Alluminium Alloy</option><option value="11">Polyamide Nylon</option><option value="12">Low Density Polyethene</option><option value="13">Brass Cast</option><option value="14">Brass Wrought</option><option value="15">Bronze Cast</option><option value="16">Copper</option><option value="17">Gold</option><option value="18">Human Bone</option><option value="19">Bamboo</option><option value="20">Concrete</option><option value="21">Wood</option></select>
				            </div>
				        </div><br>
				        <div class="row justify-content-center"><div class="col-sm-6 mb-3"><input type="number" ng-model="leverData.jshjd9C" placeholder="Enter lever length in mm" class="form-control" ng-change="submitLever()"></div></div>
				</div>
				<div class="text-center mb-5" ng-if="((leverData.skw3mSQ>0) && (leverData.jsLams2>0) && (leverData.jshjd9C>0))">
				    <h1 class="mt-2 mb-2 contentheader p-2"><b>Analysis Done for {{ g1Hj[2] }}</b></h1><br>
				    <div class="table-responsive-sm">
					    <table class="table shadow mb-5 bg-body">
					        <thead>
					            <tr><th colspan="2"><img src="images/leverd.PNG" class="img-fluid img-thumbnail" alt="..."></th></tr>
					            <tr><th colspan="2">Your lever is of length {{ leverData.jshjd9C }} mm, so below are the parameters which play crucial role in design of lever.</th></tr>
					            <tr bgcolor="#4287f5"><th colspan="2">Enter distance at which load is acting on lever from left ({{ leverData.wJn }} mm).<br><br><input class="form-control" type="number" ng-model="leverData.wJn" placeholder="Enter Length in mm" ng-change="submitLever()"></th></tr>
					            <tr bgcolor="#4287f5"><th colspan="2">Enter distance at which fulcrum is placed on lever from left ({{ leverData.BB3k }} mm).<br><br><input class="form-control" type="number" ng-model="leverData.BB3k" placeholder="Enter Length in mm" ng-change="submitLever()"></th></tr>
					            <tr bgcolor="#4287f5"><th colspan="2">Enter distance at which effort is acting on lever from left ({{ leverData.s9hr }} mm).<br><br><input class="form-control" type="number" ng-model="leverData.s9hr" placeholder="Enter Length in mm" ng-change="submitLever()"></th></tr>
					            <tr bgcolor="#4287f5"><th colspan="2">FoS ({{ leverData.zmalYa }}) <br><br><input class="form-control head slider" type="range" min="1" max="10" ng-model="leverData.zmalYa" ng-change="submitLever()"></th></tr>
					    </form>
					        </thead>
					        <tbody ng-if="((leverData.skw3mSQ>0) && (leverData.jsLams2>0) && (leverData.jshjd9C>0) && (leverData.wJn>=0) && (leverData.BB3k>=0) && (leverData.s9hr>=0))"><tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th>Value</th></tr><tr><th colspan="2">{{ abcD[0] }}</td></tr></tbody>
					        <tbody ng-if="g1Hj[0]==1">
					            <tr><th>Mechanical Advantage</th><td>{{ abcD[1] }}</td></tr><tr><th>Effort to be applied(in N)</th><td>{{ abcD[2] }}</td></tr><tr><th>Reaction on fulcrum Pin(in N)</th><td>{{ abcD[3] }}</td></tr><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Cross Sections of lever beam (in mm)</th></tr><tr><th>Circular rod diameter</th><td>{{ abcD[4] }}</td></tr><tr><th>Square side</th><td>{{ abcD[5] }}</td></tr><tr><th>Rectangle(Length/Breadth)<br>Load parallel to breadth</th><td>{{ abcD[6] }} / {{ abcD[7] }}</td></tr><tr><th>Ellipse(Major Axis/Minor Axis)<br>Load parallel to major axis</th><td>{{ abcD[8] }} / {{ abcD[9] }}</td></tr>
					        </tbody>
					    </table>
				    </div><br><br>
				    <div class="table-responsive-sm" ng-if="g1Hj[0]==1">
				    	<table class="table shadow mb-5 bg-body">
				        	<thead><tr><th rowspan="2">Material</th><th colspan="4">Cross Sections of lever beam (in mm)</th></tr><tr><th>Circular rod diameter</th><th>Square side</th><th>Rectangle (Length/Breadth)</th><th>Ellipse (Major Axis/Minor Axis)</th></tr></thead>
				        	<tbody><tr ng-repeat="i in aA"><th>{{ aA[$index] }}</th><th>{{ bB[$index] }}</th><th>{{ cC[$index] }}</th><th>{{ dD[$index] }}</th><th>{{ eE[$index] }}</th></tr></tbody>
				    	</table>
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
	myApp.controller("myLeverDesign",function ($scope,$http,$window) { $scope.enterData=true;
 		$scope.submitLever=function(){
            $http({ method:"POST", url:"asset/loads/lever?token=<?php echo $_SESSION['_token'] ?>", data:$scope.leverData }).then(function (response){
            var data = response.data; if(data.error){ }  else{ $scope.g1Hj=data.para.g1Hj; $scope.abcD=data.para.abcD; $scope.aA=data.para.aA; $scope.bB=data.para.bB; $scope.cC=data.para.cC; $scope.dD=data.para.dD; $scope.eE=data.para.eE; } }); };
    });
</script>