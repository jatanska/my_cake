<!doctype html>
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
	<link rel="stylesheet" type="text/css" href="css/my_css.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/cake.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.min">
    <link rel="stylesheet" type="text/css" href="css/milligram.min">
    <!--script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script-->	
	<title>Jarton verkkokauppa</title>
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
<script src="../../webroot/nopercart/nopercart.js"></script> <!-- nopERcart Shopping-Cart, from http://ereimer.net/nopercart.htm -->
<script src="../../webroot/nopercart/noper-language-fi.iso8859-1.js"></script>    
</head>
<body>
  <header>
        <div class="container text-center">
<nav class="top-bar" role="navigation">
        <section class="top-bar-section">
        <div class="right-wrap">
        <div class="my_logo">
             <a href="../" title="Homepage"><img src="img/jw-logo.png" alt="My logo"></a>  
       </div>
       </div>   
        </section>
    </nav>

        </div>
    </header>

<div class="container">
		<div class="row">
		    <div class="col-md-12">
			    <div class="breadcrumbs">
				    <ul class="breadcrumb">
                        <li><a href="../">Home</a> <span class="divider"></span></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
				</div>
			</div>
		</div>
		
		<div class="row">
		    <div class="col-md-12">
				<h1>Shopping Cart</h1>
			</div>
            <FORM>
			<SCRIPT> ManageCart(""); </SCRIPT>
            </FORM>
		</div>
		
		<div class="row">
		    <div class="col-md-12">
			<div class="cart-info">
				<table class="table">
					<thead>
					    <tr>
							<th class="image">Image</th>
							<th>Product</th>
							<th>Model</th>
							<th>Price</th>
							<th>Quantity</th>
							<th class="total">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						    <td class="image"><img alt="IMAGE" src="products/dress33.jpg"></td>
							<td class="name"><a href="product.html">Black Dress</a></td>
							<td>Product 14</td>
							<td>$130.00</td>
							<td class="quantity">
								<input type="text" size="1" value="1" name="quantity">
								<input type="image" title="Update" alt="Update" src="img/update.png">
								<input type="image" title="Remove" alt="Remove" src="img/remove.png">
							</td>
							<td class="total">$130.00</td>
						</tr>
						<tr>
						    <td class="image"><img alt="IMAGE" src="products/dress11.jpg"></td>
							<td class="name"><a href="product.html">Blue Dress</a></td>
							<td>Product 17</td>
							<td>$230.00</td>
							<td class="quantity">
								<input type="text" size="1" value="1" name="quantity">
								<input type="image" title="Update" alt="Update" src="img/update.png">
								<input type="image" title="Remove" alt="Remove" src="img/remove.png">
							</td>
							<td class="total">$230.00</td>
						</tr>
					</tbody>									
				</table>
            </div> 			
		    </div>					
		</div>
		
		<div class="row">
		   
		    <div class="col-sm-4 col-sm-offset-8">
				<div class="cart-totals">
					<table class="table">
					    <tr>
							<th>Cart Subtotal</th>
							<td>$360.00</td>
						</tr>
					    <tr>
							<th>Shipping</th>
							<td>Free Shipping</td>
						</tr>
					    <tr>
							<th><span>Order Total</span></th>
							<td>$360.00</td>
						</tr>					
				</table>
				<p>
				<a class="btn btn-primary" href="checkout.html">
					Proceed to Checkout
				</a>
				</p>
				</div>

			</div>
		
		</div>
	

	</div>		

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

<!-- script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'><\/script>")</script -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/sapphire.js"></script>
</body>
</html>
