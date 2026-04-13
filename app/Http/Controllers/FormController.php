<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Form::orderBy('id', 'desc')->get();
        return view('backend.pages.form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = new Form();

        $form->header_name = $request->header_name;
        $form->name = $request->name;
        $form->text = $request->text;
        $form->year_text = $request->year_text;
        $form->price = $request->price;
        $form->description = $request->description;
        $form->footer_details = $request->footer_details;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('all_image'), $imageName);


            $form->image = 'all_image/' . $imageName;
        }

        $form->save();

        return redirect()->back()->with('success', 'Information saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $form = Form::findOrFail($id);
        return view('backend.pages.form.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $form = Form::findOrFail($id);
        $form->header_name = $request->header_name;
        $form->name = $request->name;
        $form->text = $request->text;
        $form->year_text = $request->year_text;
        $form->price = $request->price;
        $form->description = $request->description;
        $form->footer_details = $request->footer_details;

        if ($request->hasFile('image')) {
            if ($form->image && file_exists(public_path($form->image))) {
                unlink(public_path($form->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('all_image'), $imageName);
            $form->image = 'all_image/' . $imageName;
        }

        $form->save();
        return redirect()->route('forms.index')->with('success', 'Information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $form = Form::findOrFail($id);


        if ($form->image && file_exists(public_path($form->image))) {
            unlink(public_path($form->image));
        }

        $form->delete();
        return redirect()->back()->with('success', 'Item deleted successfully!');
    }
    public function checkoutStore(Request $request)
    {
        Checkout::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
    public function bookStore(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'email' => 'nullable|string',
            'booking_date' => 'nullable|string',
            'guests' => 'nullable|string',
            'additional_info' => 'nullable|string',
        ]);
        DB::table('workshop_bookings')->insert([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'booking_date' => $validated['booking_date'],
            'guests' => $validated['guests'],
            'additional_info' => $validated['additional_info'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'your form has been filled');
    }
}
