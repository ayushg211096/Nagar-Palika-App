<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn=mysqli_connect("localhost","root","","sobhagya");
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
	
   $table_name = "accounts";
   $backup_file  = "C:/xampp/htdocs/vs/Sobhagya/db/accounts.sql";
   $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
   
   //mysqli_select_db('sobhagya', $conn);
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval ) {
      die('Could not take data backup: ' . mysqli_error($conn));
   }
   
   echo "Backedup  data successfully\n";
   
   mysqli_close($conn);
?>