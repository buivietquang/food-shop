@extends('back/admin_index')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        <?php
	$message = Session::get('message');
	if ($message){
		echo $message;
		Session::put ('message',null);
	}
	?>
                        <div class="panel-body">
                        @foreach ($edit_category_product as $key => $edit_value )
                            <div class="position-center">
                                <form role="form" action="{{URL :: to('/update-category-product/'.$edit_value->cate_id)}}"  method="post">
                                    {{(csrf_field())}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" value="{{$edit_value ->cate_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize:none" name="category_product_desc" id="" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mô tả">
                                    {{$edit_value ->cate_desc}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name= 'category_product_status'class=" form-control input -sm m-bot15">
                                        <option value="0">Inactive</option>
                                        <option value="1 ">Active</option>

                                    </select>
                                </div>

                                <button name="update_category_product" type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
@endsection