<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Captcha_controller extends CI_Controller {
    /* Initialize the controller by calling the necessary helpers and libraries */

    public function __construct() {
        parent::__construct();
        /* Load the libraries and helpers */
    }

    /* The default function that gets called when visiting the page */

    public function index() {

        session_start(); // Staring Session
        $captchanumber = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; // Initializing PHP variable with string
        $captchanumber = substr(str_shuffle($captchanumber), 0, 6); // Getting first 6 word after shuffle.
        $_SESSION["code"] = $captchanumber; // Initializing session variable with above generated sub-string
        $image = imagecreatefromjpeg("bj.jpg"); // Generating CAPTCHA
        $foreground = imagecolorallocate($image, 175, 199, 200); // Font Color
        imagestring($image, 5, 45, 8, $captchanumber, $foreground);
        header('Content-type: image/png');
        imagepng($image);
        
    }

}

/* End of file captcha.php */
/* Location: ./application/controllers/captcha.php */