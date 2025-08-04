 <?php

    /*class UserController
{
    public $modelUser;

    public function __construct()
    {
        $this->modelUser = new UserModel();
    }

 

    public function showRegisterForm(): void
    {
        require_once './views/auth/register.php';
    }

    public function registerSubmit(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $comfirm = $_POST['comfirm_password'] ?? '';

        if (empty($email) || empty($password) || empty($comfirm)) {
            $error = "Vui lòng nhập đầy đủ thông tin.";
            require './views/auth/register.php';
            return;
        }

        if (!filter_var(value: $email, filter: FILTER_VALIDATE_EMAIL)) {
            $error = "Email không hợp lệ";
            require './views/auth/register.php';
            return;
        }

        if ($password !== $comfirm) {
            $error = "Mật khẩu xác nhận không khớp.";
            require './views/auth/register.php';
            return;
        }

        $hashedPassword = password_hash(password: $password, algo: PASSWORD_DEFAULT);

        $modelUser = new UserModel();
        $result = $modelUser->create(email: $email, hashedPassword: $hashedPassword);

        if ($result) {
            $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập lại.";
            header(header: "Location: ?act=login");
            exit();
        } else {
            $error = "Email đã tồn tại hoặc có lỗi khi tạo tài khoản.";
            require './views/auth/register.php';
        }
    }

    public function showLoginForm(): void
    {
        require_once './views/auth/login.php';
    }

    public function loginSubmit(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $error = "Vui lòng nhập đầy đủ thông tin.";
            require './views/auth/login.php';
            return;
        }

        $user = $this->modelUser->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['success'] = "Đăng nhập thành công!";
            header("Location: ?act=home");
            exit();
        } else {
            $error = "Email hoặc mật khẩu không đúng.";
            require './views/auth/login.php';
        }
    }

   
    public function logout(): never
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ?act=login");
        exit();
    }
} */

    class UserController
    {
        public $modelUser;

        public function __construct()
        {
            $this->modelUser = new UserModel();
        }

        public function showRegisterForm(): void
        {
            require_once './views/auth/register.php';
        }

        public function registerSubmit(): void
        {
            if (session_status() === PHP_SESSION_NONE) session_start();

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $comfirm = $_POST['comfirm_password'] ?? '';

            if (empty($email) || empty($password) || empty($comfirm)) {
                $error = "Vui lòng nhập đầy đủ thông tin.";
                require './views/auth/register.php';
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Email không hợp lệ";
                require './views/auth/register.php';
                return;
            }

            if ($password !== $comfirm) {
                $error = "Mật khẩu xác nhận không khớp.";
                require './views/auth/register.php';
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $modelUser = new UserModel();
            $result = $modelUser->create($email, $hashedPassword);

            if ($result) {
                $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập lại.";
                header("Location: ?act=login");
                exit();
            } else {
                $error = "Email đã tồn tại hoặc có lỗi khi tạo tài khoản.";
                require './views/auth/register.php';
            }
        }

        public function showLoginForm(): void
        {
            echo "Đây là trang đăng nhập";
            require_once './views/auth/login.php';
        }

        public function loginSubmit()
        {
            if (session_status() === PHP_SESSION_NONE) session_start();

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $error = "Vui lòng nhập đầy đủ thông tin.";
                require './views/auth/login.php';
                return;
            }

            $user = $this->modelUser->findByEmail($email);

            if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: ?act=home");
                exit();
            } else {
                $error = "Email hoặc mật khẩu không đúng.";
                require './views/auth/login.php';
            }
        }

        public function logout(): never
        {
            if (session_status() === PHP_SESSION_NONE) session_start();
            session_unset();
            session_destroy();
            header("Location: index.php?act=home"); // ← quay về trang chủ
            exit();
        }
    }
