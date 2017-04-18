<?php
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Service;
use App\Company;

class ServiceTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_get_company_services()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $this->assertTrue($company->service->contains('name', 'Hair Cut'));
    }

    /**
     * @test
     */
    public function can_get_company_services()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $company = factory(Company::class)->create(['user_id'=>$user->id]);
        $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
        $company->addService(['name'=>'Blow Dry','price'=>20,'duration'=>30]);
        $service = Service::getServiceByCompany($company)->get();
        $this->assertEquals('2', $service->count());
    }
}
