<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CustomerModel;
use App\Models\FacilitatorModel;

use App\Http\Controllers\FacilitatorController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminController extends Controller

{   public function createFacilitator(Request $request)

    {
        // Manual validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:facilitators',
            'contact_num' => 'required|string|max:20',
            'password' => 'required|string|min:8',
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // If validation passes, continue with creating the facilitator
        $validatedData = $validator->validated();
        $facilitator = FacilitatorModel::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact_num' => $validatedData['contact_num'],
            'password' => bcrypt($validatedData['password']),
        ]);
        // Return JSON response
        return response()->json([
            'message' => 'Facilitator created successfully.',
            'facilitator' => $facilitator,
        ], 201);
    }

        public function deletefacilitator(Request $request)
    {
        // Find the facilitator by ID
        $facilitator = FacilitatorModel::find($request->id);
        // Check if facilitator exists
        if (!$facilitator) {
            return response()->json([
                'message' => 'Facilitator not found.'
            ], 404);
        }
        // Delete the facilitator
        $facilitator->delete();
        // Return JSON response
        return response()->json([
            'message' => 'Facilitator deleted successfully.'
        ], 200);
    }
}