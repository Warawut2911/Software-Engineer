<?php
    include('header.php');
    $id = (int)$_GET['subj_id'];
    $s_db = "SELECT * FROM subject WHERE subject_id = $id";
    $s_query = mysqli_query($con, $s_db);
    $row_s = mysqli_fetch_array($s_query);

    $clo_db = "SELECT * FROM clo WHERE subject_id = $id";
    $clo_query = mysqli_query($con, $clo_db);

    $pre_db = "SELECT * FROM prequisite WHERE subject_id = $id ORDER BY CHAR_LENGTH(pre_condition)";
    $pre_query = mysqli_query($con, $pre_db);
    $count = mysqli_num_rows($pre_query);
    $requisite = array();
    if($count == 0){
        array_push($requisite, "ไม่มีวิชา Prerequisite");
    }

    for($i=0; $i<$count; $i++){
        $r_q = mysqli_fetch_assoc($pre_query);
        $pre = explode(",", $r_q['pre_condition']);
        if(count($pre) > 1){
            for($j = 0; $j < count($pre); $j++){
                if($j > 0 ){
                    array_push($requisite, " OR ");
            
                }else{
                    array_push($requisite, "( ");
                }
                array_push($requisite, "$pre[$j]");
                if($j == (count($pre) -1)){
                    array_push($requisite, " )");
                }
            }
        }else{
            array_push($requisite, $r_q['pre_condition']);
            if($count > 1 ){
                array_push($requisite, " AND ");
            }
        }
        
    }

    $s_db = "SELECT * FROM clo_score WHERE subject_id = $id";
    $s_con  = mysqli_query($con, $s_db);

?>
<div class="d-flex justify-content-center">
    <span class="badge bg-primary" style="padding: 5px; border-radius:15px;"><h2>ข้อมูลรายวิชา</h2></span>
</div>
<div class="d-flex bd-highlight" style="margin: 1rem;">
    <div class="p-2 flex-grow-1 bd-highlight" style="margin: 1rem;"> </div>
    <div class="p-2 bd-highlight">
        <a href="prerequisite.php?id=<?php echo $id;?>" class="btn btn-info">จัดการ Prerequisite</a>
    </div>
    <div class="p-2 bd-highlight">
        <a href="score.php?id=<?php echo $id;?>" class="btn btn-primary">จัดการการให้คะแนน</a>
    </div>
    <div class="p-2 bd-highlight">
        <a href="edit_subject.php?id=<?php echo $id;?>" class="btn btn-warning">แก้ไขข้อมูล</a>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="card" style="width: 90%; margin:1rem;">
        <div class="d-flex justify-content-center">
            <div class="md-3" style="margin: 1rem;">
                <h5 class="text-center">รหัสวิชา</h5>
                <input readonly type="number" id="subj_id" name="subj_id" class="form-control" value="<?php echo $row_s['subject_id']; ?>">
            </div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="md-3">
                <h5 class="text-center">ชื่อวิชา</h5>
                <input readonly type="text" id="t_name" name="t_name" class="form-control" value="<?php echo $row_s['t_name']; ?>"> 
            </div>
            <div class="md-3">
                <h5 class="text-center">Name</h5>
                <input readonly type="text" id="e_name" name="e_name" class="form-control" value="<?php echo $row_s['e_name']; ?>"> 
            </div>
        </div>
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="md-3" style="margin: 1rem;">
                    <label for="t_det" class="form-label">รายละเอียด</label>
                    <textarea readonly name="t_det" id="t_det" class="form-control" rows="3"><?php echo $row_s['t_detail'] ?></textarea>
                </div>
            </div>
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="md-3" style="margin: 1rem;">
                    <label for="d_det" class="form-label">Detail</label>
                    <textarea readonly name="e_det" id="e_det" class="form-control" rows="3"><?php echo $row_s['e_detail'] ?></textarea> 
                </div>
            </div>
        </div>
        <div class="md-3" style="margin: 1rem;">
            <label for="outline" class="form-label">Course Outline</label>
            <textarea readonly name="outline" id="outline" rows="5" class="form-control"><?php echo $row_s['course_outline']; ?></textarea>
        </div>
        <div class="d-flex justify-content-evenly" style="margin: 1rem;">
            <div class="md-3">
                <label for="type" class="form-label">ประเภทการสอน</label>
                <input readonly type="text" name="type" id="type" class="form-control" value="<?php echo $row_s['type']; ?>">
            </div>
            <div class="md-3">
                <label for="credits" class="form-label">จำนวนหน่วยกิต</label>
                <input readonly type="number" name="credits" id="credits" class="form-control" value="<?php echo $row_s['credits']; ?>">
            </div>
            <div class="md-3">
                <label for="lec_credits" class="form-label">หน่วยกิตบรรยาย</label>
                <input readonly type="number" name="lec_credits" id="lec_credits" class="form-control" value="<?php echo $row_s['lec_credits']; ?>">
            </div>
            <div class="md-3">
                <label for="lab_credits" class="form-label">หน่วยกิตปฎิบัติ</label>
                <input readonly type="number" name="lab_credits" id="lab_credits" class="form-control" value="<?php echo $row_s['lab_credits']; ?>">
            </div>
        </div>
        <span class="text-center">วัตถุประสงค์ของกระบวนวิชา</span>
        <table class="table table-striped" style="margin-top:1rem">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ข้อที่</th>
                    <th scope="col" class="text-center" colspan="2">รายละเอียด</th>
                    <th scope="col" class="text-center">ตรงกับวัตถุประสงค์หลักข้อที่</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_clo = mysqli_fetch_assoc($clo_query)): ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $row_clo['clo_id'];?></th>
                    <th scope="row" colspan="2"><?php echo $row_clo['clo_des']; ?></th>
                    <?php
                        $clo_id = $row_clo['clo_id']; 
                        $match_db = "SELECT * FROM matching WHERE subject_id = $id AND clo_id = $clo_id";
                        $match_query = mysqli_query($con, $match_db);
                        $r_matching = mysqli_fetch_array($match_query);
                    ?>
                    <th scope="row" class="text-center">
                        <?php
                            if(!$r_matching){
                                echo "ยังไม่ได้ระบุ";
                            }else{
                                
                                echo $r_matching['main_plo'],'.',$r_matching['sub_plo'];
                            }
                        ?>
                    </th>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <span class="text-center">วิชา Prerequisite</span>
        <div class="md-3" style="margin: 1rem;">
            <input readonly type="text" name="pre_re" id="pre_re" class="form-control" value="<?php for($i = 0; $i < count($requisite); $i++){echo $requisite[$i];}; ?>">
        </div>
        <span class="text-center">สัดส่วนคะแนน</span>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center" style="width: 8%;">สัดส่วนที่</th></th>
                    <th scope="col" style="width: 10%;">วัตถุประสงค์ข้อที่</th>
                    <th scope="col" class="text-center">รูปแบบ</th>
                    <th scope="col"class="text-center">เปอร์เซ็น</th>
                </tr>
            </thead>
            <tbody>
                <?php while($s_row = mysqli_fetch_assoc($s_con)): $c =1; ?>
                    <tr>
                        <td class="text-center"><?php echo $c; ?></td>
                        <td class="text-center"><?php echo $s_row['clo_id']; ?></td>
                        <td class="text-center"><?php echo $s_row['type']; ?></td>
                        <td class="text-center"><?php echo $s_row['percent']; $c++; ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>
<div class="p-2 flex-grow-1 bd-highlight" style="margin: 1rem;">
        <a class="btn btn-danger" href="subject.php">ย้อนกลับ</a>
    </div>
