<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;
use App\Models\Account;

class SetDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     private $modelPath;
     private $modelRepo;

    public function __construct(Request $request)
    {
        if(isset($request->module_name)){
            $this->modelPath = 'App\\Interfaces\\'.$request->module_name.'RepositoryInterface';
            $this->modelRepo = App::make($this->modelPath);
        }
    }

    public function index(Request $request){
        $input = $request->input_request;
        $data = $this->modelRepo->all();
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->input_request;
        $data = $this->modelRepo->create($input);
        return json_encode($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $input = $request->input_request;
        $show_data = $this->modelRepo;
        $val= $show_data->find($input['id']);
        return json_encode($val);
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
    public function update2(Request $request)
    {
        $input = $request->input_request;
        $req_id = $request->id;
        $update_data = $this->modelRepo->update2($req_id,$input);

        // after updating show data
        $show_data = $this->modelRepo;
        $val= $show_data->find($req_id);
        return json_encode($val);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $input = $request->input_request;
        $delete_data = $this->modelRepo;
        $delete_data->delete($input['id']);   
    }
}
