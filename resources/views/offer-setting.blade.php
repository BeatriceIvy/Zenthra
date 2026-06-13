<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenthra Admin - Offer Settings</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #0f172a;
            --accent-color: #22d3ee;
            --neutral-color: #e5e7eb;
            --danger-color: #ef4444;
            --dark-accent: #020617;
            --primary-text-color: #ffffff;
            --secondary-text-color: #94a3b8;
            --border-radius: 8px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--neutral-color);
            color: var(--secondary-color);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: var(--secondary-color);
            color: var(--primary-text-color);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar h2 {
            font-size: 20px;
            font-weight: 700;
            color: var(--accent-color);
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .sidebar-menu a {
            color: var(--secondary-text-color);
            text-decoration: none;
            padding: 10px 14px;
            border-radius: var(--border-radius);
            display: block;
            font-weight: 500;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: var(--primary-color);
            color: var(--primary-text-color);
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            padding: 40px;
            background-color: #f8fafc;
            overflow-y: auto;
        }

        .header-section {
            margin-bottom: 30px;
        }

        .header-section h1 {
            font-size: 26px;
            color: var(--secondary-color);
        }

        .header-section p {
            color: var(--secondary-text-color);
            font-size: 14px;
            margin-top: 4px;
        }

        /* Alerts */
        .alert {
            padding: 14px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 24px;
            font-weight: 500;
            font-size: 14px;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fca5a5;
        }

        /* Dashboard Grid Layout */
        .dashboard-grid {
            display: flex;
            gap: 24px;
            align-items: flex-start;
        }

        .col-form {
            flex: 1.2;
            background: #ffffff;
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .col-preview {
            flex: 1;
            background: #ffffff;
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .panel-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--secondary-color);
            border-bottom: 2px solid var(--neutral-color);
            padding-bottom: 10px;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--secondary-color);
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: var(--border-radius);
            font-size: 14px;
            color: var(--secondary-color);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .error-feedback {
            color: var(--danger-color);
            font-size: 12px;
            margin-top: 5px;
            font-weight: 500;
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: var(--primary-text-color);
            padding: 12px 24px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            width: 100%;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #1d4ed8;
        }

        /* Preview Card Layout */
        .preview-card {
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            overflow: hidden;
            background: #ffffff;
        }

        .preview-img-container {
            width: 100%;
            height: 220px;
            background-color: var(--neutral-color);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .preview-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-placeholder {
            color: var(--secondary-text-color);
            font-size: 14px;
            text-align: center;
            padding: 20px;
        }

        .preview-body {
            padding: 20px;
        }

        .preview-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .preview-desc {
            font-size: 14px;
            color: #64748b;
            line-height: 1.5;
        }

        .badge-active {
            position: absolute;
            top: 12px;
            right: 12px;
            background-color: #22c55e;
            color: #ffffff;
            padding: 4px 10px;
            font-size: 11px;
            font-weight: 700;
            border-radius: 50px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>ZENTHRA Admin</h2>
        <ul class="sidebar-menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#" class="active">Offer Settings</a></li>
            <li><a href="#">Manage Products</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Transactions</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-section">
            <h1>Offer Banner Settings</h1>
            <p>Kelola banner promo toko utama yang tampil pada halaman depan pelanggan.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div id="js-alert-container"></div>

        <div class="dashboard-grid">
            
            <div class="col-form">
                <div class="panel-title">Upload New Offer</div>
                
                <form action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data" id="offerForm">
                    @csrf
                    
                    <div class="form-group">
                        <label for="title">Judul Banner <span style="color: var(--danger-color)">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" 
                               placeholder="Contoh: Diskon Flash Sale Akhir Bulan!" 
                               required minlength="5" maxlength="255" value="{{ old('title') }}">
                        @error('title')
                            <div class="error-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi Promosi <span style="color: var(--danger-color)">*</span></label>
                        <textarea name="description" id="description" class="form-control" 
                                  placeholder="Tuliskan detail promosi atau keuntungan di sini..." 
                                  required minlength="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="error-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">File Gambar Banner <span style="color: var(--danger-color)">*</span></label>
                        <input type="file" name="image" id="image" class="form-control" 
                               accept="image/jpeg, image/png, image/jpg" required>
                        <p style="font-size: 11px; color: var(--secondary-text-color); margin-top: 4px;">
                            Format resmi: JPG, JPEG, PNG. Ukuran file maksimal: 2 MB.
                        </p>
                        @error('image')
                            <div class="error-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-submit">Simpan & Publikasikan</button>
                </form>
            </div>

            <div class="col-preview">
                <div class="panel-title">Live Preview / Current Active Banner</div>
                
                <div class="preview-card">
                    <div class="preview-img-container" id="previewContainer">
                        @if($currentOffer && $currentOffer->image)
                            <span class="badge-active">Aktif di Web</span>
                            <img src="{{ asset('assets/image/' . $currentOffer->image) }}" id="previewImg" alt="Banner Aktif">
                        @else
                            <div class="preview-placeholder" id="placeholderText">
                                📷 Belum ada file gambar dipilih / aktif
                            </div>
                            <img src="" id="previewImg" alt="Live Preview" style="display: none;">
                        @endif
                    </div>
                    <div class="preview-body">
                        <div class="preview-title" id="previewTitle">
                            {{ $currentOffer ? $currentOffer->title : 'Judul Promosi Akan Muncul Di Sini' }}
                        </div>
                        <div class="preview-desc" id="previewDesc">
                            {{ $currentOffer ? $currentOffer->description : 'Detail deskripsi penawaran spesial toko kamu akan disimulasikan secara realtime di area box teks ini.' }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleInput = document.getElementById('title');
            const descInput = document.getElementById('description');
            const imageInput = document.getElementById('image');
            
            const previewTitle = document.getElementById('previewTitle');
            const previewDesc = document.getElementById('previewDesc');
            const previewImg = document.getElementById('previewImg');
            const placeholderText = document.getElementById('placeholderText');
            const jsAlertContainer = document.getElementById('js-alert-container');

            // 1. Live Text Sync Preview
            titleInput.addEventListener('input', function() {
                previewTitle.textContent = this.value.trim() !== "" ? this.value : "Judul Promosi Akan Muncul Di Sini";
            });

            descInput.addEventListener('input', function() {
                previewDesc.textContent = this.value.trim() !== "" ? this.value : "Detail deskripsi penawaran spesial toko kamu akan disimulasikan secara realtime di area box teks ini.";
            });

            // 2. Client-Side Image Validation & Instant Preview
            imageInput.addEventListener('change', function() {
                jsAlertContainer.innerHTML = ''; // Reset alert internal
                const file = this.files[0];

                if (file) {
                    // Validasi ukuran file (2MB = 2 * 1024 * 1024 bytes)
                    const maxSize = 2 * 1024 * 1024;
                    if (file.size > maxSize) {
                        // Tampilkan pesan error di sisi UI
                        jsAlertContainer.innerHTML = `
                            <div class="alert alert-danger">
                                <strong>Gagal Unggah!</strong> Ukuran file gambar melebihi batas 2 Megabytes (MB). Silakan kompres terlebih dahulu.
                            </div>
                        `;
                        this.value = ''; // Reset input file
                        return;
                    }

                    // Tampilkan Live Preview Gambar menggunakan FileReader API
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                        if (placeholderText) {
                            placeholderText.style.display = 'none';
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>




Gemini adalah AI dan dapat melakukan kesalahan.

@doctype html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenthra Admin - Offer Settings</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #0f172a;
            --accent-color: #22d3ee;
            --neutral-color: #e5e7eb;
            --danger-color: #ef4444;
            --dark-accent: #020617;
            --primary-text-color: #ffffff;
            --secondary-text-color: #94a3b8;
            --border-radius: 8px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--neutral-color);
            color: var(--secondary-color);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: var(--secondary-color);
            color: var(--primary-text-color);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar h2 {
            font-size: 20px;
            font-weight: 700;
            color: var(--accent-color);
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .sidebar-menu a {
            color: var(--secondary-text-color);
            text-decoration: none;
            padding: 10px 14px;
            border-radius: var(--border-radius);
            display: block;
            font-weight: 500;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: var(--primary-color);
            color: var(--primary-text-color);
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            padding: 40px;
            background-color: #f8fafc;
            overflow-y: auto;
        }

        .header-section {
            margin-bottom: 30px;
        }

        .header-section h1 {
            font-size: 26px;
            color: var(--secondary-color);
        }

        .header-section p {
            color: var(--secondary-text-color);
            font-size: 14px;
            margin-top: 4px;
        }

        /* Alerts */
        .alert {
            padding: 14px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 24px;
            font-weight: 500;
            font-size: 14px;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fca5a5;
        }

        /* Dashboard Grid Layout */
        .dashboard-grid {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-collapse: separate;
            border-spacing: 24px 0;
            margin-left: -24px;
        }

        .col-form, .col-preview {
            display: table-cell;
            vertical-align: top;
            background: #ffffff;
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        .panel-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--secondary-color);
            border-bottom: 2px solid var(--neutral-color);
            padding-bottom: 10px;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--secondary-color);
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: var(--border-radius);
            font-size: 14px;
            color: var(--secondary-color);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .error-feedback {
            color: var(--danger-color);
            font-size: 12px;
            margin-top: 5px;
            font-weight: 500;
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: var(--primary-text-color);
            padding: 12px 24px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            width: 100%;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #1d4ed8;
        }

        /* Preview Card Layout */
        .preview-card {
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            overflow: hidden;
            background: #ffffff;
        }

        .preview-img-container {
            width: 100%;
            height: 200px;
            background-color: var(--neutral-color);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .preview-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-placeholder {
            color: var(--secondary-text-color);
            font-size: 14px;
            text-align: center;
            padding: 20px;
        }

        .preview-body {
            padding: 20px;
        }

        .preview-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .preview-desc {
            font-size: 14px;
            color: #64748b;
            line-height: 1.5;
        }

        .badge-active {
            position: absolute;
            top: 12px;
            right: 12px;
            background-color: #22c55e;
            color: #ffffff;
            padding: 4px 10px;
            font-size: 11px;
            font-weight: 700;
            border-radius: 50px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>ZENTHRA Admin</h2>
        <ul class="sidebar-menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#" class="active">Offer Settings</a></li>
            <li><a href="#">Manage Products</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Transactions</a></li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="header-section">
            <h1>Offer Banner Settings</h1>
            <p>Kelola banner promo toko utama yang tampil pada halaman depan pelanggan.</p>
        </div>

        <!-- Alert Session Server Laravel -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div id="js-alert-container"></div>

        <!-- Content Grid Grid Layout (Table Hack For Standalone CSS Compatibility) -->
        <div class="dashboard-grid">
            
            <!-- Column 1: Form Input -->
            <div class="col-form">
                <div class="panel-title">Upload New Offer</div>
                
                <form action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data" id="offerForm">
                    @csrf
                    
                    <!-- Input Title -->
                    <div class="form-group">
                        <label for="title">Judul Banner <span style="color: var(--danger-color)">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" 
                               placeholder="Contoh: Diskon Flash Sale Akhir Bulan!" 
                               required minlength="5" maxlength="255" value="{{ old('title') }}">
                        @error('title')
                            <div class="error-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi Promosi <span style="color: var(--danger-color)">*</span></label>
                        <textarea name="description" id="description" class="form-control" 
                                  placeholder="Tuliskan detail promosi atau keuntungan di sini..." 
                                  required minlength="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="error-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input File Image -->
                    <div class="form-group">
                        <label for="image">File Gambar Banner <span style="color: var(--danger-color)">*</span></label>
                        <input type="file" name="image" id="image" class="form-control" 
                               accept="image/jpeg, image/png, image/jpg" required>
                        <p style="font-size: 11px; color: var(--secondary-text-color); margin-top: 4px;">
                            Format resmi: JPG, JPEG, PNG. Ukuran file maksimal: 2 MB.
                        </p>
                        @error('image')
                            <div class="error-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-submit">Simpan & Publikasikan</button>
                </form>
            </div>

            <!-- Column 2: Live Preview & Current Banner Status -->
            <div class="col-preview">
                <div class="panel-title">Live Preview / Current Active Banner</div>
                
                <div class="preview-card">
                    <div class="preview-img-container" id="previewContainer">
                        @if($currentOffer && $currentOffer->image)
                            <span class="badge-active">Aktif di Web</span>
                            <img src="{{ asset('assets/image/' . $currentOffer->image) }}" id="previewImg" alt="Banner Aktif">
                        @else
                            <div class="preview-placeholder" id="placeholderText">
                                📷 Belum ada file gambar dipilih / aktif
                            </div>
                            <img src="" id="previewImg" alt="Live Preview" style="display: none;">
                        @endif
                    </div>
                    <div class="preview-body">
                        <div class="preview-title" id="previewTitle">
                            {{ $currentOffer ? $currentOffer->title : 'Judul Promosi Akan Muncul Di Sini' }}
                        </div>
                        <div class="preview-desc" id="previewDesc">
                            {{ $currentOffer ? $currentOffer->description : 'Detail deskripsi penawaran spesial toko kamu akan disimulasikan secara realtime di area box teks ini.' }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Frontend JavaScript Validation & Instant Live Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleInput = document.getElementById('title');
            const descInput = document.getElementById('description');
            const imageInput = document.getElementById('image');
            
            const previewTitle = document.getElementById('previewTitle');
            const previewDesc = document.getElementById('previewDesc');
            const previewImg = document.getElementById('previewImg');
            const placeholderText = document.getElementById('placeholderText');
            const jsAlertContainer = document.getElementById('js-alert-container');

            // 1. Live Text Sync Preview
            titleInput.addEventListener('input', function() {
                previewTitle.textContent = this.value.trim() !== "" ? this.value : "Judul Promosi Akan Muncul Di Sini";
            });

            descInput.addEventListener('input', function() {
                previewDesc.textContent = this.value.trim() !== "" ? this.value : "Detail deskripsi penawaran spesial toko kamu akan disimulasikan secara realtime di area box teks ini.";
            });

            // 2. Client-Side Image Validation & Instant Preview
            imageInput.addEventListener('change', function() {
                jsAlertContainer.innerHTML = ''; // Reset alert internal
                const file = this.files[0];

                if (file) {
                    // Validasi ukuran file (2MB = 2 * 1024 * 1024 bytes)
                    const maxSize = 2 * 1024 * 1024;
                    if (file.size > maxSize) {
                        // Tampilkan pesan error di sisi UI
                        jsAlertContainer.innerHTML = `
                            <div class="alert alert-danger">
                                <strong>Gagal Unggah!</strong> Ukuran file gambar melebihi batas 2 Megabytes (MB). Silakan kompres terlebih dahulu.
                            </div>
                        `;
                        this.value = ''; // Reset input file
                        return;
                    }

                    // Tampilkan Live Preview Gambar menggunakan FileReader API
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                        if (placeholderText) {
                            placeholderText.style.display = 'none';
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>