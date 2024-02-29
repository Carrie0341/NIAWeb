<?php

use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sys_permission_group')->truncate();

        $current = date("Y-m-d H:i:s");
        $permissionForGuest = [
            "Group" => "guest",
            "Function" => json_encode([
                "Post" => [
                    "View" => "/Permission/All"
                ],
            ]),
            "created_at" => $current
        ];

        $permissionForAdmin = [
            "Group" => "administer",
            "Function" => json_encode([
                "Post" => [
                    "View" => "/Permission/All",
                    "Delete" => "/Permission/Delete"
                ],
                
                "Manager" => [
                    "Create" => "/Permission/Manager/Create",
                    "Update" => "/Permission/Manager/Update",
                ]
            ]),
            "created_at" => $current
        ];
        DB::table('sys_permission_group')->where("Group","administer")->orWhere("Group","guest")->delete();
        DB::table('sys_permission_group')->insert([$permissionForGuest,$permissionForAdmin]);
    }
}
