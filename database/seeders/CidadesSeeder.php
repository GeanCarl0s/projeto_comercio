<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesSeeder extends Seeder
{
    public function run()
    {
        $cidades = [
            ['nome' => 'Rio Branco', 'id_estado' => 1],
            ['nome' => 'Cruzeiro do Sul', 'id_estado' => 1],

            ['nome' => 'Maceió', 'id_estado' => 2],
            ['nome' => 'Arapiraca', 'id_estado' => 2],

            ['nome' => 'Macapá', 'id_estado' => 3],
            ['nome' => 'Santana', 'id_estado' => 3],

            ['nome' => 'Manaus', 'id_estado' => 4],
            ['nome' => 'Parintins', 'id_estado' => 4],

            ['nome' => 'Salvador', 'id_estado' => 5],
            ['nome' => 'Feira de Santana', 'id_estado' => 5],

            ['nome' => 'Fortaleza', 'id_estado' => 6],
            ['nome' => 'Juazeiro do Norte', 'id_estado' => 6],

            ['nome' => 'Brasília', 'id_estado' => 7],

            ['nome' => 'Vitória', 'id_estado' => 8],
            ['nome' => 'Vila Velha', 'id_estado' => 8],

            ['nome' => 'Goiânia', 'id_estado' => 9],
            ['nome' => 'Anápolis', 'id_estado' => 9],

            ['nome' => 'São Luís', 'id_estado' => 10],
            ['nome' => 'Imperatriz', 'id_estado' => 10],

            ['nome' => 'Cuiabá', 'id_estado' => 11],
            ['nome' => 'Rondonópolis', 'id_estado' => 11],

            ['nome' => 'Campo Grande', 'id_estado' => 12],
            ['nome' => 'Dourados', 'id_estado' => 12],

            ['nome' => 'Belo Horizonte', 'id_estado' => 13],
            ['nome' => 'Uberlândia', 'id_estado' => 13],

            ['nome' => 'Belém', 'id_estado' => 14],
            ['nome' => 'Santarém', 'id_estado' => 14],

            ['nome' => 'João Pessoa', 'id_estado' => 15],
            ['nome' => 'Campina Grande', 'id_estado' => 15],

            ['nome' => 'Curitiba', 'id_estado' => 16],
            ['nome' => 'Londrina', 'id_estado' => 16],

            ['nome' => 'Recife', 'id_estado' => 17],
            ['nome' => 'Olinda', 'id_estado' => 17],

            ['nome' => 'Teresina', 'id_estado' => 18],
            ['nome' => 'Parnaíba', 'id_estado' => 18],

            ['nome' => 'Rio de Janeiro', 'id_estado' => 19],
            ['nome' => 'Niterói', 'id_estado' => 19],

            ['nome' => 'Natal', 'id_estado' => 20],
            ['nome' => 'Mossoró', 'id_estado' => 20],

            ['nome' => 'Porto Alegre', 'id_estado' => 21],
            ['nome' => 'Caxias do Sul', 'id_estado' => 21],

            ['nome' => 'Porto Velho', 'id_estado' => 22],
            ['nome' => 'Ji-Paraná', 'id_estado' => 22],

            ['nome' => 'Boa Vista', 'id_estado' => 23],

            ['nome' => 'Florianópolis', 'id_estado' => 24],
            ['nome' => 'Joinville', 'id_estado' => 24],

            ['nome' => 'São Paulo', 'id_estado' => 25],
            ['nome' => 'Campinas', 'id_estado' => 25],

            ['nome' => 'Aracaju', 'id_estado' => 26],
            ['nome' => 'Nossa Senhora do Socorro', 'id_estado' => 26],

            ['nome' => 'Palmas', 'id_estado' => 27],
            ['nome' => 'Araguaína', 'id_estado' => 27],
        ];

        foreach ($cidades as $cidade) {
            DB::table('cidades')->updateOrInsert(
                ['nome' => $cidade['nome'], 'id_estado' => $cidade['id_estado']],
                []
            );
        }
    }
}