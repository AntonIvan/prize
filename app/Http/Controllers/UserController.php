<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User\UserHandler;

class UserController extends Controller
{
    function register(Request $request) {
        $id = resolve(UserHandler::class)->registerUser($request->name, $request->pass);
        $response = new Response();
        if($id) {
            $response->withCookie(cookie('login', $id,60, null, null, false, false));
        } else {
            $response->content("false");
        }
        return $response;
    }

    function auth(Request $request) {
        $id = resolve(UserHandler::class)->authUser($request->name, $request->pass);
        $response = new Response();
        if($id) {
            $response->withCookie(cookie('login', $id,60, null, null, false, false));
        } else {
            $response->content("false");
        }
        return $response;
    }

    function check(Request $request) {
        if($request->cookie('login')) {
            return resolve(UserHandler::class)->checkUser($request->cookie('login'));
        }
        return false;
    }

    function logout() {
        $response = new Response();
        $response->withCookie(cookie('login', "",60, null, null, false, false));
        return $response;
    }
}
