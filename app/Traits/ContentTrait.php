<?php

namespace App\Traits;

use App\Models\Content\Content;

trait ContentTrait
{
    public static $defaultAttr = ['id', 'name', 'content_type', 'is_password_required', 'is_able_use_master_key'];

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

    public function drawersWithDefaultAttr($data = null)
    {
        if (is_null($data)) {
            return $this->dataResource($this->drawers());
        }

        return $this->drawerFromData($data);
    }

    public function filesWithDefaultAttr($data = null)
    {
        if (is_null($data)) {
            return $this->dataResource($this->files());
        }

        return $this->filesFromData($data);
    }

    public function dataResource($data)
    {
        return manipulate_data($data, self::$defaultAttr);
    }
}
