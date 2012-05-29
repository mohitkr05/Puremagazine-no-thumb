    <?php if ( !get_option('bizzthemes_not_468') ) {} else { ?>
  
		<?php                   
                // Get block code //
                $block_img = get_option('bizzthemes_block1_image');
                $block_url = get_option('bizzthemes_block1_url');
        ?>
                
        <a href="<?php echo $block_url; ?>"><img src="<?php echo $block_img; ?>" alt="" /></a>
    
    <?php } ?>
	
	<?php if ( get_option('bizzthemes_show_script_468') && get_option('bizzthemes_script_468') ) { ?>

		<?php echo stripslashes(get_option('bizzthemes_script_468')); ?>

    <?php } ?>