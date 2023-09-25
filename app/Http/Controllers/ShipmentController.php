<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{

    public function create_shipment (Request $request) {

        if (Auth::guard('api')->check()) {
            try {
                $data = $request->validate([
                    'product' => 'required|max:255',
                    'total_distance' => 'required',
                    'transport_id' => 'required'
                ]);
            } catch (\Throwable $th) {
                return response([
                    'error_message' => 'Validation failed!'
                ]);
            }
            $data['user_id'] = Auth::user()->id;
            $transport = Transport::find($data['transport_id']);
            $data['total_cost'] = $data['total_distance'] * $transport->cost_per_km;
    
            $shipment = Shipment::create($data);
    
            return response([
                'data' => $shipment
            ]);
        } else {
            return response([
                'message' => 'Unauthorized'
            ]);
        }

        
    }


    public function show_shipment($id = null) {
        if (Auth::guard('api')->check()) {
            if ($id !== null) {
                // This is the case when $id is provided
                $data = Shipment::find($id);
    
                if ($data) {
                    return response($data, 201);
                } else {
                    return response([
                        'message' => 'Shipment not found'
                    ]);
                }
            } else {
                // This is the case when $id is not provided
                $data = Shipment::get();
    
                if ($data->count() > 0) {
                    return response($data, 201);
                } else {
                    return response([
                        'message' => 'Shipment not found'
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
