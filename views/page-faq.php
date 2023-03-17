<?php // Template Name: FAQ
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => "Dowiesz się o wszystkim!",
            "alignment" => "center",
            "tag" => "h1",
            "class" => "font-alt"
        )) ?>
    </div>
</section>

<section>
    <div class="container">
        <div class="faq">
            <?php foreach (get_field("faq") as $faq) : ?>
                <div class="faq-item">
                    <button class="faq-title">
                        <figure class="faq-icon">
                            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="m11 11h-7.25c-.414 0-.75.336-.75.75s.336.75.75.75h7.25v7.25c0 .414.336.75.75.75s.75-.336.75-.75v-7.25h7.25c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-7.25v-7.25c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero" />
                            </svg>
                        </figure>
                        <span>
                            <?php echo $faq["title"]; ?>
                        </span>
                    </button>
                    <div class="faq-content">
                        <div class="faq-content-inner">
                            <?php echo $faq["content"] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>
<?php get_footer(); ?>