<?php
/**
 * Created by   :  Muhammad Yasir
 * Project Name : packeges
 * Product Name : PhpStorm
 * Date         : 22-Apr-16 11:51 AM
 * File Name    : MessengerController.php
 */

namespace Pasha\Messenger\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function index() {
        return view('Messenger::index');
    }

    public function create() {
        $users = User::where('id', '!=', 1)->get();
        return view('Messenger::create', compact('users'));
    }

    public function store() {
        $input  = Input::all();
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipients
        if(Input::has('recipients')) {
            $thread->addParticipants($input['recipients']);
        }
        return redirect('messages');
    }
}
