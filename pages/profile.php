<?php
require_once "../api/db.php";
require_once "../api/helper.php";
session_start();
ob_start();


$profile = getprofile($db);

?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="../public/styles.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/alertify.css">

</head>

<body>
    <?php
    require "../components/header.php";

    ?>

    <div class="welcomepagecontent px-6 md:px-36 mt-28 flex flex-col gap-4 items-center">
        <div class="profilecard flex-col flex items-center gap-5">
            <div
                class="userimg w-24 h-24 bg-black flex items-center justify-center text-red-500 font-extrabold apptitleone">
                <h2 class="text-3xl">QL</h2>
            </div>
            <p class="text-xl font-bold text-gray-700 dark:text-gray-300"><?php echo $profile['usermail'] ?></p>
            <p class="text-sm font-bold text-gray-700 dark:text-gray-300"><?php echo $profile['usersigndate'] ?></p>
            <div class="flex items-center gap-3 flex-col">
                <button type="button" data-hs-overlay="#hs-basic-modal"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
                    Şifre güncelle
                </button>
            </div>
        </div>
        <div class="myshortlinks flex-1 w-full max-w-xl">
            <h2 class="apptitleone font-bold mb-6">Kısaltılan bağlantılar</h2>

            <div class="linksfeedarea flex items-center justify-center flex-col">
                <?php
                include "../components/mylinks.php";
                ?>
            </div>
        </div>
    </div>

    <div id="hs-basic-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div
                class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Şifreni güncelle
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                        data-hs-overlay="#hs-basic-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="" id="passwordchangeform">
                        <div class="max-w-full space-y-3">
                            <input type="text" id="oldpassword"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Şuanki şifrenizi giriniz">
                        </div>
                        <div class="max-w-full space-y-3">
                            <input type="text" id="newpassword"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Yeni şifrenizi giriniz">
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                                data-hs-overlay="#hs-basic-modal">
                                Close
                            </button>
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                Güncelle
                            </button>
                        </div>
                    </form>
                </div>

            </div>
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




    <script src="../node_modules/preline/dist/preline.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/alertify.js"></script>
    <script src="../js/custom.js"></script>

    <?php
    require "../components/footer.php";

    ?>

</body>

</html>