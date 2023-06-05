<?php

namespace Modules\Paiement\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\JsonResponseTrait;
use Modules\Paiement\Entities\Fonction;

class FonctionController extends Controller
{
    use JsonResponseTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $fonction = Fonction::orderBy('id','desc')->paginate(5);
        return $this->sendData($fonction);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('personnel::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $fonction = $request->validate([
            'name' => 'required',
        ]);

      try {
        $fonction = new Fonction;
        $fonction->name = $request->input('name');

        $fonction->save();
        return $this->sendResponse($fonction, 'Enregistrement de fonction réussi');
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
        $fonction = Fonction::findOrFail($id);
        return $this->sendData($fonction);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $fonction = Fonction::findOrFail($id);
        return $this->sendData($fonction);
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
            'name' =>'sometimes|string'
        ]);
       
        try {
            $fonction = Fonction::findOrFail($id);
    
            $fonction->update([
                'name' => $request->name,
            ]);
            return $this->sendResponse($fonction, 'Modification de fonction réussi');
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
        Fonction::find($id)->delete();
        return $this->sendResponse('Suppression de fonction réussi');
    }
}
