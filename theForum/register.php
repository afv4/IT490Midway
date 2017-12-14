<?php /*
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './'; //the path to your phpbb relative to this script
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include("common.php"); ////the path to your phpbb relative to this script

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup(); */

// Contains the user_add function
require($phpbb_root_path ."includes/functions_user.php");
function addBBuser($username,$password,$email){
  /*
  $request->enable_super_globals();
  session_start();
  $UserName = $_SESSION['UserName'];
  $PassWord = $_SESSION['PassWord'];
  $email = $_SESSION['email'];
  // username of the user being added
  $Rusername = request_var('username', $UserName);
  // the user’s password, which is hashed before inserting into the database
  $Rpassword = request_var('password', $PassWord);
  // an email address for the user
  $Remail = request_var('password', $email);
  $request->disable_super_globals(); */
  $Rusername = $username;
  $Rpassword = $password;
  $Remail    = $email;
  // default is 4 for registered users, or 5 for coppa users.
  $group_id = 4;

  // since group IDs may change, you may want to use a query to make sure you are grabbing the right default group...
  /*$group_name = 'REGISTERED';
  $sql = 'SELECT group_id
          FROM ' . GROUPS_TABLE . "
          WHERE group_name = '" . $db->sql_escape($group_name) . "'
              AND group_type = " . GROUP_SPECIAL;
  $result = $db->sql_query($sql);
  $row = $db->sql_fetchrow($result);
  $group_id = $row['group_id']; */

  // timezone of the user... Based on GMT in the format of '-6', '-4', 3, 9 etc...
  $timezone = '-6';

  // two digit default language for this use of a language pack that is installed on the board.
  $language = 'en';

  // user type, this is USER_INACTIVE, or USER_NORMAL depending on if the user needs to activate himself, or does not.
  // on registration, if the user must click the activation link in their email to activate their account, their account
  // is set to USER_INACTIVE until they are activated. If they are activated instantly, they would be USER_NORMAL
  $user_type = USER_NORMAL;

  // here if the user is inactive and needs to activate thier account through an activation link sent in an email
  // we need to set the activation key for the user... (the goal is to get it about 10 chars of randomization)
  // you can use any randomization method you want, for this example, I’ll use the following...
  #$user_actkey = md5(rand(0, 100) . time());
  #$user_actkey = substr($user_actkey, 0, rand(8, 12));

  // IP address of the user stored in the Database.
  $user_ip = $user->ip;

  // registration time of the user, timestamp format.
  $registration_time = time();

  // inactive reason is the string given in the inactive users list in the ACP.
  // there are four options: INACTIVE_REGISTER, INACTIVE_PROFILE, INACTIVE_MANUAL and INACTIVE_REMIND
  // you do not need this if the user is not going to be inactive
  // more can be read on this in the inactive users section
  #$user_inactive_reason = INACTIVE_REGISTER;

  // time since the user is inactive. timestamp.
  #$user_inactive_time = time();

  // these are just examples and some sample (common) data when creating a new user.
  // you can include any information
  $user_row = array(
      'username'              => $Rusername,
      'user_password'         => phpbb_hash($Rpassword),
      'user_email'            => $Remail,
      'group_id'              => (int) $group_id,
      'user_timezone'         => (float) $timezone,
      'user_lang'             => $language,
      'user_type'             => $user_type,
      'user_ip'               => $user_ip,
      'user_regdate'          => $registration_time,
  );

  // Custom Profile fields, this will be covered in another article.
  // for now this is just a stub
  // all the information has been compiled, add the user
  // the user_add() function will automatically add the user to the correct groups
  // and adding the appropriate database entries for this user...
  // tables affected: users table, profile_fields_data table, groups table, and config table.
  $user_id = user_add($user_row);
  //header('Location: ../index.html')
}

?>
