<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = "ticket";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama', 'email', 'category_id', 'message','statusTicket'];

    public function getTicket()
    {
        return $this->db->table('ticket')
         ->join('category_ticket','category_ticket.id=ticket.category_id')
         ->get()->getResultArray();  
    }
}