<!-- File: templates/Articles/view.php -->
<form>
<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><img src="../..<?= h($article->image) ?>" alt="Image" /></p>
<p><b>Price:</b> <?= h($article->price) ?></p>
<p><b>Tags:</b> <?= h($article->tag_string) ?></p>
<p>Created: <?= $article->created->format(DATE_RFC850) ?></p>
<!-- <button type="button" id="<?= h($article->id) ?>" value="<?= h($article->id) ?>" class="btnAddAction cart-action" onclick="showBasket(this.value)" style="margin-top:20px;" />Add to cart</button> -->
<form>
<!-- <p><div class="basic-button" style="float: right;"><?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?></div></p>-->


