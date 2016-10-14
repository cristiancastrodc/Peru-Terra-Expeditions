<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<section id="top-widgets">
<?php if (dynamic_sidebar( 'social-icons' )): else: endif; ?>
<?php if (dynamic_sidebar( 'lang-area' )): else: endif; ?>  
</section>


<?php masterslider(1); ?>

<nav id="tours-menu">
  <div class="row">
    <div class="col-sm-12">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'tours_menu'
        ));
      ?>
    </div>
  </div>
</nav>

<section id="quienes-somos">
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
    <?php query_posts(array('category__and' => array(13, 15), 'posts_per_page' => 3)); ?>
    <?php while (have_posts()): the_post(); ?>
      <div class="col-sm-6 col-md-4">
        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail('', array( 'class' => 'img-responsive center-block team-img' )); ?>
        <?php endif ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
  </div>
  <div class="row">
    <div class="col-sm-12 text-center">
      <?php query_posts(array('page_id' => 30)); ?>
      <?php the_post(); ?>
      <?php the_content(); ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>

<section id="que-hacemos"></section>
<section id="tours"></section>
<section id="contacto"></section>



<!-- start content container -->
<div class="row dmbs-content">

    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">

        <?php

            //if this was a search we display a page header with the results count. If there were no results we display the search form.
            if (is_search()) :

                 $total_results = $wp_query->found_posts;

                 echo "<h2 class='page-header'>" . sprintf( __('%s Search Results for "%s"','devdmbootstrap3'),  $total_results, get_search_query() ) . "</h2>";

                 if ($total_results == 0) :
                     get_search_form(true);
                 endif;

            endif;

        ?>

            <?php // theloop
                if ( have_posts() ) : while ( have_posts() ) : the_post();

                    // single post
                    if ( is_single() ) : ?>

                        <div <?php post_class(); ?>>

                            <h2 class="page-header"><?php the_title() ;?></h2>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail(); ?>
                                <div class="clear"></div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                            <?php get_template_part('template-part', 'postmeta'); ?>
                            <?php comments_template(); ?>

                        </div>
                    <?php
                    // list of posts
                    else : ?>
                       <div <?php post_class(); ?>>

                            <h2 class="page-header">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>

                            <?php if ( has_post_thumbnail() ) : ?>
                               <?php the_post_thumbnail(); ?>
                                <div class="clear"></div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                            <?php get_template_part('template-part', 'postmeta'); ?>
                            <?php  if ( comments_open() ) : ?>
                                   <div class="clear"></div>
                                  <p class="text-right">
                                      <a class="btn btn-success" href="<?php the_permalink(); ?>#comments"><?php comments_number(__('Leave a Comment','devdmbootstrap3'), __('One Comment','devdmbootstrap3'), '%' . __(' Comments','devdmbootstrap3') );?> <span class="glyphicon glyphicon-comment"></span></a>
                                  </p>
                            <?php endif; ?>
                       </div>

                     <?php  endif; ?>

                <?php endwhile; ?>
                <?php posts_nav_link(); ?>
                <?php else: ?>

                    <?php get_404_template(); ?>

            <?php endif; ?>

   </div>

   <?php //get the right sidebar ?>
   <?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>

