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
        $status_message = 'nada que mostrar';
        return view('admin.poll', ['polls' => $polls, 'votes' => $votes, 'status_message' => $status_message]);
    }

    public function delete($id)
    {
        $poll = Poll::findOrFail($id);

        $poll->delete();

        $status_message = 'Se ha eliminado el registro con exito';

        return redirect()->action('AdminPollController@index')->with('status_message', $status_message);
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

        //$status_message = 'Se ha modificado la votacion con exito!';
        return redirect()->back()->with('success', 'Se ha modificado la votacion con exito!'); 
        //return redirect()->action('AdminPollController@index')->with(['status' => $status, 'status_message'=> $status_message]);
    }
}
