<?php

//for file_id drop down menu
function filenamedropdown(){
	global $conn;
	$query = "SELECT DISTINCT file_id FROM processed_data";
    $result = mysql_query($query, $conn);
		if(!$result){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
	echo filename; 
	echo '<select id="filename" name="filename">';
	while ($row = mysql_fetch_assoc($result)){
	echo '<option value="' . $row['file_id'] . '">' . $row['file_id']. '</option>';
	}	
	echo "</select>";				

}//end of function

//for year drop down menu
function yeardropdown(){
	global $conn;
	$yearquery = "SELECT DISTINCT YEAR(upload_date) AS 'year' FROM processed_data";
    $resultyear = mysql_query($yearquery, $conn);
		if(!$resultyear){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo year; 
	echo '<select id="year" name="year">';
	while ($row = mysql_fetch_assoc($resultyear)){
	echo '<option value="' . $row['year'] . '">' . $row['year']. '</option>';
	}	
	echo "</select>";				

}//end of function

//for month drop down menu
function monthdropdown(){
	global $conn;
	$monthquery = "SELECT DISTINCT MONTH(upload_date) AS 'month' FROM processed_data";
    $resultmonth = mysql_query($monthquery, $conn);
		if(!$resultmonth){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo month; 
	echo '<select id="month" name="month">';
	while ($row = mysql_fetch_assoc($resultmonth)){
	echo '<option value="' . $row['month'] . '">' . $row['month']. '</option>';
	}	
	echo "</select>";				

}//end of function

function calendar(){
		require_once('calendar/classes/tc_calendar.php');

	 	$myCalendar = new tc_calendar("fromdate", true, false);
	  	$myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  	$myCalendar->setPath("calendar/");
	  	$myCalendar->setYearInterval(2008, 2100);
	  	$myCalendar->setAlignment('left', 'bottom');
	  	$myCalendar->setDatePair('fromdate', 'todate');
	  	$myCalendar->setText("From"); 
		$myCalendar->getDate();
	  	$myCalendar->writeScript();	  
	  
	  
		$myCalendar = new tc_calendar("todate", true, false);
	  	$myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  	$myCalendar->setPath("calendar/");
	  	$myCalendar->setYearInterval(2008, 2100);
	  	$myCalendar->setAlignment('left', 'bottom');
	  	$myCalendar->setDatePair('fromdate', 'todate');
	  	$myCalendar->setText("To"); 
	  	$myCalendar->getDate();
	  	$myCalendar->writeScript();	
}


//for scorer query no file_id value input
function scorerbelow10_querydetail($value){
	global $conn;
	$scorer = $value;
	$tsd10b = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name, 
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing <= 10 && scorer = '$scorer'";
	$resulttsd10b = mysql_query($tsd10b, $conn);
	
		if(!$resulttsd10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsd10b)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function


function scorerbelow10_querytotal($value){
	global $conn;
	$scorer = $value;
	$tst10b = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing <= 10 && scorer = '$scorer'";
	$resulttst10b = mysql_query($tst10b, $conn);
		
		if (!$resulttst10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}

	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst10b)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";	
}//end of function


function scorer1120_querydetail($value){
	global $conn;
	$scorer = $value;
	$tsd1120 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name, 
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 11 AND processing <= 20 && 
		scorer = '$scorer'";
	$resulttsd1120 = mysql_query($tsd1120, $conn);	
		
		if (!$resulttsd1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";		
	while ($row1 = mysql_fetch_assoc($resulttsd1120)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$callstatus = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer1120_querytotal($value){
	global $conn;
	$scorer = $value;
	$tst1120 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 11 AND processing <= 20 && scorer = '$scorer'";
	$resulttst1120 = mysql_query($tst1120, $conn);
	
		if (!$resulttst1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	

	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst1120)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";	
}//end of function

function scorer2130_querydetail($value){
	global $conn;
	$scorer = $value;
	$tsd2130 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name, 
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 21 AND processing <= 30 
		&& scorer = '$scorer'";
	$resulttsd2130 = mysql_query($tsd2130, $conn);
	
		if (!$resulttsd2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsd2130)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer2130_querytotal($value){
	global $conn;
	$scorer = $value;
	$tst2130 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 21 AND processing <= 30 && scorer = '$scorer'";
	$resulttst2130 = mysql_query($tst2130, $conn);
	
		if (!$resulttst2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}

	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst2130)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}

function scorer3140_querydetail($value){
	global $conn;
	$scorer = $value;
	$tsd3140 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name, 
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 31 AND processing <= 40 
		&& scorer = '$scorer'";
	$resulttsd3140 = mysql_query($tsd3140, $conn);
		
		if (!$resulttsd3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	

	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsd3140)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";		
	
}//end of function

function scorer3140_querytotal($value){
	global $conn;
	$scorer = $value;
	$tst3140 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 31 AND processing <= 40 && scorer = '$scorer'";
	$resulttst3140 = mysql_query($tst3140, $conn);
		
		if (!$resulttst3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst3140)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";	
}//end of function

function scorer4150_querydetail($value){
	global $conn;
	$scorer = $value;
	$tsd4150 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name, 
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 41 AND processing <= 50 
		&& scorer = '$scorer'";
	$resulttsd4150 = mysql_query($tsd4150, $conn);
	
		if (!$resulttsd4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsd4150)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
	
}//end of function

function scorer4150_querytotal($value){
	global $conn;
	$scorer = $value;
	$tst4150 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 41 AND processing <= 50 && scorer = '$scorer'";
	$resulttst4150 = mysql_query($tst4150, $conn);
			
		if (!$resulttst4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	

	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst4150)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";	
}//end of function

function scorer5160_querydetail($value){
	global $conn;
	$scorer = $value;
	$tsd5160 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 51 AND processing <= 60 
		&& scorer = '$scorer'";
	$resulttsd5160 = mysql_query($tsd5160, $conn);
	
		if (!$resulttsd5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsd5160)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer5160_querytotal($value){
	global $conn;
	$scorer = $value;
	$tst5160 =  "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 51 AND processing <= 60 && scorer = '$scorer'";
	$resulttst5160 = mysql_query($tst5160, $conn);
	
		if (!$resulttst5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst5160)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";	
}//end of function

function scorer61above_querydetail($value){
	global $conn;
	$scorer = $value;
	$tsd61a = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name, 
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 61 && scorer = '$scorer'";
	$resulttsd61a = mysql_query($tsd61a, $conn);
	
		if (!$resulttsd61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}		
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsd61a)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer61above_querytotal($value){
	global $conn;
	$scorer = $value;
	$tst61a = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 61 && scorer = '$scorer'";
	$resulttst61a = mysql_query($tst61a, $conn);
	
		if (!$resulttst61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}		
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst61a)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";	
		
}//end of function

function totalnumberofscores_scorer($value){
	global $conn;
	$scorer = $value;
	$totalNoScores = "SELECT scorer, COUNT(*) as total FROM processed_data WHERE scorer = '$scorer'";
	$resultTotalNoScores = mysql_query($totalNoScores, $conn);

		if (!$resultTotalNoScores){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}		
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalNoScores)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalsumofscores_scorer($value){
	global $conn;
	$scorer = $value;
	$totalScores = "SELECT scorer, SUM(processing) as total FROM processed_data WHERE scorer = '$scorer'";
	$resultTotalScores = mysql_query($totalScores, $conn);
	
		if (!$resultTotalScores){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalScores)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalaverageofscores_scorer($value){
	global $conn;
	$scorer = $value;
	$averageScores = "SELECT scorer, AVG(processing) as total FROM processed_data WHERE scorer = '$scorer'";
	$resultAverageScores = mysql_query($averageScores, $conn);
	
		if (!$resultAverageScores){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultAverageScores)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function


//for scorer query with file_id value input
function scorerbelow10withfile_querydetail($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsfd10b = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing <= 10 && scorer = '$scorer' 
		&& file_id = '$file_id'";
	$resulttsfd10b = mysql_query($tsfd10b, $conn);
	
		if (!$resulttsfd10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsfd10b)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
	
}//end of function

function scorerbelow10withfile_querytotal($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsft10b =  "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing <= 10 && file_id = '$file_id' && scorer = '$scorer'";
	$resulttsft10b = mysql_query($tsft10b, $conn);

		if (!$resulttsft10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsft10b)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";	
}// end of function

function scorer1120withfile_querydetail($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsfd1120 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 11 AND processing <= 20 
		&& scorer = '$scorer' && file_id = '$file_id'";
	$resulttsfd1120 = mysql_query($tsfd1120, $conn);
	
		if (!$resulttsfd1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsfd1120)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer1120withfile_querytotal($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsft1120 =  "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 11 AND processing <= 20 && file_id = '$file_id'
		&& scorer = '$scorer'";
	$resulttsft1120 = mysql_query($tsft1120, $conn);
	
		if (!$resulttsft1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsft1120)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer2130withfile_querydetail($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;	
	$tsfd2130 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 21 AND processing <= 30
		&& scorer = '$scorer' && file_id = '$file_id'";
	$resulttsfd2130 = mysql_query($tsfd2130, $conn);
	
		if (!$resulttsfd2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	

	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsfd2130)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer2130withfile_querytotal($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;	
	$tsft2130 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 21 AND processing <= 30 && file_id = '$file_id'
		&& scorer = '$scorer'";
	$resulttsft2130 = mysql_query($tsft2130, $conn);
			
		if (!$resulttsft2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsft2130)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer3140withfile_querydetail($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;	
	$tsfd3140 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 31 AND processing <= 40
		&& scorer = '$scorer' && file_id = '$file_id'";
	$resulttsd3140 = mysql_query($tsfd3140, $conn);
	
		if (!$resulttsd3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsd3140)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer3140withfile_querytotal($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsft3140 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 31 AND processing <= 40 && file_id = '$file_id'
		&& scorer = '$scorer'";
	$resulttst3140 = mysql_query($tsft3140, $conn);
	
		if (!$resulttst3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	

	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttst3140)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
		
}//end of function

function scorer4150withfile_querydetail($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsfd4150 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 41 AND processing <= 50
		&& scorer = '$scorer' && file_id = '$file_id'";
	$resulttsfd4150 = mysql_query($tsfd4150, $conn);
	
		if (!$resulttsfd4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsfd4150)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer4150withfile_querytotal($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsft4150 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 41 AND processing <= 50 && file_id = '$file_id'
		&& scorer = '$scorer'";
	$resulttsft4150 = mysql_query($tsft4150, $conn);
		
		if (!$resulttsft4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsft4150)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer5160withfile_querydetail($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsfd5160 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 51 AND processing <= 60
		&& scorer = '$scorer' && file_id = '$file_id'";
	$resulttsfd5160 = mysql_query($tsfd5160, $conn);
		
		if (!$resulttsfd5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsfd5160)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
		
}//end of function

function scorer5160withfile_querytotal($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsft5160 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 51 AND processing <= 60 && file_id = '$file_id'
		&& scorer = '$scorer'";
	$resulttsft5160 = mysql_query($tsft5160, $conn);
	
		if (!$resulttsft5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsft5160)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer61abovewithfile_querydetail($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsfd61a = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 61 && scorer = '$scorer'
		&& file_id = '$file_id'";
	$resulttsfd61a = mysql_query($tsfd61a, $conn);

		if (!$resulttsfd61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsfd61a)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type = $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";

}//end of function

function scorer61abovewithfile_querytotal($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$tsft61a = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 61 && file_id = '$file_id' && scorer = '$scorer'";
	$resulttsft61a = mysql_query($tsft61a, $conn);
	
		if (!$resulttsft61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsft61a)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function totalnumberofscoreswithfile_scorer($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$totalNoScoresF = "SELECT scorer, COUNT(processing) as total FROM processed_data WHERE scorer = '$scorer' && file_id = '$file_id'";
	$resultTotalNoScoresF = mysql_query($totalNoScoresF, $conn);

		if (!$resultTotalNoScoresF){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}		
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalNoScoresF)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalsumofscoreswithfile_scorer($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$totalScoresF = "SELECT scorer, SUM(processing) as total FROM processed_data WHERE scorer = '$scorer' && file_id = '$file_id'";
	$resultTotalScoresF = mysql_query($totalScoresF, $conn);
	
		if (!$resultTotalScoresF){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalScoresF)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalaverageofscoreswithfile_scorer($value, $value2){
	global $conn;
	$scorer = $value;
	$file_id = $value2;
	$averageScoresF = "SELECT scorer, AVG(processing) as total FROM processed_data WHERE scorer = '$scorer' && file_id = '$file_id'";
	$resultAverageScoresF = mysql_query($averageScoresF, $conn);
	
		if (!$resultAverageScoresF){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultAverageScoresF)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

//for scorer query with year and month value input
function scorerbelow10withyearmonth_querydetail($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyd10b = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing <= 10 && scorer = '$scorer'
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyd10b = mysql_query($tsmyd10b, $conn);
	
		if (!$resulttsmyd10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsmyd10b)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
	
}//end of function

function scorerbelow10withyearmonth_querytotal($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyt10b = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE  processing <= 10 && scorer = '$scorer' &&
		year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyt10b = mysql_query($tsmyt10b, $conn);
	
		if (!$resulttsmyt10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
			
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsmyt10b)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer1120withyearmonth_querydetail($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyd1120 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 11 AND processing <= 20
		&& scorer = '$scorer' && year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyd1120 = mysql_query($tsmyd1120, $conn);
	
		if (!$resulttsmyd1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsmyd1120)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer1120withyearmonth_querytotal($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyt1120 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 11 AND processing <= 20 && scorer = '$scorer'
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyt1120 = mysql_query($tsmyt1120, $conn);
	
		if (!$resulttsmyt1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsmyt1120)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer2130withyearmonth_querydetail($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
 	$tsmyd2130 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 21 AND processing <= 30
		&& scorer = '$scorer' && year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyd2130 = mysql_query($tsmyd2130, $conn);
	
		if (!$resulttsmyd2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsmyd2130)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer2130withyearmonth_querytotal($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyt2130 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 21 AND processing <= 30 && scorer = '$scorer'
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyt2130 = mysql_query($tsmyt2130, $conn);
	
		if (!$resulttsmyt2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsmyt2130)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer3140withyearmonth_querydetail($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyd3140 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 31 AND processing <= 40
		&& scorer = '$scorer' && year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyd3140 = mysql_query($tsmyd3140, $conn);
	
		if (!$resulttsmyd3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsmyd3140)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer3140withyearmonth_querytotal($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyt3140 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 31 AND processing <= 40 && scorer = '$scorer'
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyt3140 = mysql_query($tsmyt3140, $conn);
	
		if (!$resulttsmyt3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsmyt3140)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer4150withyearmonth_querydetail($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyd4150 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 41 AND processing <= 50
		&& scorer = '$scorer' && year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyd4150 = mysql_query($tsmyd4150, $conn);
	
		if (!$resulttsmyd4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsmyd4150)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer4150withyearmonth_querytotal($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyt4150 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 41 AND processing <= 50 && scorer = '$scorer'
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyt4150 = mysql_query($tsmyt4150, $conn);
	
	
		if (!$resulttsmyt4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsmyt4150)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer5160withyearmonth_querydetail($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyd5160 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 51 AND processing <= 60
		&& scorer = '$scorer' && year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyd5160 = mysql_query($tsmyd5160, $conn);
	
		if (!$resulttsmyd5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsmyd5160)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer5160withyearmonth_querytotal($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyt5160 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 51 AND processing <= 60 && scorer = '$scorer'
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyt5160 = mysql_query($tsmyt5160, $conn);
	
	
		if (!$resulttsmyt5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsmyt5160)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer61abovewithyearmonth_querydetail($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyd61a = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 61 && scorer = '$scorer'
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyd61a = mysql_query($tsmyd61a, $conn);
	
		if (!$resulttsmyd61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsmyd61a)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}// end of function

function scorer61abovewithyearmonth_querytotal($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$tsmyt61a =  "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 61 && scorer = '$scorer' 
		&& year(upload_date) = '$selectedYear' && month(upload_date) = '$selectedMonth'";
	$resulttsmyt61a = mysql_query($tsmyt61a, $conn);
	
		if (!$resulttsmyt61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsmyt61a)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function totalnumberofscoreswithyearmonth_scorer($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$totalNoScoresMY = "SELECT scorer, COUNT(processing) as total FROM processed_data WHERE scorer = '$scorer' && year(upload_date) = '$selectedYear'
		&& month(upload_date) = '$selectedMonth'";
	$resultTotalNoScoresMY = mysql_query($totalNoScoresMY, $conn);

		if (!$resultTotalNoScoresMY){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}		
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalNoScoresMY)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalsumofscoreswithyearmonth_scorer($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$totalScoresMY = "SELECT scorer, SUM(processing) as total FROM processed_data WHERE scorer = '$scorer' && year(upload_date) = '$selectedYear'
		&& month(upload_date) = '$selectedMonth'";
	$resultTotalScoresMY = mysql_query($totalScoresMY, $conn);
	
		if (!$resultTotalScoresMY){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalScoresMY)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalaverageofscoreswithyearmonth_scorer($value, $value3, $value4){
	global $conn;
	$scorer = $value;
	$selectedYear = $value3;
	$selectedMonth = $value4;
	$averageScoresMY = "SELECT scorer, AVG(processing) as total FROM processed_data WHERE scorer = '$scorer' && year(upload_date) = '$selectedYear'
		&& month(upload_date) = '$selectedMonth'";
	$resultAverageScoresMY = mysql_query($averageScoresMY, $conn);
	
		if (!$resultAverageScoresMY){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultAverageScoresMY)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function scorerbelow10withrange_querydetail($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrd10b = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing <= 10 && scorer = '$scorer'
		&& upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate') ";
	$resulttsrd10b = mysql_query($tsrd10b, $conn);
	
		if (!$resulttsrd10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsrd10b)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}

function scorerbelow10withrange_querytotal($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
		$tsrt10b = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing <= 10 && scorer = '$scorer' && upload_date
		BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resulttsrt10b = mysql_query($tsrt10b, $conn);
	
		if (!$resulttsrt10b){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsrt10b)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer1120withrange_querydetail($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrd1120 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 11 AND processing <= 20
		&& scorer = '$scorer' && upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate') ";
	$resulttsrd1120 = mysql_query($tsrd1120, $conn);
	
		if (!$resulttsrd1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsrd1120)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer1120withrange_querytotal($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrt1120 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 11 AND processing <= 20 && scorer = '$scorer'
		&& upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resulttsrt1120 = mysql_query($tsrt1120, $conn);
	
		if (!$resulttsrt1120){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsrt1120)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer2130withrange_querydetail($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrd2130 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 21 AND processing <= 30
		&& scorer = '$scorer' && upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate') ";
	$resulttsrd2130 = mysql_query($tsrd2130, $conn);
	
		if (!$resulttsrd2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsrd2130)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer2130withrange_querytotal($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrt2130 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 21 AND processing <= 30 && scorer = '$scorer'
		&& upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resulttsrt2130 = mysql_query($tsrt2130, $conn);
	
		if (!$resulttsrt2130){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsrt2130)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer3140withrange_querydetail($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrd3140 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 31 AND processing <= 40
		&& scorer = '$scorer' && upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate') ";
	$resulttsrd3140 = mysql_query($tsrd3140, $conn);
	
		if (!$resulttsrd3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsrd3140)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer3140withrange_querytotal($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrt3140 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 31 AND processing <= 40 && scorer = '$scorer'
		&& upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resulttsrt3140 = mysql_query($tsrt3140, $conn);
	
		if (!$resulttsrt3140){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsrt3140)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer4150withrange_querydetail($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrd4150 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 41 AND processing <= 50
		&& scorer = '$scorer' && upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate') ";
	$resulttsrd4150 = mysql_query($tsrd4150, $conn);
	
		if (!$resulttsrd4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsrd4150)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer4150withrange_querytotal($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrt4150 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 41 AND processing <= 50 && scorer = '$scorer'
		&& upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resulttsrt4150 = mysql_query($tsrt4150, $conn);
	
		if (!$resulttsrt4150){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsrt4150)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer5160withrange_querydetail($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrd5160 = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 51 AND processing <= 60
		&& scorer = '$scorer' && upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate') ";
	$resulttsrd5160 = mysql_query($tsrd5160, $conn);
	
		if (!$resulttsrd5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsrd5160)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer5160withrange_querytotal($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrt5160 = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 51 AND processing <= 60 && scorer = '$scorer'
		&& upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resulttsrt5160 = mysql_query($tsrt5160, $conn);
	
		if (!$resulttsrt5160){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsrt5160)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function scorer61abovewithrange_querydetail($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrd61a = "SELECT scorer, upload_date, file_id, call_start_time, processing_start, processing_end, processing, industry, account_name,
		customer_name, call_id, call_type, call_status, call_duration, audio_url FROM processed_data WHERE processing >= 61 && scorer = '$scorer' 
		&& upload_date BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate') ";
	$resulttsrd61a = mysql_query($tsrd61a, $conn);
	
		if (!$resulttsrd61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row1 = mysql_fetch_assoc($resulttsrd61a)) 
	{
		$scorer = $row1['scorer'];
		$upload_date = $row1['upload_date'];
		$file_id = $row1['file_id'];
		$call_start_time = $row1['call_start_time'];
		$processing_start = $row1['processing_start'];
		$processing_end = $row1['processing_end'];
		$processing = $row1['processing'];
		$industry = $row1['industry'];
		$account_name = $row1['account_name'];
		$customer_name = $row1['customer_name'];
		$call_id = $row1['call_id'];
		$call_type =  $row1['call_type'];
		$call_status = $row1['call_status'];
		$call_duration = $row1['call_duration'];
		$audio_url = $row1['audio_url'];
		echo "<tr><td>".$scorer."</td><td>".$upload_date."</td><td>".$file_id."</td><td>".$call_start_time."</td><td>".$processing_start."</td><td>".$processing_end."</td>
		 <td>".$processing."</td><td>".$industry."</td><td>".$account_name."</td><td>".$customer_name."</td><td>".$call_id."</td><td>".$call_type."</td>
		 <td>".$callstatus."</td><td>".$call_duration."</td><td>".$audio_url."</td></tr>";
	} 
	echo "</table>";
}//end of function

function scorer61abovewithrange_querytotal($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$tsrt61a = "SELECT scorer, COUNT(*) as totalResult FROM processed_data WHERE processing >= 61 && scorer = '$scorer' && upload_date 
		BETWEEN date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resulttsrt61a = mysql_query($tsrt61a, $conn);
	
		if (!$resulttsrt61a){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resulttsrt61a)) 
	{	
		$scorer = $row['scorer'];
		$totalresult = $row['totalResult'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";
}//end of function

function totalnumberofscoreswithrange_scorer($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$totalNoScoresR = "SELECT scorer, COUNT(processing) as total FROM processed_data WHERE scorer = '$scorer' && upload_date BETWEEN
		date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resultTotalNoScoresR = mysql_query($totalNoScoresR, $conn);

		if (!$resultTotalNoScoresR){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}		
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalNoScoresR)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalsumofscoreswithrange_scorer($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$totalScoresR = "SELECT scorer, SUM(processing) as total FROM processed_data WHERE scorer = '$scorer' && upload_date BETWEEN
		date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resultTotalScoresR = mysql_query($totalScoresR, $conn);
	
		if (!$resultTotalScoresR){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultTotalScoresR)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function

function totalaverageofscoreswithrange_scorer($value, $value5, $value6){
	global $conn;
	$scorer = $value;
	$lowerRangeSelectedDate = $value5;
	$upperRangeSelectedDate = $value6;
	$averageScoresR = "SELECT scorer, AVG(processing) as total FROM processed_data WHERE scorer = '$scorer' && upload_date BETWEEN
		date('$lowerRangeSelectedDate') AND date('$upperRangeSelectedDate')";
	$resultAverageScoresR = mysql_query($averageScoresR, $conn);
	
		if (!$resultAverageScoresR){
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}	
		
	echo "<table>";	
	while ($row = mysql_fetch_assoc($resultAverageScoresR)) 
	{
		$scorer = $row['scorer'];
		$totalresult = $row['total'];
		echo "<tr><td>".$scorer."</td><td>".$totalresult."</td></tr>";
	}
	echo "</table>";		
}//end of function
?>
