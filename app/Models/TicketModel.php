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

    public function getTicketActive($active)
    {
        return $this->db->table('ticket t')
        ->select('t.id as idticket,t.nama,t.statusTicket,t.email,c.category,t.message,c.statusUrgent,t.created_at as tanggal_buat,t.updated_at as tanggal_update')
        ->where('t.statusTicket',$active)
        ->orderBy('t.updated_at','ASC')
        ->join('category_ticket c','c.id=t.category_id')
        ->get()->getResultArray();  
    }

    public function getTicketById($id)
    {
        return $this->db->table('ticket t')
        ->select('t.id as idticket,t.nama,t.statusTicket,t.email,c.category,t.message,c.statusUrgent,t.created_at as tanggal_buat,t.updated_at as tanggal_update')
        ->where('t.id',$id)
        ->join('category_ticket c','c.id=t.category_id')
        ->get()->getResultArray();  
    }

}