<h1>Xin chào, <?php echo $_settings->userdata('username') ?>!</h1>
<hr>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-building"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tổng số kí túc xá</span>
          <span class="info-box-number text-right">
            <?php 
              $dorm = $conn->query("SELECT * FROM dorm_list where `delete_flag` = 0 and `status` = 1")->num_rows;
              echo format_num($dorm);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-door-closed"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tổng số phòng</span>
          <span class="info-box-number text-right">
            <?php 
              $room = $conn->query("SELECT * FROM room_list where `delete_flag` = 0 and `status` = 1")->num_rows;
              echo format_num($room);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Sinh viên đã đăng ký</span>
          <span class="info-box-number text-right">
            <?php 
              $students = $conn->query("SELECT * FROM student_list where `delete_flag` = 0 ")->num_rows;
              echo format_num($students);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-file"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tổng số tài khoản đang hoạt động</span>
          <span class="info-box-number text-right">
            <?php 
              $account = $conn->query("SELECT id FROM account_list where `delete_flag` = 0 and `status` = 1 ")->fetch_array()[0];
              echo format_num($account);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-coins"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tổng thu tháng này</span>
          <span class="info-box-number text-right">
            <?php 
              $payments = $conn->query("SELECT COALESCE(SUM(amount),0) FROM payment_list where (month_of) = '".(date("Y-m"))."' ")->fetch_array()[0];
              echo format_num($payments);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
