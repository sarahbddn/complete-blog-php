<?php
class Topics
{
    private int $id;
    private string $name;
    private string $slug;

    public function __construct($id, $name, $slug)
    {
        $this->id = $id;
        $this->username = $name;
        $this->slug = $slug;
    }
    /**
     * getters
     */
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSlug()
    {
        return $this->slug;
    }
 
}
