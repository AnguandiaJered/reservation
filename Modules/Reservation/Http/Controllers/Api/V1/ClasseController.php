<?php

namespace Modules\Reservation\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Classe;
use App\Traits\JsonResponseTrait;

class ClasseController extends Controller
{
    use JsonResponseTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $classe = Classe::orderBy('id','desc')->paginate(5);
        return $this->sendData($classe);
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
            'prix' => 'required',
        ]);

        try {
            $classe = new Classe;

            $classe->designation = $request->input('designation');
            $classe->prix = $request->input('prix');
            $classe->save();

            return $this->sendResponse($classe, 'Enregistrement de classe réussi');
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
        $classe = Classe::findOrFail($id);
        return $this->sendData($classe);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return $this->sendData($classe);
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
            'designation' => 'sometimes|string',
            'prix' => 'sometimes|integer',
        ]);

        try {
            $classe = Classe::findOrFail($id);

            $classe->designation = $request->input('designation');
            $classe->prix = $request->input('prix');
            $classe->save();

            return $this->sendResponse($classe, 'Modification de classe réussi');
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
        Classe::find($id)->delete();
        return $this->sendResponse('Suppression de classe réussi');
    }
}
