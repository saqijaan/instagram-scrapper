<?php

namespace InstagramScraper\Model;

/**
 * Class Story
 * @package InstagramScraper\Model
 */
class HighLightReel extends Media
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $display_url;

    /***
     * We do not need some values - do not parse it for Story,
     * for example - we do not need owner object inside story
     *
     * @param $value
     * @param $prop
     * @param $arr
     */
    protected function initPropertiesCustom($value, $prop, $arr)
    {
        switch($prop){
            case 'id':
                $this->id = $value;
            break;

            case 'cover_media_cropped_thumbnail':
                $this->display_url = $value['url'];
            break;

            case 'title':
                $this->name = $value;
            break;
        }
    }
}