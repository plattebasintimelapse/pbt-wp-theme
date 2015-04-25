<?php
/**
 * Adjust the capabilities of the WP defined roles
 */


/**
 * @var $roleObject WP_Role
 */
$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap( 'edit_theme_options' ) ) {
    $roleObject->add_cap( 'edit_theme_options' );
}