<?php

namespace App\Traits\User;

use App\Models\User\UserAddress;

trait AddressTrait
{
    public static $fullAddressAttr = [
        'address_line_one',
        'address_line_two',
        'city',
        'region',
        'countryInfo',
        'zip'
    ];

    public function storeAddress($req)
    {
        return UserAddress::create($req->all());
    }

    public function updateAddress($id, $req)
    {
        return $this->getAddressFromEncId($id)
                    ->update($req->all());
    }

    public function getAddressById($id)
    {
        return UserAddress::with('countryInfo')->find($id);
    }

    public function getAddressFromEncId($id)
    {
        return $this->getAddressById(myDecrypt($id));
    }

    public function getAddress()
    {
        return UserAddress::with('countryInfo')->get();
    }

    public function activeAddress()
    {
        return UserAddress::whereStatus(1)->first();
    }

    public function activeAddressId()
    {
        return $this->activeAddress()->id ?? null;
//        return ($this->activeAddress()->id ?? $this->getFirstAddressFromList()['id']) ?? null;
    }

    public function activeAddressEncId()
    {
        $address = $this->activeAddressId();
        return !is_null($address) ? myEncrypt($address) : null;
    }

    public function getFirstAddressFromList()
    {
        return collect($this->addressList())->first();
    }

    public function addressList()
    {
        return $this->getAddress()->map(function ($item) {
            return [
                'full_address' => $this->fullAddress($item),
                'status'       => $item->status,
                'id'           => $item->id
            ];
        });
    }

    /*
     * @param array|object
     * */
    public function fullAddress($address)
    {
        return $address->address_line_one . ", " . ($address->address_line_two ? $address->address_line_two . ", " : '') . $address->city . ", " . $address->region . ", " . $address->countryInfo->name . ", " . $address->zip;
    }
}
