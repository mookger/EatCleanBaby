<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>| . EAT CLEAN BABY . | </title>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab|Asap|Pacifico|Karla' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/css.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/list.min.js"></script>
<script src="js/jquery-scrollto.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

var total=0;
var val=[0];
function PlusCal(value){
		var i = value;
		val.push(i);
		total += i;
		console.log(val[val.length-1]);
		document.getElementById("totalCal").innerHTML = total;
		var percent = (total/1600)*100;
		$("#calbar").css("width",percent+"%");
		if(total>1600){
			var percent2 = i+"%";
			$("#calbar2").css("width",percent2+"%");
		}
	}
function MinusCal(){
		
		var i = val[val.length-1];
		//delete val[val.length-1];
		console.log(val.pop());
		total -= i;
		if(isNaN(total)){
			total = 0;
		}
		document.getElementById("totalCal").innerHTML = total;
		$("#calbar").css("width",(total/1600)*100+"%");
	}
function SetCal(){
	$('#input-cal').val(total);
}
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
<div id="section00">
	<div class="row">
		<div class="col-md-12">
			<img class='img-responsive' src="pics/recipes/head02.png">
		</div>
	</div>		
</div>

		
<div id="caloriedetail">
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="background:#f5f5f5;">
			<br>
			<div class="row" style="text-align:right ">
				<div class="col-md-8 col-md-offset-2">
					<button class="btn btn-default" data-toggle="modal" data-target="#addmenu2" onclick="SetCal();">Add to Database</button>
				</div>
			</div>
		
			<div class="row" id="recipeselect" style="padding-left:10px; padding-right:10px">
				<!--calorieselect-->
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div id="contacts">
						<h3 style="color:green;text-align:center;"><?=$_GET['data']==1?'Add menu Complete':''?></h3>
						<table class="table table-condensed" style="background:white; ">
							<tbody class="list">
							  <tr>
								<td class="id" style="display:none;">1</td>
								<td class="cate" style="width:120px; padding-left:20px">Type</td>
								<td class="name" style="width:200px;">Ingredients</td>
								<td class="cal" style="width:100px; text-align:right;">Calories</td>
								<td class="remove" style="padding-right:10px;"></td>
							  </tr>
							</tbody>
							<tfoot>
								<td colspan=2 style="text-align:right"><br>Total Calories : </td>
								<td style="text-align:right;"><br><p id="totalCal"></p> </td>
								
								<td></td>
							</tfoot>
						 </table>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>

			<!--Modal-->
			<div class="modal fade" id="addmenu2" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background:#77b27a; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">เพิ่มเมนูอาหาร</h4>
						</div>
						<form action="inc/addmenu.php" method="POST">
						<div class="modal-body">
							<div class="row" style="padding-bottom:5px;">
								<div class="col-md-12" style="text-align:center; padding-bottom:20px">
									<img src="pics/recipes/icon-5.png" width="125" height="125"></img>
								</div>

								<div class="col-md-8 col-md-offset-2">
									<div class="col-md-4" style="text-align:right;"><p>ชื่อเมนู</p></div>
									<div class="col-md-8" style="text-align:left;"><input type="text" class="form-control" id="name" name="name"></div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px;">
								<div class="col-md-8 col-md-offset-2">
									<div class="col-md-4" style="text-align:right;"><p>จำนวนแคลอรี่</p></div>
									<div class="col-md-8" style="text-align:left;"><input type="text" class="form-control" id="input-cal" name="calories"></div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px;">
								<div class="col-md-8 col-md-offset-2">
									<div class="col-md-4" style="text-align:right;"><p>หน่วย</p></div>
									<div class="col-md-8" style="text-align:left;"><input type="text" class="form-control" id="unit" name="unit" placeholder="ex. 1จาน/1ถ้วย/100g"></div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" style="background:#77b27a">Save</button>
							</form>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			

			<!--caloriepanel-->
			<div class="row" style="padding-left:10px; padding-right:10px; margin-left: -15px;">
				<div class="col-md-3" style="background:#d8e7ff;">
					<img src="pics/recipes/icon-1.png">
					<div class="list-group">
						<?php // Written by Asst.prof.Dr.Taskeow Srisod
							$key='1';
							$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
							$sqls = "SELECT * FROM ingredient where cate = 'แป้ง'; ";
							foreach ($db->query($sqls) as $row) {
						?>
							<button type="button" class="list-group-item" onclick="sendData('<?=$row['cate']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">
						<?php
								echo "<font size=3 class='name-field'>".$row['name']."</font><br>
									<font size=2 class='cal-field'><i>(".$row['calories']."&nbsp;cal/".$row['unit'].")</i></font><br>";
						?>
							</button>
						<?php	}	$db = NULL; // close the database connection	?>
					</div>
					
				</div>
				<div class="col-md-3" style="background:#fff297;">
					<img src="pics/recipes/icon-2.png">
					<div class="list-group">
						<?php // Written by Asst.prof.Dr.Taskeow Srisod
							$key='1';
							$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
							$sqls = "SELECT * FROM ingredient where cate = 'โปรตีน'; ";
							foreach ($db->query($sqls) as $row) {
						?>
							<button type="button" class="list-group-item" data-toggle="modal" data-target="#myModal" onclick="sendData('<?=$row['cate']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">
						<?php
								echo "<font size=3 class='name-field'>".$row['name']."</font><br>
									<font size=2 class='cal-field'><i>(".$row['calories']."&nbsp;cal/".$row['unit'].")</i></font><br>";
						?>
							</button>
						<?php	}	$db = NULL; // close the database connection	?>
					</div>
				</div>
				<div class="col-md-3" style="background:#f8cdff;">
					<img src="pics/recipes/icon-3.png">
					<?php // Written by Asst.prof.Dr.Taskeow Srisod
							$key='1';
							$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
							$sqls = "SELECT * FROM ingredient where cate = 'ไขมัน'; ";
							foreach ($db->query($sqls) as $row) {
						?>
							<button type="button" class="list-group-item" data-toggle="modal" data-target="#myModal" onclick="sendData('<?=$row['cate']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">
						<?php
								echo "<font size=3>".$row['name']."</font><br>
									<font size=2><i>(".$row['calories']."&nbsp;cal/".$row['unit'].")</i></font><br>";
						?>
							</button>
						<?php	}	$db = NULL; // close the database connection	?>
						<br>
				</div>
				<div class="col-md-3" style="background:#d5ffb9;">
					<img src="pics/recipes/icon-4.png">
						<?php // Written by Asst.prof.Dr.Taskeow Srisod
							$key='1';
							$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
							$sqls = "SELECT * FROM ingredient where cate = 'ผลไม้'; ";
							foreach ($db->query($sqls) as $row) {
						?>
							<button type="button" class="list-group-item" data-toggle="modal" data-target="#myModal" onclick="sendData('<?=$row['cate']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">
						<?php
								echo "<font size=3>".$row['name']."</font><br>
									<font size=2><i>(".$row['calories']."&nbsp;cal/".$row['unit'].")</i></font><br>";
						?>
							</button>
						<?php	}	$db = NULL; // close the database connection	?>
					<br>
				</div>
				
			</div>
			<br>
		</div>
	</div>
</div>
</div>

<br>

<script src="js/remove-list.js"></script>
<!--FOOT-->
<?	include 'foot.php';	?>
</body>
</html>