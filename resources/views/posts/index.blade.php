<x-app-layout>
    <div class="container mx-auto sm:px-4 mx-auto sm:px-4 pt-10 mx-auto sm:px-4">
        <div class="flex flex-wrap  justify-center">
            <div class="md:w-full pr-8 pl-8">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>All Posts</h1>
                        </div>
                        <br>
                        <div class="relative">
                            <x-link href="{{ route('posts.create') }}">Create New</x-link>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div> <!-- end of .row -->
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <th class="px-6 py-2">#</th>
                                    <th class="px-6 py-2">Title</th>
                                    <th class="px-6 py-2">Body</th>
                                    <th class="px-6 py-2">Created At</th>
                                    <th class="px-6 py-2">Actions</th>
                                </thead>

                                <tbody>

                                    @foreach ($posts as $post)

                                        <tr>
                                            <th class="px-6 py-2">{{ $post->id }}</th>
                                            <td class="px-6 py-2">{{ $post->title }}</td>
                                            <td class="px-6 py-2">{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                                            <td class="px-6 py-2">{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                            <td class="px-6 py-2 justify-center">
                                                    <x-link method="get" href="{{route('posts.edit',$post->id)}}">Edit</x-link>
                                                    <form method="post" action="{{route('posts.destroy',$post->id)}}" class="inline-block">
                                                        @method('delete')
                                                        @csrf
                                                        <x-danger-button type="submit" onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                                    </form>

                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                            {{--  <div class="text-center">
                                {!! $posts->links(); !!}
                            </div>  --}}
                        </div>
                    </div>
                </div>
        </div>
    </div>

</x-app-layout>
