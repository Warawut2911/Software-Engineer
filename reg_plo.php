<?php
    include('header.php');
    $plo = "SELECT plo_id FROM main_plo";
    $plo_query = mysqli_query($con, $plo);

?>
<br>
<div class="text-center">
    <h2>ลงทะเบียนวัตถุประสงค์</h2>
</div>
<div class="d-flex justify-content-start" style="padding-left: 6rem; margin: 1rem;">
    <span class="badge bg-primary" style="padding: 10px;">วัตถุประสงค์หลัก</span>
</div>
<!-- INSERT Main Plos -->
    <div class="d-flex justify-content-center" style="margin-top: 1rem;">
        <div class="card border-primary" style="border-radius: 10px; width:88%;">
            <form action="plo_db.php" method="POST">
                <div class="mb-3" style="padding: 1rem;">
                    <label for="reg_plo_id" class="form-label">วัตถุประสงค์หลัก หัวข้อที่</label>
                    <input type="number" min="1" class="form-control" id="reg_plo_id" name="reg_plo_id"  style="width:10%">
                </div>
                <div class="mb-3" style="padding: 1rem;">
                    <label for="reg_plo_des" class="form-label">รายละเอียดวัตถุประสงค์หลัก</label>
                    <textarea class="form-control" id="reg_plo_des" name="reg_plo_des" rows="2"></textarea>
                </div>
                <div class="d-flex justify-content-end" style="padding: 1rem;">
          b   x7 t6u          <button type="submit" name="reg_main" class="btn btn-success">ยืนยัน</button>
                    <button type="reset" class="btn btn-outline-warning" name="reg_plo_btn" style="margin-left: 1rem;">ล้าง</button>
                </div>
            </form>
        </div>
    </div>
<!-- PART INSERT OF Sub PLO Register -->
<div class="text-center" style="margin-top: 3rem;">
    <h2>ลงทะเบียนวัตถุประสงค์ย่อย</h2>
</div>
<div class="d-flex justify-content-start" style="padding-left: 6rem; margin: 1rem;">
    <span class="badge bg-secondary" style="padding: 10px;">วัตถุประสงค์ย่อย</span>
</div>
<div class="d-flex justify-content-center" style="margin-top: 1rem;">
    <div class="card border-warning" style="border-radius: 10px; width:88%; margin-bottom: 1rem;">
        <form action="plo_db.php" method="POST">
            <div class="mb-3" style="padding: 1rem;">
                <label for="reg_plo_id" class="form-label">วัตถุประสงค์หลัก หัวข้อที่</label>
                <select class="form-select form-select-lg mb-3" style="width: 10%;" id="reg_mplo_id" name="reg_mplo_id">
                    <option disabled selected></option>
                    <?php
                    $plo_query = mysqli_query($con, $plo);
                    while($id = mysqli_fetch_assoc($plo_query)): ?>
                        <option value="<?php echo $id['plo_id']; ?>"><?php echo $id['plo_id']; ?></option>
                    <?php endwhile ?>
                </select>
                <label for="reg_sub_id" class="form-label">หัวข้อวัตถุประสงค์ย่อย</label>
                <input type="number" min="1" class="form-control" id="reg_sub_id" name="reg_sub_id" style="width: 10%;">
            </div>
            <div class="mb-3" style="padding: 1rem;">
                <label for="reg_sub_des" class="form-label">รายละเอียดวัตถุประสงค์ย่อย</label>
                <textarea class="form-control" id="reg_plo_des" name="reg_sub_des" rows="2"></textarea>
            </div>
            <div class="d-flex justify-content-end" style="padding: 1rem;">
                <button type="submit" name="reg_sub" class="btn btn-success">ยืนยัน</button>
                <button type="reset" class="btn btn-outline-warning" name="reg_sub_btn" style="margin-left: 1rem;">ล้าง</button>
            </div>
        </form>
    </div>
</div>