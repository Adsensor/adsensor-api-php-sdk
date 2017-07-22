<?php

namespace Adsensor\API;

/**
 * AdMedia
 */
class AdMedia extends Object
{
    const ID = 'id';

    /**
     * Create a new campaign
     * @return mixed
     */
    public function create($file_path)
    {
        $file = new \CURLFile($file_path);
        $request = Request::request('/campaign/media', 'POST', ['file' => $file]);
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
}