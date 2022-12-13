<?php

namespace App\Traits\Content;

use App\Models\Content\Content;
use Illuminate\Support\Carbon;

trait ContentTrait
{
    public static $defaultAttr = ['id', 'name', 'content_type', 'file_url', 'is_password_required', 'is_able_use_master_key'];

    public function drawers()
    {
        return Content::where('content_type', 'drawer')
                      ->get();
    }

    public function boxes()
    {
        return Content::where('content_type', 'box')
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

    public function getDrawers()
    {
        return array_map(function ($item) {
            return [
                'id'                => myEncrypt($item->id),
                'name'              => $item->name,
                'content_type'      => $item->content_type,
                'password_required' => $item->is_password_required,
                'date'              => Carbon::parse($item->created_at)->format('M d, Y, h:m A'),
            ];
        }, $this->drawers()->all());
    }

    public function getBoxes()
    {
        return array_map(function ($item) {
            return [
                'id'                => myEncrypt($item->id),
                'name'              => $item->name,
                'content_type'      => $item->content_type,
                'password_required' => $item->is_password_required,
                'date'              => Carbon::parse($item->created_at)->format('M d, Y, h:m A'),
            ];
        }, $this->boxes()->all());
    }

    public function searchContent($value)
    {
        return Content::where('name', 'like', "%$value%")
                      ->get();
    }
}
