Route URL
=
```
https://www.adsensor.ir/api/<YOUR-TOKEN>/
```

For connecting to API you need a token, contact to our team :)


Get available categories
-

**Get list of all categories** [GET]
```
https://www.adsensor.ir/api/<YOUR-TOKEN>/campaign/categories
```

Create a new campaign 
-

**post URL** [POST]
```
https://www.adsensor.ir/api/<YOUR-TOKEN>/campaign/create
```

**post data :**
``` 
{
    name : campaign name
    type : campaign type (Engage, Viral, Branding)
    category : [1, 2 ,3] (array of categories)
}
```


Upload new media
-
**Upload URL** [POST]
```
https://www.adsensor.ir/api/<YOUR-TOKEN>/campaign/media
```
**post data :**
```
{
    <b>file</b> : (File data)
}
```

Create new Telegram Ad
-
**post URL** [POST]
``` 
https://www.adsensor.ir/api/<YOUR-TOKEN>/campaign/telegram-ad/create
```

**post data :**
```
{
    campaign_id : <CAMPAIGN_ID>
    media_id : <MEDIA_ID>
    text : 'Ad text or caption'
    budget : 3000000 (rial)
    
}
```

Get campaign object
-
**request URL** [GET]
```
https://www.adsensor.ir/api/<YOUR-TOKEN>/campaign/<CAMPAIGN_ID>/
```
**sample of returned object** [JSON]
```
{
  "id": 22234,
  "name": "test",
  "type": "Engage",
  "status": "Active",
  "created_at": 1503894112,
  "updated_at": 1503894112,
  "categories": [
    {
      "id": 1,
      "name": "افراد تاثیرگذار"
    },
    {
      "id": 4,
      "name": "سرگرمی"
    },
    {
      "id": 8,
      "name": "خبری"
    }
  ],
  "telegram_ads": [
    {
      "id": 22234,
      "budget": 3000000,
      "view": 210526,
      "view_done": 110000,
      "text": "این یک متن تست است",
      "media": {
        "id": 26704,
        "url": "http://files.adsensor.ir/user-contents/campaign/ppv/83/96-06-6/fqgZuCD9QrDPqpPQTJCuSbt3Lps2-Tq9_1503898309.png",
        "format": "png",
        "size": 123466,
        "created_at": 1503898310
      },
      "status": "Active",
      "created_at": 1503898367,
      "updated_at": 1503898446,
      "reports": [
        {
          "id": 10061,
          "channel_name": "مملکته",
          "channel_username": "mamlekate",
          "link": "https://t.me/mamlekate/32869",
          "view": 70000,
          "members": 351856,
          "status": "Done",
          "sent_at": 1503898519,
          "screenshots": [
            "https://www.adsensor.ir/user-contents/campaign/ppv/5/reports/6LmFQvg7XQKmbbleoNnDuwVYtK1wHUuM_1503898566.png"
          ]
        },
        {
          "id": 10062,
          "channel_name": "توییتر فارسی",
          "channel_username": "officialpersiantwitter",
          "link": "",
          "view": 100000,
          "members": 559027,
          "status": "Reserve",
          "sent_at": 1504244160,
          "screenshots": []
        },
        {
          "id": 10063,
          "channel_name": "کاف",
          "channel_username": "kafiha",
          "link": "",
          "view": 40000,
          "members": 628208,
          "status": "Done",
          "sent_at": 1503898669,
          "screenshots": [
            "https://www.adsensor.ir/user-contents/campaign/ppv/5/reports/ps09FF-dnvKO46mew20nKIEiJdaXUvW__1503898728.png",
            "https://www.adsensor.ir/user-contents/campaign/ppv/5/reports/x5SirlnwcLQbVbN16BkCMl3qV1UtQ7nh_1503898756.png"
          ]
        }
      ]
    }
  ]
}
```