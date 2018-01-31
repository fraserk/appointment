<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Company;
use App\Hour;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_set_company_store_hours()
    {
        $company = factory(Company::class)->create();
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Monday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Tuesday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Wednesday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Thursday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Friday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Saturday','company_id'=>$company->id]);
        $storeHours[] = factory(Hour::class)->raw(['day_of_week'=>'Sunday','company_id'=>$company->id]);

        $company->addStoreHours($storeHours);
        $getStoreHours = $company->hours()->get();

        $this->assertEquals('7', $getStoreHours->count());
    }

    /**
     * @test
     */
    public function can_add_company()
    {
        $user = factory(User::class)->create();
        $this->be($user);

        $user->addCompany(['name'=>'Barber']);
        $this->assertDatabaseHas('companies', ['name'=>'Barber']);
    }
    /**
     * @test
     */
    public function it_adds_storehours_after_company_is_created()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $company = $user->addCompany(['name'=>'Barber']);

        $this->assertNotEmpty($company->hours()->get());
    }

    /**
     * @test
     */

     public function it_add_staff_to_company()
     {

        $user = factory(User::class)->create();
        $staff = factory(User::class)->raw();
        $this->be($user);
        $company= factory(Company::class)->create(['user_id'=>$user->id]);
        $company->addStaff($staff);
        $this->assertEquals('1', $company->staffs()->count());       

     }
}
