<?php

Subscribe::check_direct_access();

class SubscribeAdminPagesAutoloader {
	public function __construct() {
		spl_autoload_register( array( $this, 'autoload' ) );
	}

	public function autoload( $class_name ) {
		$file = $this->convert_class_to_file( $class_name );
		if ( is_file( $file ) && file_exists( $file ) && is_readable( $file ) ) {
			include $file;
		}
	}

	public function convert_class_to_file( $class_name ) {
		$class     = strtolower( $class_name );
		$class     = 'class-' . $class;
		$file_name = $class . '.php';

		return SUBSCRIBE_DIR . 'inc' . DS . 'admin' . DS . 'pages' . DS . $file_name;
	}
}

new SubscribeAdminPagesAutoloader();