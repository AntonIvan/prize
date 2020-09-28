<?php

namespace App\Http\Controllers;

use App\Surprise\SurpriseHandler;
use App\Surprise\SurpriseDB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Prize\TransferMoneyInPoints;

class SurpriseController extends Controller
{
    function get(Request $request) {
        $response = new Response();
        resolve(SurpriseHandler::class)->getPrize($request->id);
        $response->content();
        return $response;
    }

    function check($id) {
        return resolve(SurpriseDB::class)->check($id);
    }

    function delete(Request $request) {
        return resolve(SurpriseDB::class)->delete($request->id);
    }

    function receive(Request $request) {
        return resolve(SurpriseHandler::class)->receivePrize($request->id);
    }

    function all($id) {
        return resolve(SurpriseDB::class)->allPrize($id);
    }

    function transfer(Request $request) {
        return resolve(SurpriseHandler::class)->transferPrize($request);
    }

    function transferMoney(Request $request) {
        return resolve(TransferMoneyInPoints::class)->get($request->id);
    }

}
