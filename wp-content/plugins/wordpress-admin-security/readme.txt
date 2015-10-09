=== BNS Add Widget ===
Contributors: cais
Donate link: http://buynowshop.com
Tags: widget, footer, admin, plugin-only, translation-ready
Requires at least: 2.7
Tested up to: 4.2
Stable tag: 0.8
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Add a widget area to the footer of any theme.

== Description ==

Add a widget area to the footer of any theme by way of the `wp_footer` action hook. Works just like the widget areas commonly created with code in the functions.php template file.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `bns-add-widget.php` to the `/wp-content/plugins/` directory
2. Activate through the 'Plugins' menu.
3. Read http://wpfirstaid.com/2009/12/plugin-installation/
4. Add your widget choice to the BNS Add Widget area under Appearance | Widgets

-- or -

1. Go to 'Plugins' menu under your Dashboard
2. Click on the 'Add New' link
3. Search for bns-add-widget
4. Install.
5. Activate through the 'Plugins' menu.
6. Read http://wpfirstaid.com/2009/12/plugin-installation/
7. Add your widget choice to the BNS Add Widget area under Appearance | Widgets

== Frequently Asked Questions ==

= How can I get support for this plugin? =

Please note, support may be available on the WordPress Support forums; but, it may be faster to visit:

* https://github.com/Cais/bns-add-widget/issues/
* http://buynowshop.com/plugins/bns-add-widget/

= How can I style the plugin output? =

The plugin uses the register_sidebar() WordPress function; additional classes are added via the plugin code:

* .bns-add-widget
* h2.bns-widget-title
* .bnsaw-credit

== Screenshots ==

1. The new blank widget area

== Other Notes ==
* Copyright 2010-2015  Edward Caissie  (email : edward.caissie@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License version 2,
  as published by the Free Software Foundation.

  You may NOT assume that you can use any other version of the GPL.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

  The license for this software can also likely be found here:
  http://www.gnu.org/licenses/gpl-2.0.html

== Upgrade Notice ==
* Please stay current with your WordPress installation, your active theme, and your plugins.

== Changelog ==
= 0.8 =
* Released April 2015
* Added `bnsft_in_plugin_update_message` function
* Added `bns-add-widget.pot` translation file
* Cleaned up code to get rid of extraneous comments
* Corrected `$exit_message` to be i18n compatible
* Updated copyright year

= 0.7 =
* Released April 2014
* Reformat code to better meet WordPress Coding Standards
* Update Copyright year

= 0.6.3 =
* Released December 2013
* Code Reformatting (nothing to see here)

= 0.6.2 =
* Release May 2013
* Version number compatibility updates

= 0.6.1 =
* Release February 2013
* Documentation and comments
* Fixed misread token issue

= 0.6 =
* Release November 2012
* Added filter hook and CSS wrapper to credit text
* Removed load_plugin_textdomain as redundant

= 0.5 =
* Implemented OOP style coding methods
* Documentation improvements

= 0.4.3 =
* Set stylesheet versions to dynamically match the plugin version
* 'readme.txt' updates

= 0.4.2 =
* Documentation updates
* Updated long description
* Added license references to 'readme.txt' header section

= 0.4.1 =
* confirmed compatible with WordPress 3.4

= 0.4 =
* confirmed compatible with WordPress 3.3
* added phpDoc Style documentation
* added i18n support
* added `bnsaw-style.css` for plugin specific elements
* added conditional enqueue of `bnsaw-custom-style.css` stylesheet for end-user modifications
* added `description` parameter to widget area definition
* added additional style for widget area
* updated required WordPress version to 2.7

= 0.3 =
* confirmed compatible with WordPress version 3.2-beta2-18055
* removed conditionals checking for *_sidebar functions
* lowered required WordPress version to 2.2

= 0.2.1 =
* Confirm compatible with WordPress 3.1 (beta)

= 0.2 =
* compatible with WordPress version 3.0
* cleaned up CSS elements to better match WordPress default widget code

= 0.1.2 =
* compatible with WordPress version 2.9.2
* updated license declaration

= 0.1.1 =
* clarified the plugin is released under a GPL-compatible license

= 0.1 =
* Initial release.