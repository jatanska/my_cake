<?php
$q = stripslashes(strip_tags(trim(intval($_GET['q']))));
require_once "../config/connect.php";
$sql="SELECT * FROM articles WHERE id = ".$q."";
$result = mysqli_query($connect,$sql);
echo "<form action='webroot/cart.php' method='post'><table class='my-shoppincart'>
<tr>
<th>Title</th>
<th>Description</th>
<th>Price</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td><a href='articles/view/".$row['slug']."' title='".$row['title']."'>" . $row['title'] . "</a></td>";
  echo "<td>" . $row['body'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "</tr>";
}
echo "<tr><td colspan='3'><button type='submit' id='1' value='1' class='btnAddAction cart-action' style='float:right;' />Continue</button></td></tr>";
echo "</table></form>";
mysqli_close($connect);
?>