<?php


use Illuminate\Support\Facades\Auth;

function SendFcmNotification($title, $message, $datapayload=[]){
    $msg = urlencode($message);
    $data = array(
        'title'=>$title,
        'sound' => "default",
        'msg'=>$msg,
        'data'=>$datapayload,
        'body'=>$message,
        'color' => "#79bc64"
    );
    $fields = array(
        'to'=>Auth::user()->fcm_token,
        'notification'=>$data,
//        'data'=>$datapayload,
        "priority" => "high",
    );
    $headers = array(
        'Authorization: key=AAAA_48PLwo:APA91bET6FPjklkSc_gDLG_4lwFfp5Spk9zcMow5u8m-n0flc9apQhZ8hZ1c7yo6u_xvQxpSvosVxzpZ2IXziONX6jA98pHX61lRfs08Ca2B2EueJVaxsOuzvbZHUaSF7gKwXp-upHrC',
        'Content-Type: application/json'

    );
//    dd(json_encode($fields));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close( $ch );
    return $result;
}
