<?php


namespace App\Prize;


interface IPrize
{

    function get();

    function save($id, $something);

    function transfer($id);
}
