<?php
namespace app\services;

class CloudService {
    public function uploadPhoto($request) {
        if (!$request['img']) return false;
        $img = explode(',', $request['img']);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Client-ID f6b43409b5bc3fc']);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, ['image' => $img[1]]);
        $out = curl_exec($curl);
        curl_close ($curl);
        $pms = json_decode($out,true);
        return $pms['data']['link'] ?? false;
    }
}
