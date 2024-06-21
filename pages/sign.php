<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt ol</title>
    <link rel="stylesheet" href="../public/styles.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/alertify.css">

</head>

<body>
    <?php
    require "../components/header.php";

    ?>

    <div class="welcomepagecontent px-6 md:px-36 mt-28 flex flex-col gap-4 mb-10">
        <div class="loginform flex items-center justify-center max-w-full">
            <form id="signform" class="max-w-md">
                <div class="flex flex-col items-center justify-center mb-6">
                    <h2 class="italic font-bold text-gray-700 dark:text-gray-300 text-2xl">HOSGELDİNİZ</h2>
                    <p class="italic font-bold text-gray-400 dark:text-gray-300 text-sm">Bağlantılarınızı saklamak ve
                        istatistikler için giriş yapın</p>
                </div>
                <div class="flex flex-col items-center justify-center mb-2">
                    <p id="signerrordiv" class="italic font-bold text-red-400 dark:text-gray-300 text-sm">
                        </p>
                </div>
                <span class="mb-2 text-sm font-semibold text-gray-800 dark:text-gray-300">E-posta adresiniz</span>
                <div class="relative">
                    <input type="email"
                    id="usermail"
                        class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="quick@link.com">
                    <div
                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                        <svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="mb-2 text-sm font-semibold text-gray-800 dark:text-gray-300">Benzersiz şifreniz</span>
                    <div class="relative">
                        <input type="password"
                        id="password"
                            class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="benzersizsifrem">
                        <div
                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                            <svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                                <circle cx="16.5" cy="7.5" r=".5"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="mb-2 text-sm font-semibold text-gray-800 dark:text-gray-300">Benzersiz
                            şifreniz (tekrar)</span>
                        <div class="relative">
                            <input type="password"
                            id="passwordagain"
                                class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="benzersizsifrem">
                            <div
                                class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                <svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                                    <circle cx="16.5" cy="7.5" r=".5"></circle>
                                </svg>
                            </div>
                            <button type="submit"
                                class="absolute end-1 top-1/2 -translate-y-1/2 rounded-full bg-red-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-red-700">
                                KAYIT OL
                            </button>
                        </div>
                    </div>
                    <a href="./login.php" class="mt-4 text-xs text-red-500 italic">Zaten hesabın varmı?</a>
                    <p class="text-xs mt-3">Kayıt olarak <a href="./yasal.php"
                            class="mt-4 text-xs text-red-500 italic">gizlilik</a> ve <a href="./yasal.php"
                            class="mt-4 text-xs text-red-500 italic">Kullanım</a> sözleşmelerini kabul etmiş
                        sayılırsınız</p>
                </div>
            </form>
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