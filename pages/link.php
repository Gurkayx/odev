<?php
require_once "../api/db.php";
require_once "../api/helper.php";
session_start();
ob_start();


if (!isset($_GET['linkid'])) {
    header("location:../index.php");
} else {
    $linkinfo = getlinkinfo($db, $_GET['linkid']);
}


$link = isset($linkinfo['userlink']) ? htmlspecialchars($linkinfo['userlink'], ENT_QUOTES, 'UTF-8') : 'Bu link bağlantı artık geçerli değil';

?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link detay</title>
    <link rel="stylesheet" href="../public/styles.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/alertify.css">

</head>

<body>
    <?php
    require "../components/header.php";

    ?>

    <div class="welcomepagecontent px-6 md:px-36 mt-28 flex flex-col gap-4 items-center">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-700">10 saniye içinde sizi bağlantıya göndereceğiz <br>Lütfen
                bekleyiniz...</h2>
            <h3 class="text-gray-400 text-sm font-semibold mb-6">Gideceğiniz site ile QuickLink'in hiçbir bağlantısı
                yoktur</h3>
            <?php
            if (isset($linkinfo['userlink']) && !empty($linkinfo['userlink'])) {
                $link = htmlspecialchars($linkinfo['userlink'], ENT_QUOTES, 'UTF-8');
                echo '<a class="text-red-500 font-semibold" href="' . $link . '">' . $link . '</a>';
                echo '<p class="mt-4">Beklemek istemiyorsanız bağlantıya tıklamanız yeterli</p>';
            } else {
                echo '<a href="../index.php" class="text-red-500 font-semibold">Bağlantı mevcut değil</a>';
            }
            ?>
        </div>
    </div>

    <div class="mt-24"></div>

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
    <script type="text/javascript">
        // PHP değişkeninden gelen URL'yi JavaScript'te kullanarak yönlendirme yapma
        var redirectUrl = "<?php echo $linkinfo['userlink'] ?>";
        setTimeout(function(){
            window.location.href = redirectUrl;
        }, 10000); // 10000 milisaniye = 10 saniye
    </script>

    <?php
    require "../components/footer.php";

    ?>

</body>

</html>