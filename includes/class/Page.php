<?php

/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 03/09/2016
 * Time: 23:41
 */
class Page
{
    private $id_page = 0;
    private $name = "";
    private $title = "";
    private $file = "";
    private $path = "./view";

    public function __construct()
    {

    }

    //load the Page from the current id_page
    public function load()
    {
        global $connexion;
        $connexion->setReq(
            "SELECT * FROM page WHERE id_page = '$this->id_page';"
        );
        if($connexion->query()->ins()===true)
        {
            $obj = $connexion->query()->first("Page");
            $this->name = $obj->getName();
            $this->title = $obj->getTitle();
            $this->file = $obj->getFile();
            $this->path = $obj->getPath();
        }
    }

    /**
     * @return int
     */
    public function getIdPage()
    {
        return $this->id_page;
    }

    /**
     * @param int $id_page
     */
    public function setIdPage($id_page)
    {
        $this->id_page = $id_page;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
}