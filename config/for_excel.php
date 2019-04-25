<?php 

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "resto_db";

	$con = mysqli_connect($hostname, $username, $password, $database) or die("Connection corrupt");

	class Resto{

		public function selectOrderBy($table, $field){
			global $con;
	        $sql   = "SELECT * FROM $table ORDER BY $field DESC";
	        $query = mysqli_query($con, $sql);
	        $data  = [];
	        while ($bigData = mysqli_fetch_assoc($query)) {
	            $data[] = $bigData;
	        }
	        return $data;
		}

		public function selectSum($table, $namaField)
	    {
	        global $con;
	        $sql         = "SELECT SUM($namaField) as sum FROM $table";
	        $query       = mysqli_query($con, $sql);
	        return $data = mysqli_fetch_assoc($query);
	    }

	}

	

 ?>