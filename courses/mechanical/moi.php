<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myMois">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container" ng-show="enterData">
			<h1 class="animated fadeIn display-2 text-center mt-5 mb-5"><b>Moment of Inertia</b></h1>
			<div class="table-responsive-sm">
				<table class="table table-light shadow mb-5 bg-body">
					<thead><tr><th colspan="4">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#cs">Circular</a></th><th><a class="btn place_content p-2" href="#hcs">Hollow Circular</a></th><th><a class="btn place_content p-2" href="#scs">Semi Ciricular</a></th></tr><tr><th><a class="btn place_content p-2" href="#ts">Triangular</a></th><th><a class="btn place_content p-2" href="#es">Ellipse</a></th><th></th></tr></thead>
				</table>
			</div>
			<h1 class="mt-2 mb-4 contentheader text-center p-2"><b>Rectangular Section</b></h1><br>
			<table class="table table-responsive-lg shadow bg-body mb-5 text-center">
				<thead>
				<form align="center" method="POST">
				    <input type="hidden" ng-model="moiData.token" ng-init="moiData.token='<?php echo $_SESSION['_token']; ?>'">
					<tr><th colspan="3">​<img src="images/rectmo.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>{{ ijMzn5e[0] }}</th></tr><tr><th>Length ( l= {{ moiData.kmzIs4i }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.kmzIs4i" placeholder="Enter length in mm" ng-change="submitMoi()"></th></tr><tr><th>Breadth ( b= {{ moiData.pLmz3yh }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.pLmz3yh" placeholder="Enter breadth in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Distance in X direction from vertical nuetral axis ({{ moiData.jKmxo6i }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.jKmxo6i" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr><tr><th>Distance in Y direction from horizontal nuetral axis ({{ moiData.imx9Jsp }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.imx9Jsp" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr>
				</thead>
				<tbody ng-if="((moiData.kmzIs4i>0) && (moiData.pLmz3yh>0) && (moiData.kmzIs4i>=moiData.pLmz3yh))"><tr><td colspan="3">{{ ijMzn5e[1] }}<br><br>{{ ijMzn5e[3] }}</td></tr><tr><td colspan="3">{{ ijMzn5e[2] }}<br><br>{{ ijMzn5e[4] }}</td></tr></tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="cs"><b>Circular Section</b></h1><br>
			<table class="table table-responsive-lg shadow mb-5 bg-body text-center">
				<thead><tr><th colspan="3">​<img src="images/circmo.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>{{ cNxio9s[0] }}</th></tr><tr><th>Radius ( r = {{ moiData.kNxm3wi }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.kNxm3wi" placeholder="Enter radius in mm" ng-change="submitMoi()"></th></tr><tr><th>Vary distance along radius ({{ moiData.oLxm9id }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.oLxm9id" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr></thead>
				<tbody ng-if="(moiData.kNxm3wi>0)"><tr><td colspan="3">{{ cNxio9s[1] }}<br><br>You are on horizontal nuetral axis</td></tr><tr><td colspan="3">{{ cNxio9s[2] }}<br><br>{{ cNxio9s[3] }}</td></tr></tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="hcs"><b>Hollow Circular Section</b></h1><br>
			<table class="table table-responsive-lg shadow mb-5 bg-body text-center">
				<thead><tr><th colspan="3">{{ jnZui3t[0] }}</th></tr>
					<tr><th>Outer Radius ( R = {{ moiData.xKls4ri }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.xKls4ri" placeholder="Enter radius in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Inner Radius ( r = {{ moiData.yXm2lq }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.yXm2lq" placeholder="Enter radius in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Vary distance along radius ({{ moiData.q5snXo }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.q5snXo" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr>
				</thead>
				<tbody ng-if="((moiData.xKls4ri>0) && (moiData.yXm2lq>0) && (moiData.xKls4ri>moiData.yXm2lq))"><tr><td colspan="3">{{ jnZui3t[1] }}<br><br>(NOTE: You are on horizontal nuetral axis.)</td></tr><tr><td colspan="3">{{ jnZui3t[2] }}<br><br>{{ jnZui3t[3] }}</td></tr></tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="scs"><b>Semi-Circular Section</b></h1><br>
			<table class="table table-responsive-lg shadow mb-5 bg-body text-center">
				<thead>
					<tr><th colspan="3">​<img src="images/semicircmo.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>{{ Hjan4ri[0] }}</th></tr>
					<tr><th>Radius ( R = {{ moiData.hJma4ro }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.hJma4ro" placeholder="Enter radius in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Distance in X direction from vertical nuetral axis ({{ moiData.isMx3o }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.isMx3o" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Distance in Y direction from horizontal nuetral axis ({{ moiData.pLa2qiy }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.pLa2qiy" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr>
				</thead>
				<tbody ng-if="(moiData.hJma4ro>0)"><tr><td colspan="3">{{ Hjan4ri[1] }}<br><br>{{ Hjan4ri[3] }}</td></tr><tr><td colspan="3">{{ Hjan4ri[2] }}<br><br>{{ Hjan4ri[4] }}</td></tr></tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="ts"><b>Triangular Section</b></h1><br>
			<table class="table table-responsive-lg shadow mb-5 bg-body text-center">
				<thead>
					<tr><th colspan="3">​<img src="images/trimo.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>{{ oKmx5lr[0] }}</th></tr>
					<tr><th>Base ( b = {{ moiData.wOmz1sp }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.wOmz1sp" placeholder="Enter base in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Height ( h = {{ moiData.lmz2dGy }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.lmz2dGy" placeholder="Enter height in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Distance in X direction from vertical nuetral axis ({{ moiData.uMnc3qi }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.uMnc3qi" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr>
					<tr><th>Distance in Y direction from horizontal nuetral axis ({{ moiData.p8isZbr }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.p8isZbr" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr>
				</thead>
				<tbody ng-if="((moiData.wOmz1sp>0) && (moiData.lmz2dGy>0))"><tr><td colspan="3">{{ oKmx5lr[1] }}<br><br>{{ oKmx5lr[3] }}</td></tr><tr><td colspan="3">{{ oKmx5lr[2] }}<br><br>{{ oKmx5lr[4] }}</td></tr></tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="es"><b>Ellipse Section</b></h1><br>
			<table class="table table-responsive-lg shadow mb-5 bg-body text-center">
				<thead><tr><th colspan="3">​<img src="images/emo.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>{{ kMzne3w[0] }}</th></tr><tr><th>Semi-Major Axis ( a = {{ moiData.jmxLo7s }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.jmxLo7s" placeholder="Enter axis in mm" ng-change="submitMoi()"></th></tr><tr><th>Semi-Minor Axis ( b = {{ moiData.kMxi3ed }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.kMxi3ed" placeholder="Enter axis in mm" ng-change="submitMoi()"></th></tr><tr><th>Distance in X direction from vertical nuetral axis ({{ moiData.oSdj5rt }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.oSdj5rt" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr><tr><th>Distance in Y direction from horizontal nuetral axis ({{ moiData.gVzn2ue }} mm)</th><th colspan="2"><input class="form-control" type="number" ng-model="moiData.gVzn2ue" placeholder="Enter distance in mm" ng-change="submitMoi()"></th></tr></form></thead>
				<tbody ng-if="((moiData.jmxLo7s>0) && (moiData.kMxi3ed>0))"><tr><td colspan="3">{{ kMzne3w[1] }}<br><br>{{ kMzne3w[3] }}</td></tr><tr><td colspan="3">{{ kMzne3w[2] }}<br><br>{{ kMzne3w[4] }}</td></tr></tbody>
			</table>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
var myApp=angular.module("machinedesign",[]);
myApp.controller("myMois",function ($scope,$http,$window) { $scope.enterData=true; $scope.submitMoi=function(){
    $http({ method:"POST", url:"asset/beams/moi?token=<?php echo $_SESSION['_token'] ?>", data:$scope.moiData }).then(function (response){
        var data = response.data; if(data.error){ } else{ $scope.ijMzn5e=data.para.ijMzn5e; $scope.cNxio9s=data.para.cNxio9s; $scope.jnZui3t=data.para.jnZui3t; $scope.Hjan4ri=data.para.Hjan4ri;	$scope.kMzne3w=data.para.kMzne3w; $scope.oKmx5lr=data.para.oKmx5lr; } }); };
    	});
</script>