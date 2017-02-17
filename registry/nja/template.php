<?php snippet('nja', ['page' => $page]); ?>

<div class="nja">
	<div class="nja-reset btn btn-rounded btn-negative">
		Reset counters
	</div>

	<div class="nja-delete btn btn-rounded btn-negative">
		Delete records
	</div>
</div>

<div class="nja-message-reset">
	<div class="nja-question">
		<strong>Reset</strong> the likes and dislike counters. It can not be undone. Continue?
	</div>

	<div class="nja-group">
		<a target="_top" href="<?php echo url('nja/reset/' . $page->id()); ?>?redirect=true" class="btn btn-rounded">Ok</a>
		<div class="nja-abort btn btn-rounded">Cancel</div>
	</div>
</div>

<div class="nja-message-delete">
	<div class="nja-question">
		<strong>Delete</strong> the likes and dislike records. It can not be undone. Continue?
	</div>

	<div class="nja-group">
		<a target="_top" href="<?php echo url('nja/delete/' . $page->id()); ?>?redirect=true" class="btn btn-rounded">Ok</a>
		<div class="nja-abort btn btn-rounded">Cancel</div>
	</div>
</div>