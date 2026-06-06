<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Booking Confirmed</title>
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
            <h1>Event Registration Confirmed</h1>
        </div>
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>Thank you for registering! Your booking for our upcoming event has been successfully confirmed. We are excited to welcome you and share this valuable experience.</p>
            
            <div class="details-box">
                <h3>Event & Registration Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Event:</span>
                    <span class="detail-val">{{ $eventTitle }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date:</span>
                    <span class="detail-val">{{ $eventDate }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Location:</span>
                    <span class="detail-val">{{ $location }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Seats Booked:</span>
                    <span class="detail-val">{{ $seats }}</span>
                </div>
            </div>
            
            <p>If you have any questions or need to make changes to your booking, please reply to this email or contact our support team.</p>
            <p>Best regards,<br><strong>AI-Solutions Team</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} AI-Solutions. Precision in Automation.
        </div>
    </div>
</body>
</html>
