@foreach($subjects as $key)
<div id="scheduleModal{{$key->id}}" class="modal fade schedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Subject</h4>
            </div>
            <div class="modal-body">
                <form id="scheduleForm{{$key->id}}" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subject_code" class="control-label">Subject Code</label>
                                <input type="text" class="form-control" id="subject_code{{$key->id}}" name="subject_code">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subject_name" class="control-label">Subject Name</label>
                                <input type="text" class="form-control" id="subject_name{{$key->id}}" name="subject_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sections" class="control-label">Section</label>
                                <input type="text" class="form-control" id="section{{$key->id}}" name="sections">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="subject_type" class="control-label">Subject Type</label>
                              <select id="subject_type{{$key->id}}" class="form-control form-white" data-placeholder="Choose a color..." name="subject_type">
                                <option value="Lecture">Lecture</option>
                                <option value="Lecture and Laboratory">Lecture and Laboratory</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="units" class="control-label">Units</label>
                              <input type="number" class="form-control" id="units{{$key->id}}" name="units" min="3" max="3">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="day" class="control-label">Day</label>
                              <select id="day{{$key->id}}" class="form-control form-white" data-placeholder="Choose a color..." name="day">
                                <option value="Tue - Thu">Tue - Thu</option>
                                <option value="Wed - Fri">Wed - Fri</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="time" class="control-label">Time</label>
                              <input type="text" class="form-control" id="time{{$key->id}}" name="time">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="room_location" class="control-label">Room</label>
                              <select id="room{{$key->id}}" class="form-control form-white" data-placeholder="Choose a color..." name="room_location">
                                @foreach($rooms as $value)
                                  <option value="{{$value->id}}">{{$value->room_location}}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="button" id="subjectSubmit{{$key->id}}" data-rel="{{$key->id}}" class="btn btn-info waves-effect waves-light subject" data-dismiss="modal">Save Changes</button>
                    </div>
                    <input type='hidden' id="mode{{$key->id}}" name='mode' value=""/>
                    <input type='hidden' id="ID{{$key->id}}" name='ID' value=""/>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<div id="deleteScheduleModal{{$key->id}}" class="modal fade schedModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Rooms</h4>
            </div>
            <div class="modal-body">
                <form id="deleteForm{{$key->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                                <label for="RoomField-room_location" class="control-label">Are you sure to delete?</label>
                            <div class="form-group">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" id="subjectSubmit{{$key->id}}" data-rel="{{$key->id}}" class="btn btn-info waves-effect waves-light subject" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                    <input type='hidden' id="delMode{{$key->id}}" name='mode' value=""/>
                    <input type='hidden' id="delID{{$key->id}}" name='ID' value=""/>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
@endforeach
