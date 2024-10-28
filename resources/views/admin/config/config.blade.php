@extends('layouts.user_type.auth')

@section('content')
    <div class="container py-5 shadow-lg rounded">
        <form action="{{ route('config-store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="title" class="form-control"
                    @if ($config) value="{{ $config->title }}" @endif id="floatingInput"
                    placeholder="name">
                <label for="floatingInput">Judul Halaman</label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar Carousel</label>
                <div id="drop-area" class="border p-3 mb-3"
                    style="height:150px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                    <p>Seret dan lepas file di sini atau klik untuk memilih file</p>
                    <input type="file" name="carousel_images[]" id="fileElem" accept="image/*" style="display:none;"
                        multiple>
                </div>

                <!-- Kontainer untuk thumbnail -->
                <div id="thumbnail-container" style="display: flex; flex-wrap: wrap; gap: 10px;">
                    @if ($config)
                        @foreach ($config->images as $image)
                            <!-- Asumsikan ini relasi hasMany -->
                            <div class="thumbnail-wrapper" style="position: relative;">
                                <img src="{{ asset('storage/uploads/carousel_images/' . $image->filename) }}"
                                    alt="Thumbnail"
                                    style="width: 150px; height: 150px; border: 1px solid #ddd; border-radius: 5px;">
                                <span class="remove-text" onclick="removeImage('{{ $image->id }}')"
                                    style="position: absolute; top: 5px; right: 5px; cursor: pointer; color: red;">Hapus</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="no_rek" class="form-control"
                            @if ($config) value="{{ $config->no_rek }}" @endif id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Nomor Rekening / E-Wallet</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="bank" class="form-control"
                            @if ($config) value="{{ $config->bank }}" @endif id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Bank Rekening / E-Wallet</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="name_rek" class="form-control"
                            @if ($config) value="{{ $config->name_rek }}" @endif id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Nama di Rekening / E-Wallet</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Ketentuan Voting Finalis &
                    Pemesanan Tiket</label>
                <input id="tnc" type="hidden" @if ($config) value="{{ $config->tnc }}" @endif
                    name="tnc">
                <trix-editor input="tnc"></trix-editor>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
    <script>
        let dropArea = document.getElementById('drop-area');
        let fileElem = document.getElementById('fileElem');
        let thumbnailContainer = document.getElementById('thumbnail-container');
        let filesList = []; // Menyimpan file yang di-upload

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
            // Tambahkan file baru ke dalam filesList
            filesList = [...filesList, ...Array.from(files)];

            // Bersihkan thumbnail sebelumnya
            thumbnailContainer.innerHTML = '';

            // Tampilkan thumbnail baru
            filesList.forEach((file, index) => {
                if (file && file.type.startsWith('image/')) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        // Bungkus gambar dan teks remove
                        let thumbnailWrapper = document.createElement('div');
                        thumbnailWrapper.style.position = 'relative';
                        thumbnailWrapper.style.display = 'inline-block';
                        thumbnailWrapper.style.marginRight = '10px';

                        // Buat elemen gambar untuk thumbnail
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                        img.style.objectFit = 'cover';
                        img.style.borderRadius = '5px';
                        img.style.border = '1px solid #ddd';
                        thumbnailWrapper.appendChild(img);

                        // Buat teks "Remove Image"
                        let removeText = document.createElement('p');
                        removeText.innerHTML = 'Remove Image';
                        removeText.style.color = 'red';
                        removeText.style.cursor = 'pointer';
                        removeText.style.textAlign = 'center';
                        removeText.style.marginTop = '5px';

                        // Event untuk menghapus gambar dari filesList
                        removeText.addEventListener('click', () => {
                            removeImage(index);
                        });

                        thumbnailWrapper.appendChild(removeText);
                        thumbnailContainer.appendChild(thumbnailWrapper);
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Silakan pilih file gambar.');
                    fileElem.value = ''; // Reset input file
                }
            });

            // Sembunyikan drop area jika ada gambar yang diunggah
            dropArea.style.display = filesList.length > 0 ? 'none' : 'flex';
        }

        function removeImage(index) {
            // Hapus gambar dari filesList
            filesList.splice(index, 1);

            // Refresh thumbnail
            thumbnailContainer.innerHTML = '';

            // Jika ada gambar tersisa, tampilkan ulang thumbnail
            if (filesList.length > 0) {
                handleFiles([]);
            } else {
                // Jika tidak ada gambar yang tersisa, tampilkan kembali drop area
                dropArea.style.display = 'flex';
                dropArea.innerHTML = '<p>Seret dan lepas file di sini atau klik untuk memilih file</p>';
            }
        }
    </script>
@endsection
