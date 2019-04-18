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
            dd($usuario);
            return [
                'sucess' => true,
                'message' => "Usuário cadastrado",
                'data' => $usuario,
            ];
        }
        catch (\Exception $e)
        {
            switch (get_class($e))
            {
                case QueryException::class     : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
                case ValidatorException::class : return [ 'sucess' => false, 'message' =>  $e->getMessageBag()];
                case Exception::class          : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
                default                        : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
            }
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
            switch (get_class($e))
            {
                case QueryException::class     : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
                case ValidatorException::class : return [ 'sucess' => false, 'message' =>  $e->getMessageBag()];
                case Exception::class          : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
                default                        : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
            }
        }
    }
}
