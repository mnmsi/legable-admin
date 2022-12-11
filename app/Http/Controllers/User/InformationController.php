<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\InformationRequest;
use App\Models\Content\Information;
use App\Models\Content\InformationType;
use App\Traits\Information\InformationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    use InformationTrait;

    public function index()
    {
        return view('pages.Information.index', [
            'information'      => Information::with('hasManyInformationData', 'informationType')
                                             ->get()
                                             ->unique('information_type_id'),
            'informationTypes' => InformationType::get(),
        ]);
    }

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
                'name'                => $request->name,
            ]);

            $informationCreate->informationData()->sync($request->data);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        DB::commit();
        return redirect()
            ->route('information.index')
            ->with('success', 'Information added successfully');
    }

    public function getData($id)
    {
        $infoTypeData = Information::with('hasManyInformationData', 'informationType')
                                   ->where('information_type_id', decrypt($id))
                                   ->get();

        if (!$infoTypeData) {
            abort(404);
        }

        return view('pages.Information.info_data', [
            'information' => $infoTypeData,
        ]);
    }

    public function showInformation($id)
    {
        $information = Information::with('hasManyInformationData')
                                  ->find(decrypt($id));

        if (!$information) {
            abort(404);
        }

        return response()->json([
            'status'      => true,
            //            'information' => $information->hasManyInformationData,
            'information' => $this->informationTemplate($information->hasManyInformationData),
        ]);
    }
}
