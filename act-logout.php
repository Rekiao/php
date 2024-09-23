<?php
session_start(); // เริ่มต้นเซสชัน

// ลบข้อมูลเซสชันทั้งหมด
$_SESSION = array();

// หากใช้คุกกี้สำหรับเซสชันให้ลบคุกกี้เซสชัน
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// ทำลายเซสชัน
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบหรือหน้าอื่น ๆ
echo "true";
?>
