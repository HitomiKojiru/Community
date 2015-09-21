<?php
namespace Community\Lib\Collection;

class CampaignCollection
{
    /**
     * @var Campaign[]
     */
    public $campaigns;
    /**
     * @var integer
     */
    public $offset;
    /**
     * @var integer
     */
    public $limit;
    /**
     * @param Campaign[]  $campaigns
     * @param integer $offset
     * @param integer $limit
     */
    public function __construct($campaigns = array(), $offset = null, $limit = null)
    {
        $this->campaigns = $campaigns;
        $this->offset = $offset;
        $this->limit = $limit;
    }
}
