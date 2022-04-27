<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet' type='text/css'/>
	<link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="css/camera.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script-->	
	
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jarton verkkokauppa</title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home', 'my_css']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>     
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <style>
    body {
      padding-top: 20px;
      padding-bottom: 20px;
    }
     a{ text-decoration: none; }
	.top-bar-section li a {
		color: #fff;
		font-size:18px;
	}
    .navbar {
      margin-bottom: 20px;
    }
	.open_toggle{
	cursor:pointer;	
	}
	.cart-info{
	display: inline-block;
	float: left;	
	width: 100%;	
	}
	.cart-info{
	display: none;
	}
	.cart-div{
	display: inline-block;
	float: right;	
	max-width: 320px; 
	text-align:left;	
	}
	.column h3{ font-size: 24px; font-weight:800; }
	.product {
    background: #fff;
    margin-bottom: 20px;
    padding-bottom: 10px;
    text-align: center;
	}
	.product-content {
    margin-bottom: 20px;
	}
	.product > a {
    display: block;
    padding: 0px;
	padding-top:10px;
	}
	.footer{ background-color: transparent; }
	.content{ background-color: transparent; 
	box-shadow: none !important; }
	.article-wrap{ display: block; width:100%; margin-top:20px; }
	.article-card {
	display: block; width:100%; background-color: #fff; 
		}
		.article-card .content {
			flex: 1 1 auto;
		}
      
    </style>
    <?php
define("SEARCHSITES","Search product");
?>
<style>
<!--SEARCH CSS-->
a {
  text-decoration: none;
}
.search_input{ font-size:18px;}
input[type="text"], label {
  color: #666;
  font-size: 18px;
  padding:20px; 
}
.shop_search li{  
	display: block;
    width: 100%;
	padding:20px;
    position: relative;
	background-color: #fff; 
	font-size:18px;
	}
.main-sites-search{ 
    display: block;
    width: 100%;
    position: relative;
	background-color: #fff;
}
#results2 {
    display: block;
    width: 100%;
    position: relative;
	background-color: #fff;
	padding:0px;
    left: 0;
    top: 0px;
}
#results2 {
    z-index: 3 !important;
}
#results {
    display: block !important;
    width: 100%;
    background-color: #fff;
    padding: 0px;
}
#results, * html #results {
    width: 100%;
    display: none;
    top: -24px;
    background: #fff;
        background-color: rgb(255, 255, 255);
}
#results ul {
	display: block;
    margin: 0;
    border: 1px solid solid #eee;
    padding: 0;
	box-shadow: 0px 0px 5px 6px #f8f8f8;
}
#results ul {
    list-style: none;
}
#results li {
    border-bottom: solid 1px #eee;
	font-size:16px;
    height: 62px;
}
#results li:hover {
background-color: #f8f8f8;
}
#sites_close_logo{position:relative;font-size:16px;padding:10px;width:30px;float:right;cursor:pointer;opacity:1;z-index:4;margin-bottom:-50px;margin-right:5px;}
#sites_close_logo{color:#999;animation:fadein 5s;-moz-animation:fadein 5s;-webkit-animation:fadein 5s;-o-animation:fadein 5s}
#sites_close_logo:hover{color:#000;}
</style>
<script>
/* ---------------------------- */
/* XMLHTTPRequest Enable 		*/
/* ---------------------------- */
function createObject() {
	var request_type;
	var browser = navigator.appName;
	if(browser == "Microsoft Internet Explorer"){
	request_type = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		request_type = new XMLHttpRequest();
	}
		return request_type;
}
var http = createObject();
/* -------------------------- */
/* SEARCH					 */
/* -------------------------- */
function autosuggest() {
var q = document.getElementById('search-main-q').value;
// Set te random number to add to URL request
nocache = Math.random();
http.open('get', 'webroot/search.php?q='+q+'&nocache = '+nocache);
http.onreadystatechange = autosuggestReply;
http.send(null);
}
function autosuggestReply() {
if(http.readyState == 4){
	var response = http.responseText;
	e = document.getElementById('results');
	if(response!=""){
		e.innerHTML=response;
		e.style.display="block";
	} else {
		e.style.display="none";
	}
}
}
</script>
</head>
<body>
    <header>
        <div class="container text-center">
<nav class="top-bar" role="navigation">
        <section class="top-bar-section">
        <div class="right-wrap">
        <div class="my_logo">
             <a href="<?= $this -> Url->build(['controller'=>'articles','action'=>'index']); ?>/" title="Homepage"><img src="<?= $this -> Url->build(['controller'=>'webroot','action'=>'img']); ?>/jw-logo.png" alt="My logo"></a>  
       </div>
            <ul class="right">

            	
                <li><a class="nav-link" href="<?= $this -> Url->build(['controller'=>'users','action'=>'index']); ?>/">Login</a></li>
                <li><span class="open_toggle">Shopping Cart <span class="badge" id="cart-counter">0</span></span></li>
          </ul>
          <div class="cart-info dropdown-menu">
          <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
         				 <div class="cart-div">
						<table class="table">
							<thead>
							</thead>
							<tbody>
								<tr>
									<td class="image"><img alt="IMAGE 1" class="img-responsive" src="<?= $this -> Url->build(['controller'=>'img','action'=>'index']); ?>/comment.jpg" style="width:60px; height:60px; max-width:60px;"></td>
									<td class="name"><a href="project.html">Communicator</a></td>
									<td class="quantity">x&nbsp;3</td>
									<td class="total">$130.00</td>
									<td class="remove"><img src="<?= $this -> Url->build(['controller'=>'img','action'=>'index']); ?>/remove-small.png" alt="Remove" title="Remove"></td>											
								</tr>
								<tr>
									<td class="image"><img alt="IMAGE 2" class="img-responsive" src="<?= $this -> Url->build(['controller'=>'img','action'=>'index']); ?>/s4.jpg" style="width:60px; height:60px; max-width:60px;"></td>
									<td class="name"><a href="project.html">S4</a></td>
									<td class="quantity">x&nbsp;3</td>
									<td class="total">$230.00</td>
									<td class="remove"><img src="<?= $this -> Url->build(['controller'=>'img','action'=>'index']); ?>/remove-small.png" alt="Remove" title="Remove"></td>											
								</tr>
							</tbody>									
						</table>
						<div class="cart-total">
						  <table>
							 <tbody>
								<tr>
								  <td><b>Sub-Total:</b></td>
								  <td>$400.00</td>
								</tr>
								<tr>
								  <td><b>Total:</b></td>
								  <td>$400.00</td>
								</tr>
							</tbody>
						  </table>
						  <div class="checkout"> <a class="nav-link" href="<?= $this -> Url->build(['controller'=>'webroot','action'=>'index']); ?>/cart.html" class="ajax_right">View Cart</a> | <a href="checkout.html" class="ajax_right">Checkout</a></div>
						</div>
					</div> 
                    </div> 
                    </div> 
                    </div> 
                    </div> 
                    </div> 
         </div>   
        </section>
    </nav>

        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
						<h1>My shop <?= $this->fetch('title') ?></h1>
            <div class="main-sites-search">
            <div style="display: inline-block; width: 100%; padding: 20px; font-size:18x;">
            <form method="post" action="#" autocomplete="off" class="search-form">
            <label for="search-main-q" style="display: none;"><?php echo constant("SEARCHSITES"); ?></label>
            <input type="text" class="search_input" name="search-main-q" size="44" maxlength="255" id="search-main-q" onKeyUp="javascript:autosuggest()" placeholder="<?php echo constant("SEARCHSITES"); ?>..." />
            <span id="sites_close_logo" title="Close">X</span>
            </form>
            </div>
            </div>
            <div id="results2"><div id="results" style="z-index: 2;"></div></div>
                    </div>
                </div>
                <div class="row">
                <?php 	
				//This is no secure!!!
				$connect = mysqli_connect("localhost","root","","verkkokauppa");
				if (!$connect) {
				die("Connection failed: " . mysqli_connect_error());
				}
				if (mysqli_connect_errno())
				{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}		
				//Get articles
				$getarticles_sql = "SELECT * FROM articles ORDER BY title DESC LIMIT 10"; 
				$get_card = mysqli_query($connect,$getarticles_sql);	
				echo "<div class='article-wrap'>";
				while($card_row = mysqli_fetch_assoc($get_card)){
				$this_article_id = $card_row['id'];	
				$title = $card_row['title'];			
				if (strlen($title) > 30){ $title = substr($title, 0, 30) . "..."; }
				$this_body = $card_row['body'];	
				$this_slug = $card_row['slug'];	
				$this_price = $card_row['price'];
				$this_image = $card_row['image'];	
				echo "
				<div class='col-md-4'>
				<div class='article-card'>
				<div class='product'>
					<a href='articles/view/".$this_slug."' title='".$title."'><img src='webroot/".$this_image."' alt='".$title."' /></a>
					<a href='articles/view/".$this_slug."' title='".$title."'><h2>".$title."</h2></a>
					<div class='product-content'>
						<p>".$this_body."</p>
						<p>€".$this_price.".00</p>";
						//Get tags
							$gettags_sql = "SELECT tag_id FROM articles_tags WHERE article_id = ".$this_article_id.""; 
							$get_tag = mysqli_query($connect,$gettags_sql);	
							while($get_tag_row = mysqli_fetch_assoc($get_tag)){
							$tag_id = $get_tag_row['tag_id'];	
							//Get tag name
								$gettagname_sql = "SELECT title FROM tags WHERE id = ".$tag_id.""; 
								$gettagname_q = mysqli_query($connect,$gettagname_sql);	
								while($gettagname_row = mysqli_fetch_assoc($gettagname_q)){
								$tag_title = $gettagname_row['title'];	
									echo "<p>Tag: <a href='articles/tagged/".$tag_title."' title='".$tag_title."'>".$tag_title."</a></p>";
								}
							}
					echo"</div>
				</div>
				</div>
                </div>";
				}
				echo "</div>";
				?>
                </div>
                
            </div>
        </div>
    </main>
   <footer class="footer">
    <div class="row">
                    <div class="column">
                        <h3>CONTACT</h3>
                        96 ISABELLA ST, LONDON SE1 8DD<br />
						TEL: 020 7928 0678
                    </div>
                    <div class="column">
						<h3>SOCIAL MEDIA</h3>
                        Facebook<br />
Twitter<br />
Instagram
                    </div>
                    <div class="column">
						<h3>OFFICE OPENING TIMES</h3>
                        MONDAY: 12pm - 11pm<br />
TUESDAY - SATURDAY: 12pm - 11pm<br />
SUNDAY: CLOSED
                    </div>
                </div>
    </footer>
    <script>
$("#sites_close_logo").hide();
$("#search-main-q").keydown(function(){
$("#sites_close_logo").show();
});
$("#sites_close_logo").click(function(){
$("#results-main2").fadeOut();
$("#sites_close_logo").hide();
location.reload();
});
</script>
<script>
$(".cart-info").hide();
$(".open_toggle").click(function(){
$(".cart-info").toggle();
});
</script>
</body>
</html>
