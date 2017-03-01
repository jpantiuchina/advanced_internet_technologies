<?php /** @var Page $currentPage */ ?>
<?php /** @var $menuTitle        */ ?>
<?php /** @var $title            */ ?>
<?php /** @var $html             */ ?>
<?php /** @var $error            */ ?>


<?php if ($error != null) { ?>
<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error) ?></div>
<?php } ?>


<form method="post" action="">

	<div class="form-group">
		<label for="menuTitle">Menu Title</label>
		<input type="text" class="form-control" name="menuTitle" id="menuTitle" value="<?php echo htmlspecialchars($menuTitle) ?>">
		<p class="help-block">Short title visible in menu</p>
	</div>


	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" id="title" value="<?php echo htmlspecialchars($title) ?>">
	</div>


	<div class="form-group">
		<label for="html">Content</label>
		<textarea class="form-control" rows="20" name="html" id="html"><?php echo htmlspecialchars($html) ?></textarea>
	</div>


	<div class="form-group">
		<button type="submit" class="btn btn-primary">Save</button>
		<a href="<?php echo $currentPage->getUrl() ?>" class="btn btn-link">Cancel</a>
	</div>
</form>


<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

<link href="/lib/summernote-0.6.7/summernote.css" rel="stylesheet">
<script src="/lib/summernote-0.6.7/summernote.min.js"></script>


<script>

$(document).ready(function()
{
	$('#html').summernote();
});


</script>