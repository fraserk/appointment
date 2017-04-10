<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Service;

class userServiceTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_add_service_from_api()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->JSON('POST', "api/user/{$user->id}/service?api_token={$user->api_token}", ['name'=>'Hair Cut','price'=>20,'duration'=>30]);

        $this->assertDatabaseHas('services', ['name'=>'Hair Cut']);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function user_can_get_own_services()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $user->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $userService = $this->call('get', "api/user/{$user->id}/service?api_token={$user->api_token}")->getContent();

        //$this->assertStatusOK();
    }

    /**
     * @test
     */
    public function user_can_update_own_service()
    {
        $user = factory(User::class)->create();
        $service = $user->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $response = $this->JSON('PATCH', "api/user/{$user->id}/service/{$service->id}?api_token={$user->api_token}", [
        'name' => 'Baldie'
      ]);

        //$userService = Service::findServiceById($response->id);
        //$updateService =  $userService->updateService(['name'=>'Baldie']);
        //$newlyUpdate = Service::findServiceById($service->id)->firstorfail();
        $this->assertDatabaseHas('services', ['name'=>'Baldie']);
        $response->assertStatus(201);
    }
}
