<?php 
    include('header.php');
?>

<div class="d-flex justify-content-center">
    <span class="badge bg-primary" style="padding: 5px; border-radius:15px;"><h2>เพิ่มกระบวนวิชา</h2></span>
</div>
<form action="subject_db.php" method="POST">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 90%; margin:1rem;">
            <div class="d-flex justify-content-center">
                <div class="md-3" style="margin: 1rem;">
                    <h5 class="text-center">รหัสวิชา</h5>
                    <input   type="number" min="0" max="999999" id="subj_id" name="subj_id" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-evenly">
                <div class="md-3">
                    <h5 class="text-center">ชื่อวิชา</h5>
                    <input  type="text" id="t_name" name="t_name" class="form-control" > 
                </div>
                <div class="md-3">
                    <h5 class="text-center">Name</h5>
                    <input  type="text" id="e_name" name="e_name" class="form-control"> 
                </div>
            </div>
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <div class="md-3" style="margin: 1rem;">
                        <label for="t_det" class="form-label">รายละเอียด</label>
                        <textarea  name="t_det" id="t_det" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="p-2 flex-grow-1 bd-highlight">
                    <div class="md-3" style="margin: 1rem;">
                        <label for="d_det" class="form-label">Detail</label>
                        <textarea   name="e_det" id="e_det" class="form-control" rows="3"></textarea> 
                    </div>
                </div>
            </div>
            <div class="md-3" style="margin: 1rem;">
                <label for="outline" class="form-label">Course Outline</label>
                <textarea   name="outline" id="outline" rows="5" class="form-control"></textarea>
            </div>
            <div class="d-flex justify-content-evenly" style="margin: 1rem;">
                <div class="md-3">
                    <label for="type" class="form-label">ประเภทการสอน</label>
                    <input   type="text" name="type" id="type" class="form-control" >
                </div>
                <div class="md-3">
                    <label for="credits" class="form-label">จำนวนหน่วยกิต</label>
                    <input   type="number" name="credits" id="credits" class="form-control" >
                </div>
                <div class="md-3">
                    <label for="lec_credits" class="form-label">หน่วยกิตบรรยาย</label>
                    <input   type="number" name="lec_credits" id="lec_credits" class="form-control" >
                </div>
                <div class="md-3">
                    <label for="lab_credits" class="form-label">หน่วยกิตปฎิบัติ</label>
                    <input   type="number" name="lab_credits" id="lab_credits" class="form-control" >
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex bd-highlight" style="margin: 1rem;">
        <div class="p-2 flex-grow-1 bd-highlight">
            <span class="btn btn-danger" onclick="history.back(-1)">ย้อนกลับ</span>
        </div>
        <div class="p-2 bd-highlight">
            <button type="submit" name="reg_subject" class="btn btn-success">ยืนยัน</button>
        </div>
    </div>
</form>