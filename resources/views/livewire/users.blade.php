<div class="flex justify-center gap-10">
    <div class="w-1/3 my-10">
        <div class="mx-auto mb-6">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create New User</h2>
        </div>

        @if (session('success'))
            <div class="p-4 mt-6 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="mx-auto mt-2 w-full">
            <form wire:submit.prevent="createNewUser" action="#" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input wire:model="name" id="name" type="text" name="name" autocomplete="name"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('name')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input wire:model="email" id="email" type="email" name="email" autocomplete="email"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('email')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    <div class="mt-2">
                        <input wire:model="password" id="password" type="password" name="password"
                            autocomplete="current-password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('password')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="profile-picture" class="block text-sm/6 font-medium text-gray-900">Profile
                        Picture</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-6">
                        <div class="text-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                                class="mx-auto size-12 text-gray-300">
                                <path
                                    d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                    clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                <label for="avatar"
                                    class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-600 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input wire:model="avatar" id="avatar" type="file" name="avatar"
                                        class="sr-only" accept="image/png, image/jpg, image/jpeg" />
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-600">PNG, JPG up to 5MB</p>
                        </div>
                    </div>
                    @error('avatar')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="preview" class="block text-sm/6 font-medium text-gray-900">Preview</label>
                    <div wire:loading wire:target="avatar">
                        <div
                            class="flex items-center justify-center w-20 h-20 border border-gray-200 rounded-lg bg-gray-50">
                            <div
                                class="px-2 py-1 text-[10px] font-medium text-center text-blue-800 bg-blue-200 rounded-full animate-pulse">
                                uploading...</div>
                        </div>
                    </div>

                    @if ($avatar)
                        <div wire:loading.remove wire:target="avatar" class="mt-2 flex items-center gap-x-3">
                            <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar Preview"
                                class="h-20 w-20 rounded object-cover">
                        </div>
                    @endif
                </div>

                <div>
                    <button
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Create
                        new user</button>
                </div>
            </form>
        </div>
    </div>
    <div class="w-1/3 my-10">
        <div class="mx-auto mb-6">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">User Lists</h2>
        </div>
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($users as $user)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <img src="{{ $user->avatar ?? asset('img/default-avatar.png') }}" alt=""
                            class="size-12 flex-none rounded-full bg-gray-50" />
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">{{ $user->name }}</p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end self-center">
                        <p class="mt-1 text-xs/5 text-gray-500">Joined
                            {{ $user->created_at->DiffForHumans() }}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $users->links() }}
    </div>
</div>
</div>
