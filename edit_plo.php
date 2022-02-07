<?php
  include('header.php');
?>
<!--                  EDIT Main Plos                  -->
<?php if(isset($_GET['edit_p'])):
  $p_id = $_GET['edit_p'];
  $p_db = "SELECT * FROM main_plo WHERE plo_id = '$p_id'";
  $p_query = mysqli_query($con, $p_db);
  $p_row = mysqli_fetch_array($p_query);
  ?>
  <div class="text-center">
    <h2>แก้ไขวัตถุประสงค์หลัก</h2>
  </div>
  <div class="d-flex justify-content-start" style="padding-left: 6rem; margin: 1rem;">
      <span class="badge bg-warning" style="padding: 10px;">แก้ไขวัตถุประสงค์หลัก</span>
  </div>
    <div class="d-flex justify-content-center" style="margin-top: 1rem;">
        <div class="card border-primary" style="border-radius: 10px; width:88%;">
            <form action="plo_db.php" method="POST" onsubmit="return confirm('ยืนยันการแก้ไข วัตถุประสงค์หลัก ข้อที่<?php echo $p_row['plo_id'];?> ใช่ หรือไม่?')">
                <div class="mb-3" style="padding: 1rem;">
                    <label for="up_plo_id" class="form-label">วัตถุประสงค์หลัก หัวข้อที่</label>
                    <input readonly type="number" min="0" class="form-control" id="up_plo_id" name="up_plo_id" value="<?php echo $p_row['plo_id']; ?>"  style="width:10%">
                </div>
                <div class="mb-3" style="padding: 1rem;">
                    <label for="up_plo_des" class="form-label">รายละเอียดวัตถุประสงค์หลัก</label>
                    <textarea class="form-control" id="up_plo_des" name="up_plo_des" rows="2"><?php echo $p_row['plo_des']; ?></textarea>
                </div>
                <div class="d-flex justify-content-end" style="padding: 1rem;">
                    <button type="submit" name="up_main" class="btn btn-outline-success">ยืนยัน</button>
                    <button type="button" onclick="history.back(-1)" class="btn btn-danger" name="reg_plo_btn" style="margin-left: 1rem;">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>

<!--                  EDIT Sub Plos                  -->
<?php elseif(isset($_GET['edit_s'])):
  $s_id = $_GET['edit_s'];
  $s_id = str_split($s_id);   //index 0 is plo_id and index 1 is sub_plo_id
  $s_db = "SELECT * FROM sub_plo WHERE main_plo_id = $s_id[0] AND sub_plo_id = $s_id[1]";
  $s_query = mysqli_query($con, $s_db);
  $s_row = mysqli_fetch_array($s_query);
?>
<div class="text-center" style="margin-top: 3rem;">
    <h2>แก้ไขวัตถุประสงค์ย่อย</h2>
</div>
<div class="d-flex justify-content-start" style="padding-left: 6rem; margin: 1rem;">
    <span class="badge bg-warning" style="padding: 10px;">แก้ไขวัตถุประสงค์ย่อย</span>
</div>
<div class="d-flex justify-content-center" style="margin-top: 1rem;">
    <div class="card border-warning" style="border-radius: 10px; width:88%; margin-bottom: 1rem;">
        <form action="plo_db.php" method="POST" onsubmit="return confirm('ยืนยันการแก้ไข วัตถุประสงค์หลัก ข้อที่<?php echo $s_row['main_plo_id'];?> วัตถุประสงค์ย่อย ข้อที่<?php echo $s_row['sub_plo_id'];?> ใช่ หรือไม่?')">
            <div class="mb-3" style="padding: 1rem;">
                <label for="reg_plo_id" class="form-label">วัตถุประสงค์หลัก หัวข้อที่</label>
                <input readonly type="number" min="0" class="form-control" id="up_main_id" name="up_main_id" style="width: 10%;" value="<?php echo $s_row['main_plo_id']; ?>"> 

                <label for="reg_sub_id" class="form-label">หัวข้อวัตถุประสงค์ย่อย</label>
                <input readonly type="number" min="0" class="form-control" id="up_sub_id" name="up_sub_id" style="width: 10%;" value="<?php echo $s_row['sub_plo_id']; ?>">
            </div>
            <div class="mb-3" style="padding: 1rem;">
                <label for="reg_sub_des" class="form-label">รายละเอียดวัตถุประสงค์ย่อย</label>
                <textarea class="form-control" id="up_plo_des" name="up_sub_des" rows="2"><?php echo $s_row['sub_plo_des']; ?></textarea>
            </div>
            <div class="d-flex justify-content-end" style="padding: 1rem;">
                    <button type="submit" name="up_sub" class="btn btn-outline-success">ยืนยัน</button>
                    <button type="button" onclick="history.back(-1)" class="btn btn-danger" name="reg_plo_btn" style="margin-left: 1rem;">ยกเลิก</button>
                </div>
        </form>
    </div>
</div>
<?php endif ?>