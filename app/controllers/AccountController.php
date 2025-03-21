<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');

class AccountController 
{
    private $accountModel;
    private $db;

    public function __construct() 
    {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    public function register() 
    {
        include_once 'app/views/account/register.php';
    }

    public function login() 
    {
        include_once 'app/views/account/login.php';
    }

    public function save() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';

            $errors = [];
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập username!";
            }
            if (empty($fullName)) {
                $errors['fullname'] = "Vui lòng nhập fullname!";
            }
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập password!";
            }
            if ($password != $confirmPassword) {
                $errors['confirmPass'] = "Mật khẩu và xác nhận chưa đúng";
            }

            // Kiểm tra username đã được đăng ký chưa?
            $account = $this->accountModel->getAccountByUsername($username);
            if ($account) {
                $errors['account'] = "Tài khoản này đã có người đăng ký!";
            }

            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->accountModel->save($username, $fullName, $password);

                if ($result) {
                    header('Location: /DA_MaNguonMo/account/login');
                }
            }
        }
    }

    public function logout() 
    {
        unset($_SESSION['username']);
        unset($_SESSION['role']);

        header('Location: /DA_MaNguonMo/product');
    }

    public function checkLogin() 
    {
        // Kiểm tra xem liệu form đã được submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $account = $this->accountModel->getAccountByUsername($username);
            if ($account) {
                $pwd_hashed = $account->password;
                // Check mật khẩu
                if (password_verify($password, $pwd_hashed)) {
                    session_start();
                    $_SESSION['username'] = $account->username;
                    header('Location: /DA_MaNguonMo/product');
                    exit;
                } else {
                    echo "Password incorrect.";
                }
            } else {
                echo "Báo lỗi không tìm thấy tài khoản";
            }
        }
    }
}
?>
