<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="productioncontrol" ng-controller="myRegressionAna">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h3 class="animated fadeIn display-2 text-center mt-5"><b>Regression Analysis(Least Square Method)</b></h3><br><br>
			<div ng-show="enterData">
				<h4>Regression analysis is one of the forecasting method with help of mathematical model of obtaining relation between variables.</h4><br><h4>As a engineer you can put use of this in prediction of various applications. All the Best to create your own application.</h4><br>
				<h1 class="text-center">Type of Data</h1><br>
				<div class="row text-center">
					<div class="col-6"><button ng-click="enterDepData()" class="btn content shadow mb-5">Step Data</button></div>
					<div class="col-6"><button ng-click="enterIndepData()" class="btn content shadow mb-5">Unstep Data</button></div>
				</div><br><br>
				<h1 class="animated fadeIn display-2 text-center mt-2"><b>Exponential Smooting</b></h1><br><br>
				<table class="table table-responsive-lg shadow mb-5 bg-body">
					<thead>
					<form align="center" method="POST">
					    <input type="hidden" name="token" ng-model="invData.token" ng-init="invData.token='<?php echo $_SESSION['_token']; ?>'">	
					    <input type="hidden" ng-model="invData.type" ng-init="invData.type='ES'">
						<tr><th>Forecast Value <br>({{ invData.zMzn3wq }} Unit)</th><th colspan="3"><input type="number" ng-model="invData.zMzn3wq" placeholder="Enter Forecast Value" class="form-control" ng-change="submitExs()"></th></tr>
				        <tr><th>Demand Value <br>({{ invData.pamZw1i }} Unit)</th><th colspan="3"><input type="number" ng-model="invData.pamZw1i" placeholder="Enter Demand Value" class="form-control" ng-change="submitExs()"></th></tr>
				        <tr><th colspan="4">Smooting Constant ({{ invData.kAhzn2q }})<br><br><input class="form-control head slider" type="range" min="0.1" max="1" step="0.1" ng-model="invData.kAhzn2q" ng-change="submitExs()"></th></tr>
				    </form>
					</thead>
					<tbody ng-if="((invData.zMzn3wq>0) && (invData.pamZw1i>0))"><tr><th colspan="4">Forecast for next term : {{ hanVz7y[0] }} = {{ hanVz7y[1] }} units</th></tr></tbody>
				</table>
			</div>
			<div ng-show="withDep">
				<div class="container text-center mb-5 asking shadow p-3 bg-body"><h1>I want to perform Regression Analysis for data of {{ forceData.skw3mSQ }} units.</h1></div>
				<div class="container text-center mb-5 designdone shadow p-3 bg-body">
				    <h1>Enter the parameters</h1><p>Note: For months input is numbers like for Jan-1 Feb-2 so on.</p><br>
				    <form align="center" method="POST"  ng-submit="submitLinData()">
				        <input type="hidden" name="token" ng-model="forceData.token" ng-init="forceData.token='<?php echo $_SESSION['_token']; ?>'">
				            <div class="row">
				                <div class="col-sm-6">
				                    <input type="number" name="skw3mSQ" ng-model="forceData.skw3mSQ" placeholder="Enter Number of Units" class="form-control">
				                    	<small ng-show="checkNum" class="note">{{ checkNum }}</small>
				                        <small ng-show="checkNumVal" class="note">{{ checkNumVal }}</small><br>
				                </div>
				                <div class="col-sm-6">
				                    <input type="number" name="jsLams2" ng-model="forceData.jsLams2" placeholder="Enter Starting Month/Year" class="form-control">
				                    <small ng-show="checkStart" class="note"> {{ checkStart }}</small><br>
				                </div>
				            </div>
				            <div class="row justify-content-center mt-3">
				                <div class="col-sm-8">
				                    <input type="text" name="ahsjWl2" ng-model="forceData.ahsjWl2" placeholder="Enter Data with spaces in between" class="form-control">
				                    <small ng-show="checkData" class="note"> {{ checkData }}</small>
				                    <small ng-show="checkDataType" class="note"> {{ checkDataType }}</small>
				                    <small ng-show="checkDataCount" class="note"> {{ checkDataCount }}</small><br>
				                </div>
				            </div>
				            <div class="text-center mt-5"><input type="submit" name="aoEn5us" class="btn content" value="Analyze"><br><br></div>
				    </form>
				</div>
			</div>
			<div ng-show="withIndep">
				<div class="container text-center mb-5 asking shadow p-3 bg-body"><h1>I want to perform Regression Analysis.</h1></div>
				<div class="container text-center mb-5 designdone shadow p-3 bg-body">
				    <h1>Enter the parameters</h1><br>
				    <form align="center" method="POST"  ng-submit="submitunLinData()">
				        <input type="hidden" name="token" ng-model="linData.token" ng-init="linData.token='<?php echo $_SESSION['_token']; ?>'">
				        <div class="row">
				            <div class="col-sm-6">
				                <input type="text" name="skw3mSD" ng-model="linData.skw3mSD" placeholder="Enter X Variables with space in between" class="form-control" autocomplete="name" autofocus>
				                <small ng-show="checkNum" class="note">{{ checkNum }}</small>
				                <small ng-show="checkNumVal" class="note">{{ checkNumVal }}</small><br>
				            </div><br><br>
				            <div class="col-sm-6">
				                <input type="text" name="jsDams2" ng-model="linData.jsDams2" placeholder="Enter Y Variables with space in between" class="form-control" autocomplete="name" autofocus>
				                <small ng-show="checkStart" class="note"> {{ checkStart }}</small>
				                <small ng-show="checkStartType" class="note"> {{ checkStartType }}</small><br>
				            </div>
				        </div>
				        <small ng-show="checkNumCount" class="note"> {{ checkNumCount }}</small><br>
				        <div class="text-center mt-5"><input type="submit" name="aoEn5us" class="btn content" value="Analyze"><br><br></div>
				    </form>
				</div>
			</div>
			<div class="text-center mb-5" ng-show="finalResult">
				<h1 class="mt-2 mb-2"><b>Analysis Done</b></h1>
				<div class="table-responsive-sm">
					<table class="table shadow mb-5 bg-body">
					    <thead><tr><th>Time</th><th>Variable(Y)</th><th>Deviation(X)</th><th>X<sup>2</sup></th><th>X*Y</th><th>Equation Value</th><th>Error</th><th>Bias</th></tr></thead>
					    <tbody><tr ng-repeat="k in startList"><th>{{ k }}</th><td>{{ anaDa[$index] }}</td><td>{{ devList[$index] }}</td><td>{{ devSq[$index] }}</td><td>{{ devPr[$index] }}</td><td>{{ errorCast[$index] }}</td><td>{{ foreEArr[$index] }}</td><td>{{ foreBArr[$index] }}</td></tr></tbody>
					</table>
				</div>
				<div class="chart p-5">
				    <h4 class="text-light">Regression Line Equation: y = <span>{{ paNz3we[1] }}</span>x+<span>{{ paNz3we[0] }}</span></h4>
				    <h4 class="text-light mt-3">Forecast Bias: {{ paNz3we[2] }} %</h4><br>
				    <h4 class="text-light mt-2 mb-5">Forecast Error: {{ paNz3we[3] }} %</h4>
				    <canvas id="mychart" height="350px"></canvas>
				</div>
			</div>
			<div class="text-center mb-5" ng-show="finalResultNow">
				<h1 class="mt-2 mb-2"><b>Analysis Done</b></h1>
				<div class="table-responsive-sm">
					<table class="table shadow mb-5 bg-body">
					   <thead><tr><th>Variable(x)</th><th>Variable(y)</th><th>x<sup>2</sup></th><th>x*y</th><th>X</th><th>Y</th><th>X<sup>2</sup></th><th>Y<sup>2</sup></th><th>X*Y</th><th>Equation Value</th><th>Error</th><th>Bias</th></tr></thead>
					    <tbody><tr ng-repeat="k in startList"><th>{{ k }}</th><td>{{ anaDa[$index] }}</td><td>{{ xSq[$index] }}</td><td>{{ pXy[$index] }}</td><td>{{ devList[$index] }}</td><td>{{ devSq[$index] }}</td><td>{{ xDSq[$index] }}</td><td>{{ yDSq[$index] }}</td><td>{{ devPr[$index] }}</td><td>{{ errorCast[$index] }}</td><td>{{ foreEArr[$index] }}</td><td>{{ foreBArr[$index] }}</td></tr></tbody>
					</table>
				</div>
				<div class="chart p-5">
				    <h3 class="text-light mb-5">Regression Line Equation: y = <span>{{ paNz3we[0] }}</span>x+<span>{{ paNz3we[1] }}</span></h3>
				    <div class="row">
				        <div class="col-6"><input type="number" name="dataMl6" ng-model="dataMl6" placeholder="Enter Number" class="form-control"></div>
				        <div class="col-6"><h4 class="text-light">Forecast Value : <br>{{ ((paNz3we[0]*1.00)*(dataMl6*1.00))+(paNz3we[1]*1.00) }}</h4></div>
				    </div><br>
				    <h4 class="text-light">Forecast Bias: {{ paNz3we[3] }} %</h4><h4 class="text-light">Forecast Error: {{ paNz3we[4] }} %</h4>
				    <h4 class="text-light">Coefficient of Forecasting: {{ paNz3we[2] }}</h4>
				    <canvas id="mychar" height="350px"></canvas>
				</div>
			</div>
        </div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
	var myApp=angular.module("productioncontrol",[]);
    myApp.controller("myRegressionAna",function ($scope,$http,$window) {
        $scope.enterData=true; $scope.withDep=false; $scope.withIndep=false; $scope.finalResult=false; $scope.finalResultNow=false;
        $scope.enterDepData=function(){ $scope.enterData=false; $scope.withDep=true; $scope.withIndep=false; $scope.finalResult=false; $scope.finalResultNow=false; };
        $scope.enterIndepData=function(){ $scope.enterData=false; $scope.withDep=false; $scope.withIndep=true; $scope.finalResult=false; $scope.finalResultNow=false; };
        $scope.submitLinData=function(){ $http({  method:"POST", url:"asset/regressionanalyze/withdep?token=<?php echo $_SESSION['_token'] ?>", data:$scope.forceData }).then(function (response){
                var data = response.data;
                if(data.error){
                    $scope.checkNum=data.error.jamNx2e; $scope.checkNumVal=data.error.jaMnx2e; $scope.checkStart=data.error.jaMnx2E; 
                    $scope.checkData=data.error.zNai2wl; $scope.checkDataType=data.error.zNai2wltype; $scope.checkDataCount=data.error.zNai2wlcount;
                }else{ $scope.forceData={}; $scope.checkNum=null; $scope.checkNumVal=null; $scope.checkStart=null; $scope.checkData=null; 
                	$scope.checkDataType=null; $scope.checkDataCount=null; $scope.enterData=false; $scope.withDep=false; $scope.withIndep=false; 
                	$scope.finalResult=true; $scope.finalResultNow=false; 
		            $scope.paNz3we=data.para.paNz3we; $scope.startList=data.para.setup; $scope.anaDa=data.para.anadata; $scope.devList=data.para.devlist; 
		            $scope.devSq=data.para.devslist; $scope.devPr=data.para.devp; $scope.foreEArr=data.para.fea; $scope.foreBArr=data.para.fba; 
		            $scope.errorCast=data.para.actual;
                    
                    let myChart=document.getElementById('mychart').getContext('2d'); Chart.defaults.global.defaultFontFamily = 'Tahoma'; Chart.defaults.global.defaultFontColor = '#f2f2f2'; let massPopChart=new Chart(myChart,{ type:'line', data:{ labels:data.para.setup, datasets:[{
                        label:'Actual Data', data:data.para.anadata, borderColor:"#ffd505", pointHoverBackgroundColor:'#ffd505', pointBackgroundColor:'#ffd505', order:1 }, { label:'Formulated Data', data:data.para.actual, borderColor:"#9cc4ff", pointHoverBackgroundColor:'#9cc4ff', pointBackgroundColor:'#9cc4ff', order:1 }] }, options:{ responsive: true, title:{ display:true, text:'Analytical Graph',     fontSize:'20' } } }); } }); };

        $scope.submitunLinData=function(){
            $http({ method:"POST", url:"asset/regressionanalyze/withindep?token=<?php echo $_SESSION['_token'] ?>", data:$scope.linData }).then(function (response){
                var data = response.data;
                if(data.error){
                    $scope.checkNum=data.error.force; $scope.checkNumVal=data.error.forceval; $scope.checkStart=data.error.material; 
                    $scope.checkStartType=data.error.materialval; $scope.checkNumCount=data.error.numcount;
                }
                else{ $scope.linData={}; $scope.checkNum=null; $scope.checkNumVal=null; $scope.checkStart=null; $scope.checkStartType=null; $scope.checkNumCount=null; $scope.enterData=false; $scope.withDep=false; $scope.withIndep=false; $scope.finalResult=false; 
                	$scope.finalResultNow=true; $scope.paNz3we=data.para.paNz3we; $scope.startList=data.para.setup; $scope.anaDa=data.para.anadata; 
                	$scope.xSq=data.para.xsq; $scope.pXy=data.para.prod_xy; $scope.xDSq=data.para.x_div; $scope.yDSq=data.para.y_div; 
                	$scope.devList=data.para.devlist; $scope.devSq=data.para.devslist; $scope.devPr=data.para.devp; $scope.foreEArr=data.para.fea; 
                	$scope.foreBArr=data.para.fba; $scope.errorCast=data.para.actual;
                    let myChar=document.getElementById('mychar').getContext('2d'); Chart.defaults.global.defaultFontFamily = 'Tahoma'; Chart.defaults.global.defaultFontColor = '#f2f2f2'; let massPopChar=new Chart(myChar,{ type:'line', data:{ labels:data.para.setup, datasets:[{
                        label:'Actual data', data:data.para.anadata, borderColor:"#ffd505", pointHoverBackgroundColor:'#ffd505', pointBackgroundColor:'#ffd505', order:1  }, { label:'Formulated data', data:data.para.actual, borderColor:"#9cc4ff", pointHoverBackgroundColor:'#9cc4ff', pointBackgroundColor:'#9cc4ff', order:1 }] }, options:{ responsive: true,
                                            title:{ display:true, text:'Analytical Graph', fontSize:'20' } } }); } }); };
        $scope.submitExs=function(){
	        $http({  method:"POST", url:"asset/exponentialsmoothing/inventory?token=<?php echo $_SESSION['_token'] ?>", data:$scope.invData }).then(function (response){ var data = response.data;
	            if(data.error){ } else{  $scope.hanVz7y=data.para.hanVz7y; } }); };
    });
</script>