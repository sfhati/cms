<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

/* * *********Install template*********************** */
if ($_SESSION['IDUSER_ADMIN']) {
    AddPluginTemplate('member', 'login_form');
    AddPluginTemplate('member', 'register_form');
    AddPluginTemplate('member', 'reset_password_form');
    AddPluginTemplate('member', 'login');
    AddPluginTemplate('member', 'login_welcome');
    if ($savesettmem) {
        set_cache('msg_name_alredy_register', $msg_name_alredy_register);
        set_cache('msg_email_alredy_register', $msg_email_alredy_register);
        set_cache('msg_must_fill_name', $msg_must_fill_name);
        set_cache('msg_must_fill_pass', $msg_must_fill_pass);
        set_cache('msg_must_fill_valid_email', $msg_must_fill_valid_email);
        set_cache('msg_register_done', $msg_register_done);
        set_cache('subject email active your account', $subject_email_active_your_account);
        set_cache('content email active your account', $content_email_active_your_account);
        set_cache('invaled_password', $invaled_password);
        set_cache('changed_password_done', $changed_password_done);
        set_cache('changed_image_done', $changed_image_done);
        set_cache('image_file_invaled', $image_file_invaled);
        set_cache('Active_user_message', $Active_user_message);
        set_cache('After_Active_user_message', $After_Active_user_message);
        set_cache('changed_information_done', $changed_information_done);
        set_cache('send_by_email_information_done', $send_by_email_information_done);
        set_cache('email_not_in_our_data', $email_not_in_our_data);
        set_cache('user_not_active', $user_not_active);
        set_cache('login_error', $login_error);
        set_cache('you_are_login_alredy', $you_are_login_alredy);
    }

    if ($p == 'member') {
        if ($delete_member) {
            if ($delete_member == 1) {
                echo CHNG_LANGUAGE("<script> $('#info').html('[sorry u cant do this action]');</script>");
            } else {
                mysql_query("Delete from `members` where id=$delete_member");
            }
            exit();
        }
        if ($member_act) {
            if ($member_act == 1) {
                echo CHNG_LANGUAGE("[sorry u cant do this action]");
            } else {
                $row_active = mysql_fetch_array(mysql_query("select active,name from members where id=$member_act"));
                $member_acti = ($row_active[0] == 1) ? 0 : 1;
                $memberacti = ($row_active[0] == 1) ? '[not active]' : '[active]';
                mysql_query("UPDATE `members` set active='$member_acti' where id=$member_act");
                echo CHNG_LANGUAGE("[member] $row_active[1] [is now as] $memberacti");
            }

            exit();
        }
        if ($member_typ && $member_typ != 1) {
            $row_active = mysql_fetch_array(mysql_query("select type,name from members where id=$member_typ"));
            if ($row_active[0] == 1) {
                $member_acti = 4;
                $memberacti = '[moderator]';
            } else
            if ($row_active[0] == 4) {
                $member_acti = 2;
                $memberacti = '[user]';
            } else
            if ($row_active[0] == 2) {
                $member_acti = 1;
                $memberacti = '[admin]';
            }
            mysql_query("UPDATE `members` set type='$member_acti' where id=$member_typ");
            echo CHNG_LANGUAGE("[member] $row_active[1] [is now as] $memberacti");
            exit();
        }


// change information
        if ($idmemupdate) {
            $submit_mem = '';
            $Edit = '';
            if (!$_SESSION['IDUSER_ADMIN'])
                $idmemupdate = $_SESSION[USER_ID];
            if (mysql_num_rows(mysql_query("select * from `members` where name='$user' and id != $idmemupdate "))) {
                $_MSGTITLE = "Error";
                $_MSG = get_cache("msg_name_alredy_register");
            } else if (mysql_num_rows(mysql_query("select * from `members` where email='$email'  and id != $idmemupdate "))) {
                $_MSGTITLE = "Error";
                $_MSG = get_cache("msg_email_alredy_register");
            } else {
                if ($user)
                    $_reg_2 = 1;
                else
                    $_MSG = get_cache("msg_must_fill_name");
                if ($pass)
                    $_reg_3 = 1;
                else
                    $_MSG = get_cache("msg_must_fill_pass");
                if ($email)
                    $_reg_4 = 1;
                else
                    $_MSG = get_cache("msg_must_fill_valid_email");
                if ($_reg_2 && $_reg_3 && $_reg_4) {
                    $res_mem = mysql_query("SHOW COLUMNS FROM `members`");
                    while ($field_mem = mysql_fetch_array($res_mem, MYSQL_BOTH)) {
                        switch ($field_mem[0]) {
                            case "id":
                            case "created_date":
                            case "last_update":
                                break;
                            case "name":
                                $SQL_MEM.="`" . $field_mem[0] . "` = '" . $user . "',";
                                break;
                            case "type":
                                if ($_SESSION['IDUSER_ADMIN']) {
                                    $SQL_MEM.="`" . $field_mem[0] . "` = '" . $$field_mem[0] . "',";
                                } else {
                                    $SQL_MEM.="`" . $field_mem[0] . "` = '2',";
                                }
                                break;
                            case "active":
                                if ($_SESSION['IDUSER_ADMIN']) {
                                    $SQL_MEM.="`" . $field_mem[0] . "` = '" . $$field_mem[0] . "',";
                                } else {
                                    $SQL_MEM.="`" . $field_mem[0] . "` = '0',";
                                }
                                break;
                            default:
                                $SQL_MEM.="`" . $field_mem[0] . "` = '" . $$field_mem[0] . "',";
                        }
                    }

                    mysql_query("UPDATE `members` SET  $SQL_MEM `last_update`='" . time() . "' where id = $idmemupdate limit 1");
                    $_MSG = get_cache("changed_information_done");
                    $_MSGTITLE = "Success";
                }
            }
        }



        if ($Edit) {
            $row_edit = mysql_fetch_array(mysql_query("select * from members where id=$Edit"));
            $res_mem = mysql_query("SHOW COLUMNS FROM `members`");
            while ($field_mem = mysql_fetch_array($res_mem, MYSQL_BOTH)) {
                $x = 'mem_' . $field_mem[0];
                $$x = $row_edit[$field_mem[0]];
                $x = 'select_' . $field_mem[0] . '_' . $row_edit[$field_mem[0]];
                $$x = "selected='selected'";
                $x = 'check_' . $field_mem[0] . '_' . $row_edit[$field_mem[0]];
                $$x = 'checked="checked"';
            }
        }
    }
}
/* * ********************************************** */

/* Save setiings */
// session timeout
ini_set('session.gc_maxlifetime', '2592000');

if ($active_user) {
    $auther_id = mysql_fetch_array(mysql_query("select * from `members` where MD5(email)='$active_user'"));
    if ($auther_id['active'] == 1) {
        $_MSG = get_cache('Active_user_message');
    } else {
        mysql_query("UPDATE `members` SET  active = 1 where MD5(email)='$active_user'");
        mysql_query("UPDATE `" . REF_TABLE . "table2` SET bool1=1 where type=$auther_id[0] and md5='comment' limit 1");
        $_MSG = get_cache('After_Active_user_message');
    }
}
/* * **************Validation ajax *************** */
if ($validateId) {
    $arrayToJs = array();
    $arrayToJs[0] = $validateId;
    $arrayToJs[1] = $validateError;
    if ($validateId == "user" || $validateId == "email") { // name of your input ajax
        if (mysql_num_rows(mysql_query("select * from `members` where name='$validateValue' or email='$validateValue'", $link))) {
            $arrayToJs[2] = "false";   // RETURN TRUE
        } else {
            $arrayToJs[2] = "true";
        }
    }
    echo '{"jsonValidateReturn":' . json_encode($arrayToJs) . '}';   // RETURN ARRAY WITH success
    exit();
}

/* kick out user */
if ($_SESSION['INFO_USER']['active'] == 0 && $_SESSION['INFO_USER']['id']) {
    session_destroy();
    exit();
}

// moderator active deavtive users
if ($act_mem && $_SESSION[MODERATOR]) {
    $user_memx = mysql_fetch_array(mysql_query("select * from `members` where `id` =$act_mem LIMIT 1 ;"));
    if ($user_memx[active])
        $act_i = 0;
    else
        $act_i = 1;
    mysql_query("UPDATE `members` SET  active = $act_i where id='$act_mem'");
}

/* show avatar user */
if ($prsonal_img1) {
    $content = mysql_fetch_array(mysql_query("Select * From members where id=$prsonal_img1"));
    if (!$content[file]) {
        $filename = UPLOADED_PATH . "guest.jpg";
        $handle = fopen($filename, "r");
        $content[file] = fread($handle, filesize($filename));
        fclose($handle);
    }
    header("Content-Type: image/gif");
    echo $content[file];
    exit();
}

//update
// change password
if ($save_new_pass) {
    if (!mysql_num_rows(mysql_query("select * from `members` where pass='$password' and id = $_SESSION[USER_ID]", $link)))
        $_MSG = get_cache("invaled_password");
    else {
        mysql_query("UPDATE `members` SET  pass='$new_password', `last_update`='" . time() . "' where id = $_SESSION[USER_ID] limit 1", $link);
        $_MSG = get_cache("changed_password_done");
    }
}
// change image
if ($save_new_img) {
    $image1 = addslashes(fread(fopen($_FILES['user_image']['tmp_name'], 'r'), filesize($_FILES['user_image']['tmp_name'])));
    if (strpos($_FILES['user_image']['type'], "image") !== false && $_FILES['user_image']['size'] < 1000000) {
        mysql_query("UPDATE `members` SET  file='$image1', `last_update`='" . time() . "' where id = $_SESSION[USER_ID] limit 1", $link);
        $_MSG = get_cache("changed_image_done");
    } else
        $_MSG = get_cache("image_file_invaled");
}

#member area
/* forget password */

if ($forget) {
    if ($forget == 1)
        $SQL_forget = "select * from `members` where id='1' and type='1' limit 1";
    else
        $SQL_forget = "select * from `members` where (name='$forget' or email='$forget') and (type='1' or type='2') limit 1";
    if (mysql_num_rows(mysql_query($SQL_forget, $link))) {
        $f_mem = mysql_fetch_array(mysql_query($SQL_forget, $link));
        $IF_ENDIF["user forget msg"] = 1;
        $x = $_REQUEST[forget_tmplt];
        if (!$x)
            $x = 'you user name: %forget_name% <br> password: %forget_pass% <br> URL: ' . SITE_LINK . 'admin/';
        if (!$forget_subject)
            $forget_subject = 'Your account information';
        foreach ($f_mem as $forget_k => $forget_v) {
            $x = str_replace('%forget_' . $forget_k . '%', $forget_v, $x);
        }
        
        //send_email($f_mem[email], $f_mem[name], $forget_subject, $x);
        $_MSG = get_cache("send_by_email_information_done");
    } else {
        $_MSG = get_cache("email_not_in_our_data");
    }
    if ($adminxc)
        header('Location: ' . SITE_LINK . 'admin/?sendm=' . $f_mem[email]);
}

/* * ***************logout********************* */
if ($out) {
    if ($_SESSION['INFO_USER']['type'] == 1)
        $msd = "admin/";
    session_unset();
    session_destroy();

    header('Location: ' . $_SERVER[HTTP_REFERER]);
    exit();
}

/* * ******************register*************** */
if ($submit_mem) {

    if (mysql_num_rows(mysql_query("select * from `members` where name='$user'", $link))) {
        $_MSGTITLE = "Error";
        $_MSG = get_cache("msg_name_alredy_register");
    } else if (mysql_num_rows(mysql_query("select * from `members` where email='$email'", $link))) {
        $_MSGTITLE = "Error";
        $_MSG = get_cache("msg_email_alredy_register");
    } else {
        if ($user)
            $_reg_2 = 1;
        else
            $_MSG = get_cache("msg_must_fill_name");
        if ($pass)
            $_reg_3 = 1;
        else
            $_MSG = get_cache("msg_must_fill_pass");
        if ($email)
            $_reg_4 = 1;
        else
            $_MSG = get_cache("msg_must_fill_valid_email");
        if ($_reg_2 && $_reg_3 && $_reg_4) {
            $res_mem = mysql_query("SHOW COLUMNS FROM `members`");
            while ($field_mem = mysql_fetch_array($res_mem, MYSQL_BOTH)) {
                switch ($field_mem[0]) {
                    case "id":
                    case "created_date":
                        break;
                    case "name":
                        $SQL_MEM.="`" . $field_mem[0] . "` = '" . $user . "',";
                        break;
                    case "type":
                        if ($_SESSION['IDUSER_ADMIN']) {
                            $SQL_MEM.="`" . $field_mem[0] . "` = '" . $$field_mem[0] . "',";
                        } else {
                            $SQL_MEM.="`" . $field_mem[0] . "` = '2',";
                        }
                        break;
                    case "active":
                        if ($_SESSION['IDUSER_ADMIN']) {
                            $SQL_MEM.="`" . $field_mem[0] . "` = '" . $$field_mem[0] . "',";
                        } else {
                            $SQL_MEM.="`" . $field_mem[0] . "` = '0',";
                        }
                        break;
                    default:
                        $SQL_MEM.="`" . $field_mem[0] . "` = '" . $$field_mem[0] . "',";
                }
            }
            mysql_query("INSERT INTO `members` SET  $SQL_MEM `created_date`='" . time() . "'");
            //send_email($email, $user, get_cache("subject email active your account") . ' ' . SITE_NAME, str_replace('((link))', SITE_LINK . "?active_user=" . md5($email), get_cache('content email active your account')));
            $_MSGTITLE = "Success";
            $_MSG = get_cache("msg_register_done");
        }
    }
}

/* * ***************login************* */
if ($submit_lgn) {
    if (mysql_num_rows(mysql_query("select * from `members` where (`name`='$user' or email='$user') and `pass`='$pass' ")) > 0) {
        $memp = mysql_fetch_array(mysql_query("select * from `members` where (`name`='$user' or email='$user') and pass='$pass' "));
        if (!$memp[active]) {
            $_MSG = get_cache('user_not_active');
        } else {

            if ($memp[type] == 1) {
                $_SESSION['memarea'] = ' ';
                $_SESSION['memarea_widget'] = ' ';
                $msd = "admin/";
                $_SESSION['IDUSER_ADMIN'] = $memp[id];
                $_SESSION['MODERATOR'] = 1;
                /* prev admin */
                if ($memp[type_to] == 1 || $memp[type_to] == 0)
                    $_SESSION['IDUSER_ADMINT1'] = 1;
                if ($memp[type_to] == 2 || $memp[type_to] == 0)
                    $_SESSION['IDUSER_ADMINT2'] = 1;
                if ($memp[type_to] == 3 || $memp[type_to] == 0)
                    $_SESSION['IDUSER_ADMINT3'] = 1;
            }
            if ($memp[type] == 2) {
                $_SESSION['memarea'] = ' and (powers=0 or powers=2) ';
                $_SESSION['memarea_widget'] = ' and (number4=0 or number4=2) ';
            }
            if ($memp[type] == 4) {
                $_SESSION['memarea'] = ' and (powers=0 or powers=2 or powers=4) ';
                $_SESSION['memarea_widget'] = ' and (number4=0 or number4=2 or number4=4) ';
                $_SESSION['MODERATOR'] = 1;
            }

            $_SESSION['count_nu'] = 30;
            $_SESSION['INFO_USER'] = &$memp;
            $_SESSION['USER_ID'] = $memp[0];



            if (!$_COOKIE['sfhati_login_date']) {
                $tm = time();
                mysql_query("UPDATE `members` SET date1 = " . $tm . " where id='$memp[0]'");
                //   setcookie('sfhati_login_date', md5($tm), time()+10000, '/', '.sfhati.com');
                //  setcookie('sfhati_login_id', md5($memp[0]), time()+10000, '/', '.sfhati.com');
            }

            header('Location: ' . SITE_LINK);
            exit();
        }
    } else {
        $_MSG = get_cache('login_error');
    }
}
if (!$_SESSION['INFO_USER']['type']) {
    $_SESSION['memarea'] = ' and (powers=0 or powers=3) ';
    $_SESSION['memarea_widget'] = ' and (number4=0 or number4=3) ';
}
?>