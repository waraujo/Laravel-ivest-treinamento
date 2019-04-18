<?php

namespace App\Services;


use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;

class GroupService
{
	private $repository;
	private $validator;

	 public function __construct(GroupRepository $repository, GroupValidator $validator){

		$this->repository = $repository;
		$this->validator  = $validator;
    }
    
    public function userStore($group_id,$data)
    {
        try
        {
            $group = $this->repository->find($group_id);
            dd($group->users);
            return [
                'sucess' => true,
                'message' => "Usuário relacionado com sucesso",
                'data' => null,
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

	public function store($data)
	{
		try
        {
/**
 * comando para verificar se o valor recebido atendo os requisitos do validator.
 */
        	$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);


 /* Sollicitando que o laravel utilize a função create do L5 repository para inserir os dados no banco de dados.
 */
            $group = $this->repository->create($data);
/**
 * Caso os dados sejam gravados com sucesso ele retorno um array contendo uma mensagem e o objeto gravado.
 */
            return [
                'sucess' => true,
                'message' => "Grupo cadastrado",
                'data' => $group,
            ];
        }
        catch (\Exception $e)
        {
/**
 * caso ele não grave os dadso no banco ele retrona uma mensagem de erro.
 */         switch (get_class($e))
            {
                case QueryException::class     : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
                case ValidatorException::class : return [ 'sucess' => false, 'message' =>  $e->getMessageBag()];
                case Exception::class          : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
                default                        : return [ 'sucess' => false, 'message' =>  $e->getMessage()];
            }
        }
	}
}