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
 * Interface ApiGeolocInterface.
 *
 * @author Michaël VEROUX
 */
interface ApiGeolocInterface
{
    /**
     * @param string $address
     * @param string $class
     *
     * @return LocationInterface|null
     *
     * @author Michaël VEROUX
     */
    public function getLocation($address, $class);
}
