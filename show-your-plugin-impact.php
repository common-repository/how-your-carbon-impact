<?php
/**
 * Plugin Name:         Show your plugin impact
 * Plugin URI:          https://la-communaute-du-plugin.com/
 * Description:         Show your carbon impact, adds a carbon footprint badge to your website.
 * Version:             1.0.1
 * Requires at least:   4.9
 * Requires PHP:        7.0
 * Author:              la-communaute-du-plugin.com
 * Author URI:          https://la-communaute-du-plugin.com/
 * License:             GPL-2.0+ or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         syci
 * Domain Path:         /languages
 */

 /*
Show your plugin impact is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Show your plugin impact is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Show your plugin impact. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SYCI_DIR_URL', plugin_dir_url( __FILE__ ) );

// Shortcode callback function
function syci_shortcode($atts) {
    // Enqueue the JavaScript file
    wp_enqueue_script(
        'carbon-badges-script',
        SYCI_DIR_URL . 'assets/js/website-carbon-badges.js',
        array(),
        '1.1.3',
        true
    );

    $darkmode = isset($atts['darkmode']) && $atts['darkmode'] === 'true' ? ' wcb-d' : '';
    $html = '<div id="wcb" class="carbonbadge' . $darkmode . '"></div>';

    return $html;
}
add_shortcode('syci', 'syci_shortcode');


if ( is_admin() ) :

    /**
     * Add a settings page for the plugin.
     */
    function syci_add_settings_page() {
        add_submenu_page(
            'tools.php',
            'syci Settings',
            __('Settings syci','syci'),
            'manage_options',
            'syci-settings',
            'syci_settings_page'
        );
    }

    add_action('admin_menu', 'syci_add_settings_page');

    add_filter('plugin_action_links', 'syci_add_settings_link', 10, 2);

    function syci_add_settings_link($links, $file) {
        if ($file === plugin_basename(__FILE__)) {
            $settings_link = '<a href="' . admin_url('tools.php?page=syci-settings') . '">' . __('Settings','syci'). '</a>';
            array_push($links, $settings_link);
        }
        return $links;
    }

    function syci_enqueue_scripts() {
        // Enqueue CSS
        wp_enqueue_style('syci-style', plugin_dir_url(__FILE__) . '/assets/css/style.css');
    
        // Enqueue JavaScript
        wp_enqueue_script('syci-index', plugin_dir_url(__FILE__) . '/assets/js/index.js', array('jquery'), '1.0', true);
    }
    
    add_action('admin_enqueue_scripts', 'syci_enqueue_scripts');

    /**
     * Callback function for the settings page.
     */
    function syci_settings_page() {
        ?>
        <div id="syciBo" class="wrap syci">
            <h1><?php echo esc_html( __('Syci Plugin Settings','syci') ) ?></h1>
            <p><?php echo esc_html( __('Show your carbon impact is a WordPress plugin that allows you to add a carbon footprint badge to your website using a shortcode. The badge displays information about the carbon emissions associated with your website.','syci') ) ?></p>
            <p><?php echo esc_html( __('The plugin provides a simple and customizable way to promote sustainability and raise awareness about the environmental impact of websites.','syci') ) ?></p>
            <p><?php echo esc_html( __('syci utilizes the powerful script from Website Carbon to calculate the weight of your web pages, taking into account factors such as server energy consumption, page size, and resource optimization. This ensures accurate and insightful carbon footprint calculations.','syci') ) ?></p>
            <p><?php echo esc_html( __('With syci, you can easily showcase the carbon emissions of your website and encourage environmentally conscious browsing habits among your visitors.','syci') ) ?></p>
            <p><?php echo esc_html( __('Shortcode for copying:','syci') ) ?> <code>[syci]</code></p>
            <p><?php echo esc_html( __('Shortcode for copying in darkmode:','syci') ) ?> <code>[syci darkmode='true']</code></p>
        </div>
        <?php
    }

endif;