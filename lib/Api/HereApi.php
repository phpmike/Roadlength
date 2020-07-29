<?php
/*
 * This file is part of the MvRoadlength API.
 *
 * (c) Michael Veroux <michael@veroux.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mv\RoadLength\Api;

use Mv\RoadLength\Geo\LocationInterface;

/**
 * Class HereApi.
 *
 * @author Michaël VEROUX
 */
class HereApi implements ApiDistanceInterface, ApiGeolocInterface
{
    const ROUTES_URL = 'https://router.hereapi.com/v8/routes';
    const GEOCODE_URL = 'https://geocode.search.hereapi.com/v1/geocode';
    const TRANSPORT_MODE = 'car';
    const RETURN_MODE = 'travelSummary';

    /**
     * @var string|null
     */
    protected $apiKey;

    /**
     * HereApi constructor.
     *
     * @param null|string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param LocationInterface $from
     * @param LocationInterface $to
     *
     * @return array
     *
     * @author Michaël VEROUX
     */
    public function getRoutes(LocationInterface $from, LocationInterface $to)
    {
        $params = array(
            'transportMode' => self::TRANSPORT_MODE,
            'origin' => sprintf('%s,%s', $from->getLattitude(), $from->getLongitude()),
            'destination' => sprintf('%s,%s', $to->getLattitude(), $to->getLongitude()),
            'return' => self::RETURN_MODE,
            'apiKey' => $this->apiKey,
        );

        $url = sprintf('%s?%s', self::ROUTES_URL, http_build_query($params));
        $routes = file_get_contents($url);

        return json_decode($routes, true);
    }

    /**
     * @param LocationInterface $from
     * @param LocationInterface $to
     *
     * @return null|int
     *
     * @author Michaël VEROUX
     */
    public function getDistance(LocationInterface $from, LocationInterface $to)
    {
        $routes = $this->getRoutes($from, $to);

        if (isset($routes['routes']) && isset($routes['routes'][0]) && isset($routes['routes'][0]['sections']) && isset($routes['routes'][0]['sections'][0])) {
            $section = $routes['routes'][0]['sections'][0];
            if (isset($section[self::RETURN_MODE])) {
                return $section[self::RETURN_MODE]['length'];
            }
        }

        return null;
    }

    /**
     * @param string $address
     * @param string $class
     *
     * @return LocationInterface|null
     *
     * @author Michaël VEROUX
     */
    public function getLocation($address, $class)
    {
        $interfaces = class_implements($class);

        if (!in_array(LocationInterface::class, $interfaces)) {
            throw new \RuntimeException(sprintf('"%s" must implements "%s"', $class, LocationInterface::class));
        }

        $params = array(
            'q' => $address,
            'apiKey' => $this->apiKey,
        );

        $url = sprintf('%s?%s', self::GEOCODE_URL, http_build_query($params));
        $geocoding = file_get_contents($url);

        $geocoding = json_decode($geocoding, true);

        if (isset($geocoding['items']) && isset($geocoding['items'][0])) {
            $item = $geocoding['items'][0];
            if (isset($item['position']) && isset($item['position']['lat']) && isset($item['position']['lng'])) {
                $location = call_user_func_array(array($class, 'createByCoords'), array($item['position']['lat'], $item['position']['lng']));

                return $location;
            }

        }

        return null;
    }
}
