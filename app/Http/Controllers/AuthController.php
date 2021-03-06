<?php


namespace App\Http\Controllers;


use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


class AuthController extends Controller
{
    use ApiResponse;
    public function __construct()
    {}

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     summary="Autenticação de usuário",
     *     operationId="AuthLogin",
     *     tags={"auth"},
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="E-mail para autenticação",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="Senha para autenticação",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="...",
     *     )
     * )
     */

    public function authenticate(Request $request){
        $this->validate($request,[
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $data = [
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'username' => $request->input('email'),
            'password' => $request->input('password'),
            'scope' => ''
        ];

        $request = Request::create('/oauth/token','POST', $data);
        $response = App::dispatch($request);


        if($response->getStatusCode() === 200){
            $authContent = json_decode($response->getContent());
            return $this->success([$authContent]);
        }
        if($response->getStatusCode() === 400 || $response->getStatusCode() === 401) {
            return $this->unauthorized(['unauthorized']);
        }
        if($response->getStatusCode() >= 500){
            return $this->internalError(['chama o papa q deu merda']);
        }

        return $this->internalError();
    }
}
