<div class="profile-card">
    <?=wp_get_attachment_image($args['t']['fields']['card_image']['id'], 'full', false, ['class'=>'profile-image'])?>
    <h3><?=$args['t']['object']->post_title?></h3>
    <div class="subtitle"><?=$args['t']['fields']['card_subtitle']?></div>
    <div class="content"><?=$args['t']['fields']['card_description']?></div>
</div>