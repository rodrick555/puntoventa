<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([ProveedoreSeeder::class]);
        $this->call([SucursaleSeeder::class]);
        $this->call([VentaSeeder::class]);
        $this->call([ProductoSeeder::class]);
        $this->call([Producto_VentaSeeder::class]);
        $this->call([Producto_SucursalSeeder::class]);
    }
}
