<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Productos;


class ProductosController extends Controller
{
    public function index(){
        
        $productos = Productos::get();

        return view('productos.index', [
            'productos'=> $productos,
    ]);
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        //Para hacer validaciones, esto resive un array de datos del front-end osea de los campos nombre, precio
        $request->validate(
            [
                'nombre'=>'required',
                'precio'=>'required|numeric'
            ],
            [
                'nombre.required' => 'El nombre del producto es requerido',
                'precio.required' => 'El precio del producto es requerido',
                'precio.numeric' => 'El precio del producto debe ser numerico' 
            ]
            );

        $producto= new Productos;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->save();

        return back()->with('message','El producto fue almacenado con exito');

    }

    public function edit($id){

        $producto=Productos::where('id', $id)->first();
        
        return view('productos.edit',[
            'producto' => $producto,
        ]);
    }

    public function update(Request $request,$id){

        $request->validate(
            [
                'nombre'=>'required',
                'precio'=>'required|numeric'
            ],
            [
                'nombre.required' => 'El nombre del producto es requerido',
                'precio.required' => 'El precio del producto es requerido',
                'precio.numeric' => 'El precio del producto debe ser numerico' 
            ]
            );

            $producto=Productos::where('id', $id)->first();
            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->save();

            return back()->with('message','El producto fue actualizado con exito');
    }

        public function delete($id){

            Productos::where('id',$id)->delete();
            
            return back();
    }

}
