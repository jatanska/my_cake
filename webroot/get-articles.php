<?php 	
				//Get articles
				$getarticles_sql = "SELECT * FROM articles ORDER BY ".$order_by_sites." LIMIT 10"; 
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
									echo "<p>Tag: ".$tag_title."</p>";
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