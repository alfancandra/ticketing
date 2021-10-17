<?php

namespace App\Controllers;

use App\Models\CategoryTicketModel;

class Home extends BaseController
{
    protected $category;

    function __construct()
    {
        $this->category = new CategoryTicketModel();
    }

    public function index()
    {
        $data['category'] = $this->category->getCategory();
        return view('home', $data);
    }
}
