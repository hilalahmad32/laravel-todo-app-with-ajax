<?php

namespace App\Http\Controllers;

use App\Models\Todo as ModelsTodo;
use Illuminate\Http\Request;

class Todo extends Controller
{
    public function index()
    {
        $update = true;
        return view("todo-app.index", ["update" => $update]);
    }

    public function add(Request $request)
    {
        $todo = new ModelsTodo();

        $is_todo = $todo->where("name", $request->name)->first();
        if ($is_todo) {
            echo 2;
        } else {
            $todo->name = $request->name;
            $result = $todo->save();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
    public function get()
    {
        $output = "";
        $todos = ModelsTodo::orderBy("id", "DESC")->get();
        if (count($todos) > 0) {
                
                $output .="<div class='container'>";
            foreach ($todos as $todo) {
                $output .= "
                                <div id='edit'   class='d-flex justify-content-between my-3 align-items-baseline '>
                                    <h5>{$todo->name}</h5>
                                    <button data-id='{$todo->id}' id='delete' class='btn btn-danger'>X</button>
                                </div>
                                <hr>";
            }
            $output .="</div>";
            echo $output;
        }else{
            echo "<h3 class='text-center'>Todo not found</h3>";
        }
    }

    public function delete(Request $request)
    {
        $id=$request->id;
        $todo=ModelsTodo::find($id);
        $result=$todo->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}
