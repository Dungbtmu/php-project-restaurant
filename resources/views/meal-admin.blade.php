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
            <link rel="stylesheet" href="{{ asset('css/meal-admin.css') }}">
    </head>

    <body>
        @extends('dashboard')
        @section('content')
        <div class="header-category">
            <h1>Gallery</h1>
            <div class="btn-group">
                <button id="addCategoryBtn">Add meal</button>
            </div>
        </div>

        <!-- Add  Category Popup -->
        <div class="popup-overlay" id="addCategoryPopup">
            <div class="popup-content">
                <h3>Add Gallery</h3>
                <form id="addCategoryForm" method="POST" action="{{ route('meal.save') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <label for="meal-name">Meal Name</label>
                        <select class="form-control" id="meal-name" name="meal_name" required>
                            <option value="lunch">Lunch</option>
                            <option value="regular">Regular</option>
                            <option value="dinner">Dinner</option>
                            <option value="beverage">Beverage</option>
                            <option value="dessert">Dessert</option>
                            <option value="snack">Snack</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="item">Item</label>
                        <input type="text" class="form-control" id="item" name="item" required>
                    </div>
                    <button type="submit" id="addCategoryBtn" class="add-button">Add Category</button>
                </form>
            </div>
        </div>

        <div class="container-wallpaper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="name">Meal</th>
                            <th class="item">Item</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meal as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td class="name" data-id="{{ $item->id }}">
                                <div class="name-wrapper">{{ $item->meal_name}}</div>
                            </td>
                            <td class="price" data-id="{{ $item->id }}" style="padding:0px 20px;">
                                {{ $item->gallery_id}}</td>
                            <td class="actions-btn">
                                <button id="edit-gallery-btn" data-id="{{ $item->id }}" class="edit-gallery-btn">
                                    <i class="fa-solid fa-pen-to-square"
                                        style="display: flex; justify-content: center;">
                                    </i>
                                </button>
                                <form action="{{ route('meal.delete', ['id' => $item ->id]) }}" method="POST">
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

            <!-- Update popup -->
            <div class="popup-overlay" id="updatemealPopup">
                <div class="popup-content">
                    <h2>Update meal</h2>
                    <form id="editmealForm" action="{{ route('meal.update', ['id' => ':meal_id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="meal_id" name="meal_id" value="">
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

            @endsection
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script>
            document.addEventListener('DOMContentLoaded', () => {
                const editmealButtons = document.querySelectorAll('.edit-meal-btn');
                const closeOverlayButton = document.querySelector('.close-overlay-button');
                const updatemealPopup = document.getElementById('updatemealPopup');
                const mealIdInput = document.getElementById('meal_id');
                const itemInput = document.getElementById('item');
                const priceInput = document.getElementById('price');
                const descriptionInput = document.getElementById('description');

                updatemealPopup.addEventListener('click', () => {
                    popupOverlay.style.display = 'none';
                });

                editmealButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const row = button.parentNode.parentNode;
                        const mealId = button.getAttribute('data-id');
                        console.log(mealId);
                        updatemealPopup.style.display = 'block';
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