
<!-- Create Bank -->
<div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل عميل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('client.update','client')}}" method="POST" autocomplete="off">

                  @method('PUT')

                    @csrf
                    {{-- page 419 --}}
                    <input type="hidden" name="id" value="{{ $row->id }}">

                    <div class="row">
                        <div class="col">
                            <label>اسم العميل</label>
                            <input type="text" name="name" class="form-control @error('name') is-invliad @enderror" value="{{$row->name}}" >
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>العنوان</label>
                              <input type="text" name="address" class="form-control @error('address') is-invliad @enderror"value="{{$row->address}}" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>الحدالاقصى للسعر</label>
                              <input type="number" name="max_price" class="form-control @error('max_price') is-invliad @enderror" value="{{$row->max_price}}">
                        </div>
                        <div class="col">
                            <label>رقم الهاتف</label>
                              <input type="number" name="phone" class="form-control @error('phone') is-invliad @enderror"value="{{$row->phone}}">
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea class="form-control softeditor" name="notes" rows="5">{{$row->notes}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حفظ</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
