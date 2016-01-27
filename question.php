<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>| . EAT CLEAN BABY . | </title>

<!--Add-->
<?	include 'head-in.php';	?>

<style>
  
</style>
</head>

<body>
<!--  start    -->

<?	include 'menu.php';	?>

<!-- HEAD -->
<div id="head">
	<div id="login">
		<div class="container">	<div class ="row" style="height:15px;"></div>	</div>
	</div>
</div>


<!-- HEAD -->
<div id="section00">
	<div class="row">
		<div class="col-md-12">
			<img class='img-responsive' src="pics/question/head01.png">
		</div>
	</div>		
</div>



<!-- DETAIL -->
<div id="questiondetail"
	<div class="container">
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<form action='' method='get'><input type="text" name="dkey" placeholder="ค้นหาคำถาม">
					<input type='submit' value='  Search  '>
				</form>
				
			</td></div>
		</div>
		<br>
		
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-9">
				
		
					<?php // Written by Asst.prof.Dr.Taskeow Srisod
						$key='1';
						$db = new PDO('sqlite:db/article.sqlite'); $dkey=@$_GET['dkey'];
						$result = $db->query("SELECT * FROM question where text like '%$dkey%'");
						foreach($result as $row)
						{ 
					?>
						<div class="row">
						<div class="col-md-2"><img src="pics/question/q-01.png"></div>
						<div class="col-md-10" style="padding-top:25px;">
					<?php
							echo "<b><font  size=+1>".$row['text']."</b><br></font>";
					?>		
						</div>
						</div>
						<div class="row">
							<div class="col-md-2" style="text-align:right"><img src="pics/question/q-03.png"></div>
							<div class="col-md-9" style="padding-top:25px;">
					<?php		
							echo "<br><font  size=2>".$row['answer']."</font></a><br>";
					?>
							</div>
						</div>
						<br><br>
					<?php
						}
						$db = NULL; // close the database connection
					?>
					
				
			</div>
		</div>
		
	</div>
</div>


<?	include 'foot.php';	?>
</body>