<?php
    include('header.php');

    $id = $_GET['id'];
?>

<div class="d-flex justify-content-center">
    <h2 class="badge bg-warning">เพิ่มวัตถุประสงค์</h2>
</div>
<div class="d-flex justify-content-center" style="margin:1rem;">
    <div class="card" style="margin: 1rem; width:90%;">
        <div class="d-flex justify-content-center">
            <div class="md-3" style="margin: 1rem;">
                <h5 class="text-center">รหัสวิชา</h5>
                <input readonly type="number" id="subj_id" name="subj_id" class="form-control" value="<?php echo $id; ?>">
            </div>
        </div>
        <form action="subject_db.php" name="add_pre" id="add_pre" method="post">
            <input hidden type="number" name="id" id="id" value="<?php echo $id; ?>">
            <table class="table table-bordered" id="add_new">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">ข้อที่</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col" style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody id="add_row">
                    <tr>
                        <td><input type="number" min="1" name="cid[]" class="form-control name_list"></td>
                        <td><input type="text" name="cdes[]" class="form-control name_list"></td>
                        <td>
                            <button type="button" name="add" id="add" class="btn btn-success">เพิ่ม</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" name="reg_clo" id="reg_clo" value="ยืนยัน" class="btn btn-info" style="margin: 1rem;">
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        let i = 1;
        $('#add').click(function(){
            i++;
            $('#add_row').append('<tr id="row'+i+'"><td><input type="number" min="1" name="cid[]" class="form-control name_list"></td><td><input type="text" name="cdes[]" class="form-control name_list"</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">ลบ</button></td></tr>')
        })

        $(document).on('click', '.btn_remove', function(){
            let button_id = $(this).attr('id');
            $('#row'+button_id+'').remove();
        })
    })
</script>