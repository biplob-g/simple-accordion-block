<?php 
/**
 * Register Blocks
 * 
 * @package simple_Accordion_Block
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'sa_Register' ) ) {

    class sa_Register {

        /**
         * Instance of the class
         *
         * @var null
         */
        private static $instance = null;


        /**
         * Constructor
         */
        public function __construct() {
            add_action( 'init', [ $this, 'register_block' ] );

            // var_dump( 'Register Block' );
        }

        /**
         * Register Block 
         * 
         * @return void
         */
        public function register_block() {
            $blocks = [
                [
                    'name' => 'accordion',
                    'is_pro' => false
                ],
                [
                    'name' => 'faqs',
                    'is_pro' => true
                ]
            ];

            if ( ! empty( $blocks ) and is_array( $blocks ) ) {
				foreach ( $blocks as $block ) {

                    // if is_pro is true then check if the sap_Accordion_Block_Pro class exists or not and use saP_PATH constant
                    if ( $block['is_pro'] ) {
                        if ( class_exists( 'sap_Accordion_Block_Pro' ) ) {
                            register_block_type( trailingslashit( saP_PATH ) . '/build/blocks/' . $block['name'] );
                        }
                    } else {
					    register_block_type( trailingslashit( sa_PATH ) . '/build/blocks/' . $block['name'] );
                    }
				}
			}
        }

        /**
         * Instance of the class
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

    }

    sa_Register::instance(); // Initialize the class

}