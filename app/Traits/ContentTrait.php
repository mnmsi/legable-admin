<?php

namespace App\Traits;

use App\Models\Content\Content;

trait ContentTrait
{
    public static $defaultAttr = ['id', 'name', 'is_password_required', 'is_able_use_master_key'];

    public function drawers()
    {
        return Content::where('content_type', 'drawer')
                      ->get();
    }

    public function files()
    {
        return Content::where('content_type', 'file')
                      ->whereNull('parent_id')
                      ->get();
    }

    public function allContent()
    {
        return Content::get();
    }

    public function drawerFromData($data)
    {
        return $data->where('content_type', 'drawer');
    }

    public function filesFromData($data)
    {
        return $data->where('content_type', 'file');
    }
}
