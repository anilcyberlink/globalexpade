<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background:#f4f6f8;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:20px 0;">
    <tr>
        <td align="center">

            <!-- Container -->
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td style="background:#0b3d91; padding:20px; text-align:center;">
                        <img src="{{asset('themes-assets/images/new-logo.png')}}"
                             alt="Arnold Coster Expeditions"
                             style="max-width:160px;">
                        <h2 style="color:#ffffff; margin-top:10px;">Booking Received</h2>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:25px;">

                        <p style="font-size:14px; color:#555;">
                            Dear <strong>{{ $booking->full_name }}</strong>,
                        </p>

                        <p style="font-size:14px; color:#555;">
                            Thank you for trusting us. Your booking has been successfully received, and we will contact you shortly.
                        </p>

                        <!-- Booking Summary -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:20px; border-collapse:collapse;">

                            <tr>
                                <td style="padding:10px; background:#f1f1f1; font-weight:bold;">Trip</td>
                                <td style="padding:10px;">{{ $booking->title }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Departure Date</td>
                                <td style="padding:10px;">
                                    {{ \Carbon\Carbon::parse($booking->departure_date)->format('F d, Y') }}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f1f1f1; font-weight:bold;">Number of People</td>
                                <td style="padding:10px;">{{ $booking->num_people }}</td>
                            </tr>

                        </table>

                        <!-- Message -->
                        @if($booking->comments)
                        <div style="margin-top:20px;">
                            <strong>Your Message:</strong>
                            <p style="margin-top:5px; color:#555;">
                                {{ $booking->comments }}
                            </p>
                        </div>
                        @endif

                        <p style="margin-top:20px; font-size:14px; color:#555;">
                            If you have any urgent queries, feel free to reply to this email.
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777;">
                        © {{ date('Y') }} Arnold Coster Expeditions<br>
                        info@arnoldcoster.com
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
