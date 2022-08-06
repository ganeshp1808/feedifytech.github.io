<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head><?php getHeader(); ?></head>
<body ng-app="productioncontrol" ng-controller="myInvMod">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<h3 class="animated fadeIn display-2 text-center mt-5"><b>Inventory Models</b></h3><br><br>
			<div ng-show="enterData">
				<h4>Hello, User this section looks into various Inventory Model incorporated in production control and its parameters by varying other constraints getting to know the variation.</h4><br><h4>As a engineer you can put use of this for various inventory control. All the Best to create your own application.</h4><br>
				<div class="table-responsive-sm text-center">
					<table class="table table-light shadow mb-5 bg-body">
						<thead><tr><th colspan="4">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#m2">Model 2</a></th><th><a class="btn place_content p-2" href="#m3">Model 3</a></th><th><a class="btn place_content p-2" href="#m4">Model 4</a></th></tr></thead>
					</table>
				</div>
				<div class="text-center mb-5 p-2">
				    <h1 class="mt-2 mb-4 contentheader p-2"><b>Model 1</b></h1><br>
				    <h4>Basic Inventory model with instataneous stock replenishment(i.e lead Time is zero), No discount</h4><br>
					<table class="table table-responsive-sm shadow mb-5 bg-body">
						<thead>
						<form align="center" method="POST">
					        <input type="hidden" name="token" ng-model="invData.token" ng-init="invData.token='<?php echo $_SESSION['_token']; ?>'">	
					        <input type="hidden" ng-model="invData.type" ng-init="invData.type='FIM'">
						    <tr><th>Demand <br>({{ invData.janc3Es }})</th><th colspan="3"><input type="number" ng-model="invData.janc3Es" placeholder="Enter Demand" class="form-control" ng-change="submitInv()"></th></tr>
						    <tr><th>Order Cost <br>({{ invData.s8mNxiw }})</th><th colspan="3"><input type="number" ng-model="invData.s8mNxiw" placeholder="Enter Order Cost" class="form-control" ng-change="submitInv()"></th></tr>
						    <tr><th colspan="4">Inventory Carrying Cost ({{ invData.Hnxu7tr }})<br><input type="number" ng-model="invData.Hnxu7tr" placeholder="Enter ICC" class="form-control" ng-change="submitInv()"></th></tr>
						</thead>
						<tbody ng-if="((invData.janc3Es>0) && (invData.s8mNxiw>0) && (invData.Hnxu7tr>0))">
						    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameter</th><th colspan="2">Value</th></tr>
					        <tr><th colspan="2">Economic Order Quantity</th><td colspan="2">{{ kqWgvx6[0] }}</td></tr>
					        <tr><th colspan="2">Minimum Total Cost</th><td colspan="2">{{ kqWgvx6[1] }}</td></tr>
					        <tr><th colspan="2">Optimal Number of Orders/year</th><td colspan="2">{{ kqWgvx6[2] }}</td></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Enter number of working days in year<br><input type="number" ng-model="jNaz8ey" placeholder="Enter days" class="form-control"></th></tr>
					        <tr><th colspan="2">Optimal time between two orders</th><td colspan="2">{{ ((jNaz8ey*1.00)/(kqWgvx6[2]*1.00)) | roundnum }} days</td></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Below rows helps to vary quantity and learn about various parameters. Data changes when above sliders are varied.</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Quantity ({{ quan1Value }})</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4"><br><input class="form-control head slider" type="range" min="1" max="{{ 2*kqWgvx6[0] }}" ng-model="quan1Value"></th></tr>
					        <tr><th colspan="2">Annual Ordering Cost</th><td colspan="2">{{ ((((kqWgvx6[3]*1.00)*(kqWgvx6[4]*1.00))/(quan1Value*1.00)) | roundnum) }}</td></tr>
					        <tr><th colspan="2">Annual Inventory Carrying Cost</th><td colspan="2">{{ (((quan1Value*0.5)*(kqWgvx6[5]*1.00)) | roundnum) }}</td></tr>
					        <tr><th colspan="2">Total Cost</th><td colspan="2">{{ (((((kqWgvx6[3]*1.00)*(kqWgvx6[4]*1.00))/(quan1Value*1.00))+((quan1Value*0.5)*(kqWgvx6[5]*1.00))) | roundnum) }}</td></tr>
						</tbody>
					</table>
					<div class="chart p-1" ng-if="((invData.janc3Es>0) && (invData.s8mNxiw>0) && (invData.Hnxu7tr>0))"><pre><canvas id="mychart" height="350px">{{  kqWgvx6[6] | invgraph:kqWgvx6[7]:kqWgvx6[8]:kqWgvx6[9] }}</canvas></pre></div><br><br>
					<h1 class="mt-2 mb-4 contentheader p-2" id="m2"><b>Model 2</b></h1><br>
				    <h4>Production Model with non-instataneous stock replenishment(i.e consumption along with production), Actual Manufacturing Models where consumption and production rate is considered.</h4><br><br>
					<table class="table table-responsive-sm shadow mb-5 bg-body">
						<thead>
						    <tr><th colspan="4">Demand = ({{ kqWgvx6[3] }})</th></tr>
						    <tr><th colspan="4">Ordering Cost = ({{ kqWgvx6[4] }})</th></tr>
						    <tr><th colspan="4">Inventory Carrying Cost = ({{ kqWgvx6[5] }})</th></tr>
						    <tr><th>Enter Production Rate ({{ invData.Hanx2wi }})</th><th colspan="3"><input type="number" ng-model="invData.Hanx2wi" placeholder="Enter Production Rate" class="form-control" ng-change="submitInv()"></th></tr>
						    <tr><th>Enter Consumption Rate ({{ invData.nxLa5ty }})</th><th colspan="3"><input type="number" ng-model="invData.nxLa5ty" placeholder="Enter Consumption Rate" class="form-control" ng-change="submitInv()"></th></tr>
						</thead>
						<tbody ng-if="(yEnx8wq[0]==1)">
						    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameter</th><th colspan="2">Value</th></tr>
					        <tr><th colspan="2">Economic Order Quantity</th><td colspan="2">{{ yEnx8wq[1] }}</td></tr>
					        <tr><th colspan="2">Minimum Total Cost</th><td colspan="2">{{ yEnx8wq[2] }}</td></tr>
					        <tr><th colspan="2">Optimal Number of Orders/year</th><td colspan="2">{{ yEnx8wq[3] }}</td></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Enter number of working days in year<br><input type="number" ng-model="day2Val" placeholder="Enter Days" class="form-control"></th></tr>
					        <tr><th colspan="2">Optimal time between two orders</th><td colspan="2">{{ ((day2Val*1.00)/(yEnx8wq[3]*1.00)) | roundnum }} days</td></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Below rows helps to vary quantity and learn about various parameters. Data changes when above sliders are varied.</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Quantity ({{ quan2Value }})</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4"><br><input class="form-control head slider" type="range" min="1" max="{{ 2*yEnx8wq[1] }}" ng-model="quan2Value"></th></tr>
					        <tr><th colspan="2">Annual Ordering Cost</th><td colspan="2">{{ ((((kqWgvx6[3]*1.00)*(kqWgvx6[4]*1.00))/(quan2Value*1.00)) | roundnum) }}</td></tr>
					        <tr><th colspan="2">Annual Inventory Carrying Cost</th><td colspan="2">{{ (((quan2Value*0.5)*(kqWgvx6[5]*1.00)*(1-((invData.nxLa5ty*1.00)/(invData.Hanx2wi*1.00)))) | roundnum) }}</td></tr>
					        <tr><th colspan="2">Total Cost</th><td colspan="2">{{ (((((kqWgvx6[3]*1.00)*(kqWgvx6[4]*1.00))/(quan2Value*1.00))+((quan2Value*0.5)*(kqWgvx6[5]*1.00)*(1-((invData.nxLa5ty*1.00)/(invData.Hanx2wi*1.00))))) | roundnum) }}</td></tr>
						</tbody>
					</table><br><br>
					<h1 class="mt-2 mb-4 contentheader p-2" id="m3"><b>Model 3</b></h1><br>
			    	<h4>Production Model with instataneous stock replenishment but one more addition is that <b>Shortages are also permitted in this model</b>.</h4><br><br>
					<table class="table table-responsive-sm shadow mb-5 bg-body">
						<thead>
						    <tr><th colspan="4">Demand = ({{ kqWgvx6[3] }})</th></tr>
							<tr><th colspan="4">Ordering Cost = ({{ kqWgvx6[4] }})</th></tr>
							<tr><th colspan="4">Inventory Carrying Cost = ({{ kqWgvx6[5] }})</th></tr>
							<tr><th colspan="4">Shortage Cost <br> ({{ invData.bxnM0ei }})<br><input type="number" ng-model="invData.bxnM0ei" placeholder="Enter Shortage Cost" class="form-control" ng-change="submitInv()"></th></tr>
						</thead>
						<tbody ng-if="(pSkxm2q[0]==1)">
						    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameter</th><th colspan="2">Value</th></tr>
							<tr><th colspan="2">Economic Order Quantity</th><td colspan="2">{{ pSkxm2q[1] }}</td></tr>
							<tr><th colspan="2">Economic balance units after back orders are satisfied</th><td colspan="2">{{ pSkxm2q[2] }}</td></tr>
							<tr><th colspan="2">Minimum Total Cost</th><td colspan="2">{{ pSkxm2q[3] }}</td></tr>
							<tr><th colspan="2">Optimal Number of Orders/year</th><td colspan="2">{{ pSkxm2q[4] }}</td></tr>
							<tr bgcolor="#07eda0"><th colspan="4">Enter number of working days in year<br><input type="number" ng-model="day3Val" placeholder="Enter Days" class="form-control"></th></tr>
							<tr><th colspan="2">Optimal time between two orders</th><td colspan="2">{{ ((day3Val*1.00)/(pSkxm2q[1]*1.00)) | roundnum }} days</td></tr>
							<tr bgcolor="#07eda0"><th colspan="4">Below rows helps to vary quantity and learn about various parameters. Data changes when above sliders are varied.</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Quantity ({{ quan3Value }})</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4"><br><input class="form-control head slider" type="range" min="1" max="{{ pSkxm2q[1]*2 }}" ng-model="quan3Value"></th></tr>
					        <tr><th colspan="2">Annual Ordering Cost</th><td colspan="2">{{ ((((kqWgvx6[3]*1.00)*(kqWgvx6[4]*1.00))/(quan3Value*1.00)) | roundnum) }}</td></tr>
					        <tr><th colspan="2">Annual Inventory Carrying Cost</th><td colspan="2">{{ (((quan3Value*0.5)*(kqWgvx6[5]*1.00)*((invData.bxnM0ei*1.00)/((invData.bxnM0ei*1.00)+(kqWgvx6[5]*1.00)))) | roundnum) }}</td></tr>
					        <tr><th colspan="2">Total Cost</th><td colspan="2">{{ (((((kqWgvx6[3]*1.00)*(kqWgvx6[4]*1.00))/(quan3Value*1.00))+((quan3Value*0.5)*(kqWgvx6[5]*1.00)*((invData.bxnM0ei*1.00)/((invData.bxnM0ei*1.00)+(kqWgvx6[5]*1.00))))) | roundnum) }}</td></tr>
						</tbody>
					</table><br><br>
					<h1 class="mt-2 mb-4 contentheader p-2" id="m4"><b>Model 4</b></h1><br>
				    <h4>Production Model with inventory stock introduced but discounts are considered in this case and we have to check should that discount be accepted/eligible making consideration of inventory carrying cost.</h4><br><br>
					<table class="table table-responsive-sm shadow mb-5 bg-body">
						<thead>
						    <tr><th colspan="4">Demand = ({{ kqWgvx6[3] }})</th></tr><tr><th colspan="4">Ordering Cost = ({{ kqWgvx6[4] }})</th></tr><tr><th colspan="4">Inventory Carrying Cost = ({{ kqWgvx6[5] }})</th></tr><tr><th colspan="2">Minimum quantity for purchase = ({{ invData.oMaz5er }})</th><th colspan="2"><input type="number" ng-model="invData.oMaz5er" placeholder="Quantity" class="form-control" ng-change="submitInv()"></th></tr><tr><th colspan="4">Discount ({{ invData.Lamx2wt }} %)<br><br><input class="form-control head slider" type="range" min="1" max="100" ng-model="invData.Lamx2wt" ng-change="submitInv()"></th></tr>
						</form>
						</thead>
						<tbody ng-if="(haNxmw2[0]==1)">
						    <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Parameter</th><th colspan="2">Value</th></tr>
					        <tr><th colspan="2">Economic Order Quantity</th><th colspan="2">{{ haNxmw2[1] }}</th></tr>
					        <tr><th colspan="2">Economic Order Quantity after discount</th><th colspan="2">{{ haNxmw2[2] }}</th></tr>
					        <tr><th colspan="2">Comment</th><th colspan="2">{{ haNxmw2[3] }}</th></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php getFooter(); ?>
</body>
</html>
<script type="text/javascript">
	var myApp=angular.module("productioncontrol",[]);
 	myApp.filter('roundnum',function ($filter) { return function (input) { 	return Math.round(input * 100) / 100; }; });
 	myApp.filter('invgraph',function ($filter) { return function (input,input1,input2,input3) {
 		let myChart=document.getElementById('mychart').getContext('2d'); Chart.defaults.global.defaultFontFamily = 'Poppins'; Chart.defaults.global.defaultFontColor = '#f2f2f2'; let massPopChart=new Chart(myChart,{ type:'line', data:{ labels:input3,  datasets:[{ type: 'line', label: 'Total Cost', data: input2, borderColor:'#fcf805', pointBackgroundColor:'#fcf805' },{ type: 'line', label: 'Annual Ordering Cost', data: input, borderColor:'#05fcae', pointBackgroundColor:'#05fcae' },{ type: 'line', label: 'Annual Inventory Carrying Cost', data: input1, borderColor:'#05befc', pointBackgroundColor:'#05befc' }] }, options:{ responsive: true, title:{ display:true, text:'Inventory Cost Relationship', fontSize:'20' } } }); }; });
     myApp.controller("myInvMod",function ($scope,$http,$window) {
        $scope.enterData=true;
        $scope.submitInv=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/inventory?token=<?php echo $_SESSION['_token'] ?>", data:$scope.invData }).then(function (response){ var data = response.data; if(data.error){ } else{  $scope.kqWgvx6=data.para.kqWgvx6;$scope.yEnx8wq=data.para.yEnx8wq;	$scope.pSkxm2q=data.para.pSkxm2q;  $scope.haNxmw2=data.para.haNxmw2; } }); }; });
</script>