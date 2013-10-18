<?php 
include('connection.php');
include ('queryfunction.php'); 
?>

<!DOCTYPE html>
<html>
<head>
<title>yeahbah...</title>
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<body>

<h3>Query Report</h3>

<h5>Query using Employee Name<h5>
<form name="form1" action="" method="post">
	<input type="text" name="employee" id="employee" value="Employee Name"></input>
	<input type="submit"></input>
</form>

<h5>Query With Filename<h5>
<form name="form1" action="" method="post">
	<input type="text" name="employee" id="employee" value="Employee Name"></input>

	<?php
		filenamedropdown();
	?>
	<input type="submit"></input>
</form>

<h5>Query With Month and Year<h5>
<form name="form1" action="" method="post">
	<input type="text" name="employee" id="employee" value="Employee Name"></input>

	<?php
		yeardropdown();
		monthdropdown();
	?>
	<input type="submit"></input>
</form>

<h5>Query With Month and Year<h5>
<form name="form1" action="" method="post">
	<input type="text" name="employee" id="employee" value="Employee Name"></input>

	<?php
		calendar();
	?>
	<input type="submit"></input>
</form>

<p>yehoooo</p>

<?php
	$value = $_POST['employee'];
	$value2 = $_POST['filename'];
	$value3 = $_POST['year'];
	$value4 = $_POST['month'];
	echo $value5 = isset($_REQUEST["fromdate"]) ? $_REQUEST["fromdate"] : "";
	echo $value6 = isset($_REQUEST["todate"]) ? $_REQUEST["todate"] : "";
	

	
	if(!empty($value)) {	
	//scorerbelow10_querydetail($value);
	//scorerbelow10_querytotal($value);
	//scorer1120_querydetail($value);
	//scorer1120_querytotal($value);
	//scorer2130_querydetail($value);
	//scorer2130_querytotal($value);
	//scorer3140_querydetail($value);
	//scorer3140_querytotal($value);
	//scorer4150_querydetail($value);
	//scorer4150_querytotal($value);
	//scorer5160_querydetail($value);
	//scorer5160_querytotal($value);
	//scorer61above_querydetail($value);
	//scorer61above_querytotal($value);
	//totalnumberofscores_scorer($value);
	//totalsumofscores_scorer($value);
	//totalaverageofscores_scorer($value);
	
	//scorerbelow10withfile_querydetail($value, $value2);
	//scorerbelow10withfile_querytotal($value, $value2);
	//scorer1120withfile_querydetail($value, $value2);
	//scorer1120withfile_querytotal($value, $value2);
	//scorer2130withfile_querydetail($value, $value2);
	//scorer2130withfile_querytotal($value, $value2);
	//scorer3140withfile_querydetail($value, $value2);
	//scorer3140withfile_querytotal($value, $value2);
	//scorer4150withfile_querydetail($value, $value2);
	//scorer4150withfile_querytotal($value, $value2);
	//scorer5160withfile_querydetail($value, $value2);
	//scorer5160withfile_querytotal($value, $value2);
	//scorer61abovewithfile_querydetail($value, $value2);
	//scorer61abovewithfile_querytotal($value, $value2);
	//totalnumberofscoreswithfile_scorer($value, $value2);
	//totalsumofscoreswithfile_scorer($value, $value2);
	//totalaverageofscoreswithfile_scorer($value, $value2);
	
	//scorerbelow10withyearmonth_querydetail($value, $value3, $value4);
	//scorerbelow10withyearmonth_querytotal($value, $value3, $value4);
	//scorer1120withyearmonth_querydetail($value, $value3, $value4);
	//scorer1120withyearmonth_querytotal($value, $value3, $value4);
	//scorer2130withyearmonth_querydetail($value, $value3, $value4);
	//scorer2130withyearmonth_querytotal($value, $value3, $value4);
	//scorer3140withyearmonth_querydetail($value, $value3, $value4);
	//scorer3140withyearmonth_querytotal($value, $value3, $value4);
	//scorer4150withyearmonth_querydetail($value, $value3, $value4);
	//scorer4150withyearmonth_querytotal($value, $value3, $value4);
	//scorer5160withyearmonth_querydetail($value, $value3, $value4);
	//scorer5160withyearmonth_querytotal($value, $value3, $value4);
	//scorer61abovewithyearmonth_querydetail($value, $value3, $value4);
	//scorer61abovewithyearmonth_querytotal($value, $value3, $value4);
	//totalnumberofscoreswithyearmonth_scorer($value, $value3, $value4);
	//totalsumofscoreswithyearmonth_scorer($value, $value3, $value4);
	//totalaverageofscoreswithyearmonth_scorer($value, $value3, $value4);
	
	//scorerbelow10withrange_querydetail($value, $value5, $value6);
	//scorerbelow10withrange_querytotal($value, $value5, $value6);
	//scorer1120withrange_querydetail($value, $value5, $value6);
	//scorer1120withrange_querytotal($value, $value5, $value6);
	//scorer2130withrange_querydetail($value, $value5, $value6);
	//scorer2130withrange_querytotal($value, $value5, $value6);
	//scorer3140withrange_querydetail($value, $value5, $value6);
	//scorer3140withrange_querytotal($value, $value5, $value6);
	//scorer4150withrange_querydetail($value, $value5, $value6);
	//scorer4150withrange_querytotal($value, $value5, $value6);
	//scorer5160withrange_querydetail($value, $value5, $value6);
	//scorer5160withrange_querytotal($value, $value5, $value6);
	//scorer61abovewithrange_querydetail($value, $value5, $value6);
	//scorer61abovewithrange_querytotal($value, $value5, $value6);
	totalnumberofscoreswithrange_scorer($value, $value5, $value6);
	totalsumofscoreswithrange_scorer($value, $value5, $value6);
	totalaverageofscoreswithrange_scorer($value, $value5, $value6);
    }

?>

</body>
</html>

