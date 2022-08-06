<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="machinedesign" ng-controller="myTomV">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container" ng-show="enterData">
			<h2 class="mt-5 mb-5">Hello User, this section discusses about effect of various parameters on vibration and frequencies of whole system.</h2>
			<div class="table-responsive-sm text-center">
				<table class="table table-light shadow mb-5 bg-body">
					<thead><tr><th colspan="4">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#dv">Deflection Vibration</a></th><th><a class="btn place_content p-2" href="#fdv">Free Damped Vibration</a></th><th><a class="btn place_content p-2" href="#fv">Forced Vibration</a></th></tr></thead>
				</table>
			</div>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="dv"><b>Deflection Vibration</b></h1>
			<table class="table table-responsive-sm shadow mb-5 bg-body text-center">
				<thead><tr><th colspan="4">NOTE: Transverse or Longitudinal both vibration will work.</th></tr>
				    <tr><form align="center" method="POST">
				    <input type="hidden" ng-model="defData.token" ng-init="defData.token='<?php echo $_SESSION['_token']; ?>'">
				    <input type="hidden" ng-model="defData.type" ng-init="defData.type='DEF'">
				    <th>Deflection<br>({{ defData.kmZli3w }} mm)</th>
				    <th colspan="3"><input type="number" ng-model="defData.kmZli3w" placeholder="Enter Deflection in mm" class="form-control" ng-change="submitDef()"></th>
					</form></tr>
				</thead>
				<tbody ng-if="(defData.kmZli3w>0)"><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Natural Frequency</th><th colspan="2">Comment</th></tr><tr><td colspan="2">{{ ijMzn5e[0] }} Hz</td><td colspan="2">{{ ijMzn5e[1] }}</td></tr><tr><td colspan="2">{{ ijMzn5e[2] }}</td><td colspan="2">{{ ijMzn5e[3] }}</td></tr></tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="fdv"><b>Free Damped Vibration</b></h1>
			<table class="table table-responsive-sm shadow mb-5 bg-body text-center">
				<thead>
				<form align="center" method="POST">
				    <input type="hidden" ng-model="freeData.token" ng-init="freeData.token='<?php echo $_SESSION['_token']; ?>'">
				    <input type="hidden" ng-model="freeData.type" ng-init="freeData.type='freed'">
				    <tr><th colspan="2">Mass ({{ freeData.jmaxe4R }} kg)</th><th colspan="2"><input type="number" ng-model="freeData.jmaxe4R" placeholder="Enter Mass in kg" class="form-control" ng-change="submitFreed()"></th></tr>
				    <tr><th colspan="2">Damping Coefficient ({{ freeData.kMax3eo }} N/m/s)</th><th colspan="2"><input type="number" ng-model="freeData.kMax3eo" placeholder="Enter Damping Coefficient" class="form-control" ng-change="submitFreed()"></th></tr>
				    <tr><th colspan="2">Stiffness ({{ freeData.fOpla5t }} N/mm)</th><th colspan="2"><input type="number" ng-model="freeData.fOpla5t" placeholder="Enter Stiffness in N/mm" class="form-control"  ng-change="submitFreed()"></th></tr>
				</form>
				</thead>
				<tbody ng-if="((freeData.jmaxe4R>0) && (freeData.kMax3eo>=0) && (freeData.fOpla5t>0))"><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameter</th><th colspan="2">Value</th></tr><tr><td colspan="4">Motion Equation( where x in m)<br>{{ uhNx7ro[0] }}</td></tr><tr><td colspan="2">a=(c/(2*m))</td><td colspan="2">{{ uhNx7ro[1] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[2] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[3] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[4] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[5] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[6] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[7] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[8] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[9] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[10] }}</td></tr><tr><td colspan="4">{{ uhNx7ro[11] }}</td></tr></tbody>
			</table>
			<h1 class="mt-2 mb-4 contentheader text-center p-2" id="fv"><b>Forced Vibration</b></h1>
			<div class="table-responsive-sm text-center">
				<table class="table shadow mb-5 bg-body">
				    <thead>
				    <form align="center" method="POST">
				        <input type="hidden" ng-model="forcedData.token" ng-init="forcedData.token='<?php echo $_SESSION['_token']; ?>'">
				        <input type="hidden" ng-model="forcedData.type" ng-init="forcedData.type='forced'">
				        <tr bgcolor="#4287f5"><th colspan="2">Mass ({{ forcedData.iKmx3ry }} kg)</th><th colspan="2"><input type="number" ng-model="forcedData.iKmx3ry" placeholder="Enter Mass in kg" class="form-control" ng-change="submitForced()"></th></tr>
				        <tr bgcolor="#4287f5"><th colspan="2">Damping Coefficient ({{ forcedData.Piem5tu }} N/m/s)</th><th colspan="2"><input type="number" ng-model="forcedData.Piem5tu" placeholder="Enter Damping Coefficient" class="form-control" ng-change="submitForced()"></th></tr>
				        <tr bgcolor="#4287f5"><th colspan="2">Stiffness ({{ forcedData.i4ropSr }} N/mm)</th><th colspan="2"><input type="number" ng-model="forcedData.i4ropSr" placeholder="Enter Stiffness in N/mm" class="form-control" ng-change="submitForced()"></th> </tr>
				        <tr bgcolor="#4287f5"><th colspan="2">Force ({{ forcedData.yoSj4kl }} N)</th><th colspan="2"><input type="number" ng-model="forcedData.yoSj4kl" placeholder="Enter Force in N" class="form-control" ng-change="submitForced()"></th></tr>
				        <tr bgcolor="#4287f5"><th colspan="2">Angular velocity ({{ forcedData.fKsm9rj }} rad/s)</th><th colspan="2"><input type="number" ng-model="forcedData.fKsm9rj" placeholder="Enter Angular velocity in rad/s" class="form-control" ng-change="submitForced()"></th></tr>
				    </form>
				    </thead>
					<tbody ng-if="((forcedData.iKmx3ry>0) && (forcedData.Piem5tu>=0) && (forcedData.i4ropSr>0) && (forcedData.yoSj4kl>0) && (forcedData.fKsm9rj>=0))">
					    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameter</th><th colspan="2">Value</th></tr><tr><td colspan="4">Motion Equation( where x in m)<br>{{ pLamx3t[0] }}</td></tr><tr><td colspan="2">Angular Velocity of disturbing force (in rad/s)</td><td colspan="2">{{ forcedData.fKsm9rj }}</td></tr><tr><td colspan="2">a=(c/(2*m))</td><td colspan="2">{{ pLamx3t[1] }}</td></tr><tr><td colspan="4">{{ pLamx3t[2] }}</td></tr><tr><td colspan="4">{{ pLamx3t[3] }}</td></tr><tr><td colspan="4">{{ pLamx3t[4] }}</td></tr><tr><td colspan="4">{{ pLamx3t[5] }}</td></tr><tr><td colspan="4">{{ pLamx3t[6] }}</td></tr><tr><td colspan="4">{{ pLamx3t[7] }}</td></tr><tr><td colspan="4">{{ pLamx3t[8] }}</td></tr><tr><td colspan="4">{{ pLamx3t[9] }}</td></tr><tr><td colspan="4">{{ pLamx3t[10] }}</td></tr><tr><td colspan="4">{{ pLamx3t[11] }}</td></tr><tr><td colspan="4">Logaritdmic Decrement<br>{{ pLamx3t[12] }}</td></tr><tr><td colspan="4">{{ pLamx3t[13] }}</td></tr><tr><td colspan="4">{{ pLamx3t[14] }}</td></tr><tr><td colspan="4">{{ pLamx3t[15] }}</td></tr><tr><td colspan="4">{{ pLamx3t[16] }}</td></tr><tr><td colspan="4">{{ pLamx3t[17] }}</td></tr><tr><td colspan="4">{{ pLamx3t[18] }}</td></tr><tr><th colspan="2">Graphs</th><th><button class="btn place_content" type="button" data-bs-toggle="modal" data-bs-target="#magniModal">Magnification Factor</button></th><th><button class="btn place_content" type="button" data-bs-toggle="modal" data-bs-target="#transModal">Transmissibility</button></th></tr>
					</tbody>
				</table>
            </div> 
		</div>
		<div class="modal fade" id="magniModal" tabindex="-1" role="dialog" aria-labelledby="magniModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
				    <div class="modal-header"><h5 class="modal-title" id="magniModalLabel">Magnification Factor</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
				    <div class="modal-body">
				        <div class="container mt-5 mb-5"><h3>ζ=(c/c<sub>c</sub>)={{ magnData.iLman8f }}</h3>
				            <form align="center" method="POST">
				                <input type="hidden" ng-model="magnData.token" ng-init="magnData.token='<?php echo $_SESSION['_token']; ?>'">
				                <input type="hidden" ng-model="magnData.type" ng-init="magnData.type='magn'">
				                <input class="form-control head slider" type="range" min="0" max="2" step="0.01" ng-model="magnData.iLman8f" ng-change="submitMagn()"><br><br>
				            </form><div class="chart p-1"><pre><canvas id="mychart" height="450px"></canvas></pre></div>
				        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="transModal" tabindex="-1" role="dialog" aria-labelledby="transModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
				    <div class="modal-header"><h5 class="modal-title" id="transModalLabel">Transmissibility</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
				    <div class="modal-body">
				        <div class="container mt-5 mb-5"><h3>ζ=(c/c<sub>c</sub>)={{ transData.haImx8p }}</h3>
				            <form align="center" method="POST">
					            <input type="hidden" ng-model="transData.token" ng-init="transData.token='<?php echo $_SESSION['_token']; ?>'">
					            <input type="hidden" ng-model="transData.type" ng-init="transData.type='trans'">
					            <input class="form-control head slider" type="range" min="0" max="2" step="0.01" ng-model="transData.haImx8p" ng-change="submitTrans()"><br><br>
					        </form><div class="chart p-1"><pre><canvas id="mychart1" height="450px"></canvas></pre></div>
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
        myApp.controller("myTomV",function ($scope,$http,$window) {
            $scope.enterData=true;
            $scope.submitDef=function(){
            $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.defData }).then(function (response){
                var data = response.data;  if(data.error){ } else{ $scope.ijMzn5e=data.para.ijMzn5e; } }); };
            $scope.submitFreed=function(){
            $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.freeData }).then(function (response){
                var data = response.data;  if(data.error){ } else{ $scope.uhNx7ro=data.para.uhNx7ro; } }); };
            $scope.submitForced=function(){
            $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.forcedData }).then(function (response){
                var data = response.data;  if(data.error){ } else{ $scope.pLamx3t=data.para.pLamx3t; } }); };
            $scope.submitMagn=function(){ $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.magnData }).then(function (response){ var data = response.data;  if(data.error){ } else{ $scope.k2olAi=data.para.k2olAi; 
                let myChart=document.getElementById('mychart').getContext('2d'); Chart.defaults.global.defaultFontFamily = 'Poppins';
                Chart.defaults.global.defaultFontColor = '#f2f2f2';
                let massPopChart=new Chart(myChart,{ type:'line', data:{ labels:data.para.k2olAi[0], datasets:[{type: 'line',label: 'Magnification Factor for (ζ='+(data.para.k2olAi[4])+')',data: data.para.k2olAi[1],borderColor:'#4275f5',pointBackgroundColor:'#4275f5'},
                            { type: 'line', label: 'Magnification Factor for (ζ='+(data.para.k2olAi[4]+0.1)+')', data: data.para.k2olAi[2], borderColor:'#9eeb34', pointBackgroundColor:'#9eeb34' },
                            {type: 'line',label: 'Magnification Factor for (ζ='+(data.para.k2olAi[4]+0.2)+')',data: data.para.k2olAi[3],borderColor:'#eb343a',pointBackgroundColor:'#eb343a' }] }, options:{responsive: true,title:{display:true, text:'Magnification Factor vs r', fontSize:'20' }, scales: { yAxes: [{  scaleLabel: { display: true, labelString: 'Magnification Factor' }   }] ,  
                            			xAxes: [{ scaleLabel: { display: true, labelString: 'r' }   }] } } });  } });
            };
            $scope.submitTrans=function(){ $http({  method:"POST", url:"asset/simplejoint/tom?token=<?php echo $_SESSION['_token'] ?>", data:$scope.transData }).then(function (response){ var data = response.data;  if(data.error){ } else{ $scope.gKmsx4i=data.para.gKmsx4i; 
                let myChart1=document.getElementById('mychart1').getContext('2d'); Chart.defaults.global.defaultFontFamily = 'Poppins'; 
                Chart.defaults.global.defaultFontColor = '#f2f2f2';  
                let massPopChart=new Chart(myChart1,{ type:'line', data:{ labels:data.para.gKmsx4i[0],
                     datasets:[{ type: 'line',label: 'Transmissibility for (ζ='+(data.para.gKmsx4i[4])+')',data: data.para.gKmsx4i[1],borderColor:'#4275f5',pointBackgroundColor:'#4275f5'}, { type: 'line', label: 'Transmissibility for (ζ='+(data.para.gKmsx4i[4]+0.1)+')', data: data.para.gKmsx4i[2], borderColor:'#9eeb34', pointBackgroundColor:'#9eeb34' }, { type: 'line', label: 'Transmissibility for (ζ='+(data.para.gKmsx4i[4]+0.2)+')', data: data.para.gKmsx4i[3], borderColor:'#eb343a', pointBackgroundColor:'#eb343a' }] }, options:{ responsive: true, title:{ display:true,text:'Transmissibility vs r',fontSize:'20'}, scales: { yAxes: [{  scaleLabel: {display: true,labelString: 'Transmissibility'}   }],xAxes: [{ scaleLabel: {display: true,labelString: 'r' }   }] } } });
            	} }); }; });
</script>