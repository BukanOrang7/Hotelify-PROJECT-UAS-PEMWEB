<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $booking->booking_code }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Arial', sans-serif; color: #333; line-height: 1.6; }
        .container { width: 210mm; height: 297mm; padding: 20mm; background: white; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #2563eb; padding-bottom: 20px; }
        .logo { font-size: 24px; font-weight: bold; color: #2563eb; }
        .invoice-title { text-align: right; }
        .invoice-title h1 { font-size: 28px; color: #2563eb; margin-bottom: 5px; }
        .invoice-title p { color: #666; font-size: 12px; }
        .details { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px; }
        .detail-box h3 { font-size: 13px; color: #999; text-transform: uppercase; margin-bottom: 8px; }
        .detail-box p { font-size: 14px; margin-bottom: 5px; }
        .detail-box strong { color: #333; }
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .items-table th { background: #f3f4f6; padding: 12px; text-align: left; font-size: 12px; color: #666; font-weight: bold; border-bottom: 2px solid #e5e7eb; }
        .items-table td { padding: 12px; border-bottom: 1px solid #e5e7eb; }
        .items-table tr:last-child td { border-bottom: 2px solid #2563eb; }
        .summary { display: flex; justify-content: flex-end; margin-bottom: 30px; }
        .summary-box { width: 250px; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px; }
        .summary-row.total { font-size: 16px; font-weight: bold; color: #2563eb; margin-top: 10px; padding-top: 10px; border-top: 1px solid #e5e7eb; }
        .footer { text-align: center; color: #999; font-size: 11px; margin-top: 50px; padding-top: 20px; border-top: 1px solid #e5e7eb; }
        .thank-you { text-align: center; font-size: 14px; color: #666; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">Hotelify</div>
            <div class="invoice-title">
                <h1>INVOICE</h1>
                <p>{{ now()->format('d M Y') }}</p>
            </div>
        </div>

        <!-- Booking Details -->
        <div class="details">
            <div class="detail-box">
                <h3>Kode Pemesanan</h3>
                <p style="font-size: 16px; font-weight: bold; font-family: 'Courier New', monospace;">{{ $booking->booking_code }}</p>
                <h3 style="margin-top: 15px;">Nama Tamu</h3>
                <p><strong>{{ $booking->guest_info['name'] ?? $booking->user->name ?? '-' }}</strong></p>
                <h3 style="margin-top: 15px;">Email</h3>
                <p>{{ $booking->guest_info['email'] ?? $booking->user->email ?? '-' }}</p>
            </div>
            <div class="detail-box">
                <h3>Check-in</h3>
                <p><strong>{{ $booking->check_in->format('Y-m-d H:i') }}</strong></p>
                <h3 style="margin-top: 15px;">Check-out</h3>
                <p><strong>{{ $booking->check_out->format('Y-m-d H:i') }}</strong></p>
            </div>
        </div>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th style="text-align: center;">Jumlah</th>
                    <th style="text-align: right;">Harga per Malam</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nights = $booking->check_out->diffInDays($booking->check_in);
                    $nights = max(1, $nights);
                    $price_per_night = $booking->total_price / ($nights * $booking->guest_count);
                @endphp
                <tr>
                    <td>
                        <strong>{{ $booking->service->name ?? 'Kamar' }}</strong>
                        <br>
                        <span style="color: #999; font-size: 12px;">{{ $nights }} malam x {{ $booking->guest_count }} tamu</span>
                    </td>
                    <td style="text-align: center;">{{ $nights }}</td>
                    <td style="text-align: right;">Rp {{ number_format($price_per_night, 0, ',', '.') }}</td>
                    <td style="text-align: right;">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Summary -->
        <div class="summary">
            <div class="summary-box">
                <div class="summary-row">
                    <span>Subtotal:</span>
                    <span>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Pajak:</span>
                    <span>Rp 0</span>
                </div>
                <div class="summary-row total">
                    <span>Total:</span>
                    <span>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Thank You -->
        <div class="thank-you">
            <p>Terima kasih telah mempercayai Hotelify untuk kebutuhan menginap Anda.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Hotelify © {{ now()->year }}. Sistem Reservasi Akomodasi.</p>
            <p>Untuk pertanyaan, hubungi: support@hotelify.com</p>
        </div>
    </div>
</body>
</html>
