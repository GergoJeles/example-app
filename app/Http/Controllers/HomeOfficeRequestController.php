<?php

namespace App\Http\Controllers;

use App\Models\HomeOfficeRequest;
use Illuminate\Http\Request;
use App\Models\Supervisor;
use Inertia\Inertia;


class HomeOfficeRequestController extends Controller
{
    /**
     * Handle the incoming request to store a new home office request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'personalnumber' => 'required|string|max:255',
            'supervisor_id' => 'required|exists:supervisors,id', // Ensure supervisor_id is provided and exists
            'date' => 'required|date',
            'address' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'comments' => 'required|string',
        ]);

        HomeOfficeRequest::create([
            'user_id' => auth()->id(), // Assumes user is authenticated
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'personalnumber' => $request->personalnumber,
            'supervisor_id' => $request->supervisor_id, // Use supervisor_id to establish the relationship
            'date' => $request->date,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'comments' => $request->comments,
        ]);

        return redirect()->route('LoggedinPages/HomeOfficeRequest/Index')->with('message', 'Home office request submitted successfully.');
    }
    public function createForm()
    {
        $supervisors = Supervisor::all(); // Fetch all supervisors

        // Render a Vue component and pass the supervisors data
        return Inertia::render('LoggedinPages/HomeOfficeRequest/Index', [
            'supervisors' => $supervisors,
        ]);
    }
}
