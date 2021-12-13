<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index($id)
    {
        if (!$id || $id < 1)
            $id = 1;
        $company = DB::table('company')->get();
        return view('company.index', ['company' => $company, 'index' => $id]);
    }

    public function create()
    {
        if (Gate::allows('getRole'))
            return view('company.create');
        else
            return abort(403, 'action unauthorized');
    }

    public function store(Request $request)
    {
        if (Gate::allows('getRole'))
        {
        $validated = $request->validate([

            'nom'=>'required|unique:company,nom',
            'rue'=>'required',
            'cPostal'=>'required|digits:5',
            'ville'=>'required',
            'numero'=>'max:12|regex:/(\+33)[0-9]{9}/',
            'email'=>'required|email:rfc,dns',
        ]);

        $company = new Company;
        $company->nom = $request->input('nom');
        $company->rue = $request->input('rue');
        $company->cPostal = $request->input('cPostal');
        $company->ville = $request->input('ville');
        $company->tel = $request->input('numero');
        $company->email = $request->input('email');
        $company->save();
        return view('company.store');
        }
        else
            return abort(403, 'action unauthorized');
    }

    public function show($id)
    {
        $company = (array)DB::table('company')->where('id', $id)->first();
        return view('company.display', $company);
    }
    
    public function seek(Request $request)
    {   
        $validated = $request->validate([
            'email'=>'email:rfc,dns',
        ]);
        $companyName = $request->input('findNom');
        $companyEmail = $request->input('findEmail');
        $companyAdress = $request->input('findAdresse');
        $company = DB::table('company')->where('nom', $companyName)->orwhere('ville', $companyAdress)->orwhere('email', $companyEmail)->get();
            if ($company)
        return view('company.display', ['company' => $company]);
            else
        return redirect('entreprise/index/1');
    }

    public function updatechoice(Request $request)
    {        
        if (Gate::allows('getRole'))
        {
        $company = (array)DB::table('company')->where('id', $request->id)->first();
        return view('company.edit', $company);
        }
        else
        return abort(403, 'action unauthorized');
    }
    public function update($id)
    {
        if (Gate::allows('getRole'))
        {
            $company = (array)DB::table('company')->where('id', $id)->first();
            return view('company.edit', $company);
        }
        else
            return abort(403, 'action unauthorized');
    }

    public function edit(Request $request, $id)
    {
        if (Gate::allows('getRole'))
        {
        $validated = $request->validate([
            'nom'=>'required',
            'rue'=>'required',
            'cPostal'=>'required|digits:5',
            'ville'=>'required',
            'numero'=>'max:12|regex:/(\+33)[0-9]{9}/',
            'email'=>'required|email:rfc,dns',
        ]);
        DB::table('company')->where('id', $id)
            ->update(['nom' => $request->input('nom'),
            'rue' => $request->input('rue'),
            'cPostal' => $request->input('cPostal'),
            'ville' => $request->input('ville'),
            'tel' => $request->input('numero'),
            'email' => $request->input('email')]);
        return view('company.store');
    }
    else
        return abort(403, 'action unauthorized');
    }

    public function deletechoice(Request $request)
    {
        if (!Gate::allows('getRole') == 2)
            return abort(403, 'action unauthorized');
        else
            DB::table('company')->where('id', $request->id)->delete();
        return view('company.store');
    }
    public function destroy($id)
    {
        if (!Gate::allows('getRole') == 2)
            return abort(403, 'action unauthorized');
        else
            DB::table('company')->where('id', $id)->delete();
        return view('company.store');
    }
}
