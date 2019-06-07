<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     mercure=true,
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}},
 *     itemOperations={"get"},
 *     collectionOperations={"post","get"})
 *
 * @ORM\Entity()
 *
 */
class Message
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string the text
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @Groups({"read", "write"})
     */
    public $text;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @Groups({"read"})
     */
    public $author;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read"})
     */
    public $sentAt;

    public function __construct()
    {
        $this->sentAt = new \DateTime();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param User $user
     * @return Message
     */
    public function setAuthor(User $user): self
    {
        $this->author = $user;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * @param string $text
     * @return Message
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param \DateTime $sentAt
     * @return Message
     */
    public function setSentAt(\DateTime $sentAt): self
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
}
