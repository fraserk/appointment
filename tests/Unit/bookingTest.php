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
        $provider = $company->createProviders($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30,'detail'=>'best service']);
        $service->addWorker($provider);

        $service->AddBooking([
            'book_from'=> '2018-02-17 09:00:00',
            'book_to'=> '2018-02-17 09:30:00',
            'customer_name' =>  'Lauren Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id'=> $provider->id
        ]);

        $this->assertEquals('1', $service->bookings()->count() );
    }
    /**
     *
     * @test
     */
    public function it_get_provider_bookings()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $staff = factory(User::class)->raw();
        $company = $user->addCompany($userCompany);
        $provider = $company->createProviders($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30,'detail'=>'best service']);
        $service->addWorker($provider);

        $service->AddBooking([
            'book_from' => '2018-02-17 09:00:00',
            'book_to' => '2018-02-17 09:30:00',
            'customer_name' => 'Lauren Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id' => $provider->id
        ]);
        $service->AddBooking([
            'book_from' => '2018-05-17 09:00:00',
            'book_to' => '2018-05-17 09:30:00',
            'customer_name' => 'Lauren Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id' => $provider->id
        ]);
        
       $this->assertEquals('2',$provider->getBookings()->count());     
      
    }
    /**
     *
     * @test
     */
    public function it_get_provider_bookings_by_day()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $userCompany = factory(Company::class)->raw(['user_id'=>$user->id]);
        $staff = factory(User::class)->raw();
        $company = $user->addCompany($userCompany);
        $provider = $company->createProviders($staff);
        $service = $company->addService(['name'=>'Hair Cut','price'=>20,'duration'=>30,'detail'=>'best service']);
        $service->addWorker($provider);

        $service->addBooking([
            'book_from'=> '2018-02-17 09:00:00',
            'book_to'=> '2018-02-17 09:30:00',
            'customer_name' =>  'Blake Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id'=> $provider->id
        ]        
    );
        $service->addBooking([
            'book_from' => '2018-02-17 10:00:00',
            'book_to' => '2018-02-17 10:30:00',
            'customer_name' =>  'Korri Fraser',
            'email' => 'lauren@gmail.com',
            'phone' => '347-834-0666',
            'staff_id'=> $provider->id
        ]
        
        
    );

        $bookings = $provider->getBookingsByDay('2018-02-17');
        $this->assertEquals('2', $bookings->count());
    }
}
