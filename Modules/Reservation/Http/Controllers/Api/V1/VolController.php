<?php

namespace Modules\Reservation\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Vol;
use App\Traits\JsonResponseTrait;

class VolController extends Controller
{
    use JsonResponseTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $vol = Vol::orderBy('id','desc')->paginate(5);
        return $this->sendData($vol);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('reservation::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required',
            'num' => 'required',
            'nombre_place' => 'required',
        ]);

        try {
            $vol = new Vol;

            $vol->designation = $request->input('designation');
            $vol->num = $request->input('num');
            $vol->nombre_place = $request->input('nombre_place');
            $vol->save();

            return $this->sendResponse($vol, 'Enregistrement de vol réussi');
        } catch (\Exception $ex) {
            return $this->sendErrorResponse('Echec d\'enregistrement');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $vol = Vol::find($id);
        return $this->sendData($vol);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $vol = Vol::find($id);
        return $this->sendData($vol);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => 'required',
            'num' => 'required',
            'nombre_place' => 'required',
        ]);

        try {
            $vol = Vol::find($id);

            $vol->designation = $request->input('designation');
            $vol->num = $request->input('num');
            $vol->nombre_place = $request->input('nombre_place');
            $vol->save();

            return $this->sendResponse($vol, 'Modification de vol réussi');
        } catch (\Exception $ex) {
            return $this->sendErrorResponse('Echec de modification');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Vol::find($id)->delete();
        return $this->sendResponse('Suppression de vol réussi');
    }
}
