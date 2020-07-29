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

/**
 * Interface DistanceInterface.
 *
 * @author Michaël VEROUX
 */
interface DistanceInterface
{
    /**
     * @param LocationInterface $location
     *
     * @return $this
     *
     * @author Michaël VEROUX
     */
    public function setStartLocation(LocationInterface $location);

    /**
     * @param LocationInterface $location
     *
     * @return $this
     *
     * @author Michaël VEROUX
     */
    public function setEndLocation(LocationInterface $location);

    /**
     * Return distance in meters as a int number
     *
     * @return int
     *
     * @author Michaël VEROUX
     */
    public function getDistance();
}
