<?php

namespace App\Models;

use App\Enums\TarefaStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tarefas';

    protected $fillable = [
        'titulo',
        'descricao',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'descricao' => 'string',
        'status' => TarefaStatusEnum::class,
    ];

}
