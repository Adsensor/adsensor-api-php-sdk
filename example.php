<?php

use Adsensor\API\AdMedia;
use Adsensor\API\AdsensorAPI;
use Adsensor\API\Campaign;
use Adsensor\API\TelegramAd;

// user access token
$token = 'KEY-XXXX';

// config
AdsensorAPI::init($token);

// Get user information =========================
$user = AdsensorAPI::me();
if($user !== null) {
    echo '<pre>';
    print_r($user);
    echo '</pre>';
}

// create a new campaign =========================
$campaign = new Campaign(null, [
    Campaign::NAME => 'test 1',
    Campaign::TYPE => Campaign::TYPE_ENGAGE,
    Campaign::CATEGORY => [1, 2, 3]
]);

if($campaign->validate() && $campaign->create())
{
    $campaign_id = $campaign->{Campaign::ID};
    echo 'camapign id : '. $campaign_id . '<br>';
} else {
    echo 'error : <br><pre>';
    print_r($campaign);
    echo '</pre>';
}


// create new media for campaign =========================
$media = new AdMedia();
$file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '724.png';

if( $media->create($file_path) )
{
    // new media created successfully
    $media_id = $media->{AdMedia::ID};
    echo 'media id : '. $media_id . '<br>';
} else {
    die('unable to upload : ' . $file_path);
}


// create new Telegram Ad =========================
if(isset($campaign_id) && isset($media_id))
{
    $telegramAd = new TelegramAd(null, $campaign_id);
    $telegramAd->setData([
        TelegramAd::BUDGET => 3000000,
        TelegramAd::TEXT => 'test content...',
        TelegramAd::MEDIA => $media_id
    ]);

    if($telegramAd->validate() && $telegramAd->create())
    {
        // active & pay Ad
        $telegramAd->active();

        // telegram ad created successfully
        $telegramAd_id = $telegramAd->{TelegramAd::ID};
        echo 'telegram ads id : '. $telegramAd_id . '<hr>';
    }
}


// fetch campaign data =========================
echo '<pre>';
print_r($campaign->read());
echo '</pre>';



// List of all campaigns =========================
// get list of all campaigns
//$campains = new Campaign();
//echo '<pre>';
//print_r($campains->all());
//echo '</pre>';