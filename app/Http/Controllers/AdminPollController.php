<?php

namespace App\Http\Controllers;

use App\Poll;
use App\PollUser;
use Illuminate\Http\Request;

class AdminPollController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user_coop_id = auth()->user()->coop_id;
        $polls = Poll::where('coop_id', $user_coop_id)->paginate(5);
        $votes = PollUser::all();
        
        return view('admin.poll', ['polls' => $polls, 'votes' => $votes]);
    }

    public function delete($id)
    {
        $poll = Poll::findOrFail($id);

        $poll->delete();

        $success = 'Eliminado con exito';

        return redirect()->back()->with('message', $success);
    }

    public function update($id)
    {
        $poll = Poll::findOrFail($id);

        $status = $poll->status;

        if ($status == 'active') {
            $poll->status = 'disable';
            $poll->save();
        }else {
            $poll->status = 'active';
            $poll->save();
        }
        $changed = 'Modificado con exito!';

        return redirect()->back()->with('message', $changed);
    }
}
