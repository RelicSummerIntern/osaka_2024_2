<?php

namespace App\Http\Controllers;

use App\Models\OuterEvents;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Carbon;



class OuterEventsController extends Controller
{
    // 堺市のイベントを取得
    public function fetchEvents()
    {
        $client = HttpClient::create();
        $browser = new HttpBrowser($client);
    
        // Fetch the content of the page
        $crawler = $browser->request('GET', 'https://www.city.sakai.lg.jp/shievent/kankou/calendar/list_calendar.html');
    
        // Debug: Output the entire HTML to ensure it's being fetched correctly
        $html = $crawler->html();
        file_put_contents('debug.html', $html); // This will save the HTML to a file for review
    
        $eventId = 1; // Start ID from 1 or any other starting point
    
        $crawler->filter('#calendarlist tr.event')->each(function (Crawler $row) use (&$eventId) {
            // Extract the date from the 'event' column
            $heldDate = $row->filter('td.event .calendar_day')->text();
            $day = rtrim($heldDate, '日'); // Extract day part
            $year = 2024; // Set the year manually or extract from the page if dynamic
            $month = 8; // Set the month manually or extract from the page if dynamic
            $heldDateTime = Carbon::create($year, $month, $day);
    
            // Extract the event links and names from the 'einfo' column
            $row->filter('td.einfo a')->each(function (Crawler $link) use (&$eventId, $heldDateTime) {
                $eventName = $link->text();
                $eventURL = $link->link()->getUri();
    
                // Save the event to the database
                OuterEvents::updateOrCreate(
                    ['id' => $eventId], // Use the generated ID
                    [
                        'title' => $eventName,
                        'held_datetime' => $heldDateTime,
                        'URL' => $eventURL
                    ]
                );
    
                $eventId++; // Increment the ID for the next event
            });
        });
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OuterEvents $outerEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OuterEvents $outerEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OuterEvents $outerEvents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OuterEvents $outerEvents)
    {
        //
    }
}
