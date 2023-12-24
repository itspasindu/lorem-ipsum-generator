<?php
/*
Plugin Name: Lorem Ipsum Generator
Description: A simple Lorem Ipsum text generator for WordPress.
Version: 1.0
Author: Pasindu Dewviman
*/

function lorum_ipsum_generator_shortcode($atts) {
    // Shortcode attributes
    $atts = shortcode_atts(
        array(
            'length' => 100, // Default length of Lorem Ipsum text
        ),
        $atts,
        'lorum-ipsum'
    );

    // Generate Lorem Ipsum text
    $lorum_ipsum_text = lorem_ipsum_generator($atts['length']);

    return '<p>' . $lorum_ipsum_text . '</p>';
}

function lorem_ipsum_generator($length) {
    // Standard Lorem Ipsum text
    $lorum_ipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

    // Repeat Lorem Ipsum text to achieve desired length
    $lorum_ipsum_text = implode(' ', array_fill(0, $length / str_word_count($lorum_ipsum), $lorum_ipsum));

    // Trim to the exact desired length
    $lorum_ipsum_text = substr($lorum_ipsum_text, 0, $length);

    return $lorum_ipsum_text;
}

// Register the shortcode
add_shortcode('lorum-ipsum', 'lorum_ipsum_generator_shortcode');
?>
