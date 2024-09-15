<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT MINA MARRET LINTAS NUSANTARA - Price Quotation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        table p {
            margin: 0 5px;
            font-size: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .title {
            font-size: 14px;
            font-style: bold;
            margin: 0 5px
        }
        .sub-title {
            font-size: 13px;
            font-style: bold;
            margin: 0 5px
        }
        th, td {
            font-size: 10px;
            border: 1px solid #000;
        }

        p {
            font-size: 10px;
            margin: 0 5px
        }
        .yellow-bg {
            background-color: yellow;
        }
        hr{
            border-bottom: 2px dashed #000;
        }

        li{
            font-size: 10px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td style="width: 10%; border:none">
                <img src="{{ public_path('static/images/logo/logo.png') }}" alt="Pertamina Logo" class="logo-1">
            </td>
            <td style="width: 80%; border:none; text-align:center">
                <p class="title">PT MINA MARRET LINTAS NUSANTARA</p>
                <p class="sub-title">AGEN RESMI BBM NON-SUBSIDI PERTAMINA</p>
                <p>Berdasarkan Surat PT Pertamina Patra Niaga No. 1684/PN10000/2021-S3 Tanggal 22 Desember 2021</p>
                <p>Jenis Komoditi/ Produk : Solar HSD B35, MFO, Pertamax, Pertamax Turbo dan Dexlite</p>
                <p>
                    World Capital Tower 5th Floor, Unit 01 Jl. Mega Kuningan
                    Barat No. 3 Kec. Setiabudi, Jakarta Selatan 12950
                </p>
                <p>
                    Gagah Putera Satria Building Jl. KP Tendean No. 158
                    Banjarmasin, Kalimantan Selatan 70231
                </p>
                <p>Email : info@mmln.org / Telp. 0811 - 8888 - 0321</p>
            </td>
            @if ($sph->sph_type == "MMTEI") 
            <td style="width: 10%; border:none">
                <img src="{{ public_path('static/images/logo/pertamina.png') }}" alt="Pertamina Logo" class="logo-2">
            </td>
            @endif
        </tr>
    </table>
<hr>
    <table>
        <tr class="red-bg">
            <td style="border:none;">Ref : {{$noRef}}</td>
            <td style="border:none;" align="right">Jakarta, {{$date["month"].'/'.$date["year"]}}</td>
        </tr>
    </table>

    <div>
        <p>Kepada,</p>
        <p>{{$sph->company_name}}</p>
        <p>ditempat</p>
    </div>

    <p>Dengan hormat,</p>
    <p>Bersama ini kami sampaikan harga penawaran produk kami sebagai berikut :</p>
    <table style="width: 50%">
    <tr>
        <td style="border: none;">Item :</td>
        <td style="border: none;">{{$sph->product_name}}</td>
    </tr>
            <tr>
                <td style="border: none;">Price :</th>
                <td>Harga Produk /liter</th>
            </tr>
            <tr class="red-bg">
                <td style="border: none;"></td>
                <td>Rp. {{$sph->harga}} /ltr (Harga Dasar)</td>
            </tr>
            <tr class="red-bg">
                <td style="border: none;"></td>
                <td>Rp. {{$sph->ppn}} /ltr (PPN 11%)</td>
            </tr>
            <tr class="red-bg">
                <td style="border: none;"></td>
                <td>Rp. {{$sph->pbbkb}} /ltr (PBBKB 7,5%)</td>
            </tr>
            <tr class="red-bg">
                <td style="border: none;"></td>
                <td>Rp. {{$sph->total}} /ltr (Total Harga Produk)</td>
            </tr>
        </table>
        <table style="width: 60%">
            <tr>
                <td style="border: none; width: 15%">OAT :</td>
                <td >Lokasi</td>
                <td>OAT</td>
            </tr>
            <tr>
                <td style="border: none"></td>
                <td>{{$sph->oatlokasi}}</td>
                <td>Rp. {{$sph->hargaoat}} /Ltr</td>
            </tr>
        </table>

    <p style="font-size: 12px bold;">Payment</p>
    <p>Pembayaran dapat ditransfer ke :</p>
    <div class="yellow-bg">
        <p>PT Mina Marret Lintas Nusantara</p>
        <ol>
            <li>BCA Cabang WTC Sudirman Acct No. 5455-678967, atau</li>
            <li>Mandiri Cabang Satrio Tower Acct No. 10-200-660-88888</li>
            </ol>
    </div>
    <div>
        <p>Remarks</p>
        <ol>
            <li>Toleransi susut sebesar 0.5% (Standar Pengukuran menggunakan Flowmeter/Sounding). Perbandingan Flowmeter/Sounding supplier dengan Flowmeter/Sounding milik customer yang telah dikalibrasi.</li>
            <li>Harga berlaku dari tanggal 01 - 14 Mei 2023.</li>
            <li>Tanggung jawab MMLN terhadap produk yang dikirim baik kuantitas maupun kualitas adalah sampai pada saat sebelum bongkar dimana produk masih berada di truk transportir MMLN. Pelanggan berkewajiban mengambil sampel untuk disimpan dan memastikan produk dalam kondisi baik sebelum dibongkar.</li>
            <li>Produk sesuai dengan spesifikasi berdasarkan SK Dirjen Migas No. 185.K/HK.02/DJM/2022 (HSD B-35).</li>
            <li>PO harap dapat dikirimkan H-1 sebelum pengiriman ke e-mail mina@mmln.org dan albert@mmln.org</li>
            <li>Harga sewaktu waktu dapat berubah tanpa ada pemberitahuan terlebih dahulu</li>
        </ol>
    </div>
    <div class="div">
        <p>Demikianlah proposal penawaran ini kami buat, bila ada pertanyaan mohon untuk menghubungi kami.</p>
        <p>Terima kasih atas perhatian dan kerjasamanya.</p>
    </div>
<table>
    <tr>
        <td style="border: none;">
            <p>Salam Sukses,</p>
            <p>Minasari Mingna</p>
            <br>
        <p>K: 021-22587919 / HP : +65 9894 2719</p>
        </td>
        <td align="right" style="border: none">
            <table style="border: none; margin:0; padding:0">
                <tr>
                    <td style="border: none" align="right">
                        <img src="{{ public_path('static/images/logo/footer_logo.png') }}" alt="">
                    </td>
                    <td style="border: none">
                        <p style="font-size: 8px">ISO 9001, 2015    : SISBALQ09202098040</p>
                        <p style="font-size: 8px">ISO 14001, 2015   : SISBALE09202064119</p>
                        <p style="font-size: 8px">ISO 45001, 2018   : SISBALO09202029048</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

