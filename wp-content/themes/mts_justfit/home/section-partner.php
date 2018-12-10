<?php
$mts_options = get_option(MTS_THEME_NAME);
?>
<div class="Our-Partners">
    <div class="container">
        <?php if ($mts_options['mts_our_partners_title'] != '') { ?><div class="title"><?php echo $mts_options['mts_our_partners_title']; ?></div><?php } ?>
        <div class="Our-Partners-logos">
            <ul>
            <?php if(!empty($mts_options['mts_our_partner']))
            {
            ?>
                <?php foreach( $mts_options['mts_our_partner'] as $slide ) : ?>
                    <li class=""><a href="<?php echo $slide['mts_our_partner_link']; ?>"> <?php echo wp_get_attachment_image( $slide['mts_our_partner_image'],'full', false, array('title' => '') ); ?></a></li>
                <?php endforeach; ?>
             <?php } ?>
             
            </ul>
        </div>
    </div>    
</div>