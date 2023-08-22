<?php 
// Update user data
if (isset($_POST['update_user'])) {
    // Pobierz przesłane wartości formularza
    $user_email = isset($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
    $user_firstname = isset($_POST['user_firstname']) ? sanitize_text_field($_POST['user_firstname']) : '';
    $user_lastname = isset($_POST['user_lastname']) ? sanitize_text_field($_POST['user_lastname']) : '';
    $user_password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // Walidacja pól wymaganych
    $validation_errors = array();
    if (empty($user_email)) {
        $validation_errors[] = 'Email field is required.';
    }
    if (email_exists($user_email)) {
        $errors[] = 'Email address is already registered.';
    }
    if ($user_password !== $confirm_password) {
        $validation_errors[] = 'Passwords do not match.';
    }

    // Jeżeli nie ma błędów, wykonaj logikę aktualizacji użytkownika
    if (empty($validation_errors)) {

    	$user_id = get_current_user_id();
        $user_data = array(
            'ID' => $user_id,
            'user_email' => $user_email,
            'first_name' => $user_firstname,
            'last_name' => $user_lastname
        );

        wp_update_user($user_data);
        // set user pass
        if (!empty($user_password)) {
            wp_set_password($user_password, $user_id);
        }

        $redirect_url = get_permalink(77);
        wp_redirect( $redirect_url );
        exit;
    }
}
