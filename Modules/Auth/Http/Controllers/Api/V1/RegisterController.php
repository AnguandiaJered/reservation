<?php

namespace Modules\Auth\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Traits\JsonResponseTrait;
use Modules\Auth\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $user = User::orderBy('id','desc')->paginate(5);
        return $this->sendData($user);
    }

    public function register(RegisterRequest $request)
    {
      
        // $user = User::where('phone', User::getParsedPhone('phone'))->orWhere('email', $request->input('email'))->first();
        $user = User::findForSanctum($request->input('email'));

        if (!$user) {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = User::getParsedPhone('phone');
            $user->country_code = User::getParsedCountryCode('phone');
            $user->password = bcrypt($request->input('password'));
            $user->adresse = $request->input('adresse');
            $user->sexe = $request->input('sexe');
            $user->nationalite = $request->input('nationalite');
            $user->active = true;
            $user->verified = true;
            $user->save();

            return $this->sendResponse($user, 'Création compte réussi');
        }
        return $this->sendErrorResponse('Ce numéro ou email existe déjà dans notre base de données');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->sendData($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|string',
            'phone' => 'sometimes|string',
            'password' => 'sometimes|string',
            'adresse' => 'sometimes|string',
            'sexe' => 'sometimes|string',
            'nationalite' => 'sometimes|string',
        ]);
       
        try {
            $user = User::findOrFail($id);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = User::getParsedPhone('phone');
            $user->country_code = User::getParsedCountryCode('phone');
            $user->password = bcrypt($request->input('password'));
            $user->adresse = $request->input('adresse');
            $user->sexe = $request->input('sexe');
            $user->nationalite = $request->input('nationalite');
            $user->active = true;
            $user->verified = true;
            $user->save();

            return $this->sendResponse($user, 'Compte modifier');
        } catch (\Exception $ex) {
            return $this->sendErrorResponse('Echec de modification');
        }
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return $this->sendResponse('Suppression de client réussi');
    }
}
