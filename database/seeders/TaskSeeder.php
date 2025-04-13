<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'title' => 'Fazer compras',
                'description' => 'Comprar comida no supermercado',
                'status' => 'pendente',
                'due_date' => '2025-04-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Limpar a casa',
                'description' => 'Fazer faxina completa no sábado',
                'status' => 'pendente',
                'due_date' => '2025-04-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pagar contas',
                'description' => 'Pagar as contas',
                'status' => 'concluído',
                'due_date' => '2025-04-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Estudar',
                'description' => 'Revisar os capítulos 4 e 5 de matemática',
                'status' => 'em andamento',
                'due_date' => '2025-04-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Agendar consulta',
                'description' => 'Agendar uma consulta com o dentista',
                'status' => 'pendente',
                'due_date' => '2025-04-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Levar o carro para revisão',
                'description' => 'Revisão rotineira no mecânico',
                'status' => 'pendente',
                'due_date' => '2025-04-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
