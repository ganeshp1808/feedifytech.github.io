<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html>
	<head> <?php getHeader(); ?> </head>
	<body>
		<?php getDashBoard(); ?>
		<section>
			<div id="welcomehome"><br><br><br><br>
	            <div class="container p-5 mt-5">
	                <div class="row">
	                    <div class="col-sm-6"><h1 class="animated zoomInUp mb-5">Welcome to Mechanical Field</h1><p class="animated fadeIn mt-2 mb-5">Have your work done right in your hands !!</p></div>
	                    <div class="col-sm-6"><h5 class="animated fadeIn mt-3 mb-5">Mechanical Engineering covers the wide scope and hence we need to be in equillibrium till whole cyclic process gets completed.</h5></div>
	                </div>
	            </div><br><br><br><br>
	        </div>
		</section>
		<section id="booksection">
			<div class="container mt-5 text-center"><br>
				<h1 class="mt-5 mb-5">Quick Links</h1>
				<div class="row"><div class="col-6"><a class="btn content" href="bearings">Bearing</a></div><div class="col-6"><a class="btn content" href="spurgear">Spur Gear</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="helicalgear">Helical Gear</a></div><div class="col-6"><a class="btn content" href="bevelgear">Bevel Gear</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="projectile">Projectile Motion</a></div><div class="col-6"><a class="btn content" href="vertical">Vertical Motion</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="inventroymodels">Inventory Models</a></div><div class="col-6"><a class="btn content" href="fluidinstruments">Fluid Instruments</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="regressionanalysis">Regression Analysis</a></div><div class="col-6"><a class="btn content" href="vibration">Vibration Analysis</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="htmode">Heat Transfer</a></div><div class="col-6"><a class="btn content" href="fluidbasics">Fluid Mechanics</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="knucklejoint">Knuckle Joint</a></div><div class="col-6"><a class="btn content" href="cotterjoint">Cotter Joint</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="chains">Chain Drive</a></div><div class="col-6"><a class="btn content" href="staticload">Static Load</a></div></div><br>
	            <div class="row"><div class="col-6"><a class="btn content" href="levers">Levers</a></div><div class="col-6"><a class="btn content" href="materials">Material</a></div></div><br>
				<p>Want more? Then  <button type="button" class="btn search" data-bs-toggle="modal" data-bs-target="#contentModal">Click Here</button></p>
	        </div><br>
		</section>
		<section>
			<div class="container mt-5">
				<div class="p-4 mt-1 shadow mb-5 bg-body">
	                <h1><b>Why FeedifyTech?</b></h1><br><h3>Engineering problems require multiple computations, involving several constraints, and solving these often take a toll on the human brain.<br>FeedifyTech uses optimised algorithms to compute such problems in milliseconds, also providing an accessible platform. Visualising a problem helps in understanding the concepts involved, making it more fascinating.</h3>
	            </div><br>
			</div>
		</section>
		<?php getFooter(); ?>
	</body>
</html>