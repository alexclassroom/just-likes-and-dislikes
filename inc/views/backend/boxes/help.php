<div class="pld-settings-section" data-settings-ref="help" style="display:none">
    <h3><?php _e( 'Status', PLD_TD ); ?></h3>
    <p><?php _e( 'This can be used to enable or disable like dislike in the frontend posts.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>

    <h3><?php _e( 'Like Dislike Position', PLD_TD ); ?></h3>
    <p><?php _e( 'This can be used to control whether like dislike should be shown before.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>

    <h3><?php _e( 'Like Dislike Display', PLD_TD ); ?></h3>
    <p><?php _e( 'This can be used to control whether like or dislike or both should be shown.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>

    <h3><?php _e( 'Like Dislike Restriction', PLD_TD ); ?></h3>
    <p><?php _e( 'This can be used to prevent liking or disliking same posts from same liker or disliker through Cookie or IP.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>

    <h3><?php _e( 'Like Dislike Display Order', PLD_TD ); ?></h3>
    <p><?php _e( 'This can be used control the display order of like and dislike.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>

    <h3><?php _e( 'Like Dislike Templates', PLD_TD ); ?></h3>
    <p><?php _e( 'There are altogether 5 templates including a custom template. Custom templates can be used to customize the like and dislike display by uploading your own icons.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>

    <h3><?php _e( 'Icon Color', PLD_TD ); ?></h3>
    <p><?php _e( 'This can be used to override the color of icon provided by your active theme.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>

    <h3><?php _e( 'Count Color', PLD_TD ); ?></h3>
    <p><?php _e( 'This can be used to override the color of count provided by your active theme.', PLD_TD ); ?></p>

    <div class="pld-separator"></div>
    <h3><?php _e( 'Available Filters', PLD_TD ); ?></h3>
    <div class="pld-fixed-height">

        <pre>
/**
 * Filters the tabs
 *
 * @since 1.0.0
 *
 * @param array $pld_tabs
 */
$pld_tabs = apply_filters( 'pld_admin_tabs', $pld_tabs );
        </pre>

        <pre>
/**
 * Filters total number or templates
 *
 * @param int
 *
 * @since 1.0.0
 */
$pld_total_templates = apply_filters( 'pld_total_templates', 4 );
        </pre>
        <pre>
/**
 * Filters the array stored in the database
 *
 * @param type array $pld_settings
 *
 * @since 1.0.0
 */
update_option( 'pld_settings', apply_filters( 'pld_settings', $pld_settings ) );
        </pre>
        <pre>
/**
* Filters Like Dislike HTML
*
* @param string $like_dislike_html
* @param array $pld_settings
*
* @since 1.0.0
*/
$post_text .= apply_filters( 'pld_like_dislike_html', $like_dislike_html, $pld_settings );
        </pre>
        <pre>
/**
 * Filters deault settings
 *
 * @param type array $default_settings
 *
 * @since 1.0.0
 */
return apply_filters( 'pld_default_settings', $default_settings );
        </pre>
        <pre>
/**
 * Filters like count
 *
 * @param type int $like_count
 * @param type int $post_id
 *
 * @since 1.0.0
 */
$like_count = apply_filters( 'pld_like_count', $like_count, $post_id );
        </pre>
        <pre>
/**
 * Filters dislike count
 *
 * @param type int $dislike_count
 * @param type int $post_id
 *
 * @since 1.0.0
 */
$dislike_count = apply_filters( 'pld_dislike_count', $dislike_count, $post_id );
        </pre>
    </div>
    <div class="pld-separator"></div>

    <h3><?php _e( 'Available Actions', PLD_TD ); ?></h3>
    <div class="pld-fixed-height">
        <pre>
/**
 * Fires before storing the settings array into database
 *
 * @param type array $settings_data - before sanitization
 * @param type array $pld_settings - after sanitization
 *
 * @since 1.0.0
 */
 do_action( 'pld_before_save_settings', $settings_data, $pld_settings );
        </pre>
        <pre>
/**
 * Fires while generating the like dislike html
 *
 * @param type string $post_text
 * @param type array $post
 *
 * @since 1.0.0
 */
do_action( 'pld_like_dislike_output', $post_text, $post );
        </pre>
        <pre>
/**
 * Fires when Init hook is fired through plugin
 *
 * @since 1.0.0
 */
do_action('pld_init');
        </pre>
        <pre>
/**
 * Fires on backend template preview* Fires on backend template preview
 *
 * Useful to add additional templates in backend
 * Fires on backend template preview* Fires on backend template preview*
 * @param array $pld_settings
 *
 * @since 1.0.0
 *
 */
do_action( 'pld_template_previews' );
        </pre>
        <pre>
/**
 * Fires when displaying the tabs section
 *
 * @param array $pld_settings
 *
 * @since 1.0.0
 */
do_action( 'pld_admin_tab_section', $pld_settings );
        </pre>
        <pre>
/**
 * Fires when template is being loaded
 *
 * @param array $pld_settings
 *
 * @since 1.0.0
 */
do_action( 'pld_dislike_template', $pld_settings );
        </pre>
        <pre>
/**
 * Fires when template is being loaded
 *
 * @param array $pld_settings
 *
 * @since 1.0.0
 */
do_action( 'pld_like_template', $pld_settings );
        </pre>
        <pre>
/**
 * Action pld_before_ajax_process
 *
 * Fires just before processing the ajax request when like or dislike button is clicked
 *
 * @param type int $post_id
 *
 * @since 1.0.0
 */
 do_action( 'pld_before_ajax_process', $post_id );
        </pre>
        <pre>
/**
 * Action pld_after_ajax_process
 *
 * Fires after the ajax process is complete when like or dislike button is clicked just before printing the response
 *
 * @param type int $post_id
 *
 * @since 1.0.0
 */
do_action( 'pld_after_ajax_process', $post_id );
        </pre>
    </div>
</div>