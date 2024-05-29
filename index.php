<?php include "./connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antique Bakery Cafe HTML Template by Tooplate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&family=Oswald:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css"> <!-- fontawesome -->
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/tailwind.css">
    <link rel="stylesheet" href="css/tooplate-antique-cafe.css">

    <!--

Tooplate 2126 Antique Cafe

https://www.tooplate.com/view/2126-antique-cafe

-->
</head>

<body>
    <!-- Intro -->
    <div id="intro" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-01.jpg">
        <nav id="tm-nav" class="fixed w-full">
            <div class="tm-container mx-auto px-2 md:py-6 text-right">
                <button class="md:hidden py-2 px-2" id="menu-toggle"><i
                        class="fas fa-2x fa-bars tm-text-gold"></i></button>

                <div class="flex justify-between items-center">
                    <img src="./ceren_logo.jpg" alt="logo" style="height: 120px; border-radius: 50%;" />
                    <ul class="mb-3 md:mb-0 text-2xl font-normal flex justify-end flex-col md:flex-row items-center">
                        <li class="inline-block mb-4 mx-4">
                            <a href="#intro" class="tm-text-gold py-1 md:py-3 px-4">Anasayfa</a>
                        </li>
                        <li class="inline-block mb-4 mx-4">
                            <a href="#menu" class="tm-text-gold py-1 md:py-3 px-4">Menü</a>
                        </li>
                        <li class="inline-block mb-4 mx-4">
                            <a href="#about" class="tm-text-gold py-1 md:py-3 px-4">Hakkında</a>
                        </li>
                        <li class="inline-block mb-4 mx-4">
                            <a href="#contact" class="tm-text-gold py-1 md:py-3 px-4">İletişim</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="container mx-auto px-2 tm-intro-width">
            <div class="sm:pb-60 sm:pt-48 py-20">
                <div class="bg-black bg-opacity-70 p-12 mb-5 text-center">
                    <h1 class="text-white text-5xl tm-logo-font mb-5">Ceren Cafe</h1>
                    <p class="tm-text-gold tm-text-2xl">günlük enerji̇ takvi̇yeni̇z</p>
                </div>

                <div class="text-center">
                    <div class="inline-block">
                        <a href="#menu"
                            class="flex justify-center items-center bg-black bg-opacity-70 py-6 px-8 rounded-lg font-semibold tm-text-2xl tm-text-gold hover:text-gray-200 transition">
                            <i class="fas fa-coffee mr-3"></i>
                            <span>Hadi keşfedelim...</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cafe Menu -->
    <div id="menu" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-02.jpg">
        <div class="container mx-auto tm-container py-24 sm:py-48">
            <div class="text-center mb-16">
                <h2 class="bg-white tm-text-brown py-6 px-12 text-4xl font-medium inline-block rounded-md">Kafe Menümüz
                </h2>
            </div>
            <div class="flex flex-col lg:flex-row justify-around items-center">
                <!-- Sıcak içecekler -->
                <div class="flex-1 m-5 rounded-xl px-4 py-6 sm:px-8 sm:py-10 tm-bg-brown tm-item-container">

                    <?php
                    include 'connect.php';

                    // Ürünleri ve tür isimlerini almak için sorgular
                    $ürün_query = "SELECT u.id AS ürün_id, u.urun_ismi, u.urun_resmi, u.urun_fiyat, u.urun_aciklama, t.tur_ismi 
                    FROM `ürün` u 
                    JOIN `ürün_türü` t ON u.urun_turu_id = t.id 
                    WHERE u.urun_turu_id = 1 
                    ORDER BY u.id";

                    $result = $conn->query($ürün_query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="flex items-start mb-6 tm-menu-item">';
                            echo '    <img src="' . $row["urun_resmi"] . '" alt="Image" class="rounded-md h-10" style="height: 120px; width:160px">';
                            echo '    <div class="ml-3 sm:ml-6">';
                            echo '        <h3 class="text-lg sm:text-xl mb-2 sm:mb-3 tm-text-yellow">' . $row["urun_ismi"] . '</h3>';
                            echo '        <div class="text-white text-md sm:text-lg font-light mb-1">' . $row["urun_aciklama"] . '</div>';
                            echo '        <div class="text-white text-md sm:text-lg font-light mb-1">Fiyat: ' . $row["urun_fiyat"] . ' TL</div>';
                            echo '        <div class="text-white text-md sm:text-lg font-light">Tür: ' . $row["tur_ismi"] . '</div>';
                            echo '    </div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<span class='text-white'> Herhangi bir içeçcek bulunmamaktadır </span>";
                    }

                    $conn->close();
                    ?>






                </div>
                <!-- Soğuk içecekler -->

                <div class="flex-1 m-5 rounded-xl px-4 py-6 sm:px-8 sm:py-10 tm-bg-brown tm-item-container">

                    <?php
                    include 'connect.php';

                    // Ürün türü 2 olan ürünleri ve tür isimlerini almak için sorgu
                    $ürün_query = "SELECT u.id AS ürün_id, u.urun_ismi, u.urun_resmi, u.urun_fiyat, u.urun_aciklama, t.tur_ismi 
               FROM `ürün` u 
               JOIN `ürün_türü` t ON u.urun_turu_id = t.id 
               WHERE u.urun_turu_id = 2 
               ORDER BY u.id";

                    $result = $conn->query($ürün_query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="flex items-start justify-end mb-6 tm-menu-item-2">';
                            echo '    <div class="text-right mr-6">';
                            echo '        <h3 class="text-lg sm:text-xl mb-2 sm:mb-3 tm-text-yellow">' . $row["urun_ismi"] . '</h3>';
                            echo '        <div class="text-white text-md sm:text-lg font-light mb-1">' . $row["urun_aciklama"] . '</div>';
                            echo '        <div class="text-white text-md sm:text-lg font-light mb-1">Fiyat: ' . $row["urun_fiyat"] . ' TL</div>';
                            echo '        <div class="text-white text-md sm:text-lg font-light">Tür: ' . $row["tur_ismi"] . '</div>';
                            echo '    </div>';
                            echo '    <img src="' . $row["urun_resmi"] . '" alt="Image" class="rounded-md">';
                            echo '</div>';
                        }
                    } else {
                        echo "<span class='text-white'> Herhangi bir içeçcek bulunmamaktadır </span>";
                    }

                    $conn->close();
                    ?>


                </div>

            </div>
        </div>
    </div>
    <div id="about" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-03.jpg">
        <div class="container mx-auto tm-container py-24 sm:py-48">
            <div class="tm-item-container sm:ml-auto sm:mr-12 mx-auto sm:px-0 px-4">
                <div class="bg-white bg-opacity-80 p-12 pb-14 rounded-xl mb-5">
                    <h2 class="mb-6 tm-text-green text-4xl font-medium">Kafemiz hakkında</h2>
                    <p class="mb-6 text-base leading-8">
                        Bizimle geçirdiğiniz her anı daha özel kılmak için buradayız. Cafe Ceren, sıcak bir ortamda
                        taze kahve ve lezzetli yiyecekler sunarak misafirlerimizin her zaman mutlu ve memnun
                        ayrılmalarını sağlamayı amaçlamaktadır.
                    </p>

                </div>
                <a href="#contact"
                    class="inline-block tm-bg-green transition text-white text-xl pt-3 pb-4 px-8 rounded-md">
                    <i class="far fa-comments mr-4"></i>
                    İletişim
                </a>
            </div>
        </div>
    </div>
    <div id="contact" class="parallax-window relative" data-parallax="scroll"
        data-image-src="img/antique-cafe-bg-04.jpg">
        <div class="container mx-auto tm-container pt-24 pb-48 sm:py-48">
            <div class="flex flex-col lg:flex-row justify-around items-center lg:items-stretch">
                <div class="flex-1 rounded-xl px-10 py-12 m-5 bg-white bg-opacity-80 tm-item-container">
                    <h2 class="text-3xl mb-6 tm-text-green">Bize Ulaşın</h2>
                    <p class="mb-6 text-lg leading-8">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3103.486475157024!2d34.570457999999995!3d38.9357134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152a81837e93fe9d%3A0x6f0a1d652758161e!2sHac%C4%B1bekta%C5%9F%20Teknik%20Bilimler%20Meslek%20Y%C3%BCksekokulu!5e0!3m2!1str!2str!4v1716835603694!5m2!1str!2str"
                            style="border:0;" allowfullscreen="" loading="lazy" class="w-full h-full"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </p>
                    <p class="mb-10 text-lg">
                        <span class="block mb-2">Tel: <a href="tel:0100200340"
                                class="hover:text-yellow-600 transition">03844413432</a></span>
                        <span class="block">Email: <a href="mailto:info@company.com"
                                class="hover:text-yellow-600 transition">ceren@gmail.com</a></span>
                    </p>
                    <div class="text-center">
                        <a href="https://maps.app.goo.gl/MCFPXwB9fxEFGSnf6"
                            class="inline-block text-white text-2xl pl-10 pr-12 py-6 rounded-lg transition tm-bg-green">
                            <i class="fas fa-map-marked-alt mr-8"></i>
                            Haritada Göster
                        </a>
                    </div>
                </div>
                <div class="flex-1 rounded-xl p-12 pb-14 m-5 bg-black bg-opacity-50 tm-item-container">
                    <form action="" method="POST" class="text-lg">
                        <input type="text" name="name"
                            class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold"
                            placeholder="isim" required="" />
                        <input type="email" name="email"
                            class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold"
                            placeholder="Email" required="" />
                        <textarea rows="6" name="message"
                            class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold"
                            placeholder="Mesajınız..." required=""></textarea>
                        <div class="text-right">
                            <button type="submit" class="text-white hover:text-yellow-500 transition">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script>

        function checkAndShowHideMenu() {
            if (window.innerWidth < 768) {
                $('#tm-nav ul').addClass('hidden');
            } else {
                $('#tm-nav ul').removeClass('hidden');
            }
        }

        $(function () {
            var tmNav = $('#tm-nav');
            tmNav.singlePageNav();

            checkAndShowHideMenu();
            window.addEventListener('resize', checkAndShowHideMenu);

            $('#menu-toggle').click(function () {
                $('#tm-nav ul').toggleClass('hidden');
            });

            $('#tm-nav ul li').click(function () {
                if (window.innerWidth < 768) {
                    $('#tm-nav ul').addClass('hidden');
                }
            });

            $(document).scroll(function () {
                var distanceFromTop = $(document).scrollTop();

                if (distanceFromTop > 100) {
                    tmNav.addClass('scroll');
                } else {
                    tmNav.removeClass('scroll');
                }
            });

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>

</html>