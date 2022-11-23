<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddressRequest;
use App\Models\System\Country;
use App\Traits\System\SystemTrait;
use App\Traits\User\AddressTrait;

class UserAddressController extends Controller
{
    use AddressTrait, SystemTrait;

    public function add()
    {
        return view("pages.address.add", [
            'countries' => Country::all()
        ]);
    }

    public function store(AddressRequest $request)
    {
        if (!$this->storeAddress($request)) {
            abort(404);
        }

        return redirect()->route('acc.setting')->withSuccess('Success!');
    }

    public function edit($id)
    {
        return view("pages.address.edit", [
            'id'        => $id,
            'countries' => Country::all(),
            'address'   => $this->getAddressFromEncId($id),
        ]);
    }

    public function update(AddressRequest $request, $id)
    {
        if (!$this->updateAddress($id, $request)) {
            abort(404);
        }

        return redirect()->route('acc.setting')->withSuccess('Success!');
    }
}
