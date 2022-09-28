<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticket = null;
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
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
}
