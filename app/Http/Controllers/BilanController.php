<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class BilanController extends Controller
{
    public function create_bilan(Request $request)
    {

        $request->validate([
            'total_immobilisation' => 'required',
            'details_immobilisation' => 'required',
            'total_actif_a_court_terme' => 'required',
            'details_total_actif_a_court_terme' => 'required',
            'total_du_capital' => 'required',
            'details_du_capital' => 'required',
            'total_du_passif_court_terme' => 'required',
            'details_du_passif_court_terme' => 'required'
        ]);
        $user = Auth::user();
       
            $bilan = Bilan::create([
            'user_id' => $user->id,
            'total_immobilisation' => $request->total_immobilisation,
            'details_immobilisation' => $request->details_immobilisation,
            'total_actif_a_court_terme' => $request->total_actif_a_court_terme,
            'details_total_actif_a_court_terme' => $request->details_total_actif_a_court_terme,
            'total_du_capital' => $request->total_du_capital,
            'details_du_capital' => $request->details_du_capital,
            'total_du_passif_court_terme' => $request->total_du_passif_court_terme,
            'details_du_passif_court_terme' => $request->details_du_passif_court_terme
        ]);
          // Update the user's role to "admin"
          $user = Auth::user();
          // Assuming $user is the authenticated user
          $user = User::find($user->id);
          $user->update(['role' => 'admin']);
          
          return response('Bilan created successfully');
       
    }
}
