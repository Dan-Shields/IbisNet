<?php

class ServerInfoCache
{
    protected $_currentCache;

    public function __construct()
    {
        $this->_dbh = new DBConnect();

        $sql = "SELECT TIME_TO_SEC(TIMEDIFF(NOW(), `server-info_timestamp`)) as time_since_cache, `server-info_json` FROM `tbl-server-info-cache`";
        $cache = $this->_dbh->select($sql, []);

        if (!empty($cache))
        {
            $this->_currentCache = $cache[0];
        }
    }

    public function setCache($json)
    {
        if (isset($this->_currentCache))
        {
            $sql = "UPDATE `tbl-server-info-cache` SET `server-info_timestamp` = DEFAULT, `server-info_json`=:json";
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