@extends('design.design')

@section('content')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .actions {
            display: flex;
            justify-content: space-around;
        }
        .actions button {
            padding: 5px 10px;
            cursor: pointer;
        }
        .actions button.delete {
            background-color: #ff6347;
            color: white;
            border: none;
        }
        .actions button.edit {
            background-color: #4169e1;
            color: white;
            border: none;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td class="actions">
        
                    @if(auth()->user()->name ==  $post->createdby )
                        <a href="{{route('delete_post', ['id' => $post->id])}}" method= "post" name= ><button class="delete">Delete</button></a>
                        <a href="{{route('edit_post', ['id' => $post->id])}}" method= "post" name= ><button class="edit">Edit</button></a>
                    @endif
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <a href="{{route('newpost')}}"><button id="add-post-btn">Add New Post</button></a>

@endsection