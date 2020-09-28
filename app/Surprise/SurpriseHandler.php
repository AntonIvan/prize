<?php


namespace App\Surprise;

use App\Surprise\SurpriseDB;

class SurpriseHandler
{
    private $prize = [
        "money",
        /*"points",
        "things"*/
    ];

    private $db;

    public function __construct()
    {
        $this->db = resolve(SurpriseDB::class);
    }

    function getPrize($id) {
        try {
            $name = $this->prize[rand(0,count($this->prize)-1)];
            $obj = resolve("prize.".$name)->get();
            $this->db->save($name, $obj, $id);
        } catch (\Throwable $e) {
            return false;
        }
        return true;
    }

    function receivePrize($id) {
        $data = $this->db->receive($id);
        resolve("prize.".$data->some)->save($data->user_id, $data->what);
        $this->db->delete($id);
    }

    function transferPrize($request) {
        return resolve("prize.".$request->transfer)->transfer($request->id);
    }
}
