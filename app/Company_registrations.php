<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_registrations extends Model
{
       protected $fillable =  [ 
    			'company_name',
    			'slug',
 				'tegline',
 				'website',
 				'company_email',
 				'founder',
 				'founder_email',
 				'contact_number',
 				'street_address',
 				'city',
 				'state',
 				'country',
 				'pin_code',
 				'gst_in',
 				'office_start',
 				'office_end',
 				'establish',
 				'facebook',
 				'twitter',
 				'whatsapp',
 				'category',
 				'erp_url',
 				'password',
 				'macaddress'
 			];
}
