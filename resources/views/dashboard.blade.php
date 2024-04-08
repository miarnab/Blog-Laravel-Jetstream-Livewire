<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <br>
                <br>
                <h1 class="font-semibold text-2xl text-center text-gray-800 dark:text-gray-200 leading-tight">All Blog Posts</h1>
                <br>
                <hr>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td class="px-2 py-2">
                                @if ($post->post_image)
                                    <img src="{{ asset('storage/post_images/' . $post->post_image) }}" alt="{{ $post->title }}" width="286">
                                @endif
                            </td>
                            <td class="px-2 py-2">{{ $post->title }}</td>
                            <td class="px-2 py-2">{{ strlen(strip_tags($post->details)) > 50 ? "..." : strip_tags($post->details) }}</td>
                            <td class="px-2 py-2">{{ $post->created_at }}</td>
                        </tr>
                        <br>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
