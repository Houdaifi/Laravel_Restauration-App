<?php

namespace App\Http\Controllers;

use App\Models\Commands;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commands = Commands::with('command_products', 'statut:id,name');

        if(Auth()->user()->role == 'user'){
            $commands = $commands->where('user_id', Auth()->user()->id);
        }

        return view('commands', ['commands' => $commands->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if(empty($request->OrdersIds)){
            return response()->json(['message' => '403 Forbidden'], Response::HTTP_FORBIDDEN);
        }

        $products = [];

        $ids = explode(",", $request->OrdersIds);

        foreach ($ids as $product_id) {
            $products[] = Products::find($product_id); 
        }

        return view('cart', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        $created_command = Commands::create([
            'user_id' => Auth()->user()->id,
            'statut_id' => 1,
        ]);

        try {
            for ($i=0; $i < count($request->products_ids); $i++) {
                DB::table('commands_products')->insert([
                    'command_id' => $created_command->id,
                    'product_id' => $request->products_ids[$i],
                    'quantity' => $request->quantity[$i]
                ]);
            }
            DB::commit();

            return redirect()->route('commands');
        
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
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
