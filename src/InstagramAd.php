<?php

namespace Adsensor\API;

/**
 * InstagramAd
 *
 * @property array $data
 */
class InstagramAd extends Object
{
    protected $data;

    const ID = 'id';
    const TEXT = 'text';
    const BUDGET = 'budget';
    const MEDIA = 'media_id';

    /**
     * TelegramAd constructor.
     * @param int $id
     * @param int $campaign_id
     * @return InstagramAd
     */
    public function __construct($id = null, $campaign_id = null)
    {
        if($id !== null) {
            $this->{self::ID} = $id;
        }

        if($campaign_id !== null) {
            $this->data['campaign_id'] = $campaign_id;
        }

        return $this;
    }

    /**
     * Set params data
     * @param $data
     */
    public function setData($data)
    {
        if(is_array( $data )) {
            foreach($data as $k => $v) {
                $this->data[$k] = $v;
            }
        }
    }

    /**
     * Read a TelegramAd data
     * @return $this|null
     */
    public function read()
    {
        $id = $this->{self::ID};
        if(isset( $id ))
        {
            $path = '/campaign/instagram-ad/' . $id;
            $request = Request::request($path, 'GET');
            if(is_object($request)) {
                if( isset($request->{self::ID}) )
                {
                    foreach($request as $k => $v) {
                        $this->$k = $v;
                    }
                    return $this;
                }
            }
        } else {
            echo 'id not defined!';
        }

        return null;
    }
}