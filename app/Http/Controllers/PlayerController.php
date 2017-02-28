<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use Mailgun\Mailgun;
use GuzzleHttp\Client;
use App\Message;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function receiveMailDep()
    {
//        $mg = new Mailgun('key-7fb2be94dae7a2d45d064bd5a179c29d');
//        $domain = "mail.wheathill.club";
//
//        $mg->get("$domain/messages", array('limit'=> 25, 'skip' => 0));
//
//        dd($mg);

        $client = new Client();

//        $response = $client->request(
//            'GET', 'https://api:key-7fb2be94dae7a2d45d064bd5a179c29d@sw.api.mailgun.net/v3/domains/mail.wheathill.club/messages/eyJwIjpmYWxzZSwiayI6IjAwYmRkM2YzLWJkZDUtNDIwNS05MjljLWU0YzNmYjQxY2I4MCIsInMiOiIwYjE0YWM5MDE3IiwiYyI6InRhbmtiIn0='
//        );

        $response = $client->request(
            'GET', 'https://api:key-7fb2be94dae7a2d45d064bd5a179c29d@api.mailgun.net/v3/mail.wheathill.club/events'
        );



//        $thing = json_decode($response->getBody());

        $response_decoded = json_decode($response->getBody(), true);

//        var_dump($response_decoded['items']);
        foreach ($response_decoded['items'] as $item) {
            $url = $item["storage"]["url"] ;


            $new_url =  str_replace('https://', '', $url);

            $get_message = $client->request(
                'GET', "https://api:key-7fb2be94dae7a2d45d064bd5a179c29d@$new_url"
            );

            $message_decoded = json_decode($get_message->getBody(), true);

            $message = new Message;

            $message->from = $message_decoded['From'];
            $message->message = $message_decoded['stripped-html'];

            $message->save();



        }
        die();

//        echo $array['body-plain'];

        $message = new Message;

        $message->from = $response_decoded['From'];
        $message->message = $response_decoded['stripped-html'];
//        $message->sent = 1;

        $message->save();


//        var_dump($thing->body_plain);
////        var_dump($thing->items);
//        foreach ($thing->items as $thing) {
//            var_dump($thing->storage->url);
//            echo "<hr>";
//        }
    }


    public function receiveMail ()
    {

        $content = $_POST['stripped_html'];
        $file = '/output.txt';
        file_put_contents($file, $content, LOCK_EX);
//hi there
    }



}
