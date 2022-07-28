<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewsController extends Controller
{
    //
    public function proses(request $request,$id){
        Review::create([
            'transaksi_id' => $id,
            'rating' => $request->rating,
            'review'=> $request->review
        ]);
        Alert::success('Transaksi', 'Terima Kasih Telah Melakukan Review');
        return redirect('transaksi/');
    }
}
