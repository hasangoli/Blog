<?php

namespace App\Http\Controllers\Users;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\RecruitmentAds;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helper\File;
use App\Helper\RecruitmentAds as RecruitmentAds_Helper;

class PanelController extends Controller
{



    public $file;

    public $RecruitmentAds_Helper;
    public function __construct()
    {
        $this->file = new File();
        $this->RecruitmentAds_Helper = new RecruitmentAds_Helper();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' =>  'required|email',
            'phone' => 'nullable|string',
            'emergency_phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        try {
            $user = \Auth::user();

            if (isset($request->image)) {
                if (isset($user->image)) {
                    $oldImage = $user->image->first();
                    $imageUrl = $this->file->UpdateFile('users', $oldImage->title, 'users', $request->file('image'));
                    $user->image->update([
                        'title' => $imageUrl
                    ]);
                } else {
                    $imageUrl = $this->file->UploadFile('users', $request->file('image'));
                    $user->image->update([
                        'title' => $imageUrl
                    ]);
                }
            }
            $user->update([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'emergency_phone' => $request->emergency_phone,
                'address' => $request->address,
            ]);
            return response()->json([
                'message' => 'Updated',
                'success' => True,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Internal Server Error',
                'success' => False,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function update_user_info(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'emergency_phone' => 'required|string',
            'address' => 'required|string',
        ]);

        try {
            $user = \Auth::user();
            if (isset($request->image)) {
                if (isset($user->image)) {
                    $oldImage = $user->image->first();
                    $imageUrl = $this->file->UpdateFile('users', $oldImage->title, 'users', $request->file('image'));
                    $user->image->update([
                        'title' => $imageUrl
                    ]);
                } else {
                    $imageUrl = $this->file->UploadFile('users', $request->file('image'));
                    $user->image()->create([
                        'title' => $imageUrl
                    ]);
                }
            }
            $user->update([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'emergency_phone' => $request->emergency_phone,
                'address' => $request->address,
            ]);

            if($user->image){
                $user->image_profile = 'storage/users/'.$user->image->title;
            }else{
                $user->image_profile = 'storage/users/default.png';
            }

            return response()->json([
                'message' => 'profile of user updated successfully',
                'user'=>$user,
                'success' => True,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Internal Server Error',
                'success' => False,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update_user_pass(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed',
        ]);

        try {
            $user = \Auth::user();
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'message' => 'password updated',
                'success' => True,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Internal Server Error','success' => False
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //Return user tickets
    public function messageBox()
    {
        try {
            $RecruitmentAds = Auth()->user()->recruitment_ads;
            $message = $this->RecruitmentAds_Helper->Show_Messages($RecruitmentAds);

            $tickets = Ticket::where([
                'user_id'=>\Auth::user()->id,
            ])->get();

            $messageTicket = [];
            foreach($tickets as $key => $ticket){
                $messageTicket[$key]['title']=$ticket->title;
                $messageTicket[$key]['sender']='مدیریت';
                $messageTicket[$key]['message']=$ticket->message;
                $messageTicket[$key]['date']=toPersianHumanReadableTime($ticket->updated_at);
            }

            // dd($ticket);

            $message = array_merge($message,$messageTicket);
            $data = [
                'message' => $message,
                'count' => count($message)
            ];

            return response()->json($data, Response::HTTP_OK);
        } catch (Exception $exception) {
            dd($exception);
            return response()->json(['message' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function dashboard()
    {
        try {
            $user = Auth()->user();
            unset($user->recruitment_ads);
            (isset($message)) ? NULL : $message = NULL;
            $data = ([
                'user' => $user,
                'message' => $message,
            ]);
            return response()->json($data, Response::HTTP_OK);
        } catch (\Exception $exception) {
            dd($exception);
            return response()->json(['message' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function reqruitmentads_item_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:25',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'category_id' => 'required|int',
            'country_id' => 'required|int',
            // 'image'=>'nullable|mimes:jpg,bmp,png'
        ]);

        try {

            $slug = $request->slug ? str_replace(' ', '-', $request->slug) : str_replace(' ', '-', $request->title);


            $RecruitmentAds = Auth()->user()->recruitment_ads()->create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'country_id' => $request->country_id,
                'type' => 'Requirements',
                'status' => 0,
                'index' => 0,
            ]);



            if($request->file('image') && $request->file('image')!=''){
                foreach($request->file('image') as $file){
                    $imageUrl = $this->file->UploadFile('recruitmentAds', $file);
                    $image=$RecruitmentAds->image()->create(['title'=>$imageUrl]);
                }
            }

            return response()->json(["recruitment ads created successfully",'success' => True], Response::HTTP_OK);
        } catch (\Exception $exception) {
            dd($exception);
            return response()->json(['message' => 'Internal Server Error','success' => False,], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function reqruitmentads_items()
    {

        try {
            $RecruitmentAds = Auth()->user()->recruitment_ads()->get(['id','title','created_at']);
            foreach ($RecruitmentAds as $item) {
                if (isset($item->image()->first()->title))
                    $item->images = "storage/recruitmentAds/" . $item->image()->first()->title;
                $item->created_at = toPersianHumanReadableTime($item->created_at);
            }
            $data = ([
                'recruitmentAds' => $RecruitmentAds,
            ]);
            return response()->json($data, Response::HTTP_OK);
        } catch (\Exception $exception) {
            dd($exception);
            return response()->json(['message' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function update_ads(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:25',
            'slug' => 'nullable|string',
            // 'oldImage' => 'required|string',
            'description' => 'nullable|string',
            // 'category_id' => 'required|int',
            // 'country_id' => 'required|int',
            // 'type' => 'required|string',
        ]);


        $recruitmentAds = RecruitmentAds::query()->where(['id'=>$request->recruitmentAds_id , 'recruitment_adsable_id' => \Auth::user()->id])->first();

        $oldImage = $recruitmentAds->image()->get();
                // dd($oldImage);
                // $test = [];
        foreach($oldImage as $item){
            if(!in_array($item->title,$request->oldImage)){
                // $test []= $item->title;
                $item->delete();
                $this->file->DeleteFile('recruitmentAds', $item->title);
            }
        }


        try {
            if ($request->file('image') && $request->file('image')!='') {




                foreach($request->file('image') as $file){
                    $imageUrl = $this->file->UploadFile('recruitmentAds', $file);
                    $recruitmentAds->image()->create(['title'=>$imageUrl]);
                }

            }

            $slug = $request->slug ? str_replace(' ', '-', $request->slug) : str_replace(' ', '-', $request->title);
            $recruitmentAds->update([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'country_id' => $request->country_id,
                // 'type' => $request->type,
                // 'index' => $request->index,
            ]);

            return response()->json(['message' => 'ads updated successfully','success'=>True], Response::HTTP_OK);
        } catch (\Exception $exception) {
            dd($exception);
            return response()->json(['message' => $exception,'success'=>False], Response::HTTP_OK);
        }
    }


    public function destroy_ads(Request $request)
    {
        $recruitmentAds = RecruitmentAds::query()->where(['id'=>$request->recruitmentAds_id , 'recruitment_adsable_id' => \Auth::user()->id])->first();
        try {
            $oldImage = $recruitmentAds->image()->get();
            foreach($oldImage as $item){
                $item->delete();
                $this->file->DeleteFile('recruitmentAds', $item->title);
            }
            $recruitmentAds->delete();
            return response()->json(['message' => 'ads delete successfully','success'=>True], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'ads delete failed','success'=>False], Response::HTTP_OK);
        }
    }

    // public function reqruitmentads_items()
    // {

    //     try {
    //         $RecruitmentAds = Auth()->user()->recruitment_ads;
    //         $data = ([
    //             'recruitmentAds' => $RecruitmentAds,
    //         ]);
    //         return response()->json($data, Response::HTTP_OK);
    //     } catch (\Exception $exception) {
    //         dd($exception);
    //         return response()->json(['message' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    // }

    public function products_items()
    {

        try {
            $payments = Payment::where(['user_id' => Auth::user()->id, 'paymentsable_type' => 'App\Models\Product'],['status'=>1])->get();

            $products = [];

            foreach($payments as $key => $payment){
                $product = Product::where('id',$payment->paymentsable_id)->get();
                $product->toArray();
                $product['count'] = $payment->count;
                $product['date_order'] = toPersianHumanReadableTime($payment->created_at);

                $products[$key]=$product;
            }

            $data = ([
                'products' => $products,
            ]);
            return response()->json($data, Response::HTTP_OK);
        } catch (\Exception $exception) {
            dd($exception);
            return response()->json(['message' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
