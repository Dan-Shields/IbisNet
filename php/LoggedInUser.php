<?php

class LoggedInUser extends User {
    public function register($userInfo) {
        if (!$this->registered()) {
            require_once 'DBconnect.php';
            global $dbh;

            $sql = "INSERT INTO `tbl-user` (`user_steamid`, `user_alias`, `user_email`, `user_profile_pic_url`) VALUES (:steamid, :alias, :email, :profile_pic_url)";
            $result = $dbh->change($sql,$userInfo);

            return $result;
        } else {
            return FALSE;
        }
    }

    public function update() {
        if ($this->registered()) {
            require_once 'DBconnect.php';
            require_once '../steamauth/userInfo.php';
            global $dbh;

            $sql = 'SELECT TIME_TO_SEC(TIMEDIFF(NOW(), `user_profile_update_time`)) as diff FROM `tbl-user` WHERE user_steamid = :steamid';
            $result = $dbh->select($sql,['steamid' => $this->_steamid]);

            //if more than 5 minutes old refresh url and reset timestamp
            $time = $result[0]['diff'];
            if ($time >= 300) {
                $sql = "UPDATE `tbl-user` SET `user_profile_pic_url`=:profile_pic_url, `user_profile_update_time`=NOW() WHERE `user_steamid`=:steamid";
                $dbh->change($sql,['steamid' => $this->_steamid, 'profile_pic_url' => substr($steamprofile['avatarmedium'], 72, 40)]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
