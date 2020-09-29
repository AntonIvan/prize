<?php

namespace App\User;

use App\Models\User;

class UserHandler
{
    function registerUser($name, $password) {
        try {
            $user = new User;
            $user->name = $name;
            $user->password = $password;
            $user->save();
        } catch (\Throwable $e) {
            return false;
        }
        return $user->id;
    }

    function checkUser($id) {
        if($user = User::where('id', $id)->first()) {
            return $user->id;
        }
        return false;
    }

    function authUser($name, $password) {
        if($user = User::where('name', $name)->first()) {
            if($user->password == $password) {
                return $user->id;
            }
        }
        return false;
    }

    function sendUser($count) {
        $data = \DB::table('money')->limit($count)->get();
        foreach ($data as $item) {
            resolve("prize.money")->transfer($item->user_id);
        }
        return "Средства отправлены на счет";
    }
}
