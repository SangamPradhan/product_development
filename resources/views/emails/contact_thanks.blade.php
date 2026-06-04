<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inquiry Received</title>
    <style>
        body { font-family: 'Inter', Helvetica, Arial, sans-serif; background-color: #f8f9ff; color: #181c22; margin: 0; padding: 40px 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border: 1px solid #ebeef7; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02); }
        .header { background: #006e22; color: #ffffff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 600; letter-spacing: -0.02em; }
        .content { padding: 40px 30px; line-height: 1.6; }
        .content p { font-size: 16px; margin-bottom: 20px; color: #444748; }
        .details-box { background: #f1f3fc; border-left: 4px solid #006e22; padding: 20px; margin-bottom: 30px; border-radius: 0 8px 8px 0; }
        .details-box h3 { margin-top: 0; color: #181c22; font-size: 18px; margin-bottom: 15px; }
        .detail-row { display: flex; margin-bottom: 10px; font-size: 14px; }
        .detail-label { font-weight: bold; width: 120px; color: #747878; text-transform: uppercase; }
        .detail-val { color: #181c22; }
        .footer { background: #ebeef7; text-align: center; padding: 20px; font-size: 12px; color: #747878; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>We Have Received Your Inquiry</h1>
        </div>
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>Thank you for reaching out to AI-Solutions. We have received your submission and our team of experts is reviewing it. We will get back to you as soon as possible, typically within 24 business hours.</p>
            
            <div class="details-box">
                <h3>Inquiry Overview</h3>
                <div class="detail-row">
                    <span class="detail-label">Name:</span>
                    <span class="detail-val">{{ $name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Inquiry Type:</span>
                    <span class="detail-val">{{ ucfirst($type) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Message:</span>
                    <span class="detail-val">{{ $msg }}</span>
                </div>
            </div>
            
            <p>We appreciate your interest in our automation and custom AI architectures.</p>
            <p>Best regards,<br><strong>AI-Solutions Team</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} AI-Solutions. Precision in Automation.
        </div>
    </div>
</body>
</html>
