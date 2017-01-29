<section id="contacto">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <?php if (is_front_page()): ?>
          <h3>Peru Terra Expeditions</h3>
          <?php query_posts(array('page_id' => 108)); ?>
          <?php the_post(); ?>
          <?php the_content(); ?>
          <?php wp_reset_query(); ?>
        <?php endif ?>
        <div class="social-icons">
          <?php dynamic_sidebar( 'social-icons' ); ?>
        </div>
        <div class="payment-icons">
          <ul class="list-inline">
            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Western.png" alt="Logo Western Union"></li>
            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/PayPal.png" alt="Logo PayPal"></li>
            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/BCP.png" alt="Logo BCP"></li>
            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/interbank.jpg" alt="Logo Interbank"></li>
            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/visa-master.png" alt="Logos Visa & Mastercard"></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-5">
        <?php query_posts(array('page_id' => 111)); ?>
        <?php the_post(); ?>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
        <?php wp_reset_query(); ?>
        <?php if (is_front_page()): ?>
          <form>
            <?php echo do_shortcode('[contact-form-7 id="110" title="Contacto"]'); ?>
          </form>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>
