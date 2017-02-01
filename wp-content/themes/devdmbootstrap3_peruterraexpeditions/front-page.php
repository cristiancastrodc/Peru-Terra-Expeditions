<?php get_header(); ?>

<section id="top">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-right">
        <ul class="list-inline">
          <?php if (dynamic_sidebar( 'lang-area' )): else: endif; ?>
          <?php if (dynamic_sidebar( 'social-icons' )): else: endif; ?>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2 col-sm-offset-5">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" class="img-responsive center-block" />
        </a>
      </div>
    </div>
  </div>
</section>
<nav id="tours-menu">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <?php $categorias = get_categories( array('exclude_tree' => '1,7,55,57', 'orderby' => 'slug', 'order' => 'ASC', 'parent' => 0) ); ?>
        <ul class="list-inline text-uppercase text-center">
        <?php foreach ($categorias as $categoria): ?>
          <?php $sub_categorias = get_categories(array('orderby' => 'slug', 'parent' => $categoria->term_id)); ?>
          <?php $cuenta = count($sub_categorias); ?>
          <li class="tour-root-link">
            <?php if ($cuenta > 0): ?>
              <?php
              $clase = '';
              switch ($cuenta) {
                case 2:
                  $clase = 'col-sm-6';
                  break;
                case 3:
                  $clase = 'col-sm-4';
                  break;
                default:
                  $clase = 'col-sm-12';
                  break;
              } ?>
              <a href="#"><?php echo $categoria->name; ?></a>
              <div class="sub-menu-container <?php echo 'pte-cols-' . $cuenta; ?>">
                <div class="row no-gutter">
                  <?php foreach ($sub_categorias as $categoria_aux) { ?>
                    <div class="<?php echo $clase; ?>">
                      <a rel="m_PageScroll2id" href="#tour-<?php echo $categoria_aux->slug; ?>" class="sub-link sub-menu-col-title"><?php echo $categoria_aux->name; ?></a>
                      <ul class="sub-menu text-left">
                        <?php query_posts( array ( 'category_name' => $categoria_aux->slug, 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC' ) ); ?>
                        <?php while (have_posts()) : the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>" class="sub-link"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>
                      </ul>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php else: ?>
              <a rel="m_PageScroll2id" href="#tour-<?php echo $categoria->slug; ?>"><?php echo $categoria->name; ?>
              </a>
              <div class="sub-menu-container">
                <ul class="sub-menu text-left">
                  <?php query_posts( array ( 'category_name' => $categoria->slug, 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC' ) ); ?>
                  <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>" class="sub-link"><?php the_title(); ?></a></li>
                  <?php endwhile; ?>
                </ul>
              </div>
            <?php endif ?>
          </li>
        <?php endforeach ?>
        </ul>
      </div>
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
<section id="quienes-somos" class="no-pad pt-60">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <?php
          $lang = get_locale();
          switch ($lang) {
            case 'es_ES': ?>
              <h1>Quiénes somos</h1><?php
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
            <?php the_post_thumbnail( 'medium', array( 'class' => 'img-responsive center-block team-img' )); ?>
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
  <?php /* $categorias = get_categories( array('slug' => array('tours-en-puno', 'tour-cusco-y-machu-picchu', 'cusco-tradicional', 'tour-machu-picchu', 'tours-de-aventura-en-cusco', 'camino-inca')) ); */ ?>
  <?php $categorias = get_categories( array('exclude_tree' => '1,55', 'orderby' => 'slug', 'order' => 'ASC') ); ?>
  <?php $classes = array('purple', 'green', 'gray'); ?>
  <?php $indice = 0; ?>
  <?php foreach ($categorias as $categoria): ?>
    <?php query_posts( array ( 'category_name' => $categoria->slug, 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC' ) ); ?>
    <section id="tour-<?php echo $categoria->slug; ?>" class="no-pad <?php echo $classes[$indice]; ?>">
      <div class="section-title">
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
                  <div class="tour-thumbnail" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
                  </div>
                <?php endif ?>
                <h4 class="front-post-title"><?php the_title(); ?></h4>
                <div class="text-justify">
                  <?php /* the_excerpt(); */ ?>
                </div>
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="read-more">
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
                <div class="post-meta text-right">
                  <?php the_field('precio'); ?>
                </div>
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
    <?php if ($indice == 2) $indice = 0; else $indice++; ?>
  <?php endforeach ?>
</div>

<?php get_footer(); ?>
