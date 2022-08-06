<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<?php getHeader(); ?>
</head>
<body ng-app="machinedesign" ng-controller="myBeamDesign">
	<?php getDashBoard(); ?>
				<div id="siding" class="col-sm-9 col-md-12 col-lg-9">
					<div class="container mb-5">
						<h1 class="animated fadeIn display-2 text-center mt-5"><b>Beams</b></h1><br><br>
						<div class="text-center mt-5 mb-5">
							<div ng-show="enterData">
								<h4>Beams are used to support load in transverse direction which induces axial force, tranverse force causing bending along the nuetral axis also deflection occuring and how will it effect with different material.</h4><br>
								<h3>As a engineer you can put beams where you have to support load. All the Best to create your own application.</h3>
								<br>
								<div  class="container text-center asking p-4 shadow mb-5 bg-body">
				                    <h1>I want to design beam for <b>force of {{ forceData.skw3mSQ }} N</b>, considering <b>factor of safety(FoS) as {{ forceData.ahsjWl2 }}</b> and <b>for length {{ forceData.jshjd9C }} mm</b>.</h1>
				                </div>
				                <div  class="container text-center parameters p-3 shadow mb-5 bg-body">
				                    <h1>Enter the parameters</h1><br>
				                        <form align="center" method="POST"  ng-submit="submitForce()">
				                            <input type="hidden" name="token" ng-model="forceData.token" ng-init="forceData.token='<?php echo $_SESSION['_token']; ?>'">
				                            <div class="row">
				                                <div class="col-sm-6">
				                                    <input type="number" name="skw3mSQ" ng-model="forceData.skw3mSQ" placeholder="Enter Force in N" class="form-control" autocomplete="name" autofocus>
				                                        <small ng-show="checkForce" class="note">{{ checkForce }}</small>
				                                        <small ng-show="checkForceVal" class="note">{{ checkForceVal }}</small><br>
				                                </div>
				                                <div class="col-sm-6">
				                                    <select name="jsLams2" class="form-control" ng-model="forceData.jsLams2">
				                                        <option value="">Select Material</option>
				                                        <option value="1">FG150</option>
				                                        <option value="2">FG220</option>
				                                        <option value="3">FG350</option>
				                                        <option value="4">WM400</option>
				                                        <option value="5">BM320</option>
				                                        <option value="6">PM500</option>
				                                        <option value="7">SG500/7</option>
				                                        <option value="8">30C8</option>
				                                        <option value="9">Stainless Steel(Alloy Steel)</option>
				                                        <option value="10">Alluminium Alloy</option>
				                                        <option value="11">Polyamide Nylon</option>
				                                        <option value="12">Low Density Polyethene</option>
				                                        <option value="13">Brass Cast</option>
				                                        <option value="14">Brass Wrought</option>
				                                        <option value="15">Bronze Cast</option>
				                                        <option value="16">Copper</option>
				                                        <option value="17">Gold</option>
				                                        <option value="18">Human Bone</option>
				                                        <option value="19">Bamboo</option>
				                                        <option value="20">Concrete</option>
				                                        <option value="21">Wood</option>
				                                    </select>
				                                        <small ng-show="checkMaterial" class="note"> {{ checkMaterial }}</small><br>
				                                </div>
				                            </div>
				                            <div class="row">
				                                <div class="col-sm-6">
				                                    <select name="ahsjWl2" class="form-control" ng-model="forceData.ahsjWl2">
				                                        <option value="">Select Factor of Safety</option>
				                                        <option value="1">1</option>
				                                        <option value="2">2</option>
				                                        <option value="3">3</option>
				                                        <option value="4">4</option>
				                                        <option value="5">5</option>
				                                        <option value="6">6</option>
				                                        <option value="7">7</option>
				                                        <option value="8">8</option>
				                                        <option value="9">9</option>
				                                        <option value="10">10</option>
				                                    </select>
				                                        <small ng-show="checkFos" class="note"> {{ checkFos }}</small><br>
				                                </div>
				                                <div class="col-sm-6">
				                                    <input type="number" name="jshjd9C" ng-model="forceData.jshjd9C" placeholder="Enter Length in mm" class="form-control" autocomplete="name" autofocus>
				                                        <small ng-show="checkLen" class="note">{{ checkLen }}</small>
				                                </div>
				                            </div>
				                            <div class="text-center mt-5">
				                                <input type="submit" name="aoEn5us" class="btn formulate" value="Analyze"><br><br>
				                            </div>
				                        </form>
				                	</div>
				                </div>
				            <div  class="container text-center designdone mb-5" ng-show="finalResult">
				                    <div class="row">
				                    	<div class="col-sm-6 mt-5">
				                    		<h1 class="mt-2 mb-4 contentheader p-2"><b>Data</b></h1>
						                    <table class="table table-responsive-sm shadow mb-5 bg-body">
						                        <thead>
						                            <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th>Value</th></tr>
						                        </thead>
						                        <tbody>
						                            <tr><th>Maximum Moment(in N-mm)</th><td>{{ momcantvalue }}</td></tr>
						                            <tr><th>Bending Stress(in N/mm2)</th><td>{{ bendvalue | roundnum }}</td></tr>
						                            <tr><th>Material</th><td>{{ matvalue }}</td></tr>
						                        </tbody>
						                    </table>
				                    	</div>
				                    	<div class="col-sm-6 mt-5">
				                    			<h1 class="mt-2 mb-4 contentheader p-2"><b>Entered Parameters</b></h1>
						                        <table class="table table-responsive-sm shadow mb-5 bg-body">
						                            <thead>
						                                <tr class="text-light" bgcolor="#0a0a0a"><th>Parameter</th><th>Value</th></tr>
						                            </thead>
						                            <tbody>
						                                <tr><th>Force (in N)</th><td>{{ forcevalue }}</td></tr>
						                                <tr><th>FoS</th><td>{{ fosvalue }}</td></tr>
						                                <tr><th>Length(in mm)</th><td>{{ lenvalue }}</td></tr>
						                            </tbody>
						                        </table>	
				                    	</div>
				                   	</div>
				                    <br><br><h1 class="mt-2 mb-5"><b>Simply Supported Beam</b></h1><br>
				                    <h1 class="mt-2 mb-4 contentheader p-2"><b>Tabular Data</b></h1>
				                        <table class="table table-responsive-sm shadow mb-5 bg-body">
				                            <thead>
				                            	<tr>
				                            		<th colspan="5"><img src="images/sisbeam.PNG" class="img-fluid img-thumbnail" alt="..."></th>
				                            	</tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th><button type="button" class="btn left" data-toggle="modal" ng-click="fsValue=fsValue-1"><i class="fas fa-chevron-left"></i></button></th>
				                            		<th colspan="3">Force = ({{ fsValue }}N)</th>
				                            		<td align="right"><button type="button" class="btn right" data-toggle="modal" ng-click="fsValue=fsValue+1"><i class="fas fa-chevron-right"></i></button></td>
				                            	</tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th colspan="5"><input class="form-control head slider" type="range" min="{{ (forcevalue*0.8) }}" max="{{ (forcevalue*1.2) }}" ng-model="fsValue"></th>
				                            	</tr>
				                            	<tr bgcolor="#4287f5"><th colspan="5">Vary FOS with slider({{ fosValue }})<br><br><input class="form-control head slider" type="range" min="1" max="10" ng-model="fosValue"></th></tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th><button type="button" class="btn left" data-toggle="modal" ng-click="lsValue=lsValue-1"><i class="fas fa-chevron-left"></i></button></th>
				                            		<th colspan="3"></th>
				                            		<td align="right"><button type="button" class="btn right" data-toggle="modal" ng-click="lsValue=lsValue+1"><i class="fas fa-chevron-right"></i></button></td>
				                            	</tr>
				                            	<tr bgcolor="#4287f5"><th colspan="5">Vary Force ({{ fsValue }} N) application point anywhere on beam of length {{ lenvalue }} mm from left end({{ lsValue }} mm)<br><br><input class="form-control head slider" type="range" min="0" max="{{ lenvalue }}" ng-model="lsValue"></th></tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th><button type="button" class="btn left" data-toggle="modal" ng-click="xsValue=xsValue-1"><i class="fas fa-chevron-left"></i></button></th>
				                            		<th colspan="3"></th>
				                            		<td align="right"><button type="button" class="btn right" data-toggle="modal" ng-click="xsValue=xsValue+1"><i class="fas fa-chevron-right"></i></button></td>
				                            	</tr>
				                            	<tr bgcolor="#4287f5"><th colspan="5">Vary along cross section of beam from left end  ({{ xsValue }} mm):<br>Max. Deflection at {{ ((((lsValue*1.00)*(lsValue*1.00))+((lsValue*2.00)*((lenvalue*1.00)-(lsValue*1.00))))/3 | squareroot) | roundnum }} mm<br><br><input class="form-control head slider" type="range" min="0" max="{{ lenvalue }}" ng-model="xsValue"></tr>
				                            	<tr class="alert alert-warning"><th>NOTE: </th><th colspan="2">1. As force in increasing, deflection is decreasing because cross section also changes.</th><th colspan="2">2. Length of beam on which load is shifted is {{ lenvalue }} mm which is fixed as enetered.</th></tr>
				                                <tr class="text-light" bgcolor="#0a0a0a"><th>Shapes of cross section</th><th colspan="2">Deflection(in mm)</th><th colspan="2">Dimension(in mm)</th></tr>
				                            </thead>
				                            <tbody>
				                            	<tr>
				                            		<th>Moment/Maximum(at {{ lsValue }} mm) (in N-mm)</th><td colspan="4">
				                            			<span ng-if="xsValue<=lsValue">{{ ((fsValue*1.00)*((lenvalue*1.00)-(lsValue*1.00))*(xsValue*1.00))/(lenvalue*1.00) | roundnum }}</span><span ng-if="xsValue>lsValue">{{ ((fsValue*1.00)*(lsValue*1.00)*((lenvalue*1.00)-(xsValue*1.00)))/(lenvalue*1.00) | roundnum }}</span>/{{ ((fsValue*1.00)*(lsValue*1.00)*((lenvalue*1.00)-(lsValue*1.00)))/(lenvalue*1.00) | roundnum }}</td>
				                            	</tr>
				                                <tr>
				                                	<th>Circular</th>
				                                	<td colspan="2">
				                                		<span ng-if="xsValue<=lsValue">
				                                			{{ (((fsValue*3.4)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*10.19)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*(xsValue*1.00)*(((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00)))-((xsValue)*(xsValue))))) | roundnum }}
				                                		</span>
				                                		<span ng-if="xsValue>lsValue">
				                                			{{ (((fsValue*3.4)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*10.19)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*((((lenvalue*1.00)/((lenvalue*1.00)-(lsValue*1.00)))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00)))+((((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00))))*(xsValue*1.00))-((xsValue*1.00)*(xsValue*1.00)*(xsValue*1.00))))) | roundnum }}
				                                		</span>
				                                	</td>
				                                	<td colspan="2">Dia.= {{ (((((fsValue*10.19)*((lenvalue*1.00)-(lsValue*1.00))*(lsValue*1.00))*(focValue*1.00))/((bends*1.00)*(lenvalue*1.00))) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>Square</th>
				                                	<td colspan="2">
				                                		<span ng-if="xsValue<=lsValue">
				                                			{{ (((fsValue*2.00)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*6.00)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*(xsValue*1.00)*(((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00)))-((xsValue)*(xsValue))))) | roundnum }}
				                                		</span>
				                                		<span ng-if="xsValue>lsValue">
				                                			{{ (((fsValue*2.00)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*6.00)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*((((lenvalue*1.00)/((lenvalue*1.00)-(lsValue*1.00)))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00)))+((((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00))))*(xsValue*1.00))-((xsValue*1.00)*(xsValue*1.00)*(xsValue*1.00))))) | roundnum }}
				                                		</span>
				                                	</td>
				                                	<td colspan="2">Each Side = {{ (((((fsValue*6.00)*((lenvalue*1.00)-(lsValue*1.00))*(lsValue*1.00))*(focValue*1.00))/((bends*1.00)*(lenvalue*1.00))) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>Rectangular(Length=2*Breadth)<br>(Load parallel to breadth.)</th>
				                                	<td colspan="2">
				                                		<span ng-if="xsValue<=lsValue">
				                                			{{ (((fsValue*1.00)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*3.00)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*(xsValue*1.00)*(((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00)))-((xsValue)*(xsValue))))) | roundnum }}
				                                		</span>
				                                		<span ng-if="xsValue>lsValue">
				                                			{{ (((fsValue*1.00)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*3.00)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*((((lenvalue*1.00)/((lenvalue*1.00)-(lsValue*1.00)))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00)))+((((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00))))*(xsValue*1.00))-((xsValue*1.00)*(xsValue*1.00)*(xsValue*1.00))))) | roundnum }}
				                                		</span>
				                                	</td>
				                                	<td colspan="2">Breadth = {{ (((((fsValue*3.00)*((lenvalue*1.00)-(lsValue*1.00))*(lsValue*1.00))*(focValue*1.00))/((bends*1.00)*(lenvalue*1.00))) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>Ellipse(Major Axis=2*Minor Axis)<br>(Load parallel to major axis.)</th>
				                                	<td colspan="2">
				                                		<span ng-if="xsValue<=lsValue">
				                                			{{ (((fsValue*0.85)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*2.55)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*(xsValue*1.00)*(((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00)))-((xsValue)*(xsValue))))) | roundnum }}
				                                		</span>
				                                		<span ng-if="xsValue>lsValue">
				                                			{{ (((fsValue*0.85)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*2.55)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*((((lenvalue*1.00)/((lenvalue*1.00)-(lsValue*1.00)))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00)))+((((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00))))*(xsValue*1.00))-((xsValue*1.00)*(xsValue*1.00)*(xsValue*1.00))))) | roundnum }}
				                                		</span>
				                                	</td>
				                                	<td colspan="2">Minor Axis = {{ (((((fsValue*2.55)*((lenvalue*1.00)-(lsValue*1.00))*(lsValue*1.00))*(focValue*1.00))/((bends*1.00)*(lenvalue*1.00))) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>I-Section(3 Flanges)(Length=2*Breadth)</th>
				                                	<td colspan="2">
				                                		<span ng-if="xsValue<=lsValue">
				                                			{{ (((fsValue*0.03)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*0.09)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*(xsValue*1.00)*(((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00)))-((xsValue)*(xsValue))))) | roundnum }}
				                                		</span>
				                                		<span ng-if="xsValue>lsValue">
				                                			{{ (((fsValue*0.03)/((mate*1.00)*(lenvalue*1.00)*(((((((fsValue*0.09)*((lenvalue*1.00)-(lsValue*1.00)))*(fosValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*(((lenvalue*1.00)-(lsValue*1.00))*((((lenvalue*1.00)/((lenvalue*1.00)-(lsValue*1.00)))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00))*((xsValue*1.00)-(lsValue*1.00)))+((((lenvalue*1.00)*(lenvalue*1.00))-(((lenvalue*1.00)-(lsValue*1.00))*((lenvalue*1.00)-(lsValue*1.00))))*(xsValue*1.00))-((xsValue*1.00)*(xsValue*1.00)*(xsValue*1.00))))) | roundnum }}
				                                		</span>
				                                	</td>
				                                	<td colspan="2">Breadth = {{ (((((fsValue*0.09)*((lenvalue*1.00)-(lsValue*1.00))*(lsValue*1.00))*(focValue*1.00))/((bends*1.00)*(lenvalue*1.00))) | cuberoot) | roundnum }}</td>
				                                </tr>				                            
				                            </tbody>
				                        </table>
				                    <br><br><h1 class="mt-2 mb-5"><b>Cantilever Beam</b></h1><br>
				                    <h1 class="mt-2 mb-4 contentheader p-2"><b>Tabular Data</b></h1>
				                        <table class="table table-responsive-sm shadow mb-5 bg-body">
				                            <thead>
				                            	<tr>
				                            		<th colspan="5"><img src="images/cabeam.PNG" class="img-fluid img-thumbnail" alt="..."></th>
				                            	</tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th><button type="button" class="btn left" data-toggle="modal" ng-click="fcValue=fcValue-1"><i class="fas fa-chevron-left"></i></button></th>
				                            		<th colspan="3">Force = ({{ fcValue }}N)</th>
				                            		<td align="right"><button type="button" class="btn right" data-toggle="modal" ng-click="fcValue=fcValue+1"><i class="fas fa-chevron-right"></i></button></td>
				                            	</tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th colspan="5"><input class="form-control head slider" type="range" min="{{ (forcevalue*0.8) }}" max="{{ (forcevalue*1.2) }}" ng-model="fcValue"></th>
				                            	</tr>
				                            	<tr bgcolor="#4287f5"><th colspan="5">Vary FOS with slider({{ focValue }})<br><input class="form-control head slider" type="range" min="1" max="10" ng-model="focValue"></th></tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th><button type="button" class="btn left" data-toggle="modal" ng-click="lcValue=lcValue-1"><i class="fas fa-chevron-left"></i></button></th>
				                            		<th colspan="3"></th>
				                            		<td align="right"><button type="button" class="btn right" data-toggle="modal" ng-click="lcValue=lcValue+1"><i class="fas fa-chevron-right"></i></button></td>
				                            	</tr>
				                            	<tr bgcolor="#4287f5"><th colspan="5">Vary Force ({{ fcValue }} N) application point anywhere on beam of length {{ lenvalue }} mm from right end({{ lcValue }} mm)<br><br><input class="form-control head slider" type="range" min="0" max="{{ lenvalue }}" ng-model="lcValue"></th></tr>
				                            	<tr bgcolor="#4287f5">
				                            		<th><button type="button" class="btn left" data-toggle="modal" ng-click="xcValue=xcValue-1"><i class="fas fa-chevron-left"></i></button></th>
				                            		<th colspan="3"></th>
				                            		<td align="right"><button type="button" class="btn right" data-toggle="modal" ng-click="xcValue=xcValue+1"><i class="fas fa-chevron-right"></i></button></td>
				                            	</tr>
				                            	<tr bgcolor="#4287f5"><th colspan="5">Vary along cross section of beam from right end  ({{ xcValue }} mm):<br>Max. Deflection at 0 mm<br><br><input class="form-control head slider" type="range" min="0" max="{{ lenvalue }}" ng-model="xcValue"></th></tr>
				                            	<tr class="alert alert-warning"><th>NOTE: </th><th colspan="2">1. As force in increasing, deflection is decreasing because cross section also changes.</th><th colspan="2">2. Length of beam on which load is shifted is {{ lenvalue }} mm which is fixed as enetered.</th></tr>
				                                <tr class="text-light" bgcolor="#0a0a0a"><th>Shapes of cross section</th><th colspan="2">Delfection(in mm)</th><th colspan="2">Dimension(in mm)</th></tr>
				                            </thead>
				                            <tbody>
				                            	<tr>
				                            		<th>Moment/Maximum(at 0 mm) (in N-mm)</th><td colspan="4">
				                            			<span ng-if="xcValue>=lcValue">{{ ((fcValue*1.00)*((xcValue*1.00)-(lcValue*1.00))) | roundnum }}</span><span ng-if="xcValue<lcValue">0</span>/{{ ((fcValue*1.00)*((lenvalue*1.00)-(lcValue*1.00))) | roundnum }}</td>
				                            	</tr>
				                                <tr>
				                                	<th>Circular</th>
				                                	<td  colspan="2">
				                                		<span ng-if="xcValue>lcValue"> 
				                                		{{ (((fcValue*3.4)/((mate*1.00)*(((((((fcValue*10.19)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*((((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00)))+(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((2.00*lenvalue)-(3.00*xcValue)+(lcValue*1.00)))) | roundnum }}</span>
				                                		<span ng-if="xcValue<=lcValue">{{ (((fcValue*20.37)/((mate*1.00)*((((((fcValue*10.19)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1))*(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((((lenvalue*1.00)-(lcValue*1.00))/3.00)+(((lcValue*1.00)-(xcValue*1.00))/2.00))) | roundnum }}</span>
				                                	</td>
				                                	<td  colspan="2">Dia.= {{ (((((fcValue*10.19)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>Square</th>
				                                	<td  colspan="2">
				                                		<span ng-if="xcValue>lcValue"> 
				                                		{{ (((fcValue*2.00)/((mate*1.00)*(((((((fcValue*6.00)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*((((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00)))+(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((2.00*lenvalue)-(3.00*xcValue)+(lcValue*1.00)))) | roundnum }}</span>
				                                		<span ng-if="xcValue<=lcValue">{{ (((fcValue*12.00)/((mate*1.00)*((((((fcValue*6.00)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1))*(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((((lenvalue*1.00)-(lcValue*1.00))/3.00)+(((lcValue*1.00)-(xcValue*1.00))/2.00))) | roundnum }}</span>
				                                	</td>
				                                	<td  colspan="2">Each Side = {{ (((((fcValue*6.00)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>Rectangular(Length=2*Breadth)<br>(Load parallel to breadth.)</th>
				                                	<td  colspan="2">
				                                		<span ng-if="xcValue>lcValue"> 
				                                		{{ (((fcValue*1.00)/((mate*1.00)*(((((((fcValue*3.00)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*((((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00)))+(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((2.00*lenvalue)-(3.00*xcValue)+(lcValue*1.00)))) | roundnum }}</span>
				                                		<span ng-if="xcValue<=lcValue">{{ (((fcValue*6.00)/((mate*1.00)*((((((fcValue*3.00)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1))*(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((((lenvalue*1.00)-(lcValue*1.00))/3.00)+(((lcValue*1.00)-(xcValue*1.00))/2.00))) | roundnum }}</span>
				                                	</td>
				                                	<td  colspan="2">Breadth = {{ (((((fcValue*3.00)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>Ellipse(Major Axis=2*Minor Axis)<br>(Load parallel to major axis.)</th>
				                                	<td  colspan="2">
				                                		<span ng-if="xcValue>lcValue"> 
				                                		{{ (((fcValue*0.85)/((mate*1.00)*(((((((fcValue*2.55)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*((((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00)))+(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((2.00*lenvalue)-(3.00*xcValue)+(lcValue*1.00)))) | roundnum }}</span>
				                                		<span ng-if="xcValue<=lcValue">{{ (((fcValue*5.1)/((mate*1.00)*((((((fcValue*2.55)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1))*(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((((lenvalue*1.00)-(lcValue*1.00))/3.00)+(((lcValue*1.00)-(xcValue*1.00))/2.00))) | roundnum }}</span>
				                                	</td>
				                                	<td  colspan="2">Minor Axis = {{ (((((fcValue*2.55)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | roundnum }}</td>
				                                </tr>
				                                <tr>
				                                	<th>I-Section(3 Flanges)(Length=2*Breadth)</th>
				                                	<td  colspan="2">
				                                		<span ng-if="xcValue>lcValue"> 
				                                		{{ (((fcValue*0.03)/((mate*1.00)*(((((((fcValue*0.09)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1)))*((((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00))*((xcValue*1.00)-(lcValue*1.00)))+(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((2.00*lenvalue)-(3.00*xcValue)+(lcValue*1.00)))) | roundnum }}</span>
				                                		<span ng-if="xcValue<=lcValue">{{ (((fcValue*0.18)/((mate*1.00)*((((((fcValue*0.09)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | quadra)+1))*(((lenvalue*1.00)-(lcValue*1.00))*((lenvalue*1.00)-(lcValue*1.00)))*((((lenvalue*1.00)-(lcValue*1.00))/3.00)+(((lcValue*1.00)-(xcValue*1.00))/2.00))) | roundnum }}</span>
				                                	</td>
				                                	<td  colspan="2">Breadth = {{ (((((fcValue*0.09)*((lenvalue*1.00)-(lcValue*1.00)))*(focValue*1.00))/(bends*1.00)) | cuberoot) | roundnum }}</td>
				                                </tr>				                            
				                            </tbody>
				                        </table>
				            </div>
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

 		myApp.filter('roundnum',function ($filter) {
 			return function (input) {
 				return Math.round(input * 100) / 100;
 			};
 		});

 		myApp.filter('squareroot',function ($filter) {
 			return function (input) {
 				return Math.pow(input,0.5);
 			};
 		});

 		myApp.filter('cuberoot',function ($filter) {
 			return function (input) {
 				return Math.pow(input,0.33334);
 			};
 		});

 		myApp.filter('quadra',function ($filter) {
 			return function (input) {
 				return Math.pow(input,4);
 			};
 		});

        myApp.controller("myBeamDesign",function ($scope,$http,$window) {
            $scope.enterData=true;
            $scope.finalResult=false;

            $scope.submitForce=function(){
                $http({
                    method:"POST",
                    url:"asset/beams/withpointload?token=<?php echo $_SESSION['_token'] ?>",
                    data:$scope.forceData
                }).then(function (response){
                var data = response.data;
                if(data.error){
                      $scope.checkForce=data.error.force;
                      $scope.checkForceVal=data.error.forceval;
                      $scope.checkMaterial=data.error.material;
                      $scope.checkFos=data.error.fos;
                      $scope.checkLen=data.error.length;
                }
                else{
                        $scope.forceData={};
                        $scope.checkForce=null;
                        $scope.checkForceVal=null;
                        $scope.checkMaterial=null;
                        $scope.checkFos=null;
                        $scope.checkLen=null;
                        $scope.enterData=false;
		            	$scope.finalResult=true;
                        $scope.forcevalue=data.para.force;
                        $scope.matvalue=data.para.matname;
                        $scope.fosvalue=data.para.fos;
                        $scope.lenvalue=data.para.length;
                        $scope.bendvalue=data.para.bendlimit;
                        $scope.bends=data.para.bends;
                        $scope.momcantvalue=data.para.momcantvalue;
                        $scope.mate=data.para.mate;
                     }
                });
        	};
    });
</script>