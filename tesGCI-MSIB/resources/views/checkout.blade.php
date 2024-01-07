<!-- resources/views/checkout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        text-align: center;
    }

    h2 {
        color: #333;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    button {
        background-color: #4caf50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    p {
        margin-top: 15px;
    }
</style>

<body>
    <h2>Faktur Penjualan</h2>

    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <label for="totalBelanja">Jumlah Belanja (Rp): </label>
        <input type="number" name="totalBelanja" id="totalBelanja" required>
        <button type="submit">Claim</button>
    </form>

    @if(isset($voucher))
    <p>Kode Voucher: {{ $voucher->code }}</p>
    <p>Voucher Berlaku Hingga: {{ $voucher->expires_at->format('d M Y') }}</p>
    @endif
</body>

</html>