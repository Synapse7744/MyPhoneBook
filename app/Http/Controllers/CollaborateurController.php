<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Collaborateur;
use Illuminate\Support\Facades\DB;

class CollaborateurController extends Controller
{
    public function index($id)
    {
        if (!$id || $id < 1)
            $id = 1;
        $collaborateur = DB::table('collaborator')->get();
        return view('collaborateur.index', ['collaborator' => $collaborateur, 'index' => $id]);
    }

    public function create()
    {
        if (Gate::allows('getRole'))
            return view('collaborateur.create');
        else
            return abort(403, 'action unauthorized');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'=>'required|unique:collaborator,nom',
            'prenom'=>'required',
            'rue'=>'required',
            'cPostal'=>'required|digits:5',
            'ville'=>'required',
            'numero'=>'max:12|regex:/(\+33)[0-9]{9}/',
            'email'=>'required|email:rfc,dns',
            'companyId'=>'required'
        ]);
        $collaborator = new Collaborateur;
        $collaborator->nom = $request->input('nom');
        $collaborator->prenom = $request->input('prenom');
        $collaborator->rue = $request->input('rue');
        $collaborator->cPostal = $request->input('cPostal');
        $collaborator->ville = $request->input('ville');
        $collaborator->tel = $request->input('numero');
        $collaborator->email =  $request->input('email');
        $collaborator->companyId = $request->input('companyId');
        $collaborator->save();
        return view('collaborateur.store');
    }

    public function show($id)
    {
        $collaborateur = (array)DB::table('collaborator')->where('id', $id)->first();
        return view('collaborateur.display', $collaborateur);
    }

    public function seek(Request $request)
    {   
        $validated = $request->validate([
            'email'=>'email:rfc,dns',
        ]);
        $collabName = $request->input('findNom');
        $collabPrenom = $request->input('findPrenom');
        $collabPhone = $request->input('findPhone');
        $collabEmail = $request->input('findEmail');
        $collabComp = $request->input('findCompany');
        $collabCompID = $request->input('findCompanyID');
        $comp = DB::table('company')->where('nom', $collabComp)->pluck('id')->first();
        $collab = DB::table('collaborator')->where('nom', $collabName)
                        ->orwhere('prenom', $collabPrenom)->orwhere('tel', $collabPhone)
                        ->orwhere('email', $collabEmail)->orwhere('companyId', $collabCompID)
                        ->orwhere('companyId', $comp)->get();
            if ($collab)
        return view('collaborateur.display', ['collaborator' => $collab]);
            else
        return redirect('collaborateur/index/1');
    }

    public function updatechoice(Request $request)
    {
        if (Gate::allows('getRole'))
        {  
            $collaborateur = (array)DB::table('collaborator')->where('id', $request->id)->first();
            return view('collaborateur.edit', $collaborateur);
        }
        else
            return abort(403, 'action unauthorized');
    }
    public function update($id)
    {
        if (Gate::allows('getRole'))
        {
            $collaborateur = (array)DB::table('collaborator')->where('id', $id)->first();
            return view('collaborateur.edit', $collaborateur);
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
            'prenom'=>'required',
            'rue'=>'required',
            'cPostal'=>'required|digits:5',
            'ville'=>'required',
            'numero'=>'max:12|regex:/(\+33)[0-9]{9}/',
            'email'=>'required|email:rfc,dns',
            'companyId'=>'required',
        ]);
        DB::table('collaborator')->where('id', $id)
            ->update(['nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'rue' => $request->input('rue'),
            'cPostal' => $request->input('cPostal'),
            'ville' => $request->input('ville'),
            'tel' => $request->input('numero'),
            'email' => $request->input('email'),
            'companyId' => $request->input('companyId')]);
        return view('collaborateur.store');
    }
    else
        return abort(403, 'action unauthorized');
    }

    public function deletechoice(Request $request)
    {
        if (!Gate::allows('getRole') == 2)
            return abort(403, 'action unauthorized');
        else
            DB::table('collaborator')->where('id', $request->id)->delete();
        return view('collaborateur.store');
    }
    public function destroy($id)
    {
        if (!Gate::allows('getRole') == 2)
            return abort(403, 'action unauthorized');
        else
            DB::table('collaborator')->where('id', $id)->delete();
        return view('collaborateur.store');
    }
}
