<?php
/**
 * The template used for displaying content in index.php
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6'); ?>>
    <div class="card-post">
    	<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
    	<div class="post-content">
            <p class="taxonomy-item">
              <label for="output"><i class="fas fa-dollar-sign"></i><?php esc_html_e('Стоимость','unite' ); ?></label>
              <output name="result" id="output"><?php the_field('session_cost'); ?></output>
            </p>
            <p class="taxonomy-item">
              <label for="output"><i class="far fa-calendar-check"></i><?php esc_html_e('Дата выхода','unite' ); ?></label>
              <output name="result" id="output" ><?php the_field('release_date'); ?></output>
            </p>
            <h3 class="font-weight-bold"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
    		<?php the_excerpt(); ?>
     	</div>
    </div>
    <div class="film-taxonomy">
        <p class="taxonomy-item">
            <span><i class="fas fa-theater-masks"></i><?php esc_html_e('Жанр','unite' ); ?></span>
            <?php echo genre_taxonomy(); ?>
        </p>
        <p class="taxonomy-item">
                <span><i class="fas fa-globe"></i><?php esc_html_e('Страна','unite' ); ?></span>
                <?php echo country_taxonomy(); ?>
        </p>
    </div>

</article>
