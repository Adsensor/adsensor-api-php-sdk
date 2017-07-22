<?php

namespace Adsensor\API;

/**
 * Campaign
 *
 * @property array $data
 */
class Campaign extends Object
{
    protected $data;

    const ID = 'id';
    const NAME = 'name';
    const CATEGORY = 'category';
    const TYPE = 'type';

    const TYPE_ENGAGE = 'Engage';
    const TYPE_VIRAL = 'Viral';
    const TYPE_BRANDING = 'Branding';

    /**
     * Campaign constructor.
     * @param int $id
     * @param array $data
     * @return Campaign
     */
    public function __construct($id = null, $data = [])
    {
        if($id !== null) {
            $this->{self::ID} = $id;
        }

        if(!empty( $data )) {
            $this->setData($data);
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
     * Get list of categories
     * @return mixed
     */
    public function getCategories()
    {
        $request = Request::request('/campaign/categories', 'GET');
        return $request;
    }

    /**
     * Validate campaign
     * @return bool
     */
    public function validate()
    {
        $valid = Request::request('/campaign/validate', 'POST', $this->data);
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
        $request = Request::request('/campaign/create', 'POST', $this->data);
        if(is_object($request)) {
            if( isset($request->{self::ID}) )
            {
                foreach($request as $k => $v) {
                    $this->$k = $v;
                }
                return $this;
            }
        }

        return $request;
    }

    /**
     * Read a Campaign data
     * @return $this|null
     */
    public function read()
    {
        $id =  $this->{self::ID};
        if(isset( $id ))
        {
            $path = '/campaign/' . $id;
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
        }

        return null;
    }

    /**
     * Get list of all campaigns
     * @return Object|null
     */
    public function all()
    {
        $request = Request::request('/campaigns', 'GET');
        return $request;
    }
}