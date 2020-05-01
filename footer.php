        <!-- Schedule Form -->
        <?php 
        if(!is_page("schedule")): 
            get_template_part( 'forms/schedule' ); 
        endif; 
        ?>

        <!-- FOOTER CONTENT -->
        <footer id="footer">
            <div class="container">
                <?php
                    wp_nav_menu( array(
                        'menu'           => 'Quick Links', 
                        'fallback_cb'    => false,
                        'items_wrap' => '<ul id="%1$s" class="%2$s items">%3$s</ul>', 
                        'theme_location' => 'sidebar_right_menu', 
                    ) );
                ?>
            </div>
        </footer>
            
        <!-- Scroll Up -->
        <a href="#" id="scroll" class="scroll-top" style="display: none;">
            <span class="text">
                <span class="vvt">Back Up</span>
            </span>
        </a>
        
        <?php wp_footer(); ?>

        <?php get_template_part('widgets/search'); ?>

        <!-- Non blocking google fonts loader -->
        <link rel="stylesheet" href="https://use.typekit.net/yil1hpp.css">
        
        <script type="text/javascript" defer>
            WebFontConfig = {
                google: {
                    families: [
                        "Arapey:0;1"
                    ]
                }
            };

            (function() {
                var wf = document.createElement("script");
                wf.src = "https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js";
                wf.type = "text/javascript";
                wf.async = "true";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>
        
        <!-- google tracking code for schedule form submit -->
        <!-- <script type="text/javascript">
            // Document Ready
            jQuery(document).ready(function($){

                $('#contact .btn').on('click', function(e){
                    gtag('event','click', {
                        'event_category': 'Buttons', 'event_label': 'Schedule Form Button Click'
                    });
                })

                //track telephone link clicks
                $('a[href*="650-485-2663"]').on('click', function(e){
                    gtag('event','click', {
                        'event_category': 'Links', 'event_label': 'Telephone Number Link Click'
                    });
                })

            })
        </script> -->

    </body>
</html>

