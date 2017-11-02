<footer>
    <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>'>
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <img id='OP-FooterLogo' src='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectSmallLogo.png'/>
            <meta itemprop="url" content='<?php echo get_template_directory_uri(); ?>/img/TheOtakuProjectSmallLogo.png'/>
            <meta itemprop="width" content="300">
            <meta itemprop="height" content="30">
        </div>
        <meta itemprop="name" content="TheOtakuProject"/>
        <meta itemprop='url' content='https://theotakuproject.com'/>
        </a>
    </span>
    <div id='OP-FooterSocialIcons'>
        <a href="http://twitter.com/superindieio" onclick="ga('send', 'event', 'Social Follow', 'Twitter Follow', 'Twitter', '1');" target='_blank'>
        <img src='<?php echo get_template_directory_uri(); ?>/social-icons/twitter.svg' class='social-image-follow' /></a>

        <a href="http://facebook.com/superindieio" onclick="ga('send', 'event', 'Social Follow', 'Facebook Follow', 'Facebook', '1');" target='_blank'>
        <img src='<?php echo get_template_directory_uri(); ?>/social-icons/facebook.svg' class='social-image-follow' /></a>

        <a href="https://www.youtube.com/channel/UC0hq2bUJYw7NN12pf_7HDCw" onclick="ga('send', 'event', 'Social Follow', 'Youtube Follow', 'Youtube', '1');" target='_blank'>
        <img src='<?php echo get_template_directory_uri(); ?>/social-icons/youtube.svg' class='social-image-follow' /></a>
    </div>

    <div id='OP-FooterInfo'>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>about-us'>About Us</a>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>contact-us'>Contact Us</a>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>privacy-policy'>Privacy Policy</a>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>?s=search'>Search</a>
    </div>
</footer>
<span>
    <!--Google Adsense-->
    <script>
        my_google_ad_channel = '<?php the_author_meta( authoradsense ); ?>';
        [].forEach.call(document.querySelectorAll('.adsbygoogle'), function(){
            (adsbygoogle = window.adsbygoogle || []).push({ params: { google_ad_channel: my_google_ad_channel} });
        });
    </script>
    
    <!--Google Analytics-->
    
    <!--Google Adwords-->
    
    <!--Page Read Tracking-->
    
    <!--AdBlock Tracking-->
</span>