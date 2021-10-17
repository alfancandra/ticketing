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
}
