<?php

use Illuminate\Support\Carbon;

function toPersianMoney($price, $flag = false)
{
    return $flag ? number_format(floatval($price), 0) . " تومان " : number_format(floatval($price), 0);
}

function toPersianHumanReadableTime($time)
{
    return \Morilog\Jalali\Jalalian::forge(Carbon::parse($time)->timestamp)->format('H:i:s Y/m/d');
}

function generateCode()
{
    return mt_rand(100000, 999999);
}


function zarinpalRequest($amount, $email = "", $phone_number = "", $description = "")
{
    $callbackUrl =  strval(env('APP_URL')) . strval(env('ZARINPANL_CALLBACK_URL'));

    $sandbox = boolval(env("ZARINPANL_SANDBOX")) ? "sandbox" : "www";

    $client = new SoapClient("https://{$sandbox}.zarinpal.com/pg/services/WebGate/wsdl", ['encoding' => 'UTF-8']);

    $inputs = [
        'MerchantID' => strval(env('ZARINPANL_MERCHANT_ID')),
        'Amount' => $amount,
        'Description' => $description,
        'Email' => $email,
        'Mobile' => $phone_number,
        'CallbackURL' => $callbackUrl,
    ];

    $result = $client->PaymentRequest($inputs);

    $error = array(
        "-1"      => "اطلاعات ارسال شده ناقص است.",
        "-2"      => "IP و يا مرچنت كد پذيرنده صحيح نيست",
        "-3"      => "با توجه به محدوديت هاي شاپرك امكان پرداخت با رقم درخواست شده ميسر نمي باشد",
        "-4"      => "سطح تاييد پذيرنده پايين تر از سطح نقره اي است.",
        "-11"     => "درخواست مورد نظر يافت نشد.",
        "-12"     => "امكان ويرايش درخواست ميسر نمي باشد.",
        "-21"     => "هيچ نوع عمليات مالي براي اين تراكنش يافت نشد",
        "-22"     => "تراكنش نا موفق ميباشد",
        "-33"     => "رقم تراكنش با رقم پرداخت شده مطابقت ندارد",
        "-34"     => "سقف تقسيم تراكنش از لحاظ تعداد يا رقم عبور نموده است",
        "-40"     => "اجازه دسترسي به متد مربوطه وجود ندارد.",
        "-41"     => "اطلاعات ارسال شده مربوط به AdditionalData غيرمعتبر ميباشد.",
        "-42"     => "مدت زمان معتبر طول عمر شناسه پرداخت بايد بين 30 دقيه تا 45 روز مي باشد.",
        "-54"     => "درخواست مورد نظر آرشيو شده است",
        "100"     => "عمليات با موفقيت انجام گرديده است.",
        "101"     => "عمليات پرداخت موفق بوده و قبلا PaymentVerification تراكنش انجام شده است.",
    );

    //return the successful response
    if ($result->Status == 100) {
        $result->pid = generateCode();
        $result->email = $email;
        $result->phone_number = $phone_number;
        $result->message = $error["{$result->Status}"];
        return $result;
    }

    // find the proper msg to show
    if (array_key_exists("{$result->Status}", $error)) {
        $result->message = $error["{$result->Status}"];
        return $result;
    } else {
        $result->message = "خطای نامشخص هنگام اتصال به درگاه زرین پال";
        return $result;
    }
}


function zarinpalVerify($amount, $authority, $status)
{

    if ($status == 'OK') {
        $sandbox = boolval(env("ZARINPANL_SANDBOX")) ? "sandbox" : "www";
        $client = new SoapClient('https://' . $sandbox . '.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);


        $result = $client->PaymentVerification(
            [
                'MerchantID' => strval(env('ZARINPANL_MERCHANT_ID')),
                'Authority' => $authority,
                'Amount' => $amount,
            ]
        );
        if ($result->Status == 100) {
            $result->message = "عملیات با موفقیت انجام شد.";
            return $result;
        } else {
            echo 'Transaction failed. Status:' . $result->Status;
            $result->message = "عملیات با موفقیت انجام نشد.";
            return $result;
        }
    } else {
        $data['status'] = -1;
        $data['message'] = "عملیات توسط کاربر لغو شد.";
        return $data;
    }
}

function zarinpalRedirect($authority)
{
    $sandbox = boolval(env("ZARINPANL_SANDBOX")) ? "sandbox" : "www";
    return redirect()->away('https://' . $sandbox . '.zarinpal.com/pg/StartPay/' . $authority);
}

