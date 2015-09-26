<?php
namespace Community\Lib\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * @ORM\Table(name="campaign")
 * @ORM\Entity(repositoryClass="Community\Lib\Repository\CampaignRepository")
 *
 * @ExclusionPolicy("all")
 */
class Campaign
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Expose
     */
    private $id;

    /**
     * @ORM\Column(name="game_system_id", type="integer", nullable=true)
     */
    private $gameSystemId;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Expose
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="GameSystem", inversedBy="campaigns")
     * @ORM\JoinColumn(name="game_system_id", referencedColumnName="id")
     *
     * @Expose
     */
    private $gameSystem;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set gameSystem
     *
     * @param \Community\Lib\Entity\GameSystem $gameSystem
     * @return Campaign
     */
    public function setGameSystem(\Community\Lib\Entity\GameSystem $gameSystem = null)
    {
        $this->gameSystem = $gameSystem;

        return $this;
    }

    /**
     * Get gameSystem
     *
     * @return \Community\Lib\Entity\GameSystem
     */
    public function getGameSystem()
    {
        return $this->gameSystem;
    }


    public function __toString()
    {
        return $this->name;
    }
}
