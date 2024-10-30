=== Show your plugin impact ===
Plugin Name: Show your plugin impact
Contributors: lacommunautéduplugin
Tags: carbon, sustainability
Requires at least: 4.9
Tested up to: 6.4.1
Stable tag: 1.0.1
Requires PHP: 7.0
License: GPL-2.0+ or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
syci is a WordPress plugin that allows you to add a carbon footprint badge to your website using a shortcode. The badge displays information about the carbon emissions associated with your website.

The plugin provides a simple and customizable way to promote sustainability and raise awareness about the environmental impact of websites.

== Features ==
- Display a carbon footprint badge on your website.
- Customize the appearance of the badge using CSS.
- Enable dark mode by adding the "darkmode" parameter to the shortcode.
- Automatically enqueue the required JavaScript file when the shortcode is used.

== Installation ==
1. Upload the `syci` folder to the `/wp-content/plugins/` directory or install the plugin from the WordPress Plugin Directory.
2. Activate the "Carbon Badges" plugin through the 'Plugins' menu in WordPress.

== Usage ==
To display the carbon footprint badge, use the `[syci]` shortcode in your WordPress content. The badge will be rendered wherever you place the shortcode.

Shortcode with default settings: [syci]

Shortcode with dark mode enabled: [syci darkmode="true"]

== Frequently Asked Questions ==
= Can I customize the appearance of the carbon footprint badge? =
Yes, you can customize the badge's appearance using CSS. The badge is wrapped in a <div> element with the class `carbonbadge`. You can target this class in your theme's CSS file and apply your desired styles.

= How can I enable dark mode for the badge? =
To enable dark mode, add the `darkmode="true"` parameter to the shortcode. This will add the `wcb-d` class to the badge's <div> element.

== Changelog ==
= 1.0.0 =
* Initial release.
= 1.0.1 =
* Update bo and add trad FR

== Upgrade Notice ==
= 1.0.0 =
Initial release of the Website syci plugin.
= 1.0.1 =
Update bo and add trad FR
