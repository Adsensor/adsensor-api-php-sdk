<?php

namespace Adsensor\API;

/**
 * Request
 */
class Request
{
    /**
     * Request constructor.
     * @param string $path
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public static function request($path, $method = 'POST', $params = [])
    {
        $token = AdsensorAPI::$token;
        $url = 'https://dashboard.adsensor.ir/api/' . $token . $path;
        $isPost = ($method == "POST") ? 1 : 0;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, $isPost);

        if( $isPost ) {
            if(empty($params['file'])) {
                $params = http_build_query($params);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close ($ch);

        return json_decode($output);
    }

}