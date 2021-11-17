<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JobRole;

class addjobrole extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      

    private $response_value;
    
    private $data;

    private $error;

    private $alldata = [];

    private $data_type;

    private $limit;

    public function index(Request $request){
           $this->data_type = $request['data_type'];

           $this->limit = $request['limit'];

        if($this->data_type == 'paginate'){
            $this->response_value = JobRole :: paginate($this->limit);    
        }

        if($this->data_type == 'part_of_team'){
            $this->response_value = JobRole :: get('team_name');    
        } 


        if($this->data_type == 'get_job_role_and_sellary'){
            $this->response_value = JobRole :: get(['job_role','sallery']);    
        } 
        


        if($this->data_type != ''){
            if(count($this->response_value) != 0) {
                  return response(array('notice' =>"Data found",'data'=>$this->response_value),200)->header('content-type','application/json');
            }

            else{
                return response(array("notice" =>"Data Not found"),404)->header('content-type','application/json');   
            }

        }
            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
 

        $this->data = $request->all(); 
        
             $this->response_value = JobRole::Create($this->data); 
      
 
  
                    if($this->response_value)
                    {
                      return   response(array('notice' =>"Data Insert",'data'=>$this->response_value),200)->header('content-type','application/json');

                        
                    }
                    else{      

                       return  response(array("notice" =>"Data Not Insert"),404)->header('content-type','application/json');            
                    }
    

      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    


       $this->response_value =    JobRole::where("id",$id)->update(array(
            "job_role" => $request["job_role"],
            "sallery" => $request["sallery"],
            "experience" => $request["experience"],
            "certification" => $request["certification"],
            "qualification" => $request["qualification"],
            "part_of_team" => $request["part_of_team"]
             ));



                if($this->response_value)
                    {

                       
                      return response(array('notice' =>"Data Update"),200)->header('content-type','application/json');

                        
                    }
                    else{      

                       return  response(array("notice" =>"Data Not Update"),404)->header('content-type','application/json');            
                    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
