<?php
include('layouts/header.php');
?>

<link rel="stylesheet" href="../assets/css/admin-product-list.css">

<div class="container">
    <h1>Customer</h1>

    <div class="d-grid gap-2 d-md-flex cari">
        <form class="d-flex" role="search">
            <input class="form-control me-2 rounded-4" type="search" placeholder="Search" aria-label="Search">
            <button class="btn rounded-4" style="background-color: #7B543E; color: #F5F2D4;" type="submit">Search</button>
        </form>
    </div>

    <table class="content-table rounded-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>NAME</th>
                <th>SALDO</th>
                <th>PHOTO</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>hilmy@gmail.com</td>
                <td>Hilmy</td>
                <td>120.000</td>
                <td>
                    <img src="../assets/image/donat1.png" width="60px" alt="">
                </td>
                <td>
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>addien@gmail.com</td>
                <td>Addien</td>
                <td>70.000</td>
                <td>
                    <img src="../assets/image/donat1.png" width="60px" alt="">
                </td>
                <td>
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>rei@gmail.com</td>
                <td>Reihandi</td>
                <td>210.000</td>
                <td>
                    <img src="../assets/image/donat1.png" width="60px" alt="">
                </td>
                <td>
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>nina@gmail.com</td>
                <td>Sabrina</td>
                <td>90.000</td>
                <td>
                    <img src="../assets/image/donat1.png" width="60px" alt="">
                </td>
                <td>
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
include('layouts/footer.php');
?>