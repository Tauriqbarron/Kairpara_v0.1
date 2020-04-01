<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\Validator;
class StaffController extends Controller
{
    public function getIndex() {
        $staffs = Staff::all();
        return view('Administration.staff.staff_management', ['staffs' => $staffs]);
    }

    public function getCreate() {
        return view('Administration.staff.staff_create');

    }

    public function postCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'fName'=>'required|max:50',
            'lName'=>'required|max:50',
            'email'=>'required|email',
            'pNumber'=>'required|max:10',
            'password' => 'required|confirmed|min:6'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $staff = new Staff([
            'first_name' => $request->input('fName'),
            'last_name' => $request->input('lName'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('pNumber'),
            'password' => $request->input('password'),
        ]);
        $staff->save();
        return redirect()->route('staff.index');
    }

    public function  getEdit($id) {
        $staff = Staff::find($id);
        return view('Administration.staff.staff_edit', ['staff' => $staff]);

    }

    public function postEdit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'fName'=>'required|max:50',
            'lName'=>'required|max:50',
            'email'=>'required|email',
            'pNumber'=>'required|max:10',
        ]);
        if($validator->fails()) {
            return redirect()->route('staff.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }
        $staff = Staff::find($id);
        $staff->first_name = $request->input('fName');
        $staff->last_name = $request->input('lName');
        $staff->email = $request->input('email');
        $staff->phone_number = $request->input('pNumber');
        $staff->save();
        return redirect()->route('staff.index');
    }
}
