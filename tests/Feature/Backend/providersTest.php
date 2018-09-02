<?php

namespace Tests\Feature\backend;

use Tests\TestCase;
use App\User;
use App\Company;
use App\Schedule;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProvidersTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     * @test
     */
    // public function get_Provider_page()
    // {
    //     $this->withoutExceptionHandling();
    //     $user = factory(User::class)->create();
    //     $this->be($user);
    //     $company = factory(Company::class)->create(['user_id'=>$user->id]);
    //     $response = $this->get(route('staff.index',$company));
    //     dd($response->getdata);
    // }
    /**
             *
     * @test
     */
    public function create_a_provider_with_default_schedule()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $provider = factory(User::class)->raw(['password'=>'secret']);
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);

        $response = $this->post(route('providers.store',$provider));
        //dd($company->providers->first()->schedules);
;       $response->assertStatus(200);
        $this->assertDatabaseHas('users',['name'=>$provider['name']]);        
        $this->assertNotEmpty($company->providers->first()->schedules);
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
      $createdStaff = $company->createProviders($staff);
      $schedule = $createdStaff->schedules()->first();

      $response = $this->PATCH(route('schedule.update',$createdStaff->schedules()->first()),[
            'opening_hours_mon' => ['11:00', '12:00']
      ]);

      $response->assertStatus(200);
      $this->assertEquals($schedule->fresh()->opening_hours_mon, ['11:00', '12:00']);
    }

    /**
     * @test
     */
    public function it_get_time_slots_for_service_base_on_provider()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $staff = factory(User::class)->raw();
        $company = $user->addCompany($userCompany);
        $provider = $company->createProviders($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30, 'detail' => 'best service']);
        $service->addWorker($provider);

        $service->addBooking([
            'book_from' => \Carbon\carbon::parse('8/26/2018 10:00 pm'),
            'book_to' => \Carbon\Carbon::parse('8/26/2018 10:00 pm')->addMinutes(30),
            'customer_name' => 'Korri Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id' => $provider->id
        ]);
        // $service->addBooking([
        //     'book_from' => \Carbon\Carbon::now()->addHours(3),
        //     'book_to' => \Carbon\Carbon::now()->addHours(3)->addMinute(30),
        //     'customer_name' => 'Korri Fraser',
        //     'email' => 'lauren@gmail.com',
        //     'phone' => '347-834-0666',
        //     'staff_id' => $provider->id
        // ]);

        $this->assertTrue($service->workers->contains($provider));

        $response = $this->GET("/service/{$service->id}/provider/{$provider->id}/?date=".\Carbon\carbon::now()->format('Y-m-d'));
        dd($response->content());
    }


}
