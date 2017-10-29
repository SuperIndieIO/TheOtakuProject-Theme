<?php ?>
<!DOCTYPE html>
<!--

_________          _______    _______ _________ _______  _                   _______  _______  _______ _________ _______  _______ _________
\__   __/|\     /|(  ____ \  (  ___  )\__   __/(  ___  )| \    /\|\     /|  (  ____ )(  ____ )(  ___  )\__    _/(  ____ \(  ____ \\__   __/
   ) (   | )   ( || (    \/  | (   ) |   ) (   | (   ) ||  \  / /| )   ( |  | (    )|| (    )|| (   ) |   )  (  | (    \/| (    \/   ) (   
   | |   | (___) || (__      | |   | |   | |   | (___) ||  (_/ / | |   | |  | (____)|| (____)|| |   | |   |  |  | (__    | |         | |   
   | |   |  ___  ||  __)     | |   | |   | |   |  ___  ||   _ (  | |   | |  |  _____)|     __)| |   | |   |  |  |  __)   | |         | |   
   | |   | (   ) || (        | |   | |   | |   | (   ) ||  ( \ \ | |   | |  | (      | (\ (   | |   | |   |  |  | (      | |         | |   
   | |   | )   ( || (____/\  | (___) |   | |   | )   ( ||  /  \ \| (___) |  | )      | ) \ \__| (___) ||\_)  )  | (____/\| (____/\   | |   
   )_(   |/     \|(_______/  (_______)   )_(   |/     \||_/    \/(_______)  |/       |/   \__/(_______)(____/   (_______/(_______/   )_(   
                                                                                                                                           
-->
<head>
    
    <!--Styles-->
    <link rel="stylesheet"  type="text/css" href='<?php echo get_template_directory_uri(); ?>/style-post.css'/>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <meta name='viewport' content='initial-scale=1'/>   
    <meta name='theme-color' content='#E5E5F2' />
    
    <!--Meta Info-->
    <?php the_post(); ?><!--Gather Post Excerpt Information for Meta Tags-->  
    <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-large' ); ?>
    <title><?php echo get_the_title(); ?> | TheOtakuProject</title>
    <meta name='description' content='<?php echo(get_the_excerpt()); ?>'>
    <meta name='language' content='english'>
    
    <!--Temporary AMP Support Removal-->
    <!--<link rel="amphtml" href='amp/'>-->
    
    <!--Facebook Meta Info-->
	<meta property='og:type' content='article'/>
	<meta property='og:title' content='<?php echo get_the_title(); ?>'/>
	<meta property='og:url' content='<?php echo get_the_permalink(); ?>'/>
	<meta property='og:image' content='<?php echo $thumb[0] ?>'/>
	<meta property='og:description' content='<?php get_the_excerpt(); ?>'/>

    <!--Twitter Meta Info-->
	<meta name='twitter:card' content='summary_large_image'>
	<meta name='twitter:url' content='<?php echo get_the_permalink(); ?>'>
	<meta name='twitter:title' content='<?php echo get_the_title(); ?>'>
	<meta name='twitter:image' content='<?php echo $thumb[0] ?>'>
	<meta name='twitter:description' content='<?php echo strip_tags(get_the_excerpt($post->ID)); ?>'>
    
    <!--Adsense Code-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>