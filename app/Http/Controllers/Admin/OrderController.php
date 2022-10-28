<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderUpdatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:List Orders|Add Order|Update Order|Delete Order', ['only' => ['index','store']]);
        $this->middleware('permission:Show Order', ['only' => ['show']]);
        $this->middleware('permission:Add Order', ['only' => ['create','store']]);
        $this->middleware('permission:Update Order', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Order', ['only' => ['destroy']]);
    }


    public function index()
    {
        $orders = Order::with('user')->orderBy('id', 'DESC')->paginate(30);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order') );
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit' , compact('order'));
    }

    public function update(Request $request , Order $order)
    {
        $data = $request->validate([
            'status' => ['sometimes','required' , 'in:pending,charged,delivering' ],
        ]);

        $data = $request->except('_token');

        $order->update($data);

        $user = User::where('id', $order->user_id)->first();

        Notification::send($user, new OrderUpdatedNotification($order));

        toastr()->success(trans('messages.UpdateSuccessfully'));

        return redirect()->route('admin.orders.index');
    }

    public function destroy(Order $order)
    {
        $order -> delete();

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.orders.index');
    }
}
