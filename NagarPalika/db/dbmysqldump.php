<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'sobhagya';
   
   $backup_file = "C:/xampp/htdocs/vs/Sobhagya/db/tmp/".$dbname . date("Y-m-d-H-i-s") . '.gz';
   $command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ".$dbname." | gzip > $backup_file";
   
   echo system($command);
?>