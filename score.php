<?php
    include('header.php');

    $id = (int)$_GET['id'];
    $cdb = "SELECT * FROM clo WHERE subject_id = $id";
    $ccon = mysqli_query($con, $cdb);

    $cs_db = "SELECT * FROM clo_score WHERE subject_id = $id";
    $cs_con = mysqli_query($con, $cs_db);
?>

<div class="d-flex justify-content-center">
    <span class="badge bg-primary" style="font-size: 20px;">จัดการสัดส่วนคะแนน</span>
</div>
<div class="d-flex justify-content-center">
    <div class="card" style="width: 90%; margin:1rem;">
        <div class="d-flex justify-content-center">
            <div class="md-3" style="margin: 1rem;">
                <h5 class="text-center">รหัสวิชา</h5>
                <input readonly type="number" id="subj_id" name="subj_id" class="form-control" value="<?php echo $id; ?>">
            </div>
        </div>
        <?php if(mysqli_num_rows($cs_con) != 0): ?>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center" style="width: 8%;">สัดส่วนที่</th></th>
                    <th scope="col" style="width: 10%;">วัตถุประสงค์ข้อที่</th>
                    <th scope="col" class="text-center">รูปแบบ</th>
                    <th scope="col"class="text-center">เปอร์เซ็น</th>
                    <th scope="col" style="width: 8%;"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($s_row = mysqli_fetch_assoc($cs_con)): $c =1; ?>
                    <form action="subject_db.php" method="POST">
                        <input hidden type="number" name="id" id="id" value="<?php echo $id;?>">
                    <tr>
                        <td class="text-center"><?php echo $c; ?></td>
                        <td class="text-center"><?php echo $s_row['clo_id']; ?></td>
                        <td class="text-center"><?php echo $s_row['type']; ?></td>
                        <td class="text-center"><?php echo $s_row['percent']; $c++; ?></td>
                        <td class="text-center">
                            <input type="submit" name="e_score" id="e_score" class="btn btn-outline-warning" value="แก้ไข">
                        </td>
                    </tr>
                    </form>
                <?php endwhile ?>
            </tbody>
        </table>
        <?php endif ?>
        <div class="d-flex justify-content-end" style="margin: 1rem;">
            <button type="button" name="add" id="add" class="btn btn-success">เพิ่ม</button>
        </div>
        <form action="subject_db.php" name="add_score" id="add_pre" method="post">
            <input hidden type="number" name="id" id="id" value="<?php echo $id; ?>">
            <table class="table table-bordered" id="add_new">
                <thead>
                    <tr>
                        <th scope="col">วัตถุประสงค์ข้อที่</th>
                        <th scope="col">รูปแบบ</th>
                        <th scope="col">เปอร์เซ็น</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="add_row">
                    <tr>
                        <td>
                            <select name="cid[]" id="cid[]" class="form-select form-select-lg mb-3">
                                <option disabled selected></option>
                                <?php while($row = mysqli_fetch_assoc($ccon)): ?>
                                    <option value="<?php echo $row['clo_id']; ?>"><?php echo $row['clo_id']; ?></option>
                                <?php endwhile ?>
                                <?php $ccon = mysqli_query($con, $cdb); ?>
                            </select>
                        </td>
                        <td><input type="text" name="ty[]" class="form-control name_list"></td>
                        <td><input type="number" min="0" name="pc[]" class="form-control name_list"></td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <input type="submit" name="s_sub" id="s_sub" value="ยืนยัน" class="btn btn-primary" style="margin: 1rem;">
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        let i = 1;
        $('#add').click(function(){
            i++;
            $('#add_row').append(
                '<tr id="row'+i+'">'+
                '<td><select name="cid[]" id="cid[]" class="form-select form-select-lg mb-3">'+
                '<option disabled selected></option>'+
                '<?php while($row = mysqli_fetch_assoc($ccon)): ?>'+
                    '<option value="<?php echo $row['clo_id']; ?>"><?php echo $row['clo_id']; ?></option>'+
                '<?php endwhile ?>'+
                '<?php $ccon = mysqli_query($con, $cdb); ?>'+
                '</select></td>'+
                '<td><input type="text" name="ty[]" class="form-control name_list"></td>'+
                '<td><input type="number" min="0" name="pc[]" class="form-control name_list"></td>'+
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">ลบ</button></td></tr>')
        })

        $(document).on('click', '.btn_remove', function(){
            let button_id = $(this).attr('id');
            $('#row'+button_id+'').remove();
        })
    })
</script>