<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
       protected $fillable =  [ 
   				'team_name',
   				'team_creator',
   				'team_role',
   				'discription'
];


}
