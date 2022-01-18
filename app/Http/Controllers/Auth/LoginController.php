<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Auth;
use Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('/logout');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $respuesta = Http::get(env('APP_URL') . '/api/infoEstudiante', [
            'email' => $email,
            'password' => $password
        ]);

        $obj = json_decode($respuesta->getBody());
        
        if ($obj->status == "true") {
            session(['Informacion_general' => $obj->data_solicitud[0]->Informacion_general]);
            session(['tarjetas' => $obj->data_solicitud[0]->Asignatura_estudiante]);
            session(['tarjetas_vacacional' => $obj->data_solicitud[0]->Asignatura_vacaional]);
            session(['tarjetas_piloto' => $obj->data_solicitud[0]->Asignatura_piloto]);
            session(['vacasional'=> $obj->data_solicitud[0]->Curso_vacaional]);
            session(['piloto'=> $obj->data_solicitud[0]->Curso_piloto]);
            session(['linkClases'=>$obj->data_solicitud[0]->Curso_estudiante]);
            //return response()->json(array($obj));
            return redirect('/dashboard');
        }else{
            Session::flush();
			return redirect('/login')->withErrors("Erros al registrar datos de configuraci¨®n")->withInput();
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        session()->forget('Informacion_general');
        session()->forget('tarjetas');
        Session::flush();
        return redirect('/login');
        //return redirect('https://fimat.com.co/');
    }
}
