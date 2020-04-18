<?php

use App\Models\Base\FormaPagamento;
use App\Models\Base\SituacaoTitulo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        $this->call(TipoOperacaoTableSeeder::class);
        $this->call(FormaPagamentoTableSeeder::class);
        $this->call(SituacaoTituloTableSeeder::class);
    }
}
