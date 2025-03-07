<?php 
    require_once "../app/models/UserModel.php";
    class UserController extends Controller {
        private $userModel;
        public function __construct(){
            $this->userModel = new UserModel();
        }
        public function Index (){
            session_start();
            $shoppingcard = isset($_SESSION["GioHang"]) ? unserialize($_SESSION["GioHang"]) : [];
            $totalitem = count($shoppingcard);
            $content_page = "../app/views/user/login.php";
            $this->render("/views/layouts/main",['content_page' => $content_page,'totalitem'=>$totalitem]);
        }
        public function Register(){
            session_start();
            $shoppingcard = isset($_SESSION["GioHang"]) ? unserialize($_SESSION["GioHang"]) : [];
            $totalitem = count($shoppingcard);
            $content_page = "../app/views/user/register.php";
            $this->render("/views/layouts/main",['content_page' => $content_page,'totalitem'=>$totalitem]);
        }
        public function handleregister () {
            $username = $_POST['username'];
            $fullname = $_POST['fullname'];
            $numberphone = $_POST['numberphone'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $address = $_POST['address'];
            $rs = $this->userModel->handleregister($username,$pass,$fullname,$address,$numberphone,$email);
            header('Content-Type: application/json');
            if($rs == 1){
                echo json_encode(array("errCode" => 0,"Notification" => "Tạo tài khoản thành công"));
            }else {
                if($rs == 2){
                    echo json_encode(array("errCode" => -1,"Notification" => "Không thể tạo được tài khoản, thử lại !!!"));
                }
                else {
                    echo json_encode(array("errCode" => 1,"Notification" => "Tên đăng nhập đã trùng với tài khoản khác"));
                }
            }
        }
        public function handlelogin () {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rs = $this->userModel->handleaccount($username,$password);
            header('Content-Type: application/json');
            if($rs){
                session_start();
                $_SESSION["MaTaiKhoan"] = $rs["MaTaiKhoan"];
                $_SESSION["MaLoaiTaiKhoan"] = $rs["MaLoaiTaiKhoan"];
                $_SESSION["TenHienThi"] = $rs["TenHienThi"];
                if ($rs['MaLoaiTaiKhoan'] == 2) {
                    echo json_encode(array("errCode" => 1, "Notification" => "Đăng nhập thành công", "redirect" => "/Toy_children/admin/"));
                } 
                else
                echo json_encode(array("errCode"=>1,"Notification" => "Chúc bạn có trải nghiệm mua sắm vui vẻ"));
            }
            else {
                echo json_encode(array("errCode"=>0,"Notification" => "Tên đăng nhập hoặc mật khẩu không đúng"));
            }
        }
        public function handlelogout (){
            session_start();
            if(isset($_SESSION["MaTaiKhoan"]) && isset($_SESSION["MaLoaiTaiKhoan"]) && isset($_SESSION["TenHienThi"])){
                unset($_SESSION["MaTaiKhoan"]);
                unset($_SESSION["MaLoaiTaiKhoan"]);
                unset($_SESSION["TenHienThi"]);
            }
            $offset = 0;
            $products = $this->productModel->getAllProduct($offset);
            $shoppingcard = isset($_SESSION["GioHang"]) ? unserialize($_SESSION["GioHang"]) : [];
            $totalitem = count($shoppingcard);
            $content_page = "../app/views/home/index.php";
            $this->render("/views/layouts/main",['product'=>$products,'content_page' => $content_page,'totalitem'=>$totalitem]);
        }
    }
?>