<?php
$filen='Saubhagya'.date('d_m_y_h_m_s_a').'.sql';
//echo exec('mysqldump.exe --user=root --password= --host=localhost sobhagya > C:\xampp\htdocs\vs\Sobhagya\db\sql'.date("dmyhms").'.sql');
//echo shell_exec('mysqldump.exe --user=root --password= --host=localhost sobhagya > C:\xampp\htdocs\vs\Sobhagya\db\sql'.date("dmyhms").'se.sql');
$cmand= 'C:\xampp\mysql\bin\mysqldump.exe --user=root --password= --host=localhost sobhagya > C:\xampp\htdocs\vs\Sobhagya\db\bkp'.$filen;
//echo $cmand;

$output = shell_exec($cmand);
//echo "<pre>$output</pre>";
$file='bkp'.$filen;
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
else
{
	echo 'Eroor';
}

?>