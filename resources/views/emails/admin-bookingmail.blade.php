<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Booking Inquiry</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f6f8;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:20px 0; background:#f4f6f8;">
    <tr>
        <td align="center">

            <!-- Container -->
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td style="background:#0b3d91; padding:20px; text-align:center;">
                        <img src="{{asset('themes-assets/images/new-logo.png')}}"
                             alt="Arnold Coster Expeditions"
                             style="max-width:160px; margin-bottom:10px;">
                        <h2 style="color:#ffffff; margin:0;">New Trip Booking</h2>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:25px;">

                        <p style="font-size:14px; color:#555; margin-bottom:20px;">
                            You have received a new booking inquiry. Here are the details:
                        </p>

                        <!-- Booking Info -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">

                            <tr>
                                <td style="padding:10px; background:#f1f1f1; font-weight:bold; width:35%;">Full Name</td>
                                <td style="padding:10px;">{{ $booking->full_name }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Email</td>
                                <td style="padding:10px;">{{ $booking->email }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f1f1f1; font-weight:bold;">Phone</td>
                                <td style="padding:10px;">{{ $booking->phone }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Country</td>
                                <td style="padding:10px;">{{ $booking->country }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f1f1f1; font-weight:bold;">Trip</td>
                                <td style="padding:10px;">{{ $booking->title }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Departure Date</td>
                                <td style="padding:10px;">{{ \Carbon\Carbon::parse($booking->departure_date)->format('F d, Y') }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f1f1f1; font-weight:bold;">Number of People</td>
                                <td style="padding:10px;">{{ $booking->num_people }}</td>
                            </tr>

                            <tr>
                                <td style="padding:10px; background:#f9f9f9; font-weight:bold;">Message</td>
                                <td style="padding:10px; line-height:1.5;">
                                    {{ $booking->comments }}
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777;">
                        © {{ date('Y') }} Arnold Coster Expeditions. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
