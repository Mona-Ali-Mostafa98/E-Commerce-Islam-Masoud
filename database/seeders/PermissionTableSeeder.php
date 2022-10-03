<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Dashboard',

            'Settings',
            'Update Settings',

            'Services List',
            'Add Service',
            'Show Service',
            'Update Service',
            'Delete Service',

            'List Offers',
            'Add Offer',
            'Show Offer',
            'Update Offer',
            'Delete Offer',

            'List Partners',
            'Add Partner',
            'Show Partner',
            'Update Partner',
            'Delete Partner',



            'List Sliders',
            'Add Slider',
            'Show Slider',
            'Update Slider',
            'Delete Slider',


            'List Blogs',
            'Add Blog',
            'Show Blog',
            'Update Blog',
            'Delete Blog',


            'List Products',
            'Add Product',
            'Show Product',
            'Update Product',
            'Delete Product',

            'Show Product Rating',


            'List Cities',
            'Add City',
            'Show City',
            'Update City',
            'Delete City',

            'List States',
            'Add State',
            'Show State',
            'Update State',
            'Delete State',


            'List Admins',
            'Add Admin',
            'Show Admin',
            'Update Admin',
            'Delete Admin',

            'List Roles',
            'Add Role',
            'Show Role',
            'Update Role',
            'Delete Role',

            'List Users',
            'Add User',
            'Show User',
            'Update User',
            'Delete User',

            'Galleries',
            'Add Image',
            'Show Image',
            'Update Image',
            'Delete Image',

            'List CartS',
            'Show User Cart',
            'Show User Wishlist',
            'Show User Comments On Product',


            'List Contact Us',
            'Show Contact Us',
            'Delete Contact Us',


            'List Subscribes',
            'Delete Subscribe',


            'List Orders',
            'Add Order',
            'Show Order',
            'Update Order',
            'Delete Order',
            'Reject Order',
            'Chang Order Status',
            'Show Order Items',
            'Show Order Address',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}