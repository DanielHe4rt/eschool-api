<?php


namespace App\Http\Controllers\Classes;


use App\Entities\Classes\Classes;
use App\FieldManagers\Classes\ClassesFieldManager;
use App\Http\Controllers\ApiController;
use App\Repositories\Classes\ClassesRepository;
use Illuminate\Http\Request;

class ClassesController extends ApiController
{
    public function __construct(Classes $model, ClassesFieldManager $fieldManager, ClassesRepository $repository)
    {
        $this->model = $model;
        $this->fieldManager = $fieldManager;
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     *     path="/classes",
     *     summary="Listagem de matérias com paginação",
     *     operationId="GetClasses",
     *     tags={"classes"},
     *     @OA\Response(
     *         response=200,
     *         description="...",
     *     )
     *
     * )
     */
    public function getClasses(Request $request){
        return parent::index($request);
    }

    /**
     * @OA\Post(
     *     path="/classes",
     *     summary="Criação de uma nova matéria",
     *     operationId="PostClass",
     *     tags={"classes"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Nome da matéria",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="Descrição curta",
     *         required=false,
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
    public function postClass(Request $request){
        return parent::store($request);
    }

    /**
     * @OA\Get(
     *     path="/classes/{classId}",
     *     summary="Retorno de uma matéria",
     *     operationId="GetClass",
     *     tags={"classes"},
     *     @OA\Parameter(
     *         name="classId",
     *         in="path",
     *         description="Id da matéria",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="..."
     *     )
     * )
     */

    public function getClass(Request $request, int $classId){
        return parent::show($request, $classId);
    }

    /**
     * @OA\Put(
     *     path="/classes/{classId}",
     *     summary="Edição de uma matéria matéria",
     *     operationId="PutClass",
     *     tags={"classes"},
     *     @OA\Parameter(
     *         name="classId",
     *         in="path",
     *         description="Id da matéria",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Nome da matéria",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="Descrição curta",
     *         required=false,
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

    public function putClass(Request $request, int $classId){
        $request->merge(['id' => $classId]);
        return parent::update($request, $classId);
    }

    public function deleteClass(Request $request, int $classId){
        return parent::destroy($classId);
    }
}
