<?php
namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\WorkshopBooking;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{

    public function index()
    {
        $bookings = WorkshopBooking::latest()->get();
        return view('backend.pages.workshops.index', compact('bookings'));
    }
    public function checkoutList()
    {
       $checkoutLists = Checkout::all();
       return view('backend.pages.workshops.checkoutList',compact('checkoutLists'));
    }

    public function create()
    {
        return view('backend.pages.workshops.create');
    }

    // ৩. ডাটাবেসে সেভ করা
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'booking_date' => 'required|date',
            'guests' => 'required|integer',
            'additional_info' => 'nullable'
        ]);

        WorkshopBooking::create($data);
        return redirect()->route('workshops.index')->with('success', 'successed');
    }

    // ৪. এডিট ফর্ম দেখানো
    public function edit(WorkshopBooking $workshop)
    {
        return view('backend.pages.workshops.edit', compact('workshop'));
    }

    // ৫. ডাটা আপডেট করা
    public function update(Request $request, WorkshopBooking $workshop)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'booking_date' => 'required|date',
            'guests' => 'required|integer',
            'additional_info' => 'nullable'
        ]);

        $workshop->update($data);
        return redirect()->route('workshops.index')->with('success', 'updated');
    }

    // ৬. ডাটা ডিলিট করা
    public function destroy(WorkshopBooking $workshop)
    {
        $workshop->delete();
        return back()->with('success', 'deleted');
    }
}