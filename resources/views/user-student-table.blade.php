  @if($students)
                    @foreach ($students as $student)
                    <tr>
                         <td scope="row">{{ $loop->index + $students->firstItem() }}</td>
                        <td class="text-nowrap">
                            @if ($student->photo)
                            <img src="{{ asset('uploads/students/' . $student->photo) }}" class="img-thumbnail" width="150" height="150" alt="{{$student->photo}}">
                            @else
                            <h1>No Photo</h1>
                            @endif
                           
                        </td>
                        <td class="text-nowrap">{{ucwords($student->name)}}</td>
                        <td class="text-nowrap"> {{ucwords($student->father_name)}}</td>
                        <td class="text-nowrap">{{ucwords($student->class)}}</td>
                        <td class="text-nowrap">{{$student->mobile}}</td>
                        <td class="text-nowrap">{{$student->email}}</td>
                        <td>
                            <a href="{{route('user.student.view',$student->id)}}" class="btn btn-sm btn-success">
                                <i class="bi bi-eye"></i> <!-- view icon -->
                            </a>
                            <a href="{{route('user.student.edit',$student->id)}}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i> <!-- Edit icon -->
                            </a>    
                            
                            <a href="{{route('user.student.delete',$student->id)}}" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash" onclick="return confirm('Are you sure?')"></i> <!-- Edit icon -->
                            </a>   
                    
                        </td>
                        </tr>
                    @endforeach
                    @endif