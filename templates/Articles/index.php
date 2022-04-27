<!-- File: templates/Articles/index.php  (delete and edit links added) -->
<nav class="admin-nav">
<ul class="admin-nav-ul">
                <li><a class="nav-link" href="<?= $this -> Url->build(['controller'=>'tags','action'=>'index']); ?>/">Tags</a></li>
                <li><a class="nav-link" href="<?= $this -> Url->build(['controller'=>'users','action'=>'index']); ?>/">Users</a></li>
                <li style="float: right;"><a class="nav-link" href="<?= $this -> Url->build(['controller'=>'users','action'=>'logout']); ?>/">Logout</a></li>
</ul>
</nav>
<h1>
    Articles
</h1>
<p class="basic-button" style="margin-bottom:20px;"><?= $this->Html->link("Add Article", ['action' => 'add']) ?></p>
<div class="col-md-9">
<div class="row">
<?php foreach ($articles as $article): ?>
		    <div class="col-md-4">
			    <div class="product">
                <h2><?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?></h2>
				    <?= $this->Html->image($article->image) ?>
                    <p class="time"><?= $article->created->format(DATE_RFC850) ?></p>
             		<div class="name">     
					<?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $article->slug],
                        ['confirm' => 'Are you sure?'])
                    ?>
				    </div>
				    <div class="price">
				    <?= $this->Text->autoParagraph($article->price, ['action' => 'view', $article->slug]); ?>
				    </div>
                    
				</div>
              </div>  
<?php endforeach; ?>
			</div>
            </div>