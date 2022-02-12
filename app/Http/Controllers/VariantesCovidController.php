<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Variante; 

class VariantesCovidController extends Controller
{
    public function index() {
        $variantes = Variante:: all();
        $argumentos = array();
        $argumentos ['variantes'] = $variantes;

        return view('variantes.index', $argumentos);
    }

    public function create(){
        return view('variantes.create');
    }
    public function store(Request $request){
        $nuevaVariante = new Variante();
        $nuevaVariante->lineage = $request->input('lineage');
        $nuevaVariante->common_countries = $request->input('common_countries');
        $nuevaVariante->earliest_date = $request->input('earliest_date');
        $nuevaVariante->designated_number = $request->input('designated_number');
        $nuevaVariante->assigned_number = $request->input('assigned_number');
        $nuevaVariante->description = $request->input('description');
        $nuevaVariante->who_name = $request->input('who_name');

        if ($nuevaVariante->save()){
            return redirect()->route('variantes.index')->with('sucess', 'Variant was added succesfully');
        }

        //despues de guardar que mande a la lista de variantes
        
        return redirect()->route('variantes.index')->with('error', 'could not add new variant');

    }

    public function edit($id){
        $variante = Variante::find($id);
        $argumentos = array();
        $argumentos ['variante'] = $variante;
        //find regresa un registro de la tabla ascociada al modelo, si lo encuentra
        //si no lo encuentra regresa nulo
        if ($variante != NULL){
            //lleva al formulario de edicion
            return view ('variantes.edit', $argumentos);
        }
        return redirect()->route ('variantes.index')->with('error', 'could not find variant');

        //sino lleva a la lista
    }

    public function update(Request $request,$id) {

        $variante = Variante::find($id);
        if($variante){
            $variante->lineage = $request->input('lineage');
            $variante->common_countries = $request->input('common_countries');
            $variante->earliest_date = $request->input('earliest_date');
            $variante->designated_number = $request->input('designated_number');
            $variante->assigned_number = $request->input('assigned_number');
            $variante->description = $request->input('description');
            $variante->who_name = $request->input('who_name');

            if ($variante->save()){

                return redirect()->route('variantes.edit', $id )->with('sucess', 'Variant was added succesfully');; 

            }
        }
        return redirect()->route('variantes.index')->with('error', 'could not find variant');

    }

    public function destroy ($id){
        $variante = Variante::find($id);
        if($variante)
        {
            if ($variante->delete()){
                //si la encuentra
                return redirect()->route('variantes.index', $id )->with('sucess', 'Variant was deleted succesfully');; 
    
            }
    
            return redirect()->route('variantes.index')->with('error', 'could not find variant');
        }
        return redirect()->route('variantes.index')->with('error', 'could not find variant');
        
    }
    
}
