<?php


namespace App\Surprise;


class SurpriseDB
{
    private $table = "time";

    function save($name, $what, $id) {
        \DB::table($this->table)->insert([
            "user_id" => $id,
            "some" => $name,
            "what" => $what,
        ]);
    }

    function delete($id) {
        \DB::table($this->table)->where('user_id', $id)->delete();
    }

    function receive($id) {
        return \DB::table($this->table)->where('user_id', $id)->first();
    }

    function check($id) {
        if($data = \DB::table($this->table)->where('user_id', $id)->first()) {
            return (array)$data;
        }
        return false;
    }

    function allPrize($id) {
        $list = ['money', 'points', 'things'];
        foreach ($list as $item) {
            if($item == 'things') {
                $data[$item] = \DB::table($item)->where('user_id', $id)
                    ->get()->implode('things', ", ");
            } else {
                $data[$item] = \DB::table($item)->where('user_id', $id)
                    ->value($item);
            }

        }
        return $data;
    }
}
