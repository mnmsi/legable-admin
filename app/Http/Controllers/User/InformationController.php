<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\InformationRequest;
use App\Models\Content\Information;
use App\Models\Content\InformationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function addInfo($id)
    {
        if (!$information = InformationType::find(decrypt($id))) {
            abort(404);
        }

        return view("pages.information.add", [
            'informationId' => $id,
            'type'          => $information->name,
        ]);
    }

    public function store(InformationRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            if (!$information = InformationType::find(decrypt($id))) {
                abort(404);
            }

            $informationCreate = Information::create([
                'information_type_id' => $information->id,
            ]);

            $informationCreate->informationData()->sync($request->data);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        DB::commit();
        return redirect()
            ->route('dashboard')
            ->with('success', 'Information added successfully');
    }
}
