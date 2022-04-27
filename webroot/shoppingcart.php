<?php
$q = stripslashes(strip_tags(trim(intval($_GET['q']))));
require_once "../config/connect.php";
$sql="SELECT * FROM articles WHERE id = ".$q."";
$result = mysqli_query($connect,$sql);
echo "<table class='my-shoppincart'>
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
echo "</table>";
mysqli_close($connect);
?>