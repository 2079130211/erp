<?php
namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Employee_add;

class employee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $data;

    private $response;

    private $all_file;

    private $slaery_file;

    private $index = 0;

    private $id;

    private $alldata = array(
                "profile_picture" => "",
                "residential_proof" => "",
                "qualification_proof" => "",
                "Certification_proof" => "",
                "selary_slip" => [],
);


    public function index(Request $request )
    {

 
       

        $this->data = $request;        

        $this->limit = $request['limit'];

        $this->data =     Employee_add::paginate($this->limit);


        if(count($this->data)){
            return response(array('notice' => 'found','data'=>$this->data),200)->header('content-type', 'application/json');
        }else{
            return response(array('notice' => 'not found'),200)->header('content-type', 'application/json');
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

        $this->all_file = $request->file();

        $this->id = Employee_add::orderby("id","desc")->limit(1)->get();

            if(count($this->id) != 0){
                foreach ($this->id  as   $this->id) {
                  $this->id =  $this->id->id+1;
                }

            }
            else{
                $this->id = 1;
            }

            $this->folder = 'employees/'.$this->id.'.'.$request['employee_name'];

         if($request->hasFile("salery_slip")){
            foreach ($request->file("salery_slip") as  $this->file)
            {           
                $this->image_name = strtolower($this->file->getClientoriginalName());

                $this->tmp = $this->file->getpathName(); 

                $this->path = $this->file->storeAs($this->folder, $this->image_name, "s3"); 

                $this->alldata['selary_slip'][$this->index] = $this->path;

                $this->index++;
            
            }

           
            $this->data['salery_slip'] = json_encode($this->alldata['selary_slip']);


                       
            unset($this->all_file['salery_slip']);
        }
        

            foreach ($this->all_file as $this->key => $this->file){ 
                $this->image_name = strtolower($this->all_file[$this->key]->getClientoriginalName());

                $this->tmp = $this->all_file[$this->key]->getpathName();

                $this->path = $this->file->storeAs($this->folder, $this->image_name, "s3");

                $this->alldata[$this->key] = json_encode($this->path);
            }

           
        


            $this->data['profile_picture'] = $this->alldata['profile_picture'];
            
            $this->data['residential_proof'] = $this->alldata['residential_proof'];
            
            $this->data['qualification_proof'] = $this->alldata['qualification_proof'];
            
            $this->data['Certification_proof'] = $this->alldata['Certification_proof']; 

 
            $this->response_value = Employee_add::Create($this->data);

            if ($this->response_value)
            {
                return response(array(
                    'notice' => "Data Insert",
                    'data' => $this->response_value
                ) , 200)->header('content-type', 'application/json');

            }
            else
            {

                return response(array(
                    "notice" => "Data Not Insert"
                ) , 404)->header('content-type', 'application/json');
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

