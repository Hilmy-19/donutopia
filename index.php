<?php
include 'layouts/header.php';

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']);
        unset($_SESSION['cart']);
        header('location: index.php');
        exit;
    }
}

?>

<main>
    <div class="container">
        <div class="text-center">
            <img src="assets/image/tagline.png" width="1000px" style="margin-top: 200px" alt="">

            <div class="row">
                <div class="col">
                    <img src="assets/image/donat1.png" height="300px" alt="...">
                </div>
                <div class="col">
                    <img src="assets/image/donat2.png" height="300px" alt="...">
                </div>
                <div class="col">
                    <img src="assets/image/donat3.png" height="300px" alt="...">
                </div>
                <div class="col">
                    <img src="assets/image/donat1.png" height="300px" alt="...">
                </div>
                <div class="col">
                    <img src="assets/image/donat2.png" height="300px" alt="...">
                </div>
                <div class="col">
                    <img src="assets/image/donat3.png" height="300px" alt="...">
                </div>
                <div class="col">
                    <img src="assets/image/donat1.png" height="300px" alt="...">
                </div>
                <div class="col">
                    <img src="assets/image/donat2.png" height="300px" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div id="product">
        <div class="main-product">
            <div class="text-center">
                <img src="assets/image/our-product.png" width="300px" style="margin: 20px 0px 40px" alt="">
            </div>
            <div class="content-product">
                <img class="rounded-5" src="assets/image/process1.jpg" width="460px" alt="">
                <div class="product-text">
                    <h1>Dough</h1>
                    <p>We are here with premium quality donut dough specially developed for you. Made with care and using the finest ingredients, our donut dough delivers consistent results, a soft texture, and an extraordinary taste. With our donut dough, you can feel the unforgettable pleasure in every bite.</p>
                </div>
            </div>
            <div class="content-product">
                <img class="rounded-5" src="assets/image/process2.jpg" width="460px" alt="">
                <div class="product-text">
                    <h1>Fry</h1>
                    <p>With proper frying technique, our donuts turn golden brown evenly, but remain soft inside. We use efficient frying methods and control the temperature with precision to produce donuts that are crispy on the outside and delicious on the inside. In this way, we ensure every donut you serve to customers will provide a mouth-watering experience and keep them coming back for more.</p>
                </div>
            </div>
            <div class="content-product">
                <img class="rounded-5" src="assets/image/process3.jpg" width="460px" alt="">
                <div class="product-text">
                    <h1>Drain</h1>
                    <p>Carefully, we coat each donut with delicious glaze, creating a tantalizing glow and giving it an unforgettable sweet taste. From classic glazes like chocolate and caramel to unique variations like matcha and blueberry, we offer a wide variety of slurry options to suit your customer's needs and tastes. With our donut slicing you can treat your customers to beautiful, delicious donuts and be ready to keep them coming back for more.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include 'layouts/footer.php'
?>