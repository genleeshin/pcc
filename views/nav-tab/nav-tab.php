<ul class="nav nav-tabs" <?=$comp->getTagAttributes()?>>
  <?php foreach($tabs as $tab): ?>

  	<li class="<?=$tab['tab_id']==$active?'active':''?>"><a href="#<?=$tab['tab_id']?>"><?=$tab['name']?></a></li>

  <?php endforeach; ?>
</ul>

<div class="tab-content">
	<?php foreach($comp->getData() as $d): ?>

		<div class="tab-pane fade in<?=$d->tab_id==$active?' active':''?>" id="<?=$d->tab_id?>">

			<?=$d->content?>
			
		</div>

	<?php endforeach; ?>
</div>