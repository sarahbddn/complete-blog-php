<?php
class Posts
{
    private int $id;
    private string $username;
    private string $title;
    private string $slug;
    private int $views;
    private string $image;
    private string $body;
    private int $published;
    private DateTime $createdAt;

    public function __construct($id, $username, $title, $slug, $views, $image, $body, $published, $createdAt)
    {
        $this->id = $id;
        $this->username = $username;
        $this->title = $title;
        $this->slug = $slug;
        $this->views = $views;
        $this->image = $image;
        $this->body = $body;
        $this->published = $published;
        $this->createdAt = new DateTime();
        $this->createdAt->setTimestamp($createdAt);
    }
    /**
     * getters
     */
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getSlug()
    {
        return $this->slug;
    }
    public function getViews()
    {
        return $this->views;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getBody()
    {
        return $this->body;
    }
    public function getPublished()
    {
        return $this->published;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
}
