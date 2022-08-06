<?php 
include("includes/database.php");
include("courses/mechanical/bundle/templates.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php getHeader(); ?>
	<link rel="stylesheet" type="text/css" href="courses/mechanical/css/stylepage1234.css">
</head>
<body>
	<?php getDashboard(); ?>
	<section id="contentsection">
		<div class="container">
			<h3 class="animated fadeIn display-2 text-center mt-5"><b>Feedback</b></h3><br>
			<div class="row">
				<div class="col-sm-6"><div class="chart p-3"><canvas id="mychart" style="position: relative; height:200px; width:100px;"></canvas></div></div>
				<div class="col-sm-6 mt-5 table-responsive-sm">
					<table class="table shadow bg-body mb-5">
						<thead><tr bgcolor="#ffcf0d"><th>Sr No.</th><th>ID</th><th>Design</th><th>Easiness</th><th>Useful</th><th>Overall</th><th>Suggestion</th></tr></thead>
						<tbody><?php $sd=0; $se=0; $su=0; $so=0;$i=0; $feeds=mysqli_query($con,"select * from feedback");
							while($feed_data=mysqli_fetch_array($feeds)){ ?>
								<tr><th><?php echo ($i+1); ?></th>
								<td><?php echo $feed_data['user_id']; ?></td>
								<td><?php echo $feed_data['design'];	$sd=($sd+($feed_data['design'])); ?></td>
								<td><?php echo $feed_data['easiness'];	$se=($se+($feed_data['easiness'])); ?></td>
								<td><?php echo $feed_data['usefull'];	$su=($su+($feed_data['usefull'])); ?></td>
								<td><?php echo $feed_data['overall'];	$so=($so+($feed_data['overall'])); ?></td>
								<td><?php echo $feed_data['suggestion']; ?></td></tr>
								<?php $i++;} ?>
						</tbody>
					</table>
				</div>
			</div>
			<h3 class="animated fadeIn display-2 text-center mt-5"><b>Contact</b></h3><br>
			<div class="table-responsive-sm">
				<table class="table shadow bg-body">
					<thead><tr bgcolor="#ffcf0d"><th>Sr No.</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr></thead>
					<tbody><?php $j=1; $cons=mysqli_query($con,"select * from contacts");
						while($cont_data=mysqli_fetch_array($cons)){ ?>
							<tr><th><?php echo $j; ?></th><td><?php echo $cont_data['name']; ?></td><td><?php echo $cont_data['email']; ?></td><td><?php echo $cont_data['message']; ?></td><td><?php echo $cont_data['date']; ?></td></tr>
							<?php $j++;} ?>
					</tbody>
				</table>
			</div>
		</div>
	</section><br><br>
	<?php getFooter(); ?>
</body>
<script type="text/javascript">
	let myAvg=document.getElementById('mychart').getContext('2d');
	var sd = <?php echo round(($sd/$i),2); ?>;
	var se = <?php echo round(($se/$i),2); ?>;
	var su = <?php echo round(($su/$i),2); ?>;
	var so = <?php echo round(($so/$i),2); ?>;
	Chart.defaults.global.defaultFontFamily = 'Poppins'; Chart.defaults.global.defaultFontSize = 20; Chart.defaults.global.defaultFontColor = '#f2f2f2';
    let massMark=new Chart(myAvg,{
		type:'bar',//type of chart we want eg: bar,horizontal,pie,line,doughnut,radar
		data:{ labels:['','Design','Easiness','Useful','Overall Rating'], datasets:[{ label:'Feedback', data:[0,sd,se,su,so], backgroundColor:['#a9f702','#a9f702','#f74302','#fc034a','#fcbe03'], borderColor:'#4c695e', }]
		}, options:{ responsive: true, title:{ display:true, text:'Feedback Summary', fontSize:'20' }, }
	});	
</script>
</html>
