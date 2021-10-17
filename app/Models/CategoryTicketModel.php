<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryTicketModel extends Model
{
    protected $table = "category_ticket";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'category', 'statusUrgent'];

    public function getCategory()
    {
        return $this->db->table('category_ticket')
         ->get()->getResultArray();  
    }
}
