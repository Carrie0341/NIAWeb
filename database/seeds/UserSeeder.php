<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Initial Key */
        $teacherToken = md5("teacher");
        $companyToken = md5("company");
        $adminToken = md5("admin");
        $current = date("Y-m-d H:i:s");


        if( !DB::table('users')->where('account' , 'teacher')->exists() )
        {
             $id = DB::table('users')->insertGetId([
                "name" => "teacher",
                "account" => "teacher",
                "phone" => "0900123456",
                "email" => "teacher@example.com",
                "email_verified_at" => $current,
                "password" => Hash::make("01234567"),
                "remember_token" => $teacherToken,
                "created_at" => $current
            ]);

            

            DB::table('user_info')->insert([
                "user_id" => $id,
                "remember_token" => $teacherToken,
                "type" => 1,
                "department" => "teacher",
                "created_at" => $current
            ]);
        }
        
        if( !DB::table('users')->where('account' , 'company')->exists() )
        {
             $id = DB::table('users')->insertGetId([
                "name" => "company",
                "account" => "company",
                "phone" => "0900123456",
                "email" => "company@example.com",
                "email_verified_at" => $current,
                "password" => Hash::make("01234567"),
                "remember_token" => $companyToken,
                "created_at" => $current
            ]);

            

            DB::table('user_info')->insert([
                "user_id" => $id,
                "remember_token" => $companyToken,
                "companyName" => "companyName",
                "jobTitle" => "jobTitle",
                "type" => 2,
                "department" => "company",
                "personal" => json_encode(["1","2","4"] , JSON_UNESCAPED_UNICODE),
                "created_at" => $current
            ]);
        }

        if( !DB::table('users')->where('account' , 'admin')->exists() )
        {
            $id = DB::table('users')->insertGetId([
                "name" => "admin",
                "account" => "admin",
                "phone" => "0900123456",
                "email" => "admin@example.com",
                "email_verified_at" => $current,
                "password" => Hash::make("01234567"),
                "remember_token" => $adminToken,
                "created_at" => $current
            ]);

            

            DB::table('user_info')->insert([
                "user_id" => $id,
                "remember_token" => $adminToken,
                "type" => 3,
                "department" => "administrator",
                "created_at" => $current
            ]);
        }

        $id = DB::table('users', 'remember_token')->first()->id;
        for($i = 0 ; $i < 5 ; ++$i)
        {
            DB::table('request')->insert([
                "name" => "提案者",
                "company" => str_random(3)."公司",
                "jobTitle" => "職稱",
                "phone" => "0900123456",
                "email" => "company@example.com",
                "request" => "提案主題".str_random(5),
                "describe" => "提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述提案描述",
                "accept" => true,
                "belongTo" => ($i%2 ? "1" : "2"),
                "user_id" => $id
            ]);
        }
    }
}
