<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company_registrations;
use App\Mail\companymailsend;

session_start();

class company extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    private $data;
    private $genrate_password;
    private $password;
    private $column_name;
    private $data_val;
    private $data_list;
    private $macaddress;




    public function index()
    {
        //
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

            $this->genrate_password = $this->data['password'];
                         
            $this->password  = array("password" => md5($this->genrate_password));   


 
            $this->data = array_replace($this->data, $this->password);

            Company_registrations::create($this->data);


            \Mail::to($this->data['company_email'])->send(new companymailsend(array(
                "erp_url" => $this->data['erp_url'],
            "erp_password" =>$this->genrate_password)));




            return redirect("/congrats");

            exit();

           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {

            $this->data_list =    base64_decode($id);

            $this->data_list =    json_decode($this->data_list); 

              $this->macaddress = new macaddress();

  $this->macaddress = $this->macaddress->__construct();

            if($this->data_list->column_name == "erp"){  

         $this->data =  Company_registrations::where("slug",$this->data_list->data)->get();

           


                if(count($this->data) != 0 ){

                        if($request->ajax()){
                             return response(array("notice" => "found"),200)->header('content-type','application/json');
                        }
                        else{
                            session()->flash('authentication',$this->data_list->data);

                                foreach ($this->data as  $this->alldata) {
                                    # code...
                                }

                            if(empty($this->alldata->macaddress)){
                                          session()->flash('mac_authentication','not register');
                            }else{

                                if($this->alldata->macaddress == $this->macaddress){
                                          session()->flash('mac_authentication','admin');
                                }else{
                                              session()->flash('mac_authentication','employee');
                                }

                            }





                            
                            return response()->view("erp.authenticate")->header('content-type','text/html')->setStatusCode(200);
                        }
                   
                }

                 else{
                    
                      return response()->view('404',array("notice" => "Not found"))->header('content-type','text/html')->setStatusCode(404);                   
                }

            }

                else{                    
             return response()->view('404',array("notice" => "Not found"))->header('content-type','text/html')->setStatusCode(404);
                }
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


           
 

            $this->data_list =    base64_decode($id);


             $this->data_list =    json_decode($this->data_list); 

      $this->macaddress = new macaddress();

  $this->macaddress = $this->macaddress->__construct();  

            if($this->data_list->column_name == "admin_register"){
  
  $this->data =  Company_registrations::where([              
                    ["slug",$this->data_list->slug],
                    ["establish",$this->data_list->company_estd],
                    ["password",md5($this->data_list->company_password)]  
                ])->update(
                    array("macaddress" =>  $this->macaddress,
                ));


                    $_SESSION =  array(

                        "authentication" => "true",
                        "team_role" => "admin",
                        "email" => "pwn2957@gmail.com"
                         );

                
 
               if($this->data){
 
                    return response(array('notice' =>"found"),200)->header('content-type','application/json');
               }else{ 
                    return response(array('notice' =>"not found" ),404)->header('content-type','application/json');
               }
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









 
class macaddress    
{

    private $info;

    private $data;
    
    function __construct()
    {

       exec("ipconfig/all",$this->info);




foreach ($this->info as $this->data) {


if(preg_match("/Physical Address/i", $this->data))

{


        $this->data  =  preg_replace("/\s+\./", "", $this->data);



        $this->data = explode(":", $this->data);


        return $this->data[1];


        break;   
    
}


}


}


}
   


 