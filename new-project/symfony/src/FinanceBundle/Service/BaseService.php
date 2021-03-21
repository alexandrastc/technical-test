<?php

namespace FinanceBundle\Service;

class BaseService
{
    /**
     * Get today's date with time set at midnight.
     * Example: 2021-02-01 00:00:00 
     * @return string
     */
    public function getTodayDateAsString()
    {
        $today = (new \DateTime())
            ->setTime(0,0);

        return $today->format('Y-m-d H:i:s');
    }
}
