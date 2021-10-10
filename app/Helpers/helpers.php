<?php
use App\EasyparcelLog;
use App\PackageGroup;
use App\Jobs\SendWhatsappJob;
use Carbon\Carbon;
function dateConvertDMY($date)
{
    // helper to view formated date
    $DMY = date("d M Y", strtotime($date));
    return $DMY;
}

function dateConvertDMY1($date)
{
    // helper to view formated date
    $DMY = date("d-M-Y", strtotime($date));
    return $DMY;
}

function dateConvertDMYY($date)
{
    // helper to view formated date
    $DMY = date("d M y", strtotime($date));
    return $DMY;
}

function dateConvertYMD($date)
{
    // helper for insert date into database
    $YMD = date("Y-m-d", strtotime($date));
    return $YMD;
}

function dateConvertYMDHis($date)
{
    // helper for insert date into database
    $YMD = date("Y-m-d H:i:s", strtotime($date));
    return $YMD;
}

function dateConvertYMDHisa($date)
{
    // helper for insert date into database
    $YMD = date("Y-m-d h:i:s a", strtotime($date));
    return $YMD;
}

function dateConvertDMYHISa($date)
{
    // helper to view formated date and time
    $DMYHISa = date("d M Y H:i:s a", strtotime($date));
    return $DMYHISa;
}

function dateConvertDMYHISa12($date)
{
    // helper to view formated date and time
    $DMYHISa = date("d M Y h:i:s a", strtotime($date));
    return $DMYHISa;
}

function dateConvertHISa($date)
{
    // helper to view formated time
    $HISa = date("h:i:s a", strtotime($date));
    return $HISa;
}

function carbonDiffForHumans($date)
{
    $thisDate = \Carbon\Carbon::parse($date);
    $diffForHumans = $thisDate->diffForHumans();
    return $diffForHumans;
}

function carbonDiffForHumanShort($date)
{
    $thisDate = \Carbon\Carbon::parse($date);
    $currentDate = \Carbon\Carbon::now();
    $diffTime = $currentDate->diffInMinutes($thisDate);
 
    if($diffTime <= 1){
        $result = 'just now';
    }elseif($diffTime > 1){
        $diffForHumans = $thisDate->diffForHumans();
        $result = str_replace(['years ago', '1 year ago', 'months ago', '1 month ago','weeks ago', '1 week ago', 'days ago', '1 day ago', 'hours ago', 'hour ago', 'minutes ago', 'minute ago'], ['years ago', 'last year', 'months ago', 'last month', 'weeks ago', 'last week', 'days', 'yesterday', 'hrs ago', 'hr ago', 'mins ago', 'min ago'],$diffForHumans);
    }
    
    return $result;
}

function carbonDateSorting($date)
{
    $thisDate = \Carbon\Carbon::parse($date);
    $currentDate = \Carbon\Carbon::now();
    $diffTime = $currentDate->diff($thisDate)->days;

    if($diffTime <= 1){
        $result = 'Today';
    }elseif($diffTime == 2){
        $result = 'Yesterday';
    }else{
        $result = date("d M Y", strtotime($thisDate));
    }
    return $result;
}

function dateConvertID($date)
{
    $ymd = date("ymd", strtotime($date));
    return $ymd;
}

function getExpiredDate($date)
{
    $thisDate = \Carbon\Carbon::parse($date);
    $expiredDate = $thisDate->addDay(14);
    $expiredDate_formated = date("d M Y", strtotime($expiredDate));
    return $expiredDate_formated;
}

function paymentIDToBill($billingID)
{
    $payment_id = 0;

    if (!empty($billingID)) {
        $billing_trx = App\billing_trx::where('billing_id', $billingID)->first();
        if ($billing_trx) {
            $Payment    = App\Payment::find($billing_trx->payment_id);
            $payment_id = $Payment->payment_id;
        }
    }

    return $payment_id;
}

function findUser($id)
{
    $User = App\Admin::find($id);
    if ($User) {
        return $User->name;
    } else {
        return '';
    }
}

function randomNumber($length)
{
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $pieces = [];
    $max    = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces[] = $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

function verifyId($id = null, $model = null, $column = null)
{   
    $user = Auth::user();
    $merchant = $user->merchant->first();
    if(Auth::guard('web')->check())
    {
        $_model = '\App\\'.$model;
        $data = $_model::where('merchant_id',$merchant->id)->where('user_id',$user->id)->where($column,$id)->first();

        if(!$data){
            return  redirect()->back()->with('warning','Record not found!');
        }
    }
}

function getStoreLink()
{  
    $store_link = '';
    $user = Auth::user();
    if($user){
        $merchant = $user->merchant;
        if($merchant){
            $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';
            $store_link = url('/store/'.$merchant_name);
            
            $tenant = \App\Tenant::where('merchant_id',$merchant->id)->first();

            if($tenant){
                $domain = env('APP_DOMAIN');
                if(!empty($tenant->subdomain)){
                    $subdomain =  $tenant->subdomain.'.';
                    $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
                    $store_link = $protocol.'://'.$subdomain.$domain;
                }
            }
        }
    }
    return $store_link;
}

function getStoreLink2($merchant)
{  
    $store_link = '';

    if($merchant){
        $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';
        $store_link = url('/store/'.$merchant_name);
        
        $tenant = \App\Tenant::where('merchant_id',$merchant->id)->first();

        if($tenant){
            $domain = env('APP_DOMAIN');
            if(!empty($tenant->subdomain)){
                $subdomain =  $tenant->subdomain.'.';
                $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
                $store_link = $protocol.'://'.$subdomain.$domain;
            }
        }
    }
    return $store_link;
}

function getProductLink($product)
{  

    $product_link = '';
    $user = Auth::user();
    if($user){
        $merchant = $user->merchant;
        if($merchant){
            $tenant = $merchant->tenant;
            $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';
            if($tenant){
                $store_link = getStoreLink();
                $product_link = $store_link.'/product?key='.$product->product_no;
            }else{
                $product_link = url('/store/'.$merchant_name.'/product?key='.$product->product_no);
            }
        }
    }

    return $product_link;
    
}

function getProductLinkViaStore($product)
{
    $product_link = '';
    $tenant = session()->get('tenant');

    if($tenant){
        $merchant =  $tenant->merchant;
        if($merchant){
            $product_link = url('/product?key='.$product->product_no);
        }
    }else{
        $merchant =  $product->merchant;
        if($merchant){
            $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';
            $product_link = url('/store/'.$merchant_name.'/product?key='.$product->product_no);
        }

    }

    return $product_link;
}
// function v_1_getProductLink($product)
// {  

//     $product_link = '';
//     $user = Auth::user();
//     if($user){
//         $merchant = $user->merchant;
//         if($merchant){
//             $tenant = $merchant->tenant;
//             $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';
//             $product_name1 = $product->name ? str_replace(' ','-',$product->name) :'';
//             $product_name = $product->name ? str_replace('/','',$product_name1) :'';
//             if($tenant){
//                 $store_link = getStoreLink();
//                 $product_link = $store_link.'/'.$product_name.'?key='.$product->product_no;
//             }else{
//                 $product_link = url('/store/'.$merchant_name.'/'.$product_name.'?key='.$product->product_no);
//             }
//         }
//     }

//     return $product_link;
    
// }

// function v_1_getProductLinkViaStore($product)
// {
//     $product_link = '';
//     $tenant = session()->get('tenant');

//     if($tenant){
//         $merchant =  $tenant->merchant;
//         $product_name1 = $product->name ? str_replace(' ','-',$product->name) :'';
//         $product_name = $product->name ? str_replace('/','',$product_name1) :'';
//         if($merchant){
//             $product_link = url('/'.$product_name.'?key='.$product->product_no);
//         }
//     }else{
//         $merchant =  $product->merchant;
//         $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';
//         $product_name1 = $product->name ? str_replace(' ','-',$product->name) :'';
//         $product_name = $product->name ? str_replace('/','',$product_name1) :'';
//         if($merchant){
//             $product_link = url('/store/'.$merchant_name.'/'.$product_name.'?key='.$product->product_no);
//         }

//     }

//     return $product_link;
// }

function getProductLinkViaCart($product)
{
    $product_link = '';
    $tenant = session()->get('tenant');

    if($tenant){
        $merchant =  $tenant->merchant;

        if($merchant){
            $product_link = url('/product?key='.$product['no']);
        }
    }else{
        $product = \App\Product::find($product['id']);
        $merchant =  $product->merchant;
        $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';

        if($merchant){
            $product_link = url('/store/'.$merchant_name.'/product?key='.$product->product_no);
        }

    }

    return $product_link;
}



function getStoreLinkViaStore($merchant)
{  
    $store_link = '';
    $tenant = session()->get('tenant');
    if($tenant){
        $store_link = url('/');
    }else{
        $merchant_name = $merchant->name ? str_replace(' ','-',$merchant->name) :'';
        $store_link = url('/store/'.$merchant_name);
    }

    return $store_link;
}

function forgetSession()
{
    session()->forget('productArr');
    session()->forget('count');
    session()->forget('totalAmount');
    session()->forget('deliveryID');
    session()->forget('subAmount');
    session()->forget('customerToPay');
    session()->forget('table_no');
    session()->forget('couponArr');
    session()->forget('shipping');

    return true;
}

function removeUnwantedKey($key)
{
    $key = str_replace(' ', '', $key);
    $key = str_replace('-', '', $key);
    $key = str_replace('+', '', $key);

    if (substr($key, 0, 1) === '6') {
        $key = substr($key,1);
    }

    return $key;
}


function notifyWaapify($merchantContactNo, $orderDate, $order_no, $order_id, $return_message=false)
{   
    $order_id = $order_id;
    $orderUrl = env('APP_URL') . "/order/" . $order_no;
    $message = "You have a new order placed on " . dateConvertDMYHISa($orderDate) . ".\nClick the link to see more detail: " . $orderUrl;
    $phone_no = $merchantContactNo;

    //TEMPORARY USE TO GET MESSAGE ONLY
    if($return_message)
    {
        return $message;
    }

    $whatsappJob = (new SendWhatsappJob($message, $phone_no, $order_id))->delay(Carbon::now()->addSeconds(10));
    dispatch($whatsappJob);
}

function getStateCode($state)
{
    $state_code = '';
    if($state == 'Johor'){
        $state_code = 'jhr';
    }elseif($state == 'Kedah'){
        $state_code = 'kdh';
    }elseif($state == 'Labuan'){
        $state_code = 'lbn';
    }elseif($state == 'Kelantan'){
        $state_code = 'ktn';
    }elseif($state == 'Melaka'){
        $state_code = 'mlk';
    }elseif($state == 'Negeri Sembilan'){
        $state_code = 'nsn';
    }elseif($state == 'Pahang'){
        $state_code = 'phg';
    }elseif($state == 'Pulau Pinang'){
        $state_code = 'png';
    }elseif($state == 'Perak'){
        $state_code = 'prk';
    }elseif($state == 'Perlis'){
        $state_code = 'pls';
    }elseif($state == 'Sabah'){
        $state_code = 'sbh';
    }elseif($state == 'Sarawak'){
        $state_code = 'srw';
    }elseif($state == 'Selangor'){
        $state_code = 'sgr';
    }elseif($state == 'Terengganu'){
        $state_code = 'trg';
    }elseif($state == 'Putrajaya'){
        $state_code = 'pjy';
    }elseif($state == 'Kuala Lumpur'){
        $state_code = 'kul';
    }

    return $state_code;
}

function getEasyParcelError($code)
{
    $error_status = 'Error';
    $error_mark = 'Error';
    if($code == '0'){
        $error_status = 'Success';
        $error_mark = 'Successful';
    }elseif($code == '1'){
        $error_mark = 'Required authentication key';
    }elseif($code == '2'){
        $error_mark = 'Invalid authentication key';
    }elseif($code == '3'){
        $error_mark = 'Required api key';
    }elseif($code == '4'){
        $error_mark = 'Invalid api key';
    }elseif($code == '5'){
        $error_mark = 'Unauthorized user';
    }elseif($code == '6'){
        $error_mark = 'Invalid data insert format in array';
    }

    return $error_mark;
}

function easyparcelOrder($merchant,$order,$customer,$easyparcelLog,$orderDetailMsg)
    {
        $state_code1 = getStateCode($merchant->state);
        $state_code2 = getStateCode($customer->state); 

        $total_weight = 0;

        $value_parcel = $order->total_amount - $order->postage_fee;

        $domain = env('EASYPARCEL_END_POINT');
        $action = "EPSubmitOrderBulk";
        $postparam = array(
            'api'   => $merchant->easyparcel_api_key ? $merchant->easyparcel_api_key :'',
            'bulk'  => array(
                array(
                    'weight'        => $easyparcelLog->total_weight,
                    'width'         => '',
                    'length'        => '',
                    'height'        => '',
                    'content'       => urldecode($orderDetailMsg),
                    'value'         => $value_parcel,
                    'service_id'    => $easyparcelLog->service_id,
                    'pick_point'    => '',
                    'pick_name'     => $merchant->user->first_name,
                    'pick_company'  => $merchant->name,
                    'pick_contact'  => $merchant->contact_no,
                    'pick_mobile'   => $merchant->contact_no,
                    'pick_addr1'    => $merchant->address,
                    'pick_addr2'    => $merchant->address2,
                    'pick_addr3'    => '',
                    'pick_addr4'    => '',
                    'pick_city'     => $merchant->city,
                    'pick_state'    => $state_code1,
                    'pick_code'     => $merchant->postcode,
                    'pick_country'  => 'MY',
                    'send_point'    => '',
                    'send_name'     => $customer->name,
                    'send_company'  => '',
                    'send_contact'  => $customer->phone,
                    'send_mobile'   => $customer->phone,
                    'send_addr1'    => $customer->address,
                    'send_addr2'    => $customer->address2,
                    'send_addr3'    => '',
                    'send_addr4'    => '',
                    'send_city'     => $customer->city,
                    'send_state'    => $state_code2,
                    'send_code'     => $customer->postcode,
                    'send_country'  => 'MY',
                    'collect_date'  => '',
                    'sms'           => 'false',
                    'send_email'    => $customer->email,
                    'hs_code'       => '',
                    'REQ_ID'        => '',
                    'reference'     => $order->order_no,
                )
            )
        );

        $url = $domain.$action;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        ob_start(); 
        $return = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        $response = json_decode($return);
        // dd($response);
        if($response){
            if($response->api_status == 'Success'){
                
                $result = $response->result[0];
 
                $easyparcelLog->response        = json_encode($response);
                $easyparcelLog->ep_order_no     = @$result->order_number;
                $easyparcelLog->courier         = @$result->courier;
                $easyparcelLog->collected_at    = @$result->collect_date;
                $easyparcelLog->save();
            }
        }
   
    }