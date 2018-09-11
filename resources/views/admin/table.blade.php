<thead>
    <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Section</th>
        <th>Subject Type</th>
        <th>Units</th>
        <th>Day</th>
        <th>Time</th>
        <th>Room</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach($subjects as $subs)
    <tr class="gradeX">
        <td>{{$subs->subject_code}}</td>
        <td>{{$subs->subject_name}}</td>
        <td>{{$subs->section}}</td>
        <td>{{$subs->subject_type}}</td>
        <td>{{$subs->units}}</td>
        <td>{{$subs->schedule_day}}</td>
        <td>{{$subs->schedule_time}}</td>
        <td>{{$subs->room_location}}</td>
      <td class="actions">
        <a class="edit" data-rel="{{$subs->id}}" data-toggle="modal" data-target="#teacherModal" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
        <a class="delete" data-rel="{{$subs->id}}" data-toggle="modal" data-target="#deleteScheduleModal" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
    @endforeach
</tbody>
