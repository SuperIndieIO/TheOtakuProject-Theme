<?php get_header('post'); ?>
<body>
    <header>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>'>
            <img id='OP-LogoLarge' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectLargeLogo.png' />
            <img id='OP-LogoSmall' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectSmallLogo.png' />
        </a>
    </header>
    <main>
        <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-large' ); ?>
        
        <div id='OP-Page'>
                <img id='OP-PageImage' src='<?php echo $thumb[0] ?>' />
        
            <h1 id='OP-PageHeadline'><?php echo get_the_title(); ?></h1>

             <div id='OP-PageBodyText'><?php the_content(); ?></div></div>
    </main>
    <?php get_footer('post'); ?>
</body>