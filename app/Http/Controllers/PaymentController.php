<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Transaction;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function show(Booking $booking)
    {
        // make sure booking belongs to user or user is admin
        if (auth()->id() && $booking->user_id && auth()->id() != $booking->user_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        $banks = ['BCA','BNI','BRI','Mandiri'];
        return view('booking.payment', compact('booking','banks'));
    }

    public function invoice(Booking $booking)
    {
        if (auth()->id() && $booking->user_id && auth()->id() != $booking->user_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        
        // Generate PDF using DomPDF
        if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('booking.invoice-pdf', compact('booking'))
                ->setPaper('a4', 'portrait');
            return $pdf->download('invoice_' . $booking->booking_code . '.pdf');
        }
        
        // Fallback: generate simple text/HTML downloadable file
        $html = view('booking.invoice-pdf', compact('booking'))->render();
        return response($html)
            ->header('Content-Type','application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="invoice_' . $booking->booking_code . '.txt"');
    }

    public function invoiceView(Booking $booking)
    {
        if (auth()->id() && $booking->user_id && auth()->id() != $booking->user_id && auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('booking.invoice', compact('booking'));
    }

    public function pay(Request $request, Booking $booking)
    {
        // Process payment with bank and account info
        $data = $request->validate([
            'bank' => 'required|string',
            'account_number' => ['required','regex:/^[0-9]+$/']
        ]);

        // sanitize account number
        $data['account_number'] = preg_replace('/\D/', '', $data['account_number']);

        /** @var Transaction|null $transaction */
        $transaction = Transaction::where('booking_id', $booking->id)->first();
        $meta = ['bank' => $data['bank'], 'account_number' => $data['account_number']];

        if (!$transaction) {
            $transaction = Transaction::create([
                'booking_id' => $booking->id,
                'amount' => $booking->total_price,
                'payment_method' => $data['bank'],
                'transaction_code' => Str::upper(Str::random(10)),
                'status' => 'completed',
                'payment_date' => Carbon::now(),
                'meta' => $meta,
            ]);
        } else {
            $transaction->update([
                'payment_method' => $data['bank'],
                'transaction_code' => Str::upper(Str::random(10)),
                'status' => 'completed',
                'payment_date' => Carbon::now(),
                'meta' => $meta,
            ]);
        }

        $old = $booking->getOriginal();
        $booking->update(['status' => 'booked']);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'model_type' => 'Booking',
            'model_id' => $booking->id,
            'old_values' => json_encode(['status' => $old['status'] ?? null]),
            'new_values' => json_encode(['status' => 'booked']),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('booking.success', $booking)->with('success', 'Pembayaran berhasil.');
    }
}
