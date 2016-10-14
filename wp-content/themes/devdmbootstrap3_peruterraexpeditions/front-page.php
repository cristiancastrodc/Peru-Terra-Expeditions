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
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <?php $categorias = get_categories( array('exclude_tree' => '1,55') ); ?>
          <ul class="list-inline text-uppercase text-center">
            <?php foreach ($categorias as $categoria): ?>
              <li><a rel="m_PageScroll2id" href="#tour-<?php echo $categoria->slug; ?>"><?php echo $categoria->name; ?></a></li>
            <?php endforeach ?>
          </ul>
      </div>
    </div>
  </div>
</nav>
<section id="quienes-somos" class="bg-green-1 no-pad pt-60">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <?php
          $lang = get_locale();
          switch ($lang) {
            case 'es_ES': ?>
              <h1>Quienes somos</h1><?php
            break;
            case 'en_US': ?>
              <h1>About us</h1> <?php
            break;
          }
        ?>
      </div>
    </div>
    <div class="row">
      <?php query_posts(array('category_name'  => 'somos', 'posts_per_page' => 3)); ?>
      <?php while (have_posts()): the_post(); ?>
        <div class="col-sm-6 col-md-4 text-center">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail( array(240, 240), array( 'class' => 'img-responsive center-block team-img' )); ?>
          <?php endif ?>
          <h3 class="person-name"><?php the_title(); ?></h3>
          <?php the_content(); ?>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>
<section id="quienes-somos-2" class="no-pad pb-60">
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 text-center">
        <?php query_posts(array('page_id' => 30)); ?>
        <?php the_post(); ?>
        <div class="pt-30 section-content">
          <?php the_content(); ?>
        </div>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>
<?php query_posts(array('page_id' => 105)); ?>
<?php the_post(); ?>
<?php if (get_the_content() !== ""): ?>
<section id="que-hacemos">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <?php
          $lang = get_locale();
          switch ($lang) {
            case 'es_ES': ?>
              <h1>Que hacemos</h1><?php
            break;
            case 'en_US': ?>
              <h1>What we do</h1> <?php
            break;
          }
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="section-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif ?>
<?php wp_reset_query(); ?>
<div id="tours">
  <?php $categorias = get_categories( array('slug' => array('tours-en-puno', 'tour-cusco-y-machu-picchu', 'cusco-tradicional', 'tour-machu-picchu', 'tours-de-aventura-en-cusco', 'camino-inca')) ); ?>
  <?php $backgrounds = array('bg-purple', 'bg-green-2', 'bg-gray'); ?>
  <?php foreach ($categorias as $categoria): ?>
    <?php query_posts( array ( 'category_name' => $categoria->slug ) ); ?>
    <section id="tour-<?php echo $categoria->slug; ?>" class="no-pad">
      <div class="<?php echo $backgrounds[array_rand($backgrounds)]; ?> section-title">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3><?php single_cat_title(); ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="tour-content">
        <div class="container">
          <div class="row">
            <?php
            $cuenta = 0;
            while (have_posts()) : the_post(); ?>
              <div class="col-sm-4 inner-pad">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(array(360, 360), array( 'class' => 'img-responsive center-block' )); ?>
                <?php endif ?>
                <h4 class="front-post-title"><?php the_title(); ?></h4>
                <div class="text-justify">
                  <?php the_excerpt(); ?>
                </div>
                <a href="<?php /*echo "#";*/ the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="read-more">
                  <?php
                    $lang = get_locale();
                    switch ($lang) {
                      case 'es_ES': ?>
                        <span>Ver más</span><?php
                      break;
                      case 'en_US': ?>
                        <span>Read more</span><?php
                      break;
                    }
                  ?>
                </a>
                <br>
                <div class="post-meta text-right"><?php echo get_post_meta(get_the_ID(), 'precio', true); ?></div>
              </div>
              <?php $cuenta++; ?>
              <?php if ($cuenta % 3 == 0): ?>
                <div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
              <?php endif ?>
            <?php endwhile;?>
            <?php wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach ?>
</div>
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
