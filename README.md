Adsensor API
==========================================
By this library you can use adsensor advertising system 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist adsensor/adsensor-api-php-sdk "dev-master"
```

or add

```
"adsensor/adsensor-api-php-sdk": "dev-master"
```

to the require section of your `composer.json` file.


Configuring application
-----

For configuration API add this code:

```php
use Adsensor\API\AdMedia;
use Adsensor\API\AdsensorAPI;
use Adsensor\API\Campaign;
use Adsensor\API\TelegramAd;

$token = 'KEY-XXXX';
AdsensorAPI::init($token);
```

Usage
-----

Get user information and test API:

```php
$user = AdsensorAPI::me();
if($user !== null) {
    echo '<pre>';
    print_r($user);
    echo '</pre>';
}
```

Get list of all categories:

```php
// create a new campaign
$campaign = new Campaign();
$categories = $campaign->getCategories();

echo '<pre>';
print_r($categories);
echo '</pre>';
```

For create a campaign:

```php
// create a new campaign
$campaign = new Campaign(null, [
    Campaign::NAME => 'campaign name',
    Campaign::TYPE => Campaign::TYPE_ENGAGE, // campaign KPI Range : TYPE_ENGAGE - TYPE_VIRAL - TYPE_BRANDING
    Campaign::CATEGORY => [1, 2, 3] // categories ID
]);

if( $campaign->validate() && $campaign->create() )
{
    // campaign created ...
    $campaign_id = $campaign->{Campaign::ID}; // access campaign ID
}
```

For uploading a file for campaign:

```php
$media = new AdMedia();
$file_path = __DIR__ . '/image.jpg'; // file directory

if( $media->create($file_path) )
{
    // new media created successfully
    $media_id = $media->{AdMedia::ID}; // access media ID
}
```

Create a new Telegram Ad:

```php
$campaign_id = ''; // insert campaign ID here
$media_id = ''; // insert media ID here
$telegramAd = new TelegramAd(null, $campaign_id);

$telegramAd->setData([
    TelegramAd::BUDGET  => 3000000, // budget (Rial)
    TelegramAd::TEXT    => 'test content...', // text of ad
    TelegramAd::MEDIA   => $media_id // fetch media by ID 
]);

if($telegramAd->validate() && $telegramAd->create())
{
    // telegram ad created successfully
    $telegramAd_id = $telegramAd->{TelegramAd::ID}; // access Ad by ID
    
    // pay & active telegram ad
    if( $telegramAd->active() ) {
        // Telegram ad activated successfully
    }
}
```

Get a campaign data by ID:

```php
$campaign_id = ''; // insert campaign ID here
$campaignInfo = new Campaign($campaign_id);

echo '<pre>';
print_r($campaignInfo->read());
echo '</pre>';
```

List of your campaigns:

```php
$campains = new Campaign();

echo '<pre>';
print_r($campains->all());
echo '</pre>';
```