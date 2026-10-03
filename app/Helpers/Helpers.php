<?php

use App\Models\BulkSmsOrder;
use App\Models\DomainOrder;
use App\Models\GraphicOrder;
use App\Models\HostingPackageOrder;
use App\Models\StaticOption;
use App\Models\WebDesignOrder;
use App\Models\WebDesignPackageOrder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;



if (!function_exists('random_code')){

    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function get_static_option($key)
    {
        if (StaticOption::where('option_name', $key)->first()) {
            $return_val = StaticOption::where('option_name', $key)->first();
            return $return_val->option_value;
        }
        return null;
    }

    function frontend_phone_href()
    {
        $phone = trim((string) get_static_option('company_phone'));
        $normalized = preg_replace('/[^\d+]/', '', $phone);

        return $normalized ? 'tel:'.$normalized : null;
    }

    function frontend_whatsapp_url()
    {
        $configured = trim((string) get_static_option('company_whatsapp_link'));
        $digits = '';

        if ($configured !== '') {
            if (filter_var($configured, FILTER_VALIDATE_URL)) {
                $path = (string) parse_url($configured, PHP_URL_PATH);
                preg_match('/\d{8,15}/', $path, $matches);
                $digits = $matches[0] ?? '';
            } else {
                $digits = preg_replace('/\D+/', '', $configured);
            }
        }

        if (strlen($digits) < 8) {
            $digits = preg_replace('/\D+/', '', (string) get_static_option('company_phone'));
        }

        return strlen($digits) >= 8
            ? 'https://wa.me/'.$digits.'?text='.rawurlencode('Hello NexGen IT, I would like to discuss a software project.')
            : null;
    }

    function update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function set_env_value(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }

//
//    function test_smtp_mail($to)
//    {
//        $subject= 'SMTP Test';
//        $message= 'SMTP working fine';
//        $name = end('MAIL_FROM_NAME');
//        $from = end('MAIL_FROM_ADDRESS');
//        $headers = "From: " . $name . " \r\n";
//        $headers .= "Reply-To: <$from> \r\n";
//        $headers .= "Return-Path: " . ($from) . "\r\n";;
//        $headers .= "MIME-Version: 1.0\r\n";
//        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//        $headers .= "X-Priority: 2\nX-MSmail-Priority: high";;
//        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
//
//        if (mail($to, $subject, $message, $headers)) {
//            return true;
//        }else{
//            return false;
//        }
//    }

    function check_online_status($user_id){
        return Cache::has('is-online-'.$user_id);
    }

    function get_client_user_agent() {
        return  $_SERVER['HTTP_USER_AGENT'];
    }

    function get_client_ip() {
        $mainIp = '';
        if (getenv('HTTP_CLIENT_IP'))
            $mainIp = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $mainIp = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $mainIp = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $mainIp = getenv('REMOTE_ADDR');
        else
            $mainIp = 'UNKNOWN';
        return $mainIp;
    }

    function get_client_os() {

        $user_agent = get_client_user_agent();
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
            '/windows nt 10/i'     	=>  'Windows 10',
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

    function  get_client_browser() {

        $user_agent= get_client_user_agent();

        $browser        =   "Unknown Browser";

        $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/Trident/i'    =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/edge/i'       =>  'Edge',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/ubrowser/i'   =>  'UC Browser',
            '/mobile/i'     =>  'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }
        return $browser;
    }

    function custom_pages(){
        return \App\Models\CustomPage::orderBy('serial', 'asc')->get();
    }


    function incomplete_graphic_order(){
        return GraphicOrder::where('is_process_complete', false)->count();
    }

    function incomplete_hosting_order(){
        return HostingPackageOrder::where('is_process_complete', false)->count();
    }

    function incomplete_web_design_order(){
        return WebDesignOrder::where('is_process_complete', false)->count();
    }

    function incomplete_web_design_package_order(){
        return WebDesignPackageOrder::where('is_process_complete', false)->count();
    }

    function incomplete_bulk_sms_order(){
        return BulkSmsOrder::where('is_process_complete', false)->count();
    }

    function incomplete_domain_order(){
        return DomainOrder::where('is_process_complete', false)->count();
    }

    function incomplete_total_order(){
        return incomplete_domain_order()+incomplete_bulk_sms_order()+incomplete_hosting_order()+incomplete_graphic_order()+incomplete_web_design_order()+incomplete_web_design_package_order();
    }

    function  get_client_device(){

        $tablet_browser = 0;
        $mobile_browser = 0;
        $user_agent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
        $http_accept = strtolower($_SERVER['HTTP_ACCEPT'] ?? '');

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', $user_agent)) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', $user_agent)) {
            $mobile_browser++;
        }

        if ((strpos($http_accept, 'application/vnd.wap.xhtml+xml') !== false) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr(get_client_user_agent(), 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');

        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower(get_client_user_agent()),'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }

        if ($tablet_browser > 0) {
            // do something for tablet devices
            return 'Tablet';
        }
        else if ($mobile_browser > 0) {
            // do something for mobile devices
            return 'Mobile';
        }
        else {
            // do something for everything else
            return 'Computer';
        }
    }
}
