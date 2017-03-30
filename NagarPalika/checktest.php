<form action="">
<input type="checkbox" name="vehicle[]" value="Bike"> I have a bike<br>
  <input type="checkbox" name="vehicle[]" value="Car" checked> I have a car<br>
  <input type="submit" value="Submit">
</form>
<?php
if(isset($_GET['vehicle']))
{
print_r($_GET['vehicle']);
}
?>

<form action="">
<table>
<tr><th><INPUT type="checkbox" onchange="checkAll(this)" name="chk[]" /> </th></tr>
<tr><td><INPUT type="checkbox" name="chkbx[]" /> </td></tr>
<tr><td><INPUT type="checkbox" name="chkbx[]" /> </td></tr>
<tr><td><INPUT type="checkbox" name="chkbx[]" /> </td></tr>
<tr><td><INPUT type="checkbox" name="chkbx[]" /> </td></tr>
</table>
<input type="submit" value="Submit">
</form>
<script type="text/javascript">
function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
</script>
<?php
if(isset($_GET['chkbx']))
{
print_r($_GET['chkbx']);
}
?>