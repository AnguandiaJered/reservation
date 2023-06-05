<?php

namespace Modules\Reservation\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Reservation;
use App\Traits\JsonResponseTrait;

class ReservationController extends Controller
{
    use JsonResponseTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $reservation = Reservation::with(['users','tarif'])->orderBy('id','desc')->paginate(5);
        return $this->sendData($reservation);
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
            'user_id' => 'required',
            'tarif_id' => 'required',
            'date_depart' => 'required',
        ]);

        try {
            $reservation = new Reservation;

            $reservation->user_id = $request->input('user_id');
            $reservation->tarif_id = $request->input('tarif_id');
            $reservation->date_depart = $request->input('date_depart');
            $reservation->save();

            return $this->sendResponse($reservation, 'Enregistrement de reservation réussi');
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
        $reservation = Reservation::findOrFail($id);
        return $this->sendData($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return $this->sendData($reservation);
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
            'user_id' => 'sometimes|integer',
            'tarif_id' => 'sometimes|integer',
            'date_depart' => 'sometimes|string',
        ]);

        try {
            $reservation = Reservation::find($id);

            $reservation->user_id = $request->input('user_id');
            $reservation->tarif_id = $request->input('tarif_id');
            $reservation->date_depart = $request->input('date_depart');
            $reservation->save();

            return $this->sendResponse($reservation, 'Modification de reservation réussi');
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
        Reservation::find($id)->delete();
        return $this->sendResponse('Suppression de reservation réussi');
    }
}
