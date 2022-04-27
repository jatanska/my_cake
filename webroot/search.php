<?php 
//This is no secure!!!
$con = mysqli_connect("localhost","root","","verkkokauppa");
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Validate GET
$searchq = trim(stripslashes(strip_tags($_GET['q'])));
$searchq = trim(stripslashes(strip_tags(mysqli_real_escape_string($con,$searchq))));	
//GET ARTICLES FROM TITLE AND ID
$getRecord_sql = 'SELECT id, title, slug FROM articles WHERE title LIKE "%'.$searchq.'%" OR id LIKE "%'.$searchq.'%" ORDER BY title ASC LIMIT 10'; 
//$getRecord_sql = 'SELECT id, title FROM articles WHERE title LIKE "%'.$searchq.'%" ORDER BY title ASC LIMIT 10'; 
$getRecord	= mysqli_query($con,$getRecord_sql);	

if(strlen($searchq) > 0){
echo '<ul class="shop_search" style="border-top: 1px solid #eee !important;">';
while ($row = mysqli_fetch_array($getRecord)) {
$searchyhennys = $row['title'];			
if (strlen($searchyhennys) > 30){
$searchyhennys = substr($searchyhennys, 0, 30) . "..."; }
$search_slug = $row['slug'];	

?>
<li><a href="articles/view/<?php echo $search_slug; ?>" style="color: #000;" title="<?php echo $searchyhennys; ?>">
<?php echo $searchyhennys; ?></a></li>
<?php }
echo '</ul>';
?>
<?php } ?>