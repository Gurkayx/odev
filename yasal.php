<?php
require_once "./api/db.php";
require_once "./api/helper.php";
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

    <div class="welcomepagecontent px-6 md:px-36 mt-28 flex flex-col gap-4 items-center">
       <h2 class="text-gray-700 dark:text-gray-300 text-3xl font-bold"> Kullanıcı Sözleşmesi</h2><br>
        QuickLink Kullanıcı Sözleşmesi
        Son Güncelleme: [21.06.2024]

        QuickLink hizmetlerini kullanarak aşağıdaki şartları kabul etmiş sayılırsınız:

        1. Hizmet Kullanımı
        QuickLink'i kullanarak, yasalara uygun şekilde hizmetlerimizi kullanmayı kabul edersiniz.
        QuickLink üzerinden paylaşılan içeriklerden siz sorumlusunuz. QuickLink, yasadışı, müstehcen, veya zararlı
        içeriklerin paylaşılmasını yasaklar.
        2. Hesap Güvenliği
        Hesabınızın güvenliğini sağlamak sizin sorumluluğunuzdadır. Hesabınızla yapılan tüm aktivitelerden siz
        sorumlusunuz.
        3. İçerik Sahipliği
        QuickLink üzerinden kısalttığınız linkler üzerindeki tüm haklar size aittir. Ancak, QuickLink, hizmetlerini
        sağlamak ve iyileştirmek amacıyla bu linkleri kullanma hakkına sahiptir.
        4. Sorumluluk Reddi
        QuickLink, hizmetlerinin kesintisiz veya hatasız olacağını garanti etmez.
        QuickLink, hizmetlerin kullanımı sonucunda ortaya çıkabilecek doğrudan, dolaylı, rastlantısal, özel veya cezai
        zararlardan sorumlu değildir.
        5. Değişiklikler
        QuickLink, bu Kullanıcı Sözleşmesi'ni zaman zaman güncelleyebilir. Güncellemeler bu sayfada yayınlanacaktır.
        6. Fesih
        QuickLink, bu Kullanıcı Sözleşmesi'ne aykırı hareket eden kullanıcıların hesaplarını herhangi bir bildirimde
        bulunmaksızın feshetme hakkına sahiptir.
        7. İletişim
        Kullanıcı sözleşmemizle ilgili sorularınız

        <h2 class="text-gray-700 dark:text-gray-300 text-3xl font-bold"> Gizlilik politikası</h2><br>
QuickLink Gizlilik Politikası
Son Güncelleme: [21.02.2024]

QuickLink olarak, kullanıcılarımızın gizliliğine büyük önem veriyoruz. Bu Gizlilik Politikası, QuickLink hizmetlerimizi kullanırken hangi bilgileri topladığımızı, bu bilgileri nasıl kullandığımızı ve koruduğumuzu açıklamaktadır.

1. Topladığımız Bilgiler
Kullanıcı Bilgileri: QuickLink hizmetlerine kaydolurken sağladığınız ad, e-posta adresi gibi kişisel bilgiler.
Kısaltılan Linkler: Hizmetlerimizi kullanarak kısalttığınız URL'ler.
Kullanım Verileri: Hizmetlerimizi nasıl kullandığınız hakkında bilgi. Bu, IP adresiniz, tarayıcı türünüz, yönlendirme/çıkış sayfalarınız ve tıklama sayınız gibi bilgileri içerir.
2. Bilgilerin Kullanımı
Topladığımız bilgileri şu amaçlarla kullanıyoruz:

Hizmetlerimizi sunmak ve geliştirmek.
Kullanıcı desteği sağlamak.
Güvenliği sağlamak ve dolandırıcılığı önlemek.
İstatistiksel analizler yapmak.
3. Bilgilerin Paylaşımı
QuickLink olarak kullanıcı bilgilerinizin gizliliğini koruruz ve bilgilerinizi üçüncü taraflarla paylaşmayız, ancak yasal zorunluluklar nedeniyle bilgilerinizi paylaşmak zorunda kalabiliriz.

4. Bilgilerin Korunması
Kullanıcı bilgilerinizin güvenliğini sağlamak için çeşitli güvenlik önlemleri alıyoruz. Ancak, internet üzerinden yapılan hiçbir veri iletiminin tamamen güvenli olmadığını unutmayın.

5. Çocukların Gizliliği
QuickLink, 13 yaş altındaki çocuklardan bilerek kişisel bilgi toplamaz. Eğer bir ebeveyn veya veliyseniz ve çocuğunuzun bize kişisel bilgi sağladığını fark ederseniz, bizimle iletişime geçin.

6. Değişiklikler
Bu Gizlilik Politikası'nı zaman zaman güncelleyebiliriz. Değişiklikler bu sayfada yayınlanacaktır.

7. İletişim
Gizlilik politikamızla ilgili sorularınız için lütfen bizimle iletişime geçin: [e-posta adresi]
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