<?php
namespace Community\Lib\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * @ORM\Table(name="game_system")
 * @ORM\Entity(repositoryClass="Community\Lib\Repository\GameSystemRepository")
 *
 * @ExclusionPolicy("all")
 */
class GameSystem
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
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Expose
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Campaign", mappedBy="gameSystem")
     */
    private $campaigns;

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
     * Add campaigns
     *
     * @param \Community\Lib\Entity\Campaign $campaigns
     * @return WhiteLabel
     */
    public function addCampaigns(\Community\Lib\Entity\Campaign $campaigns)
    {
        $this->campaigns[] = $campaigns;

        return $this;
    }

    /**
     * Remove campaigns
     *
     * @param \Community\Lib\Entity\Campaign $campaigns
     */
    public function removeCampaigns(\Community\Lib\Entity\Campaign $campaigns)
    {
        $this->campaigns->removeElement($campaigns);
    }

    /**
     * Get campaigns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    public function __toString()
    {
        return $this->name;
    }
}
