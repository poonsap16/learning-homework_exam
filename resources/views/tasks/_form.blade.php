<form class="my-4" action="/tasks" method="POST">
    @csrf
<div class="form-row">
    <!-- type -->
    <div class="form-group col-md-6">
        <label for="type">ประเภทงาน</label>
        <select id="type" class="form-control" name="type">
            <option value="" selected>เลือกประเภทงาน...</option>
            <option value="1" {{ old('type') == 1 ? 'selected' : ''}}>Maintenance</option>
            <option value="2" {{ old('type') == 2 ? 'selected' : ''}}>Support</option>
            <option value="3" {{ old('type') == 3 ? 'selected' : ''}}>RFID</option>
            <option value="4" {{ old('type') == 4 ? 'selected' : ''}}>Activity</option>
            
        </select>
    </div>
    <!-- name -->
    <div class="form-group col-md-6">
        <label for="name">ซื่องาน</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
</div>
<!-- detail -->
<div class="form-group">
    <label for="detail">รายละเอียด</label>
    <textarea class="form-control" id="detail" name="detail"></textarea>
</div>
<!-- status -->
<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="status" name="status">
      <label class="form-check-label" for="status">Completed</label>
    </div>
</div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>