<!DOCTYPE html>
<?php
ob_start();
session_start();
?>
<?php 
	$key=@$_GET['dkey'];
	$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");
	$per_page = '3';
	$result = $db->query("SELECT * FROM multimedia WHERE id LIKE '%$key%'") or die("Can not query");
	$rows = $result ->fetchAll(); 
	$total_records = count($rows);
	$pages = ceil($total_records / $per_page);
	$pg=@$_GET['page'];            
	$page  = (isset ($pg))  ? (int) $pg : 1 ;
	$start = ($page - 1) *  $per_page; 
	$query = $db->query("SELECT * FROM multimedia WHERE id LIKE '%$key%' LIMIT $start , $per_page");
?>
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

<!-- VIDEO HEAD-->
<div id="videohead">
	<div class="container" style="text-align:center;" >
		<div class="row" style="height=500px;">
			<div class="col-md-3"></div>
			<div class="col-md-6" style="padding-top: 50px;">
				<?php // Written by Asst.prof.Dr.Taskeow Srisod
					$db = new PDO('sqlite:db/article.sqlite'); $key=@$_GET['key']; 
					$result = $db->query("SELECT * FROM multimedia where id like '%$key%' limit 0,1");

					foreach($result as $row)
					{
					?>
						<iframe class="embed-responsive-item" width="560" height="315" src="<?php echo $row['video']; ?>"></iframe>
						</div>	
						<div class="col-md-3" style="padding-top:100px;">
							<div class="row" style="background-color: rgba(255,255,255,0.75); width:320px; height:130px; ">
						
					<?php
						echo "<br><br><b><font  size=+1 class='shadow2' color='#443831'>".$row['title']."</font></b></a>";
					}
					$db = NULL; // close the database connection
				?>
				</div></div>
		</div>
	</div>
</div>

<!-- VIDEO DETAIL-->
<div id="videodetail">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10" style="text-align:center;">
				<div class="row">
				<?php // Written by Asst.prof.Dr.Taskeow Srisod
					$key='1';
					$db = new PDO('sqlite:db/article.sqlite'); $dkey=@$_GET['dkey'];
					$result = $db->query("SELECT * FROM multimedia where id like '%$dkey%' limit 0,3");
					foreach($result as $row)
					while($row = $query->fetch(PDO::FETCH_ASSOC))
					{
						echo "<a href=?key=".$row['id']."><img src='pics/multimedia/".$row['pic']."' width='300' height='170'></a>";
					
					}
					$db = NULL; // close the database connection
					
					$Prev_Page = $page-1;
					$Next_Page = $page+1;
					?>
				</div>
				<div class="row"><div class="col-md-6" style="text-align:left;">
				<?php
					if($page != 1)
					{
						echo "<a href=\"?page=".$Prev_Page."\">";
						?>	<span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>&nbsp;PREV.	<?php
						echo"</a>";
					}
					?></div>
					
					<div class="col-md-6" style="text-align:right;"><?php
					if($page != $pages) 
					{
						echo "<a href=\"?page=".$Next_Page."\">";
						?>	.NEXT &nbsp;<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><?php
						echo "</a></div>"; 
					}

				?></div>
				
			</div>
			
				
		</div>
		<div class="col-md-1"></div>

		</div>
	</div>
</div>




<?	include 'foot.php';	?>

</body>