<?php


namespace Tests\Unit;
use App\Prize\PrizeMoney;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransferMoneyInPointsTest extends TestCase
{
    use RefreshDatabase;

    function testRun() {
        $this->seed(DatabaseSeeder::class);
        $prize = resolve(PrizeMoney::class);
        foreach (\DB::table('users')->get() as $item) {
            $this->assertEquals("Ваши средства направленны в банк", $prize->transfer($item->id));
        }

    }

}
