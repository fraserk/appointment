<?php

namespace tests\Feature\Backend;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Service;
use App\Company;
class ServiceTest extends TestCase
{
    use RefreshDatabase;


    /**
     * 
     * @test
     */
    public function can_create_service()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $service = factory(Service::class)->raw();
        $response = $this->post(route('service.store'),$service);
        $this->assertDatabaseHas('services',['name'=>$service['name']]);


        
    }
    /**
     * 
     * @test
     */
    public function can_edit_service()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $service = factory(Service::class)->create(['company_id' => $company->id]);
        $response = $this->patch(route('service.update',$service),['name'=>'New Name']);
        $this->assertDatabaseHas('services',['name'=>'New Name']);


        
    }
}
