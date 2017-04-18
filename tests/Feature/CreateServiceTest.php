<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Service;
use App\Company;
use App\Hour;

class CreateServiceTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_add_service_from_api()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Monday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Tuesday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Wednesday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Thursday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Friday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Saturday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Sunday','company_id'=>$company->id]);
        $company->addStoreHours($storeHours);

        $response = $this->JSON('POST', "api/company/{$company->id}/service?api_token={$user->api_token}", ['name'=>'Hair Cut','price'=>20,'duration'=>30]);

        $this->assertDatabaseHas('services', ['name'=>'Hair Cut']);
        $response->assertStatus(201);
    }



    /**
     * @test
     */
    public function user_can_update_own_service()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
      
        $response = $this->JSON('PATCH', "api/company/{$company->id}/service/{$service->id}?api_token={$user->api_token}", [
        'name' => 'Baldie'
      ]);

        //$userService = Service::findServiceById($response->id);
        //$updateService =  $userService->updateService(['name'=>'Baldie']);
        //$newlyUpdate = Service::findServiceById($service->id)->firstorfail();
        $this->assertDatabaseHas('services', ['name'=>'Baldie']);
        $response->assertStatus(201);
    }
}