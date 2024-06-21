<?php
require_once "./api/db.php";
session_start();
ob_start();


?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="./public/styles.css">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="./css/alertify.css">

</head>

<body>
    <?php
    require "./components/header.php";

    ?>

    <div class="welcomepagecontent px-6 md:px-36 mt-28 flex flex-col gap-4">
        <h3 class="text-xs font-semibold text-red-700 apptitleone">
            LİNK KISALTMA UYGULAMASI
        </h3>
        <h2 class="text-3xl font-extrabold italic text-gray-700">Uzun ve çirkin bağlantılardan <br> sıkıldınız mı?</h2>
        <p class="text-sm italic">Hizmetimiz sayesinde artık linklerinizi daha kaliteli, anlamlı ve anlaşılır olarak
            paylaşabileceksiniz </p>

        <div class="basicform">
            <form id="basiclinkform" action="">
                <div class="max-w-xl gap-3 flex items-center">
                    <input type="text" id="quicklinkshortinput"
                        class="py-3 outline-red-600 px-4 block w-full border-red-700 border-2 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Bağlantıyı yapıştırın">
                    <button type="submit"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
                        KISALT
                    </button>
                </div>
                <div id="resultshortlink" class="resultshortlink p-3 max-w-xl">
                </div>
                <p class="text-xs font-semibold text-gray-500 mt-2">Kısalt tuşuna tıkladığınızda <span
                        class="text-red-300">kullanım</span class="text-red-300"> ve <span
                        class="text-red-300">gizlilik</span> sözleşmelerini kabul etmiş sayılırsınız</p>
            </form>
        </div>

        <div class="mt-32 flex flex-col md:flex-row" id="nedenbiz">
            <div class="md:w-1/2 w-full"><img src="./assets/whyus.svg" alt="whyus" class="md:w-3/4"></div>
            <div class="flex-1">
                <h3 class="text-red-700 font-semibold mb-2">Ücretsiz deneyin</h3>
                <h2 class="text-2xl font-bold apptitleone">NEDEN BİZ ?</h2>
                <p>Hizmetlerimizi siz değerli üyelerimize ücretsiz sunuyoruz ve kesinlikle reklam göstermek gibi can
                    sıkıcı şeylere sahip değiliz. Kullanımı rahat ve kolay arayüzü ile tüm bağlantılarınızı hızlı bir
                    şekilde kısaltıyoruz </p>
            </div>
        </div>

        <div class="mt-32 flex flex-col md:flex-row " id="ozelliklerimiz">
            <div class="flex-1">
                <h3 class="text-red-700 font-semibold mb-2">Reklam yok</h3>
                <h2 class="text-2xl font-bold apptitleone">ÖZELLİKLERİMİZ ?</h2>
                <p>Diğer can sıkıcı siteler gibi sizlere reklam yada popup göstermiyoruz böylece daha kullanışlı bir
                    arayüz sunuyoruz.<br>
                    Oturum açmanıza yada üyelik satın almanıza gerek yok sadece bağlantınızı yapıştırın ve kısaltın<br>
                    Limit yok dilediğiniz kadar bağlantıyı kısaltabilirsiniz.<br>
                    Her zaman ücretsiz ve bedava kalacak. </p>
            </div>
            <div class="md:w-1/2 w-full"><img src="./assets/whyus.svg" alt="whyus" class="md:w-3/4"></div>
        </div>
        <div class="sssquestions mt-32" id="sss">
            <h1 class="apptitleone text-center text-3xl mb-10">SIK SORULAN SORULAR</h1>
            <?php
            require "./components/sss.php";

            ?>
        </div>
    </div>


    <div id="cookiealert"
        class="fixed hidden bottom-20 md:px-64 left-0 w-full bg-red-50 border-s-4 border-red-500 p-4 dark:bg-red-800/30"
        role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Icon -->
                <span
                    class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-400">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white">
                    Çerezleri kabul ediyorsunuz
                </h3>
                <p class="text-sm text-gray-700 dark:text-neutral-400">
                    Sitemizi kullanmaya devam ederek çerezlerin saklanması ve kullanılmasını onaylıyorsunuz. Bu uyarıyı
                    kapatmak için üstüne tıklayın.
                </p>
            </div>
        </div>

    </div>




    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/alertify.js"></script>
    <script src="./js/custom.js"></script>

    <?php
    require "./components/footer.php";

    ?>

</body>

</html>