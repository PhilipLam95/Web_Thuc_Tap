
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">ĐỔI MẬT KHẨU</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form action="{{route('changePass')}}" method="get">
              <div class="form-group">
                <label for="exampleInputEmail1">MẬT KHẨU CŨ</label>
                <input type="password" class="form-control" name="old_password" id="exampleInputEmail1" placeholder="mật khẩu cũ">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">MẬT KHẨU MỚI</label>
                <input type="password" class="form-control" name="new_password" id="exampleInputPassword1" placeholder="mật khẩu mới">
              </div>
              
              <button type="submit" class="btn btn-default">Lưu</button>
            </form>

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>