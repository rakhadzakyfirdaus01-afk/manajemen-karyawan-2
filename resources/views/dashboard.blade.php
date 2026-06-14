@extends('layouts.app')

@section('content')

<style>

.stat-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
}

.bg-total{
    background:linear-gradient(135deg,#4e73df,#224abe);
}

.bg-aktif{
    background:linear-gradient(135deg,#1cc88a,#13855c);
}

.bg-nonaktif{
    background:linear-gradient(135deg,#e74a3b,#be2617);
}

.bg-departemen{
    background:linear-gradient(135deg,#f6c23e,#dda20a);
}

.chart-card,
.info-card{
    background:#2a2a40;
    border:none;
    border-radius:25px;
}

</style>


<div class="container">

<h2 class="fw-bold mb-4">
    <i class="fas fa-chart-line me-2"></i>
    Dashboard
</h2>


<div class="row g-4">

    <div class="col-md-3">
        <div class="card stat-card bg-total text-white">
            <div class="card-body text-center">
                <i class="fas fa-users fa-3x mb-3"></i>
                <h1>{{ $totalKaryawan }}</h1>
                <h5>Total Karyawan</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card bg-aktif text-white">
            <div class="card-body text-center">
                <i class="fas fa-user-check fa-3x mb-3"></i>
                <h1>{{ $karyawanAktif }}</h1>
                <h5>Karyawan Aktif</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card bg-nonaktif text-white">
            <div class="card-body text-center">
                <i class="fas fa-user-times fa-3x mb-3"></i>
                <h1>{{ $karyawanNonaktif }}</h1>
                <h5>Karyawan Nonaktif</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card bg-departemen text-white">
            <div class="card-body text-center">
                <i class="fas fa-building fa-3x mb-3"></i>
                <h1>{{ $departemen }}</h1>
                <h5>Total Departemen</h5>
            </div>
        </div>
    </div>

</div>



<div class="row mt-5">

    <div class="col-md-6">

        <div class="card chart-card">

            <div class="card-body text-center">

                <h4 class="mb-4">
                    <i class="fas fa-chart-pie me-2"></i>
                    Statistik Karyawan
                </h4>

                <div style="width:220px;margin:auto">

                    <canvas id="karyawanChart"></canvas>

                </div>

            </div>

        </div>

    </div>



    <div class="col-md-6">

        <div class="card chart-card">

            <div class="card-body">

                <h4 class="mb-4 text-center">

                    <i class="fas fa-chart-line me-2"></i>

                    Grafik Karyawan

                </h4>

                <canvas id="lineChart" height="120"></canvas>

            </div>

        </div>

    </div>

</div>



<div class="row mt-5 justify-content-center">

    <div class="col-md-6">

        <div class="card info-card">

            <div class="card-body text-center">

                <i class="fas fa-user-circle fa-5x text-info mb-4"></i>

                <h2>{{ auth()->user()->name }}</h2>

                <span class="badge bg-warning text-dark">

                    {{ ucfirst(auth()->user()->role) }}

                </span>

                <hr>

                <h4>Selamat Datang 👋</h4>

                <p class="text-light">

                    Sistem Manajemen Karyawan digunakan untuk mengelola data karyawan, absensi, pengajuan cuti, dan pengumuman perusahaan secara digital.

                </p>

            </div>

        </div>

    </div>

</div>


</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('karyawanChart'),{

type:'doughnut',

data:{

labels:['Aktif','Nonaktif'],

datasets:[{

data:[
{{ $karyawanAktif }},
{{ $karyawanNonaktif }}
],

backgroundColor:[
'#1cc88a',
'#e74a3b'
]

}]

},

options:{

plugins:{

legend:{

labels:{

color:'white'

}

}

}

}

});



new Chart(document.getElementById('lineChart'),{

type:'line',

data:{

labels:[
'Total',
'Aktif',
'Nonaktif',
'Departemen'
],

datasets:[{

label:'Jumlah',

data:[
{{ $totalKaryawan }},
{{ $karyawanAktif }},
{{ $karyawanNonaktif }},
{{ $departemen }}
],

borderColor:'#36b9cc',

backgroundColor:'rgba(54,185,204,.2)',

fill:true,

tension:.4

}]

},

options:{

plugins:{

legend:{

labels:{

color:'white'

}

}

},

scales:{

x:{
ticks:{
color:'white'
}
},

y:{
ticks:{
color:'white'
}
}

}

}

});

</script>

@endsection