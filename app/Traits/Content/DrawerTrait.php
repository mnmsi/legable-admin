<?php

namespace App\Traits\Content;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function updateDrawer($drawer, $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => [
                'required',
                'string',
                'max:255',
                Rule::unique('contents', 'name')
                    ->whereNot('id', $drawer->id)
                    ->where('user_id', Auth::id())
            ]
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $drawer->update([
            'name' => $request->name
        ]);

        return redirect()
            ->to($request->prev_url ?? null)
            ->withSuccess("Successfully updated!!");
    }

    public function updatePassword($drawer, $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password'              => 'required|string|max:30',
            'new_password_confirmation' => 'required|string|same:new_password|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $drawer->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()
            ->to($request->prev_url ?? null)
            ->withSuccess("Successfully updated!!");
    }
}
