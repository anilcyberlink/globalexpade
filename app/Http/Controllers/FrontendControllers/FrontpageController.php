<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingMail;
use App\Mail\AdminContactMail;
use App\Mail\AdminInquiryMail;
use App\Mail\BookingComplete;
use App\Mail\SendMail;
use App\Mail\SendMailContact;
use App\Mail\UserBookingMail;
use App\Mail\VerifyMail;
use App\Model\Contact;
use App\Model\Subscriber;
use App\Model\TravelGuide;
use App\Model\TripBooking;
use App\Model\TripReview;
use App\Model\VerifyContact;
use App\Model\VerifyUser;
use App\Models\Cost\CostExcludesModel;
use App\Models\Cost\CostIncludesModel;
use App\Models\Destinations\DestinationModel;
use App\Models\Inquiry\BookingModel;
use App\Models\Inquiry\CustomizeModel;
use App\Models\Inquiry\TripInquiryModel;
use App\Models\NewsletterSubscriber;
use App\Models\Pages\PageDetails;
use App\Models\Pages\PageDocModel;
use App\Models\Pages\PageModel;
use App\Models\Pages\PageTypeModel;
use App\Models\Posts\AssociatedPostModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Team\TeamModel;
use App\Models\Testimonials\TestimonialModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\RegionModel;
use App\Models\Travels\TripDocModel;
use App\Models\Travels\TripGearModel;
use App\Models\Travels\TripGroupModel;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;

class FrontpageController extends Controller
{
    public function test_booking()
    {
        return view('themes.default.test-booking');
    }

    public function index()
    {
        if ($_GET) {
            Session::put('url', request()->fullUrl());
            $webUrl = Session('url');
            Session::put('tripName', $_GET['trip']);
            Session::put('price', $_GET['price']);
        }
        $banner = TripModel::where(['status' => '1', 'is_menu' => '1'])->orderBy('ordering', 'asc')->limit(6)->get();
        $about_me = PostTypeModel::where(['id' => '1'])->first(); //About ArnoldCoster
        $expeditions_type = PostTypeModel::where(['is_menu' => '1', 'id' => 3])->first();
        $trekkings_type = PostTypeModel::where(['is_menu' => '1', 'id' => 4])->first();
        $trekkings_list = TripModel::where('trip_type', 1)->orderBy('ordering', 'desc')->get();
        $max_day = TripModel::max('duration');
        $popular_trip = TripGroupModel::where('id', 4)->orderBy('ordering', 'asc')->first();
        $testimonial = PostTypeModel::where('id', 5)->orderBy('ordering', 'asc')->first();
        $testimonials = TestimonialModel::where('status', 1)->where('featured', 1)->orderBy('sort_order', 'asc')->get();

        // dd(DestinationModel::with('trips')->orderBy('id','asc')->get());
        return view('themes.default.frontpage', compact(
            'max_day',
            'popular_trip',
            'banner',
            'expeditions_type',
            'trekkings_type',
            'about_me',
            'testimonials',
            'testimonial'
        ));
    }


    public function posttype(Request $request, $uri)
    {
        if (!check_posttype_uri($uri)) {
            abort(404);
        }
        $data = PostTypeModel::where('uri', $uri)->first();
        $tmpl['template'] = 'page';

        if ($data) {
            $posts = PostModel::where(['post_type' => $data->id, 'status' => '1', 'post_parent' => '0'])->orderBy('post_order', 'desc')->paginate(12);
        }
        $items = PostModel::where(['post_type' => $data->id, 'post_parent' => '0'])->orderBy('post_order', 'asc')->get();
        $partners = null;
        // dd($data, $items);

        return view('themes.default.' . $data['template'] . '', compact('data', 'posts', 'items'));
    }


    public function pagedetail($uri)
    {
        if (!check_uri($uri)) {
            abort(404);
        }
        $data['template'] = 'single';
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $associated_posts = array();
        if ($data) {
            $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->get();
        }

        if ($data['template']) {
            $data['template'] = $data['template'];
        }

        $post = PostModel::where('uri', $uri)->first();
        $post_type_id = intval($post->post_type);
        $post_type = PostTypeModel::where('id', $post_type_id)->first();
        $local = PostTypeModel::whereIn('id', ['20', '19'])->get();
        $related = PostModel::whereIn('post_parent', ['22', '23', '24'])->where('id', '!=', $data->id)->orderBy('post_order', 'desc')->take(6)->get();
        $trip_review = TripReview::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        $team = TeamModel::where(['status' => '1'])->paginate(12);
        $terms_policy = PostModel::where(['post_type' => '16', 'status' => '1', 'post_parent' => '0'])->get();
        $data_child = PostModel::where(['post_parent' => $data['id'], 'status' => '1'])->paginate(12);

        return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'related', 'associated_posts', 'trip_review', 'team', 'local', 'post_type', 'terms_policy'));
    }

    public function pagedetail_child($parenturi, $uri)
    {
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $tmpl['template'] = 'single';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }
        $data_child = PostModel::where('id', $data['post_parent'])->first();
        if ($data_child) {

            $data['template'] = $data_child['template_child'];
        }
        $associated_posts = array();
        if ($data) {
            $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->get();
        }

        return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'associated_posts'));
    }


    /***********************************
     ******** Root Navigation ***********
     ************************************/


    public function tripdetail($uri)
    {
        $data = TripModel::where('uri', $uri)->orWhere('trip_code', $uri)->first();
        // dd($data);

        if ($data->id) {
            $itinerary = $data->itineraries()->orderBy('ordering', 'asc')->get();
            $cost_includes = CostIncludesModel::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $cost_excludes = CostExcludesModel::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $photo_videos = TripGearModel::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $photos = TripGearModel::where('trip_detail_id', $data->id)->where('thumbnail', '!=', 'NULL')->orderBy('ordering', 'asc')->get();
            $videos = TripGearModel::where('trip_detail_id', $data->id)->where('video', '!=', 'NULL')->orderBy('ordering', 'asc')->get();
            $trip_docs = TripDocModel::where('trip_id', $data->id)->take(6)->get();
            $guide = TravelGuide::where('trip_id', $data->id)->where('category', '=', 'guide')->get();
            $gear_insurance = TravelGuide::where('trip_id', $data->id)->where('category', '=', 'insurance')->get();
            $gear_payment = TravelGuide::where('trip_id', $data->id)->where('category', '=', 'payment')->get();
            $visiter = $data->visiter + 1;
            $data->visiter = $visiter;
            $data->save();
        }
        $similar_trips = $data->relatedtrips()->orderBy('ordering', 'asc')->get();

        return view('themes.default.tripdetail', compact(
            'data',
            'cost_includes',
            'cost_excludes',
            'itinerary',
            'photo_videos',
            'similar_trips',
            'photos',
            'videos',
            'trip_docs',
            'gear_insurance',
            'gear_payment',
            'guide'
        ));
    }

    //<------------------------------------------Activity Frontend---------------------------------------------->
    public function expeditions()
    {
        $data = DestinationModel::orderBy('id','asc')->paginate(6);
        // dd($data);
        return view('themes.default.expeditions', compact('data'));
    }
    public function expedition($uri)
    {
        $data = DestinationModel::where('uri', $uri)->with('trips')->orderBy('id','asc')->first();
        $trips = $data->trips()->where('status', 1)->orderBy('ordering')->paginate(6);
        // dd($data, $trips);
        return view('themes.default.expedition-list', compact('data', 'trips'));
    }
    public function treks()
    {
        $trips = TripModel::where('trip_type','1')->paginate(6);
        // dd( $trips);
        return view('themes.default.trekking-list', compact('trips'));
    }

    public function travellist($uri)
    {
        $data = ActivityModel::where('uri', $uri)->first();
        $template = $data->template;
        $trips = ActivityModel::find($data->id)->trips()->paginate(12);
        $trips_activity = ActivityModel::find($data->id)->trips()->get();
        $regions_list = RegionModel::paginate(9);
        return view('themes.default.' . $template, compact('data', 'trips', 'trips_activity', 'regions_list'));
    }

    public function regionlist($uri)
    {
        $data = RegionModel::where('uri', $uri)->first();
        $template = $data->template;
        $trips = RegionModel::find($data->id)->trips()->paginate(6);
        return view('themes.default.trekking-regionlist', compact('data', 'trips'));
    }

    public function destinationlist($uri)
    {
        $data = DestinationModel::where('uri', $uri)->first();
        $expeditions = DestinationModel::where('id', '<>', $data->id)->get();
        $trips = DestinationModel::find($data->id)->trips()->paginate(6);
        return view('themes.default.expeditions-trip', compact('data', 'trips', 'expeditions'));
    }

    public function expeditionlist()
    {

        $destinationIds = [1, 2, 3, 4];

        $trips = TripModel::whereHas('destinations', function ($query) use ($destinationIds) {
            $query->whereIn('destination_id', $destinationIds);
        })
            ->where('status', 1)
            ->orderBy('ordering', 'asc')
            ->paginate(6);

        $data=PostTypeModel::where('id',3)->first();

        return view('themes.default.expedition-list', compact('trips','data'));
    }

    public function luxuryTrip($value)
    {
        $data = TripGroupModel::where('id', '3')->first();
        $trips = TripGroupModel::find($data->id)->trips()->paginate(9);
        return view('themes.default.luxury-trip-list', compact('trips', 'data'));
    }

    public function teamdetail($uri)
    {
        $data = TeamModel::where('uri', $uri)->orWhere('team_key', $uri)->first();

        return view('themes.default.team-single', compact('data'));
    }

    //  <! ---Booking a Trip Controller--- !>
    // public function post_tripbooking(Request $request)
    // {
    //     if ($request->isMethod('post')) {
    //         // dd($request->all());
    //         $request->validate([
    //             'full_name' => 'required',
    //             'email' => 'required',
    //             'phone' => 'required',
    //             'country' => 'required',
    //             'h-captcha-response' => 'required|HCaptcha',
    //         ]);
    //         $form = \Illuminate\Support\Facades\Request::input();
    //         if ($request->terms_conditions) {
    //             $create = BookingModel::create($form);
    //             if ($create) {
    //                 // Mail::send(new \App\Mail\AdminBookingMail($request->email));
    //                 return redirect()->route('page.bookingsuccess')->with('success', 'Booking completed successfully');
    //             }
    //         } else {
    //             return back()->with('message', 'Please agree to the terms and conditions.');
    //         }

    //     }
    // }
    public function post_tripbooking(Request $request)
    {
        $request->validate([
            'trip_id'     => 'required|integer',
            'full_name'   => 'required|string|max:255',
            'email'       => 'required|email',
            'phone'       => 'required|string|max:20',
            'country'     => 'required|string|max:100',
            'num_people'  => 'required|integer|min:1',
            'departure_date' => 'required|date',
            'terms_conditions' => 'required',
            // 'h-captcha-response' => 'required|HCaptcha',
        ]);

        $booking = BookingModel::create([
            'trip_id'          => $request->trip_id,
            'title'            => $request->title,
            'departure_date'   => $request->departure_date,
            'num_people'       => $request->num_people,
            'full_name'        => $request->full_name,
            'email'            => $request->email,
            'country'          => $request->country,
            'phone'            => $request->phone,
            'comments'         => $request->comments,
            'terms_conditions' => $request->terms_conditions,
            'status'           => 0,
        ]);

        if ($booking) {

            // ✅ Send email (optional)
            // return new UserBookingMail($booking);
            try {
                Mail::to('info@arnoldcoster.com')->send(new AdminBookingMail($booking));
            } catch (\Exception $e) {
                \Log::error('Mail failed: ' . $e->getMessage());
            }
            try {
                Mail::to($booking->email)->send(new UserBookingMail($booking));
            } catch (\Exception $e) {
                \Log::error('Mail failed: ' . $e->getMessage());
            }

            return redirect()
                ->route('page.bookingsuccess')
                ->with('success', 'Booking completed successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again.');
    }

    public function post_inquiry(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'number' => 'required',
                // 'h-captcha-response' => 'required|HCaptcha',
            ]);
            $post = new TripInquiryModel();
            $post->title = $request->title;
            $post->trip_id = $request->trip_id;
            $post->name = $request->name;
            $post->email = $request->email;
            $post->number = $request->number;
            $post->review = $request->review;
            $post->country = $request->country;
            $post->trip_start_date = $request->trip_start_date;

            if ($post->save()) {
                // return new \App\Mail\TripInquiry($request->email);
                // return new \App\Mail\AdminInquiryMail($request->email);
                try {
                    Mail::to('info@arnoldcoster.com')->send(new AdminInquiryMail());
                } catch (\Exception $e) {
                    \Log::error('Mail failed: ' . $e->getMessage());
                }

                return back()->with('message', 'Inquiry sent successfully');
            }
        }
    }

    //News letter subscriber
    public function newsletter(Request $request)
    {
        // dd((new NewsletterSubscriber())->getFillable());
        try {
            //     Log::info('1');

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);
            Log::info($validator->failed());

            if ($validator->fails()) {

                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Please check the form fields.');
            }
            // Log::info('2');
            $existingSubscriber = NewsletterSubscriber::where('email', $request->email)
                ->first();
            Log::info($existingSubscriber);
            if ($existingSubscriber) {

                return back()
                    ->withInput()
                    ->with('message', 'You are already subscribed.');
            }

            // NewsletterSubscriber::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'subscribed_at' => now(),
            // ]);

            $newslettersubscriber = new NewsletterSubscriber();
            $newslettersubscriber->name = $request->name;
            $newslettersubscriber->email = $request->email;
            $newslettersubscriber->subscribed_at = now();
            $newslettersubscriber->save();


            Log::info('created');
            return back()->with('success', 'Successfully subscribed to our newsletter.');
        } catch (\Exception $e) {
            Log::info($e);
            return back()
                ->withInput()
                ->with('error', 'Unable to process your request right now.');
        }
    }




    public function subscribe(Request $request)
    {
        // Log::info('hi');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);
        if ($validator->fails()) {
            // return response()->json([
            //     'status' => 'error',
            //     'errors' => $validator->errors()->all()
            // ]);
            return back()->with('error', 'You have already subscribed');
        }

        $check = Subscriber::where('email', $request->email)->first();
        // dd($check);
        // if ($check->verified==1)
        // {
        //     return back()->with('error', 'You have already subscribed');

        // }

        $user = Subscriber::create([
            'name' => $request->name,
            'email' => $request->email,
            'verified' => 1,
        ]);

        // $verifyUser = VerifyUser::create([
        //     'user_id' => $user->id,
        //     'token' => Str::random(20)
        // ]);

        // if ($user && $verifyUser) {
        //     //   Session::flash('message', 'Please verify your email to complete registration process');
        //     return response()->json(['message' => 'Please verify your email to complete registration process', 'status' => 'success']);
        //     //   return redirect()->back()->with('message', 'Please verify your email to complete registration process');

        //     return new VerifyMail($verifyUser->token, $user->id, $user->name);
        //     // Mail::send(new VerifyMail($verifyUser->token, $user->id, $user->name));

        // }
        return back()->with('success', 'You have subscribed successfully');
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->users;
            if (!$user->verified) {
                $verifyUser->users->verified = 1;
                $verifyUser->users->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect()->intended(url('/'))->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect()->intended(url('/'))->with('success', $status);
    }

    public function contact_us(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'country' => 'required',
            'h-captcha-response' => 'required|HCaptcha',
        ]);

        if ($request->isMethod('post')) {

            $data = Contact::create([
                'full_name' => $request->first_name,
                'email' => $request->email,
                'number' => $request->number,
                'message' => $request->message,
                'country' => $request->country,
                'title' => $request->title
            ]);

            // return new AdminContactMail($data);
            try {
                Mail::to('info@arnoldcoster.com')->send(new AdminContactMail($data));
            } catch (\Exception $e) {
                \Log::error('Mail failed: ' . $e->getMessage());
            }

            return back()->with('message', 'Contact Form submitted successfully');
        }
    }


    public function verifyContact($token)
    {
        $verifyUser = VerifyContact::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->users;
            if (!$user->verified) {
                $verifyUser->users->verified = 1;
                $verifyUser->users->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect()->intended(url('/'))->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect()->intended(url('/'))->with('success', $status);
    }

    public function show_search_form(Request $request)
    {
        if ($request->isMethod('get')) {
            // $day=int($request->days);
            if ($request->days != NULL) {
                $trips = ActivityModel::find($request->activity)->trips()
                    ->where('duration', '<=', $request->days)
                    ->get();
                return view('themes.default.search-trip', compact('trips'));
            } else {
                return back()->with('error', 'Please enter the number of days.');
            }
        }
    }

    public function showbooking($uri)
    {
        $booking = TripModel::where('uri', $uri)->first();
        $terms = PageTypeModel::where('id', '1')->first();
        return view('themes.default.booking', compact('booking', 'terms'));
    }


    public function showbookingsuccess()
    {
        return view('themes.default.booking-success');
    }

    public function customize_trip(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'comments' => 'required',
                'country' => 'required',
                'trip_start_date' => 'required',
                'h-captcha-response' => 'required|HCaptcha',
            ]);
            $data = $request->all();
            $result = CustomizeModel::create($data);
            if ($result) {
                return new AdminInquiryMail($request->email);
                // Mail::send(new SendInquiry($request->email));
                return redirect()->back()->with('message', 'Inquiry message sent successfully.');
            }
        }
    }

    public function usefulInfo($uri)
    {
        if (!check_pagetype_uri($uri)) {
            abort(404);
        }
        $pages = PageTypeModel::where(['uri' => $uri])->first();
        if ($pages) {
            $data = PageModel::where(['page_type' => $pages->id, 'status' => '1'])->orderBy('page_order', 'asc')->paginate(9);
            return view('themes.default.usefulinfo', compact('data', 'pages'));
        }
        // return abort(404);
    }

    public function usefulInfoDetails($parenturi, $uri)
    {
        $data = PageModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $doc = PageDocModel::where('page_id', $data->id)->get();
        $detail = PageDetails::where('page_id', $data->id)->orderBy('id', 'asc')->get();
        $sorted = $detail->collect();
        $details = $sorted->sortBy('ordering');
        $links = PageTypeModel::where(['is_menu' => '1'])->orderBy('ordering', 'asc')->get();

        return view('themes.default.usefulinfo-detail', compact('data', 'details', 'links', 'doc'));
    }

    //Show Popular Trips List Page
    public function popular_trips_list()
    {
        $popular_trip = TripGroupModel::where('id', 4)->orderBy('ordering', 'asc')->first();
        $popular_trips = $popular_trip->trips()->paginate(9);
        return view('themes.default.common.triplist-popular', compact('popular_trips'));
    }

    // public function redirect_arnold(){
    //     $sessionName = $request->session()->getName();
    //     // Session::put('book_url', request()->fullUrl());
    //     // $d = Session('book_url');
    //     // $r = explode("/",$d);
    //     return redirect('https://demo7.lakhetech.com');
    // }
       public function testimonial()
    {
        $data = PostTypeModel::where('id', 5)->orderBy('ordering', 'asc')->first();
        $testimonials = TestimonialModel::where('status', 1)->where('featured', 1)->orderBy('sort_order', 'asc')->get();

        return view('themes.default.posttypeTemplate-testimonial', compact(
            'testimonials',
            'data'
        ));
    }
}
