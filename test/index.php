<?php
/**
 * Index
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<div class="row columns">
    <!-- BEGIN of main content -->
    <main class="main-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <!-- BEGIN of Post -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class=" columns">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="<?php echo has_post_thumbnail() ? 'has-img' : ''; ?> columns">
                        <h3>
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'vk'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <?php if (is_sticky()) : ?>
                            <span class="secondary label"><?php _e('Sticky', 'vk'); ?></span>
                        <?php endif; ?>
                        <?php the_excerpt(); // Use wp_trim_words() instead if you need specific number of words ?>

                        <p class="entry-meta">Written by <?php the_author_posts_link(); ?> on <?php the_time(get_option('date_format')); ?></p>
                    </div>
                </article>
                <!-- END of Post -->
            <?php endwhile; ?>
        <?php endif; ?>
        
    </main>
    
</div>

<?php get_footer(); ?>