<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Message; // 新增
use App\Repositories\MessageRepository; // 新增

class MessageController extends Controller
{
    # by Deus
    /**
     * The repository instance.
     *
     * @var MessageRepository
     */
    protected $messages;

    # by Deus
    /**
     * Create a new controller instance.
     *
     * @param  MessageRepository  $messages
     * @return void
     */
    public function __construct(MessageRepository $messages) // 新增
    {
        $this->middleware('auth');

        $this->messages = $messages; // 新增
    }

    # by Deus
    /**
     * Display a list of all of the user's message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('messages.index', [
            'messages' => $this->messages->forUser($request->user()),
        ]);
    }

    # by Deus
    /**
     * Create a new message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        #laravel為relationship提供create方法,會接收一個陣列並自動設置foreign key
        #使用$request->user()得到目前的使用者,會被create自動填入user_id
        $request->user()->messages()->create([
            'name' => $request->name;
        ]);
    }

    # by Deus
    # authorize method的第一個參數是我們希望呼叫的policymethod名,第二個參數是model
    /**
     * Destroy the given message.
     *
     * @param  Request  $request
     * @param  Message  $message
     * @return Response
     */
    public function destroy(Request $request, Message $message)
    {
        $this->authorize('destroy', $message);

        $message->delete();

        return redirect('/messages');
    }

}
