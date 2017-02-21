<div data-nja-group="<?php echo $page->id(); ?>" data-nja-value="<?php echo nja::value($page); ?>">
	<?php if(nja::likeButton(get_defined_vars()['_data'])) : ?>
		<div data-nja-item="1"<?php e(nja::isLike($page), ' class="nja-active"'); ?>>
			<div class="nja-icon"></div>
			<div data-nja-count><?php e($page->likes() != '', $page->likes(), 0); ?></div>
		</div>
	<?php endif; ?>
	<?php if(nja::dislikeButton(get_defined_vars()['_data'])) : ?>
		<div data-nja-item="-1"<?php e(nja::isDislike($page), ' class="nja-active"'); ?>>
			<div class="nja-icon"></div>
			<div data-nja-count><?php e($page->dislikes() != '', $page->dislikes(), 0); ?></div>
		</div>
	<?php endif; ?>
</div>