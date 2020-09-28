<?php


namespace App\Prize;


class PrizeMoney implements IPrize
{
    private $min = 0;
    private $max = 100;
    private $table = "money";

    function get()
    {
        return rand($this->min, $this->max);
    }

    function save($id, $something)
    {
        if($data = \DB::table($this->table)->where('user_id', $id)->first()) {
            \DB::table($this->table)->where('user_id', $id)->update(["money" => $something+$data->money]);
        }
        \DB::table($this->table)->insert(["user_id" => $id, "money" => $something]);
    }

    function transfer($id)
    {
        \DB::table($this->table)->where('user_id', $id)->delete();
        return "Ваши средства направленны в банк";
    }
}
