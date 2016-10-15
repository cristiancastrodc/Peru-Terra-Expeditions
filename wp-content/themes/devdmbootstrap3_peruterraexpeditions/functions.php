<?php
  // Agregar un menú
  register_nav_menus(
      array(
          'tours_menu' => 'Tours Menu'
      )
  );
  // Agregar áreas para widgets
  function devdmbootstrap3_peruterraexpeditions_widgets_init() {
    $args = array(
      'name'          => 'Social icons',
      'id'            => 'social-icons',
      'class'         => '',
    );
    register_sidebar( $args );
    $args = array(
      'name'          => 'Language area',
      'id'            => 'lang-area',
      'class'         => '',
    );
    register_sidebar( $args );
  }
  add_action('widgets_init', 'devdmbootstrap3_peruterraexpeditions_widgets_init');
  // Añadir scripts
  function devdmbootstrap3_peruterraexpeditions_js() {
    // wp_enqueue_script('theme-bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ));
    // wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ));
    // wp_enqueue_script('theme-scroll', get_stylesheet_directory_uri() . '/js/jquery-scrollto.js', array( 'jquery' ));
    wp_enqueue_script('theme-local-js', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ));
    wp_enqueue_script('match-height', get_stylesheet_directory_uri() . '/js/jquery.matchHeight.js', array( 'jquery' ));
  }
  add_action('wp_enqueue_scripts', 'devdmbootstrap3_peruterraexpeditions_js');
