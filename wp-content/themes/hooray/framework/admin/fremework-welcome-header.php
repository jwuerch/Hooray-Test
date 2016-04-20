<?php
global $submenu;

if (isset($submenu['bdaia_welcome'])) {
	$bdaia_welcome_menu_items = $submenu['bdaia_welcome'];
}

if ( is_array( $bdaia_welcome_menu_items ) ) {
	?>
	<div class="wrap about-wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ( $bdaia_welcome_menu_items as $bdaia_welcome_menu_item ) {
				?>
				<a href="admin.php?page=<?php echo $bdaia_welcome_menu_item[2]?>" class="nav-tab <?php if(isset($_GET['page']) and $_GET['page'] == $bdaia_welcome_menu_item[2]) { echo 'nav-tab-active'; }?> "><?php echo $bdaia_welcome_menu_item[0] ?></a>
				<?php
			}
			?>
		</h2>
	</div>
	<?php
}