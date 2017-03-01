<?php /** @var Page $currentPage */ ?>
<?php /** @var $login            */ ?>
<?php /** @var $password         */ ?>
<?php /** @var $error            */ ?>

<div class="login-form">

	<h2>Are you Oksana?</h2>

	<?php if ($error != null) { ?>
	<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error) ?></div>
	<?php } ?>


	<form method="post" action="">

		<div class="form-group">
			<label for="login">Login</label>
			<input type="text" class="form-control" name="login" id="login" value="<?php echo htmlspecialchars($login) ?>">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password" value="<?php echo htmlspecialchars($password) ?>">
		</div>


		<div class="form-group">
			<button type="submit" class="btn btn-primary">Login</button>
			<a href="<?php echo $currentPage->getUrl() ?>" class="btn btn-link">Cancel</a>
		</div>
	</form>

</div>

