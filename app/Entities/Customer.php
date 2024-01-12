<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $fname;
    /**
     * @ORM\Column(type="string")
     */
    private $lname;
    /**
     * @ORM\Column(type="string", unique="true")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $username;
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @ORM\Column(type="string")
     */
    private $gender;
    /**
     * @ORM\Column(type="string")
     */
    private $country;
    /**
     * @ORM\Column(type="string")
     */
    private $city;
    /**
     * @ORM\Column(type="string")
     */
    private $phone;

    public function __construct(
        $fname,
        $lname,
        $email,
        $username,
        $password,
        $gender,
        $country,
        $city,
        $phone
    ) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->gender = $gender;
        $this->country = $country;
        $this->city = $city;
        $this->phone = $phone;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getFname()
    {
        return $this->fname;
    }
    public function getLname()
    {
        return $this->lname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function setFname($value)
    {
        $this->fname = ucfirst($value);
    }
    public function setLname($value)
    {
        $this->lname = ucfirst($value);
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function setUsername($value)
    {
        $this->username = $value;
    }
    public function setPassword($value)
    {
        $this->password = md5($value);
    }
    public function setGender($value)
    {
        $this->gender = $value;
    }
    public function setCountry($value)
    {
        $this->country = $value;
    }
    public function setCity($value)
    {
        $this->city = $value;
    }
    public function setPhone($value)
    {
        $this->phone = $value;
    }
}
