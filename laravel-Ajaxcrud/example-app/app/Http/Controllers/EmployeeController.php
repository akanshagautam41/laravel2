<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    function fetchAll()
    {
        $emp = Employee::all();

      $output = "";

        if($emp->count() > 0){
            $output .= "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <tbody>";

                foreach($emp as $res){
$output .= "<tr>
<td>$res->id</td>
<td>
<img src='storage/images/$res->avatar' class='img-fluid' height='50px' width='50px'/>
</td>
<td>$res->first_name $res->last_name</td>
<td>$res->email</td>
<td>
<a class='btn btn-success editIcon' data-bs-toggle='modal' data-bs-target='#editEmployeeModal' id='$res->id' href='#'>
<i class='fa fa-edit'></i>
</a>
</td>
</tr>";
                }

                $output .= "</tbody>
                </thead>
            </table>";
            echo $output;
        }
        else{
            echo "<h1 class='text-center text-secondary'>No Record.....!</h1>";
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
       $file = $request->file('avatar');
       $fileName = time() .'.'. $file->getClientOriginalExtension();
       $file->storeAs('public/images',$fileName);
       $empdata = ["first_name"=>$request->fname,"last_name"=>$request->lname,"email"=>$request->email,"avatar"=>$fileName];

       Employee::create($empdata);

       return response()->json(['status'=>200]);
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
    public function edit(Request $request)
    {
        $id = $request->id;
       $emp = Employee::find($id);
       return response()->json($emp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id = $request->emp_id;
       $emp = Employee::find($id);
       if($request->hasFile('avatar'))
       {
        $file = $request->file('avatar');
        $fileName = time() .'.'. $file->getClientOriginalExtension();
        $file->storeAs('public/images',$fileName);
       
        if($emp->avatar)
 {
Storage::delete('public/images/'.$emp->avatar);
 }
       }
       else
    {
        $fileName = $request->emp_avatar;
    }
    $empdata = ["first_name"=>$request->fname,"last_name"=>$request->lname,"email"=>$request->email,"avatar"=>$fileName];
    $emp->update($empdata);

    return response()->json(["status"=> 200]);
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
