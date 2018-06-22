<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Request;
use Image;

class BackendController extends Controller
{

    private $api_token;
    private $base_url;

    public function __construct()
    {
        $this->api_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJkMmFkZjczMjE0NGYxNGIwZDNlYjQ2MTJjNDkwMTI0ZWRkNmY3ZDI4YzZlZmM2NmI2ZGFiYWQ4MjVlNGZkNTRlZjllYWI2ZTVmNmE1MDk2In0.eyJhdWQiOiIxIiwianRpIjoiMmQyYWRmNzMyMTQ0ZjE0YjBkM2ViNDYxMmM0OTAxMjRlZGQ2ZjdkMjhjNmVmYzY2YjZkYWJhZDgyNWU0ZmQ1NGVmOWVhYjZlNWY2YTUwOTYiLCJpYXQiOjE1Mjk2MzYzMjQsIm5iZiI6MTUyOTYzNjMyNCwiZXhwIjoxNTYxMTcyMzI0LCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.R_To5uZvzcbNDHF4hIDxTx6hj286fnp_FY7lWy2Ms_6E8EJktC4w2no1w02zkJ07QC7wXHTDLqhrhjKrWmho4b9QUP2Kt-utIsozXhnNrvxAJEKB-dgX1v6azqguerUsidIIapX0kh4RB3sCoXVuUdh8RBMlhSUaTNvnlIFvW3HmyJAhlRtgv7juJVYnwIgS0WY1NKnHAQIRjwD_pnnkdgPSuDaQ1FXpmCggOxYMI6yaZUuyjlyky9apamOHXEbBQPgekSLmp7Bh-AXb76TLkzT-Bj28WNzZljPpxiDxPcAgmtBVBiBfcMvbTIFkhBu23KxVwACN-GHB46kbZZi7YJVJvF0b4Tf73C9h0jTrNo83-fsC5APjet1bLdK-APVuu_hZtdxXC6OCH5YY9LUkLrbU8KMfKFdUC3r7Nt6a9qJLIIhlEGqsMRhW_f0n6QAiIr5jCZz8cTCxUmq17EyknWMpPROuXjUByvtuHRvkyQfJ77vkhdL8wusp_i_1aZknNAV8oTyoxjxhlc8WZtRGyjXLEHMoFeKQs8lRlsnxPXNgMthVOsEaS8ylvI1JZsyfi8AdVss7LppUAH5PibjVqZDvVflBRusIPvhba-Uz8jKvSmCY316tg6nj2-CdmseA4cEe3IlAywsqXLk8g-FFWq7Tjyu8ws8YpLYMgu1mhc0";
        $this->base_url = "http://car-reserve.site/api/";
    }

    public function index()
    {
        return redirect('backend/dashboard');
    }

    public function dashboard()
    {
        return view('backend.pages.dashboard');
    }

    public function login(){
        return view('backend.pages.login');
    }

    public function register(){
        return view('backend.pages.register');
    }

    public function nopermission()
    {
        return view('backend.pages.nopermission');
    }

    public function department()
    {
        return "This is admin area only";
    }

    public function calendars()
    {
        return view('backend.pages.calendars');
    }

    public function bookings()
    {
        return view('backend.pages.bookings');
    }

    public function cardetails()
    {
        // Call API http://car-reserve.site/api/cars
        $client = new Client(); //GuzzleHttp\Client
        $headers = [
            'Authorization' => 'Bearer '.$this->api_token,
            'Accept' => 'application/json',
        ];

        try {
            $response = $client->get($this->base_url."cars", [
                'headers' => $headers,
            ]);
            $cars = json_decode($response->getBody(), true);
            return view('backend.pages.car.cardetails')->with("cars",$cars);
        }catch (RequestException $e) {
                //echo Psr7\str($e->getRequest());
                return "UnAuthorization";
            if ($e->hasResponse()) {
                //echo Psr7\str($e->getResponse());
                return "UnAuthorization";
            }
        }
    }

    public function showevents()
    {

        // Call API http://car-reserve.site/api/events
        $API_URL = "http://car-reserve.site/api/events";
        $TOKEN = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJkMmFkZjczMjE0NGYxNGIwZDNlYjQ2MTJjNDkwMTI0ZWRkNmY3ZDI4YzZlZmM2NmI2ZGFiYWQ4MjVlNGZkNTRlZjllYWI2ZTVmNmE1MDk2In0.eyJhdWQiOiIxIiwianRpIjoiMmQyYWRmNzMyMTQ0ZjE0YjBkM2ViNDYxMmM0OTAxMjRlZGQ2ZjdkMjhjNmVmYzY2YjZkYWJhZDgyNWU0ZmQ1NGVmOWVhYjZlNWY2YTUwOTYiLCJpYXQiOjE1Mjk2MzYzMjQsIm5iZiI6MTUyOTYzNjMyNCwiZXhwIjoxNTYxMTcyMzI0LCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.R_To5uZvzcbNDHF4hIDxTx6hj286fnp_FY7lWy2Ms_6E8EJktC4w2no1w02zkJ07QC7wXHTDLqhrhjKrWmho4b9QUP2Kt-utIsozXhnNrvxAJEKB-dgX1v6azqguerUsidIIapX0kh4RB3sCoXVuUdh8RBMlhSUaTNvnlIFvW3HmyJAhlRtgv7juJVYnwIgS0WY1NKnHAQIRjwD_pnnkdgPSuDaQ1FXpmCggOxYMI6yaZUuyjlyky9apamOHXEbBQPgekSLmp7Bh-AXb76TLkzT-Bj28WNzZljPpxiDxPcAgmtBVBiBfcMvbTIFkhBu23KxVwACN-GHB46kbZZi7YJVJvF0b4Tf73C9h0jTrNo83-fsC5APjet1bLdK-APVuu_hZtdxXC6OCH5YY9LUkLrbU8KMfKFdUC3r7Nt6a9qJLIIhlEGqsMRhW_f0n6QAiIr5jCZz8cTCxUmq17EyknWMpPROuXjUByvtuHRvkyQfJ77vkhdL8wusp_i_1aZknNAV8oTyoxjxhlc8WZtRGyjXLEHMoFeKQs8lRlsnxPXNgMthVOsEaS8ylvI1JZsyfi8AdVss7LppUAH5PibjVqZDvVflBRusIPvhba-Uz8jKvSmCY316tg6nj2-CdmseA4cEe3IlAywsqXLk8g-FFWq7Tjyu8ws8YpLYMgu1mhc0";

        $client = new Client(); //GuzzleHttp\Client
        $headers = [
            'Authorization' => 'Bearer '.$TOKEN,
            'Accept' => 'application/json',
        ];

        try {
            $response = $client->get($API_URL, [
                'headers' => $headers,
            ]);
            return $response;
        }catch (RequestException $e) {
                //echo Psr7\str($e->getRequest());
                return "UnAuthorization";
            if ($e->hasResponse()) {
                //echo Psr7\str($e->getResponse());
                return "UnAuthorization";
            }
        }

    }

    public function addevents()
    {
        // Call API http://car-reserve.site/api/events
        $API_URL = "http://car-reserve.site/api/events";
        $TOKEN = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJkMmFkZjczMjE0NGYxNGIwZDNlYjQ2MTJjNDkwMTI0ZWRkNmY3ZDI4YzZlZmM2NmI2ZGFiYWQ4MjVlNGZkNTRlZjllYWI2ZTVmNmE1MDk2In0.eyJhdWQiOiIxIiwianRpIjoiMmQyYWRmNzMyMTQ0ZjE0YjBkM2ViNDYxMmM0OTAxMjRlZGQ2ZjdkMjhjNmVmYzY2YjZkYWJhZDgyNWU0ZmQ1NGVmOWVhYjZlNWY2YTUwOTYiLCJpYXQiOjE1Mjk2MzYzMjQsIm5iZiI6MTUyOTYzNjMyNCwiZXhwIjoxNTYxMTcyMzI0LCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.R_To5uZvzcbNDHF4hIDxTx6hj286fnp_FY7lWy2Ms_6E8EJktC4w2no1w02zkJ07QC7wXHTDLqhrhjKrWmho4b9QUP2Kt-utIsozXhnNrvxAJEKB-dgX1v6azqguerUsidIIapX0kh4RB3sCoXVuUdh8RBMlhSUaTNvnlIFvW3HmyJAhlRtgv7juJVYnwIgS0WY1NKnHAQIRjwD_pnnkdgPSuDaQ1FXpmCggOxYMI6yaZUuyjlyky9apamOHXEbBQPgekSLmp7Bh-AXb76TLkzT-Bj28WNzZljPpxiDxPcAgmtBVBiBfcMvbTIFkhBu23KxVwACN-GHB46kbZZi7YJVJvF0b4Tf73C9h0jTrNo83-fsC5APjet1bLdK-APVuu_hZtdxXC6OCH5YY9LUkLrbU8KMfKFdUC3r7Nt6a9qJLIIhlEGqsMRhW_f0n6QAiIr5jCZz8cTCxUmq17EyknWMpPROuXjUByvtuHRvkyQfJ77vkhdL8wusp_i_1aZknNAV8oTyoxjxhlc8WZtRGyjXLEHMoFeKQs8lRlsnxPXNgMthVOsEaS8ylvI1JZsyfi8AdVss7LppUAH5PibjVqZDvVflBRusIPvhba-Uz8jKvSmCY316tg6nj2-CdmseA4cEe3IlAywsqXLk8g-FFWq7Tjyu8ws8YpLYMgu1mhc0";

        $client = new Client(); //GuzzleHttp\Client
        $headers = [
            'Authorization' => 'Bearer '.$TOKEN,
            'Accept' => 'application/json',
        ];

        try {
            $response = $client->post($API_URL, [
                'headers' => $headers,
                'form_params' => [
                    'title'             => 'Event 5',
                    'description' => 'This is my event 5',
                    'start'            => '2018-06-22 08:30:00',
                    'end'             => '2018-06-24 08:30:00',
                    'className' => 'bg-danger',
                    'status'        => '1'
                ],
            ]);
            return $response;
        }catch (RequestException $e) {
                //echo Psr7\str($e->getRequest());
                return "UnAuthorization";
            if ($e->hasResponse()) {
                //echo Psr7\str($e->getResponse());
                return "UnAuthorization";
            }
        }
    }

    // Add car form
    public function addcar(){
        return view('backend.pages.car.addcar');
    }

    // Add car process
    public function addcarprocess()
    {
        $client = new Client(); //GuzzleHttp\Client
        $headers = [
            'Authorization' => 'Bearer '.$this->api_token,
            'Accept' => 'application/json',
        ];

        try {
            
            $image = Request::file('carimg_1');
            $file_name = time().$image->getClientOriginalName();

            if (!empty($file_name)) {
                $imgwidth = 500;
                $folderupload = 'assets/images/car';
                $path = public_path($folderupload.'/' . $file_name);

                $img = Image::make($image->getRealPath());
                if ($img->width()>$imgwidth) {
                    $img->resize($imgwidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $img->save($path);
            }

            $response = $client->post($this->base_url."cars", [
                'headers' => $headers,
                'form_params' => [
                    'license'             => Request::input('license'),
                    'cartype'            => Request::input('cartype'),
                    'carseat'            => Request::input('carseat'),
                    'carlevel'           => Request::input('carlevel'),
                    'carimg_1'         => $file_name,
                    'owner'              => Request::input('owner'),
                    'responsibility'  => Request::input('responsibility'),
                    'status'              => Request::input('status')
                ],
            ]);

            //return $response;
            return redirect('backend/cardetails');
        }catch (RequestException $e) {
                //echo Psr7\str($e->getRequest());
                return "UnAuthorization";
            if ($e->hasResponse()) {
                //echo Psr7\str($e->getResponse());
                return "UnAuthorization";
            }
        }
    }
    
}
