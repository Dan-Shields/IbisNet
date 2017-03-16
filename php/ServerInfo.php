<?php

class ServerInfo
{
    protected $_obj;

    public function __construct() {
        $this->_obj = new stdClass();
        if($this->checkListenerStatus('localhost') === false){
            $this->_obj->online = false;
        }else{
            $json = file_get_contents('http://localhost:25660');
            $this->_obj = json_decode($json);

            $this->_obj->online = true;
        }
    }

    protected function checkListenerStatus($host) {
        $connection = @fsockopen($host, 25660, $errno, $errstr, 2);

        if (is_resource($connection)) {
            return true;
        } else {
            return false;
        }
    }

    //GETTERS
    public function getJSON() {
        return json_encode($this->_obj);
    }
}