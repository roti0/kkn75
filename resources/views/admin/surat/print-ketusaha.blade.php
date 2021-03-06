<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('admin.surat.component/print-style')
    @inject('carbon', 'Carbon\Carbon')
</head>

<body>
    <div id="content" class="container_12 clearfix">
        <div id="content-main" class="grid_7">
            <div>
                <div width="100%">
                    <div align="center">
                        @include('admin.surat.component/kop')

                        <p style="margin-top: 40pt;" class="kop18 bold">
                            <u>
                                SURAT KETERANGAN USAHA
                            </u>
                        </p>

                        <p style="margin-bottom: 10pt;" class="kop12">Nomor : 500 / {{ $data->mail_number }} /
                            35.09.16.2003/ {{ $carbon->now()->isoFormat('YYYY') }}</p>
                        <div class="clear"></div>

                    </div>

                </div>
                <div id="isi3">
                    <div>Yang bertanda tangan dibawah ini saya, Kepala Desa Kecamatan Kabupaten Jember, menerangkan
                        bahwa :
                    </div>
                    <table style="padding-left: 40px;" width="100%">
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="23%">Nama</td>
                            <td width="3%">:</td>
                            <td width="64%">{{ $data->userdata->name }}</td>
                        </tr>
                        <tr>
                            <td>Jenis kelamin </td>
                            <td>:</td>
                            <td>{{ $data->userdata->gender->name }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/tgl. Lahir </td>
                            <td>:</td>
                            <td>{{ $data->userdata->born }}/
                                {{ $carbon->parse($data->userdata->birthdate)->isoFormat(' D MMMM YYYY') }}</td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan </td>
                            <td>:</td>
                            <td>WNI</td>
                        </tr>
                        <tr>
                            <td>Status </td>
                            <td>:</td>
                            <td>{{ $data->userdata->maritalStatus->name }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan </td>
                            <td>:</td>
                            <td>{{ $data->userdata->job->name }}</td>
                        </tr>
                        <tr>
                            <td>Alamat </td>
                            <td>:</td>
                            <td>Dusun {{ $data->userdata->dusun }}, RT {{ $data->userdata->rt }} / RW.
                                {{ $data->userdata->rw }}
                                Desa Jenggawah Kecamatan Jenggawah
                                Kabupaten Jember</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                    <div class="indentasi">
                        1. Orang tersebut adalah benar-benar berdomisili pada alamat tersebut diatas,berkelakuan baik
                    </div>
                    <div class="indentasi">
                        2. Surat Keterangan ini untuk menerangkan bahwa yang bersangkutan diatas benar-benar mempunyai
                        usaha : {{ $maildata['usaha'] }}
                    </div>
                    <div class="indentasi">
                        Demikian surat keterangan ini kami buat dengan sebenarnya dan kepada instansi yang dimaksud
                        mohon menjadikan periksa adanya.
                    </div>
                </div>
            </div>
            @include('admin.surat.component/standart-footer')
        </div>
    </div>
    <div id="aside"></div>
    </div>
</body>

</html>