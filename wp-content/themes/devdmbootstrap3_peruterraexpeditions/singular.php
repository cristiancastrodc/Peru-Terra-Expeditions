<?php get_header(); ?>

<section id="top-widgets" class="no-pad">
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
  </div>
</nav>

<header>
  <div id="header">
    <div class="container-fluid">
      <?php masterslider(1); ?>
    </div>
  </div>
</header>

<section id="main-content">
  <div id="post">
    <div class="container">
      <?php // theloop
      if ( have_posts() ) : the_post();
        // single post
        if ( is_single() ) : ?>
          <div <?php post_class(); ?>>
            <div class="row">
              <div class="col-sm-8">
                <h2 class="post-header text-uppercase"><?php the_title() ;?></h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="box">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('full', array('class' => 'img-responsive center-block mb-15')); ?>
                  <?php endif; ?>
                  <div class="row">
                    <?php if (get_field('segunda_imagen')): ?>
                        <div class="col-sm-6">
                          <div class="tour-thumbnail" style="background-image: url(<?php the_field('segunda_imagen'); ?>)">
                          </div>
                        </div>
                    <?php endif ?>
                    <?php if (get_field('tercera_imagen')): ?>
                        <div class="col-sm-6">
                          <div class="tour-thumbnail" style="background-image: url(<?php the_field('tercera_imagen'); ?>)">
                          </div>
                        </div>
                    <?php endif ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <?php if (get_field('informacion_lateral')): ?>
                  <div class="box aditional-info">
                    <?php the_field('informacion_lateral'); ?>
                  </div>
                <?php endif ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="post-content">
                  <?php the_content(); ?>
                </div>
              </div>
              <div class="col-sm-4 pt-30">
                <div class="post-form">
                  <form>
                    <?php echo do_shortcode('[contact-form-7 id="110" title="Contacto"]'); ?>
                  </form>
                </div>
                <div class="post-tour-imgs pt-30">
                  <div class="row">
                    <div class="col-xs-6"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dircetur.jpg" alt="" class="img-responsive"></div>
                    <div class="col-xs-6"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mincetur.jpg" alt="" class="img-responsive"></div>
                  </div>
                  <div class="row pt-60">
                    <div class="col-sm-12">
                      <a href="//www.tripadvisor.com.pe/Attraction_Review-g294314-d10716151-Reviews-Peru_Terra_Expeditions-Cusco_Cusco_Region.html" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tripadvisor-peru-terra-expeditions.png" alt="" class="img-responsive center-block">
                      </a>
                    </div>
                  </div>
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

<?php get_footer(); ?>
