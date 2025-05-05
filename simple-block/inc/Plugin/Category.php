<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'sa_Category' ) ) {

    class sa_Category {


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
            add_filter( 'block_categories_all', [ $this, 'register_category' ], 10, 2 );
        }

        /**
         * Register Block 
         * 
         * @return void
         */
        public function register_category( $categories ) {
            return array_merge(
                [
                    [
                        'slug'  => 'sa-blocks',
                        'title' => __( 'Accordion', 'simple-accordion-block' ),
                        'icon'  => null,
                    ],
                ],
                $categories
            );
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

    sa_Category::instance(); // Initialize the class

}
