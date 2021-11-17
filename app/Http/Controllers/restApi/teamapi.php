<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use \Illuminate\Database\QueryException;
use App\Team;

class teamapi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $response;
    
    private $data;

    private $error;

    private $alldata = [];

    private $data_type;

    private $limit;

    public function index(Request $request)
    {
 


    $this->data_type = $request['data_type'];

       $this->limit = $request['limit'];

        if($this->data_type == 'paginate'){
            $this->response = Team :: paginate($this->limit);    
        }

        if($this->data_type == 'part_of_team'){
            $this->response = Team :: get('team_name');    
        } 

            if(count($this->response) != 0) {         

                  return   response(array('notice' =>"Data found",'data'=>$this->response),200)->header('content-type','application/json');
            }

            else{
                return  response(array("notice" =>"Data Not found"),404)->header('content-type','application/json');   
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      

      


        $this->data = $request->all();   


      
            $this->response = Team::Create($this->data); 

                         if($this->response)
                    {
                      return   response(array('notice' =>"Data found",'data'=>$this->data),200)->header('content-type','application/json');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
