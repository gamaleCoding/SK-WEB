<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concern;

class ConcernsController extends Controller
{
    public function concern(Request $request)
    {
        // dd($request->all());
        $success = Concern::create([
            'message' => $request->message
        ]);
        if ($success) {
            return redirect()->back()->with(
                'success',
                'Thank you for your concern. We truly appreciate it!',
            );
        } else {
            return redirect()->back()->with(
                'error',
                'Failed to submit your concern'
            );
        }
    }
}
