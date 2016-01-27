<!DOCTYPE html>
<?php
ob_start();
session_start();
?>
<?php 
	$key=@$_GET['dkey'];
	$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");
	$per_page = '3';
	$result = $db->query("SELECT * FROM article WHERE id LIKE '%$key%'") or die("Can not query");
	$rows = $result ->fetchAll(); 
	$total_records = count($rows);
	$pages = ceil($total_records / $per_page);
	$pg=@$_GET['page'];            
	$page  = (isset ($pg))  ? (int) $pg : 1 ;
	$start = ($page - 1) *  $per_page; 
	$query = $db->query("SELECT * FROM article WHERE id LIKE '%$key%' LIMIT $start , $per_page");
?>

<html lang="en">
<head>
<meta charset="utf-8">
<title>| . EAT CLEAN BABY . | </title>

<!--Add-->
<?	include 'head-in.php';	?>

<script>
	$( document ).ready(function() {
	  $("#ab1").click(function() {
		  $('#asection01').ScrollTo();
	  });
	  $("#ab2").click(function() {
		  $('#asection02').ScrollTo();
		});
	  $("#ab3").click(function() {
		  $('#asection03').ScrollTo();
		});
	});
	
</script>
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
<div id="articlehead">
	<div class="row">
		<div class="col-md-12">
			<img class='img-responsive' src="pics/article/head01.png">
		</div>
	</div>		
</div>

<!-- MENU -->
<div>
	<div class="row" style="text-align:center">
		<div class="col-md-12"  id="articlemenu">
		
			<a href="#" id="ab1"><img src="pics/article/menu01.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" id="ab2"><img src="pics/article/menu02.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" id="ab3"><img src="pics/article/menu03.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>
</div>

<hr>

<!-- DETAIL -->
<div class="container" id="article-detail">		
	<div class="row" id="asection01">
		<div class="col-md-2">		</div>
		<div class="col-md-8">
			<div class="row"><h3><img src="pics/article/icon02.png">&nbsp;&nbsp;ความรู้ทั่วไป</h3>	</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-11">
				<?php // Written by Asst.prof.Dr.Taskeow Srisod
					$key='1';
					$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
					$sqls = "SELECT * FROM article where category = 'ความรู้พื้นฐาน'; ";
					foreach ($db->query($sqls) as $row) {
				?>
				<div class="row">
					<div class="col-md-4">
					<?php
						echo "<a href='article_detail.php?key=".$row['id']."'>";
						echo "<img class='img-responsive img-thumbnail' src='pics/article/".$row['pic']."'><br></img></a><br>";
					?>
						<div id="heart2">
							<div style="padding-top:5px; padding-left:5px;" >
								<img src="pics/heart01.png" style="padding-bottom:10px; width:35px; height:40px;">
								
							<?php 
							echo "&nbsp;<font size=+2 color='#4b4b4b'><b>".$row['view']."</b></font>";
							?>
							</div>
						</div>
					</div>
					<div class="col-md-8">
					<?php
						
						echo "<a href='article_detail.php?key=".$row['id']."'>";
						echo "<b><font size=+2 style='text-align: center;'>".$row['title']."</b><br></font></a>";
						echo "".$row['taglines']."";
						echo "<br><font style='text-align:right'></font>";
					?>
					</div>
				</div>
					<?php
					}
					$db = NULL; // close the database connection
					?>
				</div>
			
			</div>
		</div>
	</div>
	
	<hr>
	
	<div class="row" id="asection02">
		<div class="col-md-2">		</div>
		<div class="col-md-8">
			<div class="row">	<h3><img src="pics/article/icon03.png">&nbsp;&nbsp;โภชนาการ</h3>	</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-11">
				<?php // Written by Asst.prof.Dr.Taskeow Srisod
					$key='1';
					$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
					$sqls = "SELECT * FROM article where category = 'โภชนาการ'; limit 0,2  ";
					foreach ($db->query($sqls) as $row) {
				?>
				<div class="row">
					<div class="col-md-4">
					<?php
						echo "<a href='article_detail.php?key=".$row['id']."'>
							<img class='img-responsive img-thumbnail' src='pics/article/".$row['pic']."'><br></img></a><br>";
					?>
						<div id="heart2">
							<div style="padding-top:5px; padding-left:5px;" >
								<img src="pics/heart01.png" style="padding-bottom:10px; width:35px; height:40px;">
								
							<?php 
							echo "&nbsp;<font size=+2 color='#4b4b4b'><b>".$row['view']."</b></font>";
							?>
							</div>
						</div>
					</div>
					<div class="col-md-8">
					<?php
						echo "<a href='article_detail.php?key=".$row['id']."'>";
						echo "<b><font size=+2 style='text-align: center;'>".$row['title']."</b><br></font></a>";
						echo "".$row['taglines']."";
					?>
					</div>
				</div>
					<?php
					}
					$db = NULL; // close the database connection
					?>
				</div>
				
			
			</div>
		</div>
	</div>
	
	<hr>
	
	<div class="row" id="asection03">
		<div class="col-md-2">		</div>
		<div class="col-md-8">
			<div class="row">	<h3><img src="pics/article/icon01.png">&nbsp;&nbsp;ออกกำลังกาย</h3>	</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-11">
				<?php // Written by Asst.prof.Dr.Taskeow Srisod
					$key='1';
					$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
					$sqls = "SELECT * FROM article where category = 'ออกกำลังกาย'; ";
					foreach ($db->query($sqls) as $row) {
				?>
				<div class="row">
					<div class="col-md-4">
					<?php
						echo "<a href='article_detail.php?key=".$row['id']."'>
							<img class='img-responsive img-thumbnail' src='pics/article/".$row['pic']."'><br></img></a><br>";
					?>
						<div id="heart2">
							<div style="padding-top:5px; padding-left:5px;" >
								<img src="pics/heart01.png" style="padding-bottom:10px; width:35px; height:40px;">
								
							<?php 
							echo "&nbsp;<font size=+2 color='#4b4b4b'><b>".$row['view']."</b></font>";
							?>
							</div>
						</div>
					</div>
					<div class="col-md-8">
					<?php
						echo "<a href='article_detail.php?key=".$row['id']."'>";
						echo "<b><font size=+2 style='text-align: center;'>".$row['title']."</b><br><br></font></a>";
						echo "".$row['taglines']."";
					?>
					</div>
				</div>
					<?php
					}
					$db = NULL; // close the database connection
					?>
				</div>
			
			</div>
		</div>
	</div>
	<hr>
		<div class="col-md-2">		</div>
	</div>
</div>	


<br>
<br>

<?	include 'foot.php';	?>


</body>
