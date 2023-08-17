<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Image;
use App\Models\Feedback; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function feedback()
    {
        return view('feedback');
    }

    public function view()
    {
        $feedback = Feedback::all();
        return view('feedback-admin', ['feedback' => $feedback]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $feedback = new feedback();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->message=$request->message;
        $feedback->save();

        return redirect('/feedback');
    }

    public function delete($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback) {
            $feedback->delete();
            return redirect('/feedback-admin')->with('success', 'Feedback record deleted successfully.');
        } else {
            return redirect('/feedback')->with('error', 'Feedback record not found.');
        }
    }

}