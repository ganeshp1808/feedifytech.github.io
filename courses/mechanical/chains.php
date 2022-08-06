<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myChainDesign">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h1 class="animated fadeIn display-1 text-center mt-5"><b>Chain Drive</b></h1><br><br>
			<div ng-show="enterData">
				<h4>Chain drives are series of link connected together together to transmit power between short and long distances. Chain drives are positive drive and are more efficient than belt drive as there is very less chance of slip. Design of chain drives is discussed in this section.</h4><br><h4>As a engineer you can use chain drive where you have to transmit power. All the Best to create your own application.</h4><br><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/chain.PNG" alt='...'><br><br>
				<div class="container text-center asking p-4 shadow mb-5 bg-body"><h1>I want to design chain drive for <b>power of {{ chainData.sk3m }} N</b>, with  considering <b>input RPM as {{ chainData.aNxc}}</b> and <b>output RPM as {{ chainData.aNzv}}</b>.</h1></div>
				<div class="container text-center designdone p-3 shadow mb-5 bg-body">
				   <h1>Enter the parameters</h1><br>
				   <form align="center" method="POST">
				      <input type="hidden" name="token" ng-model="chainData.token" ng-init="chainData.token='<?php echo $_SESSION['_token']; ?>'">
				      <div class="row">
				         <div class="col-sm-6 mb-3"><input type="number" ng-model="chainData.sk3m" placeholder="Enter power in W" class="form-control"  ng-change="submitChain()"></div>
				         <div class="col-sm-6"><select class="form-control" ng-model="chainData.jsams" ng-change="submitChain()"><option value="">Select Chain Type</option><option value="1">Simplex</option><option value="2">Duplex</option><option value="3">Triplex</option></select></div>
				      </div><br>
				      <div class="row">
				         <div class="col-sm-6 mb-3"><input type="number" ng-model="chainData.aNxc" placeholder="Enter Input RPM" class="form-control" ng-change="submitChain()"></div>
				         <div class="col-sm-6 mb-3"><input type="number" ng-model="chainData.aNzv" placeholder="Enter Output RPM" class="form-control" ng-change="submitChain()"></div>
				      </div><br>
				</div>  
				<div class="text-center mt-5 mb-5" ng-if="((chainData.sk3m>0) && (chainData.jsams>0) && (chainData.aNxc>0) && (chainData.aNzv>0) && (chainData.aNxc>chainData.aNzv))">
				   <h1 class="mt-2 mb-5 contentheader p-2"><b>Analysis Done</b></h1>
				   <div class="table-responsive-sm">
					   <table class="table shadow mb-5 bg-body">
					      <thead><tr><td colspan="2"><img width="100%" height="100%" class="img-fluid img-thumbnail" src="images/chaindrive.PNG" alt='...'></td></tr><tr bgcolor="#4287f5"><th colspan="2">Design Factor ({{ chainData.sMxn }})<br><br><input class="form-control head slider" type="range" min="1" max="5" step="0.1" ng-model="chainData.sMxn" ng-change="submitChain()"></th></tr>
					   </form></thead>
					   	<tbody><tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th>Value</th></tr><tr><th>Design Power</th><th>{{ Xnzm4h[0] }}</th></tr><tr><th>Speed Ratio</th><th>{{ Xnzm4h[1] }}</th></tr><tr><th>Teeth on input sprocket</th><th>{{ Xnzm4h[2] }}</th></tr><tr><th>Teeth on output sprocket</th><th>{{ Xnzm4h[3] }}</th></tr><tr><th>Chain Pitch for selection</th><th>{{ Xnzm4h[4] }} mm</th></tr><tr><th>Velocity of chain</th><th>{{ Xnzm4h[6] }} m/s</th></tr><tr><th>Tangetial force</th><th>{{ Xnzm4h[7] }} N</th></tr><tr><th>Bearing area</th><th>{{ Xnzm4h[8] }} mm<sup>2</sup></th></tr><tr><th colspan="2">{{ Xnzm4h[9] }}</th></tr><tr><th>Number of Links</th><th>{{ Xnzm4h[10] }}</th></tr><tr><th>Length of chain</th><th>{{ Xnzm4h[11] }} mm</th></tr><tr><th>Exact center distance</th><th>{{ Xnzm4h[12] }} mm</th></tr><tr><th>Final Chain Pitch</th><th>{{ Xnzm4h[13] }} mm</th></tr><tr><th>Diameter of input sprocket</th><th>{{ Xnzm4h[14] }} mm</th></tr><tr><th>Diameter of ouput sprocket</th><th>{{ Xnzm4h[15] }} mm</th></tr></tbody>
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
    myApp.controller("myChainDesign",function ($scope,$http,$window) {	$scope.enterData=true; $scope.submitChain=function(){ $http({ method:"POST", url:"asset/simplejoint/chaindrive?token=<?php echo $_SESSION['_token'] ?>", data:$scope.chainData }).then(function (response){  data = response.data; if(data.error){ } else{ $scope.Xnzm4h=data.para.Xnzm4h; } }); }; });
</script>