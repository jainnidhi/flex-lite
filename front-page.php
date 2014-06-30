<?php
/**
 * 
 * Description: Displays a full-width front page. The front page template provides an optional
 * featured section that allows for highlighting a key message. It can contain up to 2 widget areas,
 * in one or two columns. These widget areas are dynamic so if only one widget is used, it will be
 * displayed in one column. If two are used, then they will be displayed over 2 columns.
 * There are also four front page only widgets displayed just beneath the two featrued widgets. Like the
 * featured widgets, they will be displayed in anywhere from one to four columns, depending on
 * how many widgets are active.
 * 
 * The front page template also displays EDD featured products and featured posts 
 * depending on the settings from Theme Customizer 
 *
 * @package Flex
 * @since Flex 1.0
 */
get_header();
?>


<div class="slider-wrapper clearfix">
    <div class="flexslider">
        <ul class="slides">
            <?php
            // check if the slider is blank.
            // if there are no slides by user then load default slides. 
            if ( get_theme_mod('slider_one') =='' ) {  ?>
                <li id="slider1">
                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slider1.jpg" alt=""/>
                    <div class="flex-caption">
                        <div class="caption-content">
                        <div class="caption-inner">
                        <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'flex') ?></a></h2>
                        <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'prism') ?> </p>
                        <a class="slider-button" href="<?php if ( get_theme_mod('slider_one_link_url') !='' ) { echo esc_url(get_theme_mod('slider_one_link_url')); } ?>">
                            <?php esc_html_e('Start Building Your Website Now', 'flex') ?>
                        </a>
                        </div>
                        </div>
                 </div>
             </li>
            
             
            <li id="slider2"> 
                <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slider2.jpg" alt=""/>
                <div class="flex-caption">
                    <div class="caption-content">
                        <div class="caption-inner">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'flex') ?></a></h2>
                     <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'flex') ?> </p>
                       <a class="slider-button" href="<?php if ( get_theme_mod('slider_two_link_url') !='' ) { echo esc_url(get_theme_mod('slider_two_link_url')); } ?>">
                            <?php esc_html_e('Start Building Your Website Now', 'flex') ?>
                        </a>
                    </div>
                    </div>
                 </div>
            </li>
            
            <li id="slider3">
                <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slider3.jpg" alt=""/>
               <div class="flex-caption">
                   <div class="caption-content">
                       <div class="caption-inner">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'flex') ?></a></h2>
                     <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'flex') ?> </p>
                      <a class="slider-button" href="<?php if ( get_theme_mod('slider_three_link_url') !='' ) { echo esc_url(get_theme_mod('slider_three_link_url')); } ?>">
                              <?php esc_html_e('Start Building Your Website Now', 'flex') ?>
                        </a>
                   </div>
                   </div>
                 </div>
            </li>
            
            <?php } ?>
            
             <?php 
             // if user adds a cusotm slide then display the slides 
          // load first slide
            if ( get_theme_mod('slider_one') !='' ) {  ?>
                    <li id="slider1">
                    <img  src="<?php echo get_theme_mod('slider_one'); ?>" alt=""/>
                 <?php if ( get_theme_mod('slider_title_one') !='' || get_theme_mod('slider_one_description') !='' ) {  ?>
                    <div class="flex-caption">
                        <div class="caption-content">
                            <div class="caption-inner">
                              <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_one')); ?></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_one_description')); ?></p>
                               
                          <?php if ( get_theme_mod('slider_one_link_url') !='' && get_theme_mod('slider_one_link_text') !=''  ) {  ?>
                           <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_one_link_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_one_link_text')); ?>
                            <?php } ?> 
                            </a>
                        </div>
                        </div>
                     </div>
                 <?php } ?>
                </li>
                
               
                  <?php
                   // load second slide 
                   if ( get_theme_mod('slider_two') !='' ) {  ?>
                <li id="slider2">
                    <img  src="<?php echo get_theme_mod('slider_two'); ?>" alt=""/>
                    <?php if ( get_theme_mod('slider_title_two') !='' || get_theme_mod('slider_two_description') !='' ) {  ?>
                    <div class="flex-caption">
                        <div class="caption-content">
                            <div class="caption-inner">
                              <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_two')); ?></h2>
                            <p><?php echo esc_html(get_theme_mod('slider_two_description')); ?></p>
                                
                           <?php if ( get_theme_mod('slider_two_link_url') !='' && get_theme_mod('slider_two_link_text') !=''  ) {  ?>
                            <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_two_link_url')); ?>">
                              <?php echo esc_html(get_theme_mod('slider_two_link_text')); ?>
                                <?php } ?>
                            </a>
                        </div>
                        </div>
                     </div>
                    <?php } ?>
                </li>
                   <?php } ?>
                
               
                  <?php 
                   // load third slide
                   if ( get_theme_mod('slider_three') !='' ) {  ?>
                <li id="slider3">
                    <img  src="<?php echo get_theme_mod('slider_three'); ?>" alt=""/>
                  <?php if ( get_theme_mod('slider_title_three') !='' || get_theme_mod('slider_three_description') !='' ) {  ?>
                    <div class="flex-caption">
                        <div class="caption-content">
                            <div class="caption-inner">
                              <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_three')); ?></h2>
                            <p><?php echo esc_html(get_theme_mod('slider_three_description')); ?></p>
                                 
                           <?php if ( get_theme_mod('slider_three_link_url') !='' && get_theme_mod('slider_three_link_text') !=''  ) {  ?>
                            <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_three_link_url')); ?>">
                            <?php echo esc_html(get_theme_mod('slider_three_link_text')); ?>
                                <?php } ?>
                            </a>
                        </div>
                        </div>
                     </div>
                  <?php } ?>
                </li>
                   <?php } ?>
              
        <?php } ?>
            
        </ul>
    </div>
</div>

<div class="content-wrapper">
   <div class="content">
     <div class="content-container">
        <!-- Start home featured area -->
        <div class="home-featured-area">
            <div class="home-featured">
                <div class="home-featured-one grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo get_theme_mod('home_featured_one'); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/img1.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><a href="#"><?php esc_html_e('Our Products', 'flex') ?></a></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_one') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_one')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Showcase your best quality products on home page to grab visitor&rsquo;s attention.', 'flex') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_one_link_url') !='' ) { echo esc_url(get_theme_mod('home_one_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_one_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_one_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'flex') ?>
                           <?php } ?></a>
                </div>

                <div class="home-featured-two grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo get_theme_mod('home_featured_two'); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/img2.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><a href="#"><?php esc_html_e('Our Services', 'flex') ?></a></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_two') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_two')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show your multiple services that will explore your website among the audience.', 'flex') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_two_link_url') !='' ) { echo esc_url(get_theme_mod('home_two_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_two_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_two_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'flex') ?>
                           <?php } ?></a>
                </div>


                <div class="home-featured-three grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo get_theme_mod('home_featured_three'); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/img3.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><a href="#"><?php esc_html_e('Our Clients', 'flex') ?></a></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_three') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_three')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show testimonials of your clients that will build the trust among the audience.', 'flex') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_three_link_url') !='' ) { echo esc_url(get_theme_mod('home_three_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_three_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_three_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'flex') ?>
                           <?php } ?></a>
                </div>
            </div>
        </div><!-- end home featured area -->


        <!-- Start business-tagline area -->
        <div class="business-tagline-area">
            <div class="business-tagline">
                <?php if ( get_theme_mod('tagline_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('tagline_title')); ?>

                  <?php } else {  ?> <h3><?php esc_html_e('Build your website with Flex WordPress Theme', 'flex') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('tagline_description') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('tagline_description')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Creating your Restaurant & Hotel website with Flex is completely easy.
                              You just need to perform few tweaks in the theme customizer, add your content and your website will be ready to use.
                              Showcase all important features of your website on homepage.', 'flex') ?> </p>
                                           <?php } ?>
            </div>
        </div><!-- end business tagline area -->

        <!-- Start home Video area -->
        <div class="home-video-area">
            <div class="home-video">
                
                   <div class="featured-post-container grid_6_of_12 col">
                     <?php  // Display featured posts on front page
                        get_template_part('content/content', 'frontposts'); ?>
                </div>

                <div class="home-video-two grid_6_of_12 col">
                      <?php if ( get_theme_mod('video_title') !='' ) {  ?><h2><?php echo esc_html(get_theme_mod('video_title')); ?></h2>

                  <?php } else {  ?> <h2><?php esc_html_e('Video Title', 'flex') ?></h2>
                           <?php } ?>
                    <div class="video-code">
                        <?php if ( get_theme_mod('home_video') !='' ) {  ?> 
                         <?php echo get_theme_mod('home_video'); ?>
                          <?php } else { ?>
                       <?php esc_html_e('You can add your video embed code here.','flex') ?>
                           <?php } ?>
                      </div>
                    
                </div>
            </div>
         </div><!-- end home video area -->
           
    
            <div class="home-cta-area">
                <div class="home-cta">
                    <div class="cta-wrapper">
                    <div class="home-cta-one">
                        <?php if ( get_theme_mod('cta_text') !='' ) {  ?>
                        <p><?php echo esc_html(get_theme_mod('cta_text')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('We have really amazing products that you would be amazed to see.', 'flex') ?> </p>
                                           <?php } ?>
                    </div>
                    <div class="home-cta-two">
                        <a class="cta-button" href="<?php if ( get_theme_mod('home_cta_link_url') !='' ) { echo esc_url(get_theme_mod('home_cta_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_cta_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_cta_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'flex') ?>
                           <?php } ?></a>
                    </div>
                  </div>
                </div>
            </div>
         <div class="contact-area">
             <div class="contact-wrap">
                 <div class="home-contact">
                    <?php  if (get_theme_mod('contact_details_check')) { ?>
                            <?php if ( get_theme_mod('contact_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('contact_title')); ?></h3>

                          <?php } else {  ?> <h3><?php esc_html_e('Contact', 'flex') ?></h3>
                                   <?php } ?>
                          <?php
                        if (get_theme_mod('social_icons_check')) { ?>
                          <div class="social-links">
                                <ul>
                                    <?php if (get_theme_mod('facebook_link_url')) { ?>
                                        <li class="flex-fb"><a href="<?php echo get_theme_mod('facebook_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('twitter_link_url')) { ?>
                                        <li class="flex-twitter"><a href="<?php echo  get_theme_mod('twitter_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('googleplus_link_url')) { ?>
                                        <li class="flex-gplus"><a href="<?php echo get_theme_mod('googleplus_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if( get_theme_mod('pinterest_link_url')) { ?>
                                        <li class="flex-pinterest"><a href="<?php echo get_theme_mod('pinterest_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('github_link_url')) { ?>
                                        <li class="flex-github"><a href="<?php echo get_theme_mod('github_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('youtube_link_url')) { ?>
                                        <li class="flex-youtube"><a href="<?php echo get_theme_mod('youtube_link_url'); ?>"></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                      
                          <?php if ( get_theme_mod('address_detail') !='' ) {  ?>
                          <p id="address"><?php echo esc_html(get_theme_mod('address_detail')); ?></p>
                                   <?php } else { ?>
                                  <p id="address"><?php esc_html_e('205, Gitanjali Mansion
                                                        Above ICICI Bank, Sector 11
                                                        Udaipur, Rajasthan, India.', 'flex') ?> </p>
                                          <?php } ?>

                             <ul><?php if ( get_theme_mod('contact_email') !='' ) {  ?><li id="email"><?php echo esc_html(get_theme_mod('contact_email')); ?></li>

                          <?php } else {  ?> <li id="email"> <?php esc_html_e('hello@ideaboxcreations.com', 'flex') ?></li>
                                   <?php } ?>

                          <?php if ( get_theme_mod('contact_phone') !='' ) {  ?><li id="phone"><?php echo esc_html(get_theme_mod('contact_phone')); ?></li>

                          <?php } else {  ?> <li id="phone"><?php esc_html_e('0294-678456', 'flex') ?></li>
                                   <?php } ?>
                             </ul>
                       <?php } ?>

                </div>
                 
                 <?php  if (get_theme_mod('contact_form_check')) { ?>
                    <div class="home-contact-form">
                        <?php if ( get_theme_mod('flex_contact_form') !='' ) {  ?> 
                         <?php echo do_shortcode(get_theme_mod('flex_contact_form')); ?>
                        <?php } else { ?>
                        <?php esc_html_e('You can add contact form.', 'flex'); ?> 
                          <?php } ?>
                </div>
                 <?php } ?>
             </div>
         </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>