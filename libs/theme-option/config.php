<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "neoton_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'neoton/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        'page_priority'        => 8,
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Neoton Options', 'neoton' ),
        'page_title'           => esc_html__( 'Neoton Options', 'neoton' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,

        // OPTIONAL -> Give you extra features
        'page_priority'        => 20,        
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( 'Neoton Theme', 'neoton' ), $v );
    } else {
        $args['intro_text'] = esc_html__( 'Neoton Theme', 'neoton' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSneoton
      
     */     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Sections', 'neoton' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'container_size',
                'title'    => esc_html__( 'Container Size', 'neoton' ),
                'subtitle' => esc_html__( 'Container Size example(1200px)', 'neoton' ),
                'type'     => 'text',
                'default'  => ''                
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Default Logo', 'neoton' ),
                'subtitle' => esc_html__( 'Upload your logo', 'neoton' ),
                'url'=> true                
            ),

            array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'neoton' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'neoton' ),
                    'type'     => 'text',
                    'default'  => '30px'                    
            ), 

            array(
                    'id'       => 'logo-height-mobile',                               
                    'title'    => esc_html__( 'Mobile Logo Height', 'neoton' ),
                    'subtitle' => esc_html__( 'Mobile Logo max height example(50px)', 'neoton' ),
                    'type'     => 'text',
                    'default'  => ''                    
            ),

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Sticky Logo', 'neoton' ),
                'subtitle' => esc_html__( 'Upload your sticky logo', 'neoton' ),
                'url'=> true                
            ),

            array(
                'id'       => 'sticky_logo_height',                               
                'title'    => esc_html__( 'Sticky Logo Height', 'neoton' ),
                'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'neoton' ),
                'type'     => 'text',
                'default'  => '30px'    
            ),            
            array(
                'id'       => 'back_favicon',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Favicon', 'neoton' ),
                'subtitle' => esc_html__( 'Upload your faviocn here', 'neoton' ),
                'url'=> true            
            ),           
            
            array(
                'id'       => 'logo_dark_mode',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Dark Mode Logo', 'neoton' ),
                'subtitle' => esc_html__( 'Upload dark mode logo', 'neoton' ),
                'url'=> true                
            ),
     
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Go to Top', 'neoton'),
                'subtitle' => esc_html__('You can show or hide here', 'neoton'),
                'default'  => false,
            ), 

                array(
                'id'       => 'show_top_bottom_postition',
                'type'     => 'button_set',
                'title'    => __('Go to Top Position', 'neoton'),                
                'options' => array(
                    'left' => 'Left', 
                    'center' => 'Center', 
                    'right' => 'Right'
                 ), 
                'default' => 'right',
                'required' => array(
                    array(
                        'show_top_bottom',
                        'equals',
                        1,
                    ),
                ), 
            ),
        )
    ));
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'neoton' ),
        'id'               => 'header',
        'customizer_width' => '450px',    
        'fields'           => array(
            array(
                'id'     => 'notice_critical',
                'type'   => 'info',
                'notice' => true,
                'style'  => 'success',
                'title'  => esc_html__('Header Top Area', 'neoton')            
            ),
        
            array(
                'id'       => 'show-top',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Top Bar', 'neoton'),
                'subtitle' => esc_html__('You can select top bar show or hide', 'neoton'),
                'default'  => false,
            ),         
        
            array(
                'id'       => 'mobile-show-top',
                'type'     => 'switch', 
                'title'    => esc_html__('Mobile Show Top Bar', 'neoton'),
                'subtitle' => esc_html__('You can select mobile top bar show or hide', 'neoton'),
                'default'  => true,
                'required' => array(
                    array(
                        'show-top',
                        'equals',
                        1,
                    ),
                ), 
            ),  

            array(
                'id'       => 'show-social',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Social Icons Toolbar Area', 'neoton'),
                'subtitle' => esc_html__('You can select Social Icons show or hide', 'neoton'),
                'default'  => true,
            ),  
                    
            array(
                'id'     => 'notice_critical2',
                'type'   => 'info',
                'notice' => true,
                'style'  => 'success',
                'title'  => esc_html__('Header Area', 'neoton')            
            ),

            array(
                'id'               => 'header-grid',
                'type'             => 'select',
                'title'            => esc_html__('Header Area Width', 'neoton'),                 
                //Must provide key => value pairs for select options
                'options'          => array(                                     
                
                    'container' => esc_html__('Container', 'neoton'),
                    'full'      => esc_html__('Container Fluid', 'neoton'),
                ),
                'default'          => 'container',            
            ),  

            array(
                'id'       => 'dark_light_mode',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Dark & Light Mode', 'neoton'),
                'subtitle' => esc_html__('You can show or hide Quote Button', 'neoton'),
                'default'  => false,
            ),
        
            array(
                'id'       => 'quote_btns',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Button', 'neoton'),
                'subtitle' => esc_html__('You can show or hide Quote Button', 'neoton'),
                'default'  => false,
            ),
        
            
            array(
                'id'       => 'quote',                               
                'title'    => esc_html__( 'Button Text', 'neoton' ),                  
                'type'     => 'text',
                'required' => array(
                    array(
                        'quote_btns',
                        'equals',
                        1,
                    ),
                ),  
            ), 


        
            array(
                'id'       => 'quote_link',                               
                'title'    => esc_html__( 'Button Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Button Link Here', 'neoton' ),
                'type'     => 'text', 
                'required' => array(
                    array(
                        'quote_btns',
                        'equals',
                        1,
                    ),
                ),                
            ),

            array(
                'id'       => 'quote_btns_link',
                'type'     => 'switch', 
                'title'    => esc_html__('Open Button Link New Window', 'neoton'),            
                'default'  => false,
                'required' => array(
                    array(
                        'quote_btns',
                        'equals',
                        1,
                    ),
                ), 
            ), 

            array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Search', 'neoton'),
                'subtitle' => esc_html__('You can show or hide search icon at menu area', 'neoton'),
                'default'  => false,
            ),     
        )
    ) 
);  
   

Redux::setSection( $opt_name, array(
'title'            => esc_html__( 'Header Layout', 'neoton' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection' =>false,      
'fields'    => array(  
                array(
                    'id'       => 'header_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Header Layout', 'neoton'), 
                    'subtitle' => esc_html__('Select header layout. Choose between 1, 2 or 3 layout.', 'neoton'),
                    'options'  => array(
                        'style1'   => array(
                            'alt'      => 'Header Style 1', 
                            'img'      => get_template_directory_uri().'/libs/img/style_1.jpg'
                        ),  
                        'style2'   => array(
                            'alt'      => 'Header Style 2', 
                            'img'      => get_template_directory_uri().'/libs/img/style_2.jpg'
                        ),
                        'style3'   => array(
                            'alt'      => 'Header Style 3', 
                            'img'      => get_template_directory_uri().'/libs/img/style_3.jpg'
                        ), 
                        'style4'   => array(
                            'alt'      => 'Header Style 4', 
                            'img'      => get_template_directory_uri().'/libs/img/style_4.jpg'
                        ),                                   
                ),
                'default' => 'style1'
            ), 
                
            array(
                'id'       => 'header_add',
                'type'     => 'media',
                'title'    => esc_html__( 'Header Add Image', 'neoton' ),
                'subtitle' => esc_html__( 'Upload your add image', 'neoton' )                
            ), 
            array(
                'id'        => 'header_add_link',
                'type'      => 'text',                       
                'title'     => esc_html__('Add Image Link','neoton')                             
            ), 
            array(
                'id'       => 'header_adds_links',
                'type'     => 'switch', 
                'title'    => esc_html__('Open Link New Window', 'neoton'),            
                'default'  => false
            ), 

            array(
                'id'        => 'header_add_height',
                'type'      => 'text',                       
                'title'     => esc_html__('Add Height Here','neoton'),   
                'subtitle' => esc_html__( 'Add Image height example(60px)', 'neoton' )
            ),    
        )
    ) 
);

                                   
//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'neoton' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'neoton' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'toolbar_soci_icn_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Social Icon Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_borders',
                    'type'      => 'color_rgba',                       
                    'title'     => esc_html__('Seperator Border Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),   
                      
                    'default'  => array(
                        'color'     => '',
                        'alpha'     => 1                    
                    ),
                    'output' => array(                 
                    'border-color'            => '#back-header .back-toolbar-area .back-ticker div.widget-title::after'
                    )
                ),  
                
        )
    )
);

    //Preloader settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Preloader Style', 'neoton' ),
        'desc'   => esc_html__( 'Preloader Style Here', 'neoton' ),        
        'icon' => 'el el-brush',
        'fields' => array( 
                array(
                    'id'       => 'show_preloader',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Show Preloader', 'neoton'),
                    'subtitle' => esc_html__('You can show or hide preloader', 'neoton'),
                    'default'  => false,
                ), 

                array(
                    'id'        => 'preloader_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Preloader Background Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ), 
                    'output' => array(                 
                        'background-color'            => '#back__preloader'
                    ),                      
                ), 

                
                array(
                    'id'        => 'preloader_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Preloader Color (Half)','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ),                       
                ),
                


                array(
                    'id'        => 'preloader_color_left',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Preloader Color (Half)','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ),                       
                ), 

                array(
                    'id'    => 'preloader_img', 
                    'url'   => true,     
                    'title' => esc_html__( 'Preloader Image', 'neoton' ),                 
                    'type'  => 'media', 
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ),                                 
                ),       
            )
        )
    );    
    //End Preloader settings  

    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Global Style', 'neoton' ),
        'desc'   => esc_html__( 'Style your theme', 'neoton' ),    
        'icon' => 'el el-brush',    
        'subsection' =>false,  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => esc_html__('Body Backgroud Color','neoton'),
                            'subtitle'  => esc_html__('Pick body background color', 'neoton'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => esc_html__('Text Color','neoton'),
                            'subtitle'  => esc_html__('Pick text color', 'neoton'),
                            'default'   => '#55575c',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                            'id'        => 'primary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Primary Color','neoton'),
                            'subtitle'  => esc_html__('Select Primary Color.', 'neoton'),
                            'default'   => '#0088cb',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'secondary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Secondary Color','neoton'),
                            'subtitle'  => esc_html__('Select Secondary Color.', 'neoton'),
                            'default'   => '#030c26',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'dark_mode_gb_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Dark Mode Bg Color (01)','neoton'),
                            'subtitle'  => esc_html__('Select Dark Mode Bg Color.', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                        array(
                            'id'        => 'dark_mode_gb_color_one',
                            'type'      => 'color', 
                            'title'     => esc_html__('Dark Mode Bg Color (02)','neoton'),
                            'subtitle'  => esc_html__('Select Dark Mode Bg Color.', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'dark_mode_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Dark Mode Color','neoton'),
                            'subtitle'  => esc_html__('Select Dark Mode Color.', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),
                       
                ) 
        ) 
    ); 

       
    
    //Menu settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu Style', 'neoton' ),
        'desc'   => esc_html__( 'Main Menu Style Here', 'neoton' ),  
        'icon' => 'el el-brush',      
        'subsection' =>false,  
        'fields' => array( 

                        array(
                            'id'     => 'notice_critical_menu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Main Menu Settings', 'neoton'),                                           
                        ),                        

                        array(
                            'id'        => 'menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Background Color','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color (Hover)','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),           
                            'default'   => '',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color (Active)','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'transparent_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Text Color','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'transparent_menu_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Color (Hover)','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'transparent_menu_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Color (Active)','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 

                        
                        array(
                            'id'        => 'menu_desc_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Description Text Color','neoton'),
                            'subtitle'  => esc_html__('Pick color', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',
                            'output' => array(                 
                                'color'            => '.navbar-menu span.description'
                            )                         
                        ),

                        array(
                            'id'        => 'menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Left Right Gap','neoton'),   
                            'default'   => '',                             
                        ),

                        array(
                            'id'        => 'menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Top Gap','neoton'),   
                            'default'   => '',                             
                        ),                        

                        array(
                            'id'        => 'menu_item_gap3',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Bottom Gap','neoton'),   
                            'default'   => '',                             
                        ),

                        array(
                            'id'       => 'menu_text_trasform',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Menu Text Uppercase', 'neoton' ),
                            'on'       => esc_html__( 'Enabled', 'neoton' ),
                            'off'      => esc_html__( 'Disabled', 'neoton' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'main_menu_center',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Center', 'neoton' ),
                            'on'       => esc_html__( 'Enabled', 'neoton' ),
                            'off'      => esc_html__( 'Disabled', 'neoton' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'main_menu_icon',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Icon Hide', 'neoton' ),
                            'on'       => esc_html__( 'Enabled', 'neoton' ),
                            'off'      => esc_html__( 'Disabled', 'neoton' ),
                            'default'  => false,
                        ),

                        array(
                            'id'     => 'notice_critical_dropmenu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Dropdown Menu Settings', 'neoton'),                                           
                        ),
                                               
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','neoton'),
                            'subtitle'  => esc_html__('Pick bg color', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','neoton'),
                            'subtitle'  => esc_html__('Pick text color', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','neoton'),
                            'subtitle'  => esc_html__('Pick text color', 'neoton'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),                              
                     

                        array(
                            'id'       => 'menu_text_trasform2',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Text Uppercase', 'neoton' ),
                            'on'       => esc_html__( 'Enabled', 'neoton' ),
                            'off'      => esc_html__( 'Disabled', 'neoton' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'menu_text_plus_icon',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Icon', 'neoton' ),
                            'on'       => esc_html__( 'Enabled', 'neoton' ),
                            'off'      => esc_html__( 'Disabled', 'neoton' ),
                            'default'  => false,
                        ),
                        
                )
            )
        ); 

    //Sticky Menu settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sticky Menu Style', 'neoton' ),
        'desc'       => esc_html__( 'Sticky Menu Style Here', 'neoton' ), 
        'icon' => 'el el-brush',       
        'subsection' =>false,  
        'fields' => array(
                    array(
                        'id'       => 'off_sticky',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Sticky Menu', 'neoton'),
                        'subtitle' => esc_html__('You can show or hide sticky menu here', 'neoton'),
                        'default'  => false,
                    ),

                    array(
                        'id'        => 'stiky_menu_areas_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Menu Area Background Color','neoton'),
                        'subtitle'  => esc_html__('Pick color', 'neoton'),    
                        'default'   => '',                        
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ), 
                        
                    array(
                        'id'        => 'stikcy_menu_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Menu Text Color','neoton'),
                        'subtitle'  => esc_html__('Pick color', 'neoton'),    
                        'default'   => '',                        
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ), 
                       

                    array(
                        'id'        => 'sticky_menu_text_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Menu Text Color (Hover)','neoton'),
                        'subtitle'  => esc_html__('Pick color', 'neoton'),           
                        'default'   => '',                 
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                       
                    ), 

                    array(
                        'id'        => 'stikcy_menu_text_active_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Main Menu Text Color (Active)','neoton'),
                        'subtitle'  => esc_html__('Pick color', 'neoton'),
                        'default'   => '',
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ),                     
                    array(
                        'id'        => 'sticky_drop_down_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Dropdown Menu Background Color','neoton'),
                        'subtitle'  => esc_html__('Pick bg color', 'neoton'),
                        'default'   => '',
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                       
                    ), 
                            
                        
                    array(
                        'id'        => 'stikcy_drop_text_color',
                        'type'      => 'color',                     
                        'title'     => esc_html__('Dropdown Menu Text Color','neoton'),
                        'subtitle'  => esc_html__('Pick text color', 'neoton'),
                        'default'   => '',
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                       
                    ), 
                        
                    array(
                        'id'        => 'sticky_drop_text_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Dropdown Menu Text Color (Hover)','neoton'),
                        'subtitle'  => esc_html__('Pick text color', 'neoton'),
                        'default'   => '',
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ),                        
                )
            )
        ); 

    //Breadcrumb settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Breadcrumb Style', 'neoton' ),     
        'icon' => 'el el-brush', 
        'subsection' =>false,  
        'fields' => array(

                    array(
                        'id'       => 'off_breadcrumb_area',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show / Hide Breadcrumb Area', 'neoton'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'neoton'),
                        'default'  => true,
                    ),

                    array(
                        'id'       => 'off_breadcrumb',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show / Hide Breadcrumb', 'neoton'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'neoton'),
                        'default'  => true,
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),
                    ),

                    array(
                        'id'        => 'breadcrumb_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','neoton'),
                        'subtitle'  => esc_html__('Pick color', 'neoton'),    
                        'default'   => '',                        
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                       
                    ),                     

                     array(
                        'id'       => 'page_banner_main',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Background Banner', 'neoton' ),
                        'subtitle' => esc_html__( 'Upload your banner', 'neoton' ), 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                 
                    ), 

                    array(
                        'id'        => 'breadcrumb_title',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Title Font Size (Ex: 36px)','neoton'),                          
                        'default'   => '',
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                                                     
                    ), 

                    array(
                        'id'               => 'breadcrumb-align',
                        'type'             => 'select',
                        'title'            => esc_html__('Title & Breadcrumb Alignment', 'neoton'),                   
                        'desc'             => esc_html__('Change your title and breadcrumb text alignment', 'neoton'),
                    //Must provide key => value pairs for select options
                    'options'          => array(
                        'left'               => esc_html__('Left','neoton'),                                   
                        'center'                => esc_html__('Center', 'neoton'),                                         
                        'right'                => esc_html__('Right', 'neoton'),
                       
                        ),
                        'default'          => 'center',
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                  
                    ),  
                    
                    array(
                        'id'        => 'breadcrumb_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','neoton'),
                        'subtitle'  => esc_html__('Pick color', 'neoton'),    
                        'default'   => '',                        
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                       
                    ),                   

                    array(
                        'id'        => 'breadcrumb_seperator_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Breadcrumb Seperator Color','neoton'),
                        'subtitle'  => esc_html__('Pick color', 'neoton'),    
                        'default'   => '',                        
                        'validate'  => 'color',  
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                      
                    ),  
                    
                  
                    array(
                        'id'        => 'breadcrumb_top_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap (Ex: 60px)','neoton'),                          
                        'default'   => '',  
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                            
                    ),


                    array(
                        'id'        => 'breadcrumb_bottom_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap (Ex: 60px)','neoton'),                          
                        'default'   => '',
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                             
                    ),

                    array(
                        'id'        => 'breadcrumb_top_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap (Mobile)','neoton'),                          
                        'default'   => '', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                             
                    ), 

                    array(
                        'id'        => 'breadcrumb_bottom_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap (Mobile)','neoton'),                          
                        'default'   => '', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                            
                    ),        
                )
            )
        );
    
    //offcanvas  settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Offcanvas Style', 'neoton' ),
        'desc'   => esc_html__( 'Offcanvas Style Here', 'neoton' ),
        'icon' => 'el el-brush',        
        'subsection' =>false,  
        'fields' => array( 

                array(
                    'id'       => 'off_canvas',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Show off Canvas', 'neoton'),
                    'subtitle' => esc_html__('You can show or hide off canvas here', 'neoton'),
                    'default'  => false,
                ), 

                array(
                    'id'        => 'offcan_bgs_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Background Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ), 

                array(
                    'id'        => 'offcan_title_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Title Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

   
                array(
                    'id'        => 'offcan_txt_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Text Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

                array(
                    'id'        => 'offcan_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

                array(
                    'id'        => 'offcan_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link hover Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

                array(
                    'id'        => 'offcan_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Icon Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ),


                array(
                    'id'        => 'offcan_social_icon_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Bg Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ),


                array(
                    'id'        => 'offcan_social_icon__color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ),  


                array(
                    'id'        => 'offcanvas_closede_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Close Bg Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

                array(
                    'id'        => 'offcanvas_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Icon Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                          
                ),
            )
        )
    );
    

    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'neoton' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'You can specify your body and heading font here','neoton'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'neoton' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'neoton' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '16px',
                    'font-family' => 'League Spartan',
                    'font-weight' => '400',
                ),
            ),
             array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'neoton' ),
                'subtitle' => esc_html__( 'Specify the menu font properties.', 'neoton' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#202427',                    
                    'font-family' => 'League Spartan',
                    'google'      => true,
                    'font-size'   => '15px',                    
                    'font-weight' => '600',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H1', 'neoton' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'neoton' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'League Spartan',
                    'google'      => true,
                    'font-size'   => '40px',
                    'line-height' => '50px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H2', 'neoton' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'neoton' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'League Spartan',
                    'google'      => true,
                    'font-size'   => '36px',
                    'line-height' => '40px'
                    
                ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H3', 'neoton' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'neoton' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'League Spartan',
                    'google'      => true,
                    'font-size'   => '28px',
                    'line-height' => '32px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H4', 'neoton' ),                
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'neoton' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'League Spartan',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H5', 'neoton' ),                
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'neoton' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'League Spartan',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H6', 'neoton' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'neoton' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'League Spartan',
                    'google'      => true,
                    'font-size'   => '16px',
                    'line-height' => '20px'
                ),
            ),
                
        )
    )                   
    );

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'neoton' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
        );
        
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'neoton' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                array(
                    'id'    => 'blog_banner_main', 
                    'url'   => true,     
                    'title' => esc_html__( 'Blog Page Banner', 'neoton' ),                 
                    'type'  => 'media',                                  
                ),

                array(
                    'id'        => 'banner__top__gap',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Banner Top Gap','neoton'),  
                    'subtitle' => esc_html__('Example:70px', 'neoton'), 
                    'default'   => '',                             
                ),                        

                array(
                    'id'        => 'banner__btm__gap',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Banner Bottom Gap','neoton'),
                    'subtitle' => esc_html__('Example:70px', 'neoton'),   
                    'default'   => '',                             
                ),  

                array(
                    'id'        => 'blog_bg_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Body Backgroud Color','neoton'),
                    'subtitle'  => esc_html__('Pick body background color', 'neoton'),
                    'default'   => '#fbfbfb',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'breadcrumb__title_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Title Color','neoton'),
                    'subtitle'  => esc_html__('Pick color', 'neoton'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
                
                array(
                    'id'       => 'blog_title',                               
                    'title'    => esc_html__( 'Blog  Title', 'neoton' ),
                    'subtitle' => esc_html__( 'Enter Blog  Title Here', 'neoton' ),
                    'type'     => 'text',                                   
                ),
                
                array(
                    'id'               => 'blog-layout',
                    'type'             => 'image_select',
                    'title'            => esc_html__('Select Blog Layout', 'neoton'), 
                    'subtitle'         => esc_html__('Select your blog layout', 'neoton'),
                    'options'          => array(
                    'full'             => array(
                    'alt'              => 'Blog Style 1', 
                    'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
                ),
                    '2right'           => array(
                    'alt'              => 'Blog Style 2', 
                    'img'              => get_template_directory_uri().'/libs/img/2cr.png'
                ),
                '2left'            => array(
                'alt'              => 'Blog Style 3', 
                'img'              => get_template_directory_uri().'/libs/img/2cl.png'
                ),                                  
                ),
                'default'          => '2right'
                ),                      
                
                array(
                    'id'               => 'blog-grid',
                    'type'             => 'select',
                    'title'            => esc_html__('Select Blog Gird', 'neoton'),                   
                    'desc'             => esc_html__('Select your blog gird layout', 'neoton'),
                //Must provide key => value pairs for select options
                'options'          => array(
                    '12'               => esc_html__('1 Column','neoton'),                                   
                    '6'                => esc_html__('2 Column', 'neoton'),                                         
                    '4'                => esc_html__('3 Column', 'neoton'),
                    '3'                => esc_html__('4 Column', 'neoton'),
                    ),
                    'default'          => '12',                                  
                ),  
                
                array(
                'id'               => 'blog-author-post',
                'type'             => 'select',
                'title'            => esc_html__('Show Author Info ', 'neoton'),                   
                'desc'             => esc_html__('Select author info show or hide', 'neoton'),
                //Must provide key => value pairs for select options
                'options'          => array(                                            
                'show'             => esc_html__('Show','neoton'), 
                'hide'             => esc_html__('Hide', 'neoton'),
                ),
                'default'          => 'show',
                
                ), 

                

                array(
                'id'               => 'blog-category',
                'type'             => 'select',
                'title'            => esc_html__('Show Category', 'neoton'),                   
               
                //Must provide key => value pairs for select options
                'options'          => array(                                            
                'show'             => esc_html__('Show','neoton'), 
                'hide'             => esc_html__('Hide', 'neoton'),
                ),
                'default'          => 'show',
                
                ),  
                

                array(
                'id'               => 'blog-date',
                'type'             => 'select',
                'title'            => esc_html__('Show Date', 'neoton'),                   
                'desc'             => esc_html__('Select Date show or hide', 'neoton'),
                //Must provide key => value pairs for select options
                'options'          => array(                                            
                'show'             => esc_html__('Show','neoton'), 
                'hide'             => esc_html__('Hide', 'neoton'),
                ),
                'default'          => 'show',
                ), 
                array(
                    'id'               => 'blog_readmore',                               
                    'title'            => esc_html__( 'Blog  ReadMore Text', 'neoton' ),
                    'subtitle'         => esc_html__( 'Enter Blog  ReadMore Here', 'neoton' ),
                    'type'             => 'text',                                   
                ),
                
                array(
                   'id'       => 'blog-banner-area-hide',
                   'type'     => 'switch', 
                   'title'    => esc_html__('Blog Banner Area Show/Hide', 'neoton'),
                   'subtitle' => esc_html__('You can show or hide blog banner area', 'neoton'),
                   'default'  => false,
                ),
            )
        )       
    );
    
    /* Category  Sections Here */
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Category Settings', 'neoton' ),
        'id'               => 'category-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array( 

            array(
                'id'               => 'cate-page-layout',
                'type'             => 'image_select',
                'title'            => esc_html__('Select Category Layout', 'neoton'), 
                'subtitle'         => esc_html__('Select your blog layout', 'neoton'),
                'options'          => array(
                'full'             => array(
                'alt'              => 'Blog Style 1', 
                'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
            ),
                '2right'           => array(
                'alt'              => 'Blog Style 2', 
                'img'              => get_template_directory_uri().'/libs/img/2cr.png'
            ),
            '2left'            => array(
            'alt'              => 'Blog Style 3', 
            'img'              => get_template_directory_uri().'/libs/img/2cl.png'
            ),                                  
            ),
            'default'          => '2right'
            ),

            array(
                'id'               => 'category-style',
                'type'             => 'select',
                'title'            => esc_html__('Category Style', 'neoton'),                 
                //Must provide key => value pairs for select options
                'options'          => array(                                    
                    'cate_style_defualt' => esc_html__('Category Style Default', 'neoton'),
                    'cate_style1' => esc_html__('Category Style One', 'neoton'),
                    'cate_style2' => esc_html__('Category Style Two', 'neoton'),
                    'cate_style3' => esc_html__('Category Style Three', 'neoton'),
                    'cate_style4' => esc_html__('Category Style Four', 'neoton')
                ),
                'default'          => 'cate_style_defualt',            
            ), 

            array(
                'id'               => 'blog-cate-grid',
                'type'             => 'select',
                'title'            => esc_html__('Select Blog Gird', 'neoton'),                   
                'desc'             => esc_html__('Select your blog gird layout', 'neoton'),
            //Must provide key => value pairs for select options
            'options'          => array(
                '12'               => esc_html__('1 Column','neoton'),                                   
                '6'                => esc_html__('2 Column', 'neoton'),                                         
                '4'                => esc_html__('3 Column', 'neoton'),
                '3'                => esc_html__('4 Column', 'neoton'),
                ),
                'default'          => '12',                                  
            ),                
        )
    )); 

    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post Settings', 'neoton' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
            array(
                    'id'       => 'blog_banner', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Blog Single page banner', 'neoton' ),                  
                    'type'     => 'media',
                    
            ),  

            array(
               'id'       => 'single-thum',
               'type'     => 'switch', 
               'title'    => esc_html__('Single Post Thumbnail Image Show/Hide', 'neoton'),
               'subtitle' => esc_html__('You can show or hide single post thumbnail image', 'neoton'),
               'default'  => false,
            ),
           
            array(
               'id'       => 'blog-meta-single',
               'type'     => 'switch', 
               'title'    => esc_html__('Show Meta? (just on this option)', 'neoton'),
               'subtitle' => esc_html__('You can show or hide Meta', 'neoton'),
               'default'  => false,
            ),   
           
            array(
               'id'       => 'blog-pagination',
               'type'     => 'switch', 
               'title'    => esc_html__('Single Post Pagination Show/Hide', 'neoton'),
               'subtitle' => esc_html__('You can show or hide single post pagination', 'neoton'),
               'default'  => false,
            ), 

            array(
               'id'       => 'blog-related',
               'type'     => 'switch', 
               'title'    => esc_html__('Related Post Show/Hide', 'neoton'),
               'subtitle' => esc_html__('You can show or hide related post', 'neoton'),
               'default'  => false,
            ), 

            array(
               'id'       => 'single-banner-hide',
               'type'     => 'switch', 
               'title'    => esc_html__('Single Post Breadcrumb Area Show/Hide', 'neoton'),
               'subtitle' => esc_html__('You can show or hide single post breadcrumb area', 'neoton'),
               'default'  => false,
            ),   
        )
    )); 


    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'neoton' ),
        'desc'   => esc_html__( 'Add your social icon here', 'neoton' ),
        'icon'   => 'el el-share',
        'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
            array(
                'id'       => 'sharetexts',                               
                'title'    => esc_html__( 'Follow Us Here', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Follow Us Text', 'neoton' ),
                'type'     => 'text',           
            ),
            array(
                'id'       => 'facebook',                               
                'title'    => esc_html__( 'Facebook Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Facebook Link', 'neoton' ),
                'type'     => 'text',                     
            ),
                
             array(
                'id'       => 'twitter',                               
                'title'    => esc_html__( 'Twitter Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Twitter Link', 'neoton' ),
                'type'     => 'text'
            ),
            
                array(
                'id'       => 'rss',                               
                'title'    => esc_html__( 'Rss Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Rss Link', 'neoton' ),
                'type'     => 'text'
            ),
                    
            array(
                'id'       => 'pinterest',                               
                'title'    => esc_html__( 'Pinterest Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Pinterest Link', 'neoton' ),
                'type'     => 'text'
            ),
            array(
                'id'       => 'linkedin',                               
                'title'    => esc_html__( 'Linkedin Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Linkedin Link', 'neoton' ),
                'type'     => 'text',            
            ),

            array(
                'id'       => 'instagram',                               
                'title'    => esc_html__( 'Instagram Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Instagram Link', 'neoton' ),
                'type'     => 'text',                       
            ),

             array(
                'id'       => 'youtube',                               
                'title'    => esc_html__( 'Youtube Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Youtube Link', 'neoton' ),
                'type'     => 'text',                       
            ),

            array(
                'id'       => 'tumblr',                               
                'title'    => esc_html__( 'Tumblr Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Tumblr Link', 'neoton' ),
                'type'     => 'text',                       
            ),

            array(
                'id'       => 'vimeo',                               
                'title'    => esc_html__( 'Vimeo Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Vimeo Link', 'neoton' ),
                'type'     => 'text',                       
            ),  

            array(
                'id'       => 'telegram',                               
                'title'    => esc_html__( 'Telegram Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Telegram Link', 'neoton' ),
                'type'     => 'text',                       
            ), 

            array(
                'id'       => 'whatsapp',                               
                'title'    => esc_html__( 'Whatsapp Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Whatsapp Link', 'neoton' ),
                'type'     => 'text',                       
            ),

            array(
                'id'       => 'soundcloud',                               
                'title'    => esc_html__( 'Soundcloud Link', 'neoton' ),
                'subtitle' => esc_html__( 'Enter Soundcloud Link', 'neoton' ),
                'type'     => 'text',                       
            ),                          
            ) 
        ) 
    );

    
    if ( class_exists( 'WooCommerce' ) ) {
        Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Woocommerce', 'neoton' ),    
            'icon'   => 'el el-shopping-cart',    
            ) 
        ); 

        Redux::setSection( $opt_name, array(
            'title'            => esc_html__( 'Shop', 'neoton' ),
            'id'               => 'shop_layout',
            'customizer_width' => '450px',
            'subsection' =>true,      
            'fields'           => array(                      
                array(
                    'id'       => 'shop_banner', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Shop page banner', 'neoton' ),                    
                    'type'     => 'media',
                ), 
                array(
                        'id'       => 'shop-layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__('Select Shop Layout', 'neoton'), 
                        'subtitle' => esc_html__('Select your shop layout', 'neoton'),
                        'options'  => array(
                            'full'      => array(
                                'alt'   => 'Shop Style 1', 
                                'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                            ),
                            'right-col' => array(
                                'alt'   => 'Shop Style 2', 
                                'img'   => get_template_directory_uri().'/libs/img/2cr.png'
                            ),
                            'left-col'  => array(
                                'alt'   => 'Shop Style 3', 
                                'img'   => get_template_directory_uri().'/libs/img/2cl.png'
                            ),                                  
                        ),
                        'default' => 'full'
                    ),

                    array(
                        'id'       => 'wc_num_product',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Number of Products Per Page', 'neoton' ),
                        'default'  => '9',
                    ),

                    array(
                        'id'       => 'wc_num_product_per_row',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Number of Products Per Row', 'neoton' ),
                        'default'  => '3',
                    ),

                    array(
                        'id'       => 'related_product_per_page',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Related Products Per Page', 'neoton' ),
                        'default'  => '3',
                    ),

                    array(
                        'id'       => 'wc_cart_icon',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Cart Icon Show At Menu Area', 'neoton' ),
                        'on'       => esc_html__( 'Enabled', 'neoton' ),
                        'off'      => esc_html__( 'Disabled', 'neoton' ),
                        'default'  => false,
                    ), 

                    array(
                        'id'       => 'cart_count',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Cart Count Show', 'neoton' ),
                        'on'       => esc_html__( 'Enabled', 'neoton' ),
                        'off'      => esc_html__( 'Disabled', 'neoton' ),
                        'default'  => false,
                    ),

                    array(
                        'id'        => 'cart_count__bg',
                        'type'      => 'color',
                        'title'     => esc_html__('Cart Count Bg Color','neoton'),
                        'subtitle'  => esc_html__('Pick color.', 'neoton'),
                        'default'   => '',
                        'validate'  => 'color',
                        'output' => array(                 
                            'background-color'            => '.back-count'
                        ), 
                        'required' => array('cart_count','equals', true),                       
                    ), 

                    array(
                        'id'        => 'cart_count_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Cart Count Color','neoton'),
                        'subtitle'  => esc_html__('Pick color.', 'neoton'),
                        'default'   => '',
                        'validate'  => 'color',
                        'output' => array(                 
                            'color'            => '.back-count'
                        ), 
                        'required' => array('cart_count','equals', true),                       
                    ), 

                    array(
                    'id'       => 'disable-sidebar',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Sidebar Disable For Single Product Page', 'neoton'),                
                    'default'  => true,
                    ), 

                    array(
                       'id'       => 'shop-banner-hide',
                       'type'     => 'switch', 
                       'title'    => esc_html__('Shop & Shop Single page Area Show/Hide', 'neoton'),
                       'subtitle' => esc_html__('You can show or hide shop & shop page area', 'neoton'),
                       'default'  => false,
                    ),                   
                )
            ) 
        );
    }
   
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer Option', 'neoton' ),
    'desc'   => esc_html__( 'Footer style here', 'neoton' ),
    'icon'   => 'el el-th-large',   
    'fields' => array(

        array(
            'id'        => 'footer_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Bg Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

        array(
            'id'       => 'footer_bg_image', 
            'url'      => true,     
            'title'    => esc_html__( 'Footer Background Image', 'neoton' ),                 
            'type'     => 'media',                                  
        ),

        array(
            'id'               => 'header_grid2',
            'type'             => 'select',
            'title'            => esc_html__('Footer Area Width', 'neoton'),             
           
            'options'          => array(                                     
            
                'container' => esc_html__('Container', 'neoton'),
                'full'      => esc_html__('Container Fluid', 'neoton')
            ),

            'default'          => 'container',            
        ),

        array(
            'id'       => 'footer_logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Footer Logo', 'neoton' ),
            'subtitle' => esc_html__( 'Upload your footer logo', 'neoton' ),                  
        ), 

     
        array(
            'id'       => 'footer-logo-height',                               
            'title'    => esc_html__( 'Logo Height', 'neoton' ),
            'subtitle' => esc_html__( 'Logo max height example(50px)', 'neoton' ),
            'type'     => 'text',
            'default'  => ''                    
        ), 
        array(
            'id'        => 'foot_social_color',
            'type'      => 'color',
            'title'     => esc_html__('Social Icon Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),                   

        array(
            'id'        => 'foot_social_border_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Social Border Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),                   

        array(
            'id'        => 'foot_social_hover',
            'type'      => 'color',
            'title'     => esc_html__('Social Icon Hover','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),   

        array(
            'id'        => 'footer_text_size',
            'type'      => 'text',                       
            'title'     => esc_html__('Footer Font Size','neoton'),
            'subtitle'  => esc_html__('Font Size', 'neoton'),    
            'default'   => '',                                            
        ),  

        array(
            'id'        => 'footer_h3_size',
            'type'      => 'text',                       
            'title'     => esc_html__('Footer Title Font Size','neoton'),
            'subtitle'  => esc_html__('Font Size', 'neoton'),    
            'default'   => '',                                            
        ),  

        array(
            'id'        => 'footer_link_size',
            'type'      => 'text',                       
            'title'     => esc_html__('Footer Link Font Size','neoton'),
            'subtitle'  => esc_html__('Font Size', 'neoton'),    
            'default'   => '',                                            
        ), 
        array(
            'id'        => 'footer_title_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Title Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ), 

        array(
            'id'        => 'footer_title_border_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Title Border Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color', 
            'output' => array(                 
            'background-color'            => '.back-footer .back-footer-top h3.footer-title:after'
            )                       
        ),   

        array(
            'id'        => 'footer_text_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Text Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

        array(
            'id'        => 'footer_icon_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Icon Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color', 
            'output' => array(                 
            'color'            => '.back-footer .fa-ul li i, .back-footer .recent-post-widget .show-featured .post-desc i'
            )                       
        ),   

        array(
            'id'        => 'footer_link_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Link Hover Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

        array(
            'id'        => 'footer_input_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Input Bg Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),    

        array(
            'id'        => 'footer_button_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Button Bg Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ), 

        array(
            'id'        => 'footer_button_bg_hover_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Button Hover Bg Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

 

        array(
            'id'        => 'footer_button_text_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Button Text Color','neoton'),
            'subtitle'  => esc_html__('Pick color.', 'neoton'),
            'default'   => '',
            'validate'  => 'color',                        
        ),                  
                       
                
            array(
                'id'       => 'copyright',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer CopyRight', 'neoton' ),
                'subtitle' => esc_html__( 'Change your footer copyright text ?', 'neoton' ),
                'default'  => esc_html__( '2022 All Rights Reserved', 'neoton' ),
            ),  

            array(
                'id'       => 'copyright_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Background', 'neoton' ),
                'subtitle' => esc_html__( 'Copyright Background Color', 'neoton' ),      
                'default'  => '',            
            ),

            array(
                'id'        => 'copyright_borders',
                'type'      => 'color_rgba',                       
                'title'     => esc_html__('Copyright Border Color','neoton'),
                'subtitle'  => esc_html__('Pick color', 'neoton'),   
                  
                'default'  => array(
                    'color'     => '',
                    'alpha'     => 1                    
                ),
                'output' => array(                 
                    'border-color'            => '.footer-bottom .container, .footer-bottom .container-fluid'
                )
            ),

            array(
                'id'       => 'copyright_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Text Color', 'neoton' ),
                'subtitle' => esc_html__( 'Copyright Text Color', 'neoton' ),      
                'default'  => '',            
            ), 

            array(
                'id'        => 'copyright_dots_color',
                'type'      => 'color',
                'title'     => esc_html__('Copyright Dots Color','neoton'),
                'subtitle'  => esc_html__('Pick color.', 'neoton'),
                'default'   => '',
                'validate'  => 'color', 
                'output' => array(                 
                'background-color'            => '.footer-bottom .copyright-widget .widget_nav_menu ul.menu li a:after'
                )                       
            ), 
        ) 
    ) 
    );



    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Coming Soon Page', 'neoton' ),
    'desc'   => esc_html__( 'You can set coming soon/maintenance mode here', 'neoton' ),
    'icon'   => 'el el-time',    
    'fields' => array(

                array(
                    'id'       => 'show-comingsoon',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Enable Coming Soon', 'neoton'),
                    'subtitle' => esc_html__('You can enable/disable coming soon', 'neoton'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'coming_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Coming Soon Logo', 'neoton' ),
                    'subtitle' => esc_html__( 'Upload your image', 'neoton' ),
                    'url'=> true,
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),

                array(
                    'id'       => 'coming-logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'neoton' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'neoton' ),
                    'type'     => 'text',
                    'default'  => '',
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),                    
                ), 

                array(
                    'id'       => 'coming_title',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'neoton' ),
                    'subtitle' => esc_html__( 'Enter title for coming soon page', 'neoton' ), 
                    'default'  => esc_html__('Coming Soon', 'neoton'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),  
                
                array(
                    'id'       => 'coming_text',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Text', 'neoton' ),
                    'subtitle' => esc_html__( 'Enter text coming soon page', 'neoton' ),  
                    'default'  => esc_html__('Our Exciting Website Is Coming Soon! Check Back Later', 'neoton'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),            
                ),                         
                
                array(
                    'id'            => 'opt-date-time',
                    'type'          => 'text',
                    'title'         => esc_html__('Date/Time', 'neoton'),
                    'subtitle'      => esc_html__('Add Date/Time ex(Y-m-d  H:m:s)','neoton'), 
                    'default'  =>   esc_html__('2023-10-22 18:45:14','neoton'),   
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),                       
                ),
                array(
                    'id'       => 'coming_day',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Day Text', 'neoton' ),                  
                    'default'  => esc_html__('Days', 'neoton'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),

              
                array(
                    'id'       => 'coming_hour',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Hour Text', 'neoton' ),                  
                    'default'  => esc_html__('Hours', 'neoton'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),                
                ), 

                array(
                    'id'       => 'coming_min',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Minute Text', 'neoton' ),                  
                    'default'  => esc_html__('Minutes', 'neoton'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),                   

                array(
                    'id'       => 'coming_sec',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Second Text', 'neoton' ),                  
                    'default'  => esc_html__('Seconds', 'neoton'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),             
                ),                   
              
                array(
                    'id'       => 'coming_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Page Background', 'neoton' ),
                    'subtitle' => esc_html__( 'Upload your image', 'neoton' ),
                    'url'=> true,
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ), 

                array(
                    'id'       => 'fllows_title_here',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Social Title', 'neoton' ),
                    'subtitle' => esc_html__( 'Enter title', 'neoton' ), 
                    'default'  => esc_html__('', 'neoton'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),             
                ),                       
            ) 
        ) 
    ); 

    
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Error Page', 'neoton' ),
    'desc'   => esc_html__( '404 details  here', 'neoton' ),
    'icon'   => 'el el-error-alt',    
    'fields' => array(

                array(
                    'id'       => 'error__404_image',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Error Image', 'neoton' ),
                    'subtitle' => esc_html__( 'Upload your image', 'neoton' ),
                    'url'=> true,               
                ), 

                array(
                    'id'       => 'title_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'neoton' ),
                    'subtitle' => esc_html__( 'Enter title for 404 page', 'neoton' ), 
                    'default'  => esc_html__('404', 'neoton')                
                ),  
                
                array(
                    'id'       => 'text_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Text', 'neoton' ),
                    'subtitle' => esc_html__( 'Enter text for 404 page', 'neoton' ),  
                    'default'  => esc_html__('Page Not Found', 'neoton')             
                ),                      
                       
                
                array(
                    'id'       => 'back_home',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Back to Home Button Label', 'neoton' ),
                    'subtitle' => esc_html__( 'Enter label for "Back to Home" button', 'neoton' ),
                    'default'  => esc_html__('Back to Homepage', 'neoton') 
                ),

                array(
                    'id'       => 'error_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload 404 Page Bg', 'neoton' ),
                    'subtitle' => esc_html__( 'Upload your image', 'neoton' ),
                    'url'=> true                
                ),                             
            ) 
        ) 
    ); 


    /**********************************
    ********* Custom CSS =***********
    ***********************************/
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Custom CSS Here', 'neoton'),
        'icon'      => 'el-icon-bookmark',
        'icon_class' => 'el-icon-large',
        'fields'    => array(
                array(
                    'id'        => 'custom-css',
                    'type'      => 'ace_editor',
                    'mode'      => 'css',
                    'title'     => esc_html__('Custom CSS', 'neoton'),
                    'subtitle' => esc_html__('you can add here your custom css code', 'neoton'),
                    'default'   => '',
                ),                                                                      
            ) 
        ) 
    );   


    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";           
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.     
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'neoton' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'neoton' ),
                'icon'   => 'el el-paper-clip',              
                'fields' => array()
            );
            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );              
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }