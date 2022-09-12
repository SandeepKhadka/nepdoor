<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    protected $reply = null;
    public function __construct(TicketReply $reply)
    {
        // $this->middleware('auth');
        $this->reply = $reply;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = TicketReply::orderBy('id','DESC')->get();
        $ticket_info = Ticket::orderBy('id', 'Desc')->pluck('token_id', 'id');
        return view('admin.tickets.ticketReply.replyList')->with('reply_data', $replies)->with('ticket_info', $ticket_info);
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

            return redirect()->route('reply.index');
        }
        $rules = $this->reply->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->reply->fill($data);
        $status = $this->reply->save();
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
        $del = $this->reply->delete();
        return redirect()->route('reply.index');
    }
}
