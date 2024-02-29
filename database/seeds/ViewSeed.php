<?php

use Illuminate\Database\Seeder;

class ViewSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement(<<<_END
        CREATE OR REPLACE VIEW user_view
        AS SELECT 
            `users`.`id` AS "id",
            `users`.`name` AS "Name",
            `users`.`phone` AS "Phone",
            `users`.`email` AS "Email",
            (CASE	`user_info`.`type`
                WHEN 1 THEN "教師"
                WHEN 2 THEN "企業"
                WHEN 3 THEN "管理員"	
            END) AS "Type",
            `user_info`.`department` AS "department",
            `user_info`.`companyName` AS "companyName",
            `user_info`.`jobTitle` AS "jobTitle",
            `user_info`.`Created_at` AS "Created_at",
            IF(`users`.`email_verified_at` is not NULL , "true" , "false") AS "Verified"
        FROM
            `users` INNER JOIN `user_info` ON `users`.`remember_token` = `user_info`.`remember_token`
_END
        );
    }
}
