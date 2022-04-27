<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Jarton verkkokauppa';
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
	.admin-nav{
	display: block; float: left; width:100%; padding-top:20px; padding-bottom:20px;	
	}
	.admin-nav ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  background-color: #333;
	}
	.admin-nav li {
 	 float: left;
	}
	.admin-nav li a {
  display: block;
  color: #000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.admin-nav li a:hover {
  background-color: #111;
  color: #fff;
}
	</style>
</head>
<body>
        <header>
        <?php require_once "../config/connect.php"; ?>
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
        <div class="view-container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        </div>
    </main>
<?php require_once "footer.php"; ?>
</body>
</html>
