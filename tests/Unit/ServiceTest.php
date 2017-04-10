<?php
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Service;

class ServiceTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_add_service()
    {
        $user = factory(User::class)->create();
        $user->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $this->assertDatabaseHas('services', ['name'=>'Hair Cut']);
    }

    /**
     * @test
     */
    public function can_get_user_services()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $user->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $user->addService(['name'=>'Hair shave','price'=>20,'duration'=>30]);
        $userService = Service::getServiceByOwner()->get();
        $this->assertEquals('2', $userService->count());
    }
}
