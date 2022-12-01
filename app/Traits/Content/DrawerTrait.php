<?php

namespace App\Traits\Content;

trait DrawerTrait
{
    public static $defaultAttr = ['id', 'name', 'content_type', 'is_password_required', 'is_able_use_master_key'];

    public function returnItemView($items, $id)
    {
        return view("components.contents.content", [
            'drawer_id'    => $id,
            'content_type' => $items->content_type === 'drawer' ? "boxes" : "contents",
            'drawerFn'     => 'addBoxClick("' . $id . '")',
            'drawers'      => manipulate_data($items->drawerItems->where('content_type', 'box'), self::$defaultAttr),
            'contents'     => manipulate_data($items->drawerItems->where('content_type', 'file'), self::$defaultAttr)
        ]);
    }
}
