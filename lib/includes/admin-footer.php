<?php
// Admin Custom Footer
function custom_admin_footer() {
echo '<strong>Need Assistance? Visit <a href="http://www.Urgeinteractive.com" target="_blank">www.Urgeinteractive.com</a> or call (888) 348-3113</strong>';
}
add_filter('admin_footer_text', 'custom_admin_footer');
 ?>
