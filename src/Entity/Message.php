<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(mercure=true)
 * @ORM\Entity
 */
class Message
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name A name property - this description will be available in the API documentation too.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $message;

    /**
     * @var string $name A name property - this description will be available in the API documentation too.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $username;


    /**
     * @var string $name A name property - this description will be available in the API documentation too.
     *
     * @ORM\Column
     */
    public $date;

    public function __construct()
    {
        $this->date = (new \DateTime())->format('H:i:s');
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return null|string
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string $username
     * @return Message
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
}
