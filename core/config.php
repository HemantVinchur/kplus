<?php
	//db details
	define("DB_HOST", "localhost");
	define("DB_NAME", "milkbasket");
	define("DB_USER", "root");
	define("DB_PASS", "");

	$link=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	//Time Zone
	date_default_timezone_set("Asia/Kolkata");

	function dtime_now(){
		return date('Y-m-d h:i:s');
	}

	function execute_sql($sql){
		global $link;

		return mysqli_query($link,$sql);
	}

	function get_contents($sql){
		global $link;

		$result=execute_sql($sql);
		$rowArr=[];
		while ($row=mysqli_fetch_assoc($result)) {
			array_push($rowArr,$row);
		}
		return $rowArr;
	}

?>
