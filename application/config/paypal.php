<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Paypal library configuration
// ------------------------------------------------------------------------

// PayPal environment, Sandbox or Live
$config['sandbox'] = TRUE; // FALSE for live environment

// PayPal business email
$config['business'] = 'sb-epyjv825317@business.example.com';
//$config['business'] = 'realdate.aix@gmail.com';

// What is the default currency?
$config['paypal_lib_currency_code'] = 'EUR';

// Where is the button located at?
$config['paypal_lib_button_path'] = 'assets/images/';

// If (and where) to log ipn response in a file
$config['paypal_lib_ipn_log'] = TRUE;
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';

