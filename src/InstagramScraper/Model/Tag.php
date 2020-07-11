<?php

namespace InstagramScraper\Model;

/**
 * Class Tag
 * @package InstagramScraper\Model
 */
class Tag extends AbstractModel
{
    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'media_count' => 'mediaCount',
        'name' => 'name',
        'id' => 'initInt',
    ];
    /**
     * @var int
     */
    protected $mediaCount = 0;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $profile_pic;

    /**
     * @return int
     */
    public function getMediaCount()
    {
        return $this->mediaCount;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProfilePic()
    {
        return $this->profile_pic;
    }

    protected function initPropertiesCustom($value, $prop, $props)
    {
        switch($prop){
            case 'id':
                $this->id = $value;
            break;

            case 'name':
                $this->name = $value;
            break;

            case 'media_count':
                $this->mediaCount = $value;
            break;

            case 'profile_pic_url':
                $this->profile_pic = $value;
            break;
        }
    }
}