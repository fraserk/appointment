<?php
use App\Service;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class serviceTimeslotTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_create_service_timeslot()
    {
        $service = factory(Service::class)->create();
        $service->addTimeSlot();
        $this->assertEquals('1', $service->timeslots()->count());
    }

    /**
     * @test
     */
    public function lets_play()
    {
        $start = new DateTime();
        $end = new Datetime('Tomorrow');
        $interval = new DateInterval('PT5M');
        $occurance = '5';
        $period = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {
            return $dt->format('H:i:s') .'\n';
        }
    }
}
