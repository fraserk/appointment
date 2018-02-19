<?php

use App\User;
use App\Service;
use App\Company;
use App\Hour;
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
        $company   = factory(Company::class)->create();
        $hours = factory(Hour::class)->create(['company_id'=>$company->id]);

        $service = factory(Service::class)->create();
        $service->addTimeSlot($company);
        $this->assertNotEmpty($service->timeslots);
    }

    /**
     * @test
     */
    public function it_get_time_slots_for_service()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $company = $user->addCompany($userCompany);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $service->addTimeSlot($company);

        $response = $this->GET("api/company/{$company->id}/service/{$service->id}?api_token={$user->api_token}&date=".Carbon\carbon::now()->format('Y-m-d'));
        $response->assertStatus(200);
    }

}
