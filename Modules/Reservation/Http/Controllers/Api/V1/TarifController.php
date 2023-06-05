<?php

namespace Modules\Reservation\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Tarif;
use App\Traits\JsonResponseTrait;
use Modules\Reservation\Http\Requests\TarifRequest;

class TarifController extends Controller
{
    use JsonResponseTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tarif = Tarif::with(['classe','vol'])->orderBy('id','desc')->paginate(5);
        return $this->sendData($tarif);
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
    public function store(TarifRequest $request)
    {
        try {
            $tarif = new Tarif;

            $tarif->provenance = $request->input('provenance');
            $tarif->destination = $request->input('destination');
            $tarif->heure_depart = $request->input('heure_depart');
            $tarif->heure_arriver = $request->input('heure_arriver');
            $tarif->class_id = $request->input('class_id');
            $tarif->vol_id = $request->input('vol_id');
            $tarif->save();

           return $this->sendResponse($tarif, 'Enregistrement de tarif réussi');
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
        $tarif = Tarif::find($id);
        return $this->sendData($tarif);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $tarif = Tarif::find($id);
        return $this->sendData($tarif);
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
            'provenance' => 'sometimes|string',
            'destination'  => 'sometimes|string',
            'heure_depart'  => 'sometimes|string',
            'heure_arriver'  => 'sometimes|string',
            'class_id'  => 'sometimes|integer',
            'vol_id'  => 'sometimes|integer'
        ]);

        try {
           $tarif = Tarif::find($id);

            $tarif->provenance = $request->input('provenance');
            $tarif->destination = $request->input('destination');
            $tarif->heure_depart = $request->input('heure_depart');
            $tarif->heure_arriver = $request->input('heure_arriver');
            $tarif->class_id = $request->input('class_id');
            $tarif->vol_id = $request->input('vol_id');
            $tarif->save();

           return $this->sendResponse($tarif, 'Modification de tarif réussi');
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
        Tarif::find($id)->delete();
        return $this->sendResponse('Suppression de tarif réussi');
    }
}
