<?php
    include('header.php');

    $s_db ="SELECT subject_id FROM subject";
    $s_con = mysqli_query($con,$s_db);


?>
<div class="d-flex justify-content-center">
    <span class="badge bg-primary" style="margin:1rem; font-size:20px;">คำนวณคะแนนนักศึกษา</span>
</div>
<div class="d-flex justify-content-center">
    <div class="card" style="width: 90%; padding: 1rem;">
        <div class="text-center" style="margin: 1rem;">
            <span>รหัสวิชา</span>
        </div>
        <div class="d-flex justify-content-center">
            <select name="id" id="id" class="form-select form-select-sm mb-3" style="width: 20%;">
                <option disabled selected value="เลือกรายวิชา"></option>
                <?php while($row = mysqli_fetch_assoc($s_con)): ?>
                    <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_id']; ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div id='response'></div>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" style="width: 8%;">แบบที่</th></th>
                        <th scope="col" style="width: 10%;">วัตถุประสงค์ข้อที่</th>
                        <th scope="col" class="text-center">รูปแบบ</th>
                        <th scope="col"class="text-center">เปอร์เซ็น</th>
                    </tr>
                </thead>
                <tbody id="score">
                </tbody>
        </table>
        <form action="score_db.php" method="post" enctype="multipart/form-data">
            <div class="mb-3" style="margin: 1rem;">
                <label for="formFile" class="form-label">เลือกไฟล์คะแนน(.xls .xlsx)</label>
                <input class="form-control" type="file" id="file" name="file">
            </div>
            <div class="d-flex justify-content-start" style="margin: 1rem;">
                <input type="submit" name="file_s" id="file_s" value="Import" class="btn btn-secondary">
            </div>
        </form>
        <div class="d-flex justify-content-end" style="margin: 1rem;">
                <input type="submit" name="file_s" id="file_s" value="คำนวณ" class="btn btn-success fake">
            </div>
        <div class="d-flex justify-content-center" style="margin: 1rem;">
            <span class="badge bg-secondary" style="font-size: 16px;">คะแนนนักศึกษา</span>
        </div>
        <div id="fake"></div>
    </div>
</div>
<script>
    $('#id').change(function(){
        var id = $(this).val();

        $.ajax({
           type: "post",
           url: "score_db.php",
           data: {sjid:id},
           success: function(data){
               $('#score').html(data)
           }
       })
    });
    $(document).on('click', '.fake', function(){
        $.ajax({
            type: "post",
            url: "score_db.php",
            data: {fake:"123"},
            success: function(data){
                $('#fake').html(data)
            }
        })
    })
</script>