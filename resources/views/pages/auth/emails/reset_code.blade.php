<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Mã Xác Thực Hexa Shop</title>
  <link rel="icon" href="{{ asset('assets/logo.jpg') }}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Reset cơ bản cho email */
    body, html { margin:0; padding:0; width:100% !important; height:100% !important; background-color:#121212; }
    img { border:0; line-height:100%; outline:none; text-decoration:none; }
    table { border-collapse:collapse !important; }

    /* Container chính */
    .email-container {
      max-width:600px;
      margin:40px auto;
      background-color:#1e1e1e;
      border-radius:8px;
      overflow:hidden;
      font-family: 'Segoe UI', Roboto, sans-serif;
      color:#ffffff;
    }

    /* Header */
    .email-header {
      background-color:#0e0e0e;
      padding:20px;
      text-align:center;
    }
    .email-header img {
      width:80px;
      height:auto;
    }

    /* Body */
    .email-body {
      padding:30px 20px;
      line-height:1.6;
    }
    .email-body h2 {
      margin-top:0;
      font-size:24px;
      color:#00a8ff;
    }
    .email-body p {
      margin:16px 0;
      font-size:16px;
      color:#cfcfcf;
    }
    .code-box {
      display:inline-block;
      margin:20px 0;
      padding:16px 24px;
      background-color:#272727;
      border:2px dashed #00a8ff;
      border-radius:6px;
      font-size:32px;
      letter-spacing:4px;
      font-weight:bold;
      color:#00eaff;
    }

    /* Footer */
    .email-footer {
      background-color:#0e0e0e;
      padding:16px;
      text-align:center;
      font-size:12px;
      color:#777;
    }
    .email-footer a {
      color:#00a8ff;
      text-decoration:none;
    }
  </style>
</head>
<body>
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
        <table class="email-container" role="presentation" cellpadding="0" cellspacing="0">
          <!-- Header -->
          <tr>
            <td class="email-header">
              <img src="https://i.pinimg.com/736x/a7/3d/c1/a73dc1a733311b5c58bce0452b813ab4.jpg" alt="Hexa Shop">
            </td>
          </tr>
          <!-- Body -->
          <tr>
            <td class="email-body">
              <h2>Xin chào!</h2>
              <p>Bạn vừa yêu cầu đặt lại mật khẩu trên Hexa Shop. Hãy sử dụng mã xác thực bên dưới để tiếp tục:</p>
              <div class="code-box">{{ $code }}</div>
              <p>Mã này sẽ hết hạn trong <strong>10 phút</strong>. Nếu bạn không yêu cầu, hãy bỏ qua email này hoặc liên hệ với chúng tôi.</p>
            </td>
          </tr>
          <!-- Footer -->
          <tr>
            <td class="email-footer">
              <p>Bạn cần trợ giúp? Truy cập <a href="http://hexa-shop.test/contact">Hỗ trợ Hexa Shop</a></p>
              <p>&copy; {{ date('Y') }} Hexa Shop. All rights reserved.</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
