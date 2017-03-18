<?php

class ServerInfoCache
{
    protected $_currentCache;

    public function __construct()
    {
        $this->_dbh = new DBConnect();

        $sql = "SELECT TIME_TO_SEC(TIMEDIFF(NOW(), `server-info_timestamp`)) as time_since_cache FROM `tbl-server-info-cache`";
        $cache = $this->_dbh->select($sql, []);

        if (!empty($cache))
        {
            $this->currentCache = $cache[0];
        }
        else
        {
            $this->currentCache = null;
        }
    }

    public function setCache($json)
    {
        if (isset($this->_currentCache))
        {
            $sql = "UPDATE `tbl-server-info-cache` SET `server-info_json`=:json WHERE 1";
        }
        else
        {
            $sql = "INSERT INTO `tbl-server-info-cache`(`server-info_json`) VALUES (:json)";
        }
        $parameters = ['json' => $json];

        $this->_dbh->change($sql, $parameters);
    }

    public function getCache()
    {
        return $this->_currentCache;
    }
}