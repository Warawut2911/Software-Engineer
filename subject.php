<?php
    include('header.php');
    
    $subj_db = 'SELECT * FROM `subject`';
    $subj_query = mysqli_query($con,$subj_db);

?>
<div class="d-flex justify-content-evenly">
    <div class=".justify-content-center">
        <h3>รายชื่อกระบวนวิชา</h3>
    </div>
</div>
<div class="d-flex justify-content-sm-end" style="margin-right: 6rem;">
        <a href="reg_subj.php" class="btn btn-primary" style="padding-top: 10px;"><h6>เพิ่มรายวิชา</h6></a>
</div>
<div class="d-flex justify-content-center" style="margin-top: 1rem;">
    <div class="card" style="width: 75%; margin-top: 1rem;">
        <table class="table table-warning table-sm">
            <thead>
                <tr>
                    <th scope="col" class="text-center" style="width: 10%;"><span>รหัสวิชา</span></th>
                    <th scope="col" class="text-center">ชื่อวิชา</th>
                    <th scope="col" class="text-center" style="width: 10%;">ดูข้อมูล</th>
                </tr>
            </thead>
            <tbody>
                <div class="accdion accordion-flush" id="accordionFlushExample">
                    <?php while($row = mysqli_fetch_assoc($subj_query)): ?>
                        <tr>
                            <th scope="row" class="text-center"><?php echo $row['subject_id']; ?></th>
                            <td class="text-center">
                                <?php echo $row['t_name'] ?>
                            </td>
                            <th scope="row" class="text-center">
                                <a href="subject_detail.php?subj_id=<?php echo $row['subject_id'];?>" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    <?php endwhile ?>
                </div>
            </tbody>
        </table>
    </div>
</div>