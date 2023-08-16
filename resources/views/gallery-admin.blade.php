<!DOCTYPE html>
<htm llang="en">

    <head>
        <eta charset="UF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>gallery</title>
            <ink rel="styleshet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
                integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="{{ asset('css/gallery-admin.css') }}">
    </head>

    <body>
        @extends('dashboard')
        @section('content')
        <div class="header-category">
            <h1>Gallery</h1>
            <div class="btn-group">
                <button id="addCategoryBtn">Add gallery</button>
            </div>
        </div>

        <!-- Add  Category Popup -->
        <div class="popup-overlay" id="addCategoryPopup">
            <div class="popup-content">
                <h3>Add Gallery</h3>
                <form id="addCategoryForm" method="POST" action="{{ route('gallery.save') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-row">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" required>
                    </div>
                    <div class="form-row">
                        <label for="description">description:</label>
                        <textarea type="text" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-row">
                        <label for="path">Image:</label>
                        <input type="file" name="path" id="path" class="form-input" required>
                    </div>
                    <button type="submit" id="addCategoryBtn" class="add-button">Add Category</button>
                </form>
            </div>
        </div>

        <!-- Update Gallery -->
        <div class="popup-overlay" id="updateGalleryPopup">
            <div class="popup-content">
                <h2>Update Gallery</h2>
                <form id="editGalleryForm" action="{{ route('gallery.update', ['id' => ':gallery_id']) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="gallery_id" name="gallery_id" value="">
                    <div class="form-row">
                        <label for="item">Item:</label>
                        <input type="text" id="item" name="item">
                    </div>

                    <div class="form-row">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price">
                    </div>

                    <div class="form-row">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description">
                    </div>

                    <button type="submit" id="save-button" class="save-button">Save</button>
                    <button type="button" class="close-overlay-button">x</button>
                </form>
            </div>
        </div>

        <div class="container-wallpaper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Preview</th>
                            <th class="item">Name</th>
                            <th class="price">Price</th>
                            <th class="description">Description</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <img src="{{ asset( $item->path) }}" alt="Thumbnail" style="height:90px; width:90px">
                            </td>
                            <td class="filename" data-id="{{ $item->id }}">
                                <div class="name-wrapper">{{ $item->item}}</div>
                            </td>
                            <td class="price" data-id="{{ $item->id }}" style="padding:0px 20px;">
                                {{ $item->price}}</td>
                            <td class="description" data-id="{{ $item->id }}">{{ $item->description }}</td>
                            <td class="actions-btn">
                                <button id="edit-gallery-btn" data-id="{{ $item->id }}" class="edit-gallery-btn">
                                    <i class="fa-solid fa-pen-to-square"
                                        style="display: flex; justify-content: center;">
                                    </i>
                                </button>
                                <form action="{{ route('gallery.delete', ['id' => $item ->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure to delete?')"
                                        style="border: none;background: #fff;display:flex;">
                                        <i class="fa-solid fa-circle-minus"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            @endsection
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script>
            document.addEventListener('DOMContentLoaded', () => {
                const editGalleryButtons = document.querySelectorAll('.edit-gallery-btn');
                const closeOverlayButton = document.querySelector('.close-overlay-button');
                const updateGalleryPopup = document.getElementById('updateGalleryPopup');
                const galleryIdInput = document.getElementById('gallery_id');
                const itemInput = document.getElementById('item');
                const priceInput = document.getElementById('price');
                const descriptionInput = document.getElementById('description');

                updateGalleryPopup.addEventListener('click', () => {
                    popupOverlay.style.display = 'none';
                });

                editGalleryButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const row = button.parentNode.parentNode;
                        const galleryId = button.getAttribute('data-id');
                        console.log(galleryId);
                        updateGalleryPopup.style.display = 'block';
                    });
                });
            });
            </script>
            <script src="{{ asset('js/gallery-admin.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
            </script>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>

    </html>