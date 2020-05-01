 
            <?php
                wp_nav_menu( array(
                    'menu'              => 'Main Menu',
                    'theme_location'    => 'primary',
                    'depth'             => 3,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse navbar-nav ml-auto px-0',
                    'container_id'      => 'main-navc',
                    'items_wrap'        => '<div id="%1$s" class="%2$s">%3$s</div>',
                    'menu_class'        => 'navbar-nav ml-auto px-0',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
                );
            ?>


