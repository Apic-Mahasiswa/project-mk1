<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\answer;
use App\Models\assignment;
use App\Models\news;
use App\Models\status;
use Illuminate\Support\Facades\DB;


class Admin_Controller extends Controller
{
    // Functions to implement:
    // -   Push news
    // -   Take down news
    // -   push assignment
    // -   check answers
    // -   accept teams

    // change assignment status when finished not done
    //return response sebagai placeholder

    public function accept_teams(User $user)
    {
        $user->status->flag = 1;
        return response('Succesfully accepted!',200);
    }

    public function push_news(Request $request)
    {
        DB::transaction(function() use($request)
        {
            $news = news::create
            (
                [
                'Title' => $request->Title,
                'attachment' => $request->attachment,
                ]
            );
            $news->save();
        });
        return response('Succesfully Created news!', 200);
    }

    public function delete_news(news $news)
    {
        $news->delete();
        return response('Succesfully deleted!',200);
    }


    public function check_answer(Request $req)
    {
        $assignment = assignment::where('id', $req->id);
        //return collection of answer to be rendered in the view
        return $assignment->answer()->all();
    }

    public function push_assignment(Request $request)
    {
        DB::transaction(function() use($request){
            $assignment = assignment::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'end_time' => $request->end_time,
                'role' => $request->role,
                'status' => $request->status,
            ]);
            $assignment->save();
        });
        return response('Mantepp dah selese di up!', 200);
    }

}
