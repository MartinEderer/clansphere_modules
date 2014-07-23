<?php
// ClanSphere 2010 - www.clansphere.net
// $Id$

$cs_lang = cs_translate('captcha');

$data = array();

require('mods/captcha/functions.php');


$sql['options'] = cs_sql_option(__FILE__,'captcha');


if(!empty($_POST['submit']))
{
  require_once 'mods/clansphere/func_options.php';
  $option['method'] = in_array($_POST['method'], $available_captchas) ? $_POST['method'] : false;
  $option['public_key'] = empty($_POST['public_key']) ? null : $_POST['public_key'];
  $option['private_key'] = empty($_POST['private_key'])? null : $_POST['private_key'];

  if(empty($option['public_key']) OR empty($option['private_key']) OR $option['method'] == false)
  {
    $option['method'] = 'standard';
  }
  cs_optionsave('captcha', $option);
  cs_cache_clear();
}
else
{
  $option = $sql['options'];
}

$data['options']['public_key'] = $option['public_key'];
$data['options']['private_key'] = $option['private_key'];
$data['setted']['standard'] = $option['method'] == 'standard' ? ' selected="selected"' : '';
$data['setted']['recaptcha'] = $option['method'] == 'recaptcha' ? ' selected="selected"' : '';



echo cs_subtemplate(__FILE__,$data,'captcha','options');