<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Company;
use App\service;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class bookingTest extends TestCase
{
    use ReFreshDatabase;
    /**
     *
     * @test
     */
    public function customer_can_book_a_service()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $staff = factory(User::class)->raw();
        $company = $user->addCompany($userCompany);
        $savedStaff = $company->addStaff($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30,'detail'=>'best service']);
        $service->addWorker($savedStaff);

        $service->AddBooking([
            'when'=> '2018-02-17 09:00:00',
            'customer_name' =>  'Lauren Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id'=> $savedStaff->id
        ]);

        $this->assertEquals('1', $service->bookings()->count() );
    }
    /**
     *
     * @test
     */
    public function it_get_provider_appointments()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $staff = factory(User::class)->raw();
        $company = $user->addCompany($userCompany);
        $savedStaff = $company->addStaff($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30,'detail'=>'best service']);
        $service->addWorker($savedStaff);

        $service->AddBooking([
            'when'=> '2018-02-17 09:00:00',
            'customer_name' =>  'Lauren Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id'=> $savedStaff->id
        ]);

        $appointments = $savedStaff->getAppointments();
        $this->assertNotNull($appointments);
    }
}
