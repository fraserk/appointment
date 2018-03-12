<?php

namespace Tests\Feature;

use App\User;
use App\Company;
use App\Service;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class createBookingTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     * @test
     */
    public function can_book_a_service()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $staff = factory(User::class)->raw();
        $company = $user->addCompany($userCompany);
        $savedStaff = $company->addStaff($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30, 'detail' => 'best service']);
        $service->addWorker($savedStaff);
        
        $booking = [
            'when'=> '2018-02-17 09:00:00',
            'customer_name' =>  'Lauren Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id'=> $savedStaff->id
        ];
        $response = $this->json('post',"/service/{$service->id}/provider/{$savedStaff->id}",$booking);
        $response->assertStatus(200);
        $this->assertEquals('1', $service->bookings()->count() );
    }
    /**
    *
    * @test
    */
    // public function can_get_a_service_booking()
    // {
    //  $this->withoutExceptionHandling();
    //  $user = factory(User::class)->create();
    //  $this->be($user);
    //  $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
    //  $staff = factory(User::class)->raw();
    //  $company = $user->addCompany($userCompany);
    //  $savedStaff = $company->addStaff($staff);
    //  $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30]);
    //  $service->addWorker($savedStaff);
    
    //  $booking = [
    //      'when'=> '2018-02-17 09:00:00',
    //      'customer_name' =>  'Lauren Fraser',
    //      'email' => 'lauren@gmail.com',
    //      'phone' => '347-834-0666',
    //      'staff_id'=> $savedStaff->id
    //  ];
    //  $response = $this->json('post',"/service/{$service->id}/provider/{$savedStaff->id}",$booking);
    //  $response = $this->json('get',"/backend/mybookings");
    //  $response->assertStatus(200);
    // }
}
