<?php

header('Content-Type: application/json');
include "./db.php";
session_start();
ob_start();
$response = array();

$useruid = (isset($_SESSION['user'])) ? $_SESSION['user'] : 0;




function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$baseUrl = "http://localhost/shortlink/pages/link.php?link=";




function getDeviceName()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    return $userAgent;
}

function getUserIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'signin':
            $usermail = htmlspecialchars(trim($_POST['usermail']));
            $userpass = htmlspecialchars(trim($_POST['userpass']));
            $userpassagain = htmlspecialchars(trim($_POST['userpassagain']));
            $userid = uniqid();

            if ($usermail == "" || $userpass == "" || $userpassagain == "") {
                $response = [
                    'type' => 'error',
                    'message' => 'Lütfen tüm alanları doldurunuz'
                ];
            } else {
                if (strlen($userpass) < 8) {
                    $response = [
                        'type' => 'error',
                        'message' => 'Şifreniz 8 karakterden kısa olamaz'
                    ];
                } else {
                    if ($userpass !== $userpassagain) {
                        $response = [
                            'type' => 'error',
                            'message' => 'Şifreler aynı olmak zorunda tekrar deneyiniz'
                        ];
                    } else {
                        $query = $db->prepare("SELECT * FROM users WHERE usermail = :usermail");
                        $query->execute(['usermail' => $usermail]);
                        $haveusermail = $query->fetch(PDO::FETCH_ASSOC);

                        if ($haveusermail) {
                            $response = [
                                'type' => 'error',
                                'message' => 'Bu e-posta adresi kullanımda lütfen başka bir tane deneyin'
                            ];
                        } else {
                            $query = $db->prepare("INSERT INTO users SET
useruid = ?,
usermail = ?,
userpassword = ?");
                            $insert = $query->execute(
                                array(
                                    $userid,
                                    $usermail,
                                    $userpass,
                                )
                            );
                            if ($insert) {
                                $last_id = $db->lastInsertId();
                                $response = [
                                    'type' => 'success',
                                    'message' => 'Başarıyla kayıt oldunuz'
                                ];
                            } else {
                                $response = [
                                    'type' => 'error',
                                    'message' => 'Kayıt sırasında bir hata oldu tekrar dener misin?'
                                ];
                            }
                        }
                    }
                }
            }

            break;

        case 'login':
            $usermail = htmlspecialchars(trim($_POST['usermail']));
            $userpass = htmlspecialchars(trim($_POST['userpass']));

            if ($usermail == "" || $userpass == "") {
                $response = [
                    'type' => 'error',
                    'message' => 'Lütfen tüm alanları doldurun.'
                ];
            } else {
                $query = $db->prepare("SELECT * FROM users WHERE usermail = :usermail");
                $query->execute(['usermail' => $usermail]);
                $haveusermail = $query->fetch(PDO::FETCH_ASSOC);

                if ($haveusermail) {
                    if ($userpass == $haveusermail['userpassword']) {
                        $_SESSION['user'] = $haveusermail['useruid'];
                        $response = [
                            'type' => 'success',
                            'message' => 'Başarıyla giriş yaptınız yönlendiriyoruz. '
                        ];
                    } else {
                        $response = [
                            'type' => 'error',
                            'message' => 'Yanlış bir şifre denediniz tekrar deneyin.'
                        ];
                    }
                } else {
                    $response = [
                        'type' => 'error',
                        'message' => 'Bu e-posta hesabıyla eşleşen bir üyemiz yok.'
                    ];
                }
            }
            break;


        case 'shorturl':
            $userlink = htmlspecialchars($_POST['link']);

            $randomValue = generateRandomString(6);
            $fullUrl = $baseUrl . $randomValue;

            if ($userlink == "") {
                $response = [
                    'type' => 'error',
                    'message' => 'Link alanı boş olamaz'
                ];
            } else {
                $query = $db->prepare("INSERT INTO shortlinks SET
                useruid = ?,
                userlink = ?,
                usershortlink = ?");
                $insert = $query->execute(
                    array(
                        $useruid,
                        $userlink,
                        $fullUrl,
                    )
                );
                if ($insert) {
                    $last_id = $db->lastInsertId();
                    $query = $db->prepare("SELECT * FROM shortlinks WHERE linkid = :linkid");
                    $query->execute(['linkid' => $last_id]);
                    $addedlink = $query->fetch(PDO::FETCH_ASSOC);

                    if ($addedlink) {
                        $response = [
                            'type' => 'success',
                            'message' => "http://localhost/shortlink/pages/link.php?linkid=" . $last_id . ""
                        ];
                    }
                } else {
                    $response = [
                        'type' => 'error',
                        'message' => 'Bağlantı kısaltılırken bir hata oldu tekrar deneyiniz.'
                    ];
                }
            }

            break;

        case 'deletelink':
            $linkid = htmlspecialchars($_POST['linkid']);

            $query = $db->prepare("SELECT * FROM shortlinks WHERE useruid = :useruid AND linkid = :linkid");
            $query->execute(['useruid' => $useruid, 'linkid' => $linkid]);
            $havelink = $query->fetch(PDO::FETCH_ASSOC);

            if ($havelink) {
                $query = $db->prepare("DELETE FROM shortlinks WHERE linkid = :id");
                $delete = $query->execute(
                    array(
                        'id' => $linkid
                    )
                );
                if ($delete) {
                    $response = [
                        'type' => 'success',
                        'message' => 'Bağlantı başarıyla silindi.'
                    ];
                } else {
                    $response = [
                        'type' => 'error',
                        'message' => 'Bağlantı silinemedi lütfen tekrar deneyin.'
                    ];
                }
            } else {
                $response = [
                    'type' => 'error',
                    'message' => 'Size ait olmayan bir linki silemezsiniz.'
                ];
            }

            break;

        case 'changepass':
            $oldpass = htmlspecialchars($_POST['oldpass']);
            $newpass = htmlspecialchars($_POST['newpass']);

            $query = $db->prepare("SELECT * FROM users WHERE useruid = :useruid");
            $query->execute(['useruid' => $_SESSION['user']]);
            $haveuser = $query->fetch(PDO::FETCH_ASSOC);

            if ($haveuser) {
                if ($oldpass == $haveuser['userpassword']) {
                    $query = $db->prepare("UPDATE users SET
                    userpassword = :newpass
                    WHERE userid = :userid");
                    $update = $query->execute(
                        array(
                            "newpass" => $newpass,
                            "userid" => $_SESSION['user']
                        )
                    );
                    if ($update) {
                        $response = [
                            'type' => 'success',
                            'message' => 'Parolanız başarıyla güncellendi'
                        ];
                    } else {
                        $response = [
                            'type' => 'success',
                            'message' => 'Parolanız güncellenirken bir hata oldu tekrar deneyin'
                        ];
                    }
                }else{
                    $response = [
                        'type' => 'error',
                        'message' => 'Mevcut şifrenizi yanlış girdiniz tekrar deneyin'
                    ];  
                }
            }else{
                $response = [
                    'type' => 'error',
                    'message' => 'oturum açmadan şifre güncellenemez'
                ];
            }



            break;

        default:
            # code...
            break;
    }

}



echo json_encode($response);
