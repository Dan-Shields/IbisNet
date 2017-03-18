<?php

class ServerInfo
{
    protected $_json;

    public function __construct()
    {
        $cache = new ServerInfoCache();

        if (!empty($cache->getCache()))
        {
            $timeSinceCache = $cache->getCache()['time_since_cache'];

            if ($timeSinceCache > 3)
            {
                $this->setServerInfo();
                $cache->setCache($this->_json);
            }
            else
            {
                $this->_json = $cache->getCache()['server-info_json'];
            }
        }
        else
        {
            $this->setServerInfo();
            $cache->setCache($this->_json);
        }

    }

    protected function setServerInfo()
    {

        if($this->checkListenerStatus('localhost') === false)
        {
            $obj = new stdClass();
            $obj->online = false;
            $this->_json = json_encode($obj);
        }
        else
        {
            $json = file_get_contents('http://localhost:25660');
            $obj = json_decode($json);
            $obj->online = true;
            $this->_json = json_encode($obj);
        }
    }

    protected function checkListenerStatus($host)
    {
        $connection = @fsockopen($host, 25660, $errno, $errstr, 2);

        if (is_resource($connection))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //GETTERS
    public function getJSON()
    {
        return $this->_json;
    }
}