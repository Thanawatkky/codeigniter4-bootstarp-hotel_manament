<?php namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model 
{
    protected $table = "tb_booking";
    protected $primaryKey = "b_id";
    protected $allowedFields = ["check_in","check_out","total_price","c_status","room","user"];
}