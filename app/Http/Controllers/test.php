<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class test extends Controller
{

	private $path;

	private $file;

	  public function result(Request $data){


    	$this->file = $data->file('file_upload');

    	 $this->filename =  $this->file->getClientOriginalName();


    	  echo $this->file->storeas("public",$this->filename); 


    	
    
	 
 
	}

}
