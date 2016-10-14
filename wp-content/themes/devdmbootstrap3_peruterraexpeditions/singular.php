<?php get_header(); ?>

<section id="top-widgets">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <?php if (dynamic_sidebar( 'social-icons' )): else: endif; ?>
      </div>
      <div class="col-sm-6 text-right">
        <?php if (dynamic_sidebar( 'lang-area' )): else: endif; ?>
      </div>
    </div>
  </div>
</section>
<nav class="navbar navbar-fixed-top" id="main-navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" />
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'main_menu',
            'container_class' => 'primary-navigation',
            'menu_class' => 'nav navbar-nav navbar-right',
            )
        );
      ?>
    </div>
  </div>
</nav>
<header>
  <div id="header">
    <div class="container-fluid">
      <?php masterslider(1); ?>
    </div>
  </div>
</header>
<nav id="tours-menu">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'tours_menu'
          ));
        ?>
      </div>
    </div>
  </div>
</nav>
<section id="main-content">
  <div id="post">
    <div class="container">
      <div class="row">
        <?php // theloop
        if ( have_posts() ) : the_post();
          // single post
          if ( is_single() ) : ?>
            <div <?php post_class(); ?>>
              <div class="col-sm-8">
                <h2 class="post-header text-uppercase"><?php the_title() ;?></h2>
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('full', array('class' => 'img-responsive center-block')); ?>
                  <div class="clear"></div>
                <?php endif; ?>
                <div class="post-content">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          <?php  endif; ?>
        <?php else: ?>
          <div class="col-sm-12">
            <?php get_404_template(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<section id="contacto">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h3>Peru Terra Expeditions</h3>
        <?php query_posts(array('page_id' => 108)); ?>
        <?php the_post(); ?>
        <?php the_content(); ?>
        <?php wp_reset_query(); ?>
        <div class="social-icons">
          <?php dynamic_sidebar( 'social-icons' ); ?>
        </div>
      </div>
      <div class="col-sm-5">
        <?php query_posts(array('page_id' => 111)); ?>
        <?php the_post(); ?>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
        <?php wp_reset_query(); ?>
        <form>
          <?php echo do_shortcode('[contact-form-7 id="110" title="Contacto"]'); ?>
        </form>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
