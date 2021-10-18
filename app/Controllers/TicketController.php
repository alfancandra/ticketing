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
        $data['ticket'] = $this->ticket->getTicketActive(0);
        return view('ticket/index', $data);
    }

    public function diatasi()
    {
        $data['ticket'] = $this->ticket->getTicketActive(1);
        return view('ticket/diatasi', $data);
    }

    public function showbyid($id)
    {
        $data['ticket'] = $this->ticket->getTicketById($id);
        return view('ticket/show', $data);
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

    public function sendmessage()
    {
        if (!$this->validate([
            'message' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $to = $this->request->getVar('email');
        $subject = $this->request->getVar('id');
        $message = $this->request->getVar('message');
        print_r($to);
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('hello@example.com', 'Ticket');
        
        $email->setSubject('RE TICKET['.$subject.']');
        $email->setMessage($message);

        if ($email->send()) 
        {
            echo 'Email successfully sent';
        } 
        else 
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
        return redirect()->to('/ticket/'.$subject);
    }

    public function solved($id)
    {
        $this->ticket->update($id,[
            'statusTicket' => 1,
        ]);
        return redirect()->to('/ticket');
    }
}