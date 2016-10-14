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

<?php get_footer(); ?>
