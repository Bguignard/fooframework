<?php

/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 08/09/2016
 * Time: 22:44
 */
class Htmlentity implements DisplayableHtmlEntity
{
    private $type = "";
    private $class = (array)[];
    private $id = "";
    private $content="";
    private $htmlEntitiesContent = [];

    /**
     * @return string
     */
    public function display()
    {
        // TODO: Implement display() method.
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param array $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }



}