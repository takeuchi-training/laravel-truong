<?php 

namespace App\MyObservers;

interface TestUserObserverInterface {
    public function afterRegister($user);
}

?>