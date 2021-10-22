<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    public function index(){

        $ventas_by_user = DB::table('ventas as v')
            ->select('v.id','p.nombre AS nombre_producto', 'p.precio', 'v.cantidad')
            ->join('productos AS p','v.producto_id','=','p.id')
            ->where('v.usuario_id','=',auth()->user()->id)
            ->get();
        dd($ventas_by_user);

        return view('carro_compras.listado_compra',[
            'ventas_by_user' => $ventas_by_user,
        ]);
    }

    public function create(){
        $productos = Productos::get();

        return view('carro_compras.comprar',[
            'productos' => $productos,
        ]);
    }

    public function store(Request $request){
                //Para hacer validaciones, esto resive un array de datos del front-end osea de los campos nombre, precio
                $request->validate(
                    [
                        'producto_id'=>'required',
                        'cantidad'=>'required|numeric'
                    ],
                    [
                        'producto_id.required' => 'El producto es requerido',
                        'cantidad.required' => 'La cantidad a comprar es requerida',
                        'cantidad.numeric' => 'La cantidad debe ser numerico' 
                    ]
                    );
        
                $venta= new Ventas;
                $venta->producto_id = $request->producto_id;
                $venta->cantidad = $request->cantidad;
                $venta->usuario_id = auth()->user()->id;
                $venta->estatus_id=0;
                $venta->save();
        
                return back()->with('message','El producto fue almacenado con exito');;
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
