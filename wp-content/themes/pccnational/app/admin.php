<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

//Adds Design Request to top of Wordpress Menu
add_action( 'admin_menu', function() {
  add_menu_page( 'linked_url', 'Design Requests', 'read', 'design_requests', '', 'dashicons-text', 1 );
  add_menu_page( 'linked_url', 'Pending Partner Registrations', 'read', 'admin.php?page=gf_edit_forms&view=settings&subview=gravityformsuserregistration_pending_activations&id=1', '', 'dashicons-groups', 1 );
});

add_action( 'admin_menu' , function() {
  global $menu;
  $menu[1][2] = "/wp-admin/admin.php?page=gf_entries&id=6";
});

//Add custom User info to user profile
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', function( $user ) { ?>
<h3><?php _e("Extra profile information", "blank"); ?></h3>

<table class="form-table">


<tr>
<th><label for="contactcustomers"><?php _e("Contact Customers"); ?></label></th>
  <td>
    <input type="text" name="contactcustomers" id="contactcustomers" value="<?php echo esc_attr( get_the_author_meta( 'contactcustomers', $user->ID ) ); ?>" class="regular-text" /><br />
    <span class="description"><?php _e("I would Like you to contact my customers"); ?></span>
  </td>
</tr>

<tr>
<th><label for="position"><?php _e("Position"); ?></label></th>
  <td>
    <input type="text" name="position" id="position" value="<?php echo esc_attr( get_the_author_meta( 'position', $user->ID ) ); ?>" class="regular-text" /><br />
    <span class="description"></span>
  </td>
</tr>

<tr>
<th><label for="otherdata"><?php _e("otherdata"); ?></label></th>
  <td>
    <input type="text" name="otherdata" id="otherdata" value="<?php echo esc_attr( get_the_author_meta( 'otherdata', $user->ID ) ); ?>" class="regular-text" /><br />
    <span class="description"></span>
  </td>
</tr>

<tr>
<th><label for="businessphone"><?php _e("Business Phone"); ?></label></th>
  <td>
    <input type="text" name="businessphone" id="businessphone" value="<?php echo esc_attr( get_the_author_meta( 'businessphone', $user->ID ) ); ?>" class="regular-text" /><br />
    <span class="description"></span>
  </td>
</tr>

<tr>
<th><label for="cellphone"><?php _e("Cell Phone"); ?></label></th>
  <td>
    <input type="text" name="cellphone" id="cellphone" value="<?php echo esc_attr( get_the_author_meta( 'cellphone', $user->ID ) ); ?>" class="regular-text" /><br />
    <span class="description"></span>
  </td>
</tr>

<tr>
<th><label for="preferredcontact"><?php _e("Preferred Contact"); ?></label></th>
  <td>
    <input type="text" name="preferredcontact" id="preferredcontact" value="<?php echo esc_attr( get_the_author_meta( 'preferredcontact', $user->ID ) ); ?>" class="regular-text" /><br />
    <span class="description"></span>
  </td>
</tr>


</table>
<h3><?php _e("Business Information", "blank"); ?></h3>
<table class="form-table">
  <tr>
  <th><label for="businessname"><?php _e("Business Name"); ?></label></th>
    <td>
      <input type="text" name="businessname" id="businessname" value="<?php echo esc_attr( get_the_author_meta( 'businessname', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"></span>
    </td>
  </tr>
  <tr>
    <th><label for="businessaddressstreet"><?php _e("Business Address"); ?></label></th>
    <td>
      <input type="text" name="businessaddressstreet" id="businessaddressstreet" value="<?php echo esc_attr( get_the_author_meta( 'businessaddressstreet', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="businessaddressline2" id="businessaddressline2" value="<?php echo esc_attr( get_the_author_meta( 'businessaddressline2', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="businesscity" id="businesscity" value="<?php echo esc_attr( get_the_author_meta( 'businesscity', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="businessstate" id="businessstate" value="<?php echo esc_attr( get_the_author_meta( 'businessstate', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="businesszip" id="businesszip" value="<?php echo esc_attr( get_the_author_meta( 'businesszip', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>
</table>

<table class="form-table">
  <tr>
    <th><label for="billingaddressstreet"><?php _e("Billing Address"); ?></label></th>
    <td>
      <input type="text" name="billingaddressstreet" id="billingaddressstreet" value="<?php echo esc_attr( get_the_author_meta( 'billingaddressstreet', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="billingaddressline2" id="billingaddressline2" value="<?php echo esc_attr( get_the_author_meta( 'billingaddressline2', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="billingcity" id="billingcity" value="<?php echo esc_attr( get_the_author_meta( 'billingcity', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="billingstate" id="billingstate" value="<?php echo esc_attr( get_the_author_meta( 'billingstate', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>

  <tr>
    <th></th>
    <td>
      <input type="text" name="billingzip" id="billingzip" value="<?php echo esc_attr( get_the_author_meta( 'billingzip', $user->ID ) ); ?>" class="regular-text" /><br />
    </td>
  </tr>
</table>
<h3><?php _e("Additional Information", "blank"); ?></h3>
<table class="form-table">
  <tr>
  <th></th>
    <td>
      <input type="text" name="4kitchens" id="4kitchens" value="<?php echo esc_attr( get_the_author_meta( '4kitchens', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("I would Like you to contact my customers"); ?></span>
    </td>
  </tr>
  <tr>
  <th></th>
    <td>
      <input type="text" name="accuratemeasurements" id="accuratemeasurements" value="<?php echo esc_attr( get_the_author_meta( 'accuratemeasurements', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("Are you capable of taking accurate measurements within 1/16 of an inch and conveying those measurements accurately with confidence?"); ?></span>
    </td>
  </tr>

  <tr>
  <th></th>
    <td>
      <input type="text" name="responsibledimensions" id="responsibledimensions" value="<?php echo esc_attr( get_the_author_meta( 'responsibledimensions', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("Do you understand that you will be responsible for all the field dimensions whether they be “as- built” or “hold-to”?"); ?></span>
    </td>
  </tr>

  <tr>
  <th></th>
    <td>
      <input type="text" name="capablecabinetry" id="capablecabinetry" value="<?php echo esc_attr( get_the_author_meta( 'capablecabinetry', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("Do you have or are you an experienced and capable cabinetry installer?"); ?></span>
    </td>
  </tr>
  <tr>
  <th></th>
    <td>
      <input type="text" name="relayinfo" id="relayinfo" value="<?php echo esc_attr( get_the_author_meta( 'relayinfo', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("Are you capable of relaying information electronically including forwarding photos, scanning and sending documents, filling out online or emailed forms?"); ?></span>
    </td>
  </tr>
  <tr>
  <th></th>
    <td>
      <input type="text" name="describebusiness" id="describebusiness" value="<?php echo esc_attr( get_the_author_meta( 'describebusiness', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("What best describes your business?"); ?></span>
    </td>
  </tr>
  <tr>
  <th></th>
    <td>
      <input type="text" name="otherdata" id="otherdata" value="<?php echo esc_attr( get_the_author_meta( 'otherdata', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("What best describes your business (Other)"); ?></span>
    </td>

  </tr>

  <tr>
  <th></th>
    <td>
      <input type="text" name="tos" id="tos" value="<?php echo esc_attr( get_the_author_meta( 'tos', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("TOS"); ?></span>
    </td>

  </tr>
</table>
<?php });

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', function( $user_id ) {
if ( !current_user_can( 'edit_user', $user_id ) ) {
    return false;
}
update_user_meta( $user_id, 'contactcustomers', $_POST['contactcustomers'] );

});

/* Main redirection of the default login page */

add_action('init', function() {
	$login_page  = home_url('/login/');
	$page_viewed = basename($_SERVER['REQUEST_URI']);

	if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
		wp_redirect($login_page);
		exit;
	}
});

// /* Where to go if a login failed */
//
// add_action('wp_login_failed', function() {
// 	$login_page  = home_url('/login/');
// 	wp_redirect($login_page . '?login=failed');
// 	exit;
// });


// Disable Subscriber access to admin
add_action('init',function() {
  if( is_admin() && !defined('DOING_AJAX') && ( current_user_can('subscriber') || current_user_can('contributor') ) ){
    wp_redirect(home_url());
    exit;
  }
});
