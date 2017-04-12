<?php
use App\Service;
use App\Company;
use  App\Hour;
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
}
