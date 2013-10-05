<?
  require_once("src/facebook.php");
  require_once("conection.php");

  $config = array();
  $config['whowhoID'] = '446634545453831';
  $config['secret'] = '	a5e2d45e69944736853f3fe39449e924';
  $config['fileUpload'] = false; // optional

  $facebook = new Facebook($config);
?>