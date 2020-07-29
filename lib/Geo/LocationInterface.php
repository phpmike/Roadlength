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
 * Interface LocationInterface.
 *
 * @author Michaël VEROUX
 */
interface LocationInterface
{
    /**
     * @return float
     *
     * @author Michaël VEROUX
     */
    public function getLongitude();

    /**
     * @return float
     *
     * @author Michaël VEROUX
     */
    public function getLattitude();

    /**
     * @param string             $address
     * @param ApiGeolocInterface $api
     *
     * @return self
     *
     * @author Michaël VEROUX
     */
    static public function createByAddress($address, ApiGeolocInterface $api);

    /**
     * @param Float $lat
     * @param Float $long
     *
     * @return self
     *
     * @author Michaël VEROUX
     */
    static public function createByCoords(Float $lat, Float $long);
}
