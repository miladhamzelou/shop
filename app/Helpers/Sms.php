<?php
namespace App\Helpers;

use GuzzleHttp\Client;
use App\Models\Sms as SmsModel;
use GuzzleHttp\Exception\ClientException;
use http\Exception;
use Illuminate\Http\Request;

class Sms
{

    public static function sendOtp($user,$template){

        $client = new Client;

        try {
            $response = $client->request('POST', 'https://api.kavenegar.com/v1/4B743352344A4A72785376573447444D567270307955384B334B4D426D73524A3232334A66444F7941536B3D/verify/lookup.json', [
                'headers' => [
                    'cache-control' => 'no-cache',
                    'content-type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'receptor' => $user->mobile,
                    'token' => $user->code,
                    'template' => $template,
                ],
            ]);

            if ($response) {
                $res = json_decode((string)$response->getBody(), true);
                $sms = SmsModel::create([
                    'user_id'=>$user->id,
                    'messageid'=>$res['entries'][0]['messageid'],
                    'message'=>$res['entries'][0]['message'],
                    'status'=>$res['entries'][0]['status'],
                    'statustext'=>$res['entries'][0]['statustext'],
                    'sender'=>$res['entries'][0]['sender'],
                    'receptor'=>$res['entries'][0]['receptor'],
                    'date'=>$res['entries'][0]['date'],
                    'cost'=>$res['entries'][0]['cost'],
                    'ip'=>\Request()->ip(),
                ]);
                return $sms->messageid;
            }
        }catch (ClientException $e){
            return false;

        }catch (Exception $e){
            return false;
        }


    }


    public static function getStatus($messageid=283691540){
        $client = new Client;
        try{
            $response = $client->request('POST', 'https://api.kavenegar.com/v1/4B743352344A4A72785376573447444D567270307955384B334B4D426D73524A3232334A66444F7941536B3D/sms/status.json', [
                'headers' => [
                    'cache-control' => 'no-cache',
                    'content-type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'messageid' => $messageid,
                ],
            ]);
            $res = json_decode((string) $response->getBody(), true);
            $sms = SmsModel::where('messageid',$messageid)->first();
            $sms->status = $res['entries'][0]['status'];
            $sms->statustext = $res['entries'][0]['statustext'];
            $sms->save();
            return true;
        }catch (ClientException $e){
            return false;
        }catch (Exception $e){
            return false;
        }
        return false;
    }

    public static function translate($status){
        $txt = '';
        switch ($status) {
            case 1:
                $txt = 'صف ارسال ';
                break;
            case 2:
                $txt = 'زمان بندی شده';
                break;
            case 4:
                $txt = 'ارسال شده به مخابرات';
                break;
            case 5:
                $txt = 'ارسال شده به مخابرات';
                break;
            case 6:
                $txt = 'عدم رسیدن پیامک ';
                break;
            case 10:
                $txt = 'رسیده به گیرنده';
                break;
            case 11:
                $txt = 'نرسیده به گیرنده';
                break;
            case 13:
                $txt = 'ارسال پیام از سمت کاربر لغو شده';
                break;
            case 14:
                $txt = 'بلاک شده است';
                break;
            case 100:
                $txt = 'شناسه پیامک نامعتبر است';
                break;
            default:
                $txt = 'نامشخص';
        }
        return $txt;
    }



}