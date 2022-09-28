<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticket = null;
    protected $ticketReply = null;
    public function __construct(Ticket $ticket, TicketReply $ticketReply)
    {
        $this->ticket = $ticket;
        $this->ticketReply = $ticketReply;
    }

    public function storeTicket(Request $request)
    {
        $rules = $this->ticket->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['token_id'] = 'tok-' . rand(0, 99) . '-' . $data['user_id'] ;
        $this->ticket->fill($data);
        $status = $this->ticket->save();
        return redirect()->back();
    }

    public function displayAllTickets(){
        $ticket_message = $this->ticket->message;
        $ticket_reply = $this->ticketReply->message;
        return view('front.supportTicket.allTickets')->with(
            [
                'ticket_message' => $ticket_message,
                'ticket_reply' => $ticket_reply
            ]
        );
    }
}
