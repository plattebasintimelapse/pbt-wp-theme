<?php
/**
 * Functionality for users registered on the site.
 * These users are publically displayed on the about page of the site.
 */

/**
 * Hide some of the default user contact fields.
 * Don't need em.
 */
function hide_profile_fields( $contactmethods ) {
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    return $contactmethods;
}

add_filter('user_contactmethods','hide_profile_fields',10,1);

/**
 * Adds additional fields to the User Page.
 * These fields are used on the when displaying author information.
 */
function pbt_modify_contact_methods($profile_fields) {

	// Add new fields
    $profile_fields['public_email'] = __('Public Email');
	$profile_fields['twitter'] = __('Twitter Username');
	$profile_fields['instagram'] = __('Instagram Username');
	$profile_fields['flickr'] = __('Flickr Username');
	$profile_fields['github'] = __('Github Username');

	return $profile_fields;
}
add_filter('user_contactmethods', 'pbt_modify_contact_methods');



/**
 * Add extra social links to the user page
 * This function is called both when creating a new user or editing an existing.
 */
function pbt_add_extra_user_fields( $user ) {
    ?>
        <h3>User Role</h3>

        <table class="form-table">
            <tr>
                <th><label for="user_pbt_role">PBT Role</label></th>
                <td><input type="text" name="user_pbt_role" value="<?php echo esc_attr(get_the_author_meta( 'user_pbt_role', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="user_pbt_display_order">Display Order</label></th>
                <td><input type="text" name="user_pbt_display_order" value="<?php echo esc_attr(get_the_author_meta( 'user_pbt_display_order', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>
    <?php
}
add_action( 'show_user_profile', 'pbt_add_extra_user_fields' );
add_action( 'edit_user_profile', 'pbt_add_extra_user_fields' );


/**
 * Write the extra user links to the database.
 */
function pbt_save_extra_user_fields( $user_id ) {
    update_user_meta( $user_id,'user_pbt_role', sanitize_text_field( $_POST['user_pbt_role'] ) );
    update_user_meta( $user_id,'user_pbt_display_order', sanitize_text_field( $_POST['user_pbt_display_order'] ) );
}
add_action( 'personal_options_update', 'pbt_save_extra_user_fields' );
add_action( 'edit_user_profile_update', 'pbt_save_extra_user_fields' );

