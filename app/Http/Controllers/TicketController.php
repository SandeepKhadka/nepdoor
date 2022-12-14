<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    protected $ticket = null;
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('id', 'DESC')->get();
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        return view('admin.tickets.ticket.ticketList')->with('ticket_data', $tickets)->with('user_info', $user_info);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        return view('admin.tickets.ticket.ticketForm')->with('user_info', $user_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->ticket->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['token_id'] = 'tok-' . rand(0, 99) . '-' . $request->user_id;
        $this->ticket->fill($data);
        $status = $this->ticket->save();
        if ($status) {
            notify()->success('Ticket added successfully.');
        } else {
            notify()->error('Sorry! There was problem while adding ticket.');
        }
        return redirect()->back();
    }

    public function storeTicketReply(Request $request, $token_id)
    {

        $rules = $this->ticket->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['token_id'] = $token_id;
        $this->ticket->fill($data);
        $status = $this->ticket->save();
        return redirect()->back();
    }

    public function replyAndClose(Request $request, $token_id)
    {

        $rules = $this->ticket->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['token_id'] = $token_id;
        $data['ticket_status'] = "Closed";
        $this->ticket->fill($data);
        $this->ticket->where('token_id', $token_id)
            ->update([
                'ticket_status' => "Closed"
            ]);
        $status = $this->ticket->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->ticket = $this->ticket->find($id);
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        if (!$this->ticket) {
            notify()->error('This ticket doesnot exists');
            return redirect()->route('ticket.index');
        }
        return view('admin.tickets.ticket.ticketView')->with('ticket_data', $this->ticket)->with('user_info', $user_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->ticket = $this->ticket->find($id);
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        if (!$this->ticket) {
            notify()->error('This ticket doesnot exists');
            return redirect()->route('ticket.index');
        }
        return view('admin.tickets.ticket.ticketForm')->with('ticket_data', $this->ticket)->with('user_info', $user_info);
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
        $this->ticket = $this->ticket->find($id);
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        if (!$this->ticket)
        {
            notify()->error('This ticket doesnot exists');
            return redirect()->route('ticket.index');
        }
        $rules = $this->ticket->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->ticket->fill($data);
        $status = $this->ticket->save();
        if ($status) {
            notify()->success('Ticket updated successfully.');
        } else {
            notify()->error('Sorry! There was problem while adding ticket.');
        }
        return redirect()->route('ticket.index')->with('user_info', $user_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ticket = $this->ticket->find($id);
        if (!$this->ticket) {
            notify()->error('This ticket doesnot exists');
            redirect()->route('ticket.index');
        }
        $del = $this->ticket->delete();
        if ($del) {
            notify()->success('Ticket deleted successfully');
        }
        else {
            //message
            notify()->error('Sorry! there was problem in deleting ticket');
        }
        return redirect()->route('ticket.index');
    }
}
