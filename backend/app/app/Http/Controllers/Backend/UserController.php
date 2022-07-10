<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Helper\File;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RecruitmentAds;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    public $file;

    public function __construct()
    {

        $this->file = new File();;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
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
        $user = User::find($id);
        return view("admin.users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
        ]);

        try {

            if ($request->image) {
                if ($user->image()->first()) {
                    $oldImage = $user->image()->first();
                    $imageUrl = $this->file->UpdateFile('users', $oldImage->title, 'users', $request->file('image'));
                    $user->image()->update([
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
                'lastName' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'emergency_phone' => $request->emergency_phone,
                'address' => $request->address
            ]);

            Toastr::success('message', 'user updated successfully');
            return redirect(route('admin.users.index', $user->id));
        } catch (\Exception $exception) {
            Toastr::error('message', 'user updated failed');
            return redirect(route('admin.users.edit', $user->id));
            return back();
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

    public function index_tickets()
    {
        $users = User::all();
        return view('admin.tickets.index', compact('users'));
    }

    public function change_user_status(Request $request)
    {
        try {
            $user = User::where('id', $request->user_id)->update([
                'status' => $request->status,
            ]);

            Toastr::success('message', 'user status changed');
            return redirect(route('admin.users.index'));
        } catch (Exception $exception) {
            dd($exception);
            Toastr::error('message', 'user submit failed');
            return back();
        }
    }

    public function all_user_boughts($type, $user_id)
    {
        $kind = $type;
        $type = ($type == "advertise") ? 'App\Models\RecruitmentAds' : 'App\Models\Product';

        $items = Payment::where(['paymentsable_type' => $type, 'user_id' => $user_id])->get()->unique('paymentsable_id');
        foreach ($items as $item) {
            $item->title = $item->paymentsable->title;
            unset($item->paymentsable);
        }
        return view('admin.users.boughts', compact('items', 'kind'));
    }

    public function show_user_payments($type, $item_id, $user_id)
    {
        $kind = $type;
        $type = ($type == 'products') ? 'App\Models\Product' : 'App\Models\RecruitmentAds';
        $items = Payment::where(['paymentsable_id' => $item_id, 'paymentsable_type' => $type, 'user_id' => $user_id])->get();
        return view('admin.users.payments', compact('kind', 'items'));
    }

    public function change_user_recruitment_status(Request $request)
    {
        try {
            $user = RecruitmentAds::where('id', $request->item_id)->update([
                'status' => $request->status,
            ]);

            Toastr::success('message', 'user recruitment ads status changed');
            return redirect(route('admin.users.boughts', ['type' => $request->type, 'user_id' => $request->user_id]));
        } catch (Exception $exception) {
            Toastr::error('message', 'user recruitment ads submit failed');
            return back();
        }
    }
}
