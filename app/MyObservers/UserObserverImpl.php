<?php 
    namespace App\MyObservers;

use App\Models\BlogPost;

    class UserObserverImpl implements TestUserObserverInterface {
        public function afterRegister($user) {

        $post = BlogPost::create([
            'title' => $user->name . " example post",
            'body' => 'Example content Example content Example content Example content Example content.',
            'user_id' => $user->id
        ]);

        return $post;
        }
    }
?>