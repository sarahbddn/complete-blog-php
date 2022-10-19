<?php
class Users
{
    private int $id;
    private string $username;
    private string $email;
    private string $role;
    private string $password;
    private DateTime $createdAt;

    public function __construct($id, $username, $email, $role, $password, $createdAt)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
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
    public function getEmail()
    {
        return $this->email;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
