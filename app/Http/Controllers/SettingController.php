<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
    public function getGeneralStaticForm(){
        return view('backend.application.setting.general-static');
    }
    // text Static Form
    public function textStaticForm(){
        return view('backend.application.setting.text');
    }

    // app Static Form
    public function appStaticForm(){
        return view('backend.application.setting.app');
    }

    // logo And Image General Static Form
    public function logoAndImageGeneralStaticForm(){
        return view('backend.application.setting.logo-and-image');
    }

    //social Static Option Form
    public function socialStaticOptionForm(){
        return view('backend.application.setting.social');
    }

    //counter Static Option Form
    public function counterStaticOptionForm(){
        return view('backend.application.setting.counter');
    }

     // app Static Option Update
     public function appStaticOptionUpdate(Request $request){
        $request->validate([
            //'app_name' => 'required',
            //'app_env' => 'required',
            //'app_debug' => 'required',
//            'mailer' => 'required',
//            'host' => 'required',
//            'port' => 'required',
//            'username' => 'required',
//            'password' => 'required',
//            'encryption' => 'required',
//            'from_name' => 'required',
//            'from_email' => 'required'
        ]);

         update_static_option('fb_page_id', $request->page_id);
         update_static_option('fb_page_color', $request->page_color);

        try {
            //$env_val['APP_NAME'] = !empty($request->app_name) ? $request->app_name : 'YOUR_APP_NAME';
            //$env_val['APP_ENV'] = !empty($request->app_env) ? $request->app_env : 'YOUR_APP_ENV';
            //$env_val['APP_DEBUG'] = !empty($request->app_debug) ? $request->app_debug : 'YOUR_APP_DEBUG';
            $env_val['MAIL_MAILER'] = !empty($request->mailer) ? $request->mailer : 'YOUR_MAILER';
            $env_val['MAIL_HOST'] = !empty($request->host) ? $request->host : 'YOUR_SMTP_MAIL_HOST';
            $env_val['MAIL_PORT'] = !empty($request->port) ? $request->port : 'YOUR_SMTP_MAIL_POST';
            $env_val['MAIL_USERNAME'] = !empty($request->username) ? $request->username : 'YOUR_SMTP_MAIL_USERNAME';
            $env_val['MAIL_PASSWORD'] = !empty($request->password) ? $request->password : 'YOUR_SMTP_MAIL_USERNAME_PASSWORD';
            $env_val['MAIL_ENCRYPTION'] = !empty($request->encryption) ? $request->encryption : 'YOUR_SMTP_MAIL_ENCRYPTION';
            $env_val['MAIL_FROM_NAME'] = !empty($request->from_name) ? $request->from_name : 'YOUR_SMTP_FROM_NAME';
            $env_val['MAIL_FROM_ADDRESS'] = !empty($request->from_email) ? $request->from_email : 'YOUR_MAIL_FROM_ADDRESS';

            set_env_value([
                //'APP_NAME' => '"'.$env_val['APP_NAME'].'"',
                //'APP_ENV' => '"'.$env_val['APP_ENV'].'"',
                //'APP_DEBUG' => '"'.$env_val['APP_DEBUG'].'"',
                'MAIL_MAILER' => '"'.$env_val['MAIL_MAILER'].'"',
                'MAIL_HOST' => '"'.$env_val['MAIL_HOST'].'"',
                'MAIL_PORT' =>  '"'.$env_val['MAIL_PORT'].'"',
                'MAIL_USERNAME' => '"'.$env_val['MAIL_USERNAME'].'"',
                'MAIL_PASSWORD' => '"'.$env_val['MAIL_PASSWORD'].'"',
                'MAIL_ENCRYPTION' => '"'.$env_val['MAIL_ENCRYPTION'].'"',
                'MAIL_FROM_NAME' => '"'.$env_val['MAIL_FROM_NAME'].'"',
                'MAIL_FROM_ADDRESS' => '"'.$env_val['MAIL_FROM_ADDRESS'].'"'
            ]);
            return redirect()->route('frontend.home')->withSuccess('Successfully application setting updated !');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
        }
    }

    // update static option
    public function generalStaticUpdate(Request $request){
        $request->validate([
            'company_email' => 'nullable|min:3',
            'company_phone' => 'nullable|min:3',
            'company_address' => 'nullable|min:3',
            'company_office_hour' => 'nullable|min:3',
            'company_facebook_link' => 'nullable|min:3',
            'font_style' => 'nullable|min:3',
            'bg_success' => 'nullable|min:3',
            'bg_warning' => 'nullable|min:3',
            'bg_danger' => 'nullable|min:3',
            'bg_info' => 'nullable|min:3',
            'bg_primary' => 'nullable|min:3',
            'success' => 'nullable|min:3',
            'warning' => 'nullable|min:3',
            'danger' => 'nullable|min:3',
            'info' => 'nullable|min:3',
            'primary' => 'nullable|min:3',
            'h1_color' => 'nullable|min:3',
            'h2_color' => 'nullable|min:3',
            'h3_color' => 'nullable|min:3',
            'h4_color' => 'nullable|min:3',
            'h5_color' => 'nullable|min:3',
            'h6_color' => 'nullable|min:3',
            'h1_bg_color' => 'nullable|min:3',
            'h2_bg_color' => 'nullable|min:3',
            'h3_bg_color' => 'nullable|min:3',
            'h4_bg_color' => 'nullable|min:3',
            'h5_bg_color' => 'nullable|min:3',
            'h6_bg_color' => 'nullable|min:3',
            'p_color' => 'nullable|min:3',
            'p_bg_color' => 'nullable|min:3',
            'div_font_style' => 'nullable|min:3',
            'div_head_color' => 'nullable|min:3',
            'div_head_bg_color' => 'nullable|min:3',
            'body_bg_color' => 'nullable|min:3',
            'admin_leftsite_bg_color' => 'nullable|min:3',
            'admin_head_bg_color' => 'nullable|min:3',
            'is_active_registration_from_website' => 'nullable',
        ]);
        try {

            update_static_option('company_email', $request->company_email);
            update_static_option('company_phone', $request->company_phone);
            update_static_option('company_address', $request->company_address);
            update_static_option('company_office_hour', $request->company_office_hour);
            update_static_option('company_facebook_link', $request->company_facebook_link);
            update_static_option('font_style', $request->font_style);
            update_static_option('bg_success', $request->bg_success);
            update_static_option('bg_warning', $request->bg_warning);
            update_static_option('bg_danger', $request->bg_danger);
            update_static_option('bg_info', $request->bg_info);
            update_static_option('bg_primary', $request->bg_primary);
            update_static_option('success', $request->success);
            update_static_option('warning', $request->warning);
            update_static_option('danger', $request->danger);
            update_static_option('info', $request->info);
            update_static_option('primary', $request->primary);
            update_static_option('h1_color', $request->h1_color);
            update_static_option('h2_color', $request->h2_color);
            update_static_option('h3_color', $request->h3_color);
            update_static_option('h4_color', $request->h4_color);
            update_static_option('h5_color', $request->h5_color);
            update_static_option('h6_color', $request->h6_color);
            update_static_option('h1_bg_color', $request->h1_bg_color);
            update_static_option('h2_bg_color', $request->h2_bg_color);
            update_static_option('h3_bg_color', $request->h3_bg_color);
            update_static_option('h4_bg_color', $request->h4_bg_color);
            update_static_option('h5_bg_color', $request->h5_bg_color);
            update_static_option('h6_bg_color', $request->h6_bg_color);
            update_static_option('p_color', $request->p_color);
            update_static_option('p_bg_color', $request->p_bg_color);
            update_static_option('div_font_style', $request->div_font_style);
            update_static_option('div_head_color', $request->div_head_color);
            update_static_option('div_head_bg_color', $request->div_head_bg_color);
            update_static_option('body_bg_color', $request->body_bg_color);
            update_static_option('admin_leftsite_bg_color', $request->admin_leftsite_bg_color);
            update_static_option('admin_head_bg_color', $request->admin_head_bg_color);


            update_static_option('is_active_registration_from_website', $request->is_active_registration_from_website);

        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
//        return back()->withToastSuccess( 'Updated successfully');
        return back()->withSuccess('Updated successfully!');
    }

    // socialStatic option Update
    public function socialStaticUpdate(Request $request){
        $request->validate([
            'company_facebook_link' => 'nullable|min:3',
            'company_twitter_link' => 'nullable|min:3',
            'company_youtube_link' => 'nullable|min:3',
            'company_instagram_link' => 'nullable|min:3',
            'company_linkedin_link' => 'nullable|min:3',
            'company_whatsapp_link' => 'nullable|min:3',
        ]);
        try {
            update_static_option('company_facebook_link', $request->company_facebook_link);
            update_static_option('company_twitter_link', $request->company_twitter_link);
            update_static_option('company_youtube_link', $request->company_youtube_link);
            update_static_option('company_instagram_link', $request->company_instagram_link);
            update_static_option('company_linkedin_link', $request->company_linkedin_link);
            update_static_option('company_whatsapp_link', $request->company_whatsapp_link);
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
//        return back()->withToastSuccess( 'Updated successfully');
        return back()->withSuccess('Updated successfully!');
    }
    // text Static option Update
    public function textStaticUpdate(Request $request){
        $request->validate([
            'custom_head_code' => 'nullable|min:3',
            'custom_foot_code' => 'nullable|min:3',
            'footer_credit' => 'nullable|min:3',
            'company_short_description' => 'nullable|min:3',
            'website_meta_description' => 'nullable|min:3',
        ]);
        try {
            update_static_option('custom_head_code', $request->custom_head_code);
            update_static_option('custom_foot_code', $request->custom_foot_code);
            update_static_option('footer_credit', $request->footer_credit);
            update_static_option('company_short_description', $request->company_short_description);
            update_static_option('website_meta_description', $request->website_meta_description);

        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
//        return back()->withToastSuccess( 'Updated successfully');
        return back()->withSuccess('Updated successfully!');
    }
    // update logo And Image
    public function logoAndImageStaticUpdate(Request $request){
        $request->validate([
            'fav_icon' => 'nullable|image',
            'frontend_logo' => 'nullable|image',
            'backend_logo' => 'nullable|image',
            'loader_image' => 'nullable|image',
            'website_meta_image' => 'nullable|image',
        ]);
        try {

            if($request->hasFile('fav_icon')){
                if (get_static_option('fav_icon') != null)
                    File::delete(public_path(get_static_option('fav_icon'))); //Old image delete
                $image             = $request->file('fav_icon');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('fav_icon',$folder_path.$image_new_name);
            }

            if($request->hasFile('frontend_logo')){
                if (get_static_option('frontend_logo') != null)
                    File::delete(public_path(get_static_option('frontend_logo'))); //Old image delete
                $image             = $request->file('frontend_logo');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('frontend_logo',$folder_path.$image_new_name);
            }
            if($request->hasFile('backend_logo')){
                if (get_static_option('backend_logo') != null)
                    File::delete(public_path(get_static_option('backend_logo'))); //Old image delete
                $image             = $request->file('backend_logo');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('backend_logo',$folder_path.$image_new_name);
            }

            if($request->hasFile('loader_image')){
                if (get_static_option('loader_image') != null)
                    File::delete(public_path(get_static_option('loader_image'))); //Old image delete
                $image             = $request->file('loader_image');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('loader_image',$folder_path.$image_new_name);
            }

            if($request->hasFile('website_meta_image')){
                if (get_static_option('website_meta_image') != null)
                    File::delete(public_path(get_static_option('website_meta_image'))); //Old image delete
                $image             = $request->file('website_meta_image');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('website_meta_image',$folder_path.$image_new_name);
            }

        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
//        return back()->withToastSuccess( 'Updated successfully');
        return back()->withSuccess('Updated successfully!');
    }

    // counter Static option Update
    public function counterStaticUpdate(Request $request){
        $request->validate([
            'counter_awards' => 'nullable|min:3',
            'counter_year' => 'nullable|min:3',
            'counter_project' => 'nullable|min:3',
            'counter_client' => 'nullable|min:3',
        ]);
        try {
            update_static_option('counter_awards', $request->counter_awards);
            update_static_option('counter_year', $request->counter_year);
            update_static_option('counter_project', $request->counter_project);
            update_static_option('counter_client', $request->counter_client);
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
//        return back()->withToastSuccess( 'Updated successfully');
        return back()->withSuccess('Updated successfully!');
    }
}
