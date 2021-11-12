<?php

function wfga_dispatch() {
    $data = "'{" . '"event_type": "' . esc_attr(get_option('github_event_type')) . '"}' . "'";
    $url = 'https://api.github.com/repos/' . esc_attr(get_option('github_account')) . '/' . esc_attr(get_option('github_repository')) . '/dispatches';
    $token = esc_attr(get_option('github_token'));

    exec("curl -H \"Authorization: token ${token}\" -H \"Accept: application/vnd.github.everest-preview+json\" \"${url}\" -d ${data}");
}

add_action('trashed_post', 'wfga_dispatch', 10, 0);
add_action('save_post', 'wfga_dispatch', 10, 0);
