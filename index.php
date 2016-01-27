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
//$query = $db->query("SELECT * FROM article WHERE id LIKE '%$key%' LIMIT $start , $per_page");

?>


<html lang="en">
<head>
<meta charset="utf-8">
<title>| . EAT CLEAN BABY . | </title>

<!--Add-->
<?	include 'head-in.php';	?>

<style>
  
</style>
<script>
	$( document ).ready(function() {
	  $("#b1").click(function() {
		  $('#head').ScrollTo();
	  });
	  $("#b2").click(function() {
		  $('#section02').ScrollTo();
		});
	  $("#b3").click(function() {
		  $('#section03').ScrollTo();
		});
	  $("#b4").click(function() {
		  $('#section04').ScrollTo();
		});
	  $("#b6").click(function() {
		  $('#section04').ScrollTo();
		});
	});
	
</script>
</head>


<body>

<!--  start    -->

<!--menu-->
<div style="padding-left: 20px;" id="menu">
	<img src="pics/menu-01.png">
	<ul class="nav nav-pills nav-stacked" id="menu2" style=" height: 370px; width: 201px;"> 
		<li id="b1"> 	<a href="#">HOME</a> 	</li>
		<li id="b2">	<a href="#">ABOUT</a>	</li>
		<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">BLOG<span class="caret"></span></a>
			<ul class="dropdown-menu" style="left:153px; top:0px; ">
				<li><a id="b3" href="#">Article</a></li>
				<li><a id="b4" href="#">Video</a></li>
			</ul>
		</li>
		<li id="b5"> 	<a href="recipes.php">RECIPES</a> </li>
		<li>			<a href="calories.php">CALORIE</a>	</li>
		<li>			<a href="question.php">Q&A </a>	</li>
	</ul>
</div>


<!-- HEAD -->
<div id="head">
	<div id="login">
		<div class="container">	<div class ="row" style="height:15px;"></div>	</div>
	</div>
</div>

<div id="section00">
	<div class="container">	
		<div class="row" style="padding-top:30px">
			<div class="col-md-1"></div>
			<div class="col-md-11">
				<img src = "pics/logo01.png">
			</div>
		</div>
		
	</div>	
</div>


<!--01slide-->
<div id="section01">
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-11">
				<img src="pics/slide02-01.png">
			</div>
		</div>
	</div>
</div>

<br>
<div class="container"><div class="row" style="background:black; height:2px;"> </div></div>

<!--02ABOUT-->
<div id="section02">
	<div class="container">
		<div class="row"  style="text-align:center;">
			<div class="col-md-1"></div>
			<div class="col-md-11" >
				<div class="col-md-3"></div>
				<div class="col-md-6" id="header">
					<h2>ABOUT 'EAT CLEAN BABY'</h2>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<div class="row"  style="text-align:center;">
			<div class="col-md-1"></div>
			<div class="col-md-11" >
				<br>
				<a href="https://www.facebook.com/eatcleanbaby/" target="_blank"><img src="pics/about-01.png" ></a>
				<br><br>
				<a href="about.php" target="_blank"><h2><p>-EAT CLEAN BABY-</p></h2></a>
				<p>	EatClean Baby เป็นแฟนเพจที่ให้ข้อมูล และแลกเปลี่ยนความรู้ที่เกี่ยวกับอาหารคลีน และการดูแลสุขภาพของตนเอง <br>
				เรามุ่งเน้นที่จะนำเสนอแต่แนวทางการกินอาหารสุขภาพที่สามารถรับประทานได้ตลอดชีวิต <br>
				จึงต้องการสร้างเวปไซต์ที่รวบรวมบทความ สื่อต่างๆ  ข้อสงสัยต่างๆ <br>
				รวมถึงซอฟแวร์ที่ช่วยในการคูแลสุุขภาพของเราเอง ...</p>
			
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="padding-top: 30px;">
			<img class='img-responsive' src="pics/hr01.png">
		</div>
	</div>
</div>


<br>
<div class="container"><div class="row" style="background:black; height:2px;"> </div></div>



<!--03 บทความ-->
<div id="section03">
<div class="container">
	<div class="row"  style="text-align:center;">
		<div class="col-md-1"></div>
		<div class="col-md-11" >
			<div class="col-md-3"></div>
			<div class="col-md-6" id="header">
				<h2>- Article -</h2>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="row">
			<div class="col-md-10 col-md-offset-1" id="article">
				<?php // Written by Asst.prof.Dr.Taskeow Srisod
					$key='1';
					$db = new PDO('sqlite:db/article.sqlite'); $dkey=@$_GET['dkey'];
					$query = $db->query("SELECT * FROM article ORDER BY view DESC limit 0,3");
					//foreach($result as $row)
					while($row = $query->fetch(PDO::FETCH_ASSOC))
					{
				?>			
			
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12" style="padding-bottom:10px;position:relative;">
							<?php 
								echo "<img class='img-responsive img-thumbnail' src='pics/article/".$row['pic']."'>";
							?>
							<div id="heart">
								<div style="padding-top:5px; padding-left:15px;" >
								<img src="pics/heart01.png" style="padding-bottom:10px;">
								
								<?php 
								echo "&nbsp;&nbsp;&nbsp;<font size=+3 color='#4b4b4b'><b>".$row['view']."</b></font>";
								?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php
								echo "<b><font  size=+1>".$row['title']."</b><br></font>
								<font  size=2>".$row['taglines']."</font></a><br><br>";
								echo "<a href='article_detail.php?key=".$row['id']."' target='_blank'>";
								?>
									<p align='right'><button type="button" class="btn btn-default">
									more <span class="glyphicon glyphicon-zoom-in"></span> </button></p>
									
								<?php
									echo "</a>";
								?>		
						</div>
					</div>
				</div>
				<?php
				}
				?>
			
			</div>
			</div>
		</div>
		
	</div>
	<br><br><br>
	<div class="row" style="text-align: right;">
			<div class="col-md-offset-9 col-md-1" >
				<a href="article.php">
					<button type="button" class="btn btn-default btn-lg">All Articles ..<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
				</a>
			</div>
	</div>
</div>
</div>

<br>
<div><div class="row" style="background:black; height:2px;"> </div></div>


<!--04 วีดีโอ -->
<div id="section04">
	<div class="container">
		<div class="row"  style="text-align:center;">
			<div class="col-md-1"></div>
			<div class="col-md-11" >
				<div class="col-md-3"></div>
				<div class="col-md-6" id="header">
					<h2>- VIDEO-</h2>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-7" style="text-align:center;" >
				<?php // Written by Asst.prof.Dr.Taskeow Srisod
						$key='1';
						$db = new PDO('sqlite:db/article.sqlite'); $dkey=@$_GET['dkey'];
						$result = $db->query("SELECT * FROM multimedia where id like '%$dkey%' limit 0,1");
						foreach($result as $row)
					{ 
					?>
						<iframe class="embed-responsive-item" width="600" height="338" src="<?php echo $row['video']; ?>"></iframe>
					<?php
					}
					$db = NULL; // close the database connection
				?>
				
			</div>	
			<div class="col-md-3">
			</div>
		</div>
		<br><br>
		<div class="row" style="text-align: right;">
			<div class="col-md-offset-9 col-md-1" >
				<a href="video.php">
					<button type="button" class="btn btn-default btn-lg">All Videos ..<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
				</a>
			</div>
		</div>
	</div>
</div>


<div><div class="row" style="background:black; height:2px;"> </div></div>


<!--FOOT-->
<?	include 'foot.php';	?>


	

</body>
</html>