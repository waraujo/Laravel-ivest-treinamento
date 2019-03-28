<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\InstuitionRepository;
use App\Validators\InstuitionValidator;

/**
 * 
 */
class InstituitionsService 
{
	private $repository;
	private $validator;

	public __construct(InstuitionRepository $repository, InstuitionValidator $Validator){

		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public functio store($data)
	{
		try
        {
/**
 * comando para verificar se o valor recebido atendo os requisitos do validator.
 */
        	$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
/**
 * Sollicitando que o laravel utilize a função create do L5 repository para inserir os dados no banco de dados.
 */
        	$instituiton = $this->repository->create($data);
/**
 * Caso os dados sejam gravados com sucesso ele retorno um array contendo uma mensagem e o objeto gravado.
 */
            return [
                'sucess' => true,
                'message' => "Instituição cadastrado",
                'data' => $instituiton,
            ];
        }
        catch (\Exception $e)
        {
/**
 * caso ele não grave os dadso no banco ele retrona uma mensagem de erro.
 */
            return [
                'sucess' => false,
                'message' => "Erro no cadastro",
            ];
        }
	}

}