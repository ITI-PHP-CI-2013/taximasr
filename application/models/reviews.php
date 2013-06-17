<?php

class Reviews extends CI_Model {

    public function get_reviews($taxi_id) {
        $reviews = array();
        $query = $this->db->query("select sum(physical_status) as physical_status,sum(cleanliness) as cleanliness,sum(driver_behavior) as driver_behavior,sum(pricing) as pricing,sum(radio_volume) as radio_volume,sum(driving_style) as driving_style from reviews group by taxi_id having taxi_id=$taxi_id");
        foreach ($query->result() as $row) {
            $reviews['physical_status'] = $row->physical_status;
            $reviews['cleanliness'] = $row->cleanliness;
            $reviews['driver_behavior'] = $row->driver_behavior;
            $reviews['pricing'] = $row->pricing;
            $reviews['radio_volume'] = $row->radio_volume;
            $reviews['driving_style'] = $row->driving_style;
        }
        return $reviews;
    }

    public function get_count($taxi_id) {
        $test2 = array();
        $query = $this->db->query("select count(review_id) as allrev from reviews group by taxi_id having taxi_id=$taxi_id");
        foreach ($query->result() as $row) {
            $test2['count'] = $row->allrev;
        }
        return $test2['count'];
    }

    public function gettaxidetails($taxiNo) {
        /* $statement = "SELECT `taxi_id` FROM `taxis` WHERE `taxi_number` = '$taxiNo'";
          $taxiid = $this->db->query($statement); */
        $reviews = array();
        $query = $this->db->query("select sum(`physical_status`) as `physical_status`,sum(`cleanliness`) as `cleanliness`,sum(`driver_behavior`) as `driver_behavior`,sum(`pricing`) as `pricing`,sum(`radio_volume`) as `radio_volume`,sum(`driving_style`) as `driving_style` from `reviews` group by `taxi_id` having `taxi_id`=1");
        foreach ($query->result() as $row) {
            $reviews['physical_status'] = $row->physical_status;
            $reviews['cleanliness'] = $row->cleanliness;
            $reviews['driver_behavior'] = $row->driver_behavior;
            $reviews['pricing'] = $row->pricing;
            $reviews['radio_volume'] = $row->radio_volume;
            $reviews['driving_style'] = $row->driving_style;
        }
        return $reviews;
    }

    public function insertuser($name, $email, $passwd, $email_u) {


        $data = array(
            'username' => $name,
            'password_sha2' => $passwd,
            'notify_email' => $email,
            'email' => $email_u
        );
        $this->db->insert('users', $data);
    }

    public function msgd($tno, $id) {
        $con = "أنا ركبت التاكسي رقم.$tno";

        $statement1 = "SELECT notify_email FROM `users` WHERE `user_id` = '$id'";
        $check = $this->db->query($statement1);
        $row = $check->row();
        $check = $row->notify_email;
        if ($check) {
            $em = $check;
            require_once "Mail.php";

            //$from = "<alshimaa.ahmed.mohammed@gmail.com>";
            $from = "<taximasr2013@gmail.com>";

            // $to = "<alshimaa.ahmed.mohammed@gmail.com>";
            $to = "<$em>";
            $subject = "taximasr";
            $body = "$con";

            $host = "smtp.gmail.com";
            $port = "587";
            //$username = "alshimaa.ahmed.mohammed@gmail.com";  //<> give errors
            $username = "taximasr2013@gmail.com";
            //	$password = "havefaith14";
            $password = "taximasrproject";
            $headers = array('From' => $from,
                'To' => $to,
                'Subject' => $subject);
            $smtp = Mail::factory('smtp', array('host' => $host,
                        'port' => $port,
                        'auth' => true,
                        'username' => $username,
                        'password' => $password));

            $mail = $smtp->send($to, $headers, $body);

            if (PEAR::isError($mail)) {
                echo("<p>" . $mail->getMessage() . "</p>");
            } else {
                //echo("<p>Message successfully sent!</p>");
                $sp = base_url('index.php/users/sent');
                header("Location: $sp");
            }
        } else {
            $sp = base_url('index.php/users/email_page');
            header("Location: $sp");
        }
    }

    public function vpm($id) {

        // $sql = "SELECT * FROM `users` WHERE `user_id` = '$id'";
        // $query = $this->db->query($sql);
        // return $query->result_array();


        $query = $this->db->query("select * from users where user_id=$id");
        $row = $query->row();
        return $row;
    }

    public function addfm($femail, $uid) {

        $statement = "SELECT * FROM `users` WHERE `email` = '$femail'";
        $check = $this->db->query($statement);
        $check = $check->row();
        $check = $check->email;
        $statement2 = "SELECT `username` FROM `users` WHERE `user_id`='$uid'";
        $username = $this->db->query($statement2);

        $row = $username->row();
        $username = $row->username;

        if ($check == $femail) {
            require_once "Mail.php";
            $from = "<taximasr2013@gmail.com>";
            $to = "<$femail>";
            $subject = "Friend request";
            $c1 = $username . " طلب إنه يكون صديقك ";
            $c2 = "http://localhost/taximasr/index.php/users/addfriend?id=" . $uid . "&mail=" . $femail;
            $body = $c1 . $c2;

            $host = "smtp.gmail.com";
            $port = "587";
            $username = "taximasr2013@gmail.com";
            $password = "taximasrproject";
            $headers = array('From' => $from,
                'To' => $to,
                'Subject' => $subject);
            $smtp = Mail::factory('smtp', array('host' => $host,
                        'port' => $port,
                        'auth' => true,
                        'username' => $username,
                        'password' => $password));
            $mail = $smtp->send($to, $headers, $body);

            if (PEAR::isError($mail)) {
                echo("<p>" . $mail->getMessage() . "</p>");
            } else {
                //echo("<p>Message successfully sent!</p>");
                $sp = base_url('index.php/users/sent');
                header("Location: $sp");
            }
        } else {
            $sp = base_url('index.php/users/addfriend_v');
            header("Location: $sp");
        }
    }

    public function insertfm($uid, $femail) {
        // $statement2= "UPDATE `friends` SET `friend_id`='$userid' WHERE `user_id`='$uid'";
        // $this->db->query($statement); 


        $statement1 = "SELECT `user_id` FROM `users` WHERE `email`='$femail'";
        $useridf = $this->db->query($statement1);
        $row = $useridf->row();
        $useridf = $row->user_id;
        $ch_id = rand();
        $statement2 = "INSERT INTO `friends` (user_id,friend_id,channel) VALUES ('$uid','$useridf','$ch_id')";
        $this->db->query($statement2);
        $statement3 = "INSERT INTO `friends` (user_id,friend_id,channel) VALUES ('$useridf','$uid','$ch_id')";
        $this->db->query($statement3);
    }

    public function reset_pass($email, $password, $pass) {

        $statement = "SELECT * FROM `users` WHERE `email` = '$email'";
        $check = $this->db->query($statement);
        $check = $check->row();
        $check = $check->email;
        $statement2 = "SELECT `username` FROM `users` WHERE `user_id`='$uid'";
        $username = $this->db->query($statement2);
        $row = $username->row();
        $username = $row->username;
        if ($check == $email) {
            $this->db->query("UPDATE users SET password_sha2='$password' WHERE email='$email'");
            require_once "Mail.php";
            $from = "<taximasr2013@gmail.com>";
            $to = "<$email>";
            $subject = "Reset password";
            $c1 = " طلب اعادة كلمة السر ";
            $c2 = "كلمة السر الجديده هي :" . $pass;
//$c3= <a href="">رفض</a>.<br> ;
            $body = $c1 . $c2;
//$body =$c2;
            $host = "smtp.gmail.com";
            $port = "587";
            $username = "taximasr2013@gmail.com";
            $password = "taximasrproject";
            $headers = array('From' => $from,
                'To' => $to,
                'Subject' => $subject);
            $smtp = Mail::factory('smtp', array('host' => $host,
                        'port' => $port,
                        'auth' => true,
                        'username' => $username,
                        'password' => $password));
            $mail = $smtp->send($to, $headers, $body);
            if (PEAR::isError($mail)) {
                echo("<p>" . $mail->getMessage() . "</p>");
            } else {
//echo("<p>Message successfully sent!</p>");
                $sp = base_url('index.php/users/signin');
                header("Location: $sp");
            }
        } else {

            $sp = base_url('index.php/users/failed');
            header("Location: $sp");
        }
    }

    public function edit($data) {
        $e_mail = $data['e_mail'];
        $n_mail = $data['n_mail'];
        $uname = $data['uname'];
        $user_id = $data['user_id'];
        $this->db->query("UPDATE users SET email='$e_mail' WHERE user_id='$user_id'");
        $this->db->query("UPDATE users SET notify_email='$n_mail' WHERE user_id='$user_id'");
        $this->db->query("UPDATE users SET username='$uname' WHERE user_id='$user_id'");
    }

    public function insertloc($id, $x, $y) {
        $statement2 = "INSERT INTO `locations` (user_id,longitude,Latitude) VALUES ('$id','$y','$x')";
        $this->db->query($statement2);
    }

    public function ride($tno, $id) {
        $statement1 = "SELECT * FROM `taxis` WHERE `taxi_number` = '$tno'";
        $check = $this->db->query($statement1);
        $row = $check->row();
        $taxi_id = $row->taxi_id;
        $statement2 = "INSERT INTO `riding` (user_id,taxi_id) VALUES ('$id','$taxi_id')";
        $this->db->query($statement2);
        return $taxi_id;
    }

    public function start($user_id, $taxi_id) {
        echo $statement3 = "UPDATE riding SET start_time='" . date('Y-m-d H:i:s', time()) . "' WHERE user_id='$user_id' and taxi_id='$taxi_id'";
        $check = $this->db->query($statement3);
    }

    public function stop($user_id, $taxi_id) {
        echo $statement4 = "UPDATE riding SET end_time='" . date('Y-m-d H:i:s', time()) . "' WHERE user_id='$user_id' and taxi_id='$taxi_id'";
        $check = $this->db->query($statement4);
        $statement5 = "SELECT max(rid_id) as f_rid_id from riding";
        $query = $this->db->query($statement5);
        foreach ($query->result() as $row) {
            $for_rid_id = $row->f_rid_id;
        }
//return $for_rid_id;
        echo $statement8 = "UPDATE locations SET rid_id='$for_rid_id' WHERE rid_id is null and user_id='$user_id'";
        $check = $this->db->query($statement8);
    }

    public function find_friends($user_id) {
        $friends = array();
        $query = $this->db->query("select distinct a.username as username from users u join friends f join users a on u.user_id=f.user_id and u.user_id='$user_id' and a.user_id=f.friend_id or a.user_id=f.user_id and a.user_id !='$user_id'");
        $count = 0;
        foreach ($query->result() as $row) {
            $friends[$count++] = $row->username;
        }
        return $friends;



//echo $statement3 = "UPDATE riding SET start_time='" . date('Y-m-d H:i:s',time()) ."' WHERE user_id='$user_id' and taxi_id='$taxi_id'";
//$check = $this->db->query($statement3);
    }

    public function get_track($user_name) {
        $route = array();
        $m_rid_id = 1;
        $query = $this->db->query("select max(rid_id) as m_rid_id from locations l join users u on u.user_id=l.user_id and u.username='$user_name'");
        foreach ($query->result() as $row) {
            $m_rid_id = $row->m_rid_id;
        }
        $query1 = $this->db->query("select l.latitude as lat , l.longitude as lon from users u join locations l on u.user_id=l.user_id and u.username='$user_name'");
        $count1 = 0;
        $count2 = 0;

        foreach ($query1->result() as $row) {
            $route['latitude'][$count1++] = $row->lat;
            $route['longitude'][$count2++] = $row->lon;
        }
        return $route;
    }

}

?>
