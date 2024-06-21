<?php

// Navbar butonları
$navbarbuttons = '<a href="./pages/sign.php">
    <button type="button"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-red-900 dark:text-red-500 dark:hover:text-red-400">
        UYE OL
    </button>
</a>
<a href="./pages/login.php">
    <button type="button"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-900 text-gray-100 hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-white/10 dark:hover:bg-white/20 dark:text-white dark:hover:text-white">
        GIRIS YAP
    </button>
</a>';
?>

<nav class="appheader p-3 md:p-6 w-full flex items-center justify-between md:justify-normal">
    <div class="headerlogo apptitleone w-3/12">
        <a href="https://balik.xyz/">
            <h3 class="text-3xl font-bold text-gray-800"><span class="text-red-700">Q</span>uick<span
                    class="text-red-700">L</span>ink</h3>
            <p>kısalt ve paylaş</p>
        </a>
    </div>
    <div class="w-6/12 hidden md:block">
        <ul class="flex items-center gap-6 font-bold">
            <li><a href="./index.php#nedenbiz" class="hover:text-red-600">Neden biz?</a></li>
            <li><a href="./index.php#ozelliklerimiz" class="hover:text-red-600">Özellikler</a></li>
            <li><a href="yasal.php" class="hover:text-red-600">Yasal</a></li>
            <li><a href="./index.php#sss" class="hover:text-red-600">Sık sorulan sorular</a></li>
        </ul>
    </div>
    <div class="w-6/12 md:w-3/12 gap-3 flex">
        <?php
        if (isset($_SESSION['user'])) {
            echo '<a href="./exit.php">
                <button type="button"
                    class="py-3 px-4 inline-flex items-center text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-red-900 dark:text-red-500 dark:hover:text-red-400">
                    CIKIS YAP
                </button>
            </a>
            <a href="./pages/profile.php">
    <button type="button"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-900 text-gray-100 hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-white/10 dark:hover:bg-white/20 dark:text-white dark:hover:text-white">
        PROFIL
    </button>
</a>';
        } else {
            echo $navbarbuttons;
        }
        ?>
    </div>
</nav>