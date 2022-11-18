<?php

get_header();

$hero_banner_logo = get_field('hero_banner_logo');
$hero_banner_title = get_field('hero_banner_title'); //req
$hero_banner_content = get_field('hero_banner_content');
$hero_banner_background = get_field('hero_banner_background'); //req

$team_members = [
    ['object'=>get_field('team_member_1')],
    ['object'=>get_field('team_member_2')],
    ['object'=>get_field('team_member_3')]
]; //req(3)

foreach($team_members as &$m) {
    $m['fields'] = [
        'card_image'=>get_field('card_image', $m['object']->ID),
        'card_subtitle'=>get_field('card_subtitle', $m['object']->ID),
        'card_description'=>get_field('card_description', $m['object']->ID)
    ];
}

$footer_title = get_field('footer_title'); //req
$footer_cta_button_text = get_field('footer_cta_button_text'); //req
$footer_cta_link = get_field('footer_cta_link'); //req
$footer_image = get_field('footer_image');

?>

<header class="hero-banner dark-color" style="background-image: url(<?=$hero_banner_background?>);">
    <div class="hero-banner-overlay"></div>
    <div class="col-container content-width col-2">
        <div class="col content">
            <?php if($hero_banner_logo): ?>
                <?=wp_get_attachment_image($hero_banner_logo['id'], 'full', false, ['class'=>'hero-logo'])?>
            <?php endif; ?>
            <h1 class="hero-title"><?=$hero_banner_title?></h1>
            <?php if($hero_banner_content): ?>
                <div class="hero-copy">
                    <?=$hero_banner_content?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col empty">

        </div>
    </div>
</header>
<section class="team">
    <div class="content-width">
        <h2 class="primary-color">Meet our team</h2>
    </div>
    <div class="col-container content-width col-3">
        <?php foreach($team_members as $t): ?>
            <div class="col">
                <?php get_template_part('template-parts/team-member', 'card', ['t'=>$t]); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<footer id="footer" class="cta-footer dark-color">
    <div class="col-container content-width col-2">
        <div class="col content">
            <h2><?=$footer_title?></h2>
            <a href="<?=$footer_cta_link?>" class="cta-button"><?=$footer_cta_button_text?></a>
        </div>
        <div class="col image">
            <?php if($footer_image): ?>
                <?=wp_get_attachment_image($footer_image['id'], 'full', false, ['class'=>'footer-image'])?>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php

get_footer();