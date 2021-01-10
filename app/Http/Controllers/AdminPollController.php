<?php

namespace App\Http\Controllers;

use App\Poll;
use App\PollUser;
use Illuminate\Http\Request;

class AdminPollController extends Controller
{
    public function index()
    {
        $user_coop_id = auth()->user()->coop_id;
        $polls = Poll::where('coop_id', $user_coop_id)->paginate(5);
        $votes = PollUser::all();
        
        return view('admin.poll', ['polls' => $polls, 'votes' => $votes]);
    }
}
