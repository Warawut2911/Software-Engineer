<?php
    include('header.php');

    $id = $_GET['id'];
    

    $mplo_db = "SELECT * FROM main_plo";
    $mid = mysqli_query($con, $mplo_db);

    $clo_db = "SELECT * FROM clo WHERE subject_id = $id";
    $clo = mysqli_query($con, $clo_db);

?>

<div class="d-flex justify-content-center" style="margin: 1rem;">
    <h2 class="badge bg-info" style="font-size: 20px;">ระบุความสัมพันธ์วัตถุประสงค์ของกระบวนวิชา กับ วัตถุประสงค์หลัก</h2>
</div>
<div class="d-flex justify-content-center">
    <div class="card" style="width: 90%; margin:1rem;">
        <div class="d-flex justify-content-center">
            <div class="md-3" style="margin: 1rem;">
                <h5 class="text-center">รหัสวิชา</h5>
                <input readonly type="number" id="subj_id" name="subj_id" class="form-control" value="<?php echo $id; ?>">
            </div>
        </div>
        <table class="table table-bordered" style="margin-top:1rem">
            <thead>
                <tr>
                    <th scope="col" class="text-center" style="width:10%">ข้อที่</th>
                    <th scope="col" class="text-center" colspan="2">รายละเอียด</th>
                    <th scope="col" class="text-center" style="width:10%">ตรงกับวัตถุประสงค์หลักข้อที่</th>
                    <th scope="col" class="text-center" style="width:10%">ตรงกับวัตถุประสงค์ย่อยข้อที่</th>
                    <th scope="col" class="text-center" style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_clo = mysqli_fetch_assoc($clo)): ?>
                    <form action="subject_db.php" method="POST">
                        <input hidden type="number" name="id" id="id" value="<?php echo $id;?>">
                        <tr>
                            <th scope="row" class="text-center"><input class="form-control" type="number" name="cid" id="cid" value="<?php echo $row_clo['clo_id'];?>" readonly></th>
                            <th scope="row" colspan="2"><?php echo $row_clo['clo_des']; ?></th>

                            <?php
                                $clo_id = $row_clo['clo_id']; 
                                $match_db = "SELECT * FROM matching WHERE subject_id = $id AND clo_id = $clo_id";
                                $match_query = mysqli_query($con, $match_db);
                                $r_matching = mysqli_fetch_array($match_query);
                            ?>
                            <?php if(!$r_matching):?>
                                <th scope="row" class="text-center">
                                    <select class="form-select form-select-lg mb-3" id="mplo" name="mplo">
                                        <option disabled selected></option>
                                            <?php while($row = mysqli_fetch_assoc($mid)): ?>
                                                <option value="<?php echo $row['plo_id']; ?>"><?php echo $row['plo_id']; ?></option>
                                            <?php endwhile ?>
                                            <?php $mid = mysqli_query($con, $mplo_db); ?>
                                    </select>
                                </th>
                                <th scope="row" class="text-center">
                                    <select class="form-select form-select-lg mb-3" id="splo" name="splo">
                                    </select>
                                </th>
                                <th scope="row">
                                    <input type="submit" name="mat" id="mat"  class="btn btn-outline-success" value="ยืนยัน">
                                </th>
                            <!-- IF Founded -->
                            <?php endif ?>
                        </tr>
                    </form>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-end" style="margin: 1rem;">
    <a href="score.php?id=<?php echo $id; ?>" class="btn btn-primary">ถัดไป</a>
</div>
<script>
   $('#mplo').change(function(){
       var mp_id = $(this).val();

       $.ajax({
           type: "post",
           url: "subject_db.php",
           data: {mpid:mp_id},
           success: function(data){
               $('#splo').html(data)
           }
       })
   });
</script>