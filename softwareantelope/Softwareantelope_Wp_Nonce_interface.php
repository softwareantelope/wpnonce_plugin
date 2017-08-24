<?php

interface Softwareantelope_Wp_Nonce_interface {
        public function __construct();
        public function getNonceUrl( $bare_url, $command, $id);
        public function getNonceField( $command, $id );
        public function createNonce( $command, $id );
        public function checkAdminReferer( $command, $id );
        public function checkAjaxReferer( $command, $id );
        public function verifyNonce( $nonce_name, $command, $id ) ;
        public function setNonceLife( $number_of_hours );
        public function addAdditionalVerification( $action, $result );
}
