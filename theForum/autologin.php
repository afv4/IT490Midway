<?php
    define('IN_PHPBB', true);
    $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './'; //the path to your phpbb relative to this script
    $phpEx = substr(strrchr(__FILE__, '.'), 1);
    include("common.php"); ////the path to your phpbb relative to this script

    // Start session management
    $user->session_begin();
    $auth->acl($user->data);
    $user->setup();

    $request->enable_super_globals();
    session_start();

    $UName = $_SESSION['UName'];
    $PWord = $_SESSION['PWord'];

    $username = request_var('username', $UName);
    $password = request_var('password', $PWord);

    $request->disable_super_globals();

    if(isset($username) && isset($password))
    {
      $result=$auth->login($username, $password, true);
      if ($result['status'] == LOGIN_SUCCESS) {
        redirect(append_sid("{$phpbb_root_path}index.$phpEx"));
      } else {
        #redirect(append_sid("{$phpbb_root_path}index.$phpEx"));
        echo $user->lang[$result['error_msg']];
      }
    }
?>
