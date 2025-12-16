<?php
 = new mysqli('localhost','root','','slims_smpn2kt',3306);
if(->connect_errno){ echo "DBERR: ".->connect_error; exit(1); }
='smpn2krtd';
='smpn2slimkrtd';
 = password_hash(,PASSWORD_BCRYPT);
 = "UPDATE user SET username='".->real_escape_string()."', passwd='".->real_escape_string()."', realname='".ucfirst()."', last_login=NULL, last_login_ip='127.0.0.1', groups='a:1:{i:0;s:1:\"1\";}', input_date=DATE(NOW()), last_update=DATE(NOW()) WHERE user_id=1";
if(->query()) { echo 'OK'; } else { echo 'ERR: '.->error; }
->close();
?>
