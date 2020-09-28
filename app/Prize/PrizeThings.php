<?php


namespace App\Prize;


class PrizeThings implements IPrize
{
    private $list = [
        "Предмет1",
        "Предмет2",
        "Предмет3",
        "Предмет4",
    ];

    private $table = "things";

    function get()
    {
        return $this->list[rand(0, count($this->list)-1)];
    }

    function save($id, $something)
    {
        \DB::table($this->table)->insert(["user_id" => $id, "things" => $something]);
    }

    function transfer($id)
    {
        \DB::table($this->table)->where('user_id', $id)->delete();
        return "Ваши вещи будут оправлены по почте";
    }
}
