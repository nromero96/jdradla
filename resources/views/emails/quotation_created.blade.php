<!DOCTYPE html>
<html>
<head>
    <title>New quote created</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif">
    <p>Dear <b>Nilto</b>,</p>

    <p>Thank you for your rate request. We should be responding within the next 24 hours.</p>

    <p>Your Quote ID #: <b>{{ $quotation->id }}</b></p>

    <p>Here are the details of your request:</p>

    <table style="width: 100%;background: #fbf0f0;padding: 19px 25px;border: 1px solid gainsboro;border-radius: 10px;">
        <tr>
            <td colspan="2">
                <span style="font-size: 19px;font-weight: bold;color: #b80000;">Transport Details</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b>Mode of transport:</b> {{ $quotation->mode_of_transport }}<br>
                @if ($quotation->mode_of_transport == 'Ground' || $quotation->mode_of_transport == 'Container' || $quotation->mode_of_transport == 'RoRo')
                <b>Cargo Type:</b> {{ $quotation->cargo_type }}  <br>
                @endif
                <b>Service Type:</b> {{ $quotation->service_type }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="opacity: 0.3;">
                <span style="font-size: 18px;font-weight: bold; color: #b80000;">Location Details</span>
            </td>
        </tr>
        <tr>

            @if ($quotation->service_type === 'Door-to-Door')
                <td>
                    <b>Origin Country:</b> {{ $origin_country_name }}<br>
                    <b>Origin Address:</b> {{ $quotation->origin_address }}<br>
                    <b>Origin City:</b> {{ $quotation->origin_city }}<br>
                    <b>Origin State:</b> {{ $origin_state_name }}<br>
                    <b>Origin Zip Code:</b> {{ $quotation->origin_zip_code }}<br>
                </td>
                <td>
                    <b>Destination Country:</b> {{ $destination_country_name }}<br>
                    <b>Destination Address:</b> {{ $quotation->destination_address }}<br>
                    <b>Destination City:</b> {{ $quotation->destination_city }}<br>
                    <b>Destination State:</b> {{ $destination_state_name }}<br>
                    <b>Destination Zip Code:</b> {{ $quotation->destination_zip_code }}<br>
                </td>
            @elseif ($quotation->service_type === 'Door-to-Airport')
                <td>
                    <b>Origin Country:</b> {{ $origin_country_name }}<br>
                    <b>Origin Address:</b> {{ $quotation->origin_address }}<br>
                    <b>Origin City:</b> {{ $quotation->origin_city }}<br>
                    <b>Origin State:</b> {{ $origin_state_name }}<br>
                    <b>Origin Zip Code:</b> {{ $quotation->origin_zip_code }}<br>
                </td>
                <td>
                    <b>Destination Country:</b> {{ $destination_country_name }}<br>
                    <b>Destination Airport:</b> {{ $quotation->destination_airportorport }}<br>
                </td>
            @elseif ($quotation->service_type === 'Airport-to-Door')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin Airport:</b> {{ $quotation->origin_airportorport }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination Address:</b> {{ $quotation->destination_address }}<br>
                <b>Destination City:</b> {{ $quotation->destination_city }}<br>
                <b>Destination State:</b> {{ $destination_state_name }}<br>
                <b>Destination Zip Code:</b> {{ $quotation->destination_zip_code }}<br>
            </td>
            @elseif ($quotation->service_type === 'Airport-to-Airport')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin Airport:</b> {{ $quotation->origin_airportorport }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination Airport:</b> {{ $quotation->destination_airportorport }}<br>
            </td>
            @elseif ($quotation->service_type === 'Door-to-CFS/Port')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin Address:</b> {{ $quotation->origin_address }}<br>
                <b>Origin City:</b> {{ $quotation->origin_city }}<br>
                <b>Origin State:</b> {{ $origin_state_name }}<br>
                <b>Origin Zip Code:</b> {{ $quotation->origin_zip_code }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination CFS/Port:</b> {{ $quotation->destination_airportorport }}<br>
            </td>
            @elseif ($quotation->service_type === 'CFS/Port-to-Door')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin CFS/Port:</b> {{ $quotation->origin_airportorport }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination Address:</b> {{ $quotation->destination_address }}<br>
                <b>Destination City:</b> {{ $quotation->destination_city }}<br>
                <b>Destination State:</b> {{ $destination_state_name }}<br>
                <b>Destination Zip Code:</b> {{ $quotation->destination_zip_code }}<br>
            </td>
            @elseif ($quotation->service_type === 'CFS/Port-to-CFS/Port')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin CFS/Port:</b> {{ $quotation->origin_airportorport }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination CFS/Port:</b> {{ $quotation->destination_airportorport }}<br>
            </td>
            @elseif ($quotation->service_type === 'Door-to-Port')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin Address:</b> {{ $quotation->origin_address }}<br>
                <b>Origin City:</b> {{ $quotation->origin_city }}<br>
                <b>Origin State:</b> {{ $origin_state_name }}<br>
                <b>Origin Zip Code:</b> {{ $quotation->origin_zip_code }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination Port:</b> {{ $quotation->destination_airportorport }}<br>
            </td>
            @elseif ($quotation->service_type === 'Port-to-Door')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin Port:</b> {{ $quotation->origin_airportorport }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination Address:</b> {{ $quotation->destination_address }}<br>
                <b>Destination City:</b> {{ $quotation->destination_city }}<br>
                <b>Destination State:</b> {{ $destination_state_name }}<br>
                <b>Destination Zip Code:</b> {{ $quotation->destination_zip_code }}<br>
            </td>
            @elseif ($quotation->service_type === 'Port-to-Port')
            <td>
                <b>Origin Country:</b> {{ $origin_country_name }}<br>
                <b>Origin Port:</b> {{ $quotation->origin_airportorport }}<br>
            </td>
            <td>
                <b>Destination Country:</b> {{ $destination_country_name }}<br>
                <b>Destination Port:</b> {{ $quotation->destination_airportorport }}<br>
            </td>
            @endif
        </tr>
        <tr>
            <td colspan="2">
                <hr style="opacity: 0.3;">
                <span style="font-size: 18px;font-weight: bold; color: #b80000;">Cargo Details</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="border-collapse:collapse;width:100%;background: #fcf5f5;;border-color: white;" border="1" cellpadding="1" cellspacing="1">
                    <tr>
                        <td colspan="2"><b>Package</b></td>
                        <td colspan="4"><b>Dimensions</b></td>
                        <td colspan="3"><b>Weight</b></td>
                        <td colspan="1"><b>
                            @if($quotation->mode_of_transport == 'Air')
                            Total Volume Weight
                            @elseif ($quotation->mode_of_transport == 'Ground' || $quotation->mode_of_transport == 'Container')
                                @if ($quotation->cargo_type == 'LTL' || $quotation->cargo_type == 'LCL')
                                Total Volume
                                @endif
                            @elseif ($quotation->mode_of_transport == 'RoRo' || $quotation->mode_of_transport == 'Breakbulk')
                            Total CBM
                            @endif
                        </b></td>
                    </tr>
                    <tr>
                        <td><span style="color:#888ea8">Package Type:</span><br>____</td>
                        <td><span style="color:#888ea8">Qty:</span><br>____</td>
                        <td><span style="color:#888ea8">Length:</span><br>____</td>
                        <td><span style="color:#888ea8">Width:</span><br>____</td>
                        <td><span style="color:#888ea8">Height:</span><br>____</td>
                        <td><span style="color:#888ea8">Unit:</span><br>____</td>
                        <td><span style="color:#888ea8">Per piece:</span><br>____</td>
                        <td><span style="color:#888ea8">Total:</span><br>____</td>
                        <td><span style="color:#888ea8">Unit:</span><br>____</td>
                        <td><span style="color:#888ea8">
                            @if ($quotation->mode_of_transport == 'Air')
                            Kgs:
                            @elseif ($quotation->mode_of_transport == 'Ground' || $quotation->mode_of_transport == 'Container' || $quotation->mode_of_transport == 'RoRo' || $quotation->mode_of_transport == 'Breakbulk')
                            m³:
                            @endif
                        </span><br>____</td>
                    </tr>
                    <tr>
                        <td colspan="5"><span style="color:#888ea8">Cargo Description:</span> ___________________</td>
                        <td colspan="5"><span style="color:#888ea8">Dangerous Cargo: ________________</span></td>
                    </tr>

                </table>
                <br>
                <table style="border-collapse:collapse;width:100%;background: #fcf5f5;border-color: white;" border="1" cellpadding="1" cellspacing="1">
                    <tr>
                        <td colspan="4">
                            <span style="font-size:14px;font-weight:bold">Total (summary)</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color:#888ea8">Qty:</span><br>
                            {{ $quotation->total_qty }}
                        </td>
                        <td>
                            <span style="color:#888ea8">
                                @if ($quotation->mode_of_transport == 'Air')
                                Actual Weight (Kgs):
                                @elseif ($quotation->mode_of_transport == 'Ground' || $quotation->mode_of_transport == 'Container' || $quotation->mode_of_transport == 'RoRo' || $quotation->mode_of_transport == 'Breakbulk')
                                Actual Weight (Kgs):
                                @endif
                            </span><br>
                            {{ $quotation->total_actualweight }}
                        </td>
                        <td>
                            <span style="color:#888ea8">
                                @if ($quotation->mode_of_transport == 'Air')
                                Volume Weight (Kgs):
                                @elseif ($quotation->mode_of_transport == 'Ground' || $quotation->mode_of_transport == 'Container')
                                Volume (m³):
                                @elseif ( $quotation->mode_of_transport == 'RoRo' || $quotation->mode_of_transport == 'Breakbulk')
                                Total CBM
                                @endif
                            </span><br>
                            {{ $quotation->total_volum_weight }}
                        </td>
                        <td>
                            @if ($quotation->mode_of_transport == 'Air')
                            <span style="color:#888ea8">
                                Chargeable Weight (Kgs)
                            </span><br>
                            {{ $quotation->tota_chargeable_weight }}
                            @endif
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="opacity: 0.3;">
                <span style="font-size: 18px;font-weight: bold; color: #b80000;">Additional Information</span>
            </td>
        </tr>
        <tr>
            <td>
                <b>Shipping date:</b> @if($quotation->no_shipping_date == 'yes')I don’t have a shipping date yet. @else {{ $quotation->shipping_date }}@endif <br>
                <b>Declared value: </b> {{ $quotation->declared_value }}<br>
                <b>Insurance required: </b> {{ $quotation->insurance_required }}<br>
                <b>Currency: </b> {{ $quotation->currency }}<br>
            </td>
        </tr>
    </table>

    <p>For any queries, you can reach us at <b>sales@lacship.com.</b></p>

    <p><b>If you don&#39;t hear back in 48 hours, we might not provide the service you need right now.<br>Thanks for your understanding.</b></p>

    <p>Best regards,<br>
    Latin American Cargo</p>
</body>
</html>
