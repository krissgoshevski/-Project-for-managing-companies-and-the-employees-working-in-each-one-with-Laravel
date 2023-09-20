<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CompanyController;
use App\Models\Company;
use App\Models\Country;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Traits\CompanyControllerMethods; // traits for checkIfLoggedIn method to include in all controllers 

class EmployeeController extends Controller
{
    
    use CompanyControllerMethods; // must include this for traits 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkIfLoggedIn(); // method from trairs 

        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkIfLoggedIn();

        $companies = Company::all();

        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $this->checkIfLoggedIn();

        $employee = new Employee;
        $employee->insert($request->validated());

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function edit(string $id)
    {
        $this->checkIfLoggedIn();

        $employee = Employee::find($id);
        $companies = Company::all();

        return view('employee.edit', compact('employee', 'companies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $this->checkIfLoggedIn();

        $employee = Employee::find($id);

        $employee->update([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('employee.index'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkIfLoggedIn();

        Employee::destroy($id);
        return redirect()->route('employee.index');
    }
}
