<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\answer;
use App\Models\assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Teams_Controller extends Controller
{
    // Function to implement:
    // -   collect answers

    public function push_answer(Request $request)
    {
        DB::transaction(function() use($request){
            $answer = answer::create(
            [
                'user_id' => $request->user()->id,
                'assignment_id' => $request->id,
                'attachment' => $request->attachment,
                'posted_at' => Carbon::now(),
            ]);
            $answer->save();
        });
        return response('Succesfully upload answer', 200);
    }
}
