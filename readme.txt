=== wp_none ===
Contributors: Nicholas Alexander
Tags: wp_nonce, ttt, test
Requires at least: 3.7
Tested up to: 4.8
Stable tag: 0.1.0
License: GPLv2 or later

wp_none provides class access for wp_nonce functions

== Description ==

Commands included;

* getNonceUrl( $bare_url, $command, $id )
* getNonceField( $command, $id )
* createNonce( $command, $id )
* checkAdminReferer( $command, $id )
* checkAjaxReferer( $command, $id )
* verifyNonce( $_REQUEST[$none_name], $command, $id) )
* addFilter( 'nonce_life', $number_of_hours )

Commands not implemented: 
* addAdditionalVerification( $action, $result )

== Installation ==

Install using composer install from supplied composer.json file

Install and activate Softwareantelope_Wp_Nonce Class Plugin

Assuming plugins know a command:
$my_command = "DELETE";

Create an object
$myNonce = new Softwareantelope_Wp_Nonce();
$myNonce->setNonceLife( 6 );

Do things with the object
$post = get_post($title);
$nonce = $myNonce->getNonceUrl( '/myurl', $my_command, $post->ID);

or

$id = $_POST['id'];
$verify = $myNonce->verifyNonce( $none_name, $my_command, $id );

== Changelog ==

= 0.0.5  =

* Release Date - 24 August 2017 *
* Initial draft *
