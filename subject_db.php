<?php
    include('dbconnect.php');

    if(isset($_POST['up_subject'])){
        $id = (int)$_POST['subj_id'];
        $t_name = $_POST['t_name'];
        $e_name = $_POST['e_name'];
        $t_det = $_POST['t_det'];
        $e_det = $_POST['e_det'];
        $outline = $_POST['outline'];
        $type = $_POST['type'];
        $credits = (int)$_POST['credits'];
        $lec = (int)$_POST['lec_credits'];
        $lab = (int)$_POST['lab_credits'];

        $up_subj_db = "UPDATE subject 
        SET t_name = '$t_name',
            e_name = '$e_name',
            t_detail = '$t_det',
            e_detail = '$e_det',
            course_outline = '$outline',
            type = '$type',
            credits = $credits,
            lec_credits = $lec,
            lab_credits = $lab
        WHERE subject_id = $id";

        $up_query = mysqli_query($con, $up_subj_db);
        if (!$up_query){
            echo mysqli_error($con);
        }else{
            echo "<script>alert('แก้ไขเรียบร้อย');window.location.href='subject.php?'</script>";
        }

    }

    if(isset($_POST['submit'])){
        //Count number of pre
        $count = count($_POST['pre']);
        $pre = $_POST['pre'];

        $id = (int)$_POST['id'];

        if($count >0){
            for($i =0; $i < $count; $i++){
                $sql = mysqli_query($con, "INSERT INTO prequisite(subject_id, pre_condition) VALUES($id, '$pre[$i]')");
            }
            echo "<script>alert('เพิ่ม Prerequisite เรียบร้อย');window.location.href='prerequisite.php?id=$id'</script>";
        }
    }

    if(isset($_POST['del'])){
        $id = (int)$_POST['id'];
        $va = $_POST['condition'];
        $del_sql = mysqli_query($con, "DELETE FROM prequisite WHERE subject_id = $id AND pre_condition = '$va'");
        if($del_sql){
            echo "<script>alert('ลบ Prerequisite แล้ว');window.location.href='prerequisite.php?id=$id'</script>";
        }
    }

    
    if(isset($_POST['reg_subject'])){
        $id = (int)$_POST['subj_id'];
        $t_name = $_POST['t_name'];
        $e_name = $_POST['e_name'];
        $t_det = $_POST['t_det'];
        $e_det = $_POST['e_det'];
        $outline = $_POST['outline'];
        $type = $_POST['type'];
        $credits = (int)$_POST['credits'];
        $lec = (int)$_POST['lec_credits'];
        $lab = (int)$_POST['lab_credits'];

        $check_id = "SELECT * FROM subject WHERE subject_id = $id";
        $check_idcon = mysqli_query($con, $check_id);
        if(mysqli_num_rows($check_idcon) == 0 ){
            $reg_subj_db = "INSERT INTO subject(subject_id, t_name, e_name, t_detail, e_detail, course_outline, type, credits, lec_credits, lab_credits)
                        VALUES($id, '$t_name', '$e_name', '$t_det', '$e_det', '$outline', '$type', $credits, $lec, $lab)";
            $up_query = mysqli_query($con, $reg_subj_db);
            if (!$up_query){
                echo mysqli_error($con);
            }else{
                echo "<script>alert('เพิ่มกระบวนวิชาเรียบร้อยแล้ว เพิ่มวัตถุประสงค์');window.location.href='clo.php?id=$id'</script>";
            }
        }else{
            echo "<script>alert(' มีรหัสวิชานี้แล้ว กรุณาแก้ไข');history.back(-1);</script>";
        }

    }

    if(isset($_POST['reg_clo'])){
        //Count number of pre
        $count = count($_POST['cid']);
        $cid = $_POST['cid'];
        $cdes = $_POST['cdes'];

        $id = (int)$_POST['id'];

        if($count >0){
            for($i =0; $i < $count; $i++){
                $cid[$i] = (int)$cid[$i];
                if( mysqli_num_rows(mysqli_query($con, "SELECT * FROM clo WHERE subject_id = $id and clo_id = $cid[$i]")) > 0 ){
                    echo "<script>alert('มีวัตถุประสงค์ข้อนี้แล้ว กรุณาระบุใหม่');history.back(-1);</script>";
                }else{
                    $sql = mysqli_query($con, "INSERT INTO clo(subject_id, clo_id, clo_des) VALUES($id, $cid[$i], '$cdes[$i]')");
                }
                
            }
            echo "<script>alert('เพิ่มวัตถุประสงค์เรียบร้อย');window.location.href='matching.php?id=$id'</script>";
        }
    }

    if(isset($_POST['mpid'])){
        $mpid = (int)$_POST['mpid'];

        $splo = "SELECT * FROM sub_plo WHERE main_plo_id = $mpid";
        $sid = mysqli_query($con, $splo);
        echo '<option disabled selected value=""</option>';
        foreach($sid as $value){
            echo '<option value="'.$value['sub_plo_id'].'">'.$value['sub_plo_id'].'</option>';
        }
    
    }

    if(isset($_POST['mat'])){
        $id = (int)$_POST['id'];
        $cid = (int)$_POST['cid'];
        $mid = (int)$_POST['mplo'];
        $sid = (int)$_POST['splo'];

        $mat_db = "INSERT INTO matching(clo_id, subject_id, main_plo, sub_plo) 
        VALUES($cid, $id, $mid, $sid)"; 
        $mat_con = mysqli_query($con, $mat_db);
        if($mat_con){
            echo "<script>alert('เรียบร้อย');history.back(-1);</script>";
        }else{
            $err = mysqli_error($con);
            echo "<script>alert(' มีข้อผิดพลาด $err ');history.back(-1);</script>";
        }
    }
    if(isset($_POST['mat_up'])){
        $id = (int)$_POST['id'];
        $cid = (int)$_POST['cid'];
        $mid = (int)$_POST['mplo'];
        $sid = (int)$_POST['splo'];

        $mat_db = "UPDATE matching
                SET main_plo = $mid,
                sub_plo = $sid
                WHERE clo_id = $cid AND subject_id = $id"; 
        $mat_con = mysqli_query($con, $mat_db);
        if($mat_con){
            echo "<script>alert('แก้ไขเรียบร้อย');history.back(-1);</script>";
        }else{
            $err = mysqli_error($con);
            echo "<script>alert(' มีข้อผิดพลาด $err ');history.back(-1);</script>";
        }
    }
    if(isset($_POST['s_sub'])){
        //Count number of pre
        $count = count($_POST['pc']);
        $cid = $_POST['cid'];
        $ty = $_POST['ty'];
        $per = $_POST['pc'];

        $id = (int)$_POST['id'];

        $have_db = "SELECT * FROM clo_score WHERE subject_id = $id";
        $have_con  = mysqli_query($con, $have_db);
        $sum = 0;
        if($count >0){
            for($i =0; $i < $count; $i++){
                $sum += $per[$i];
                echo "<script>alert('per = $per[$i] ');</script>";
            }
            if($sum != 100){
                echo "<script>alert(' สัดส่วน = $sum ไม่ครบ 100% ');history.back(-1);</script>";
            }else{
                for($i =0; $i < $count; $i++){
                    $sql = mysqli_query($con, "INSERT INTO clo_score(subject_id, clo_id, type, percent) VALUES ($id, $cid[$i], '$ty[$i]', $per[$i])");
                }
                echo "<script>alert('เสร็จสิ้นเรียบร้อย');window.location.href='subject_detail.php?subj_id=$id'</script>";
            }
        }else{
            echo "<script>alert(' ไม่มีข้อมูล ');history.back(-1);</script>";
        }
    }
?>