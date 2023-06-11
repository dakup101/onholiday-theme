<?php
function process_payment() {
    // Get form data
    $name = sanitize_text_field( $_POST['name'] );
    $email = sanitize_email( $_POST['email'] );
    $amount = floatval( $_POST['amount'] );
  
    // Validate form data (add your own validation logic here)
    if ( empty( $name ) || empty( $email ) || empty( $amount ) ) {
      wp_redirect( home_url( '/payment-failed' ) );
      exit;
    }
  
    // Prepare data for Przelewy24 request
    $data = array(
      'p24_merchant_id' => 'YOUR_MERCHANT_ID',
      'p24_pos_id' => 'YOUR_POS_ID',
      'p24_session_id' => uniqid(),
      'p24_amount' => $amount * 100, // Amount in groszy (1 PLN = 100 groszy)
      'p24_currency' => 'PLN',
      'p24_description' => 'Payment for ' . $name,
      'p24_email' => $email,
      'p24_url_return' => home_url( '/thank-you' ),
      'p24_url_status' => admin_url( 'admin-post.php?action=handle_payment_status' )
    );
  
    // Generate checksum
    $data['p24_sign'] = md5( implode( '|', $data ) . '|YOUR_CRC_KEY' );
  
    // Redirect to Przelewy24 payment gateway (sandbox)
    wp_redirect( 'https://sandbox.przelewy24.pl/trnRequest', $data );
    exit;
  }
  add_action( 'admin_post_nopriv_process_payment', 'process_payment' );
  add_action( 'admin_post_process_payment', 'process_payment' );
  
  function handle_payment_status() {
    // Handle Przelewy24 payment status
    // Add your logic here to verify payment status and update the database if needed
  
    // Example code to retrieve payment status from Przelewy24 response
    $status = sanitize_text_field( $_POST['p24_status'] );
  
    if ( $status == 'success' ) {
      wp_redirect( home_url( '/thank-you' ) );
    } else {
      wp_redirect( home_url( '/payment-failed' ) );
    }
    exit;
  }
  
  add_action( 'admin_post_nopriv_handle_payment_status', 'handle_payment_status' );
  add_action( 'admin_post_handle_payment_status', 'handle_payment_status' );