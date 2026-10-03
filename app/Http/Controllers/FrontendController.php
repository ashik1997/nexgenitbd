<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Demo;
use App\Models\BulkSms;
use App\Models\BulkSmsOrder;
use App\Models\CustomPage;
use App\Models\DomainOrder;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\GraphicOrder;
use App\Models\HomeContent;
use App\Models\HostingPackage;
use App\Models\HostingPackageOrder;
use App\Models\Testimonial;
use App\Models\WebDesign;
use App\Models\WebDesignOrder;
use App\Models\WebDesignPackage;
use App\Models\WebDesignPackageOrder;
use App\Models\WebsiteBanner;
use App\Models\WebsiteClient;
use App\Models\WebsiteGraphic;
use App\Models\WebsiteMessage;
use App\Models\WebsiteSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class FrontendController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('id','desc')->take(6)->get();
        $website_banners = WebsiteBanner::all();
        $website_clients = WebsiteClient::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $testimonials = Testimonial::all();
        $home_contents = HomeContent::all();
        return view('frontend.home',compact('website_clients','website_banners','blogs','testimonials','home_contents'));
    }

    public function contact(){
        return view('frontend.contact-us');
    }

    public function blogShow($slug){
        $blog = Blog::where('slug', $slug)->first();
        return view('frontend.blog-detail', compact('blog'));
    }

    // faqs
    public function faqs(){
        $faqs = Faq::all();
        return view('frontend.faqs', compact('faqs'));
    }

    public function gallery(){
        $galleries = Gallery::all();
        return view('frontend.images', compact('galleries'));
    }

    public function blogIndex(){
        $blogs = Blog::orderBy('id','desc')->get();
        return view('frontend.blogs', compact('blogs'));
    }

    public function projects(){
        $demos = Demo::orderBy('id','desc')->get();
        return view('frontend.demos', compact('demos'));
    }

    // testimonials
    public function testimonials(){
        $testimonials = Testimonial::all();
        return view('frontend.testimonials', compact('testimonials'));
    }

    // web Design Package
    public function webDesignPackage(){
        $website_web_design_packages = WebDesignPackage::all();
        return view('frontend.web-design-package', compact('website_web_design_packages'));
    }

    public function mobileAppDevelopment(){
        return view('frontend.mobile-app-development');
    }

    public function webDesign(){
        $website_web_designs = WebDesign::all();
        return view('frontend.web-design', compact('website_web_designs'));
    }

    public function cloudAutomation(){
        return view('frontend.cloud-api-automation');
    }


    //hosting Package
    public function hostingPackage(){
        $website_hosting_packages = HostingPackage::all();
        return view('frontend.hosting-package', compact('website_hosting_packages'));
    }

    // custom Page
    public function customPage($slug){
        $page = CustomPage::where('slug', $slug)->first();
        return view('frontend.custom-page', compact('page'));
    }

    public function ourProcess(){
        return $this->customPage('our-process');
    }

    //domain Search
    public function domainSearch(){
        return view('frontend.domain-search');
    }

    //domain Search Post
    public function domainSearchPost(Request $request){
        $request->validate([
           'domain' => 'required'
        ]);

        if(gethostbyname($request->domain) == $request->domain){
            return response()->json([
               'type'=>'success',
               'message'=>'Domain available',
               'domain'=>$request->domain
            ]);
        }else{
            return response()->json([
                'type'=>'error',
                'message'=>'Sorry ! Domain not available'
            ]);
        }


    }

    // bulk Sms Package
    public function bulkSmsPackage(){
        $bulk_sms_packages = BulkSms::all();
        return view('frontend.bulk-sms-package', compact('bulk_sms_packages'));
    }
    public function graphicDesign(){
        $website_graphics = WebsiteGraphic::all();
        return view('frontend.graphic-design', compact('website_graphics'));
    }
    public function contactMessageStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $message = new WebsiteMessage();
        $message->name   = $request->name;
        $message->email   = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;
        try {
            $message->save();

            return back()->withSuccess('Thank you for message us ! We will contact with you as soon as possible !');

        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    // graphic Design Order Store
    public function graphicDesignOrderStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
            'sample_design'   =>  'nullable|image',
        ]);
        $order = new GraphicOrder();
        $order->name   = $request->name;
        $order->email   = $request->email;
        $order->phone = $request->phone;
        $order->message = $request->message;
        if($request->hasFile('sample_design')){
            $image             = $request->file('sample_design');
            $folder_path       = 'uploads/images/website/graphic-order/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $order->sample_design   = $folder_path . $image_new_name;
        }

        try {
            $order->save();
            return back()->withSuccess('Thank you for message us ! We will contact with you as soon as possible !');

        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    // domain Order Store
    public function domainOrderStore(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone'   => 'required|string',
            'domain'   => 'required|string',
        ]);
        $domainOrder = new DomainOrder();
        $domainOrder->name   = $request->name;
        $domainOrder->email   = $request->email;
        $domainOrder->phone = $request->phone;
        $domainOrder->domain_name = $request->domain;


        try {
            $domainOrder->save();
             return response()->json([
                'type'=>'success',
                'message'=>'Thank you for message us ! We will contact with you as soon as possible !',
            ]);
        }catch (\Exception $exception){
             return response()->json([
                'type'=>'error',
                'message'=>'Something going wrong. '.$exception->getMessage()
            ]);
        }
    }

    public function mobileAppInquiryStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $order = new WebsiteMessage();
        $order->name   = $request->name;
        $order->email   = $request->email;
        $order->phone = $request->phone;
        $order->message = $request->message;

        try {
            $order->save();
            return back()->withSuccess('Thank you for message us ! We will contact with you as soon as possible !');

        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    //web Design Order Store
    public function webDesignOrderStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $order = new WebDesignOrder();
        $order->name   = $request->name;
        $order->email   = $request->email;
        $order->phone = $request->phone;
        $order->message = $request->message;

        try {
            $order->save();
            return back()->withSuccess('Thank you for message us ! We will contact with you as soon as possible !');

        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }
    // hosting Package Order Store
    public function hostingPackageOrderStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'package' => 'required|exists:hosting_packages,id',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $order = new HostingPackageOrder();
        $order->name   = $request->name;
        $order->email   = $request->email;
        $order->phone = $request->phone;
        $order->message = $request->message;
        $order->package_id = $request->package;
        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Thank you for message us ! We will contact with you as soon as possible !',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something went wrong.. !'.$exception->getMessage(),
            ]);

        }
    }

    // bulk Sms Package Order Store
    public function bulkSmsPackageOrderStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'package' => 'required|exists:bulk_sms,id',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $order = new BulkSmsOrder();
        $order->name   = $request->name;
        $order->email   = $request->email;
        $order->phone = $request->phone;
        $order->message = $request->message;
        $order->package_id = $request->package;
        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Thank you for message us ! We will contact with you as soon as possible !',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something went wrong.. !'.$exception->getMessage(),
            ]);

        }
    }

    // web Design Package Order Store
    public function webDesignPackageOrderStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'package' => 'required|exists:web_design_packages,id',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $order = new WebDesignPackageOrder();
        $order->name   = $request->name;
        $order->email   = $request->email;
        $order->phone = $request->phone;
        $order->message = $request->message;
        $order->package_id = $request->package;
        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Thank you for message us ! We will contact with you as soon as possible !',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something went wrong.. !'.$exception->getMessage(),
            ]);
        }
    }

    // subscribe Store
    public function subscribeStore (Request $request){
        $request->validate([
            'email'=> 'required|email'
        ]);
        if(WebsiteSubscribe::where('email',$request->email)->exists()){
            return response()->json([
                'type' => 'success',
                'message' => 'Already Subscribed !',
            ]);
        }

        $subscribe = new WebsiteSubscribe();
        $subscribe->email = $request->email;
        try {
            $subscribe->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Subscribed !.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. ',
            ]);
        }
    }
}
