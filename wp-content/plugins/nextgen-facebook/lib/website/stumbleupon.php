<?php
/*
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Copyright 2012-2014 - Jean-Sebastien Morisset - http://surniaulula.com/
*/

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'NgfbSubmenuSharingStumbleupon' ) && class_exists( 'NgfbSubmenuSharing' ) ) {

	class NgfbSubmenuSharingStumbleupon extends NgfbSubmenuSharing {

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->debug->mark();
		}

		protected function get_rows( $metabox, $key ) {
			$rows = array();
			$prot = empty( $_SERVER['HTTPS'] ) ? 'http:' : 'https:';
			$badge_html = '
				<style type="text/css">
					.badge { 
						display:block;
						background: url("'.$this->p->util->get_cache_url( 
							$prot.'//b9.sustatic.com/7ca234_0mUVfxHFR0NAk1g' ).'") no-repeat transparent; 
						width:110px;
						margin:5px 0 5px 0;
					}
					.badge input[type=radio] {
					}
					.badge-col-left { display:inline-block; float:left; margin-right:20px; }
					.badge-col-right { display:inline-block; }
					#badge-1 { height:20px; background-position:25px 0px; }
					#badge-2 { height:20px; background-position:25px -100px; }
					#badge-3 { height:20px; background-position:25px -200px; }
					#badge-4 { height:60px; background-position:25px -300px; }
					#badge-5 { height:30px; background-position:25px -400px; }
					#badge-6 { height:20px; background-position:25px -500px; }
				</style>
			';

			$badge_html .= '<div class="badge-col-left">';
			$badge_number = empty( $this->p->options['stumble_badge'] ) ? 1 : $this->p->options['stumble_badge'];
			foreach ( array( 1, 2, 3, 6 ) as $i ) {
				$badge_html .= '<div class="badge" id="badge-'.$i.'">';
				$badge_html .= '<input type="radio" name="'.$this->form->options_name.'[stumble_badge]" 
					value="'.$i.'" '.checked( $i, $badge_number, false ).'/>';
				$badge_html .= '</div>';
			}
			$badge_html .= '</div><div class="badge-col-right">';
			foreach ( array( 4, 5 ) as $i ) {
				$badge_html .= '<div class="badge" id="badge-'.$i.'">';
				$badge_html .= '<input type="radio" name="'.$this->form->options_name.'[stumble_badge]" 
					value="'.$i.'" '.checked( $i, $badge_number, false ).'/>';
				$badge_html .= '</div>';
			}
			$badge_html .= '</div>';

			$rows[] = $this->p->util->th( 'Show Button in', 'short' ).'<td>'.
			( $this->show_on_checkboxes( 'stumble' ) ).'</td>';

			$rows[] = $this->p->util->th( 'Preferred Order', 'short' ).'<td>'.
			$this->form->get_select( 'stumble_order', 
				range( 1, count( $this->p->admin->submenu['sharing']->website ) ), 
					'short' ).'</td>';

			if ( $this->p->options['plugin_display'] == 'all' ) {
				$rows[] = $this->p->util->th( 'JavaScript in', 'short' ).'<td>'.
				$this->form->get_select( 'stumble_js_loc', $this->p->cf['form']['js_locations'] ).'</td>';
			}

			$rows[] = $this->p->util->th( 'Button Style', 'short' ).'<td>'.$badge_html.'</td>';

			return $rows;
		}
	}
}

if ( ! class_exists( 'NgfbSharingStumbleupon' ) ) {

	class NgfbSharingStumbleupon {

		private static $cf = array(
			'opt' => array(				// options
				'defaults' => array(
					'stumble_on_content' => 0,
					'stumble_on_excerpt' => 0,
					'stumble_on_admin_edit' => 1,
					'stumble_on_sidebar' => 0,
					'stumble_order' => 9,
					'stumble_js_loc' => 'header',
					'stumble_badge' => 1,
				),
			),
		);

		protected $p;

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->util->add_plugin_filters( $this, array( 'get_defaults' => 1 ) );
		}

		public function filter_get_defaults( $opts_def ) {
			return array_merge( $opts_def, self::$cf['opt']['defaults'] );
		}

		public function get_html( $atts = array(), &$opts = array() ) {
			if ( empty( $opts ) ) 
				$opts =& $this->p->options;
			$use_post = array_key_exists( 'use_post', $atts ) ? $atts['use_post'] : true;
			$source_id = $this->p->util->get_source_id( 'stumbleupon', $atts );
			$atts['add_page'] = array_key_exists( 'add_page', $atts ) ? $atts['add_page'] : true;	// get_sharing_url argument
			$atts['url'] = empty( $atts['url'] ) ? 
				$this->p->util->get_sharing_url( $use_post, $atts['add_page'], $source_id ) : 
				apply_filters( $this->p->cf['lca'].'_sharing_url', $atts['url'], 
					$use_post, $atts['add_page'], $source_id );

			$html = '<!-- StumbleUpon Button --><div '.$this->p->sharing->get_css( 'stumbleupon', $atts, 'stumble-button' ).'>';
			$html .= '<su:badge layout="'.$opts['stumble_badge'].'" location="'.$atts['url'].'"></su:badge></div>';

			$this->p->debug->log( 'returning html ('.strlen( $html ).' chars)' );
			return $html."\n";
		}

		public function get_js( $pos = 'id' ) {
			$this->p->debug->mark();
			$prot = empty( $_SERVER['HTTPS'] ) ? 'http:' : 'https:';
			$js_url = $this->p->util->get_cache_url( $prot.'//platform.stumbleupon.com/1/widgets.js' );

			return '<script type="text/javascript" id="stumbleupon-script-'.$pos.'">'.$this->p->cf['lca'].'_insert_js( "stumbleupon-script-'.$pos.'", "'.$js_url.'" );</script>'."\n";
		}
	}
}

?>
