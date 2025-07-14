<!DOCTYPE html>
<html>

<head>
  <style>
    .button {
      background-color: #005a9e;
      color: white !important;
      padding: 12px 25px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
      font-weight: bold;
    }

    .button:hover {
      background-color: #004b85;
    }
  </style>
</head>

<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
  <div style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 10px;">
    <div style="text-align: center; margin-bottom: 25px; border-bottom: 1px solid #e0e0e0; padding-bottom: 20px;">
      <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS"
        style="width: 80px; height: 80px; margin-bottom: 10px;">
      <h2 style="color: #004b85; margin: 0;">WBS Kabupaten Banjarnegara</h2>
    </div>

    <p>Hallo, {{ $user->name }},</p>

    <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>

    <div style="text-align: center; margin: 30px 0;">
      <a href="{{ $url }}" class="button">Reset Password</a>
    </div>

    <p>Link reset password ini akan kadaluarsa dalam
      <strong>{{ config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') }} menit</strong>.
    </p>

    <p>Jika Anda tidak merasa meminta reset password, Anda tidak perlu melakukan tindakan apapun, abaikan saja email
      ini.</p>

    <br>

    <p>Terima kasih,<br><strong>Tim WBS Kabupaten Banjarnegara</strong></p>
  </div>
</body>

</html>