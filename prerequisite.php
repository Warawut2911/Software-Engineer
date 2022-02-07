<?php
    include('header.php');

    $id = (int)$_GET['id'];
    $pre_db = "SELECT * FROM prequisite WHERE subject_id = $id";
    $pre_con = mysqli_query($con, $pre_db);
    
    $c = 1;

?>

<div class="text-center">
    <h1 class="badge bg-primary" style="font-size: 24px;">จัดการ Prerequisite</h1>
</div>
<div class="d-flex justify-content-center">
    <div class="card" style="width: 90%; margin: 1rem;">
        <div class="d-flex justify-content-center">
            <div class="md-3" style="margin: 1rem;">
                <h5 class="text-center">รหัสวิชา</h5>
                <input readonly type="number" id="subj_id" name="subj_id" class="form-control" value="<?php echo $id; ?>">
            </div>
        </div>
        <?php if(mysqli_num_rows($pre_con) != 0): ?>
            <?php while($r_p = mysqli_fetch_assoc($pre_con)): ?>
                <form action="subject_db.php" method="POST">
                    <input hidden type="number" name="id" id="id" value="<?php echo $id?>">
                    <div class="d-flex bd-highlight" style="margin: 1rem;">
                        <div class="p-2 flex-grow-1 bd-highlight"><span class="badge bg-secondary" style="padding: 10px; font-size: 16px;"><?php echo "เงื่อนไขที่ ", $c;?></span></div>
                        <div class="p-2 bd-highlight">
                            <input type="text" class="form-control" id="condition_" name="condition" value="<?php echo $r_p['pre_condition']; ?>">
                        </div>
                        <div class="p-2 bd-highlight">
                            <input type="submit" name="del" id="del" value="ลบออก" class="btn btn-outline-danger">
                        </div>
                    </div>
                </form>
            <?php $c++; endwhile ?>
        <?php else: ?>
            <div class="text-center">
                <span>ไม่มี หรือ ยังไม่ถูกกำหนด</span>
            </div>
        <?php endif ?>
        <form action="subject_db.php" name="add_pre" id="add_pre" method="post">
            <input hidden type="number" name="id" id="id" value="<?php echo $id; ?>">
            <table class="table table-bordered" id="add_new">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">เงื่อนไขที่เพิ่มเติม</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col" style="width: 10%;">ลบ</th>
                    </tr>
                </thead>
                <tbody id="add_row">
                    <tr>
                        <td class="text-center">1</td>
                        <td><input type="text" name="pre[]" class="form-control name_list" rows="2"></td>
                        <td>
                            <button type="button" name="add" id="add" class="btn btn-success">เพิ่ม</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" name="submit" id="submit" value="ยืนยัน" class="btn btn-info" style="margin: 1rem;">
        </form>
    </div>
</div>
<div class="d-flex bd-highlight" style="margin: 1rem;">
    <div class="p-2 flex-grow-1 bd-highlight">
        <a class="btn btn-danger" href="subject_detail.php?subj_id=<?php echo $id; ?>">ย้อนกลับ</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        let i = 1;
        $('#add').click(function(){
            i++;
            $('#add_row').append('<tr id="row'+i+'"><td class="text-center">'+i+'</td><td><input type="text" name="pre[]" class="form-control name_list"</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">ลบ</button></td></tr>')
        })

        $(document).on('click', '.btn_remove', function(){
            let button_id = $(this).attr('id');
            $('#row'+button_id+'').remove();
        })
    })
</script>