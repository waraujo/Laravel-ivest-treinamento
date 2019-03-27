<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;


class DashboardControler extends Controller
{
    private $repository;
    private $validator;


    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index(){
        return view('user.dashboard');
    }
    public function auth(Request $request){

        $data=[
            'email' => $request->get('username'),
            'password' => $request->get('password')
        ];
        try
        {
            if (env('PASSWORD_HASH')){

                Auth::attempt($data,true);
            }
            else
            {
                /* comando para verificar se o e-mail e senha esta ok**/
                $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
                if (!$user){
                    throw new Exception("E-mail digitado errado");
                }
                if ($user->password != $request->get('password')){

                    throw new Exception("Senha inválida!!");
                }
                /* comando para autenticar o usaurio no banco**/
                Auth::login($user);

            }

            return redirect()->route('user.dashboard');
        }
        catch (Exception $e){

            return $e->getMessage();
        }

    }
}
