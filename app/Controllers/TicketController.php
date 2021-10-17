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

    public function store()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email Harus Valid'
                ]
            ],
            'category_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'message' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->ticket->insert([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'category_id' => $this->request->getVar('category_id'),
            'message' => $this->request->getVar('message'),
        ]);
        session()->setFlashdata('message', 'Ticket Berhasil terkirim');
        return redirect()->to('/');
    }
}