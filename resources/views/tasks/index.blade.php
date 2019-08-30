@extends ('layouts.main')

@section ('title', 'Tasks Home')

@section ('content')
          
    <div class="row justify-content-center mb-3">
        <div class="col-sm-4 text-center">
            <a href="{{ route('task.create') }}" class="btn btn-outline-info" style="width: 200px">Created Task</a>
        </div>
    </div>

    <h1>-----Actived-----</h1>

    @if($tasks->count() == 0)
        <p class="lead text-center">No Task ToDo !!</p>
    @else
        @foreach($tasks as $task)
            <div class="row">
                <div class="col-sm-12">
                <h3>
                    {{ $task->name}}
                    <small>{{ $task->created_at }}</small>
                </h3>
                <hr>
                <p>{{ $task->description}}</p>
                <h4>Date: <small>{{ $task->due_date}}</small></h4>
                
                {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
                    <a href="{{ route ('task.edit', $task->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    <a href="{{ route('tasks.archive', ['id'=>$task->id,'state'=> 1])}}" class="btn btn-sm btn-warning">Archive</a>
                {!! Form::close() !!}
                </div>
            </div>
            <hr>
        @endforeach

        <div class="row justify-content-center">
            <div class="col-sm6 text-center">
                {{ $tasks->links() }}
            </div>
        </div>
    @endif

    <hr>
    <h1>-----Archived-----</h1>

    @if($archive->count() == 0)
        <p class="lead text-center">No Task ToDo !!</p>
    @else
        @foreach($archive as $task)
            <div class="row">
                <div class="col-sm-12">
                <h3>
                    {{ $task->name}}
                    <small>{{ $task->created_at }}</small>
                </h3>
                <hr>
                <p>{{ $task->description}}</p>
                <h4>Date: <small>{{ $task->due_date}}</small></h4>
                
                {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
                    <a href="{{ route ('task.edit', $task->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    <a href="{{ route('tasks.archive', ['id' => $task->id, 'state' => 0])}}" class="btn btn-sm btn-warning">Back</a>
                {!! Form::close() !!}
                </div>
            </div>
            <hr>
        @endforeach
    @endif

@endsection
