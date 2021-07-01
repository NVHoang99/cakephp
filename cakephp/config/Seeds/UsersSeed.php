<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'username' => 'pitocmsssss',
                'email' => 'demo123@admin.com',
                'amount' => '0',
                'password' => '$2y$10$kcprj5VbJlJgcJXx3U5SJuFLmnlk5kNJKrpScZ8HQO6H7O9WgEHpi',
                'image' => 'user-img/template.jpg',
                'status' => '0',
                'created' => '2020-04-01 07:14:22',
                'modified' => '2021-05-26 04:18:06',
            ],
            [
                'id' => '2',
                'username' => 'test232',
                'email' => 'test@test.com',
                'amount' => '0',
                'password' => '$2y$10$jQaO3/f3tpSjbpduPmZ59O99knmqxB8TtQzlfYPfc11AV7Cq/K5S.',
                'image' => 'user-img/8709387_orig.jpg',
                'status' => '0',
                'created' => '2020-04-01 07:14:42',
                'modified' => '2021-05-26 04:18:16',
            ],
            [
                'id' => '11',
                'username' => 'jone2',
                'email' => 'jone2@test.com',
                'amount' => '0',
                'password' => '$2y$10$Gld7CN3KF4LxvizhmQwo/uVgYyU.V2bZDlhIgscoXCZ72dIUQVmzS',
                'image' => 'user-img/8709387_orig.jpg',
                'status' => '1',
                'created' => '2020-04-13 14:33:23',
                'modified' => '2020-04-13 14:33:23',
            ],
            [
                'id' => '12',
                'username' => 'admin123',
                'email' => 'admin123@gmail.com',
                'amount' => '0',
                'password' => '123456',
                'image' => 'user-img/8709387_orig.jpg',
                'status' => '1',
                'created' => '2021-05-25 06:52:40',
                'modified' => '2021-05-25 06:52:40',
            ],
            [
                'id' => '13',
                'username' => 'hahahihi',
                'email' => 'haha@gmail.com',
                'amount' => '0',
                'password' => '$2y$10$rRK3uDiz7M5s2PouAm4cOOJcuKQ/EA0XQOGjRPz9bCBRjOzFPbk1C',
                'image' => 'user-img/IMG_20180208_164510.jpg',
                'status' => '0',
                'created' => '2021-05-25 10:44:52',
                'modified' => '2021-05-26 04:18:26',
            ],
            [
                'id' => '14',
                'username' => 'huutai123',
                'email' => 'huutai123@gmail.com',
                'amount' => '0',
                'password' => '$2y$10$4mFuWBS4r8AcRzbJ9VB4z.yHiDNkJ56.QD0SFNSz59AEPvMFD1CJ.',
                'image' => 'user-img/IMG_1144.JPG',
                'status' => '1',
                'created' => '2021-05-25 11:01:42',
                'modified' => '2021-05-26 04:18:31',
            ],
            [
                'id' => '15',
                'username' => 'quemua',
                'email' => 'quemua@gmail.com',
                'amount' => '0',
                'password' => '$2y$10$f/AmvzV9hAHexIC7ILbXLuAGVUv.SwHqcArR2KI6jaanwrCSoNrTi',
                'image' => 'user-img/IMG_20180217_191046.jpg',
                'status' => '1',
                'created' => '2021-05-26 04:19:50',
                'modified' => '2021-05-26 04:19:58',
            ],
            [
                'id' => '16',
                'username' => 'quynhnhu',
                'email' => 'quynhnhu@gmail.com',
                'amount' => '0',
                'password' => '$2y$10$f8Axb0oMyjajM3xmSY5EzesRfL7nPl6TwDd5E8zrDVlMs93ZvxzCe',
                'image' => 'user-img/IMG_20180217_234221.jpg',
                'status' => '1',
                'created' => '2021-05-26 05:56:16',
                'modified' => '2021-05-26 05:56:16',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
