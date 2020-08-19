<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.home')->with('employees', $employees);
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
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required'
        ]);

        $employee = new Employee([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname')
        ]);
        $employee->save();
        return redirect()->route('employees.index')->with('toast_success', 'Data Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeDetails = Employee::find($id);
        return view('employees.show')->with('employeeDetails', $employeeDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeDetails = Employee::find($id);
        return view('employees.edit', compact('employeeDetails', 'id'));
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
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required'
        ]);

        $employee = Employee::find($id);
        $employee->fname = $request->input('fname');
        $employee->lname = $request->input('lname');
        $employee->save();
        return redirect()->route('employees.index')->with('toast_success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeDetails = Employee::find($id);
        $employeeDetails->delete();
        return redirect()->route('employees.index')->with('toast_success', 'Employee Deleted');
    }
}
