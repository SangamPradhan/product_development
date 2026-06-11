<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank You For Your Review</title>
    <style>
        body { font-family: 'Inter', Helvetica, Arial, sans-serif; background-color: #f8f9ff; color: #181c22; margin: 0; padding: 40px 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border: 1px solid #ebeef7; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02); }
        .header { background: #006e22; color: #ffffff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 600; letter-spacing: -0.02em; }
        .content { padding: 40px 30px; line-height: 1.6; }
        .content p { font-size: 16px; margin-bottom: 20px; color: #444748; }
        .quote-box { background: #f1f3fc; border-left: 4px solid #006e22; padding: 20px; margin-bottom: 30px; border-radius: 0 8px 8px 0; font-style: italic; color: #444748; }
        .footer { background: #ebeef7; text-align: center; padding: 20px; font-size: 12px; color: #747878; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Your Feedback</h1>
        </div>
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>Thank you for taking the time to share your review on the project <strong>{{ $projectTitle }}</strong>. We highly value feedback from our clients and partners, and your insights help us continuously optimize our AI solutions.</p>
            
            <p>Your review is currently pending a brief admin review before it becomes publicly visible on our project details page. Here is a copy of your submission:</p>
            
            <div class="quote-box">
                "{{ $comment }}"
                <br><br>
                <small style="font-weight: bold; font-style: normal; color: #181c22;">Rating: {{ $rating }}/5 stars</small>
            </div>
            
            <p>Thank you once again for your support and partnership.</p>
            <p>Best regards,<br><strong>AI-Solutions Team</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} AI-Solutions. Precision in Automation.
        </div>
    </div>
</body>
</html>
