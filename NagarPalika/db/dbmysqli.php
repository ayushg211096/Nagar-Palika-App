<?php
$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'sobhagya';

$con = mysqli_connect($host,$user,$pass,$db);
// let’s get the variable $con from our included config file instead…
//include '../inc/config-db.php'; 
backup_tables($con);
/* backup the whole db (‘*’) OR specific table(s) (‘tableName’ or ‘tableOne, tableTwo’) */
function backup_tables($con,$tables = '*')
{
// $link = mysql_connect($host,$user,$pass);
// mysql_select_db($name,$link);
//get all of the tables
$return='';
if($tables == '*')
{
$tables = array();
$result = mysqli_query($con,'SHOW TABLES');
while($row = mysqli_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(‘,’,$tables);
}
//cycle through
foreach($tables as $table)
{
$result = mysqli_query($con,'SELECT * FROM '.$table);
$num_fields = mysqli_num_fields($result);
$return.= 'DROP TABLE IF EXISTS ‘.$table.’;';
$row2 = mysqli_fetch_row(mysqli_query($con,'SHOW CREATE TABLE '.$table));
$return.= '\n\n'.$row2[1].';\n\n';
for ($i = 0; $i < $num_fields; $i++)
{
while($row = mysqli_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
$row[$j] = preg_replace("\n","\\n",$row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");\n";
}
}
$return.="\n\n\n";
}
//save file
$handle = fopen('rvg-db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
fwrite($handle,$return);
fclose($handle);
$filename = 'rvg-db-backup-'.time().'.sql';
Header("Content-type: application/octet-stream");
Header("Content-Disposition: attachment; filename=$filename");
echo $return;
}
mysqli_close($con);
?>