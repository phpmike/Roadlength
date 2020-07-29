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
 * Interface ApiDistanceInterface.
 *
 * @author Michaël VEROUX
 */
interface ApiDistanceInterface
{
    /**
     * @param LocationInterface $from
     * @param LocationInterface $to
     *
     * @return null|int
     *
     * @author Michaël VEROUX
     */
    public function getDistance(LocationInterface $from, LocationInterface $to);
}
