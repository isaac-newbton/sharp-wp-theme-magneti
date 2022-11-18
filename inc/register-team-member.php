<?php

function sharp_register_team_member() {
    register_post_type('team_member', [
        'labels'=>[
            'name'=>__('Team Members'),
            'singular_name'=>__('Team Member')
        ],
        'public'=>true,
        'has_archive'=>true,
        'supports' => ['title']
    ]);
}
add_action('init', 'sharp_register_team_member');
