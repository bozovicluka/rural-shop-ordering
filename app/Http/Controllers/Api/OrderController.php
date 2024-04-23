<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApproveOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderApprovedMail;
use App\Mail\OrderCreatedMail;
use App\Mail\OrderDeliveryMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());
        Mail::to($order->user_email)->send(new OrderCreatedMail($order));
    }

    public function approve(Order $order, ApproveOrderRequest $request)
    {
        //fetch user from other application
        $response = Http::get(config('app.rural_shop_url') . '/api/ads/' . $order->ad_id);
        $ad = $response->json();
        $comment = $request->comment;
        $order->update(['is_approved' => true]);
        Mail::to($order->email)->send(new OrderApprovedMail($order));
        Mail::to(config('mail.delivery_address'))->send(new OrderDeliveryMail($order, $comment, $ad));
    }

    public function index(Request $request)
    {
        $user_id = $request->user_id;
        return Order::query()->where('user_id', $user_id)->get();
    }

    public function show(Order $order)
    {
        return $order;
    }
}
