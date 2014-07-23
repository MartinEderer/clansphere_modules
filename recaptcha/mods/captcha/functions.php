<?php
// ClanSphere 2010 - www.clansphere.net
// $Id$

global $available_captchas, $captcha_option;
$captcha_option['options'] = cs_sql_option(__FILE__,'captcha');
$available_captchas = array(
    'standard',
    'recaptcha'
);

function cs_captchashow($mini = 0)
{
    global $cs_main,$captcha_option;
    if(check_captcha_methode() == 'recaptcha')
    {
        require_once('recaptchalib.php');
        $error = isset($cs_main['captcha_error']) ? $cs_main['captcha_error'] : '';
        return recaptcha_get_html($captcha_option['options']['public_key'], $error);
    }
    else
    {
        $mini = $mini != 0 ? '&mini' : '';
        $data['captcha']['img'] = cs_html_img('mods/captcha/generate.php?time=' . cs_time().$mini);
        $data['captcha']['size'] = empty($mini) ? 8 : 3;
        return cs_subtemplate(__FILE__,$data,'captcha','captcha');
    }
}

function cs_captchaverify($mini = 0)
{
    global $cs_main,$captcha_option;
    if(check_captcha_methode() == 'recaptcha')
    {
        require_once('recaptchalib.php');
        if (isset($_POST["recaptcha_response_field"])) {
            $resp = recaptcha_check_answer ($captcha_option['options']['private_key'],
                $_SERVER["REMOTE_ADDR"],
                $_POST["recaptcha_challenge_field"],
                $_POST["recaptcha_response_field"]);

            if ($resp->is_valid) {
                return true;
            } else {
                # set the error code so that we can display it
                $cs_main['captcha_error'] = $resp->error;
                return false;
            }
        }
    }
    else
    {
        return cs_captchacheck($_POST['captcha'], $mini);
    }
}

function check_captcha_methode()
{
    global $captcha_option;
    cs_cache_clear();
    if($captcha_option['options']['method'] == 'recaptcha' AND !empty($captcha_option['options']['private_key']) AND !empty($captcha_option['options']['public_key']))
    {
        $return = 'recaptcha';
    }
    else
    {
        $return = 'standard';
    }
    return $return;
}