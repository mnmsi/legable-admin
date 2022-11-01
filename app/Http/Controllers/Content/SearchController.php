<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use SearchTrait;

    public function search(Request $request)
    {
        $searchData = array_map(function ($item) {

            return [
                'id'                     => myEncrypt($item['id']),
                'parent_id'              => $item['parent_id'],
                'name'                   => $item['name'],
                'content_type'           => $item['content_type'],
                'is_password_required'   => $item['is_password_required'],
                'is_able_use_master_key' => $item['is_able_use_master_key'],

                'icon' => ($item['content_type'] == 'drawer' || $item['content_type'] == 'box')
                    ? asset('image/card/card-icon.svg')
                    : asset('image/content/demo1.svg')
            ];
        }, $this->searchData($request->get('value')));

        return response()->json([
            'data' => $searchData
        ]);
    }
}
