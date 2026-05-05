<?php

namespace Database\Seeders;

use App\Enums\RoleEnums;
use App\Models\User;
use Exception;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'Products.view',  'Products.create', 'Order.create', "Whishlist.create",
            'Products.edit', 'Products.delete', 'Products.publish',
            'Products.unpublish', 'events.manage',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 2️⃣ Roles
        $SellerRole = Role::firstOrCreate(['name' => RoleEnums::Seller->value, 'guard_name' => 'web']);
        $buyyerRole = Role::firstOrCreate(['name' => RoleEnums::Buyer->value, 'guard_name' => 'web']);

        $SellerRole->syncPermissions([
            'Products.view', 'Products.create', 'Products.edit',
            'Products.delete', 'Products.publish', 'Products.unpublish',
        ]);

        $buyyerRole->syncPermissions(['Order.create'  ,  "Whishlist.create"]);


$userCount = 10;




$users = collect();
for ($i = 0; $i < $userCount; $i += 2) {
    $batchSize = min(2, $userCount - $i);

    try {
        $batchUsers = User::factory()
            ->count($batchSize)

            ->create();
    } catch (Exception $e) {
        Log::error('Failed to create batch of users and products', [
            'error' => $e->getMessage(),
            'batch_size' => $batchSize,

        ]);
        throw $e;
    }


    $batchUsers->each(function ($seller) {
        $seller->assignRole(RoleEnums::Seller->value);
    });

    $users = $users->concat($batchUsers);

    if ($i + $batchSize < $userCount) {
        sleep(3);
    }
}




    }
}
