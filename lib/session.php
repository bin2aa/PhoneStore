<?php
class Session
{
    //Khởi tạo session
    public static function startSession()
    {
        session_start();
    }
    //Đặt giá trị cho một biến session
    public static function setSessionValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    //lấy giá trị của một biến
    public static function getSessionValue($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }
    public static function unsetSessionValue($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION);
        }
    }
    //Xóa toàn bộ session và đăng xuất người dùng
    public static function destroySession()
    {
        session_destroy();
    }
}
