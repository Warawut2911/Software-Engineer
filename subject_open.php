<?php
    include('header.php');

    $subj_db = "SELECT * FROM subject";
    $subj_con = mysqli_query($con, $subj_db);

    $open_db = "SELECT DISTINCT year FROM open ORDER BY year";
    $open_con = mysqli_query($con, $open_db);

?>
<div class="d-flex justify-content-center">
    <span class="badge bg-primary" style="font-size: 20px;">กระบวนวิชา</span>
</div>
<div class="d-flex justify-content-center">
    <div class="card" style="width: 90%; margin: 1rem; padding:1rem;">
        <div class="d-flex justify-content-evenly" style="margin: 1rem;">
            <div class="md-3">
                <h5 class="text-center">ปีการศึกษา</h5>
                <select name="year" id="year" class="form-select form-select-sm mb-3">
                    <option selected disabled value=""></option>
                    <?php while($r_op = mysqli_fetch_assoc($open_con)): ?>
                        <option value="<?php echo $r_op['year'] ?>"><?php echo $r_op['year'] ?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="md-3">
                <h5 class="text-center">ภาคการศึกษา</h5>
                <select name="term" id="term" class="form-select form-select-sm mb-3"></select>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width: 15%;">รหัสวิชา</th>
                    <th class="text-center">ชื่อวิชา</th>
                    <th class="text-center" style="width: 10%;">สถานะ</th>
                </tr>
            </thead>
            <tbody id="subj_row">
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-start" style="margin: 1rem;">
    <a href="menu.php" class="btn btn-danger">ย้อนกลับ</a>
</div>
<script>
    $('#year').change(function(){
        var y_val = $(this).val();

        $.ajax({
           type: "post",
           url: "score_db.php",
           data: {year_cal:y_val},
           success: function(data){
               $('#term').html(data)
           }
       })

    })
    $('#term').change(function(){
           var t_val = $(this).val();
           var y_val = $('#year').val();


           $.ajax({
           type: "post",
           url: "score_db.php",
           data: {year_c:y_val,term_c:t_val},
           success: function(data1){
               $('#subj_row').html(data1)
           }
       })
       })
       $(document).on('click', '.add', function(){
           let id = $(this).attr('id');
           var y_val = $('#year').val();
           var t_val = $('#term').val();
           
           $.ajax({
               type: "post",
               url: "score_db.php",
               data: {add_sub:id,add_y:y_val, add_t:t_val},
               success: function(data){
                   $(this).remove();
                   $('#fix'+id+'').html(data)
                   console.log(data)
               }
           })
       })

       $(document).on('click', '.del', function(){
           let id = $(this).attr('id');
           var y_val = $('#year').val();
           var t_val = $('#term').val();
           
           $.ajax({
               type: "post",
               url: "score_db.php",
               data: {del_sub:id, del_y:y_val, del_t:t_val},
               success: function(data){
                   $(this).remove();
                   $('#fix'+id+'').html(data)
                   console.log(data)
               }
           })
       })
</script>