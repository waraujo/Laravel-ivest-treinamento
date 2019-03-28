<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;



class UserServices{

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository,UserValidator $validator)
    {
            $this->repository = $repository;
            $this->validator = $validator;
    }
    public function store($data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $usuario = $this->repository->create($data);

            return [
                'sucess' => true,
                'message' => "Usuário cadastrado",
                'data' => $usuario,
            ];
        }
        catch (\Exception $e)
        {
            return [
                'sucess' => false,
                'message' => "Erro no cadastro",
            ];
        }
    }
    public function update(){}
    public function destroy($user_id)
    {
        try
        {
            

            $usuario = $this->repository->delete($user_id);

             session()->flash('sucess',[
            'sucess'    => $request['sucess'],
            'message'   => $request['message']

        ]);
        }
        catch (\Exception $e)
        {
            return [
                'sucess' => false,
                'message' => "Erro no cadastro",
            ];
        }
    }
}
