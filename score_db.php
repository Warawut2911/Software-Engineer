<?php 
    include('dbconnect.php');

    if(isset($_POST['sjid'])){
        $id = (int)$_POST['sjid'];

        $sc_db = "SELECT * FROM clo_score WHERE subject_id = $id";
        $s_con = mysqli_query($con, $sc_db);

        $count = 1;
        foreach($s_con as $value){
            echo '<tr>';
            echo '<td class="text-center">'.$count.'</td>';
            echo '<td class="text-center">'.$value['clo_id'].'</td>';
            echo '<td class="text-center">'.$value['type'].'</td>';
            echo '<td class="text-center">'.$value['percent'].'</td>';
            echo '</tr>';
            $count++;
        }
    }
    if(isset($_POST['file_s'])){
        $target_dir  = "s_upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script>alert(' อัปโหลดไม่สำเร็จ ');history.back(-1);</script>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $result = "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                echo "<script>alert(' $result ');</script>";
            } else {
                echo "<script>alert(' อัปโหลดไม่สำเร็จ2 ');history.back(-1);</script>";
            }
        }
    }
    
    if(isset($_POST['year_cal'])){
        $year = (int)$_POST['year_cal'];

        $term_db = "SELECT DISTINCT term FROM open WHERE year = $year ORDER BY term";
        $term_con = mysqli_query($con, $term_db);

        echo '<option selected disabled value=""></option>';
        foreach($term_con as $value){
            echo '<option value="'.$value['term'].'">'.$value['term'].'</option>';
        }
    }
    if(isset($_POST['term_c'])){
        $year = (int)$_POST['year_c'];
        $term = (int)$_POST['term_c'];
        
        $subj = "SELECT * FROM subject ORDER BY subject_id";
        $subj_con = mysqli_query($con, $subj);

        foreach($subj_con as $value){
            echo '<tr id="s'.$value['subject_id'].'">';

            echo '<input hidden id="id'.$value['subject_id'].'" name="id" value="'.$value['subject_id'].'">';
            echo '<input hidden id="year'.$value['subject_id'].'" name="year" value="'.$value['subject_id'].'">';
            echo '<input hidden id="term'.$value['subject_id'].'" name="term" value="'.$value['subject_id'].'">';

            echo '<td class="text-center">'.$value['subject_id'].'</td>';
            echo '<td class="text-center">'.$value['t_name'].'</td>';
            $id = (int)$value['subject_id'];
            if(mysqli_num_rows(mysqli_query($con, "SELECT subj FROM open WHERE subj = $id AND year = $year AND term = $term")) == 0 ){
                echo '<td id="fix'.$value['subject_id'].'" class="text-center"><input type="submit" class="btn btn-danger add" id="'.$value['subject_id'].'" value="ไม่เปิด"></td>';
            }else{
                echo '<td id="fix'.$value['subject_id'].'" class="text-center"><input type="submit" class="btn btn-success del" id="'.$value['subject_id'].'" value="เปิด"></td>';
            }
            echo '</tr>';
        }
    }
    if(isset($_POST['add_sub'])){
        $id = $_POST['add_sub'];
        $y = $_POST['add_y'];
        $t = $_POST['add_t'];
        $sql = mysqli_query($con, "INSERT INTO open(year,term,subj) VALUES($y, $t, $id)");
        if($sql){
            echo '<input type="submit" class="btn btn-success del" id="'.$id.'" value="เปิด">';
        }else{
            $err = mysqli_error($con);
            echo "<script>aleart('ไม่สำเร็จ $err')</script>";
        }
    }
    if(isset($_POST['del_sub'])){
        $id = (int)$_POST['del_sub'];
        $y = (int)$_POST['del_y'];
        $t = (int)$_POST['del_t'];
        $sql = mysqli_query($con, "DELETE FROM open WHERE year = $y AND term = $t AND subj = $id");
        if($sql){
            echo '<input type="submit" class="btn btn-danger add" id="'.$id.'" value="ไม่เปิด">';
        }else{
            $err = mysqli_error($con);
            echo "<script>aleart('ไม่สำเร็จ $err')</script>";
        }
    }

    if(isset($_POST['fake'])){
        echo '<table class="table table-border">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 10%;">รหัสนักศึกษา</th>
                <th scope="col" class="text-center">แบบที่ 1</th>
                <th scope="col" class="text-center">แบบที่ 2</th>
                <th scope="col" class="text-center">แบบที่ 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">620510123</td>
                <td class="text-center">20</td>
                <td class="text-center">30</td>
                <td class="text-center">20</td>
            </tr>
            <tr>
                <td class="text-center">620510456</td>
                <td class="text-center">18</td>
                <td class="text-center">24</td>
                <td class="text-center">18</td>
            </tr>
            <tr>
                <td class="text-center">620510789</td>
                <td class="text-center">25</td>
                <td class="text-center">50</td>
                <td class="text-center">25</td>
            </tr>
        </tbody>
    </table>';
    }

?>