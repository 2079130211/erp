<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_add extends Model
{
     protected $fillable =   ['employee_name','employee_mail','emp_job_role','emp_sallery','image','residential_proof','qualification_proof',
     						  'Certification_proof','primary_contect','secoundry_contect','dob','gender','street_address','city',
     						  'pincode','state','country','company_name','Experience','salary','salery_slip'];
}
