<?php
/**
 * Admin Page Handler
 * 
 * @package simple_Accordion_Block
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Admin Page Handler
 */
class sa_Admin {

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
        add_action( 'admin_menu', [ $this, 'sa_admin_menu' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'sa_admin_assets' ] );
        add_action( 'admin_init', [$this, 'sa_accordion_dci_plugin'] );
    }

    /**
     * Enqueue admin scripts
     */
    public function sa_admin_assets($screen) {
        if( $screen === 'settings_page_sa-accordion' ){
            wp_enqueue_style( 'sa-admin-style', sa_URL . 'inc/Admin/admin.css', [], sa_VERSION );
            wp_enqueue_script( 'sa-admin-script', sa_URL . 'inc/Admin/admin.js', [ 'jquery' ], sa_VERSION, true );
        }
    }

    /**
     * Add admin menu
     */
    public function sa_admin_menu() {
        add_submenu_page(
            'options-general.php',
            __( 'simple Accordion', 'simple-accordion-block' ),
            __( 'simple Accordion', 'simple-accordion-block' ),
            'manage_options',
            'sa-accordion',
            [ $this, 'sa_admin_page' ]
        );
    }

    /**
     * Admin page
     */
    public function sa_admin_page() {
        ?>
        <div class="sa__wrap">
            <div class="plugin_max_container">
                <div class="plugin__head_container">
                    <div class="plugin_head">
                        <h1 class="plugin_title">
                            <?php 
                                if( class_exists( 'sap_Accordion_Block_Pro' ) ){
                                    _e( 'simple Accordion Block Pro', 'simple-accordion-block' );
                                } else {
                                    _e( 'simple Accordion Block', 'simple-accordion-block' );
                                }
                            ?>
                        </h1>
                        <p class="plugin_description">
                            <?php _e( 'simple Accordion Block is a Gutenberg block plugin that allows you to create accordion blocks with ease in Gutenberg Editor without any coding knowledge', 'simple-accordion-block' ); ?>
                        </p>
                    </div>
                </div>
                <div class="plugin__body_container">
                    <div class="plugin_body">
                        <div class="tabs__panel_container">
                            <div class="tabs__titles">
                                <p class="tab__title active" data-tab="tab1">
                                    <?php _e( 'Help and Support', 'simple-accordion-block' ); ?>
                                </p>
                                <?php 
                                        if( class_exists( 'sap_Accordion_Block_Pro' ) ){
                                    ?>
                                        <p class="tab__title" data-tab="tab2">
                                            <?php _e( 'License', 'simple-accordion-block' ); ?>
                                        </p>
                                    <?php
                                        }
                                ?>
                            </div>
                            <div class="tabs__container">
                                <div class="tabs__panels">
                                    <div class="tab__panel active" id="tab1">
                                        <div class="tab__panel_flex">
                                            <div class="tab__panel_left">
                                                <h3 class="video__title">
                                                    <?php _e( 'Video Tutorial', 'simple-accordion-block' ); ?>
                                                </h3>
                                                <p class="video__description">
                                                    <?php _e( 'Watch the video tutorial to learn how to use the plugin. It will help you start your own design quickly.', 'simple-accordion-block' ); ?>
                                                </p>
                                                <div class="video__container">
                                                    <iframe width="560" height="415" src="https://www.youtube.com/embed/Hh3LNLpwzX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <div class="tab__panel_right">
                                                <div class="pro-panel">
                                                    <h3 class="pro__title">
                                                        <?php 
                                                            if( class_exists( 'sap_Accordion_Block_Pro' ) ){
                                                                _e( 'Thank you for using the Pro version', 'simple-accordion-block' );
                                                            } else {
                                                                _e( 'Unlock Pro Features', 'simple-accordion-block' );
                                                            }
                                                        ?>
                                                    </h3>
                                                    <p class="pro__description">
                                                        <?php _e( 'More features and customization options with the pro version of the plugin.', 'simple-accordion-block' ); ?>
                                                    </p>
                                                    <ul class="features-list">
                                                        <li>
                                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#clip0_6404_1763)"><path d="M12.9955 5.64817L7.93251 12.4574L4.99665 10.2744" stroke="#5A03EF" stroke-width="1.5"></path></g><defs><clipPath id="clip0_6404_1763"><rect width="18" height="18" rx="9" fill="white"></rect></clipPath></defs></svg>
                                                            <?php _e( 'Instant Search', 'simple-accordion-block' ); ?>
                                                        </li>
                                                        <li>
                                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#clip0_6404_1763)"><path d="M12.9955 5.64817L7.93251 12.4574L4.99665 10.2744" stroke="#5A03EF" stroke-width="1.5"></path></g><defs><clipPath id="clip0_6404_1763"><rect width="18" height="18" rx="9" fill="white"></rect></clipPath></defs></svg>
                                                            <?php _e( 'Load More', 'simple-accordion-block' ); ?>
                                                        </li>
                                                        <li>
                                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#clip0_6404_1763)"><path d="M12.9955 5.64817L7.93251 12.4574L4.99665 10.2744" stroke="#5A03EF" stroke-width="1.5"></path></g><defs><clipPath id="clip0_6404_1763"><rect width="18" height="18" rx="9" fill="white"></rect></clipPath></defs></svg>
                                                            <?php _e( 'Badge for Accordion', 'simple-accordion-block' ); ?>
                                                        </li>
                                                        <li>
                                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#clip0_6404_1763)"><path d="M12.9955 5.64817L7.93251 12.4574L4.99665 10.2744" stroke="#5A03EF" stroke-width="1.5"></path></g><defs><clipPath id="clip0_6404_1763"><rect width="18" height="18" rx="9" fill="white"></rect></clipPath></defs></svg>
                                                            <?php _e( '3 Event Activators', 'simple-accordion-block' ); ?>
                                                        </li>
                                                        <li>
                                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#clip0_6404_1763)"><path d="M12.9955 5.64817L7.93251 12.4574L4.99665 10.2744" stroke="#5A03EF" stroke-width="1.5"></path></g><defs><clipPath id="clip0_6404_1763"><rect width="18" height="18" rx="9" fill="white"></rect></clipPath></defs></svg>
                                                            <?php _e( 'Custom Icon Upload', 'simple-accordion-block' ); ?>
                                                        </li>
                                                        <li>
                                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#clip0_6404_1763)"><path d="M12.9955 5.64817L7.93251 12.4574L4.99665 10.2744" stroke="#5A03EF" stroke-width="1.5"></path></g><defs><clipPath id="clip0_6404_1763"><rect width="18" height="18" rx="9" fill="white"></rect></clipPath></defs></svg>
                                                            <?php _e( 'Link Any Accordion', 'simple-accordion-block' ); ?>
                                                        </li>
                                                        <li>
                                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#clip0_6404_1763)"><path d="M12.9955 5.64817L7.93251 12.4574L4.99665 10.2744" stroke="#5A03EF" stroke-width="1.5"></path></g><defs><clipPath id="clip0_6404_1763"><rect width="18" height="18" rx="9" fill="white"></rect></clipPath></defs></svg>
                                                            <?php _e( 'Disable Specific Accordion', 'simple-accordion-block' ); ?>
                                                        </li>
                                                        <li>
                                                            <?php _e( 'And more...', 'simple-accordion-block' ); ?>
                                                        </li>
                                                    </ul>
                                                    <div class="actions">
                                                        <?php 
                                                            if( class_exists( 'sap_Accordion_Block_Pro' ) ){
                                                                ?>
                                                                <a href="https://accordion.gutenbergkits.com/demos" class="pro__link"
                                                                    target="_blank">
                                                                        <?php _e( 'Explore Demos', 'simple-accordion-block' ); ?>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                    <a href="https://accordion.gutenbergkits.com/pricing/" class="pro__link"
                                                                        target="_blank">
                                                                            <?php _e( 'Get Pro Version', 'simple-accordion-block' ); ?>
                                                                    </a>
                                                                <?php 
                                                            }
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        if( class_exists( 'sap_Accordion_Block_Pro' ) ): 
                                    ?>
                                    <div class="tab__panel" id="tab2">
                                        <?php 
                                            do_action( 'sa_license_tab' );
                                        ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="footer-panels">
                                    <div class="single__support_panel">
                                        <h3 class="support__title">
                                            <?php _e( 'Get Support', 'simple-accordion-block' ); ?>
                                        </h3>
                                        <p class="support__description">
                                            <?php _e( 'If you find any issue or have any suggestion, please let me know.', 'simple-accordion-block' ); ?>
                                        </p>
                                        <a href="https://wordpress.org/support/plugin/simple-accordion-block/" class="support__link" target="_blank">
                                            <?php _e( 'Support', 'simple-accordion-block' ); ?>
                                        </a>
                                    </div>
                                    <div class="single__support_panel">
                                        <h3 class="support__title">
                                            <?php _e( 'Spread Your Love', 'simple-accordion-block' ); ?>
                                        </h3>
                                        <p class="support__description">
                                            <?php _e( 'If you like this plugin, please share your opinion', 'simple-accordion-block' ); ?>
                                        </p>
                                        <a href="https://wordpress.org/support/plugin/simple-accordion-block/reviews/" class="support__link" target="_blank">
                                            <?php _e( 'Rate the Plugin', 'simple-accordion-block' ); ?>
                                        </a>
                                    </div>
                                    <div class="single__support_panel">
                                        <h3 class="support__title">
                                            <?php _e( 'Similar Blocks', 'simple-accordion-block' ); ?>
                                        </h3>
                                        <p class="support__description">
                                            <?php _e( 'Want to get more similar blocks, please visit my website', 'simple-accordion-block' ); ?>
                                        </p>
                                        <a href="https://gutenbergkits.com" class="support__link" target="_blank">
                                            <?php _e( 'Visit Our Website', 'simple-accordion-block' ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * SDK Integration
     */
    function sa_accordion_dci_plugin() {
        // Include DCI SDK.
        require_once sa_PATH . 'inc/Admin/dci/start.php';
        wp_register_style('dci-sdk-sa-accordion', plugins_url('dci/assets/css/dci.css', __FILE__), array(), '1.2.1', 'all');
        wp_enqueue_style('dci-sdk-sa-accordion');
        dci_dynamic_init( array(
            'sdk_version'          => '1.2.1',
            'product_id'           => 6,
            'plugin_name'          => 'simple Accordion Block',                                                               // make simple, must not empty
            'plugin_title'         => 'Love using simple Accordion Block? Congrats 🎉  ( Never miss an Important Update )',   // You can describe your plugin title here
            'plugin_icon'          => '',                                      // delete the line if you don't need
            'api_endpoint'         => 'https://dashboard.codedivo.com/wp-json/dci/v1/data-insights',
            'slug'                 => 'simple-accordion-block',                                                                  // folder-name or write 'no-need' if you don't want to use
            'core_file'            => false,
            'plugin_deactivate_id' => false,
            'menu'                 => array(
                'slug' => 'sa-accordion',
            ),
            'public_key' => 'pk_2zPuK3VzDOtZ2HEZuT9zBFUu8d2iQw3z',
            'is_premium' => false,
            //'custom_data' => array(
            //'test' => 'value',
            //),
            'popup_notice'        => false,
            'deactivate_feedback' => false,
            'text_domain'         => 'simple-accordion-block',
            'plugin_msg'          => '<p>Be Top-contributor by sharing non-sensitive plugin data and create an impact to the global WordPress community today! You can receive valuable emails periodically.</p>',
        ) );
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

sa_Admin::instance(); // Initialize the class