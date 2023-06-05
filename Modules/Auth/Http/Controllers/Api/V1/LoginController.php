<?php

namespace Modules\Auth\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Auth\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Modules\Auth\Transformers\UserResource;

class LoginController extends Controller
{
    use JsonResponseTrait, AuthenticatesUsers;

    public function login(LoginRequest $request)
    {
        //code d'auth avec sanctum
        $user = User::findForSanctum($request->input('phone')); //User::where('email', $request->email)->first();

        //check the password
        if (
            !$user || !Hash::check($request->password, $user->password)
        ) {
            return $this->sendErrorResponse('Verifier votre authentification svp !!!');
        }

        if ($user->active) {
            if ($user->verified) {
                $token = $user->createToken($request->input('device_name'))->plainTextToken;

                $reponse = [
                    'user' => new UserResource($user),
                    'token' => $token
                ];

                return $this->sendResponse($reponse, ' Vous etes bien connecté sur notre app');
            } else {
                return $this->sendErrorResponse('Votre compte n\'est pas vérifier');
            }
        } else {
            return $this->sendErrorResponse('Votre compte est désativer');
        }
    }

    public function logout(Request $request)
    {

        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status' => 'true',
                'message' => 'Vous etes déconnecté'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => $e->getMessage()
            ]);
        }
    }
}
