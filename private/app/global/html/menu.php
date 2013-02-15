<nav id="navbar">
	<a href="index.php?page=home"><?php echo getMessage(1, 'Menu'); ?></a>
	<a href="">Item 1</a>
	
	<?php if(!isConnect()) :?>
	<div>
		<a href="index.php?page=login"><?php echo getMessage(3, 'Menu'); ?></a>
		<a href="index.php?page=register"><?php echo getMessage(2, 'Menu'); ?></a>
	</div>
	<?php else :?>
		<?php echo getMessage(1, 'Home'); ?> (<?php echo getNameRole($_SESSION['role'])?>) - 
		<a href="index.php?page=login&action=out"><?php echo getMessage(4, 'Menu'); ?></a>
	<?php endif;?>
</nav>