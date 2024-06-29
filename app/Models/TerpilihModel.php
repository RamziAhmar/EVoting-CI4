<?php

namespace App\Models;

use CodeIgniter\Model;

class TerpilihModel extends Model
{
    protected $table            = 'terpilih';
    protected $primaryKey       = 'id_terpilih';
    protected $allowedFields    = ['id_pemilihan','id_kandidat','perolehan_suara'];


}
