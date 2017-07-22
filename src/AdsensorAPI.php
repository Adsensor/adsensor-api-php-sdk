<?php

namespace Adsensor\API;

/**
 * AdsensorAPI
 *
 * @property string $token
 */
class AdsensorAPI
{
    public static $token;

    const ID = 'id';

    /**
     * Set self api token
     * @param string $token
     */
    public static function init($token = null)
    {
        if($token !== null) {
            self::$token = $token;
        }
    }

    /**
     * Get user information
     * @return object|null
     */
    public static function me()
    {
        $user = Request::request('/me', 'GET');
        if(is_object($user)) {
            if( isset($user->{self::ID}) )
            {
                return $user;
            }
        }
        return null;
    }
}