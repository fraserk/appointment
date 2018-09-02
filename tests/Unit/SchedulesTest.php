<?php

namespace Tests\Unit;

use App\Schedule;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchedulesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     *
     */

     public function it_creates_a_schedule()
     {
        $this->withoutExceptionHandling();
        $schedules = factory(Schedule::class)->create();
        $this->assertEquals(['08:00', '12:00'],$schedules->opening_hours_mon);
        $this->assertEquals(['08:00', '12:00'],$schedules->opening_hours_tue);
        $this->assertEquals(['08:00', '12:00'],$schedules->opening_hours_wed);
        $this->assertEquals(['08:00', '12:00'],$schedules->opening_hours_thur);
        $this->assertEquals(['08:00', '12:00'],$schedules->opening_hours_fri);
        $this->assertEquals(['08:00', '12:00'],$schedules->opening_hours_sat);
        $this->assertEquals(['08:00', '12:00'],$schedules->opening_hours_sun);

     }
   
}
