<?php get_header();
?>

    <!--CONTENT-->
    <article class="error-page">

        <div class="container">
            <div class="search-result">
                <ul>
                    <?php
                    $s=get_search_query();
                    $args = array(
                        's' =>$s
                    );
                    // The Query
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) {
                        _e("<h2 class='search-result__title'>Search Results for: ".get_query_var('s')."</h2>");
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            ?>
                            <li>
                                <?php the_post_thumbnail('mk-medium'); ?>
                                <a class="search-result__name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div>
                                    <a class="search-result__btn" href="<?php the_permalink(); ?>">Czytaj dalej</a>
                                </div>

                            </li>
                            <?php
                        }
                    }else{
                        ?>
                        <div class="alert alert-info">
                            <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
                        </div>
                    <?php } ?>
                </ul>


            </div>
        </div>
    </article>
    <!--END CONTENT-->




<?php get_footer(); ?>
