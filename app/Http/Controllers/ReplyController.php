<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use App\Models\User;


class ReplyController extends Controller
{
    protected $reply = null;
    protected $ticket = null;
    public function __construct(Ticket $ticket, TicketReply $reply)
    {
        // $this->middleware('auth');
        $this->ticket = $ticket;
        $this->reply = $reply;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = TicketReply::orderBy('id', 'DESC')->get();
        $ticket_info = Ticket::orderBy('id', 'Desc')->pluck('token_id', 'id');
        return view('admin.tickets.ticketReply.replyList')->with('reply_data', $replies)->with('ticket_info', $ticket_info);
    }

    public function messageReply($ticket_token_id)
    {

        if (!auth()->user()) {
            return redirect('/login');
        }

        // dd($ticket_token_id);
        $ticket_message = $this->ticket->orderBy('id', 'Desc')->get()->where('status', 'Active') ?? "";
        $ticket_title = $this->ticket->orderBy('id', 'Desc')->get()->where('status', 'Active')->where('token_id', $ticket_token_id) ?? "";
        $token_id = "";
        $priority = "";

        if (isset($ticket_title) && $ticket_title != null) {
            foreach ($ticket_title as $message) {
                // $ticket_title = $message->title;
                // if ($message->ticket_status == 'Opened') {
                // dd($message);
                $token_id = $message->token_id;
                // dd($token_id);
                $priority = $message->priority;
                // }
                break;
            }
        }

        return view('admin.tickets.ticketReply.message')->with(
            [
                'ticket_message' => $ticket_message,
                'ticket_title' => $ticket_title,
                'token_id' => $token_id,
                'priority' => $priority
            ]
        );

        // $ticket_message = $this->ticket->orderBy('id', 'Desc')->get() ?? "";
        // $ticket_id = $this->ticket->get(['token_id', 'user_id', 'status']) ?? "";
        // $ticket_reply = "";
        // foreach ($ticket_id as $ticket) {
        //     $ticket_reply = $this->reply->get(['message', 'ticket_id', 'status'])->where('ticket_id', $ticket->token_id) ?? "";
        // }
        // $ticket_title = "";
        // $token_id = "";
        // $priority = "";

        // if (isset($ticket_message) && $ticket_message != null) {
        //     foreach ($ticket_message as $message) {
        //         $ticket_title = $message->title;
        //         $token_id = $message->token_id;
        //         $priority = $message->priority;
        //     }
        // }
        // return view('admin.tickets.ticketReply.message')->with(
        //     [
        //         'ticket_message' => $ticket_message,
        //         'ticket_title' => $ticket_title,
        //         'token_id' => $token_id,
        //         'priority' => $priority,
        //         'ticket_reply' => $ticket_reply
        //     ]
        // );


        // $tickets = Ticket::find($id);
        // if (!$tickets) {
        //     return redirect()->route('ticket.index');
        // }
        // // $tickets = Ticket::orderBy('id', 'DESC')->get();
        // $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        // return view('admin.tickets.ticketReply.message')->with('ticket_data', $tickets)->with('user_info', $user_info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket_info = Ticket::orderBy('id', 'Desc')->pluck('token_id', 'id');
        return view('admin.tickets.ticketReply.replyForm')->with('ticket_info', $ticket_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->reply->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->reply->fill($data);
        $status = $this->reply->save();
        if ($status) {
            notify()->success('Reply added successfully.');
        } else {
            notify()->error('Sorry! There was problem while adding reply.');
        }
        return redirect()->route('reply.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->reply = $this->reply->find($id);
        $ticket_info = Ticket::orderBy('id', 'Desc')->pluck('token_id', 'id');
        if (!$this->reply) {
            notify()->error('This reply doesnot exists');
            return redirect()->route('reply.index');
        }
        return view('admin.tickets.ticketReply.replyView')->with('reply_data', $this->reply)->with('ticket_info', $ticket_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->reply = $this->reply->find($id);
        $ticket_info = Ticket::orderBy('id', 'Desc')->pluck('token_id', 'id');
        if (!$this->reply) {
            notify()->error('This reply doesnot exists');
            return redirect()->route('reply.index');
        }

        return view('admin.tickets.ticketReply.replyForm')->with('reply_data', $this->reply)->with('ticket_info', $ticket_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->reply = $this->reply->find($id);
        $ticket_info = Ticket::orderBy('id', 'Desc')->pluck('token_id', 'id');
        if (!$this->reply) {
            notify()->error('This reply doesnot exists');
            return redirect()->route('reply.index');
        }
        $rules = $this->reply->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->reply->fill($data);
        $status = $this->reply->save();
        if ($status) {
            notify()->success('Reply updated successfully.');
        } else {
            notify()->error('Sorry! There was problem while adding reply.');
        }
        return redirect()->route('reply.index')->with('ticket_info', $ticket_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->reply = $this->reply->find($id);
        if (!$this->helpCenter) {
            notify()->error('This reply doesnot exists');
            redirect()->route('reply.index');
        }
        $del = $this->reply->delete();
        if ($del) {
            notify()->success('Reply deleted successfully');
        } else {
            notify()->error('There was problem in deleting reply');
        }
        return redirect()->route('reply.index');
    }
}
