<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Invoice {{ $booking->booking_code }}</title>
    <style>
        :root{--bg:#fff;--muted:#6b7280}
        body{font-family:Inter,ui-sans-serif,system-ui,Arial,Helvetica,sans-serif;margin:0;background:#f7fafc;color:#111}
        .container{max-width:800px;margin:20px auto;padding:16px}
        .card{background:var(--bg);border-radius:8px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.06)}
        .header{display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center}
        h1{margin:0;font-size:20px}
        .small{color:var(--muted);font-size:14px}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:12px}
        .row{display:flex;justify-content:space-between;margin-top:6px}
        .total{font-size:18px;font-weight:700;color:#0f172a}
        .actions{margin-top:12px;display:flex;gap:8px}
        .btn{padding:8px 12px;border-radius:8px;border:0;cursor:pointer}
        .btn-primary{background:#2563eb;color:#fff}
        .btn-ghost{background:#eef2ff;color:#1e293b}
        @media print{body{background:#fff}.actions{display:none}.card{box-shadow:none;border-radius:0}}
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <div>
                    <h1>Invoice</h1>
                    <div class="small">Tanggal: {{ now()->format('d M Y') }}</div>
                </div>
                <div style="text-align:right">
                    <div class="small">Kode Booking</div>
                    <div style="font-family:monospace;font-weight:700">{{ $booking->booking_code }}</div>
                </div>
            </div>

            <div class="grid" style="margin-top:18px">
                <div>
                    <div class="small">Nama</div>
                    <div>{{ $booking->guest_info['name'] ?? $booking->user->name ?? '-' }}</div>
                    <div class="small" style="margin-top:6px">Email</div>
                    <div>{{ $booking->guest_info['email'] ?? $booking->user->email ?? '-' }}</div>
                </div>
                <div>
                    <div class="small">Periode</div>
                    <div>{{ $booking->check_in->format('Y-m-d') }} &mdash; {{ $booking->check_out->format('Y-m-d') }}</div>
                </div>
            </div>

            <div class="row" style="margin-top:18px">
                <div class="small">Total</div>
                <div class="total">Rp {{ number_format($booking->total_price,0,',','.') }}</div>
            </div>

            <div class="actions">
                <button class="btn btn-primary" onclick="window.print()">Cetak / Simpan PDF</button>
            </div>
        </div>
    </div>
</body>
</html>
