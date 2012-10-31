<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/recaptcha/recaptchalib.php';

class Recaptcha
{
    var $private_key = "";
    var $public_key = "";
    var $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->load->config( 'recaptcha' );

        $this->private_key = $this->CI->config->item( 'recaptcha_private_key' );
        $this->public_key = $this->CI->config->item( 'recaptcha_public_key' );
    }

    public function get_html()
    {
        return recaptcha_get_html( $this->public_key );
    }

    public function is_valid()
    {
        $this->CI->load->library( 'input' );

        $resp = recaptcha_check_answer( $this->private_key,
                                        $_SERVER[ "REMOTE_ADDR" ],
                                        $this->CI->input->post( "recaptcha_challenge_field" ),
                                        $this->CI->input->post( "recaptcha_response_field" ) );

        return $resp->is_valid;
    }
}