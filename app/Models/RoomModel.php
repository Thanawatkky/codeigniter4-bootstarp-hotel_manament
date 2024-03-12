<?php namespace App\Models;
use CodeIgniter\Model;
class RoomModel extends Model
{
    protected $table = "tb_room";
    protected $primaryKey = "id";
    protected $allowedFields = ['id','room_number', 'price', 'bed_qty', 'room_img', 'people_qty','is_active'];
}