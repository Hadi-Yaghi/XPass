<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Event;
use App\Models\Booking;
class TestModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hadi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test test';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        // $user  = User::create([
        //     'name' => 'Hadi Yaghi',
        //     'email' => 'hadi@gmail.com',
        //     'password' => bcrypt('password123'),
        // ]);

        // $user = User::find(1);

        // $user = User::create([
        //     'name' => 'Roy Eid',
        //     'email' => 'Roy@gmail.com',
        //     'password' => bcrypt('password123'),
        // ]);

        // $event = Event::create([
        //     'title' => 'Sample Event',
        //     'description' => 'This is a sample event description.',
        //     'location' => 'New York',
        //     'start_date' => now(),
        //     'end_date' => now()->addDays(2),
        //     'price' => 100.00,
        //     'total_tickets' => 50,
        //     'available_tickets' => 50,
        //     'image' => 'sample-event.jpg',
        //     'category' => 'Music',
        //     'is_active' => true,
        //     'status' => 'upcoming',
        //     'organizer_user_id' => 1,
        //     'referral_code' => 'REF12345',
        // ]);

        // dd($event);


        //another way to create event
        // $event  = new Event();
        // $event->title = 'Birthday Party';
        // $event->description = 'Birthday celebration event.';
        // $event->location = 'Los Angeles';
        // $event->start_date = now(); 
        // $event->end_date = now()->addDays(3);
        // $event->price = 150.00;
        // $event->total_tickets = 100;
        // $event->available_tickets = 100;
        // $event->image = 'birthday-party.jpg';
        // $event->category = 'Art';
        // $event->is_active = true;
        // $event->status = 'upcoming';
        // $event->organizer_user_id = 1;
        // $event->referral_code = 'REF67890';
        // $event->save(); 


        // dd($event);
        
        //select all events
        // $events = Event::all();
        // dd($events->toArray());
        

        //slect event by id
        // $event = Event::find(1);
        // dd($event->toArray());

        // $event = Event::create([
        //     'title' => 'Free Concert',
        //     'description' => 'Enjoy a free concert in the park.',
        //     'location' => 'Central Park',
        //     'start_date' => now()->addDays(5),
        //     'end_date' => now()->addDays(5)->addHours(3),
        //     'price' => 0.00,
        //     'total_tickets' => 200,
        //     'available_tickets' => 200,
        //     'image' => 'free-concert.jpg',
        //     'category' => 'Music',
        //     'is_active' => true,
        //     'status' => 'upcoming',
        //     'organizer_user_id' => 2,
        //     'referral_code' => 'FREECONCERT2024',
        // ]);

        //slect events with price less than 100
        // $events = Event::where('price',  100)->get();
        // dd($events->toArray());

        // $event = Event::where('price'50)->where('available_tickets', '>', 0)->get();
        // dd($event->toArray());


        // $event = Event::where('id'  , 1)->update(['available_tickets' => 40]);
        
    //    $event = Event::find(1);
    //    $bookings =$event->bookings()->create([
    //     'event_id' => 1,
    //     'user_id' => 1,
    //     'quantity' => 2,
    //     'total_amount' => 200.00,
        
    //     'status' => 'pending',
    //    ]);
    //    dd($bookings->toArray());

    $user = User::with('bookings.event')->find(1);
    // $bookings = $user->bookings;
    // dd($bookings->toArray());
    dd($user->toArray());
    }
    
}
