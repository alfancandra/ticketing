<?php

namespace App\Controllers;

use App\Models\TicketModel;

class TicketController extends BaseController
{
    protected $ticket;

    function __construct()
    {
        $this->ticket = new TicketModel();
    }

    public function index()
    {
        $data['ticket'] = $this->ticket->getTicket();
        return view('ticket/index', $data);
    }
}