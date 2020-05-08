<?php

namespace app\components;

use app\models\Visit;

class MaxVisitOnline
{
    public function get($data)
    {
        $array = $this->toFlat($data);
        return $this->maxSubArraySum($array);
    }

    /**
     * Returns converted data to simple array
     *
     * @param $data
     * @return array
     */
    private function toFlat($data)
    {
        $array = [];
        foreach ($data as $item) {
            $array[$item['datetime']] = $array[$item['datetime']] ?? 0;
            $array[$item['datetime']] += $item['status'] == Visit::STATUS_IN ? $item['count'] : -$item['count'];
        }
        return array_values($array);
    }

    /**
     * Returns maximum subarray sum using Kadane’s algorithm.
     * The source is here: https://www.red-gate.com/simple-talk/blogs/kadanes-solution-maximum-subarray-problem/
     *
     * @param $a
     * @return int
     */
    private function maxSubArraySum($a)
    {
        $max_so_far = 0;
        $max_ending_here = 0;

        $size = count($a);
        for ($i = 0; $i < $size; $i++) {
            $max_ending_here = $max_ending_here + $a[$i];
            if ($max_so_far < $max_ending_here) {
                $max_so_far = $max_ending_here;
            }

            if ($max_ending_here < 0) {
                $max_ending_here = 0;
            }
        }
        return $max_so_far;
    }
}