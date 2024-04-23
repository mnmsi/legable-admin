<?php

namespace App\Traits\Content;

use App\Models\Content\Content;

trait SearchTrait
{
    public function searchData($value)
    {
        return Content::with('drawerItems')
                      ->where('name', 'like', "%$value%")
                      ->orderBy('uses_at', 'desc')
                      ->limit(6)
                      ->get()
                      ->all();
    }

    public function searchHtml($data)
    {
        $liData = '';
        if (count($data)) {
            foreach ($data as $item) {
                $liData .= "<a href='javascript:void(0)' class='list-group-item list-group-item-action search-list' id='" . $item['id'] . "' data-drawer-name='" . $item['name'] . "' data-drawer='" . $item['id'] . "' onclick=''>" . $item['name'] . "</a>";
            }

            $liData = "<div class='list-group position-absolute'>" . $liData . "</ul>";
        }

        return $liData;
    }
}
