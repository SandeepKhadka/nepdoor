<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
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

    public function createTicket()
    {
        $subscription = Subscription::where('user_id', auth()->user()->id)->where('status', 'Active')->first();
        $ticket_status = $this->ticket->get(['ticket_status', 'user_id', 'status'])->where('user_id', auth()->user()->id)->where('status', 'Active') ?? "";
        return view('front.supportTicket.createTicket')
            ->with('ticket_status', $ticket_status)
            ->with('subscription', $subscription);
    }

    public function storeTicket(Request $request)
    {
        $rules = $this->ticket->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['token_id'] = 'tok-' . rand(0, 99) . '-' . $data['user_id'];
        $this->ticket->fill($data);
        $status = $this->ticket->save();
        if($status){
            notify()->success('Ticket created successfully');
            return redirect('customer/allTicket');
        }else{
            notify()->error('There was a problem in creating ticket');
            return redirect()->back();
        }
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
        if($status){
            return redirect('customer/allTicket');
        }else{
            return redirect()->back();
        }
    }


    public function updateTicket(Request $request, $id)
    {
        $this->ticket = $this->ticket->find($id);
        if (!$this->ticket) {
            notify()->error('This ticket doesnot exists');
            return redirect()->route('ticket.index');
        }
        $rules = $this->ticket->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->ticket->fill($data);
        $status = $this->ticket->save();
        // if ($status) {
        //     notify()->success('Ticket updated successfully.');
        // } else {
        //     notify()->error('Sorry! There was problem while adding ticket.');
        // }
        return redirect()->back();
    }

    public function displayAllTickets()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $ticket_message = $this->ticket->orderBy('id', 'Desc')->with('user_info')->get()->where('status', 'Active') ?? "";
        $ticket_title = $this->ticket->orderBy('id', 'Desc')->get(['title', 'user_id', 'token_id', 'ticket_status', 'status'])->where('user_id', auth()->user()->id)->where('status', 'Active') ?? "";
        // dd($ticket_title);
        // $ticket_id = $this->ticket->get(['token_id', 'user_id', 'status'])->where('user_id', auth()->user()->id)->where('status', 'Active') ?? "";
        // $ticket_reply = "";
        // foreach ($ticket_id as $ticket) {
        //     $ticket_reply = $this->ticketReply->get(['message', 'ticket_id', 'status'])->where('ticket_id', $ticket->token_id) ?? "";
        // }
        // $ticket_title = "";
        // foreach($ticket_title as $ticket){
        //     $title = $ticket->title;
        // }
        // dd($title);
        $token_id = "";
        $priority = "";
        // dd($ticket_reply);
        if (isset($ticket_message) && $ticket_message != null) {
            foreach ($ticket_message as $message) {
                // $ticket_title = $message->title;
                // if ($message->ticket_status == 'Opened') {
                    // dd($message);
                    $token_id = $message->token_id;
                    $priority = $message->priority;
                // }
                break;
            }
        }
        return view('front.supportTicket.allTickets')->with(
            [
                'ticket_message' => $ticket_message,
                'ticket_title' => $ticket_title,
                'token_id' => $token_id,
                'priority' => $priority
            ]
        );

        // dd($ticket_title);

    }
}
