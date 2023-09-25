<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportController extends Controller
{
    public function create_transport (Request $request) {

        try {
            $data = $request->validate([
                'name' => 'required|max:255',
                'type' => 'required|max:255',
                'cost_per_km' => 'required'
            ]);
        } catch (\Throwable $th) {
            return response([
                'error_message' => 'Validation failed!'
            ]);
        }
        

        $transport = Transport::create($data);

        return response([
            'data' => $transport
        ]);
    }

    public function show_transport($id = null) {
        if (Auth::guard('api')->check()) {
            if ($id !== null) {
                // This is the case when $id is provided
                $data = Transport::find($id);
    
                if ($data) {
                    return response($data, 201);
                } else {
                    return response([
                        'message' => 'Transport not found'
                    ]);
                }
            } else {
                // This is the case when $id is not provided
                $data = Transport::get();
    
                if ($data->count() > 0) {
                    return response($data, 201);
                } else {
                    return response([
                        'message' => 'Transport not found'
                    ]);
                }
            }
        } else {
            return response([
                'message' => 'Unauthorized'
            ]);
        }        
    }
    
}
