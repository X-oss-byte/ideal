<?php
/**
 * 
 * blog home countant
 */
if (!defined('ABSPATH')) {
  exit;
}
$ideal_options = get_ideal_theme_options();
$category = get_the_category();
$is_cards = null;
$card     = null;

if ( class_exists( 'ReduxFramework' ) ){
  $is_cards = $ideal_options['add-cards-blog'];

}
if ( !empty($is_cards) && $is_cards == 1) {

  $card = 'uk-card-default' ;
}

?>
<article <?php post_class(); ?> id='article' class="ideal-article uk-article">
  <div class="article-inner-wrap">
    <div class="article-post-content">
      <div>
        <div class="uk-card <?php echo $card ;?>">
          <div class="uk-card-media-top">
            <img src="<?php
                $featured_img_url = get_the_post_thumbnail_url();
                echo esc_url($featured_img_url) ; ?>" alt="">
          </div>
          <div class="uk-card-body">
            <h3 class="uk-article-title"><a class="uk-link-reset" href="<?php the_permalink(); ?>"
                title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <div class="uk-grid-collapse uk-child-width-expand@s" uk-grid>
              <div>
                <p class="uk-article-meta id-post-meta">
                  <span uk-icon="icon: bookmark "></span> <?php echo get_primary_category($category); ?>
                </p>
              </div>
              <div>
                <p class="uk-article-meta id-post-meta">
                  <span uk-icon="icon: calendar "></span>
                  <?php echo  the_time('F d,y') ;?>
                </p>
              </div>
              <div>
                <p class="uk-article-meta id-post-meta">
                  <span uk-icon="icon: comment"></span>
                  <a class="" href="<?php the_permalink(); ?>#comments">
                    <?php comments_number(esc_html__('No Comments','ideal'), esc_html__('One Comment', 'ideal'), esc_html__('% Comments', 'ideal') );?>
                  </a>
                </p>
              </div>
            </div>
            <div class="id-excerpt uk-margin-smal-top">
              <?php  the_excerpt(); ?>
            </div>
            <div class="id-rea-more">
              <a class="uk-button uk-button-text" href="<?php echo esc_url(get_permalink()); ?> ">
                <?php echo esc_html__( 'Read More', 'ideal' ) ; ?> </a>
            </div>
            <div class="uk-card-footer">
              <div class="uk-grid-collapse uk-child-width-1-2" uk-grid>
                <div>
                  <p class="uk-article-meta id-post-meta">
                    <?php echo esc_html__('By','ideal') .': ' ;?><?php the_author_posts_link(); ?>
                  </p>
                </div>
                <div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/article-post-content-->
  </div>
</article>