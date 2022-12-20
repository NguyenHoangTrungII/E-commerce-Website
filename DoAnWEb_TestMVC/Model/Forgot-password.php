<?php 

    require_once("../Controller.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require('../../public/PHPMailer-master/src/Exception.php');
    require( '../../public/PHPMailer-master/src/PHPMailer.php');
    require( '../../public/PHPMailer-master/src/SMTP.php');

    class ForgotPassWord extends Controller{



        function setTokenForgetPass($ID_ACC){
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $urlToEmail = 'http://localhost/DoAnWeb/DoAnWeb_testMVC/View/password-change.php?'.http_build_query([
                'selector' => $selector,
                'validator' => bin2hex($token)
            ]);

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $expires = new DateTime('NOW');
            $expires->add(new DateInterval('PT01H')); // HẠN MỘT GIỜ

            // var_dump($urlToEmail);

            try{
                $stmt =$this->connection->prepare("INSERT INTO QUENMATKHAU (ID_TAIKHOAN, SEL, TOKEN, HAN_TOKEN) VALUES (:ID_TAIKHOAN, :SEL, :TOKEN, :HAN_TOKEN);");

            $stmt->execute([
                'ID_TAIKHOAN' => $ID_ACC,
                'SEL' => $selector,
                'TOKEN' => hash('sha256', $token),
                'HAN_TOKEN' => $expires->format('Y-m-d\TH:i:s')
            ]);

            $dataAdded = $stmt->rowCount();
			$lastInsertId = $this->connection->lastInsertId();

            // var_dump($dataAdded);

            return array("NUMBER_OF_ROW_INSERTED"=>$dataAdded, "LAST_INSERT_ID"=>$lastInsertId, "URL"=> $urlToEmail );

            }
            catch(Exception $e) 
		    {
			// $this->connection->rollBack();
			return -1;
		    }

        }

        function sentMailResetPass($UserInfo, $url){
            $mail = new PHPMailer(true);
            $subject = "KHÔI PHỤC MẬT KHẨU - WEBSITE BÁN LINH KIỆN 4.2";
            $output='<p>Chào '.$UserInfo[0]['hoten'].',</p>';
            $output.='<p>Bạn vừa yêu cầu đổi mật khẩu tài khoản trên website của chúng tôi.</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p>Vui lòng nhấp vào <a href="'.$url.'"> đây </a> để thay đổi password</p>';
            $output.='<p></p>';		
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p>Liên kết sẽ hết hạn trong vòng 1 giờ kể từ khi email được gửi, vui lòng thay đổi trước khoản thời gian trên.</p>';
            $output.='<p>Nếu bạn không yêu cầu đổi mật khẩu, vui lòng bỏ qua email này. Xin cảm ơn</p>';   	
            $output.='<p>ảm ơn,</p>';
            $output.='<p>4.2Group Team</p>';
            try {
                $mail->SMTPDebug = 0; //0,1,2: chế độ debug
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'nguyentrungbmtbmt@gmail.com'; // SMTP username
                $mail->Password = 'fdwazmgmqhrmmhqk                ';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom('nguyentrungbmtbmt@gmail.com', '4.2Grp Team' ); 
                $mail->addAddress($UserInfo[0]['email'], $UserInfo[0]['hoten']); 
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body =  $output;
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                return 1;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        function checkValitionAssec($selector, $validator){
            
        }

    }
?>