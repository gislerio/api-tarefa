<?php

namespace App\Http\Controllers;

use App\Http\Resources\TarefaResource;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TarefaController extends Controller
{
    /**
     * @OA\Get(
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
    /**
     * @OA\Post(
     *  path="/tarefa",
     *  operationId="CriarTarefa",
     *  tags={"Tarefa"},
     *  summary="Criar Tarefa",
     *  description="retorno usuario data",
     *  security={{"apiAuth":{}}},
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          required={"titulo", "descricao", "status"},
     *          @OA\Property(property="titulo", type="string", format="string", example="titulo"),
     *          @OA\Property(property="descricao", type="string", format="string", example="descrição da tarefa"),
     *          @OA\Property(property="status", type="string", format="string", example="status"),
     *
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200, description="Success",
     *      @OA\JsonContent(
     *          @OA\Property(property="data",type="object")
     *      )
     *  ),
     *  @OA\Response(
     *      response=422,
     *      description="Unprocessable Entity"
     *  )
     * )
     *
     * Show the form for creating a new resource.
     *
     */
    public function store(Request $request): TarefaResource
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'status' => 'in:Pendente,Realizada,Suspensa',
        ]);

        $tarefa = Tarefa::create([
            'titulo' => $validated['titulo'],
            'descricao' => $validated['descricao'],
            'status' => $validated['status'] ?? 'Pendente',
        ]);

        return new TarefaResource($tarefa);

    }

    /**
     * @OA\Put(
     *       path="/tarefa/{id}",
     *       operationId="updateTarefa",
     *       tags={"Tarefa"},
     *       summary="Atualizar tarefa",
     *       description="Returns updated project data",
     *       security={{"apiAuth":{}}},
     *       @OA\Parameter(
     *           name="id",
     *           description="Tarefa id",
     *           required=true,
     *           in="path",
     *           @OA\Schema(
     *               type="integer"
     *           )
     *       ),
     *       @OA\RequestBody(
     *           required=true,
     *           @OA\JsonContent(
     *              required={"status"},
     *              @OA\Property(property="status", type="string", format="string", example="status"),
     *                )
     *       ),
     *       @OA\Response(
     *           response=202,
     *           description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/TarefaResource")
     *       ),
     *       @OA\Response(
     *           response=400,
     *           description="Bad Request"
     *       ),
     *       @OA\Response(
     *           response=401,
     *           description="Unauthenticated",
     *       ),
     *       @OA\Response(
     *           response=403,
     *           description="Forbidden"
     *       ),
     *       @OA\Response(
     *           response=404,
     *           description="Resource Not Found"
     *       )
     *   )
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa): TarefaResource
    {
        $validated = $request->validate(['status' => 'in:Pendente,Realizada,Suspensa']);
        $tarefa->update([$tarefa, 'status' => $validated['status']]);
        return new TarefaResource($tarefa);
    }

    /**
     * @OA\Delete(
     *       path="/tarefa/{id}",
     *       operationId="deleteTarefa",
     *       tags={"Tarefa"},
     *       summary="Delete usuario",
     *       description="Exclui um registro e não retorna nenhum conteúdo",
     *       security={{"apiAuth":{}}},
     *       @OA\Parameter(
     *           name="id",
     *           description="Tarefa id",
     *           required=true,
     *           in="path",
     *           @OA\Schema(
     *               type="integer"
     *           )
     *       ),
     *       @OA\Response(
     *           response=204,
     *           description="Successful operation",
     *           @OA\JsonContent()
     *       ),
     *       @OA\Response(
     *           response=401,
     *           description="Unauthenticated",
     *       ),
     *       @OA\Response(
     *           response=403,
     *           description="Forbidden"
     *       ),
     *       @OA\Response(
     *           response=404,
     *           description="Resource Not Found"
     *       )
     *   )
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa): void
    {
        $tarefa->delete();
    }
}
