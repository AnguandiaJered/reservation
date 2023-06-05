<?php

namespace Modules\Paiement\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\JsonResponseTrait;
use Modules\Paiement\Entities\Agent;
use Modules\Paiement\Http\Requests\AgentRequest;

class AgentController extends Controller
{
    use JsonResponseTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $agent = Agent::with(['fonction'])->orderBy('id','desc')->paginate(5);
        return $this->sendData($agent);
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
    public function store(AgentRequest $request)
    {
       try {
            $agent = new Agent;

            $agent->noms = $request->input('noms');
            $agent->sexe = $request->input('sexe');
            $agent->adresse = $request->input('adresse');
            $agent->etatcivil = $request->input('etatcivil');
            $agent->email = $request->input('email');
            $agent->fonction_id = $request->input('fonction_id');
            $agent->contact = $request->input('contact');
            $agent->nationalite = $request->input('nationalite');

            $agent->save();

            return $this->sendResponse($agent, 'Enregistrement de l\'agent réussi');
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
        $agent = Agent::findOrFail($id);
        return $this->sendData($agent);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        return $this->sendData($agent);
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
            'noms' => 'sometimes|string',
            'sexe' => 'sometimes|string',
            'adresse' => 'sometimes|string',
            'etatcivil' => 'sometimes|string',
            'email' => 'sometimes|string',
            'fonction_id' => 'sometimes|integer',
            'contact' => 'sometimes|string',
            'nationalite' => 'sometimes|string'
        ]);

        try {
            $agent = Agent::findOrFail($id);

            $agent->noms = $request->input('noms');
            $agent->sexe = $request->input('sexe');
            $agent->adresse = $request->input('adresse');
            $agent->etatcivil = $request->input('etatcivil');
            $agent->email = $request->input('email');
            $agent->fonction_id = $request->input('fonction_id');
            $agent->contact = $request->input('contact');
            $agent->nationalite = $request->input('nationalite');

            $agent->save();

            return $this->sendResponse($agent, 'Modification de l\'agent réussi');
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
        Agent::find($id)->delete();
        return $this->sendResponse('Suppression de l\'agent réussi');
    }
}
