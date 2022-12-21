<?php

namespace App\Traits\Information;

trait InformationTrait
{
    public function informationTemplate($data)
    {
        return $data->map(function ($item) {
            return "<p><strong>$item->title: </strong> $item->data</p>";
        });
    }
}
