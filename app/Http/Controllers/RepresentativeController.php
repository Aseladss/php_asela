<?php

namespace App\Http\Controllers;

use App\Representative;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RepresentativeController extends Controller {

    public function index(Request $request) {
        $data = Representative::select('representatives.*', 'routes.name')->join('routes', 'routes.id', '=', 'representatives.route_id')->get();
        return view('pages.rep')->with('data', $data);
    }

    public function getRep(Request $request) {
        $data = Representative::select('representatives.*', 'routes.name')->join('routes', 'routes.id', '=', 'representatives.route_id')->where('representatives.id', '=', $request->id)->get();
        return view('includes.rep')->with('data', $data)->with('state', 'view');
    }

    public function editRep(Request $request) {
        $data = Representative::select('representatives.*', 'routes.name')->join('routes', 'routes.id', '=', 'representatives.route_id')->where('representatives.id', '=', $request->id)->get();
        $route = Route::all();
        return view('includes.rep')->with('data', $data)->with('state', 'edit')->with('route', $route);
    }

    public function getSave() {
        $data = Route::all();
        return view('includes.repmodal')->with('data', $data);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
                    'full_name' => 'required|max:100',
                    'email' => 'required|email|unique:representatives|max:100',
                    'telephone' => 'required|numeric|digits:10',
                    'joinned_date' => 'required|date|max:20',
                    'route_id' => 'required',
                    'comments' => 'required|max:300',
        ]);
        if ($validator->fails()) {
            $arr = array('msg' => 'Validation Errors', 'status' => FALSE, 'errors' => $validator->getMessageBag()->toArray());
            return json_encode($arr);
        } else {
            $data = Representative::create($request->all());
            if ($data) {
                $data = Representative::select('representatives.*', 'routes.name')->join('routes', 'routes.id', '=', 'representatives.route_id')->get();
                return view('includes.replist')->with('data', $data);
            }
        }
    }
    
    public function saveEdit(Request $request) {
        $validator = Validator::make($request->all(), [
                    'full_name' => 'required|max:100',
                    'email' => [Rule::unique('representatives')->ignore($request->id), 'required'],
                    'telephone' => 'required|numeric|digits:10',
                    'joinned_date' => 'required|date|max:20',
                    'route_id' => 'required',
                    'comments' => 'required|max:300',
        ]);
        if ($validator->fails()) {
            $arr = array('msg' => 'Validation Errors', 'status' => FALSE, 'errors' => $validator->getMessageBag()->toArray());
            return json_encode($arr);
        } else {
            $data = Representative::where('id', $request->id)->update(request()->except(['_token']));
            if ($data) {
                $data = Representative::select('representatives.*', 'routes.name')->join('routes', 'routes.id', '=', 'representatives.route_id')->get();
                return view('includes.replist')->with('data', $data);
            }
        }
    }
    
    public function deleteRep(Request $request) {
//        $data = Representative::find($request->id)->delete();
//        if ($data) {
//            $data = Representative::select('representatives.*', 'routes.name')->join('routes', 'routes.id', '=', 'representatives.route_id')->get();
//            return view('includes.replist')->with('data', $data);
//        }
    }

    public function InsertData() {
        Representative::create([
            'full_name' => 'Athar C Clarke',
            'email' => 'arthar@gmail.com',
            'telephone' => '0717777111',
            'joinned_date' => '2000-05-05',
            'route_id' => 2,
            'comments' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        ]);
        echo 'data inserted';
    }

}
