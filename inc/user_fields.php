<?php



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
	$profile_fields['twitter'] = __('Twitter Username');
	$profile_fields['instagram'] = __('Instagram Username');
	$profile_fields['flickr'] = __('Flickr Username');
	$profile_fields['github'] = __('Github Username');

	return $profile_fields;
}
add_filter('user_contactmethods', 'pbt_modify_contact_methods');



add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );

function add_extra_social_links( $user ) {
    ?>
        <h3>User Role</h3>

        <table class="form-table">
            <tr>
                <th><label for="user_pbt_role">PBT Role</label></th>
                <td><input type="text" name="user_pbt_role" value="<?php echo esc_attr(get_the_author_meta( 'user_pbt_role', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>
    <?php
}

add_action( 'personal_options_update', 'save_extra_social_links' );
add_action( 'edit_user_profile_update', 'save_extra_social_links' );

function save_extra_social_links( $user_id ) {
    update_user_meta( $user_id,'user_pbt_role', sanitize_text_field( $_POST['user_pbt_role'] ) );
}

