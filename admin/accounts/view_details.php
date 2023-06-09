<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.*, r.name as `room`, d.name as `dorm` from `account_list` a inner join `room_list` r on a.room_id = r.id inner join dorm_list d on r.dorm_id = d.id  where a.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
		if(isset($student_id)){
			$students = $conn->query("SELECT *,code as student_code, concat(firstname, ' ', coalesce(concat(middlename, ' '), ''), lastname) as `name` from `student_list` where id = '{$student_id}' ");
			if($students->num_rows > 0){
				foreach($students->fetch_array() as $k => $v){
					if(!is_numeric($k) && !isset($$k)){
						$$k = $v;
					}
				}
			}
		}
    }
}
?>
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-maroon">
	<h3><b>Chi tiết tài khoản</b></h3>
</div>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
		<div class="card rounded-0 shadow mb-3">
			<div class="card-header">
				<h5 class="card-title font-weight-bolder">Thông tin học sinh</h5>
			</div>
			<div class="card-body">
				<div class="container-fluid">
					<fieldset class="border-bottom">
						<legend>Thông tin chi tiết về sinh viên</legend>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="code" class="control-label">Mã sinh viên</label>
									<div class="pl-3"><?php echo isset($student_code) ? $student_code : ''; ?></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="department" class="control-label">Phòng</label>
									<div class="pl-3"><?php echo isset($department) ? $department : ''; ?></div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="course" class="control-label">Khoa</label>
									<div class="pl-3"><?php echo isset($course) ? $course : ''; ?></div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="border-bottom">
						<legend>Thông tin cá nhân</legend>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="name" class="control-label">Tên</label>
									<div class="pl-3"><?php echo isset($name) ? $name : ''; ?></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="gender" class="control-label">Giới tính</label>
									<div class="pl-3"><?php echo isset($gender) ? $gender : ''; ?></div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="contact" class="control-label">Liên hệ #</label>
									<div class="pl-3"><?php echo isset($contact) ? $contact : ''; ?></div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="email" class="control-label">Email</label>
									<div class="pl-3"><?php echo isset($email) ? $email : ''; ?></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="address" class="control-label">Địa chỉ</label>
									<div class="pl-3"><?php echo isset($address) ? $address : ''; ?></div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="">
						<legend>Chi tiết khẩn cấp</legend>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="emergency_name" class="control-label">Tên</label>
									<div class="pl-3"><?php echo isset($emergency_name) ? $emergency_name : ''; ?></div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="emergency_contact" class="control-label">Liên hệ #</label>
									<div class="pl-3"><?php echo isset($emergency_contact) ? $emergency_contact : ''; ?></div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="emergency_relation" class="control-label">Mối quan hệ</label>
									<div class="pl-3"><?php echo isset($emergency_relation) ? $emergency_relation : ''; ?></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="emergency_address" class="control-label">Địa chỉ</label>
									<div class="pl-3"><?php echo isset($emergency_address) ? $emergency_address : ''; ?></div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		</div>

		<div class="card rounded-0 shadow">
			<div class="card-header">
				<h5 class="card-title font-weight-bolder">Thông tin ký túc xá</h5>
				<div class="card-tools">
					<?php 
						$status = isset($status) ? $status : '';
						switch($status){
							case 1:
								echo '<span class="badge badge-light bg-gradient-light border text-center px-3 rounded-pill"><i class="fa fa-circle text-maroon mr-2"></i>Hoạt động</span>';
								break;
							case 0:
								echo '<span class="badge badge-light bg-gradient-light border text-center px-3 rounded-pill"><i class="far fa-circle mr-2"></i>Không hoạt động</span>';
								break;
							default:
								echo '<span class="badge badge-light bg-gradient-light border text-center px-3 rounded-pill"><i class="far fa-circle mr-2"></i>N/A</span>';
								break;
						}
					?>
				</div>
			</div>
			<div class="card-body">
				<div class="container-fluid">
					<fieldset class="border-bottom">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="rate" class="control-label">Mã tài khoản</label>
									<div class="pl-3"><?php echo isset($code) ? ($code) : ''; ?></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="dorm" class="control-label">Khu kí túc</label>
									<div class="pl-3"><?php echo isset($dorm) ? $dorm : ''; ?></div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="room" class="control-label">Phòng</label>
									<div class="pl-3"><?php echo isset($room) ? $room : ''; ?></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="rate" class="control-label">Tiền hàng tháng</label>
									<div class="pl-3"><?php echo isset($rate) ? number_format($rate) : ''; ?></div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<button class="btn btn-secondary btn-sm bg-gradient-secondary rounded-0" type="button" id="payment_history"><i class="fa fa-money-check-alt"></i> Payment History</button>
				<button class="btn btn-info btn-sm bg-gradient-info rounded-0" type="button" id="add_payment"><i class="fa fa-credit-card"></i> Add Payment</button>
				<a class="btn btn-primary btn-sm bg-gradient-maroon rounded-0" href="./?page=accounts/manage_account&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Sửa</a>
				<button class="btn btn-danger btn-sm bg-gradient-danger rounded-0" type="button" id="delete-data"><i class="fa fa-trash"></i> Delete</button>
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="./?page=accounts"><i class="fa fa-angle-left"></i> Quay trở lại danh sách</a>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
        $('#delete-data').click(function(){
			_conf("Bạn có chắc chắn xóa tài khoản này vĩnh viễn?","delete_accounts",['<?= isset($id) ? $id : '' ?>'])
		})
		$('#add_payment').click(function(){
			uni_modal("<i class='fa fa-credit-card'></i> Thanh toán mới", "accounts/manage_payment.php?account_id=<?= isset($id) ? $id : '' ?>")
		})
		$('#payment_history').click(function(){
			uni_modal("<i class='fa fa-money-check-alt'></i> Lịch sử thanh toán", "accounts/payment_history.php?account_id=<?= isset($id) ? $id : '' ?>", 'modal-lg')
		})
	})
    function delete_accounts($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_account",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("Đã xảy ra lỗi.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace("./?page=accounts");
				}else{
					alert_toast("Đã xảy ra lỗi.",'error');
					end_loader();
				}
			}
		})
	}
</script>