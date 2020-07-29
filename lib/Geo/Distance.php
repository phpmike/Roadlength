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

use Mv\RoadLength\Api\ApiDistanceInterface;

/**
 * Class Distance.
 *
 * @author Michaël VEROUX
 */
class Distance implements DistanceInterface
{
    /**
     * @var LocationInterface
     */
    protected $startLocation;

    /**
     * @var LocationInterface
     */
    protected $endLocation;

    /**
     * @var ApiDistanceInterface
     */
    private $api;

    /**
     * Distance constructor.
     *
     * @param ApiDistanceInterface $api
     */
    public function __construct(ApiDistanceInterface $api)
    {
        $this->api = $api;
    }

    /**
     * @param LocationInterface $location
     *
     * @return $this
     *
     * @author Michaël VEROUX
     */
    public function setStartLocation(LocationInterface $location)
    {
        $this->startLocation = $location;

        return $this;
    }

    /**
     * @param LocationInterface $location
     *
     * @return $this
     *
     * @author Michaël VEROUX
     */
    public function setEndLocation(LocationInterface $location)
    {
        $this->endLocation = $location;

        return $this;
    }

    /**
     * @return int|null
     *
     * @author Michaël VEROUX
     */
    public function getDistance()
    {
        $distance = $this->api->getDistance($this->startLocation, $this->endLocation);

        return $distance;
    }
}
