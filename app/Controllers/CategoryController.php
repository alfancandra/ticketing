<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TicketModel;
use App\Models\CategoryTicketModel;

class CategoryController extends BaseController
{
    protected $category;

    function __construct()
    {
        $this->category = new CategoryTicketModel();
    }

    public function index()
    {
        $data['category'] = $this->category->getCategory();
        return view('category/index', $data);
    }

    public function create()
    {
        return view('category/add');
    }

    public function store()
    {
        if (!$this->validate([
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'statusUrgent' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->category->insert([
            'category' => $this->request->getVar('category'),
            'statusUrgent' => $this->request->getVar('statusUrgent'),
        ]);
        session()->setFlashdata('message', 'Category Berhasil Ditambah');
        return redirect()->to('/category');
    }
}
