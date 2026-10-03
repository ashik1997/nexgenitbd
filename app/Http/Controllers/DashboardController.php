<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\BulkSmsOrder;
use App\Models\DomainOrder;
use App\Models\GraphicOrder;
use App\Models\HostingPackageOrder;
use App\Models\User;
use App\Models\VisitorActivity;
use App\Models\WebDesignOrder;
use App\Models\WebDesignPackage;
use App\Models\WebDesignPackageOrder;
use App\Models\WebsiteSubscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index(){
        $visitors = VisitorActivity::all();
        $total_users = User::all();
        $today_visitor = VisitorActivity::whereDate('created_at', Carbon::today())->get();
        $total_subscribers = WebsiteSubscribe::all();
        $total_order =  GraphicOrder::all()->count() +
                        WebDesignOrder::all()->count() +
                        HostingPackageOrder::all()->count() +
                        WebDesignPackageOrder::all()->count() +
                        BulkSmsOrder::all()->count() +
                        DomainOrder::all()->count() ;
        $total_completed_order =    GraphicOrder::where('is_process_complete', true)->get()->count() +
                                    WebDesignOrder::where('is_process_complete', true)->get()->count() +
                                    HostingPackageOrder::where('is_process_complete', true)->get()->count() +
                                    WebDesignPackageOrder::where('is_process_complete', true)->get()->count() +
                                    BulkSmsOrder::where('is_process_complete', true)->get()->count() +
                                    DomainOrder::where('is_process_complete', true)->get()->count() ;

        $total_incompleted_order =    GraphicOrder::where('is_process_complete', false)->get()->count() +
                                    WebDesignOrder::where('is_process_complete', false)->get()->count() +
                                    HostingPackageOrder::where('is_process_complete', false)->get()->count() +
                                    WebDesignPackageOrder::where('is_process_complete', false)->get()->count() +
                                    BulkSmsOrder::where('is_process_complete', false)->get()->count() +
                                    DomainOrder::where('is_process_complete', false)->get()->count() ;

        return view('backend.dashboard.index', compact('total_users','visitors','today_visitor','total_subscribers','total_order','total_completed_order','total_incompleted_order'));
    }

    // graphic Design Status Change
    public function graphicDesignStatusChange(Request $request){
        $request->validate([
            'order'=> 'required|exists:graphic_orders,id',
        ]);
        $order = GraphicOrder::find($request->input('order'));
        $order->is_process_complete = $request->input('is_process_complete');

        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully status changed.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

    // hosting Order Status Change
    public function hostingOrderStatusChange(Request $request){
        $request->validate([
            'order'=> 'required|exists:hosting_package_orders,id',
        ]);
        $order = HostingPackageOrder::find($request->input('order'));
        $order->is_process_complete = $request->input('is_process_complete');

        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully status changed.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

    // web Design Package Order Status Change
    public function webDesignPackageOrderStatusChange(Request $request){
        $request->validate([
            'order'=> 'required|exists:web_design_package_orders,id',
        ]);
        $order = WebDesignPackageOrder::find($request->input('order'));
        $order->is_process_complete = $request->input('is_process_complete');

        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully status changed.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

    // domain Order Status Change
    public function domainOrderStatusChange(Request $request){
        $request->validate([
            'order'=> 'required|exists:domain_orders,id',
        ]);
        $order = DomainOrder::find($request->input('order'));
        $order->is_process_complete = $request->input('is_process_complete');

        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully status changed.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

    // bulk Sms Order Status Change
    public function bulkSmsOrderStatusChange(Request $request){
        $request->validate([
            'order'=> 'required|exists:bulk_sms_orders,id',
        ]);
        $order = BulkSmsOrder::find($request->input('order'));
        $order->is_process_complete = $request->input('is_process_complete');

        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully status changed.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

    // web Design Order Status Change
    public function webDesignOrderStatusChange(Request $request){
        $request->validate([
            'order'=> 'required|exists:web_design_orders,id',
        ]);
        $order = WebDesignOrder::find($request->input('order'));
        $order->is_process_complete = $request->input('is_process_complete');

        try {
            $order->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully status changed.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

}
