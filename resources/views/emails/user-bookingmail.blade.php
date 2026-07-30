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
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:8px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#0d6efd; padding:20px; text-align:center;">
                            <img src="{{ asset('themes-assets/img/logo.png') }}" alt="Logo"
                                style="max-width:160px;">
                            <h2 style="color:#ffffff; margin-top:10px;">Booking Confirmation</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:25px;">

                            <p style="font-size:14px; color:#555;">
                                Dear <strong>{{ $name }}</strong>,
                            </p>

                            <p style="font-size:14px; color:#555;">
                                Thank you for choosing <strong>{{ $setting->site_name }}</strong>.
                                We have successfully received your booking inquiry. Our team will review your request
                                and get in touch with you shortly.
                            </p>

                            <!-- Booking Summary -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="margin-top:20px; border-collapse:collapse;">

                                <tr>
                                    <td style="padding:10px; background:#f1f1f1; font-weight:bold; width:35%;">Trip</td>
                                    <td style="padding:10px;">{{ $trip_title }}</td>
                                </tr>

                                <tr>
                                    <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Arrival Date</td>
                                    <td style="padding:10px;">
                                        {{ \Carbon\Carbon::parse($arrival_date)->format('F d, Y') }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:10px; background:#f1f1f1; font-weight:bold;">Departure Date</td>
                                    <td style="padding:10px;">
                                        {{ \Carbon\Carbon::parse($departure_date)->format('F d, Y') }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Country</td>
                                    <td style="padding:10px;">{{ $country }}</td>
                                </tr>

                                <tr>
                                    <td style="padding:10px; background:#f1f1f1; font-weight:bold;">Contact Number</td>
                                    <td style="padding:10px;">{{ $contact }}</td>
                                </tr>

                                <tr>
                                    <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Email</td>
                                    <td style="padding:10px;">{{ $email }}</td>
                                </tr>

                            </table>

                            @if (!empty($user_message))
                                <div style="margin-top:20px;">
                                    <strong>Special Requirements / Message</strong>
                                    <p style="margin-top:8px; color:#555; line-height:1.6;">
                                        {{ $user_message }}
                                    </p>
                                </div>
                            @endif

                            <p style="margin-top:25px; font-size:14px; color:#555;">
                                If you have any questions or need to update your booking, simply reply to this email or
                                contact us directly.
                            </p>

                            <p style="margin-top:20px; font-size:14px; color:#555;">
                                We look forward to welcoming you on your adventure!
                            </p>

                            <p style="margin-top:20px;">
                                Best Regards,<br>
                                <strong>{{ $setting->site_name }}</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777;">
                            © {{ date('Y') }} {{ $setting->site_name }}<br>
                            {{ $setting->email_primary }}
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
