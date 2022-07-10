<?php

namespace App\Helper;

use Illuminate\Support\Carbon;

class RecruitmentAds
{
    public static function Show_Messages($data)
    {
        // dd($data);
        $message = [];
        for ($i = 0; $i < count($data); $i++) {
            //First check user paid or not
            $time_now = Carbon::parse(Carbon::now());
            $time_sub_date = Carbon::parse($data[$i]->recruitment_ads_payments->ad_sub_date);
            $time_diff = $time_sub_date->diffInDays($time_now, false);
            if (empty(trim($data[$i]->recruitment_ads_payments->ad_price_pay_date))) {
                //Check its second or third day after Ad submitation
                if ($time_diff == 1) {
                    $message[$i]['title']='پرداخت آگهی';
                    $message[$i]['sender']='مدیریت';
                    $message[$i]['message'] = "تبلیغ " . $data[$i]->title . " شما دو روز دیگر غیر فعال می شود ، لطفا نسبت به پرداخت هزینه آن اقدام نمایید";
                    $message[$i]['date']=$time_sub_date ;
                } elseif ($time_diff == 2) {
                    $message[$i]['title']='پرداخت آگهی';
                    $message[$i]['sender']='مدیریت';
                    $message[$i]['message'] = "تبلیغ " . $data[$i]->title . " شما فردا غیر فعال می شود ، لطفا نسبت به پرداخت هزینه آن اقدام نمایید";
                    $message[$i]['date']=$time_sub_date ;
                } elseif ($time_diff > 2) {
                    $message[$i]['title']='پرداخت آگهی';
                    $message[$i]['sender']='مدیریت';
                    $message[$i]['message'] = "تبلیغ " . $data[$i]->title . " شما غیر فعال شده است ، لطفا نسبت به پرداخت هزینه آن اقدام نمایید";

                    $message[$i]['date']=$time_sub_date ;
                }
            } elseif ($time_diff == 58) {
                $message[$i]['title']='پرداخت آگهی';
                $message[$i]['sender']='مدیریت';
                $message[$i]['message'] = "تبلیغ " . $data[$i]->title . " شما دو روز دیگر غیر فعال می شود ، لطفا نسبت به پرداخت هزینه آن اقدام نمایید";
                $message[$i]['date']=$time_sub_date ;
            } elseif ($time_diff == 59) {
                $message[$i]['title']='پرداخت آگهی';
                $message[$i]['sender']='مدیریت';
                $message[$i]['message'] = "تبلیغ " . $data[$i]->title . " شما فردا غیر فعال می شود ، لطفا نسبت به پرداخت هزینه آن اقدام نمایید";

                $message[$i]['date']=$time_sub_date ;
            } elseif ($time_diff > 59) {
                $message[$i]['title']='پرداخت آگهی';
                $message[$i]['sender']='مدیریت';
                $message[$i] = "تبلیغ " . $data[$i]->title . " شما غیر فعال شده است ، لطفا نسبت به پرداخت هزینه آن اقدام نمایید";

                $message[$i]['date']=$time_sub_date ;
            }
        }
        return $message;
    }
}
