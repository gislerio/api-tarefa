<?php

namespace App\Http\Controllers;

use App\Http\Resources\TarefaResource;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TarefaController extends Controller
{
    /**
     *  @OA\Get(
     *     path="/tarefa",
     *     operationId="BuscarListaTarefa",
     *     tags={"Tarefa"},
     *     summary="Obter lista de tarefa",
     *     description="Retornar lista de tarefa",
     *     security={{"apiAuth":{}}},
     *
     *  @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/TarefaResource")
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  )
     *)
     *
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return TarefaResource::collection(Tarefa::all());
    }
}
