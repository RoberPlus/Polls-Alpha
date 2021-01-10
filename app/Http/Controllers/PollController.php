<?php

namespace App\Http\Controllers;

use App\Poll;
use App\User;
use App\Vote;
use App\Option;
use App\PollUser;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_coop_id = auth()->user()->coop_id;

        $polls = Poll::where('coop_id', $user_coop_id)->paginate(5);

        $votes = PollUser::all();

        return view('polls.index', ['polls' => $polls, 'votes' => $votes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        if (auth()->user()->role == 'admin') {
            return view('polls.create');
        }
        return abort('403');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion 
        $data = $request->validate([
            'title' => 'required|min:6',
            'description' => 'required',
            'image' => 'required|image',
            'coop_id' => 'required',
            'option' => 'required'
        ]);

        // Ruta imagen y fecha.
        $image_path = $request['image']->store('upload-recetas', 'public');
        $date = Carbon::now();

        // Insertar votacion.
        Poll::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'coop_id' => auth()->user()->coop_id,
            'image' => $image_path,
            'status' => 'active',
            'created_at' => $date
        ]);

        // Obtener id de la votacion recien creada
        $poll = Poll::where('created_at', $date)->get();
        $poll_id = $poll[0]->id;

        $insert_option = [];
        $number = count($request["option"]);

        // Creamos un array listo para insertar
        for ($i = 0; $i < $number; $i++) {
            if (trim($request["option"][$i] != '')) {
                $insert_option[] = [
                    'option'    => $request["option"][$i],
                    'poll_id'   => $poll_id,
                    'updated_at' => $date,
                    'created_at' => $date
                ];
            }
        }

        // Insertamos las opciones con su votacion correspondiente
        Option::insert($insert_option);

        // Redirect index.
        return redirect()->action('PollController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::findOrFail($id);

        $this->authorize('view', $poll);

        $votes = Vote::where('poll_id', $id)->get();
        $total_votes = $votes->count();
        $votes_by_option = $votes->groupBy('option_id');

        $user_id = auth()->user()->id;

        $match = PollUser::where([['user_id', '=', $user_id], ['poll_id', '=', $id]])->firstOr(function () {
            return false;
        });

        return view(
            'polls.show',
            [
                'poll' => $poll,
                'votes_by_option' => $votes_by_option,
                'match' => $match,
                'total_votes' => $total_votes
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request, $id)
    {
        $data = $request->validate([
            'vote' => 'required'
        ]);

        $poll = Poll::find($id);
        $user_id = auth()->user()->id;
        $poll_id = $poll->id;

        $match = PollUser::where([['user_id', '=', $user_id], ['poll_id', '=', $poll_id]])->firstOr(function () {
            return false;
        });

        if (!$match) {
            Vote::create([
                'option_id' => $data['vote'],
                'poll_id' => $poll_id
            ]);

            PollUser::create([
                'user_id' => $user_id,
                'poll_id' => $poll_id,
            ]);

            return view('vote.success');
        } else {
            return view('vote.fail');
        }

        $poll = Poll::find($id);

        return redirect()->action('PollController@show', ['id' => $id]);
    }
}
