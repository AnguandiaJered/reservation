<?php

namespace Modules\Paiement\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\JsonResponseTrait;
use Modules\Paiement\Entities\Paiement;

class PaiementController extends Controller
{
    use JsonResponseTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $paiement = Paiement::with(['agent','reservation'])->orderBy('id','desc')->paginate(5);
        return $this->sendData($paiement);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('paiement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required',
            'agent_id' => 'required',
            'montant' => 'required',
            'devise' => 'required',
        ]);

        try {
            $paiement = new Paiement;

            $paiement->reservation_id = $request->input('reservation_id');
            $paiement->agent_id = $request->input('agent_id');
            $paiement->montant = $request->input('montant');
            $paiement->devise = $request->input('devise');
            $paiement->save();

            return $this->sendResponse($paiement, 'Enregistrement de paiement réussi');
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
        $paiement = Paiement::findOrFail($id);
        return $this->sendData($paiement);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $paiement = Paiement::findOrFail($id);
        return $this->sendData($paiement);
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
            'reservation_id' => 'sometimes|integer',
            'agent_id' => 'sometimes|integer',
            'montant' => 'sometimes|integer',
            'devise' => 'sometimes|string',
        ]);

        try {
            $paiement = Paiement::findOrFail($id);

            $paiement->reservation_id = $request->input('reservation_id');
            $paiement->agent_id = $request->input('agent_id');
            $paiement->montant = $request->input('montant');
            $paiement->devise = $request->input('devise');
            $paiement->save();

            return $this->sendResponse($paiement, 'Modification de paiement réussi');
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
        Paiement::find($id)->delete();
        return $this->sendResponse('Suppression de paiement réussi');
    }
}
