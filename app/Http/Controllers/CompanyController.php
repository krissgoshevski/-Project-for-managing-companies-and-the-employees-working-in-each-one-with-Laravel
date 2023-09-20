<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Country;
use App\Models\Company;
use App\Traits\CompanyControllerMethods; // traits for checkIfLoggedIn method to include in all controllers 



class CompanyController extends Controller 
{
    use CompanyControllerMethods; // must include this for traits 


    public function index()
    {
        $this->checkIfLoggedIn(); 

       $companies = Company::join('countries', 'companies.country_id', '=', 'countries.id')
                            ->select('companies.*', 'countries.name as countryname')
                            ->get();

       return view('company.index', compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     * create method generaln osekogas vraka nekoe view 
     * // za da gi zememe site drzavi i da gi izlistame vo select area za kreiranje na nova kompanija
     */
    public function create()
    {
        $this->checkIfLoggedIn(); 

        $countries = Country::all(); 

        return view('company.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $this->checkIfLoggedIn(); 

      // da gi insertira site osven tokenot 
      // way 1 for inserting records in db
        Company::insert($request->except('_token'));

        // way 2 for inserting records in db
        // $company = new Company;
        // $company->name = $request->name;
        // $company->email = $request->email;
        // $company->logo = $request->logo;
        // $company->website = $request->website;
        // $company->country_id = $request->country_id;
        // $company->save();

        return redirect()->route('company.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);

        if (!$company) {
            // Доколку не се најде компанијата со дадениот ID, може да вратите порака или редирекција
            return redirect()->route('company.index')->with('error', 'The company does not exist!');
        }

            return view('company.show', compact('company'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->checkIfLoggedIn(); 
        // way 1
        $company = Company::find($id);

        $countries = Country::all(); // to get all countries 

        return view('company.edit', compact('company', 'countries'));

        // // way 2 
        // $company = new Company;
        // $company->find($id);

       // return redirect()->route('company.edit');
    }

    /**
    * Update the specified resource in storage.
    *   //  way 1  // $company = new Company;

    *      $company->name = $request->name;
    *      $company->email = $request->email;
    *      $company->logo = $request->logo;
    *      $company->website = $request->website;
    *     $company->country_id = $request->country_id;
    *     $company->update();
    */
    public function update(CompanyRequest $request, string $id)
    {
        $this->checkIfLoggedIn(); 
      
        // way 2 
        // $company = Company::find($id);

        // $company->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'logo' => $request->logo,
        //     'website' => $request->website,
        //     'country_id' => $request->country_id,
        // ]);

        // way 3
        $company = Company::find($id);
        $company->update($request->only(['name', 'email', 'logo', 'website', 'country_id']));

        return redirect()->route('company.index'); 
        // koga ke otide ovde pogore vo metodata index ke si gi zeme pak podatocite odnosno querito 
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkIfLoggedIn(); // to do not allow for any operations as delete,edit,create ... 

           Company::destroy($id);

        return redirect()->route('company.index');
    }


    // check for the role of logged User, 
    // if he is not admin, he will be redirected to the login form 
    // public function checkIfLoggedIn()
    // {
    //     if (!session()->has('isAdmin')) 
    //     {
    //         return redirect()->route('login.form')->send(); 
    //         // send() e za da ja povikame metodata sekade i da ne prodolzi nadolu so kodot da se izvrsuva 
    //     }
    // }

}




