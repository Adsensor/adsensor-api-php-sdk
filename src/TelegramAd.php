<?php

namespace Adsensor\API;

/**
 * TelegramAd
 *
 * @property array $data
 */
class TelegramAd extends Object
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
     * @return TelegramAd
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
     * Validate campaign
     * @return bool
     */
    public function validate()
    {
        $valid = Request::request('/campaign/telegram-ad/validate', 'POST', $this->data);
        if($valid == 'true') {
            return true;
        }
        return false;
    }

    /**
     * Create a new campaign
     * @return mixed
     */
    public function create()
    {
        $request = Request::request('/campaign/telegram-ad/create', 'POST', $this->data);
        if(is_object($request)) {
            if( isset($request->{self::ID}) )
            {
                foreach($request as $k => $v) {
                    $this->$k = $v;
                }
            }
        }

        return $request;
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
            $path = '/campaign/telegram-ad/' . $id;
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

    /**
     * Pay and Active a Telegram Ad
     * @return bool
     */
    public function active()
    {
        $id = $this->{self::ID};
        if(isset( $id )) {
            $path = '/campaign/telegram-ad/active/' . $id;
            $request = Request::request($path, 'GET');
            if(is_object($request)) {
                if($request->success == true) {
                    return true;
                }
            }
        }

        return false;
    }
}