MvRoadlength
============

This API is to calc distance between two points by road.

Install
-------

```bash
composer require mv/roadlength
```

Examples
--------

#### With postal address
```php
use Mv\RoadLength\Api\HereApi;
use Mv\RoadLength\Geo\Location;

$hereApi = new HereApi('---Your HERE API KEY---');

$origin = Location::createByAddress('mairie de hyeres 83400 HYERES', $hereApi);
$destination = Location::createByAddress('mairie de sollies-toucas 83210 SOLLIES-TOUCAS', $hereApi);

$distance = new \Mv\RoadLength\Geo\Distance($hereApi);
$distance->setStartLocation($origin);
$distance->setEndLocation($destination);

$distanceInMeters = $distance->getDistance();
```


#### With geoloc coordinates
```php
use Mv\RoadLength\Api\HereApi;
use Mv\RoadLength\Geo\Location;

$hereApi = new HereApi('---Your HERE API KEY---');

$origin = Location::createByCoords(43.119840, 6.129904);
$destination = Location::createByCoords(43.206368, 6.026157);

$distance = new \Mv\RoadLength\Geo\Distance($hereApi);
$distance->setStartLocation($origin);
$distance->setEndLocation($destination);

$distanceInMeters = $distance->getDistance();
```


Enjoy it!

To be continued...
