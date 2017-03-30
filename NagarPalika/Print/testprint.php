<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Test nMy hu</title>
	<script type="text/javascript">
	function PrintElem(elem)
    {
      var mywindow = window.open('', 'PRINT', 'height=400,width=793');


        mywindow.document.write('<html><head><title>' + document.title  + '</title>');

        mywindow.document.write('</head><body >');
      //mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;

        }
</script>
</head>
<body>
	<h1>jhjvkhk</h1>
	<div>jk.jh/ybtfgkllb</div>
	<div onclick="PrintElem('x')">Print</div>
	<div id="x" style="display:none;"><?php include 'printAgent.php';?></div>
</body>
</html>