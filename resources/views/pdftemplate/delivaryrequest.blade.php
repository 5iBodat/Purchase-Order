<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Mina Marret - Delivery Request Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 50px;
            height: 50px;
            margin-right: 20px;
        }
        h1 {
            margin: 0;
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
        }
        .signature-box {
            width: 40%;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .signature-line {
            margin-top: 50px;
            border-top: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="path_to_logo.png" alt="PT Mina Marret Logo" class="logo">
        <div>
            <h1>PT Mina Marret</h1>
            <h2>Delivery Request Slip</h2>
        </div>
    </div>
    
    <p style="text-align: right;">No. 28/MMTEI/VI/24</p>
    
    <table>
        <tr>
            <th>Nama Klien</th>
            <td>{{$sph->company_name}}</td>
        </tr>
        <tr>
            <th>No PO</th>
            <td>{{$sph->sph_type."/".$sph->sph_code}}</td>
        </tr>
        <tr>
            <th>Tanggal PO</th>
            <td>{{$sph->created_at}}</td>
        </tr>
        <tr>
            <th>Source</th>
            <td>{{ ($sph->sph_type == "MMTEI") ? "Non-Pertamina" : "Pertamina"}}</td>
        </tr>
        <tr>
            <th>Volume</th>
            <td>{{($sph->pbbkb / $sph->harga)/1000}} KL</td>
        </tr>
        <tr>
            <th>Truck Capacity</th>
            <td>{{($sph->pbbkb / $sph->harga)/1000}} KL</td>
        </tr>
        <tr>
            <th>Request Date by</th>
            <td>{{$sph->created_at}}</td>
        </tr>
        <tr>
            <th>Nama Transportir</th>
            <td>{{$sph->created_at}}</td>
        </tr>
        <tr>
            <th>Site Location</th>
            <td>{{$sph->oatlokasi}}</td>
        </tr>
        <tr>
            <th>Delivery Note</th>
            <td>{{$sph->notes}}</td>
        </tr>
        <tr>
            <th>PIC Site</th>
            <td>{{$sph->company_pic}} -{{$sph->telepon_pic}}</td>
        </tr>
        <tr>
            <th>Requested by</th>
            <td>{{$sph->sph_type}}</td>
        </tr>
        <tr>
            <th>Additional Note</th>
            <td>Untuk solar tiba di lokasi hari Sabtu, Tanggal 15 Juni 2024</td>
        </tr>
    </table>
    
    <div class="signatures">
        <div class="signature-box">
            <p>Acknowledged by</p>
            <div class="signature-line"></div>
            <p>{{$users->name}}</p>
        </div>
        <div class="signature-box">
            <p>Requested by :</p>
            <img src="path_to_signature.png" alt="M. Fikri Akbar Pratama Signature" style="max-width: 100px;">
            <div class="signature-line"></div>
            <p>{{$sph->company_pic}}</p>
        </div>
    </div>
</body>
</html>