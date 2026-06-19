<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_static_option('no_image', 'uploads/images/setting/no-image.png');

        set_static_option('fav_icon', null);
        set_static_option('frontend_logo', null);
        set_static_option('backend_logo', null);
        set_static_option('loader_image', null);
        set_static_option('website_meta_image', null);

        set_static_option('counter_awards', '2+');
        set_static_option('counter_year', '10+');
        set_static_option('counter_project', '230+');
        set_static_option('counter_client', '6815+');

        set_static_option('company_email', 'company@gmail.com');
        set_static_option('company_phone', '01234567890');
        set_static_option('company_address', 'company---adddress');
        set_static_option('company_short_description', 'company---short---desc');
        set_static_option('company_office_hour', 'Mon. - Fri. 10:00 - 21:00');

        set_static_option('company_facebook_link', 'https://www.facebook.com/');
        set_static_option('company_twitter_link', 'https://twitter.com/');
        set_static_option('company_youtube_link', 'https://www.youtube.com/');
        set_static_option('company_instagram_link', 'https://www.instagram.com/');
        set_static_option('company_linkedin_link', 'https://www.linkedin.com/');
        set_static_option('company_whatsapp_link', 'https://www.whatsapp.com/');

        set_static_option('font_style', null);
        set_static_option('bg_success', null);
        set_static_option('bg_warning', null);
        set_static_option('bg_danger', null);
        set_static_option('bg_info', null);
        set_static_option('bg_primary', null);
        set_static_option('success', null);
        set_static_option('warning', null);
        set_static_option('danger', null);
        set_static_option('info', null);
        set_static_option('primary', null);
        set_static_option('h1_color', null);
        set_static_option('h2_color', null);
        set_static_option('h3_color', null);
        set_static_option('h4_color', null);
        set_static_option('h5_color', null);
        set_static_option('h6_color', null);
        set_static_option('h1_bg_color', null);
        set_static_option('h2_bg_color', null);
        set_static_option('h3_bg_color', null);
        set_static_option('h4_bg_color', null);
        set_static_option('h5_bg_color', null);
        set_static_option('h6_bg_color', null);

        set_static_option('p_color', null);
        set_static_option('p_bg_color', null);
        set_static_option('div_font_style', null);
        set_static_option('div_head_color', null);
        set_static_option('div_head_bg_color', null);
        set_static_option('body_bg_color', null);
        set_static_option('admin_leftsite_bg_color', null);
        set_static_option('admin_head_bg_color', null);

        set_static_option('custom_head_code', null);
        set_static_option('custom_foot_code', null);
        set_static_option('footer_credit', 'lorem ipsum footer-credit.....');
        set_static_option('website_meta_description', null);

        set_static_option('fb_page_id', null);
        set_static_option('fb_page_color', null);

        set_static_option('is_active_registration_from_website', 'Yes'); // Yes/No
    }
}

