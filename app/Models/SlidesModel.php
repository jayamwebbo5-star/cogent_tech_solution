<?php

namespace App\Models;

use CodeIgniter\Model;

class SlideModel extends Model
{
    protected $table = 'slides';
    protected $primaryKey = 'slide_id';
    protected $allowedFields = ['slide_title', 'slide_subtitle'];
}
