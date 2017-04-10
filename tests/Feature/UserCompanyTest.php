<?php
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Company;

class UserCompanyTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_create_a_company()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->make();
        $this->be($user);
        $response = $this->JSON('POST', "api/user/{$user->id}/company?api_token={$user->api_token}", ['name'=>'Barber']);

        $this->assertDatabaseHas('companies', ['name'=> 'Barber']);
        $response->assertStatus(201);
    }
}
