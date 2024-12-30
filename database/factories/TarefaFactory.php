<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->randomElement([
            'Compras',
            'Academia',
            'Viagem',
        ]);

        $descricao = $this->faker->randomElement([
            'Descrição da tarefa',
        ]);
        $status = $this->faker->randomElement([
            'Pendente',
            'Realizada',
            'Suspensa',
        ]);

        return [
            'titulo' => $titulo,
            'descricao' => $descricao,
            'status' => $status,
        ];
    }
}
