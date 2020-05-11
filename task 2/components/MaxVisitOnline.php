<?php

namespace app\components;

use app\models\Visit;

class MaxVisitOnline
{
    private $array;

    public function get($data)
    {
        $this->array = $data;
        $this->toFlat();
        return $this->maxSubArraySum();
    }

    /**
     * Преобразует массив дат и статусов для подсчета максимального онлайна
     */
    private function toFlat()
    {
        $array = [];
        foreach ($this->array as $item) {
            $array[$item['datetime']] = $array[$item['datetime']] ?? 0;
            $array[$item['datetime']] += $item['status'] == Visit::STATUS_IN ? $item['count'] : -$item['count'];
        }
        $this->array = array_values($array);
    }

    /**
     * Возвращает максимальную сумму подмассива, использую алгоритм Кадана.
     * Источник здесь: https://www.red-gate.com/simple-talk/blogs/kadanes-solution-maximum-subarray-problem/
     *
     * @return int
     */
    private function maxSubArraySum()
    {
        $maxSoFar = 0;
        $maxEndingHere = 0;

        $size = count($this->array);
        for ($i = 0; $i < $size; $i++) {
            $maxEndingHere = $maxEndingHere + $this->array[$i];
            if ($maxSoFar < $maxEndingHere) {
                $maxSoFar = $maxEndingHere;
            }

            if ($maxEndingHere < 0) {
                $maxEndingHere = 0;
            }
        }
        return $maxSoFar;
    }
}