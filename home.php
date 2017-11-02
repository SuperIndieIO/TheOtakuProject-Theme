<?php get_header('home'); ?>
<body>
    <header>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>'>
            <img id='OP-LogoLarge' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectLargeLogo.png' />
            <img id='OP-LogoSmall' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectSmallLogo.png' />
        </a>
    </header>
    <main>
        <!--Featured Post-->
        <span>
        <?php query_posts('showposts=1&category_name=Featured'); ?>
            <?php the_post(); ?>
            <?php $post = get_the_ID(); ?>   
            <?php $primary = $post; ?>
            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-large' ); ?>
        <a href='<?php echo get_the_permalink(); ?>'>
        <div class='OP-PostLarge img-background' style='background-image: linear-gradient(to bottom, rgba( 0, 0, 0, 0) 0%, rgba( 0, 0, 0, .25) 50%, rgba( 0, 0, 0, 0.90) 100%), url("<?php echo $thumb[0] ?>");'>
            <div class='OP-Headline'>
                <h2 class='OP-PostLargeHeadline'><?php echo get_the_title(); ?></h2>
                <h3 class='OP-PostLargeSubHeadline italics'><?php echo(get_the_excerpt()); ?></h3>
            </div>
        </div>
        </a>
        </span>
        
        <!--Semi-Featured Section-->
        <div id='OP-FeaturedGridA' class='OP-FeaturedGrid'>
        <?php $SFS = 0 ?>
            <?php wp_reset_query(); ?>
            <?php query_posts('showposts=2&category_name=Featured&offset=1'); ?>
            <?php while( $wp_query->have_posts() ) : $wp_query>the_post(); ?>
            <?php if( $post->ID == $primary ) {continue;} ?>
            <?php if( $post->ID == $secondary ) {continue;} ?>
            <?php $SFS++ ?>

            <?php $post = get_the_ID(); ?>   
            <?php if ( $SFS % 2 !== 0 ) {$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-small' );} else {$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-medium' );}?>
             <a href='<?php echo get_the_permalink(); ?>'>
            <div class='OP-SemiFeatured <?php if ( $SFS % 2 !== 0 ) {echo 'grid-a'; $secondary = $post;} else {echo 'grid-b'; $tertiary = $post;} ?> img-background' style='background-image: linear-gradient(to bottom, rgba( 0, 0, 0, 0) 0%, rgba( 0, 0, 0, .25) 50%, rgba( 0, 0, 0, 1) 100%), url("<?php echo $thumb[0] ?>'>
                <div class='OP-SemiFeaturedText'>
                    <h2 class='OP-SemiFeaturedHeadline'><?php echo get_the_title(); ?></h2>    
                    <h3 class='OP-SemiFeaturedSubHeadline'><?php echo(get_the_excerpt()); ?></h3>
                </div>
            </div>
            </a>
            <?php endwhile ?>
        </div>
        
        <div id='OP-FeaturedGridB' class='OP-FeaturedGrid'>
        <?php $SFS = 0 ?>
            <?php query_posts('showposts=2&category_name=Featured&offset=3'); ?>
            <?php while( $wp_query->have_posts() ) : $wp_query>the_post(); ?>
            <?php if( $post->ID == $primary ) {continue;} ?>
            <?php if( $post->ID == $secondary ) {continue;} ?>
            <?php $SFS++ ?>

            <?php $post = get_the_ID(); ?>   
            <?php if ( $SFS % 2 !== 0 ) {$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-medium' );} else {$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-small' );}?>
             <a href='<?php echo get_the_permalink(); ?>'>
            <div class='OP-SemiFeatured <?php if ( $SFS % 2 !== 0 ) {echo 'grid-b'; $fourth = $post;} else {echo 'grid-a'; $fifth = $post;} ?> img-background' style='background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.25) 50%, rgba(0, 0, 0, 1) 100%), url("<?php echo $thumb[0] ?>'>
                <div class='OP-SemiFeaturedText'>
                    <h2 class='OP-SemiFeaturedHeadline'><?php echo get_the_title(); ?></h2>    
                    <h3 class='OP-SemiFeaturedSubHeadline'><?php echo(get_the_excerpt()); ?></h3>
                </div>
            </div>
            </a>
            <?php endwhile ?>
        </div>
        
         <!--Main Posts Section-->
        <div id='OP-MainPosts'>
            
            <?php $c = 0 ?>
            <?php wp_reset_query(); ?>
            <?php global $wp_query, $paged; $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; $query = new WP_Query( ); ?>
            <?php if ( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query>the_post(); ?>
            <?php if( ($post->ID == $primary) || ($post->ID == $secondary) || ($post->ID == $tertiary) || ($post->ID == $fourth) || ($post->ID == $fifth) ) {continue;} ?>
            <?php if ( $c==6 ) { break; } ?>
            <?php $c++ ?>

            <?php $post = get_the_ID(); ?>   
            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-small' ); ?>
            <a href='<?php echo get_the_permalink(); ?>'>
            <div class='OP-PostSmall img-background' style='background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.25) 50%, rgba(0, 0, 0, 1) 100%), url("<?php echo $thumb[0] ?>'>
                <div class='OP-PostSmallText'>
                    <h2 class='OP-PostSmallHeadline'><?php echo get_the_title(); ?></h2>    
                    <h3 class='OP-PostSmallSubHeadline'><?php echo(get_the_excerpt()); ?></h3>
                </div>
            </div>
            </a>
            <?php endwhile ?>
            <?php endif ?>
        </div>
        
        
        <div id='OP-PostNav'>
            	<?php numeric_posts_nav(); ?>
        </div>
        
    </main>
    <?php get_footer('home'); ?>
</body>