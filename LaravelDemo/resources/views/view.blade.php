
<!--<form action="timm" method="post">
	<input type="text" name="tim">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<button type="submit" class="btn btn-default">Category Add</button>
	<input type="submit" name="abc">
</form>-->
<form action="admin/theloai/timm" method="post">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên Thể Loại</label>
                                <input class="form-control" name="tim" placeholder="Nhập tên thể loại" />
                            </div>
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>