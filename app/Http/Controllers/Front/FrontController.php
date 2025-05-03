<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeBanner;
use App\Models\HomeWelcome;
use App\Models\HomeCounter;
use App\Models\ScheduleDay;
use App\Models\Speaker;
use App\Models\SponsorCategory;
use App\Models\Sponsor;
use App\Models\Organiser;
use App\Models\Accommodation;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\Posts;

class FrontController extends Controller
{
    public function home(){
        $home_banner  = HomeBanner::where('id',2)->first();
        $home_welcome  = HomeWelcome::where('id',1)->first();
        $home_counter  = HomeCounter::where('id',1)->first();
        $speakers = Speaker::get()->take(4);
        return view('front.home', compact('home_banner' , 'home_welcome' , 'home_counter', 'speakers'));
    }

    public function contact(){
        return view('front.contact');
    }

    public function registration(){
        return view('front.registration');
    }

    public function login(){
        return view('front.login');
    }

    public function registration_submit(Request $request) {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'confirm_password' => ['required','same:password'],
        ]);

        $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $token = hash('sha256',time());
    $user->token = $token;
    $user->status = 0;
    $user->save();

    $verification_link = url('registration-verify/'.$token.'/'.$request->email);
    $subject = "Registration Verification";
    $message = "To complete registration, please click on the link below:<br>";
    $message .= "<a href='".$verification_link."'>Click Here</a>";

    Mail::to($request->email)->send(new Websitemail($subject,$message));

    return redirect()->back()->with('success','Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');

    }
    public function registration_verify($token,$email) {
        $user = User::where('token',$token)->where('email',$email)->first();
        if(!$user) {
            return redirect()->route('login');}
        $user->token = '';
        $user->status = 1;
        $user->update();
    
        return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
    }

    public function login_submit(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
            'status' => 1,
        ];
    
        if(Auth::guard('web')->attempt($data)) {
            return redirect()->route('attendee_dashboard')-> with('success','You are logged in successfully!');
        } else {
            return redirect()->route('login')->with('error','The information you entered is incorrect! Please try again!');
        }

    }

    public function logout(){
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success','Logout is successful!');
    }

    public function dashboard(){
    return view('attendee.dashboard');
    }
    public function profile(){
    return view('attendee.profile');
    }

    public function forget_password(){
    return view('front.forget_password');
    }

    public function forget_password_submit(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
        ]);
    
        $user = User::where('email',$request->email)->first();
        if(!$user) {
            return redirect()->back()->with('error','Email is not found');
        }
    
        $token = hash('sha256',time());
        $user->token = $token;
        $user->update();
    
        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = "Password Reset";
        $message = "To reset password, please click on the link below:<br>";
        $message .= "<a href='".$reset_link."'>Click Here</a>";
    
        Mail::to($request->email)->send(new Websitemail($subject,$message));
    
        return redirect()->back()->with('success','We have sent a password reset link to your email. Please check your email. If you do not find the email in your inbox, please check your spam folder.');


    }
    public function reset_password($token,$email)
    {
    $user = User::where('email',$email)->where('token',$token)->first();
    if(!$user) {
        return redirect()->route('login')->with('error','Token or email is not correct');
    }
    return view('front.reset_password', compact('token','email'));
    }
    public function reset_password_submit(Request $request, $token, $email)
    {
    $request->validate([
        'password' => ['required'],
        'confirm_password' => ['required','same:password'],
    ]);

    $user = User::where('email',$request->email)->where('token',$request->token)->first();
    $user->password = Hash::make($request->password);
    $user->token = "";
    $user->update();

    return redirect()->route('login')->with('success','Password reset is successful. You can login now.');
    }
    public function profile_submit(Request $request){
    $request->validate([
        'name' => ['required'],
        'email' => ['required', 'email'],
        'phone' => ['required'],
        'address' => ['required'],
        'country' => ['required'],
        'city' => ['required'],
        'state' => ['required'],
        'zip' => ['required'],
    ]);

    $user = User::where('id',Auth::guard('web')->user()->id)->first();

    if($request->photo) {
        $request->validate([
            'photo' => ['mimes:jpg,jpeg,png,gif','max:2024'],
        ]);
        $final_name = 'admin_'.time().'.'.$request->photo->extension();
        if($user->photo != '') {
        unlink(public_path('uploads/'.$user->photo));
        }
        $user->photo = $final_name;
        $request->photo->move(public_path('uploads'), $final_name);
    }

    if($request->password) {
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required','same:password'],
        ]);
        $user->password = Hash::make($request->password);
    }

   
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->country = $request->country;
    $user->city = $request->city;
    $user->state = $request->state;
    $user->zip = $request->zip;
    $user->update();

    return redirect()->back()->with('success','Profile is updated!');



    }
    public function speakers(){
        $speakers = Speaker::get();
        return view('front.speakers' , compact('speakers'));
        
    }

    public function speaker($slug)
    {
        $speaker = Speaker::where('slug',$slug)->first();
        if(!$speaker) {
            return redirect()->route('speakers')->with('error','Speaker not found');
        }
        $schedules = $speaker->schedules()->with('schedule_day')->get();
        return view('front.speaker' , compact('speaker','schedules'));  
        
    }

    public function schedule()
    {
        $schedule_days = ScheduleDay::with(['schedules' =>function ($query) {
            $query->with('speakers');
        }])
        ->orderBy('order1', 'asc')->get();
        return view('front.schedule' , compact('schedule_days')); 

    }

    public function sponsors()
    {
        $sponsor_categories = SponsorCategory::with('sponsors')->get();
        return view('front.sponsors', compact('sponsor_categories')); 
    } 

    public function sponsor($slug)
    {
        $sponsor = Sponsor::where('slug',$slug)->first();
        if(!$sponsor) {
            return redirect()->route('sponsors')->with('error','Sponsor not found');
        }
        return view('front.sponsor' , compact('sponsor'));  
        
    }

    public function organisers(){
        $organisers = Organiser::get();
        return view('front.organisers' , compact('organisers'));
        
    }

    public function organiser($slug)
    {
        $organiser = Organiser::where('slug',$slug)->first();
        if(!$organiser) {
            return redirect()->route('organisers')->with('error','Organiser not found');
        }
        return view('front.organiser' , compact('organiser'));  
        
    }

    public function accommodations(){
        $accommodations = Accommodation::get();
        return view('front.accommodations' , compact('accommodations'));
        
    }

    public function photo_gallery(){
        $photos = Photo::paginate(15);
        return view('front.photo_gallery' , compact('photos'));
        
    }

    public function video_gallery(){
        $videos = Video::paginate(15);
        return view('front.video_gallery' , compact('videos'));
        
    }

    public function faq(){
        $faqs = Faq::paginate(15);
        return view('front.faq' , compact('faqs'));
        
    }

    public function testimonial(){
        $testimonials= Testimonial::get();
        return view('front.testimonial', compact('testimonials'));
        
    }






}
 