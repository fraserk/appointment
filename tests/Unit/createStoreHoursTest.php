<?php

namespace Tests\Feature;

use App\User;
use App\Company;
use App\Hour;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class createStoreHoursTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_create_company_store_hours()
    {
        $user = factory(User::class)->create();
        $this->be($user);

        $company = factory(Company::class)->create();
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Mon']);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Tue']);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Wed']);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Fri']);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Thur']);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Sat']);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Sun']);

        $response = $this->post("api/company/{$company->id}/hour?api_token={$user->api_token}", $storeHours);
        //dd($company->hours()->get());
        $this->assertEquals('7', $company->hours()->count());
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function user_can_update_company_store_hours()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create();
        $storeHours = factory(Hour::class)->create()->id;
        $response = $this->put("api/company/{$company->id}/hour/{$storeHours}?api_token={$user->api_token}", [
          'open_time'=>'11:00 am',
          'close_time'=> '5:50 PM',
          'day_of_week'=>'monday',
          'is_open'=>true
        ]);

        $timeslot = Hour::find($storeHours);

        $this->assertEquals('11:00 AM', $timeslot->open_time);
    }
}
