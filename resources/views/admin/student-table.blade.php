@if ($students->count())
@foreach ($students as $student)
<tr>
    <td>{{ $loop->index + $students->firstItem() }}</td>
    <td ><span>{{ucwords($student->name)}}</span></td>
    <td>{{ucwords($student->father_name)}}</td>
    <td>{{ucwords($student->class)}}</td>
    <td>{{$student->mobile}}</td>
    <td>{{$student->email}}</td>
    <td> <a href="{{route('admin.single.student',$student->id)}}" class="btn btn-sm btn-success">
        <i class="bi bi-eye"></i>
    </a>
    {{-- <a href="" class="btn btn-sm btn-primary">
        <i class="bi bi-pencil"></i> <!-- Edit icon -->
    </a>     --}}
    
    {{-- <a href="" class="btn btn-sm btn-danger">
        <i class="bi bi-trash" onclick="return confirm('Are you sure?')"></i> <!-- Edit icon -->
    </a>    --}}
</td>
</tr>
        @endforeach
        @else
        <tr>
            <td colspan="6" class="text-center text-danger">No Data Found</td>
        </tr>
@endif