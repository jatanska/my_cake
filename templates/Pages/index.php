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
	<title>Simple shop</title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home', 'my_css', 'firstpage', 'basket', 'search']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>     
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="webroot/js/search.js"></script>
    <script src="webroot/js/basket.js"></script>
     <style>
	.view-container{ display: inline-block; float: left; width:100%; background-color: #fff; }
	.main{ display: inline-block; float: left; width:100%; background-color: #fff; padding-bottom:40px; margin-bottom:20px; }
	a {
    color: #777;
    text-decoration: none;
	font-size:16px;
	}
	a:hover {
    color: #000;
    text-decoration: none;
	font-size:16px;
	}
	</style>
</head>
<body>
    <header>
        <div class="container text-center">
		<nav class="top-bar" role="navigation">
        <section class="top-bar-section">
        <div class="right-wrap">
            <div class="my_logo">
                 <a href="<?= $this -> Url->build(['controller'=>'/','action'=>'index']); ?>/" title="Homepage"><img src="<?= $this -> Url->build(['controller'=>'webroot','action'=>'img']); ?>/jw-logo.png" alt="My logo"></a>  
           </div>
                  <ul class="right">
                        <li><a class="nav-link" href="<?= $this -> Url->build(['controller'=>'users','action'=>'index']); ?>/">Login</a></li>
                        <li><span class="open_toggle">Shopping Cart <span class="badge" id="cart-counter">1</span></span></li>
                  </ul>
              		<div class="cart-info dropdown-menu">
                            <div class="container">
                                <div class="content">
                                    <div class="row">
                                        <div class="column">
                                                 <div class="cart-div">
                                                        <div class="close_basket">X</div>
                                                        <h3>My cart</h3>
                                                        <div id="txtHint"></div>
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
						<h1>Simple Shop</h1>
                        <div class="main-sites-search">
                        <div style="display: inline-block; width: 100%; padding: 20px; font-size:18x;">
                        <form method="post" action="#" autocomplete="off" class="search-form">
                        <label for="search-main-q" style="display: none;">Search product</label>
                        <input type="text" class="search_input" name="search-main-q" size="44" maxlength="255" id="search-main-q" onKeyUp="javascript:autosuggest()" placeholder="Search product..." />
                        <!-- <span id="search-close" title="Close">Close</span>-->
                        </form>
                        </div>
                        </div>
                        <div id="results2"><div id="results" style="z-index: 2;"></div></div>
                    </div>
                </div>
                <div class="row">
                <?php require_once "../config/connect.php"; ?>

                <?php 	
				//Get articles
				$getarticles_sql = "SELECT * FROM articles ORDER BY id DESC LIMIT 10"; 
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
				<form>
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
					echo"</div>"; ?>
			<button type="button" id="<?php echo "".$this_article_id.""; ?>" value="<?php echo "".$this_article_id.""; ?>" class="btnAddAction cart-action" onclick="showBasket(this.value)" />Add to cart</button>
</form>
<br>
            <?php
				echo "</form>";	
				echo "</div>
				</div>
                </div>";
				}
				echo "</div>";
				?>
                </div>
                
            </div>
        </div>
    </main>
<?php require_once "footer.php"; ?>
</body>
</html>
