<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use App\Models\Order;

class CpanelController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('cpanel.cpanel', compact('orders'));
    }

    public function schedules()
    {
        $orders = Order::all();
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->worker_id . '-' . $order->timeslot->format('l');
        });
        return view('cpanel.schedules', compact('orders', 'groupedOrders'));
    }

    public function workers()
    {
        $orders = Order::all();
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->worker_id;
        })->map(function ($workerOrders) {
            return $workerOrders->groupBy(function ($order) {
                return $order->timeslot->format('l');
            });
        });
        return view('cpanel.workers', compact('orders', 'groupedOrders'));
    }
}
