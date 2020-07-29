<?php
/*
 * This file is part of the MvRoadlength API.
 *
 * (c) Michael Veroux <michael@veroux.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mv\RoadLength\Geo;

use Mv\RoadLength\Api\ApiGeolocInterface;

/**
 * Class Location.
 *
 * @author Michaël VEROUX
 */
class Location implements LocationInterface
{
    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var float
     */
    protected $lattitude;

    /**
     * @param float $longitude
     *
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @param float $lattitude
     *
     * @return $this
     */
    public function setLattitude($lattitude)
    {
        $this->lattitude = $lattitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return float
     */
    public function getLattitude()
    {
        return $this->lattitude;
    }

    /**
     * @param string             $address
     * @param ApiGeolocInterface $api
     *
     * @return LocationInterface|null
     *
     * @author Michaël VEROUX
     */
    static public function createByAddress($address, ApiGeolocInterface $api)
    {
        $location = $api->getLocation($address, self::class);

        return $location;
    }

    /**
     * @param Float $lat
     * @param Float $long
     *
     * @return Location
     *
     * @author Michaël VEROUX
     */
    static public function createByCoords(Float $lat, Float $long)
    {
        $location = new self;
        $location->setLattitude($lat)
            ->setLongitude($long)
        ;

        return $location;
    }
}
