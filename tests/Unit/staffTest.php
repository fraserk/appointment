<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Company;
use App\Schedule;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class staffTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @test
     */
    public function it_creates_a_staff_schedule()
    {
      $this->withExceptionHandling();
      $user = factory(User::class)->create();
      $this->be($user);
      $schedule = factory(Schedule::class)->raw();
      $user->addSchedule($schedule);

      $this->assertEquals('7',$user->schedules()->count());

    }

    /**
     *
     * @test
     */
    // public function it_creates_a_staff_member()
    // {
    //     $this->withoutExceptionHandling();
    //     $user = factory(User::class)->create();
    //     $staff = factory(User::class)->raw(['password' => 'secret']);
    //     $this->be($user);
    //     $company = factory(Company::class)->create(['user_id' => $user->id]);
    //     $company->createStaff($staff);
    //     $this->assertDatabaseHas('users', ['name' => $staff['name']]);
    // }
}
