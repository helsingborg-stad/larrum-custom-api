<?php
/**
 * Plugin Name: Lärrum Custom API
 * Description: Custom API Endpoint for Lärrum
 * Version: 1.0
 * Author: Ronnie Poblete Vergara
*/

// Get post based on Index
function cstm_post_index($index) {
    $args = [
        'offset' => $index['index'],
        'numberposts' => 1,
        'post_type' => 'post',
        'orderby' => 'modified',
        'order' => 'DESC'
    ];
    $posts = get_posts($args);

    $data = [];
    $i = 0;

    foreach($posts as $post) {
        $data[$i]['id'] = $post->ID;
        $data[$i]['slug'] = $post->post_name;
        $data[$i]['category'] = get_the_category($post->ID);
        $data[$i]['custom_title'] = get_field("post_title", $post->ID);
        $data[$i]['custom_headline'] = get_field("post_headline", $post->ID);
        $data[$i]['custom_media'] = get_field("post_media", $post->ID);
        $data[$i]['custom_long'] = get_field("post_long", $post->ID);
        $data[$i]['custom_lat'] = get_field("post_lat", $post->ID);
        $data[$i]['custom_placeholder'] = get_field("post_placeholder", $post->ID);
        $data[$i]['custom_story_url'] = get_field("post_story_url", $post->ID);
        $data[$i]['custom_primary_color'] = get_field("post_primary_color", $post->ID);
        $i++;
    }

    return $data;
}

// Get all posts
function cstm_posts() {
    $args = [
        'numberposts' => 10000,
        'post_type' => 'post',
        'orderby' => 'modified',
        'order' => 'DESC'
    ];
    $posts = get_posts($args);

    $data = [];
    $i = 0;

    foreach($posts as $post) {
        $data[$i]['id'] = $post->ID;
        $data[$i]['slug'] = $post->post_name;
        $data[$i]['category'] = get_the_category($post->ID);
        $data[$i]['custom_title'] = get_field("post_title", $post->ID);
        $data[$i]['custom_headline'] = get_field("post_headline", $post->ID);
        $data[$i]['custom_media'] = get_field("post_media", $post->ID);
        $data[$i]['custom_long'] = get_field("post_long", $post->ID);
        $data[$i]['custom_lat'] = get_field("post_lat", $post->ID);
        $data[$i]['custom_placeholder'] = get_field("post_placeholder", $post->ID);
        $data[$i]['custom_story_url'] = get_field("post_story_url", $post->ID);
        $data[$i]['custom_primary_color'] = get_field("post_primary_color", $post->ID);
        $i++;
    }

    return $data;
}
// Get post based on slug
function cstm_post($slug) {
    $args = [
        'numberposts' => 10000,
        'name' => $slug['slug'],
        'post_type' => 'post'
    ];

    $post = get_posts($args);
    $data['id'] = $post[0]->ID;
    $data['slug'] = $post[0]->post_name;
    $data['category'] = get_the_category($post[0]->ID);
    $data['custom_title'] = get_field("post_title", $post[0]->ID);
    $data['custom_headline'] = get_field("post_headline", $post[0]->ID);
    $data['custom_media'] = get_field("post_media", $post[0]->ID);
    $data['custom_long'] = get_field("post_long", $post[0]->ID);
    $data['custom_lat'] = get_field("post_lat", $post[0]->ID);
    $data['custom_placeholder'] = get_field("post_placeholder", $post[0]->ID);
    $data['custom_story_url'] = get_field("post_story_url", $post[0]->ID);
    $data['custom_primary_color'] = get_field("post_primary_color", $post[0]->ID);

    return $data;
}

add_action('rest_api_init', function() {
    register_rest_route('cstm/v1', 'posts', [
        'methods' => 'GET',
        'callback' => 'cstm_posts',
    ]);

    register_rest_route('cstm/v1', 'posts/(?P<slug>[a-zA-Z0-9-]+)', [
        'methods' => 'GET',
        'callback' => 'cstm_post',
    ]);

    register_rest_route('cstm/v1', 'index/(?P<index>[0-9-]+)', [
        'methods' => 'GET',
        'callback' => 'cstm_post_index',
    ]);
});
