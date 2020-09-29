<?php


namespace App\Prize;


class PrizeThings implements IPrize
{
    private $list;

    private $table = "things";
    private $prize = "prize_things";


    public function __construct()
    {
        $this->list = $this->returnThings();
    }

    function get()
    {
        return $this->returnThings()[rand(0, count($this->returnThings())-1)]->what;
    }

    function save($id, $something)
    {
        \DB::table($this->prize)->where('what', $something)->delete();
        \DB::table($this->table)->insert(["user_id" => $id, "things" => $something]);
    }

    function transfer($id)
    {
        \DB::table($this->table)->where('user_id', $id)->delete();
        return "Ваши вещи будут оправлены по почте";
    }

    function returnThings() {
        return \DB::table($this->prize)->get()->toArray();
    }
}
