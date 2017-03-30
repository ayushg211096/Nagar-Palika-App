<?php

class DBExport
{
	function __construct()
	{
		$con=mysqli_connect("localhost","root","","sobhagya");		
	}

	function Export($structureonly)
	{
		$con=mysqli_connect("localhost","root","","sobhagya");		
		$dbfilename="dbexport_".date("dmyhmsa").".sql";
		$this->table_array = array();
		$table_query = mysqli_query($con, "SHOW TABLES");
		if(mysqli_num_rows($table_query)>0)
		{
			while($data=mysqli_fetch_array($table_query))
			{
				$query2 = mysqli_query($con, "SHOW CREATE TABLE ".$data[0]);
				$this->table_array[] = mysqli_fetch_assoc($query2);
			}

			$file_content = "";
			foreach ($this->table_array as $key => $value) {
				$file_content.=$value['Create Table'].";\n\n";
				if($structureonly!=1){
					$tabledata = array();
					$query3 = mysqli_query($con,"select * from ".$value['Table']);
					while($data3 = mysqli_fetch_assoc($query3)){
						$file_content.=$this->InsertRecordQuery($value['Table'],$data3);
						$tabledata[] = $data3;
					}
					if(!empty($tabledata)) {
						$file_content.=$this->InsertRecordQuery($value['Table'],$tabledata);
					}
				}
			}

			if($file_content!="")
			{
				$myfile = fopen($dbfilename, "w") or die("Unable to open file!");
				fwrite($myfile, $file_content);
				fclose($myfile);
			}
		}

		if(file_exists($dbfilename) && !empty($file_content)) {
			header("location:download.php?file=".$dbfilename);
			exit;
		}

	}

	function InsertRecordQuery($tablename,$array)
	{
		$con=mysqli_connect("localhost","root","","sobhagya");	
		$query_string = "insert into ".$tablename." (";
		foreach ($array as $key => $value) 
		{
			$query_string.="`".$key."` ,";
		}
				
		$query_string = trim($query_string," ,");

		$query_string.=" ) values ";
		foreach ($array as $key => $value) 
		{
			$query_string.=" ( ";
			foreach ($value as $k => $v) 
			{
				$query_string.="'".mysqli_real_escape_string($con,$v)."' ,";	
			}

			$query_string=trim($query_string," ,")." ) ,";
			
		}
		return trim($query_string," ,").";\n\n";
	}

}
?>