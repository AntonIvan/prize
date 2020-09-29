<?php


namespace App\Prize;


class PrizeMoney implements IPrize
{
    private $min = 0;
    private $max = 100;
    private $table = "money";
    private $prize = "prize_money";

    function get()
    {
        $data = rand($this->min, $this->max($this->returnMoney()));
        return $data;
    }

    function save($id, $something)
    {
        if($data = \DB::table($this->table)->where('user_id', $id)->first()) {
            \DB::table($this->table)->where('user_id', $id)->update(["money" => $something+$data->money]);
        }
        \DB::table($this->table)->insert(["user_id" => $id, "money" => $something]);
        \DB::table($this->prize)->where('id', 1)->update(["money" => $this->returnMoney()-$something]);
    }

    function transfer($id)
    {
        \DB::table($this->table)->where('user_id', $id)->delete();
        return "Ваши средства направленны в банк";
    }

    function max($data) {
        if($data > $this->max) {
            return $this->max;
        }
        return $data;
    }

    function returnMoney() {
        return \DB::table($this->prize)->where('id', 1)->first()->money;
    }
}
