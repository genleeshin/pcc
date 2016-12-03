<ul class="nav nav-tabs">
  <?php foreach($tabs as $k => $v): ?>

  	<li class="<?=$k==$active?'active':''?>"><a href="#<?='tab_' . $k?>"><?=$v?></a></li>

  <?php endforeach; ?>
</ul>

<div class="tab-content">
	<?php foreach($data as $d): ?>

		<div class="tab-pane fade in<?=$d->tab==$active?' active':''?>" id="<?='tab_' . $d->tab?>">

			<?=$d->content?>
			
		</div>

	<?php endforeach; ?>
</div>