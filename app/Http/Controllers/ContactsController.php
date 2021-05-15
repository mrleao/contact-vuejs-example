<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // filter request
        $search = $request->get('search');
        
        $query = Contact::where('id', '>', 0);

        // filter
        if($search){
           $query->whereRaw("unaccent(name) ilike '%".$search."%' ");
        }
        
        $contacts = $query->paginate(3);

        if($search){
            $contacts->appends(['search' => $search])->render();
        }

        return Inertia::render('ContacsList', ['contacts' => $contacts]);
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

        $file = $request->archive;

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('archive') && $request->file('archive')->isValid()) {
            
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->archive->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->archive->storeAs('public/archives', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/archives/nomedinamicoarquivo.extensao
            
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload)
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
    
        }

        $request->validate([
            'name'=> 'required|max:150',
            'email'=> 'required|email|max:255',
            'phone'=> 'celular_com_ddd',
            'message'=> 'required|max:500',
            'archive'=> 'mimes:txt, doc, docx, pdf, odt'
        ]);
        
        Contact::create(
           [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'ip' => $request->ip(),
            'archive' => $nameFile,
           ]
        );

        return Redirect::route('list.contacts');
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
    public function update(Request $request, $id)
    {
        //
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
