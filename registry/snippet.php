<div data-nja-group="<?php echo $page->id(); ?>" data-nja-value="<?php echo $page->nja(); ?>">
  <div data-nja-item="1"<?php e($page->liked(), ' class="nja-active"'); ?>>
  	<div class="nja-icon"></div>
  	<div data-nja-count><?php e($page->likes() != '', $page->likes(), 0); ?></div>
  </div>
  <div data-nja-item="-1"<?php e($page->disliked(), ' class="nja-active"'); ?>>
  	<div class="nja-icon"></div>
  	<div data-nja-count><?php e($page->dislikes() != '', $page->dislikes(), 0); ?></div>
  </div>
</div>