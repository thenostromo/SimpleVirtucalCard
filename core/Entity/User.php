<?php
namespace Entity;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $fullname;

    public function __construct()
    {
        $this->id = null;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $salt
     * @return $this
     */
    public function setSalt(string $salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $fullname
     * @return $this
     */
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param array $userArray
     */
    public function makeFromArray(array $userArray)
    {
        $this->id = $userArray["id"];

        $this->setEmail($userArray["email"]);
        $this->setFullname($userArray["fullname"]);
    }

    /**
     * @param array $sessionInfo
     */
    public function loadFromSession($sessionInfo)
    {
        $this->id = $sessionInfo["id"];

        $this->setEmail($sessionInfo["email"]);
        $this->setFullname($sessionInfo["fullname"]);
    }
}