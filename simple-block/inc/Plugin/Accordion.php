<?php
/**
 * Initialize all necessary classes and functions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'sa_Accordion' ) ) {

    class sa_Accordion {
        
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
            $this->includes();
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

        /**
         * Include all necessary files
         */
        public function includes() {
            require_once sa_PATH . 'inc/Plugin/Enqueue.php';
            require_once sa_PATH . 'inc/Plugin/Category.php';
            require_once sa_PATH . 'inc/Plugin/Fonts.php';
            require_once sa_PATH . 'inc/Plugin/Register.php';
            require_once sa_PATH . 'inc/Plugin/Style.php';
        }
        
    }

    sa_Accordion::instance(); // Initialize the class
    
}