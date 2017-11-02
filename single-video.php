<?php /*
Template Name: Video Template
Template Post Type: post
*/
get_header('post');
?>
<body>
    <!--Header logo for SuperIndieIO-->
    <header>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>'>
            <img id='OP-LogoLarge' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectLargeLogo.png' />
            <img id='OP-LogoSmall' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectSmallLogo.png' />
        </a>
    </header>
<span itemscope itemtype="http://schema.org/Article">
    <main>
        
        <!--Wordpress loop code-->
        <?php $post = get_the_ID(); ?>   
        <?php $primary = $post; ?>
        <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-full' ); ?>
        <?php $meta = get_post_meta( $post, 'Video', TRUE ); ?>
        
        <!--Article post-->
        <div id='OP-Post'>
            <!--Video Embed-->
            <div class='embed-container'>
             <?php echo $meta; ?>
            </div>
        </div>
        
        <!--Article content-->
        <div id='OP-PostBody'>
            <h1 id='SOP-PostHeadline' itemprop='headline'><?php echo get_the_title(); ?></h1>
            <h2 id='OP-PostSubHeadline'><?php echo(get_the_excerpt()); ?></h2>
            <div id='OP-PostAuthor' itemprop='author'><a href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>'><?php the_author(); ?></a> | <a href='https://www.twitter.com/<?php the_author_meta( twitter ); ?>'>@<?php the_author_meta( twitter ); ?></a> <div id='OP-PostDate' itemprop='datePublished'><?php the_time("M j, Y"); ?></div></div>
            <div id='OP-PostBodyText' itemprop='articleBody'><?php the_content(); ?></div>
            
            <!--Social media sharing link-->
            <div id='OP-PostSocialMedia'>
            <a href="http://twitter.com/share" onclick="ga('send', 'event', 'Social Share', 'Twitter Share', 'Twitter', '1');" target='_blank'>
                <img src='<?php echo get_template_directory_uri(); ?>/social-icons/twitter.svg' class='social-image' /></a>
    
            <a href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>' onclick="ga('send', 'event', 'Social Share', 'Facebook Share', 'Facebook', '1');" target='_blank'>
                <img src='<?php echo get_template_directory_uri(); ?>/social-icons/facebook.svg' class='social-image'/></a>
    
            <a href='https://plus.google.com/share?url=<?php the_permalink(); ?>' onclick="ga('send', 'event', 'Social Share', 'Google Plus Share', 'Google', '1');" target='_blank'>
                <img src='<?php echo get_template_directory_uri(); ?>/social-icons/google_plus.svg' class='social-image'/></a>

            <a href='http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_the_permalink(); ?>' onclick="ga('send', 'event', 'Social Share', 'Tumblr Share', 'Tumblr', '1');" target='_blank'>
                <img src='<?php echo get_template_directory_uri(); ?>/social-icons/tumblr.svg' class='social-image'/></a>

            <a href='http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>' onclick="ga('send', 'event', 'Social Share', 'Reddit Share', 'Reddit', '1');" target='_blank'>
                <img src='<?php echo get_template_directory_uri(); ?>/social-icons/reddit.svg' class='social-image'/></a>
            </div>
            
            <!--Category related articles-->
            <div id='OP-RelatedCategory'>
                <?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post), 'numberposts' => 3, 'post__not_in' => array($post), 'category__not_in' => 'featured' ) ); ?>
                <?php if( $related ) foreach( $related as $post ) {?>
                <?php $post = get_the_ID(); ?>
                <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-small' ); ?>
                    <a href='<?php echo get_the_permalink(); ?>'>
                        <div class='OP-PostSmall img-background' style='background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.65) 100%), url("<?php echo $thumb[0] ?>");'><h3 class='OP-PostSmallText'><?php echo get_the_title(); ?></h3></div></a>
                <?php } wp_reset_postdata(); ?>
            </div>
        </div>
        <aside>
        <!--Advertising-->
        
        <!--Tag related articles-->
        <div class='OP-Sidebar'>
            <?php wp_reset_query(); ?>
        <?php //for use in the loop, list 5 post titles related to first tag on current post
            $backup = $post;  // backup the current object
            $tags = wp_get_post_tags($post->ID);
            $tagIDs = array();
            if ($tags) {
                $tagcount = count($tags);
                for ($i = 0; $i < $tagcount; $i++) {
                    $tagIDs[$i] = $tags[$i]->term_id;
                }
                $args=array(
                    'tag__in' => $tagIDs,
                    'post__not_in' => array($post->ID),
                    'showposts'=>2,
                    'caller_get_posts'=>1
                );
                $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'sidebar-image' ); ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class='OP-SidebarSection img-background' style='background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.65) 100%), url("<?php echo $thumb[0] ?>");'><h3 class='OP-PostSmallText'><?php echo get_the_title(); ?></h3></div></a>
             <?php endwhile;
                } else { ?><!--Put Something Here-->
            <?php }
            }
            $post = $backup;  // copy it back
            wp_reset_query(); // to use the original query again
            ?>
        </div>
        </aside>
    </main>
    <?php get_footer('post'); ?>
</body>