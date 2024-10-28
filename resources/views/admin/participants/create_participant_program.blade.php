@extends('layouts.user_type.auth')
@section('content')
    <div class="container py-5 shadow-lg rounded">
        <form action="{{ route('store-participant', $program->id) }}" method="POST" enctype='multipart/form-data'
            id="main-form">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name">
                <label for="floatingInput">Nama Peserta</label>
            </div>
            <div class="row g-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="pob" class="form-control" id="floatingInput" placeholder="name">
                        <label for="floatingInput">Tempat Lahir Peserta</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="dob" class="form-control" id="floatingInput" placeholder="name">
                        <label for="floatingInput">Tanggal Lahir</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="origin" class="form-control" id="floatingInput" placeholder="Origin">
                <label for="floatingInput">Daerah Perwakilan</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Tentang Peserta</label>
            </div>

            <div class="mb-3" style="width:250px;height:250px;">
                <label for="formFile" class="form-label">Unggah Foto Peserta</label>
                <div id="drop-area" class="border p-3 mb-3"
                    style="height: 200px;width:200px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                    <p>Seret dan lepas file di sini atau klik untuk memilih file</p>
                    <input type="file" name="photo" id="fileElem" accept="image/*" style="display:none;">
                </div>
                <img id="thumbnail" src="" alt="Thumbnail"
                    style="display:none; width:200px;height:200px; margin-top: 10px; border: 1px solid #ddd; border-radius: 5px;">
                {{-- <p id="file-info" class="text-muted"></p> --}}
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>

    <script>
        let dropArea = document.getElementById('drop-area');
        let fileElem = document.getElementById('fileElem');

        let thumbnail = document.getElementById('thumbnail');

        dropArea.addEventListener('click', () => {
            fileElem.click();
        });

        fileElem.addEventListener('change', (event) => {
            handleFiles(event.target.files);
        });

        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.classList.add('highlight');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('highlight');
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.classList.remove('highlight');
            handleFiles(event.dataTransfer.files);
        });

        function handleFiles(files) {
            if (files.length > 0) {
                let file = files[0];
                if (file && file.type.startsWith('image/')) {

                    // Menampilkan thumbnail
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        thumbnail.src = e.target.result; // Menetapkan sumber gambar thumbnail
                        thumbnail.style.display = 'block'; // Menampilkan thumbnail
                        dropArea.style.display = 'none'; // Menyembunyikan drop zone setelah upload
                    }
                    reader.readAsDataURL(file); // Membaca file sebagai URL data
                } else {
                    alert('Silakan pilih file gambar.');
                    fileElem.value = ''; // Reset input file
                    thumbnail.style.display = 'none'; // Menyembunyikan thumbnail jika bukan gambar
                }
            }
        }
    </script>

    <style>
        /* Gaya tambahan untuk drop area */
        #drop-area {
            border: 2px dashed #007bff;
            /* Ganti warna border untuk menunjukkan area drop */
            background-color: #f9f9f9;
            /* Latar belakang area drop */
            transition: background-color 0.3s ease;
            /* Efek transisi saat hover */
        }

        #drop-area.highlight {
            background-color: #e7f1ff;
            /* Warna latar belakang saat drag over */
        }
    </style>
@endsection
