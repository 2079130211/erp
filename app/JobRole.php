<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
        protected $fillable = [
    	'job_role',
    	'sallery',
    	'experience',
    	'certification',
    	'qualification',
    	'part_of_team'
    ];
}
