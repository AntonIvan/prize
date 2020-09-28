<?php


namespace App\Prize;


class TransferMoneyInPoints
{

    private $course = 5;

    function get($id) {
        $points = \DB::table('money')->where('user_id', $id)->value('money')*$this->course + \DB::table('points')->where('user_id', $id)->value('points');
        if(\DB::table('points')->where('user_id', $id)->first()) {
            \DB::table('points')->where('user_id', $id)->update(['points' => $points]);
        } else {
            \DB::table('points')->where('user_id', $id)->insert(['points' => $points, "user_id" => $id]);
        }
        \DB::table('money')->where('user_id', $id)->delete();
        return "Денежные средства переведены в баллы";
    }
}
