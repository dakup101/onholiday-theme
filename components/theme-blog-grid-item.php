<article class="blog-grid-item">
    <figure class="blog-grid-item-img">
        <a href="<?php echo get_the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>">
        </a>
        <div class="overlay"></div>
    </figure>
    <main class="blog-grid-item-content">
        <h3 class="blog-grid-item-title">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php echo get_the_title(); ?>
            </a>
        </h3>
        <p class="blog-grid-item-text">
            <?php echo substr(get_the_excerpt(), 0, 100) . "..."; ?>
        </p>
        <a href="<?php echo get_the_permalink() ?>" class="blog-grid-item-link">
            <?php echo __("Czytaj więcej", "oh-theme") ?>
        </a>
    </main>
</article>