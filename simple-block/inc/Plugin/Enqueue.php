<?php
/**
 * Enqueue all necessary scripts and styles
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'sa_Enqueue' ) ) {

    class sa_Enqueue {

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
            add_action('enqueue_block_editor_assets', [$this, 'enqueue_editor_assets'], 2);
        }

        /**
         * Editor assets enqueue
         */
        public function enqueue_editor_assets(){

            $dep = sa_PATH . 'build/modules/index.asset.php';
            if( file_exists( $dep ) ) {
                $asset = require_once $dep;

                wp_enqueue_script(
                    'sa-modules',
                    sa_URL . 'build/modules/index.js',
                    $asset['dependencies'],
                    $asset['version'],
                    false
                );

                wp_enqueue_style(
                    'sa-modules',
                    sa_URL . 'build/modules/style-index.css',
                    [],
                    sa_VERSION
                );

                wp_localize_script( 'sa-modules', 'saData', [
                    'hasPro' => class_exists( 'sap_Accordion_Block_Pro' ) ? true : false
                ] );

            }

            $gdep = sa_PATH . 'build/global/index.asset.php';
            if( file_exists( $gdep ) ) {
                $gasset = require_once $gdep;

                wp_enqueue_script(
                    'sa-editor-global',
                    sa_URL . 'build/global/index.js',
                    $gasset['dependencies'],
                    $gasset['version'],
                    false
                );

                wp_enqueue_style(
                    'sa-editor-global',
                    sa_URL . 'build/global/style-index.css',
                    [],
                    sa_VERSION
                );
            }

        }
    }

    new sa_Enqueue();
}