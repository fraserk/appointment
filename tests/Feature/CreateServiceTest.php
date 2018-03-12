<?php

use Tests\Feature;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Testcase;
use App\User;
use App\Service;
use App\Company;
use App\Hour;
use App\Schedule;

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
        $storeHours = factory(Schedule::class)->raw();
        $company->addStoreHours($storeHours);

        $response = $this->JSON('POST', "api/company/{$company->id}/service?api_token={$user->api_token}", ['name'=>'Hair Cut','price'=>20,'duration'=>30, 'detail' => 'best service']);

        $this->assertDatabaseHas('services', ['name'=>'Hair Cut']);
        $response->assertStatus(200);
    }


    /***
     * @test 
     * 
     */
    public function create_a_new_service()
    {
       $user = factory(user::class)->create();
       $this->be($user);
       $company = factory(Company::class)->create(['user_id' => $user->id]);
       $service = factory(Service::class)->raw();
       $this->get(route('backend.service.create'))->assertStatus(200);
       $response = $this->post(route('backend.service.store',$service));
       $response->assertStatus(202);

    }
    /**
     * @test
     */
    public function user_can_update_own_service()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30, 'detail' => 'best service']);
      
        $response = $this->JSON('PATCH', "api/company/{$company->id}/service/{$service->id}?api_token={$user->api_token}", [
        'name' => 'Baldie'
      ]);

        //$userService = Service::findServiceById($response->id);
        //$updateService =  $userService->updateService(['name'=>'Baldie']);
        //$newlyUpdate = Service::findServiceById($service->id)->firstorfail();
        $this->assertDatabaseHas('services', ['name'=>'Baldie']);
        $response->assertStatus(200);
    }
}
