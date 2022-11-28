<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\NrcCode;

class nrc_code_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nrc_codes = [
            [ 'id' => 1, 'code_no' => '1', 'name' => 'AhGaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 2, 'code_no' => '1', 'name' => 'BaMaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 3, 'code_no' => '1', 'name' => 'KhaPhaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 4, 'code_no' => '1', 'name' => 'DaPhaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 5, 'code_no' => '1', 'name' => 'HaPaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 6, 'code_no' => '2', 'name' => 'BaLaKha', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 7, 'code_no' => '2', 'name' => 'DaMaSa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 8, 'code_no' => '2', 'name' => 'LaKaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 9, 'code_no' => '2', 'name' => 'MaSaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 10, 'code_no' => '2', 'name' => 'PhaSaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 11, 'code_no' => '3', 'name' => 'LaBaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 12, 'code_no' => '3', 'name' => 'KaKaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 13, 'code_no' => '3', 'name' => 'KaSaKa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 14, 'code_no' => '3', 'name' => 'KaDaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 15, 'code_no' => '3', 'name' => 'MaWaTa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 16, 'code_no' => '4', 'name' => 'HaKhaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 17, 'code_no' => '4', 'name' => 'HtaTaLa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 18, 'code_no' => '4', 'name' => 'KaPaLa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 19, 'code_no' => '4', 'name' => 'MaTaPa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 20, 'code_no' => '4', 'name' => 'MaTaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 21, 'code_no' => '5', 'name' => 'AhYaTa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 22, 'code_no' => '5', 'name' => 'BaMaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 23, 'code_no' => '5', 'name' => 'BaTaLa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 24, 'code_no' => '5', 'name' => 'KhaOuNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 25, 'code_no' => '5', 'name' => 'DaPaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 26, 'code_no' => '6', 'name' => 'BaPaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 27, 'code_no' => '6', 'name' => 'HtaWaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 28, 'code_no' => '6', 'name' => 'KaThaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 29, 'code_no' => '6', 'name' => 'KaSaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 30, 'code_no' => '6', 'name' => 'KaSaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 31, 'code_no' => '7', 'name' => 'AhPhaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 32, 'code_no' => '7', 'name' => 'AhTaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 33, 'code_no' => '7', 'name' => 'DaOuNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 34, 'code_no' => '7', 'name' => 'HtaTaPa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 35, 'code_no' => '7', 'name' => 'KaTaTa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 36, 'code_no' => '8', 'name' => 'KaPaKa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 37, 'code_no' => '8', 'name' => 'KhaMaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 38, 'code_no' => '8', 'name' => 'GaGaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 39, 'code_no' => '8', 'name' => 'SaPhaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 40, 'code_no' => '8', 'name' => 'SaPaWa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 41, 'code_no' => '9', 'name' => 'DaKhaTha', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 42, 'code_no' => '9', 'name' => 'LaWaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 43, 'code_no' => '9', 'name' => 'OuTaTha', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 44, 'code_no' => '9', 'name' => 'PaBaTha', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 45, 'code_no' => '9', 'name' => 'PaMaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 46, 'code_no' => '10', 'name' => 'KaKhaMa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 47, 'code_no' => '10', 'name' => 'MaDaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 48, 'code_no' => '10', 'name' => 'PaMaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 49, 'code_no' => '10', 'name' => 'ThaPhaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 50, 'code_no' => '10', 'name' => 'ThaHtaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 51, 'code_no' => '11', 'name' => 'AaMaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 52, 'code_no' => '11', 'name' => 'BaThaTa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 53, 'code_no' => '11', 'name' => 'GaMaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 54, 'code_no' => '11', 'name' => 'KaPhaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 55, 'code_no' => '11', 'name' => 'KaTaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 56, 'code_no' => '12', 'name' => 'AaLaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 57, 'code_no' => '12', 'name' => 'BaHaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 58, 'code_no' => '12', 'name' => 'BaTaHta', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 59, 'code_no' => '12', 'name' => 'DaGaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 60, 'code_no' => '12', 'name' => 'DaGaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 61, 'code_no' => '13', 'name' => 'KhaYaHa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 62, 'code_no' => '13', 'name' => 'HaPaTa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 63, 'code_no' => '13', 'name' => 'HaPaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 64, 'code_no' => '13', 'name' => 'KaLaNa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 65, 'code_no' => '13', 'name' => 'KaLaTa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 66, 'code_no' => '14', 'name' => 'BaKaLa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 67, 'code_no' => '14', 'name' => 'DaNaPha', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 68, 'code_no' => '14', 'name' => 'DaDaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 69, 'code_no' => '14', 'name' => 'PaThaYa', 'created_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 70, 'code_no' => '14', 'name' => 'AhMaNa', 'created_at' => date("Y-m-d H:i:s") ]
        ];

        NrcCode::insert($nrc_codes);
        DB::table('nrc_code')->insert($nrc_codes);
    }

}
