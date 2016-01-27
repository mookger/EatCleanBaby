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
<script src="js/Chart.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10,af-2.1.0,r-2.0.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/s/bs/dt-1.10.10,af-2.1.0,r-2.0.0/datatables.min.js"></script>

<?
 $bmr = 2000;
 $gender = $_GET['gender'];
 $weight = $_GET['weight'];
 $high = $_GET['high'];
 $age = $_GET['age'];
 $sport = $_GET['sport'];
 if(!isset($weight)){
	 $bmr = 2000;
 }
 else if($gender == 0){
	 $bmr = 66+(13.7*$weight)+(5*$high)-(6.8*$age);
	switch ($sport) {
		case 0:
			$bmr = $bmr*1.2;
			break;
		case 1:
			$bmr = $bmr*1.357;
			break;
		case 2:
			$bmr = $bmr*1.55;
			break;
		case 3:
			$bmr = $bmr*1.7;
			break;
		case 4:
			$bmr = $bmr*1.9;
			break;
		}
 }else if($gender == 1){
	 $bmr = 665+(9.6*$weight)+(1.8*$high)-(4.7*$age);
	 switch ($sport) {
		case 0:
			$bmr = $bmr*1.2;
			break;
		case 1:
			$bmr = $bmr*1.357;
			break;
		case 2:
			$bmr = $bmr*1.55;
			break;
		case 3:
			$bmr = $bmr*1.7;
			break;
		case 4:
			$bmr = $bmr*1.9;
			break;
	 }
 }
?>
<script>

	$(document).ready(function() {
	
		
    $('#example').DataTable( {
        "scrollCollapse": true,
        "paging": true,
		"searching": true,
		"ordering": false,
		"pageLength": 5
    } );
	 
	
} );
var total=0;
var val=[0];
function PlusCal(value){
		var i = value;
		val.push(i);
		total += i;
		console.log(val[val.length-1]);
		document.getElementById("totalCal").innerHTML = total;
		var percent = (total/<?=$bmr?>)*100;
		$("#calbar").css("width",percent+"%");
		if(total><?=$bmr?>){
			var percent2 = i+"%";
			$("#calbar2").css("width",percent2+"%");
		}
		DisplayCal();
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
		$("#calbar").css("width",(total/<?=$bmr?>)*100+"%");
		DisplayCal();
	}
	function DisplayCal(){
		document.getElementById("totalCal2").innerHTML = total;
	}
</script>
</head>
<style>
.remove-item-btn:first{
	 visibility:hidden;
 }
</style>
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
<div id="calorieshead">
	<div class="row">
		<div class="col-md-8">	</div>
		<div class="col-md-4">
			<div class="row" style="">
				<h2><?=date('l jS \ F Y');?></h2>
			</div>
		</div>
	</div>		
</div>



<!--detail-->
<div id="caloriesdetail">

	<!--
	<div class="row">
		<div class="col-md-3">	</div>
		<div class="col-md-6">
			<div class="row" style="text-align:right; padding-top:20px;">
				<h4><?=date('l jS \of F Y');?></h4>
			</div>
			<hr>
		</div>
	</div>
	-->
	<br>

	<div class="row">
		<div class="col-md-3">	</div>
		<div class="col-md-6" style="background:white; padding-left:50px; padding-right:50px;">
		
			<div class="row">
				<div class="col-md-6">
					<h3><img src="pics/calories/icon01.png" width="60" height="49">
					แคลอรี่สุทธิต่อวัน</h3>
				</div>
				<div class ="col-md-6" style="text-align:right; padding-top:25px" >
						<h3><font size=2>ได้รับพลังงาน&nbsp;&nbsp;</font><span id="totalCal2">0</span> / <?=$bmr?> cal </h3>
				</div>
			</div>
			
			<!--Breakfast-->
			<div class="row"  >
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<div class="progress">
						<div class="progress">
						  <div id="calbar" class="progress-bar progress-bar-warning" role="progressbar" style="width: 0%">
							<span class="sr-only">60% Complete (warning)</span>
						  </div>
						  <div id="calbar2" class="progress-bar progress-bar-danger" style="width: 0%">
							<span class="sr-only">10% Complete (danger)</span>
						  </div>
						</div>
					</div>
				</div>
				
			</div>
			<br>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3">	</div>
		<div class="col-md-6" style="background:black; text-align:center; padding-bottom:5px;">
		<br>
			<p style="color:white;">คำนวณจำนวนแคลอรี่ที่ควรได้รับต่อวันเป็นค่าประมาณ สำหรับตัวคุณ .. 

			<a href="#"  data-toggle="modal" data-target="#calcal">
				<button type="button" class="btn btn-default btn-sm">
					<span class="glyphicon glyphicon glyphicon-object-align-bottom" aria-hidden="true"></span>
				</button>
			</a>
		<br>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3">	</div>
		<div class="col-md-6" style="background:white; padding-left:50px; padding-right:50px;">
		<br>
			<div class="row">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1"><h5>Add Meal </h5></button>
			</div>
			<br>
			<div class="row">
				<div id="contacts">
					<table class="table">
						<tbody class="list">
							<tr>
								<td class="id" style="display:none;">1</td>
								<td class="meal"  style="width:100px; padding-left:20px;">Meal</td>
								<td class="name"  style="width:200px;">Menu</td>
								<td class="unit"  style="width:120px; text-align:center;">Unit</td>
								<td class="cal"  style="width:100px; text-align:right; padding-right:15px;">Calories</td>
								<td class="remove" ></td>
								
							</tr>
							
						</tbody>
						
						<tfoot>
							<tr>
								<td style="display:none;"></td>
								<td></td>
								<td></td>
								<td><br><i>Totol Calories : </i></td>
								<td style="text-align:right; padding-right:15px;"><br><p id="totalCal"></p> </td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				 </div>
				 <br>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">	</div>
		<div class="col-md-6" style="background:black; text-align:center; padding-bottom:5px;">
		<br>
		</div>
	</div>
</div>

<br>

<br>
<br>
<br>
<br>
<br>

					<?php // Written by Asst.prof.Dr.Taskeow Srisod
						$db = new PDO('sqlite:db/article.sqlite') or die("Can not connect");; 
						$sqls = "SELECT *,rowid FROM meal ";
						
					?>
						

<br>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" style="width:700px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <h2 class="modal-title">เพิ่มเมนูอาหาร</h2>
      </div>
      <div class="modal-body">
					<div class="table-responsive">
					<table id="example" class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th style="width:200px;">Name</th>
								<th>Cal</th>
								<th>Unit</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<? foreach ($db->query($sqls) as $row) {?>
							<tr>
								<td><?=$row['id']?></td>
								<td><?=$row['name']?></td>
								<td><?=$row['calories']?></td>
								<td><?=$row['unit']?></td>
								<td>
									<button type="button" class="btn btn-warning btn-sm" onclick="sendData('Breakfast','<?=$row['unit']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">Breakfast</button>
									<button type="button" class="btn btn-danger btn-sm" onclick="sendData('Lunch','<?=$row['unit']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">Lunch</button>
									<button type="button" class="btn btn-info btn-sm" onclick="sendData('Dinner','<?=$row['unit']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">Dinner</button>
									<button type="button" class="btn btn-success btn-sm" onclick="sendData('Snack','<?=$row['unit']?>','<?=$row['name']?>','<?=$row['calories']?>');PlusCal(<?=$row['calories']?>);">Snack</button>
								</td>
							</tr>
							
						
					<?php	}	$db = NULL; // close the database connection	?>
							</tbody>
							
						</table>
						</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--คำนวนแคล-->
<!--Modal-->
<div class="modal fade" id="calcal" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#77b27a; color:white;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">คำนวณ TDEE</h4>
			</div>
			<form action="calories.php" method="GET">
			<div class="modal-body">
				<div class="row" style="padding-bottom:5px;">
					<div class="col-md-12" style="text-align:center;">
						<img src="pics/calories/icon02.png" width="125" height="125"></img>
					</div>
							
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-4" style="text-align:right;"><p>เพศ</p></div>
						<div class="col-md-8">
							<label class="radio-inline">
								<input type="radio" class="inpgender" id="man" name="gender" value="0"> ชาย
							</label>
							<label class="radio-inline">
								<input type="radio" class="inpgender" id="female" name="gender" value="1"> หญิง
							</label>
						</div>
					</div>
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-4" style="text-align:right; padding-bottom:10px;"><p>น้ำหนัก</p></div>
						<div class="col-md-8" style="text-align:left;"><input type="text" class="form-control" id="weight" name="weight"></div>
					</div>
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-4" style="text-align:right; padding-bottom:10px;"><p>ส่วนสูง</p></div>
						<div class="col-md-8" style="text-align:left;"><input type="text" class="form-control" id="high" name="high"></div>
					</div>
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-4" style="text-align:right; padding-bottom:10px;"><p>อายุ</p></div>
						<div class="col-md-8" style="text-align:left;"><input type="text" class="form-control" id="age" name="age"></div>
					</div>

					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-4" style="text-align:right;"><p>ออกกำลังกาย</p></div>
						<div class="col-md-8" style="text-align:left;">
							<div class="form-group">
								<select class="form-control" id="sel1" name="sport">
									<option value="0">น้อยมากหรือไม่ออกเลย</option>
									<option value="1">1-3 ครั้งต่อสัปดาห์</option>
									<option value="2">4-5 ครั้งต่อสัปดาห์</option>
									<option value="3">6-7 ครั้งต่อสัปดาห์</option>
									<option value="4">วันละ 2 ครั้งขึ้นไป </option>
								</select>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" style="background:#77b27a;">Save</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
var options = {
	  valueNames: [ 'id', 'unit', 'name', 'cal','remove','meal' ]
	};

	// Init list
	var contactList = new List('contacts', options);

	var idField = $('#id-field'),
		cateField = $('.cate-field'),
		nameField = $('.name-field'),
		calField = $('.cal-field'),
		mealField = $('.meal-field'),
		addBtn = $('.add-btn'),
		editBtn = $('#edit-btn').hide(),
		removeBtns = $('.close');

	// Sets callbacks to the buttons in the list
	refreshCallbacks();
	
	addBtn = $(addBtn.selector);
	nameField = $(nameField.selector);	
	cateField = $(cateField.selector);
	calField = $(calField.selector);
	
	function sendData(mealField,cateField,nameField,calField){
		contactList.add({
			id: Math.floor(Math.random()*110000),
			unit: cateField,
			meal: mealField,
			name: nameField,
			cal: calField,
			remove:"<button type='button' class='close' aria-label='Close' onclick='MinusCal();'><span aria-hidden='true'>&times;</span></button>"

			});
		refreshCallbacks();
	}
	

	function refreshCallbacks() {
	  // Needed to add new buttons to jQuery-extended object
	  removeBtns = $(removeBtns.selector);
	  
	  removeBtns.click(function() {
		  console.log("test");
		var itemId = $(this).closest('tr').find('.id').text();
		contactList.remove('id', itemId);
	  });
	}
	
</script>


<?	include 'foot.php';	?>

</body>
</html>