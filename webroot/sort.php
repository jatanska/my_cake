<?php
//sort 
$order_by_sites = trim(stripslashes(strip_tags($_GET["orderby_sites"])));	
if ($_GET["orderby_sites"] == "latest_first"){ $order_by_sites = "id DESC"; }
else if ($_GET["orderby_sites"] == "alphabetical"){ $order_by_sites = "title ASC"; }
else if ($_GET["orderby_sites"] == "oldest_first"){ $order_by_sites = "id ASC"; }
else { $order_by_sites = "created DESC"; //Default order
}
echo "<div class='sites-select'><form action='' method='get' enctype='multipart/form-data'>
<select name='orderby_sites' id='orderby_sites' title='Order by' onchange='this.form.submit();' class='orderby_sites'>";
echo "<option value='default' "; if ($_GET["orderby_sites"] == ""){ echo "selected='selected'"; } echo ">Default</option>";
echo "<option value='latest_first' "; if ($_GET["orderby_sites"] == "latest_first"){ echo "selected='selected'"; } echo ">Latest first</option>";
echo "<option value='alphabetical' "; if ($_GET["orderby_sites"] == "alphabetical"){ echo "selected='selected'"; } echo ">Alphabetical</option>";
echo"<option value='oldest_first' "; if ($_GET["orderby_sites"] == "oldest_first"){ echo "selected='selected'"; } echo ">Oldest first</option>
</select>
</form></div>";
?>