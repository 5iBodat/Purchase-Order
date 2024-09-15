<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .logo {
            max-width: 100px;
            float: left;
        }
        .company-info {
            text-align: center;
        }
        .purchase-order {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
        .notes {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="path_to_logo.png" alt="Company Logo" class="logo">
        <img src="path_to_pertamina_logo.png" alt="Pertamina Logo" style="float: right; max-width: 100px;">
        <div class="company-info">
            <h1>PT MINA MARRET LINTAS NUSANTARA</h1>
            <p>Agen Resmi BBM Non-Subsidi PERTAMINA</p>
            <p>Berdasarkan Surat PT Pertamina Patra Niaga Nomor No. : 5008/PN10000/2021-S3 Tanggal 22 Desember 2023</p>
            <p>Jalan Kamboja Pesau I, Seluang HD 835, UPT, Ketapang, Pesawai, Talaud dan Sekitar</p>
            <p>Kantor Cabang Pusat JL Dr. Ide Anak Agung Gde Lot D Lingkar Mega Kuningan Jakarta Selatan, DKI Jakarta 12950</p>
            <p>Denga Pusat Niaga Blok Merang Jl. DR. Tjipto No. 188 Banyu Urip - Purworejo Selatan 70232</p>
            <p>Email : info@mmln.org Telp : +62 - 811 - 8888 - 0321</p>
        </div>
    </div>

    <div class="purchase-order">
        <h2>PURCHASE ORDER</h2>
        <table>
            <tr>
                <td>To: {{$sph->company_name}}</td>
                <td></td>
                <td>P.O No.: {{$sph->id}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Name: {{$sph->company_pic}}</td>
                <td></td>
                <td>P.O Date: {{$sph->created_at}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Address: {{$sph->company_name}}</td>
                <td></td>
                <td>Delivered To: {{$sph->company_name}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Phone/Fax: {{$sph->company_name}}</td>
                <td></td>
                <td>Loading Point: {{$sph->company_name}}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Comments or special instructions:</td>
            </tr>
        </table>

        <table>
            <tr>
                <th>REQUESTED BY</th>
                <th>SHIPPED VIA</th>
                <th>F.O.B POINT</th>
                <th>TERM</th>
                <th>TRANSPORT</th>
            </tr>
            <tr>
                <td>{{$sph->company_name}}</td>
                <td>{{$sph->company_name}}</td>
                <td>{{$sph->company_name}}</td>
                <td>Hari {{$sph->company_name}}</td>
                <td>Rp. {{$sph->company_name}}/Lt</td>
            </tr>
        </table>

        <table>
            <tr>
                <th>QUANTITY</th>
                <th>DESCRIPTION</th>
                <th>UNIT PRICE</th>
                <th>AMOUNT</th>
            </tr>
            <tr>
                <td>{{$sph->company_name}}Liter</td>
                <td>{{$sph->company_name}}</td>
                <td>{{$sph->company_name}}</td>
                <td>Rp. {{$sph->company_name}}</td>
            </tr>
            <tr>
                <td colspan="3" align="right">SUBTOTAL</td>
                <td>Rp. {{$sph->company_name}}</td>
            </tr>
            <tr>
                <td colspan="3" align="right">Uang Portal</td>
                <td>{{$sph->company_name}}</td>
            </tr>
            <tr>
                <td colspan="3" align="right">TOTAL</td>
                <td>Rp. {{$sph->company_name}}</td>
            </tr>
        </table>
    </div>

    <div class="notes">
        <p><strong>Notes:</strong></p>
        <ol>
            <li>Harap mengirimkan 2 salinan invoice.</li>
            <li>Pesanan yang masuk sesuai dengan harga, jangka waktu, metode pengiriman dan spesifikasi yang tercantum diatas</li>
            <li>Toleransi susut sebesar 0,5% (Standar Pengukuran menggunakan Flowmeter)</li>
            <li>Perbandingan Flowmeter supplier dengan Flowmeter milik customer yang telah dikalibrasi di lapangan</li>
            <li>Produk sesuai dengan spesifikasi berdasarkan SK Dirjen Migas No. 170.K/HK.02/DJM/2023 (HSD B-35)</li>
            <li>NPWP : 94.438.325.6-039.000</li>
            <li>PT. MINA MARRET LINTAS NUSANTARA<br>
                APARTEMEN METRO PARK JL PILAR MAS KAV 28 UNIT MA-LG<br>
                KEDOYA SELATAN, KEBON JERUK<br>
                JAKARTA BARAT DKI JAKARTA</li>
        </ol>
        <p><strong>Korespondensi dapat dikirim ke :</strong></p>
        <p>Nama : Tantry<br>
           Alamat : World Capital Tower Lt. 5 Unit 01<br>
           JL DR Ide Anak Agung Gde Lot D, Lingkar Mega Kuningan<br>
           Jakarta Selatan, DKI Jakarta 12950<br>
           Telephoni : +62-812-95914415</p>
    </div>
</body>
</html>