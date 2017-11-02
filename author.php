<?php get_header('author'); ?>
<body>
    <header>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>'>
            <img id='OP-LogoLarge' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectLargeLogo.png' />
            <img id='OP-LogoSmall' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectSmallLogo.png' />
        </a>
    </header>
    <main>
        <div id='OP-MainAuthor'>
            <div id='OP-AuthorImage'><?php echo get_avatar( get_the_author_meta( 'ID' ), 256 ); ?></div>
            <h1 id='OP-AuthorName'><?php the_author(); ?></h1>
            <h2 id='OP-AuthorTitle'><?php the_author_meta( title ); ?> | <a href='https://twitter.com/<?php the_author_meta( twitter ); ?>'>@<?php the_author_meta( twitter ); ?></a></h2>
            <p id='OP-AuthorText'><?php echo the_author_meta('description'); ?></p>
        </div>
        <div id='OP-AuthorRecentArticles'>
            <!--Secondary Regular Posts-->
            <div id='OP-MainPosts'>
                <?php $args = array(
                   'author'        =>  $current_user->ID,
                   'post_type' => 'post',
                   'posts_per_page' => 9,
                   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
                   ); ?>
                <?php query_posts($args); ?>
                <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

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
            <div id='OP-PostNav'><?php numeric_posts_nav(); ?></div>
        </div>
    </main>
<?php get_footer('author'); ?>
</body>