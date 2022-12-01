<?php

class Pager
{
    private $pagesCount;
    private $recordsPerPage = 10;
    private static $instance = null;

    public function __construct()
    {
        $dbInstance = LocalDB::getInstance();
        $this->pagesCount = $dbInstance->pagesCount($this->recordsPerPage);
    }

    public static function getInstance()
    {
        if (!self::$instance)
        {
            self::$instance = new Pager();
        }
        return self::$instance;
    }

    public function getPage($pageNumber)
    {
        if ($pageNumber > $this->pagesCount)
        {
            $from_record_number = $this->recordsPerPage * ($this->pagesCount - 1);
        }
        else
        {
            $from_record_number = $this->recordsPerPage * ($pageNumber - 1);
        }
        $dbInstance = LocalDB::getInstance();
        return $dbInstance->getByPageNum($from_record_number, $this->recordsPerPage);
    }

    public function getPagesCount()
    {
        return $this->pagesCount;
    }
}