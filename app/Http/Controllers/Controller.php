<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage()
    {
        $titulo_sistema = "homepage do sistema de gestão para grupo de investimento";
        return view('welcome', [
            'title'=> $titulo_sistema
        ]);
    }
    public function cadastro()
    {
        echo "Tela de cadastro";
    }

    /**
     * Metodo para chamar view login
     */
    public function fazerlogin()
    {
        return view('user.login');
    }
}