<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait DrawerTrait
{
    public static $defaultAttr = ['id', 'name', 'content_type', 'is_password_required', 'is_able_use_master_key'];

    public function returnItemView($items)
    {
        return view("components.contents.content", [
            'drawers'  => manipulate_data($items->drawerItems->where('content_type', 'box'), self::$defaultAttr),
            'contents' => manipulate_data($items->drawerItems->where('content_type', 'file'), self::$defaultAttr)
        ]);
    }
}
