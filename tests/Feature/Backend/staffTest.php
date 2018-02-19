<?php

namespace Tests\Feature\backend;

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
     *
     * @test
     */
    public function get_staff_page()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $response = $this->get(route('staff.index',$company));
        $response->assertStatus(200);
    }
    /**
     *
     * @test
     */
    public function create_a_staff_member()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $staff = factory(User::class)->raw(['password'=>'secret']);
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);

        $response = $this->post(route('staff.store',$staff));
        $response->assertStatus(200);
        $this->assertDatabaseHas('users',['name'=>$staff['name']]);
    }

    /**
     * @test
     */
    public function staff_must_have_default_schedule()
    {
      $this->withoutExceptionHandling();
      $user = factory(User::class)->create();
      $this->be($user);
      $company = factory(Company::class)->create(['user_id'=>$user->id]);
      $staff = factory(User::class)->raw(['password'=>'secret']);
      $createdStaff = $company->addStaff($staff);
      $this->assertEquals('7',$createdStaff->schedules()->count());
    }


    /**
     * @test
     */
    public function Staff_can_update_schedule()
    {
      $this->withoutExceptionHandling();
      $user = factory(User::class)->create();
      $this->be($user);
      $company = factory(Company::class)->create(['user_id'=>$user->id]);
      $staff = factory(User::class)->raw();
      $createdStaff = $company->addStaff($staff);
      $schedule = $createdStaff->schedules()->first();

      $response = $this->PATCH(route('schedule.update',$createdStaff->schedules()->first()),[
          'day_of_week'=> 'Monday',
          'start' => ('10:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
      ]);

      $response->assertStatus(200);
      $this->assertEquals($schedule->fresh()->start, '10:00 am');
    }

    /**
     * @test
     */
    public function it_get_time_slots_for_service_base_on_prvider()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $staff = factory(User::class)->raw();
        $company = $user->addCompany($userCompany);
        $savedStaff = $company->addStaff($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $service->addWorker($savedStaff);
        
        $this->assertTrue($service->workers->contains($savedStaff));

        $response = $this->GET("/service/{$service->id}/provider/{$savedStaff->id}/?date=".\Carbon\carbon::now()->format('Y-m-d'));
        $response->assertStatus(200);
    }


}
