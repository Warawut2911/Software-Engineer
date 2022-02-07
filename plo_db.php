<?php
    include('dbconnect.php');
    if(isset($_POST['reg_main'])){
        $reg_plo_id = (int)$_POST['reg_plo_id'];
        $reg_plo_des = $_POST['reg_plo_des'];

        //Check ID of main plo yet?
        $check_ploid_db = "SELECT * FROM main_plo WHERE plo_id = $reg_plo_id";
        $check_plo = mysqli_query($con, $check_ploid_db);
        $ck_row_mplo = mysqli_fetch_array($check_plo);
        if(empty($ck_row_mplo)){
            $reg_plo_db = "INSERT INTO main_plo(plo_id, plo_des) VALUES($reg_plo_id, '$reg_plo_des')";
            $reg_main_query = mysqli_query($con, $reg_plo_db) or die ("ไม่สำเสร็จ". mysqli_error($con));
            echo "<script>alert('เพิ่มวัตถุประสงค์แล้วเรียบร้อย');window.location.href='plo.php'</script>";
        }else{
            echo "<script>alert('มีวัตถุประสงค์ข้อนี้แล้ว กรุณาลองใหม่');history.back(-1)</script>";
            
        }

        

    }elseif(isset($_POST['reg_sub'])){
        $reg_plo_id = (int)$_POST['reg_mplo_id'];
        $reg_sub_id = (int)$_POST['reg_sub_id'];
        $reg_sub_des = $_POST['reg_sub_des'];

        //Check ID of main plo yet?
        $check_ploid_db = "SELECT * FROM sub_plo WHERE main_plo_id = $reg_plo_id AND sub_plo_id =  $reg_sub_id";
        $check_plo = mysqli_query($con, $check_ploid_db);
        $ck_row_mplo = mysqli_fetch_array($check_plo);
        if(empty($ck_row_mplo)){
            $reg_plo_db = "INSERT INTO sub_plo(main_plo_id, sub_plo_id, sub_plo_des) VALUES($reg_plo_id, $reg_sub_id, '$reg_sub_des')";
            $reg_main_query = mysqli_query($con, $reg_plo_db) or die ("ไม่สำเสร็จ". mysqli_error($con));
            echo "<script>alert('เพิ่มวัตถุประสงค์ย่อยแล้วเรียบร้อย');window.location.href='plo.php'</script>";
        }else{
            echo "<script>alert('มีวัตถุประสงค์หลัก และวัตถุประสงค์ย่อย ข้อนี้แล้ว กรุณาลองใหม่');history.back(-1)</script>";
            
        }
    }elseif(isset($_POST['up_main'])){
        $up_mid = (int)$_POST['up_plo_id'];
        $up_mdes = $_POST['up_plo_des'];

        $upm_db = "UPDATE main_plo SET plo_des = '$up_mdes' WHERE plo_id = $up_mid";
        $up_mquery = mysqli_query($con, $upm_db);
        if(!$up_mquery){
            echo mysqli_error($con);
        }else{
            echo "<script>alert('แก้ไขเรียบร้อย');window.location.href='plo.php'</script>";
        }
    }elseif(isset($_POST['up_sub'])){
        $up_mid = (int)$_POST['up_main_id'];
        $up_sid = (int)$_POST['up_sub_id'];
        $up_sdes = $_POST['up_sub_des'];

        $ups_db = "UPDATE sub_plo 
        SET main_plo_id = $up_mid,
        sub_plo_id = $up_sid,
        sub_plo_des = '$up_sdes'
        WHERE main_plo_id = $up_mid AND sub_plo_id = $up_sid";
        $up_squery = mysqli_query($con, $ups_db);
        if(!$up_squery){
            echo mysqli_error($con);
        }else{
            echo "<script>alert('แก้ไขเรียบร้อย');window.location.href='plo.php'</script>";
        }

    }
?>