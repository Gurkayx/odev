<?php

function getprofile($db)
{
    $query = $db->prepare("SELECT * FROM users WHERE useruid = :useruid");
    $query->execute(['useruid' => $_SESSION['user']]);
    $myprofile = $query->fetch(PDO::FETCH_ASSOC);
    return $myprofile;
}


function getlinks($db)
{
    $query = $db->prepare("SELECT * FROM shortlinks WHERE useruid = :useruid");
    $query->execute(['useruid' => $_SESSION['user']]);
    $mylinks = $query->fetchAll(PDO::FETCH_ASSOC);
    return $mylinks;
}

function getlinkinfo($db, $linkid)
{
    // PDO hata modunu etkinleştir
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $query = $db->prepare("SELECT * FROM shortlinks WHERE linkid = :linkid");
        $query->execute(['linkid' => $linkid]);
        $getlink = $query->fetch(PDO::FETCH_ASSOC);
        if ($getlink) {
            return $getlink;
        } else {
            return "Bu bağlantı kayıp ya da silinmiş";
        }
    } catch (PDOException $e) {
        // Hata mesajını döndür
        return "Bir hata oluştu: " . $e->getMessage();
    }
}