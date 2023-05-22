<?php $blog_grid = wp_parse_args($args, array(
    "title" => "I am title!",
    "subtitle" => "I am subtitle",
    "text" => "I am content.",
    "btn_link" => "#",
    "btn_text" => "Wanna see more?",
)) ?>

<section class="blog-grid"
         id="<?php echo !empty(get_field("section_blog_grid_id")) ? get_field("section_blog_grid_id") : "" ?>">
    <div class="container blog-grid-desc">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => $blog_grid["title"],
            "subtitle" => $blog_grid["subtitle"],
            "class" => "font-alt"
        )) ?>
        <div class="blog-grid-desc-text">
            <?php echo $blog_grid["text"] ?>
        </div>
    </div>
    <?php
    $args = array(
        "post_type" => "post",
        "posts_per_page" => 4,
        "paged" => 1,
    );

    if (!empty(get_field("selected_blog_posts"))) {
        $args["post__in"] = array();
        foreach (get_field("selected_blog_posts") as $key => $value) {
            $args["post__in"][] = $value["id"];
        }
    }

    $blog = new WP_Query($args);
    if ($blog->have_posts()) :
    ?>
    <div class="container blog-grid-inner">
        <?php while ($blog->have_posts()) : $blog->the_post(); ?>
        <?php get_template_part(THEME_CMP, "blog-grid-item") ?>
        <?php endwhile; ?>
    </div>
    <?php endif;
    wp_reset_postdata(); ?>
    <?php get_template_part(THEME_CMP_CMN, "btn", array(
        "link" => $blog_grid["btn_link"],
        "text" => $blog_grid["btn_text"],
        "class" => "btn-content",
        "type" => "accent",
    )) ?>
</section>