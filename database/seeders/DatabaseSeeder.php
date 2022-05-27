<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Test;
use App\Models\User;
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
        User::factory(30)->create();
        BlogPost::factory(30)->create();
        Comment::factory(300)->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'subscriber']);
        RoleUser::create(['user_id' => 1, 'role_id' => 1]);
        RoleUser::create(['user_id' => 1, 'role_id' => 2]);
        RoleUser::create(['user_id' => 2, 'role_id' => 2]);
        RoleUser::create(['user_id' => 3, 'role_id' => 2]);
        Comment::whereIn('id', [1,2,3])->update([
            'blog_post_id' => 1
        ]);
        Comment::whereIn('id', [4,5,6])->update([
            'blog_post_id' => null,
            'parent_id' => 1
        ]);
        Comment::whereIn('id', [7,8])->update([
            'blog_post_id' => null,
            'parent_id' => 2
        ]);
        Comment::whereIn('id', [9])->update([
            'blog_post_id' => null,
            'parent_id' => 3
        ]);
    }
}
