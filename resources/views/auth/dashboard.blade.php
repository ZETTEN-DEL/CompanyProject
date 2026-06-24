<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            margin: 0;
            background: #f4f6f9;
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100vh;
            background: #2f3e4e;
            color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, .1);
        }

        .sidebar h4 {
            padding: 20px;
            margin: 0;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: .3s;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            background: #1f2937;
            padding-left: 25px;
        }

        .main {
            margin-left: 240px;
        }

        .topbar {
            background: #f4b400;
            height: 65px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .1);
        }

        .content {
            padding: 25px;
            min-height: calc(100vh - 125px);
        }

        .footer {
            background: #2f3e4e;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .welcome-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
        }

        .stat-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-card .card-body {
            text-align: center;
            padding: 30px;
        }

        .stat-card i {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .stat-card h2 {
            font-size: 35px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h4>
            <i class="bi bi-shield-lock"></i>
            Admin Menu
        </h4>

        <a href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.articles') }}">
            <i class="bi bi-newspaper"></i>
            Artikel
        </a>

        <a href="{{ route('admin.services') }}">
            <i class="bi bi-gear"></i>
            Services
        </a>

    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <div class="dropdown">

                <button class="btn btn-light dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle"></i>
                    {{ session('email') ?? 'admin@gmail.com' }}

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <span class="dropdown-item-text">
                            Administrator
                        </span>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="dropdown-item text-danger">

                                <i class="bi bi-box-arrow-right"></i>
                                Logout

                            </button>
                        </form>

                    </li>

                </ul>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="content">

            @if (($page ?? 'dashboard') == 'dashboard')

                <h2 class="mb-4">Dashboard</h2>

                <div class="welcome-card mb-4">
                    <h5>Selamat Datang Administrator 👋</h5>
                    <p class="mb-0">
                        Kelola Artikel dan Services melalui menu di samping.
                    </p>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="card stat-card">
                            <div class="card-body">

                                <i class="bi bi-newspaper text-primary"></i>

                                <h5>Jumlah Artikel</h5>

                                <h2>{{ $jumlahArtikel ?? 0 }}</h2>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card stat-card">
                            <div class="card-body">

                                <i class="bi bi-gear text-success"></i>

                                <h5>Jumlah Services</h5>

                                <h2>{{ $jumlahService ?? 0 }}</h2>

                            </div>
                        </div>
                    </div>

                </div>
            @elseif($page == 'articles')
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2>📄 Data Artikel</h2>


                    <div class="d-flex gap-2">


                        <!-- EXPORT PDF -->
                        <a href="{{ route('admin.articles.pdf') }}" class="btn btn-success">

                            <i class="bi bi-file-earmark-pdf"></i>
                            Export PDF

                        </a>



                        <!-- TAMBAH ARTIKEL -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahArtikel">

                            + Tambah Artikel

                        </button>


                    </div>

                </div>



                <div class="card shadow">

                    <div class="card-body">


                        <table class="table table-bordered table-hover">


                            <thead class="table-dark">

                                <tr>

                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Author</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>

                                </tr>

                            </thead>



                            <tbody>


                                @foreach ($articles as $article)
                                    <tr>


                                        <td>
                                            {{ $loop->iteration }}
                                        </td>



                                        <td>

                                            <img src="{{ asset('image/' . $article->foto) }}" width="100">

                                        </td>



                                        <td>
                                            {{ $article->title }}
                                        </td>



                                        <td>
                                            {{ $article->author }}
                                        </td>



                                        <td>
                                            {{ $article->publish_date }}
                                        </td>



                                        <td>


                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editArtikel{{ $article->id }}">

                                                Edit

                                            </button>




                                            <form action="{{ route('admin.articles.delete', $article->id) }}"
                                                method="POST" style="display:inline">


                                                @csrf
                                                @method('DELETE')


                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin hapus artikel?')">

                                                    Hapus

                                                </button>


                                            </form>



                                        </td>


                                    </tr>





                                    <!-- MODAL EDIT -->

                                    <div class="modal fade" id="editArtikel{{ $article->id }}">


                                        <div class="modal-dialog modal-lg">


                                            <div class="modal-content">



                                                <form action="{{ route('admin.articles.update', $article->id) }}"
                                                    method="POST" enctype="multipart/form-data">


                                                    @csrf

                                                    @method('PUT')



                                                    <div class="modal-header">

                                                        <h5 class="modal-title">
                                                            Edit Artikel
                                                        </h5>


                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal">

                                                        </button>


                                                    </div>




                                                    <div class="modal-body">



                                                        <label>Judul</label>

                                                        <input type="text" name="title" class="form-control mb-3"
                                                            value="{{ $article->title }}" required>




                                                        <label>Author</label>

                                                        <input type="text" name="author" class="form-control mb-3"
                                                            value="{{ $article->author }}" required>




                                                        <label>Tanggal</label>

                                                        <input type="date" name="publish_date"
                                                            class="form-control mb-3"
                                                            value="{{ $article->publish_date }}" required>




                                                        <label>Content</label>

                                                        <textarea name="content" class="form-control mb-3" rows="5" required>{{ $article->content }}</textarea>




                                                        <label>Foto Baru</label>

                                                        <input type="file" name="foto" class="form-control">



                                                    </div>




                                                    <div class="modal-footer">


                                                        <button class="btn btn-success">

                                                            Simpan Perubahan

                                                        </button>


                                                    </div>



                                                </form>


                                            </div>

                                        </div>

                                    </div>
                                @endforeach



                            </tbody>


                        </table>


                    </div>

                </div>





                <!-- TAMBAH ARTIKEL -->


                <div class="modal fade" id="modalTambahArtikel">


                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">



                            <form action="{{ route('admin.articles.store') }}" method="POST"
                                enctype="multipart/form-data">


                                @csrf



                                <div class="modal-header">


                                    <h5 class="modal-title">
                                        Tambah Artikel
                                    </h5>


                                    <button type="button" class="btn-close" data-bs-dismiss="modal">

                                    </button>


                                </div>




                                <div class="modal-body">



                                    <input name="title" class="form-control mb-3" placeholder="Judul" required>




                                    <input name="author" class="form-control mb-3" placeholder="Author" required>




                                    <input type="date" name="publish_date" class="form-control mb-3" required>




                                    <textarea name="content" class="form-control mb-3" placeholder="Content" rows="5" required></textarea>




                                    <input type="file" name="foto" class="form-control" required>




                                </div>



                                <div class="modal-footer">


                                    <button class="btn btn-primary">

                                        Simpan

                                    </button>


                                </div>


                            </form>


                        </div>


                    </div>


                </div>
            @elseif($page == 'services')
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2>⚙ Data Services</h2>

                    <div class="d-flex gap-2">

                        <!-- EXPORT PDF -->
                        <a href="/admin/services/pdf" target="_blank" class="btn btn-success">
                            <i class="bi bi-file-earmark-pdf"></i>
                            Export PDF
                        </a>

                        <!-- TAMBAH SERVICES -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahService">

                            + Tambah Services

                        </button>

                    </div>

                </div>

                <div class="card shadow">

                    <div class="card-body">

                        <table class="table table-bordered table-hover">

                            <thead class="table-dark">

                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Service</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($services as $service)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <img src="{{ asset('image/' . $service->foto) }}" width="100">
                                        </td>

                                        <td>{{ $service->nama }}</td>

                                        <td>{{ Str::limit($service->desc, 80) }}</td>

                                        <td>

                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editService{{ $service->id }}">

                                                Edit

                                            </button>

                                            <form action="{{ route('admin.services.delete', $service->id) }}"
                                                method="POST" style="display:inline;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin hapus service ini?')">

                                                    Hapus

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                    <!-- MODAL EDIT SERVICE -->
                                    <div class="modal fade" id="editService{{ $service->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <form action="{{ route('admin.services.update', $service->id) }}"
                                                    method="POST" enctype="multipart/form-data">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Service</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <label>Nama Service</label>
                                                            <input type="text" name="nama" class="form-control"
                                                                value="{{ $service->nama }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Deskripsi</label>
                                                            <textarea name="desc" rows="4" class="form-control" required>{{ $service->desc }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Foto Baru</label>
                                                            <input type="file" name="foto"
                                                                class="form-control">
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">
                                                            Simpan Perubahan
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- MODAL TAMBAH SERVICE -->
                <div class="modal fade" id="modalTambahService" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <form action="{{ route('admin.services.store') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label>Nama Service</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Deskripsi</label>
                                        <textarea name="desc" rows="4" class="form-control" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control" required>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            @endif
        </div>

        <!-- FOOTER -->
        <div class="footer">
            © {{ date('Y') }} CampusEvent Admin Dashboard
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
