<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head> <?php getHeader(); ?> </head>
<body ng-app="fluidmechanics" ng-controller="myFluidInst">
	<?php getDashBoard(); ?>
	<section id="contentsection">
		<div class="container">
			<div ng-show="enterData">
				<h2 class="mt-5 mb-5">Hello User, this section discusses about the instruments used in analysing aspects of fluids, for getting into flow of fluids lets look at some parameters.</h2>
				<div class="table-responsive-sm text-center">
					<table class="table table-light shadow mb-5 bg-body">
						<thead><tr><th colspan="3">Contents of this page (Click to go)</th></tr><tr><th><a class="btn place_content p-2" href="#orifices">Orifices</a></th><th><a class="btn place_content p-2" href="#tat">Tank and Time</a></th><th><a class="btn place_content p-2" href="#mouth">Mouthpiece</a></th></tr><tr><th><a class="btn place_content p-2" href="#naw">Notch and Weir</a></th><th><a class="btn place_content p-2" href="#nat">Notch and Time</a></th></tr></thead>
					</table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2"><b>Venturimeter</b></h1>
				<div class="table-responsive-sm text-center">
					<table class="table shadow mb-5 bg-body">
				        <thead><tr><th colspan="4">Venturimeter is device used to measure the rate of flow of a any fluid flowing through a pipe. Water flows through inlet and converges at throat causing pressure head which hepls in determining flow rate.<br>(NOTE : Diameter of inlet is always greater than diameter of throat.)</th></tr>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="ventData.token" ng-init="ventData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="ventData.type" ng-init="ventData.type='VEN'">
				            <tr><th>Pressure Head ({{ ventData.eJJs4kx }} mm)</th><td colspan="3"><input class="form-control" type="number" ng-model="ventData.eJJs4kx" placeholder="Enter Pressure" ng-change="submitVent()"></td></tr>
				            <tr><th>Diameter of Inlet ({{ ventData.eLmz3jc }} mm)</th><td colspan="3"><input class="form-control" type="number" ng-model="ventData.eLmz3jc" placeholder="Enter diameter in mm" ng-change="submitVent()"></td></tr>
				            <tr><th>Diameter of Throat ({{ ventData.hSn2Uz }} mm)</th><td colspan="3"><input class="form-control" type="number" ng-model="ventData.hSn2Uz" placeholder="Enter diameter in mm" ng-change="submitVent()"></td></tr>
				            <tr><th colspan="4">Acceleration due to gravity ({{ ventData.qYan8df }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="ventData.qYan8df" ng-change="submitVent()"></th></tr>
				            <tr><th colspan="4">Coefficient of discharge(Actual Flow Rate / Theoretical Flow Rate)(c<sub>d</sub> = {{ ventData.j1Anzye }})<br><br><input class="form-control head slider" type="range" min="0.9" max="1" step="0.01" ng-model="ventData.j1Anzye" ng-change="submitVent()"></th></tr>
				        </thead>
					    <tbody ng-if="((ventData.eJJs4kx>0) && (ventData.eLmz3jc>0) && (ventData.hSn2Uz>0) && (ventData.eLmz3jc>ventData.hSn2Uz))"><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Condition</th><th>with g = 9.81 m/s²</th><th>with g = {{ eMzNNa[14] }} m/s²</th></tr>
					        <tr><th colspan="2">Velocity at throat(in m/s)</th><td>{{ eMzNNa[0] }}</td><td>{{ eMzNNa[1] }}</td></tr>
					        <tr><th colspan="2">Theoretical Flow Rate(in mm³/s)</th><td>{{ eMzNNa[2] }}</td><td>{{ eMzNNa[3] }}</td></tr>
					        <tr><th colspan="2">Theoretical Flow Rate(in cm³/s)</th><td>{{ eMzNNa[4] }}</td><td>{{ eMzNNa[5] }}</td></tr>
					        <tr><th colspan="2">Theoretical Flow Rate(in Litres/s)</th><td>{{ eMzNNa[6] }}</td><td>{{ eMzNNa[7] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate(in mm³/s)(c<sub>d</sub>={{ eMzNNa[15] }})</th><td>{{ eMzNNa[8] }}</td><td>{{ eMzNNa[9] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate(in cm³/s)(c<sub>d</sub>={{ eMzNNa[15] }})</th><td>{{ eMzNNa[10] }}</td><td>{{ eMzNNa[11] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate(in Litres/s)(c<sub>d</sub>={{ eMzNNa[15] }})</th><td>{{ eMzNNa[12] }}</td><td>{{ eMzNNa[13] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Orifice Meter<br> It is device used to measure flow rate of fluid works same as venturimeter but one difference is that venturimeter contracts at throat but in case of orifice meter it contracts are vena-contracta. Compare flow rates of venturimeter and orifice meter.</th></tr>
				            <tr bgcolor="#07eda0"><th colspan="4">Pressure Head = {{ ventData.eJJs4kx }} mm</th></tr>
				            <tr bgcolor="#07eda0"><th colspan="4">Diameter of Inlet = {{ ventData.eLmz3jc }} mm</th></tr>
				            <tr bgcolor="#07eda0"><th colspan="4">Diameter of Orifice = {{ ventData.hSn2Uz }} mm</th></tr>
				            <tr bgcolor="#07eda0"><th colspan="4">Coefficient of Contraction (Area of Vena-Contracta/Area of Orifice) (c<sub>c</sub>) = {{ ventData.eNZZm4k }}<br><br><input class="form-control head slider" type="range" min="0.6" max="0.7" step="0.01" ng-model="ventData.eNZZm4k" ng-change="submitVent()"></th></tr>
				        </form>
				            <tr><td colspan="4">Diameter of Vena-Contracta(in mm) = {{ eMzNNa[16] }}</td></tr>
				            <tr><th>Coefficient of discharge(c<sub>d</sub>)=(c<sub>c</sub>*c<sub>v</sub>)</td><td colspan="3">{{ eMzNNa[17] }}</td></tr>
				            <tr><th colspan="2">Coefficient of Velocity(Actual Velocity/Theoretical Velocity)(c<sub>v</sub>)</th><td colspan="2">{{ eMzNNa[18] }}</td></tr>
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Condition</th><th>with g = 9.81 m/s²</th><th>with g = {{ eMzNNa[14] }} m/s²</th></tr>
					        <tr><th colspan="2">Theoretical Velocity at orifice(in m/s)</th><td>{{ eMzNNa[19] }}</td><td>{{ eMzNNa[20] }}</td></tr><tr><th colspan="2">Actual Velocity at orifice(in m/s)</th><td>{{ eMzNNa[21] }}</td><td>{{ eMzNNa[22] }}</td></tr>
					        <tr><th colspan="2">Theoretical Flow Rate(in mm³/s)</th><td>{{ eMzNNa[2] }}</td><td>{{ eMzNNa[3] }}</td></tr><tr><th colspan="2">Theoretical Flow Rate(in cm³/s)</th><td>{{ eMzNNa[4] }}</td><td>{{ eMzNNa[5] }}</td></tr><tr><th colspan="2">Theoretical Flow Rate(in Litres/s)</th><td>{{ eMzNNa[6] }}</td><td>{{ eMzNNa[7] }}</td></tr><tr><th colspan="2">Actual Flow Rate(in mm<sup>3</sup>/s)(c<sub>d</sub>={{ eMzNNa[17] }})</th><td>{{ eMzNNa[23] }}</td><td>{{ eMzNNa[24] }}</td></tr><tr><th colspan="2">Actual Flow Rate(in cm<sup>3</sup>/s)(c<sub>d</sub>={{ eMzNNa[17] }})</th><td>{{ eMzNNa[25] }}</td><td>{{ eMzNNa[26] }}</td></tr><tr><th colspan="2">Actual Flow Rate(in Litres/s)(c<sub>d</sub>={{ eMzNNa[17] }})</th><td>{{ eMzNNa[27] }}</td><td>{{ eMzNNa[28] }}</td></tr>
					    </tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="orifices"><b>Orifices</b></h1>
				<div class="table-responsive-sm text-center">
					<table class="table shadow mb-5 bg-body">
				        <thead>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="oriData.token" ng-init="oriData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="oriData.type" ng-init="oriData.type='ORI'">
				            <tr><th colspan="4"><img src="images/orificeopen.PNG" class="img-fluid img-thumbnail" alt="..."></th></tr>
				            <tr><th colspan="4">Height above top surface of orifice from water surface ({{ oriData.wKmz1km }} mm)<br><br><input class="form-control" type="number" min="0" ng-model="oriData.wKmz1km" placeholder="Enter Height in mm" ng-change="submitOrf()"></td></tr>
				            <tr><th>Height of orifice ({{ oriData.qKKmZ2s }} cm)</th><td colspan="3"><input class="form-control" type="number" ng-model="oriData.qKKmZ2s" placeholder="Enter height in cm" ng-change="submitOrf()"></td></tr>
				            <tr><th>Width of orifice ({{ oriData.tYUnz2h }} cm)</th><td colspan="3"><input class="form-control" type="number" ng-model="oriData.tYUnz2h" placeholder="Enter width in cm" ng-change="submitOrf()"></td></tr>
				            <tr><th colspan="4">Coefficient of Discharge(c<sub>d</sub> = {{ oriData.gS5Isbg }})<br><br><input class="form-control head slider" type="range" min="0.6" max="0.7" step="0.01" ng-model="oriData.gS5Isbg" ng-change="submitOrf()"></th></tr>
				            <tr><th colspan="4">Acceleration due to gravity ({{ oriData.fNz5dHs }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="oriData.fNz5dHs" ng-change="submitOrf()"></th></tr>
				        </thead>
					    <tbody ng-if="((oriData.wKmz1km>0) && (oriData.qKKmZ2s>0) && (oriData.tYUnz2h>0))">
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Condition<br>(Orifice is full open)</th><th>with g = 9.81 m/s²</th><th>with g = {{ oriData.fNz5dHs }} m/s²</th></tr><tr><th colspan="2">Actual Flow Rate(in m<sup>3</sup>/s)(c<sub>d</sub>={{ tKMz8gh[6] }})</th><td>{{ tKMz8gh[0] }}</td><td>{{ tKMz8gh[1] }}</td></tr><tr><th colspan="2">Actual Flow Rate(in cm<sup>3</sup>/s)(c<sub>d</sub>={{ tKMz8gh[6] }})</th><td>{{ tKMz8gh[2] }}</td><td>{{ tKMz8gh[3] }}</td></tr><tr><th colspan="2">Actual Flow Rate(in Litres/s)(c<sub>d</sub>={{ tKMz8gh[6] }})</th><td>{{ tKMz8gh[4] }}</td><td>{{ tKMz8gh[5] }}</td></tr>
					        <tr><th colspan="2"><img src="images/orificefull.PNG" class="img-fluid img-thumbnail" alt="..."></th><th colspan="2"><img src="images/orificepar.PNG" class="img-fluid img-thumbnail" alt="..."></th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">If orifice is fully submerged or partially submerged in liquid its flow rate change. So liquid has to be above top surface for fully submerged criteria and for partially submerged liquid should be on orifice mouth.</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="2">Height H = {{ oriData.hKK2nze }} mm</th><td colspan="2"><input class="form-control" type="number" ng-model="oriData.hKK2nze" placeholder="Enter Height in mm" ng-change="submitOrf()"></td></tr>
				        </form>
				        	<tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">{{ tKMz8gh[7] }}</td></tr>
				        	<tr><th colspan="2">{{ tKMz8gh[8] }}(in m<sup>3</sup>/s)(c<sub>d</sub>={{ tKMz8gh[6] }})</th><td>{{ tKMz8gh[9] }}</td><td>{{ tKMz8gh[10] }}</td></tr>
					    	<tr><th colspan="2">{{ tKMz8gh[8] }}(in cm<sup>3</sup>/s)(c<sub>d</sub>={{ tKMz8gh[6] }})</th><td>{{ tKMz8gh[11] }}</td><td>{{ tKMz8gh[12] }}</td></tr>
					    	<tr><th colspan="2">{{ tKMz8gh[8] }}(in Litres/s)(c<sub>d</sub>={{ tKMz8gh[6] }})</th><td>{{ tKMz8gh[13] }}</td><td>{{ tKMz8gh[14] }}</td></tr>
					    </tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="tat"><b>Tank and Time</b></h1>
				<div class="table-responsive-sm text-center">
					<table class="table shadow mb-5 bg-body">
				    	<thead>
				    	<form align="center" method="POST">
					        <input type="hidden" ng-model="tatData.token" ng-init="tatData.token='<?php echo $_SESSION['_token']; ?>'">
					        <input type="hidden" ng-model="tatData.type" ng-init="tatData.type='TAT'">
					        <tr><th colspan="4">Area of orifice at botton of tank ({{ tatData.qJJs2iu }}  mm²)<br><br><input class="form-control" type="number" ng-model="tatData.qJJs2iu" placeholder="Enter Area" ng-change="submitTat()"><br>1 m<sup>2</sup>= 10 <sup>6</sup>mm<sup>2</sup><br>1 m<sup>2</sup>= 10 <sup>4</sup>cm<sup>2</sup></th></tr>
					        <tr><th colspan="2">Height of liquid in tank ({{ tatData.YsJ7gx }} cm)</th><td colspan="2"><input class="form-control" type="number" ng-model="tatData.YsJ7gx" placeholder="Enter height in cm" ng-change="submitTat()"></td></tr>
					        <tr><th colspan="2">Height of liquid after some time ({{ tatData.a9oSmzr }} cm)</th><td colspan="2"><input class="form-control" type="number" ng-model="tatData.a9oSmzr" placeholder="Enter height in cm" ng-change="submitTat()"></td></tr>
					        <tr><th colspan="4">Coefficient of Discharge(c<sub>d</sub>) = {{ tatData.skI8sKK }}<br><br><input class="form-control head slider" type="range" min="0.6" max="0.7" step="0.01" ng-model="tatData.skI8sKK" ng-change="submitTat()"></th></tr>
					        <tr><th colspan="4">Acceleration due to gravity ({{ tatData.pL4jxns }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="tatData.pL4jxns" ng-change="submitTat()"></th></tr>
					        <tr><th colspan="4">For normal upright tank we need to know the area of tank. So below is the area need to enter of tank to get time.</th></tr>
					        <tr><th colspan="4">Area of Tank  ({{ tatData.wPP3kxt }} mm²)<br><input class="form-control" type="number" ng-model="tatData.wPP3kxt" placeholder="Enter Area" ng-change="submitTat()"><br>1 m² = 10 <sup>6</sup>mm²<br>1 m²= 10 <sup>4</sup>cm²</th></tr>
				        </thead>
					    <tbody ng-if="(wIIk9jh[0]==1)">
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Note</th><th>with g = 9.81 m/s²</th><th>with g = {{ tatData.pL4jxns }} m/s²</th></tr>
					        <tr><th colspan="2">{{ wIIk9jh[1] }}</th><td>{{ wIIk9jh[2] }}</td><td>{{ wIIk9jh[3] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">For spherical tank we need to know the radius of tank. So below is the radius need to enter of tank to get time.</th></tr>
				            <tr bgcolor="#07eda0"><th colspan="2">Radius of Tank ({{ tatData.qik7Zne }} m)</th><td colspan="2"><input class="form-control" type="number" ng-model="tatData.qik7Zne" placeholder="Enter Radius" ng-change="submitTat()"></td></tr>
					        <tr ng-if="(tatData.qik7Zne>0)"><th colspan="2">{{ wIIk9jh[4] }}</th><td>{{ wIIk9jh[5] }}</td><td>{{ wIIk9jh[6] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">For cylindrical tank we need to know the radius of tank which is given above for sphere but also length is need too entered. So below is the length need to enter of tank to get time.</th></tr>
				            <tr bgcolor="#07eda0"><th colspan="2">Length of Tank ({{ tatData.qUUs4kn }} m)</th><td colspan="2"><input class="form-control" type="number" ng-model="tatData.qUUs4kn" placeholder="Enter Length" ng-change="submitTat()"></td></tr>
					        <tr ng-if="(tatData.qUUs4kn>0)"><th colspan="2">{{ wIIk9jh[7] }}</th><td>{{ wIIk9jh[8] }}</td><td>{{ wIIk9jh[9] }}</td></tr>
				        </form>
						</tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="mouth"><b>Mouthpiece</b></h1>
				<div class="table-responsive-sm text-center">
					<table class="table shadow mb-5 bg-body">
				        <thead><tr><th colspan="4">Mouthpiece is short pipe 2 to 3 time diameter in length. It is used to increase discharge rate of orifice by adding mouthpiece on it externally.</th></tr>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="mouthData.token" ng-init="mouthData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="mouthData.type" ng-init="mouthData.type='MP'">
				            <tr><th colspan="4">Coefficient of Contraction (c<sub>c</sub> = {{ mouthData.wNZ7kfg }})<br><br><input class="form-control head slider" type="range" min="0.6" max="0.7" step="0.01" ng-model="mouthData.wNZ7kfg" ng-change="submitMouth()"></th></tr>
				        </form></thead>
					    <tbody><tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Note</th><th>Mouthpiece</th><th>Orifice</th></tr><tr><th colspan="2">Coefficient of discharge</th><td>{{ Omz33hs[0] }}</td><td>{{ Omz33hs[1] }}</td></tr></tbody>
				    </table>
				</div>
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="naw"><b>Notches and Weir</b></h1>
				<div class="table-responsive-sm text-center">
					<table class="table shadow mb-5 bg-body">
				        <thead>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="nawData.token" ng-init="nawData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="nawData.type" ng-init="nawData.type='NAW'">
				            <tr><th colspan="2">Height of liquid above notch ({{ nawData.aMz }} cm)</th><td colspan="2"><input class="form-control" type="number" ng-model="nawData.aMz" placeholder="Enter height in cm" ng-change="submitNaw()"></td></tr>
				            <tr><th colspan="2">Length of notch ({{ nawData.VVd }} cm)</th><td colspan="2"><input class="form-control" type="number" ng-model="nawData.VVd" placeholder="Enter length in cm" ng-change="submitNaw()"></td></tr>
				            <tr><th colspan="4">Coefficient of Discharge(c<sub>d</sub> = {{ nawData.aNz3d }})<br><br><input class="form-control head slider" type="range" min="0.6" max="0.7" step="0.01" ng-model="nawData.aNz3d" ng-change="submitNaw()"></th></tr>
				            <tr><th colspan="4">Acceleration due to gravity ({{ nawData.qBz7g }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="nawData.qBz7g" ng-change="submitNaw()"></th></tr>
				        </thead>
					    <tbody ng-if="((nawData.aMz>0) && (nawData.VVd>0))">
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Note</th><th>with g = 9.81 m/s²</th><th>with g = {{ gnValue }} m/s²</th></tr>
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4"><img src="images/rectnotch.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>Rectangular Notch</th></tr>
				            <tr><th colspan="2">Actual Flow Rate (in m<sup>3</sup>/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[0] }}</td><td>{{ uA0k[1] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate (in cm<sup>3</sup>/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[2] }}</td><td>{{ uA0k[3] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate (in Litres/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[4] }}</td><td>{{ uA0k[5] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4"><img src="images/trinotch.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>Triangular Notch<br><br>(NOTE: Triangular notch subtends angle at V-Section which also plays important role in discharge rate.)</td></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Angle ({{ nawData.zN1h }}°)<br><br><input class="form-control head slider" type="range" min="1" max="179" ng-model="nawData.zN1h" ng-change="submitNaw()"></td></tr>
				        </form>
				            <tr><th colspan="2">Actual Flow Rate (in m<sup>3</sup>/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[6] }}</td><td>{{ uA0k[7] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate (in cm<sup>3</sup>/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[8] }}</td><td>{{ uA0k[9] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate (in Litres/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[10] }}</td><td>{{ uA0k[11] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4"><img src="images/trapnotch.PNG" class="img-fluid img-thumbnail" alt="..."><br><br>Trapezoidal Notch<br><br>(NOTE: Trapezoidal notch is mixture of rectangular notch and triangular notch so both play important role in discharge rate, thats why on above entered parameters for triangular and rectangular both are clubed together to get discharge rate.)</td></tr>
				            <tr><th colspan="2">Actual Flow Rate (in m<sup>3</sup>/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[12] }}</td><td>{{ uA0k[13] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate (in cm<sup>3</sup>/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[14] }}</td><td>{{ uA0k[15] }}</td></tr>
					        <tr><th colspan="2">Actual Flow Rate (in Litres/s)(c<sub>d</sub>={{ uA0k[18] }})</th><td>{{ uA0k[16] }}</td><td>{{ uA0k[17] }}</td></tr>
					    </tbody>
				    </table>
				</div> 
				<h1 class="mt-2 mb-4 contentheader text-center p-2" id="nat"><b>Notch and Time</b></h1>
				<div class="table-responsive-sm text-center">
					<table class="table shadow mb-5 bg-body">
				        <thead>
				        <form align="center" method="POST">
				            <input type="hidden" ng-model="natData.token" ng-init="natData.token='<?php echo $_SESSION['_token']; ?>'">
				            <input type="hidden" ng-model="natData.type" ng-init="natData.type='NAT'">
				            <tr><th colspan="4">Area of Reservoir ({{ natData.Wk }} mm<sup>2</sup>)<br><br><input class="form-control" type="number" ng-model="natData.Wk" placeholder="Enter Area" ng-change="submitNat()"><br>1 m<sup>2</sup>= 10 <sup>6</sup>mm<sup>2</sup><br>1 m<sup>2</sup>= 10 <sup>4</sup>cm<sup>2</sup></th></tr>
				            <tr><th colspan="2">Height of liquid in tank ({{ natData.w4l }} cm)</th><td colspan="2"><input class="form-control" type="number" ng-model="natData.w4l" placeholder="Enter height in cm" ng-change="submitNat()"></td></tr>
				            <tr><th colspan="2">Height of liquid after some time ({{ natData.aM7h }} cm)</th><td colspan="2"><input class="form-control" type="number" ng-model="natData.aM7h" placeholder="Enter height in cm" ng-change="submitNat()"></td></tr>
				            <tr><th colspan="4">Coefficient of Discharge (c<sub>d</sub> = {{ natData.l2u }})<br><br><input class="form-control head slider" type="range" min="0.6" max="0.7" step="0.01" ng-model="natData.l2u" ng-change="submitNat()"></th></tr>
				            <tr><th colspan="4">Acceleration due to gravity ({{ natData.qY6n }} m/s²)<br><br><input class="form-control head slider" type="range" min="0.01" max="10.1" step="0.2" ng-model="natData.qY6n" ng-change="submitNat()"></th></tr>
				            <tr><th colspan="4">Rectangular Notch</th></tr>
				            <tr><th colspan="2">Length of Notch ({{ natData.gSa6b }} cm)</th><td colspan="2"><input class="form-control" type="number" min="0" ng-model="natData.gSa6b" placeholder="Enter Length" ng-change="submitNat()"></td></tr>
				        </thead>
					    <tbody ng-if="((tYsj3kn[0]==1) && (natData.w4l>natData.aM7h))">
				            <tr class="text-light" bgcolor="#0a0a0a"><th colspan="2">Note</th><th>with g = 9.81 m/s<sup>2</sup></th><th>with g = {{ (natData.qY6n) }} m/s<sup>2</sup></th></tr>
					        <tr><th colspan="2">{{ tYsj3kn[1] }}</th><td>{{ tYsj3kn[2] }}</td><td>{{ tYsj3kn[3] }}</td></tr>
					        <tr class="text-light" bgcolor="#0a0a0a"><th colspan="4">Triangular Notch<br><br>(NOTE: Triangular notch subtends angle at V-Section which also plays important role in time to empty tank.)</th></tr>
					        <tr bgcolor="#07eda0"><th colspan="4">Angle ({{ natData.jN3s }} °)<br><br><input class="form-control head slider" type="range" min="1" max="179" ng-model="natData.jN3s" ng-change="submitNat()"></th></tr>
					        <tr><th colspan="2">{{ tYsj3kn[4] }}</th><td>{{ tYsj3kn[5] }}</td><td>{{ tYsj3kn[6] }}</td></tr>
				        </form></tbody>
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
myApp.controller("myFluidInst",function ($scope,$http,$window) { $scope.enterData=true;
	$scope.submitVent=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/fluidinst?token=<?php echo $_SESSION['_token'] ?>", data:$scope.ventData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.eMzNNa=data.para.eMzNNa; } }); };
	$scope.submitOrf=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/fluidinst?token=<?php echo $_SESSION['_token'] ?>", data:$scope.oriData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.tKMz8gh=data.para.tKMz8gh; } }); };
	$scope.submitMouth=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/fluidinst?token=<?php echo $_SESSION['_token'] ?>", data:$scope.mouthData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.Omz33hs=data.para.Omz33hs; } }); };
	$scope.submitTat=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/fluidinst?token=<?php echo $_SESSION['_token'] ?>", data:$scope.tatData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.wIIk9jh=data.para.wIIk9jh; } }); };
	$scope.submitNaw=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/fluidinst?token=<?php echo $_SESSION['_token'] ?>", data:$scope.nawData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.uA0k=data.para.uA0k; } }); };
	$scope.submitNat=function(){ $http({  method:"POST", url:"asset/exponentialsmoothing/fluidinst?token=<?php echo $_SESSION['_token'] ?>", data:$scope.natData }).then(function (response){ var data = response.data; if(data.error){ } else{ $scope.tYsj3kn=data.para.tYsj3kn; } }); };
});
</script>