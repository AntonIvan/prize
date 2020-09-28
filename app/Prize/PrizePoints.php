<?php


namespace App\Prize;


class PrizePoints implements IPrize
{
    private $min = 0;
    private $max = 100;
    private $table = "points";

    function get()
    {
        return rand($this->min, $this->max);
    }

    function save($id, $something)
    {
        if($data = \DB::table($this->table)->where('user_id', $id)->first()) {
            \DB::table($this->table)->where('user_id', $id)->update(["points" => $something+$data->points]);
        }
        \DB::table($this->table)->insert(["user_id" => $id, "points" => $something]);
    }

    function transfer($id)
    {
        \DB::table($this->table)->where('user_id', $id)->delete();
        return "Ваши баллы переведены в приложение";
    }
}
