<?php
/*
Plugin Name: Softwareantelope_wp_nonce Class Plugin
Plugin URI:  https://github.com/softwareantelope/wp_nonce
Description: Call Wordpress nonce functions from a class
Version:     0.0.5
Author:      Nicholas Alexander
Author URI:  https://softwareantelope.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: softwareantelope_wp_nonce
Domain Path: /
*/
include 'Softwareantelope_Wp_Nonce_interface.php';

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( !class_exists( 'Softwareantelope_Wp_Nonce' ) ) {
	class Softwareantelope_Wp_Nonce implements Softwareantelope_Wp_Nonce_interface {

		public function __construct() 
		{
			return $this;
				
		}

		/** 
 		 * function composeCommand 
		 * @param $cmd string
		 * @param $id  number
		 * returns string
		 */
		private function composeCommand( $cmd, $id ) 
		{
			return sprintf('%s_$d', $cmd, $id);
		}

		/** 
 		 * function wp_nonce_url 
		 * @param $cmd string
		 * @param $id  number
		 * returns url string
		 */
		public function getNonceUrl( $bare_url, $command, $id) 
		{
			$commandID = $this->composeCommand( $command, $od);
			return wp_nonce_url ( $bare_url, $commandID );
		}

		/** 
 		 * function wp_nonce_field
		 * @param $cmd string
		 * @param $id  number
		 * returns string
		 */
		public function getNonceField( $command, $id ) 
		{
			$commandID = $this->composeCommand( $command, $od);
			return wp_nonce_field( $commandID );
		}

		/** 
 		 * function wp_create_nonce
		 * @param $cmd string
		 * @param $id  number
		 * returns string
		 */
		public function createNonce( $command, $id ) 
		{
			$commandID = $this->composeCommand( $command, $od);
			return wp_create_nonce( $commandID );
		} 

		/** 
 		 * function check_admin_referer 
		 * @param $cmd string
		 * @param $id  number
		 * returns string
		 */
		public function checkAdminReferer( $command, $id ) 
		{
			$commandID = $this->composeCommand( $command, $od);
			return check_admin_referer( $commandID );
		}

		/** 
 		 * function check_ajax_referer 
		 * @param $cmd string
		 * @param $id  number
		 * returns string
		 */
		public function checkAjaxReferer( $command, $id ) 
		{
			$commandID = $this->composeCommand( $command, $od);
			return check_ajax_referer( $commandID );
		}

		/** 
 		 * function wp_verify_nonce
		 * @param $cmd string
		 * @param $id  number
		 * returns string
		 */
		public function verifyNonce( $nonce_name, $command, $id ) 
		{
			$commandID = $this->composeCommand( $command, $od);
			return wp_verify_nonce( $nonce_name, $commandID );
		}

 		/** 
 		 * function nonce_life
		 * @param $cmd string
		 * @param $id  number
		 * returns string
		 */
		public function setNonceLife( $number_of_hours ) 
		{
			add_filter( 'nonce_life', function() {
				return $number_of_hours * HOURS_IN_SECONDS;
			});
		}	

		/** 
		 * add_additional_verification 
		 * @param $action
		 * @param $result
		 * TODO: to be implemented
		 */
		public function addAdditionalVerification( $action, $result ) {
			return 'Not implemented';
		}
	}
}

$Softwareantelope_Wp_Nonce = new Softwareantelope_Wp_Nonce();

