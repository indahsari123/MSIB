<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Database\Factories\VouchersFactory;

class ShopController extends Controller
{
    public function checkout(Request $request)
    {
        $totalBelanja = $request->input('totalBelanja', 0);

        if ($totalBelanja >= 2000000) {
            $voucher = Voucher::create([
                'code' => $this->generateVoucherCode(),
                'expires_at' => now()->addMonths(3),
            ]);

            // Kembalikan view dengan data total belanja dan voucher
            return view('checkout', ['totalBelanja' => $totalBelanja, 'voucher' => $voucher]);
        } else {
            // Set the notification message if the total purchase amount is below the minimum
            $notification = 'Maaf, Anda tidak mencapai minimum belanja sebesar 2.000.000 rupiah.';
        }
        // Jika total belanja tidak mencapai syarat diskon
        return view('checkout', ['totalBelanja' => $totalBelanja]);
    }

    private function generateVoucherCode()
    {
        // Logika untuk menghasilkan kode voucher unik
        return 'VOUCHER_' . uniqid();
    }
}
